<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UsersLessons;
use App\Models\Transactions;
use App\Models\Withdraws;
use App\User;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Gate;

class TransactionsController extends AdminController
{

    /**
     * Display a listing of the transactions.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        if (!Gate::allows('transaction_access')) {
            return abort(401);
        }
        $transactionsObjects = Transactions::orderBy('id', 'DESC')->get();
        $users = User::get();
        return view('admin.transactions.index', compact('transactionsObjects','users'));
    }

    /**
     * Show the form for creating a new transactions.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        return view('admin.transactions.create');
    }

    /**
     * Store a new transactions in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            Transactions::create($data);
            //  echo $lessons;
            //  exit;
            
            return redirect()->route('admin.transactions.index', app()->getLocale())
                ->with('success_message', trans('message.transaction.success_add'));
        } catch (Exception $exception) {
            echo $exception;
            // return back()->withInput()
            //     ->withErrors(['unexpected_error' => trans('message.error_request')]);
        }
    }

    /**
     * Display the specified transactions.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($locale, $id)
    {
        $transactions = Transactions::with('user')->findOrFail($id);

        return view('admin.transactions.show', compact('transactions'));
    }

    /**
     * Show the form for editing the specified transactions.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($locale, $id)
    {
        $transactions = Transactions::findOrFail($id);
        $users = User::pluck('name', 'id')->all();
        return view('admin.transactions.edit', compact('transactions', 'users'));
    }

    /**
     * Update the specified transactions in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($locale, $id, Request $request)
    {
        try {
            $transactions = Transactions::findOrFail($id);
            $data = $this->getData($request);

            $transactions->update($data);

            return redirect()->route('admin.transactions.index', app()->getLocale())
                ->with('success_message', trans('message.transaction.success_update'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('message.error_request')]);
        }
    }

    /**
     * Remove the specified transactions from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($locale, $id)
    {
        try {
            $transactions = Transactions::findOrFail($id);
            $transactions->delete();

            return redirect()->route('admin.transactions.index')
                ->with('success_message', trans('message.transaction.success_delete'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('message.error_request')]);
        }
    }

    public function massDestroy(Request $request)
    {

        if ($request->input('ids')) {
            $entries = Transactions::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request 
     * @return array
     */
    protected function getData(Request $request)
    {
        $rules = [
            'user_id' => 'nullable',
            'amount' => 'string|min:1|nullable',
            'payment_way' => 'string|min:1|nullable',
            'state' => 'string|min:1|nullable',
        ];

        $data = $request->validate($rules);


        return $data;
    }

    public function filter(Request $request)
    {
        $combined_date_and_time1 = $request->from_date . ' ' . '24:00';
        $starting_date_timestamp1 = strtotime($combined_date_and_time1);
        $combined_date_and_time2 = $request->to_date . ' ' . '00:00';
        $starting_date_timestamp2 = strtotime($combined_date_and_time2);
        $from_date = date('Y-m-d H:i:s', $starting_date_timestamp1);
        $to_date = date('Y-m-d H:i:s', $starting_date_timestamp2);

        $query= Transactions::orderBy('id', 'desc');
        if($request->user != null){
            $query->where('user_id','=',$request->user);
        }
        if($request->method != 'all'){
            $query->where('type','=',$request->method);
        }
        if($request->status != 'all'){
            $query->where('state','=',$request->status);
        }
        if($request->from_date != null){
            $query->whereBetween('created_at',[$to_date, $from_date]);
        }
        $transactionsObjects = $query->get();

        $data['template'] = view('admin.transactions.table_template', compact('transactionsObjects'))->render();
        $data['template_mobile'] = view('admin.transactions.table_template_mobile', compact('transactionsObjects'))->render();
        return $data;
    }

    public function replenish($locale, Request $request)
    {
        try {
            $user = User::findOrfail($request->user);
            $amount = floatval($request->amount);
            $user->balance  = $user->balance + $amount;
            // dd($amount * 1000);
            $user->save();
            if (is_array($request->type)) {
                $type = [];
                foreach ($request->type as  $item) {
                    # code...
                    array_push($type, $item);
                }
                $type = implode(",", $type);
            } else {
                $type = "";
            }

            $transaction = Transactions::create([
                'user_id' => $request->user,
                'amount' => $amount,
                'method' => 'admin',
                'state' => 'completed',
                'comment' => $request->comment,
                'balance' => $user->balance,
                'type' => $type
            ]);
            return redirect()->route('admin.transactions.index', app()->getLocale())
                ->with('success_message', 'Balance was successfully updated.');
        } catch (\Throwable $th) {
            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('message.error_request')]);
        }
    }

    public function withdraw($locale, Request $request)
    {
        try {
            $user = User::findOrfail($request->user);
            $amount = floatval($request->amount);
            if($amount > floatval($user->balance)){
                return back()->withInput()
                ->withErrors(['unexpected_error' => 'User Balance is '. $user->balance. '. You should enter less amount than balance.']);
            }
            $user->balance  = $user->balance - $amount;
            // dd($amount * 1000);
            $user->save();
            if (is_array($request->type)) {
                $type = [];
                foreach ($request->type as  $item) {
                    # code...
                    array_push($type, $item);
                }
                $type = implode(",", $type);
            } else {
                $type = "";
            }
            $transaction = Transactions::create([
                'user_id' => $request->user,
                'amount' => (0 - $amount),
                'method' => 'admin',
                'state' => 'completed',
                'comment' => $request->comment,
                'balance' => $user->balance,
                'type' => $type
            ]);

            $withdraws = Withdraws::create([
                'user_id' => $request->user,
                'amount' => $amount,
                'method' => 'admin',
                'status' => 'complete',
                'transactions_id' => $transaction->id,
            ]);
            return redirect()->route('admin.transactions.index', app()->getLocale())
                ->with('success_message', 'Balance was successfully updated.');
        } catch (\Throwable $th) {
            echo $th;
            exit;
            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('message.error_request')]);
        }
    }

}