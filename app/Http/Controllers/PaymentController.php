<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/** All Paypal Details class **/

use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\Payout;
use PayPal\Api\PayoutSenderBatchHeader;
use PayPal\Api\PayoutItem;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use PayPal\Api\Amount;
use PayPal\Api\Item;
use Illuminate\Support\Facades\Input;
use App\User;
use App\Models\Bookings;
use App\Models\Listings;
use App\Models\Withdraws;
use App\Models\Rooms;
use App\Models\BookingSeat;
use Exception;

use Redirect;
use Session;
use URL;
use App\Models\Transactions;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    //
    public function __construct()
    {
        /** PayPal api context **/
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
            $paypal_conf['client_id'],
            $paypal_conf['secret']
        ));
        $this->_api_context->setConfig($paypal_conf['settings']);
    }

    public function payWithpaypal(Request $request)
    {
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $item_1 = new Item();
        $item_1->setName('Item 1')
        /** item name **/
        ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($request->get('amount'));
        /** unit price **/
        $item_list = new ItemList();
        $item_list->setItems(array($item_1));
        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($request->get('amount'));
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Your transaction description');
        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('status'))
        /** Specify return URL **/
        ->setCancelUrl(URL::route('status'));
        $payment = new Payment();
        $payment->setIntent('Sale')
        ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        /** dd($payment->create($this->_api_context));exit; **/
        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                \Session::put('error', 'Connection timeout');
                return Redirect::route('paywithpaypal');
            } else {
                \Session::put('error', 'Some error occur, sorry for inconvenient');
                return Redirect::route('paywithpaypal');
            }
        }
        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }
        /** add payment ID to session **/
        Session::put('paypal_payment_id', $payment->getId());
        Session::put('paypal_payment_amount', $request->get('amount'));
        Session::put('paypal_payment_input_amount', $request->get('amount_original'));
        Session::put('paypal_place', $request->get('paypal_place'));

        if (!is_null($request->get('pay_type'))) {
            Session::put('pay_type', $request->get('pay_type'));
            if($request->get('pay_type') == 'book'){
                $listing = Listings::findOrFail($request->trip_id);
                if (Bookings::where('user_id', Auth::user()->id)->where('listing_id', $request->trip_id)->count() == 0) {
                    // if (is_null($request->amount_original)) {
                    //     $amount = $listing->price_per_seat;
                    // } else {
                    //     $amount = $request->amount_original;
                    // }
                    $booking_data = [
                        'user_id' => Auth::user()->id,
                        'listing_id' => $request->trip_id,
                        'type' => $request->way,
                        'status' =>  'pending',
                        'additional_info' => '',
                        'total_people' => 1,
                        'body_type_id' => $request->body_type_id,
                        'driver_id' => $listing->user_id,
                        'amount' => $request->amount_original,
                        'currency' => 'UZS',
                        'active' => true,
                        'funded' => 'not'
                    ];
                    Session::put('booking_data', $booking_data);
                    // return response()->json(['state' => 'success']);
                }
            }
        }

        if (isset($redirect_url)) {
            /** redirect to paypal **/
            return Redirect::away($redirect_url);
        }
        \Session::put('error', 'Unknown error occurred');
        return Redirect::route('paywithpaypal');
    }

    public function getPaymentStatus()
    {
        /** Get the payment ID before session clear **/
        try {
            $payment_id = Session::get('paypal_payment_id');
            /** clear the session payment ID **/
            Session::forget('paypal_payment_id');
            $payment_amount = Session::get('paypal_payment_amount');
            Session::forget('paypal_payment_amount');

            $payment_amount_input = Session::get('paypal_payment_input_amount');
            Session::forget('paypal_payment_amount');

            $pay_type = Session::get('pay_type');
            Session::forget('pay_type');

            if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
                \Session::put('error', 'Payment failed');
                return  redirect()->route('profile', app()->getLocale());
            }
            $payment = Payment::get($payment_id, $this->_api_context);
            $execution = new PaymentExecution();
            $execution->setPayerId(Input::get('PayerID'));
            /**Execute the payment **/
            $result = $payment->execute($execution, $this->_api_context);
            if ($result->getState() == 'approved') {
                \Session::put('success', 'Payment success');

                $user = User::findOrFail(Auth::user()->id);
                if ($pay_type == 'repleshiment') {
                    $comment = 'charged from paypal';
                    $user->balance += $payment_amount_input;
                    $user->update(['balance' => $user->balance]);
                } else if ($pay_type == 'book') {
                    $comment = 'charged for booking';
                    $book_data = Session::get('booking_data');
                    $booking = Bookings::create($book_data);
                    // $booking_id = Session::get('booking_id');
                    $places = Session::get('paypal_place');
                    Session::forget('paypal_place');
                    // $booking = Bookings::findOrFail($booking_id);
                    $booking->update(array('funded' => 'yes'));
                    $user->balance += $payment_amount_input;
                    $user->update(['balance' => $user->balance]);
                    $listing_id = $book_data['listing_id'];
                    $listing = Listings::findOrFail($listing_id);
                    if (Rooms::where('sender_id', Auth::user()->id)->where('receiver_id', $listing->user_id)->where('listing_id', $listing->id)->count() == 0) {
                        $room = Rooms::create([
                            'sender_id' => Auth::user()->id,
                            'receiver_id' => $listing->user_id,
                            'listing_id' => $listing->id
                        ]);
                    } 
    
                    if(BookingSeat::where('booking_id', $booking->id)->count() == 0){
                        $trip_place = explode(",", $places);
                        foreach ($trip_place as $item) {
                            BookingSeat::create([
                                'booking_id' => $booking->id,
                                'seat_number' => $item
                            ]);
                        }
                    }

                }

                $transaction = Transactions::create([
                    'user_id' => Auth::user()->id,
                    'amount' => $payment_amount_input,
                    'method' => 'paypal',
                    'state' => 'pending',
                    'comment' => $comment,
                    'balance' => $user->balance,
                    'type' => $pay_type
                ]);
                return  redirect()->route('bookings', app()->getLocale())->with('success_message', trans('message.charge_success'));
            }
            \Session::put('error', 'Payment failed');
            return  redirect()->route('profile', app()->getLocale());
        } catch (\Throwable $th) {
            \Session::put('error', 'Payment failed');
            echo $th;
            exit;
            return  redirect()->route('profile', app()->getLocale())->with('success_message', trans('message.something_wrong'));
        }
        
    }

    public function withdraw(Request $request)
    {
        $amount = $request->amount;
        $user = Auth::user();
        if ($amount <= $user->balance) {
            if (Withdraws::where('user_id', Auth::user()->id)->where('status', 'pending')->count() == 0) {

                $comment = trans('message.you_request')  . $amount .  trans('message.from_paypal');

                $user_transaction = Transactions::create([
                    'user_id' => Auth::user()->id,
                    'comment' => 'withdraw',
                    'amount' => (0 - $amount),
                    'balance' => Auth::user()->balance,
                    'state' => 'pending',
                    'type' => 'withdraw',
                    'method' => 'paypal'
                ]);

                $withdraw = Withdraws::create([
                    'user_id' => Auth::user()->id,
                    'amount' => $amount,
                    'method' => 'paypal',
                    'status' => 'pending',
                    'transactions_id' => $user_transaction->id
                ]);

                return redirect()->route('profile', ['locale' => app()->getLocale(), 'tab' => 'account'])->with('success_message', trans('message.request_approve'));;
            }
            return redirect()->route('profile', ['locale' => app()->getLocale(), 'tab' => 'account'])->with('success_message', trans('message.request_fail'));;
        } else {
            return redirect()->route('profile', ['locale' => app()->getLocale(), 'tab' => 'account'])->with('success_message', trans('message.request_fail'));;
        }
    }

    public function withdrawApprove(Request $request)
    {

        // send money

        $transaction_id = $request->transaction_id;
        $transaction =  Transactions::findOrFail($transaction_id);
        $withdraw =  Withdraws::where('transactions_id', $transaction->id)->first();
        $user = User::findOrFail($withdraw->user_id);
        $paypal_email = $user->paypal_email;
        $payouts = new Payout();
        $amount = abs($withdraw->amount/10480);
        if (!is_null($paypal_email) && !is_null($amount)) {
            $senderBatchHeader = new PayoutSenderBatchHeader();

            $senderBatchHeader->setSenderBatchId(uniqid())
                ->setEmailSubject("You have a Payout!");

            $senderItem = new PayoutItem();
            $senderItem->setRecipientType('Email')
                ->setNote('Thanks for your patronage!')
                ->setReceiver($paypal_email)
                ->setSenderItemId(date('d-m-Y-H-i'))
                ->setAmount(new \PayPal\Api\Currency('{"value":' . $amount . ',"currency":"USD"}'));

            $payouts->setSenderBatchHeader($senderBatchHeader)
                ->addItem($senderItem);

            // For Sample Purposes Only.
            $request = clone $payouts;

            // ### Create Payout
            try {
                $output = $payouts->create(array('sync_mode' => 'false'), $this->_api_context);

                $withdraw->update(['status' => 'complete']);
                $comment = trans('message.you_withdraw') . $withdraw->amount . trans('message.from_paypal');
                $balance = $user->balance;
                $user->balance = $balance - $withdraw->amount;
                $user->save();
                $transaction->update([
                    'balance' => $user->balance,
                    'state' => 'completed',
                    'comment' => $comment
                ]);
                return redirect()->route('admin.transactions.index', app()->getLocale())
                    ->with('success_message', trans('message.withdraw_approve'));
            } catch (Exception $ex) {
                return redirect()->route('admin.transactions.index', app()->getLocale())
                ->with('success_message', trans('message.withdraw_fail'));
            }
        } else {
            return redirect()->route('admin.transactions.index', app()->getLocale())
                ->with('success_message', trans('message.withdraw_fail'));
        }
    }
}
