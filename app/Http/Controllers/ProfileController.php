<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Cars;
use App\Models\Trucks;
use App\Models\CargoTypes;
use App\Models\BodyTypes;
use App\Models\Preferences;
use App\Models\ComplainsUsers;
use App\Models\Reasons;
use App\Models\Reviews;
use App\Models\Bookings;
use App\Models\Rooms;
use App\Models\BookingSeat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Carbon;
use App\Models\Listings;
use App\Models\DemandCategory;
use App\Models\Demands;
use App\Models\News;
use App\Models\DemandCategoryManager;
use App\Models\DemandStatus;
use App\Models\Transactions;
use App\Models\Notifications;
use App\Models\Passport;
use Illuminate\Support\Facades\DB;
use App\SupportMessage;
use App\Events\SupportMessageCreated;
use App\SupportMessageUnread;
use App\Models\CarBrand;
use App\Models\CarModel;
use App\Models\Colors;
use App\Models\Info;
use App\Models\Message;
use App\Models\SearchTrips;
use Exception;
use Illuminate\Support\Facades\Redis;

class ProfileController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth', 'active', 'simple_user']);
    }

    public function personal_Control()
    {
        $news = News::orderBy('id', 'desc')->paginate(2);
        $messages = Message::where('receiver_id', Auth::user()->id)->where('seen', false)->get();
        return view('acc-control', compact('news', 'messages'));
    }

    public function trips()
    {
        
        $current_time_zone = session()->get('current_time_zone');
        $attr = Carbon::now();
        $utc = strtotime($attr)-date('Z'); // Convert the time zone to GMT 0. If the server time is what ever no problem.
        $attr = $utc+$current_time_zone; // Convert the time to local time
        $attr = date("Y.m.d", $attr);
        $trips = Listings::whereNull('delete')
                ->where('active', true)
                ->where('user_id', Auth::user()->id)
                ->where('starting_date', '>=', $attr)
                ->orderBy('id', 'desc')
                ->get();
        $booked_trips = Bookings::select(
            'bookings.*',
            'listings.*',
            'listings.id as listing_id',
            'reviews.id as review_id'
            )
            ->where('bookings.user_id', Auth::user()->id)
            ->where('bookings.driver_id', '!=' , Auth::user()->id)
            ->where('bookings.canceled', false)
            ->where('listings.starting_date', '>', now())
            ->leftjoin('listings','listings.id','=','bookings.listing_id')
            ->leftjoin('reviews', 'reviews.booking_id','=','bookings.id')
            ->orderBy('bookings.id', 'desc')
            ->get(); 
        return view('profile.trip', compact('trips', 'booked_trips'));
    }

    public function tripsOld()
    {
        $current_time_zone = session()->get('current_time_zone');
        $attr = Carbon::now();
        $utc = strtotime($attr)-date('Z'); // Convert the time zone to GMT 0. If the server time is what ever no problem.
        $attr = $utc+$current_time_zone; // Convert the time to local time
        $attr = date("Y.m.d", $attr);
        $past_trips = Listings::whereNull('delete')
                ->Where('starting_date', '<', $attr)
                ->where('user_id', Auth::user()->id)
                ->orderBy('id', 'desc')
                ->get();
        $completed_trips = Listings::where('active', false)
                ->where('user_id', Auth::user()->id)
                ->orderBy('id', 'desc')
                ->get();
        $trips = $past_trips->merge($completed_trips);
        return view('profile.trip-old', compact('trips'));
    }

    public function alerts()
    {
        $trips = SearchTrips::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        return view('profile.alerts', compact('trips'));
    }
    
    public function profile(Request $request)
    {
        $cargo_types = CargoTypes::get();
        $truck_body_types = BodyTypes::where('type', 'truck')->get();
        $reasons = Reasons::get();
        $reviews = Reviews::where('receiver_id', Auth::user()->id)->get();
        $showreviews = Reviews::where('receiver_id', Auth::user()->id)->paginate(10);
        $reviews_scores = [];
        $reviews_scores[5] = Reviews::where('receiver_id', Auth::user()->id)->where('score', '>=', 4.5)->count();
        $reviews_scores[4] = Reviews::where('receiver_id', Auth::user()->id)->where('score', '<', 4.5)->where('score', '>=', 3.5)->count();
        $reviews_scores[3] = Reviews::where('receiver_id', Auth::user()->id)->where('score', '<', 3.5)->where('score', '>=', 2.5)->count();
        $reviews_scores[2] = Reviews::where('receiver_id', Auth::user()->id)->where('score', '<', 2.5)->where('score', '>=', 1.5)->count();
        $reviews_scores[1] = Reviews::where('receiver_id', Auth::user()->id)->where('score', '<', 1.5)->count();

        $leftreviews = Reviews::where('writer_id', Auth::user()->id)->paginate(10);
        $demandCategories = DemandCategory::all();
        $demandstatus = DemandStatus::all();
        $demandObjects = Demands::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        $transactions = Transactions::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(10);
        $bookings = Bookings::where('user_id', Auth::user()->id)->get();
        // dd($bookings);
        $categories = DB::table('lisence_categories')->get();
        $carBrands = CarBrand::where('popular', true)->get();
        $carModels = CarModel::get();
        $colors = Colors::get();
        if(!is_null(Auth::user()->vk_id)){
            $url = 'https://api.vk.com/method/friends.get?user_id='. Auth::user()->vk_id.'&count&access_token=' . env('VKONTAKTE_ACCESS_TOKEN') . '&v=5.60';
            $friends = json_decode(file_get_contents($url));
            if (isset($friends->response)) {
                $vk_friend_counts = $friends->response->count;
            } else {
                $vk_friend_counts  = 'Access is denied';
            }
        }
        else{
            $vk_friend_counts = "not_connected";
        }
        $receiver = null;
        $room = null;
        $messages = [];
        $today_messages = [];
        $messages_dates = [];
        $demand = null;

        if ($request->demand_id) {
            $demand = Demands::findOrfail($request->demand_id);
            $receiver = $demand->support_id;
            $room = $request->demand_id;
            $dates = SupportMessage::where('support_messages.room_id', $demand->id)
            ->select(DB::raw('DATE(created_at) as date'))
            ->groupBy('date')
            ->get();

            $today_messages = [];
            $messages_dates = [];
            foreach ($dates as $item) {
                if (!isset($messages_dates[$item->date])){
                        $messages = SupportMessage::select(
                            'support_messages.id',
                            'support_messages.body as body',
                            'support_messages.user_id',
                            'support_messages.attach_url',
                            'support_messages.created_at',
                            'support_messages.edited',
                            'support_messages.deleted',
                            'support_messages.seen',
                            'support_messages.attach_name',
                            'support_messages.attach_type',
                            'messages_reply.body as replyContent',
                            'reply.name as replyName',
                            'sender.name as sender_name',
                            'sender.avatar as sender_avatar'
                        )
                        ->where('support_messages.room_id', $demand->id)
                        ->where('support_messages.created_at', 'LIKE', '%' . $item->date . '%')
                        ->leftjoin('support_messages as messages_reply', 'messages_reply.id', '=', 'support_messages.reply_message_id')
                        ->leftjoin('users as reply', 'reply.id', '=', 'messages_reply.user_id')
                        ->leftjoin('users as sender', 'sender.id', '=', 'support_messages.user_id')
                        ->orderBy('support_messages.id', 'ASC')
                        ->get();

                    if (date('Y-m-d') == $item->date) {
                        $today_messages  = $messages;
                    } else {
                        $messages_dates[$item->date]  = $messages;
                    }
                }
            }
            
        }
        return view('profile', compact(
            'cargo_types', 
            'truck_body_types',
            'reasons', 
            'reviews', 
            'reviews_scores', 
            'showreviews',
            'leftreviews',
            'demandCategories',
            'demandObjects',
            'demandstatus',
            'transactions',
            'bookings',
            'categories',
            'receiver',
            'room',
            'messages',
            'demand',
            'carBrands',
            'carModels',
            'colors',
            'today_messages',
            'messages_dates',
            'vk_friend_counts'
        ));
    }

    public function moreReviews(Request $request)
    {
        if ($request->ajax()) {
            $skip = $request->skip;
            $take = 3;
            $moreReviews = Reviews::where('receiver_id', Auth::user()->id)->skip($skip)->take($take)->get();
            $reviewsCount = Reviews::where('receiver_id', Auth::user()->id)->count();
            return view('profile.more_reviews', compact('moreReviews', 'reviewsCount'))->render();
        } else {
            return response()->json('Direct Access Not Allowed!!');
        }
    }

    public function moreTransactions(Request $request)
    {
        if ($request->ajax()) {
            $skip = $request->skip;
            $take = 5;
            $moreTransactions = Transactions::where('user_id', Auth::user()->id)->skip($skip)->take($take)->get();
            $reviewsCount = Transactions::where('user_id', Auth::user()->id)->count();
            if(($skip + $take) < $reviewsCount){
                $showMore = true;
            } 
            else{
                $showMore = false;
            }
            return view('profile.more_transactions', compact('moreTransactions', 'reviewsCount', 'showMore'))->render();
        } else {
            return response()->json('Direct Access Not Allowed!!');
        }
    }

    public function phoneVerify(Request $request){
        $verification_code = $request['verification_code'];
        $phone = $this->checkPhoneNumber($request->phone)['phone'];
        if ($verification_code == Redis::get("$phone")) {
            $user = User::where('phone', $request->phone)->first();
            $user->update(['isVerified' => true]);
            session()->flash('success_message', trans('message.profile.profile_update'));
            return response()->json(['state' => 'success']);
        }
        return response()->json(['error' => trans('message.invalid_verification_code')]);
    }

    public function save_user_settings(Request $request)
    {
        try {
            $birthday = strtotime($request->birthday);
            $birthday = date('Y-m-d', $birthday);
            $user = User::where('id','=',Auth::user()->id)->first();
            $user->update([
                'name'=>$request->name,
                'surname'=>$request->surname,
                'sex'=>$request->sex,
                'email'=>$request->email,
                'birthday'=>$birthday,
                'profile'=>$request->profile
            ]);

            if($user->isVerified != true || $user->phone != $request->phone){
                $existing_phone = User::where('phone', $request->phone)->first();
                if(!is_null($existing_phone) && $existing_phone->id != Auth::user()->id){
                    return response()->json(['state' => 'error', 'message' => trans('message.existing_phone_number')]);
                }
                $code = mt_rand(1000, 9999);
                $phone_number = $this->checkPhoneNumber($request->phone)['phone'];
                Redis::set($phone_number, $code);
                if ($this->checkPhoneNumber($phone_number)['check']) {
                    $api_id = env('SMS_API_KEY');
                    try {
                        $body = file_get_contents("https://sms.ru/sms/send?api_id=$api_id&to=$phone_number&msg=" . urlencode(iconv("windows-1251", "utf-8", "$code")) . "&json=1"); # Если приходят крякозябры, то уберите iconv и оставьте только urlencode("Привет!")
                        $json = json_decode($body);
                        Redis::set($phone_number, $code);
                        if ($json) { // Получен ответ от сервера
                            if ($json->status == "OK") { // Запрос выполнился
                                foreach ($json->sms as $phone => $data_sms) { // Перебираем массив СМС сообщений
                                    if ($data_sms->status == "OK") { // Сообщение отправлено
                                        $user->update(['phone' => $request->phone, 'isVerified' => false]);
                                        return response()->json(['state' => 'confirm', 'code' => $code]);
                                    } else { // Ошибка в отправке
                                        return response()->json(['state' => 'error', 'message' => trans('message.invalid_phone_number')]);
                                    }
                                }
                            } else { // Запрос не выполнился (возможно ошибка авторизации, параметрах, итд...)
                                return response()->json(['state' => 'error', 'message' => trans('message.invalid_phone_number')]);
                            }
                        } else {
                            echo trans('message.sms_fail');
                        }
                    } catch (Exception $exception) {
                        return response()->json(['state' => 'error', 'message' => 'server error']);
                    }
                } else {
                    return response()->json(['state' => 'error', 'message' => trans('message.invalid_phone_number')]);
                }
            }else{
                session()->flash('success_message', trans('message.profile.profile_update'));
                return response()->json(['state' => 'success']);
            }

        } catch (\Throwable $th) {
            return response()->json(['state' => 'error']);
        }
    }

    public function save_user_alerts(Request $request)
    {
        try {
            if(is_null(Auth::user()->notification_id)){
                $notification = Notifications::create([
                    'notification_broswer' => $request->notification_browser,
                    'mailing_news' => $request->email_news_alert,
                    'mailing_messages' => $request->email_posts_alert,
                    'mailing_notification_driver' =>  $request->email_reviews_alert,
                    'mailing_notification_trip' => $request->email_trips_alert,
                    'sms_notication_message' => $request->sms_posts_alert,
                    'sms_notification_trip' => $request->sms_trips_alert,
                ]);
                $user = User::findOrFail(Auth::user()->id);
                $user->update(array('notification_id' => $notification->id));
            }
            else{
                $nofication = Notifications::findOrFail(Auth::user()->notification_id);
                $nofication->update(array(
                    'notification_broswer' => $request->notification_browser,
                    'mailing_news' => $request->email_news_alert,
                    'mailing_messages' => $request->email_posts_alert,
                    'mailing_notification_driver' =>  $request->email_reviews_alert,
                    'mailing_notification_trip' => $request->email_trips_alert,
                    'sms_notication_message' => $request->sms_posts_alert,
                    'sms_notification_trip' => $request->sms_trips_alert,
                ));
            }
            return response()->json(['state' => 'success']);
        } catch (\Throwable $th) {
            return response()->json(['state' => 'error']);
        }
    }



    public function close_account(Request $request)
    {
        try {
            User::where('id','=',Auth::user()->id)
            ->update([
                'reason_id'=>$request->reason_id,
                'recommend_text'=>$request->recommend_text,
                'reason_text'=>$request->reason_text,
                'active'=>false
            ]);
            return response()->json(['state' => 'success']);
        } catch (\Throwable $th) {
            return response()->json(['state' => 'error']);
        }
    }

    public function save_mailing_address(Request $request)
    {
        try {
            User::where('id','=',Auth::user()->id)
            ->update([
                'mailing_address'=>$request->mailing_address
            ]);
            return response()->json(['state' => 'success']);
        } catch (\Throwable $th) {
            return response()->json(['state' => $th]);
        }
    }
    
    public function reset_password(Request $request)
    {
        try {
            $user = Auth::user();

            $this->validate($request, [
                'old_password' => 'required',
                'new_password' => 'required|min:4',
                'confirm_password' => 'required|same:new_password'
            ]);
            if (Hash::check($request->old_password, $user->password)) {
                $user->password = Hash::make($request->new_password);
                $user->save();
                // session()->flash('success_message', 'The password has been changed successfully!');
                return response()->json(['state' => 'success']);
            }
        } catch (\Throwable $th) {
            return response()->json(['state' => 'error']);
        }
    }

    public function upload_personal_image(Request $request)
    {
        try {
            if (!empty($request['personal-photo'])) {
                $file = $request->file('personal-photo');
                $destinationPath = 'uploads/photos';
                if (!File::isDirectory($destinationPath)) {

                    File::makeDirectory($destinationPath, 0777, true, true);
                }
                $ext = '.' . $file->getClientOriginalExtension();
                $name = str_replace($ext, date('d-m-Y-H-i') . $ext, $file->getClientOriginalName());
                $file->move($destinationPath, $name);
                $request['image'] = 'uploads/photos/' . $name;
                User::where('id', Auth::user()->id)->update(array('avatar' => $request['image']));
                return redirect()->route('profile', ['locale' => app()->getLocale(), 'tab' => 'photo'])
                ->with('success_message', trans('message.profile.image_update'));
                // return response()->json(['state' => 'success']);
            }
        } catch (\Throwable $th) {
            return redirect()->route('profile', ['locale' => app()->getLocale(), 'tab' => 'photo'])
                ->with('success_message', trans('message.error_request'));
        }
    }

    public function upload_passport(Request $request)
    {
        try {
            $path1 = null;
            $path2 = null;
            $ext1 = null;
            $ext2 = null;
            if (!empty($request['pdf1'])) {
                $file = $request->file('pdf1');
                $destinationPath = 'uploads/pdfs';
                if (!File::isDirectory($destinationPath)) {

                    File::makeDirectory($destinationPath, 0777, true, true);
                }
                $ext1 = '.' . $file->getClientOriginalExtension();
                $name = str_replace($ext1, date('d-m-Y-H-i') . $ext1, $file->getClientOriginalName());
                $file->move($destinationPath, $name);
                $path1 = 'uploads/pdfs/' . $name;
            }
            if (!empty($request['pdf2'])) {
                $file = $request->file('pdf2');
                $destinationPath = 'uploads/pdfs';
                if (!File::isDirectory($destinationPath)) {

                    File::makeDirectory($destinationPath, 0777, true, true);
                }
                $ext2 = '.' . $file->getClientOriginalExtension();
                $name = str_replace($ext2, date('d-m-Y-H-i') . $ext2, $file->getClientOriginalName());
                $file->move($destinationPath, $name);
                $path2 = 'uploads/pdfs/' . $name;
            }

            if($request['passport_id'] == null){
                if($request['passport_issued_date'] != null){
                    $starting_date_timestamp = strtotime($request['passport_issued_date']);
                    $date = date('Y-m-d H:i:s', $starting_date_timestamp);
                }
                else{
                    $date = null;
                }
                Passport::insert(
                    [
                        'series' => $request['passport_series'],
                        'room' => $request['passport_room'],
                        'department_code' => $request['passport_department_code'],
                        'issued_by' => $request['passport_issued_by'],
                        'issued_date' => $date,
                        'place_residence' => $request['passport_place_residence'],
                        'verified' => false,
                        'user_id' => Auth::user()->id,
                        'pdf1' => $path1,
                        'pdf1_extension' => $ext1,
                        'pdf2' => $path2,
                        'pdf2_extension' => $ext2
                    ]
                );
            }
            else{
                if($request['passport_issued_date'] != null){
                    $starting_date_timestamp = strtotime($request['passport_issued_date']);
                    $date = date('Y-m-d H:i:s', $starting_date_timestamp);
                }
                else{
                    $date = null;
                }
                $passport = Passport::findOrFail($request['passport_id']);
                $passport->update(array(
                    'series' => $request['passport_series'],
                    'room' => $request['passport_room'],
                    'department_code' => $request['passport_department_code'],
                    'issued_by' => $request['passport_issued_by'],
                    'issued_date' => $date,
                    'place_residence' => $request['passport_place_residence'],
                    'verified' => false
                ));
                if (!empty($request['pdf1'])) {
                    $passport->update(array('pdf1' => $path1, 'pdf1_extension' => $file->getClientOriginalExtension()));
                }
                if (!empty($request['pdf2'])) {
                    $passport->update(array('pdf2' => $path2, 'pdf2_extension' => $file->getClientOriginalExtension()));
                }
            }
            return response()->json(['state' => 'success']);
        } catch (\Throwable $th) {
            return response()->json(['state' => 'error']);
        }
    }

    public function upload_lisence(Request $request)
    {
        try {
            $ext = null;
            $path = null;
            if (!empty($request['pdf'])) {
                $file = $request->file('pdf');
                $destinationPath = 'uploads/pdfs';
                if (!File::isDirectory($destinationPath)) {

                    File::makeDirectory($destinationPath, 0777, true, true);
                }
                $ext = '.' . $file->getClientOriginalExtension();
                $name = str_replace($ext, date('d-m-Y-H-i') . $ext, $file->getClientOriginalName());
                $file->move($destinationPath, $name);
                $path = 'uploads/pdfs/' . $name;
            }

            if($request['lisence_id'] == null){
                $lisenceid = DB::table('driver_lisence')->insertGetId(
                    [
                        'document_no' => $request['document_no'],
                        'user_id' => Auth::user()->id,
                        'verified' => false,
                        'pdf' => $path, 
                        'pdf_extension' => $ext
                        
                    ]
                );
                $categories = explode(" ", $request->categories);
                $categoty = DB::table('lisence_categories')->get();
                $out=array();
                foreach($categoty as $arr){
                    foreach($categories as $key){
                        if($key == $arr->title){
                            array_push($out, $arr->id);
                        }
                    }
                }
                DB::table('driver_lisence_categories')->where('driver_lisence_id', '=', $lisenceid)->delete();
                foreach($out as $type){
                    DB::table('driver_lisence_categories')->insert(
                        [
                            'driver_lisence_id' => $lisenceid,
                            'lisence_category_id' => $type
                        ]
                    );
                }
            }
            else{
                DB::table('driver_lisence')->where('id', $request['lisence_id'])->update(array(
                    'document_no' => $request['document_no'],
                    'verified' => false
                ));
                $categories = explode(" ", $request->categories);
                $categoty = DB::table('lisence_categories')->get();
                $out=array();
                foreach($categoty as $arr){
                    foreach($categories as $key){
                        if($key == $arr->title){
                            array_push($out, $arr->id);
                        }
                    }
                }
                DB::table('driver_lisence_categories')->where('driver_lisence_id', '=', $request['lisence_id'])->delete();
                foreach($out as $type){
                    DB::table('driver_lisence_categories')->insert(
                        [
                            'driver_lisence_id' => $request['lisence_id'],
                            'lisence_category_id' => $type
                        ]
                    );
                }
            }
            if (!empty($request['pdf'])) {
                DB::table('driver_lisence')->where('id', $request['lisence_id'])->update(array('pdf' => $path, 'pdf_extension' => $ext));
            }
            return response()->json(['state' => 'success']);
        } catch (\Throwable $th) {
            return response()->json(['state' => $th]);
        }
    }

    public function saveCar(Request $request)
    {
        try {
            if($request->car_type == 'Легковая'){
                $car = Cars::create([
                    'model' => $request->car_model,
                    'car_model_id' => $request->car_model_id,
                    'name' => $request->car_brand,
                    'color' =>  $request->car_color,
                    'year' => $request->car_year,
                    'type' => $request->car_type,
                    'number' => $request->car_number,
                    'body_type' => $request->car_body_type,
                    'user_id' => Auth::user()->id,
                    'country' => $request->country,
                    'template' => $request->template
                ]);
                session()->flash('success_message', trans('message.car_add_success'));
                return response()->json(['state' => 'success']);
            } 
            else if ($request->car_type == 'bus') {
                $car = Cars::create([
                    'model' => $request->car_model,
                    'name' => $request->car_brand,
                    'color' =>  $request->car_color,
                    'year' => $request->car_year,
                    'type' => $request->car_type,
                    'number' => $request->car_number,
                    'body_type' => $request->car_body_type,
                    'user_id' => Auth::user()->id,
                    'country' => $request->country,
                    'bus' => 1
                ]);
                session()->flash('success_message', trans('message.bus_add_success'));
                return response()->json(['state' => 'success']);
            }
            else if ($request->car_type == 'Грузовая'){
                $truck = Trucks::create([
                    'user_id' => Auth::user()->id,
                    'model' => $request->car_model,
                    'name' => $request->car_brand,
                    'color' =>  $request->car_color,
                    'year' => $request->car_year,
                    'number' => $request->car_number,
                    'body_type_id' => $request->body_type_id,
                    'country' => $request->country
                ]);
                $cargo_types = explode(",", $request->cargo_type_id);
                $truck->cargoType()->sync(array_filter((array) $cargo_types));
                session()->flash('success_message', trans('message.truck_add_success'));
                return response()->json(['state' => 'success']);
            }
            return response()->json(['state' => 'error']);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['state' => $th]);
        }
        
    }

    public function addCar(Request $request){
        $type = $request->type;
        $cargo_types = CargoTypes::get();
        $truck_body_types = BodyTypes::where('type', 'truck')->get();
        $carBrands = CarBrand::get();
        $carModels = CarModel::get();
        $colors = Colors::get();
        $car = null;
        return view('profile.add-car', compact(
            'type',
            'car',
            'cargo_types', 
            'truck_body_types', 
            'cargo_types',
            'truck_body_types',
            'carBrands',
            'carModels',
            'colors'
        ));
    }

    public function editCar($locale, $id)
    {
        $car = Cars::findOrFail($id);
        $cargo_types = CargoTypes::get();
        $truck_body_types = BodyTypes::where('type', 'truck')->get();
        $carBrands = CarBrand::get();
        $brand = CarBrand::where('name', $car->name)->first();
        if(!is_null($brand)){
            $carModels = CarModel::where('car_brand_id', $brand->id)->get();
        }else{
            $carModels = CarModel::get();
        }
        $colors = Colors::get();
        return view('profile.edit-car', compact(
            'brand',
            'cargo_types', 
            'truck_body_types', 
            'car', 
            'cargo_types',
            'truck_body_types',
            'carBrands',
            'carModels',
            'colors'
        ));
    }

    public function editTruck($locale, $id)
    {
        $car = Trucks::findOrFail($id);
        $cargoTypes = [];
        foreach ($car->cargoType as $item) {
            $cargoTypes[] = $item->id;
        }
        // dd($cargoTypes);
        $cargo_types = CargoTypes::get();
        $truck_body_types = BodyTypes::where('type', 'truck')->get();
        $categories = DB::table('lisence_categories')->get();
        $carBrands = CarBrand::get();
        $brand = CarBrand::where('name', $car->name)->first();
        if(!is_null($brand)){
            $carModels = CarModel::where('car_brand_id', $brand->id)->get();
        }else{
            $carModels = CarModel::get();
        }
        $colors = Colors::get();
        return view('profile.edit-car', compact(
            'brand',
            'cargo_types', 
            'truck_body_types', 
            'car', 
            'cargoTypes',
            'carBrands',
            'carModels',
            'colors'
        ));
    }

    public function editReview(Request $request)
    {
        $review = Reviews::findOrFail($request->id);
        return view('profile.review_template', compact('review'))->render();
    }

    public function destroyCar($locale, $id)
    {
        try {
            $car = Cars::findOrFail($id);
            $car->delete();

            return redirect()->route('profile', ['locale' => app()->getLocale(), 'tab' => 'car'])
                ->with('success_message', trans('message.profile.car_delete'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('message.error_request')]);
        }
    }

    public function destroyTruck($locale, $id)
    {
        try {
            $truck = Trucks::findOrFail($id);
            $truck->delete();
            return redirect()->route('profile', ['locale' => app()->getLocale(), 'tab' => 'car'])
                ->with('success_message', trans('message.profile.truck_delete'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('message.error_request')]);
        }
    }


    public function updateCar(Request $request)
    {
        $id = $request->id;
        try {
            if ($request->car_type == 'Легковая' || $request->car_type == 'bus') {
                $car = Cars::findOrFail($id);
                $car->update([
                        'model' => $request->car_model,
                        'car_model_id' => $request->car_model_id,
                        'name' => $request->car_brand,
                        'color' =>  $request->car_color,
                        'year' => $request->car_year,
                        'type' => $request->car_type,
                        'number' => $request->car_number,
                        'body_type' => $request->car_body_type,
                        'template' => $request->template
                ]);
            }
            else if ($request->car_type == 'Грузовая') {
                $truck = Trucks::findOrFail($id);
                $truck->update([
                    'model' => $request->car_model,
                    'name' => $request->car_brand,
                    'color' =>  $request->car_color,
                    'year' => $request->car_year,
                    'number' => $request->car_number,
                    'body_type_id' => $request->body_type_id
                ]);
                $cargo_types = explode(",", $request->cargo_type_id);
                $truck->cargoType()->sync(array_filter((array) $cargo_types));
            }
            session()->flash('success_message', trans('message.car.success_update'));
            return response()->json(['state' => 'success']);
        } catch (\Throwable $th) {
            return response()->json(['state' => 'error']);
        }
    }

    public function updatePreference(Request $request)
    {
        try {
            $formatted_array = [
                'dialog_allowed' => $request->chat,
                'music_allowed' => $request->music,
                'smoking_allowed' => $request->smoke,
                'pet_allowed' => $request->pet,
                'user_id' => Auth::user()->id
            ];
            $preference = Preferences::where('user_id', Auth::user()->id)->first();
            if ($preference == null) {
                Preferences::create($formatted_array);
            } else {
                $preference->update($formatted_array);
            }
            session()->flash('success_message', trans('message.profile.preference_update'));
            return response()->json(['state' => 'success']);
        } catch (\Throwable $th) {
            throw $th;
            return response()->json(['state' => 'error']);
        }
        

    }

    public function saveComplain(Request $request){
        try {
            $formatted_array = [
                'comment' => $request->comment,
                'listing_id' => $request->listing_id,
                'driver_id' => $request->driver_id,
                'complain_id' => $request->complain_id,
                'user_id' => Auth::user()->id
            ];
            $complain = ComplainsUsers::where('user_id', Auth::user()->id)->where('listing_id', $request->listing_id)->first();
            if ($complain == null) {
                ComplainsUsers::create($formatted_array);
            } else {
                $complain->update($formatted_array);
            }
            session()->flash('success_message', trans('message.profile.complain_update'));
            return response()->json(['state' => 'success']);
        } catch (\Throwable $th) {
            return response()->json(['state' => 'error']);
        }
    }

    public function savePaypalemail(Request $request){
        try {
            User::where('id', '=', Auth::user()->id)
                ->update([
                'paypal_email' => $request->paypal_email
                ]);
            return response()->json(['state' => 'success']);
        } catch (\Throwable $th) {
            return response()->json(['state' => 'error']);
        }
    }

    public function demandRegister(Request $request)
    {
        $heading = $request->support_heading;
        $category_id = $request->demand_category_id;
        $message = $request->description;
        if ($request['file'] != 'null') {

            $file = $request->file('file');
            $destinationPath = 'uploads/demands';
            if (!File::isDirectory($destinationPath)) {
                File::makeDirectory($destinationPath, 0777, true, true);
            }
            $ext = '.' . $file->getClientOriginalExtension();
            $name = str_replace($ext, date('d-m-Y-H-i') . $ext, $file->getClientOriginalName());
            $file->move($destinationPath, $name);
            $url = 'uploads/demands/' . $name;
            $attach = $url;
            $attach_name = $name;
            $attach_type = $file->getClientOriginalExtension();
        } else {
            $attach = "";
            $attach_name = null;
            $attach_type = null;
        }

        try {
            $manager = DemandCategoryManager::where('demand_category_id', $category_id)->orderBy('count_demands', 'ASC')->first();
            if (!is_null($manager)) {
                $support_id = $manager->user_id;
                $manager->count_demands = $manager->count_demands + 1;
                $manager->save();
            } else {
                $support_id = NULL;
            }
            if (DemandStatus::where('name', 'pending')->count() > 0) {
                $demand_status_id = DemandStatus::where('name', 'pending')->first()->id;
            } else {
                $demand_status_id = null;
            }
            if (Demands::where('name', $heading)->where('category_id', $category_id)->count() == 0) {

                $demand = Demands::create([
                    'user_id' => Auth::user()->id,
                    'name' => $heading,
                    'category_id' => $category_id,
                    'message' => $message,
                    'attach' => $attach,
                    'state' => 'not',
                    'support_id' => $support_id,
                    'demand_status_id' => $demand_status_id
                ]);

                $message = SupportMessage::create([
                    'body' => $message,
                    'user_id' => Auth::user()->id,
                    'receiver_id' => $support_id,
                    'attach_url' => $attach,
                    'attach_name' => $attach_name,
                    'attach_type' => $attach_type,
                    'room_id' => $demand->id
                ]);

                if (SupportMessageUnread::where('user_id', Auth::user()->id)->where('channel_name', $demand->id)->count() == 0) {
                    $support_message_unread = SupportMessageUnread::create([
                        'user_id' => Auth::user()->id,
                        'last_message' => $request->input('body'),
                        'receiver_id' => Auth::user()->id,
                        'channel_name' => $demand->id,
                        'support_id' => 0,
                        'complete' => false,
                        'unread' => 1
                    ]);
                } else {
                    $support_message_unread = SupportMessageUnread::where('user_id', Auth::user()->id)->where('channel_name', $demand->id)->first();
                    $support_message_unread->unread = $support_message_unread->unread + 1;
                    $support_message_unread->last_message = $request->input('body');
                    $support_message_unread->save();
                }
        
                broadcast(new SupportMessageCreated($message))->toOthers();
            }
            $demandObjects = Demands::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
            if ($request->device == 'mobile') {
                return view('profile.support_table_mobile', compact('demandObjects'))->render();
            }
            return view('includes.demand_table', compact('demandObjects'))->render();
        } catch (Exception $exception) {

            return response()->json(['state' => 'error']);
        }
    }

    public function book(Request $request){
        try {
            $listing = Listings::findOrFail($request->trip_id);
            if(Bookings::where('user_id', Auth::user()->id)->where('listing_id', $request->trip_id)->count() > 0){
                return response()->json(['state' => 'error', 'message' => trans('message.profile.book_already')]);
            }
            else{
                if(is_null($request->amount)){
                    $amount = $listing->price_per_seat;
                }
                else{
                    $amount = $request->amount;
                }
                $booking = Bookings::create([
                    'user_id' => Auth::user()->id,
                    'listing_id' => $request->trip_id,
                    'type' => $request->way,
                    'status' =>  'pending',
                    'additional_info' => '',
                    'total_people' => 1,
                    'body_type_id' => $request->body_type_id,
                    'driver_id' => $listing->user_id,
                    'amount' => $amount,
                    'currency' => 'UZS',
                    'active' => true,
                ]);

                if (Rooms::where('sender_id', Auth::user()->id)->where('receiver_id', $listing->user_id)->where('listing_id', $listing->id)->count() == 0) {
                    $room = Rooms::create([
                        'sender_id' => Auth::user()->id,
                        'receiver_id' => $listing->user_id,
                        'listing_id' => $listing->id
                    ]);
                } 

                if(BookingSeat::where('booking_id', $booking->id)->count() == 0){
                    $trip_place = explode(",", $request->trip_place);
                    foreach ($trip_place as $item) {
                        BookingSeat::create([
                            'booking_id' => $booking->id,
                            'seat_number' => $item
                        ]);
                    }
                }
                return response()->json(['state' => 'success']);
            }
        } catch (\Throwable $th) {
            return response()->json(['state' => 'error', 'message' => 'error']);
        }
    }

    public function bookings(){
        $bookings = Bookings::select(
                    'bookings.*',
                    'listings.id as listing_id',
                    'reviews.id as review_id'
                    )
                    ->where('bookings.user_id', Auth::user()->id)
                    ->where('bookings.driver_id', '!=' , Auth::user()->id)
                    ->where('bookings.canceled', false)
                    ->where('listings.starting_date', '>', now())
                    ->leftjoin('listings','listings.id','=','bookings.listing_id')
                    ->leftjoin('reviews', 'reviews.booking_id','=','bookings.id')
                    ->orderBy('bookings.id', 'desc')
                    ->get();
        return view('checkbooking.bookings', compact('bookings'));
    }

    public function leaveReview(Request $request){
        $booking = Bookings::findOrfail($request->id);
        return view('profile.leave-review', compact('booking'));
    }

    public function saveReview(Request $request){
        $booking = Bookings::findOrfail($request->id);
        $booking->update(['completed' => true]);
        $data = [
            'writer_id' => Auth::user()->id,
            'receiver_id' => $booking->listing->user_id,
            'title' => $request->title,
            'comment' => $request->comment,
            'score' => $request->score,
            'booking_id' => $request->id
        ];
        Reviews::create($data);
        return redirect()->route('profile', ['locale' => app()->getLocale(), 'tab' => 'left_feedback']);
        
    }

    public function updateReview(Request $request)
    {
        $review = Reviews::findOrfail($request->id);
        $review->update(array(
            'title' => $request->title,
            'comment' => $request->comment,
            'score' => $request->score
        ));
        return redirect()->route('profile', ['locale' => app()->getLocale(), 'tab' => 'left_feedback']);
        
    }

    public function infoSave(Request $request)
    {
        
        try {
            if (is_array($request->type)) {
                $type = [];
                foreach ($request->type as  $item) {
                    array_push($type, $item);
                }
                $type = implode(",", $type);
            } else {
                $type = "";
            }
            if(Info::where('user_id', Auth::user()->id)->count() > 0){
                session()->flash('success_message', trans('message.profile.comment_alread'));
                return redirect()->route('acc-control', app()->getLocale());
            }
            else{

                $info = Info::create([
                    'user_id' => Auth::user()->id,
                    'comment' => $request->comment,
                    'type' => $type
                ]);
                session()->flash('success_message', trans('message.profile.thank_you_comment'));
                return redirect()->route('acc-control', app()->getLocale());
            }
        } catch (\Throwable $th) {
            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('message.error_request')]);
        }
    }

    public function saveSearch(Request $request){
        try {

            $address1 = json_decode($request->address1_component);
            $city1 = "";
            for ($i = 0; $i < count($address1); $i++) {
                $data['key'] = $address1[$i]->types[0];
                $data['name'] = $address1[$i]->long_name;
                $result[$i] = $data;
                switch ($data['key']) {
                    case "street_number":
                        $street1 = $data['name'];
                        break;
                    case "subpremise":
                        $building1 = $data['name'];
                        break;
                    case "route":
                        $district1 = $data['name'];
                        break;
                    case "locality":
                        $city1 = $data['name'];
                        break;
                    case "administrative_area_level_1":
                        $state1 = $data['name'];
                        break;
                    case "country":
                        $country1 = $data['name'];
                        break;
                }
            }

            $address2 = json_decode($request->address2_component);
            $city2 = "";
            for ($i = 0; $i < count($address2); $i++) {
                $data['key'] = $address2[$i]->types[0];
                $data['name'] = $address2[$i]->long_name;
                $result[$i] = $data;
                switch ($data['key']) {
                    case "street_number":
                        $street2 = $data['name'];
                        break;
                    case "subpremise":
                        $building2 = $data['name'];
                        break;
                    case "route":
                        $district2 = $data['name'];
                        break;
                    case "locality":
                        $city2 = $data['name'];
                        break;
                    case "administrative_area_level_1":
                        $state2 = $data['name'];
                        break;
                    case "country":
                        $country2 = $data['name'];
                        break;
                }
            }

            SearchTrips::create([
                'user_id' => Auth::user()->id,
                'from_full' => $request->from_address,
                'from_city' => $city1,
                'to_full' => $request->to_address,
                'to_city' => $city2,
                'starting_date' => $request->date,
                'place' => $request->place
            ]);

            return response()->json(['state' => 'success']);
        } catch (\Throwable $th) {
            return response()->json(['state' => 'error']);
        }
    }
    
    public function destroySearchTrip($locale, $id){
        try {
            $searchTrip = SearchTrips::findOrFail($id);
            $searchTrip->delete();

            return redirect()->route('trip-alerts', app()->getLocale());
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('message.error_request')]);
        }
    }

    public function destroyReview($locale, $id){
        try {
            $reviews = Reviews::findOrFail($id);
            $reviews->delete();

            return redirect()->route('profile', ['locale' => app()->getLocale(), 'tab' => 'left_feedback']);
            
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('message.error_request')]);
        }
    }

    public function releaseFunds(Request $request){
        try {
            $booking = Bookings::findOrfail($request->id);
            $driver = User::findOrfail($booking->driver_id);
            $amount = $booking->amount;
            $fee = $amount * 0.1;
            $commission = $amount * 0.1;
            $driver->balance  = $driver->balance + 0.8 * $amount;
            $driver->update(['balance' => $driver->balance]);
            $booking->update(array('status' => 'released'));
            $transaction = Transactions::create([
                'user_id' => $driver->id,
                'amount' => 0.8 * $amount,
                'method' => 'escrow',
                'state' => 'completed',
                'type' => 'book',
                'comment' => 'charged from booking',
                'balance' => $driver->balance
            ]);
            $user = User::findOrfail($booking->user_id);
            $user->balance  = $user->balance - $amount;
            $user->update(['balance' => $user->balance]);
            $user_amount = 0 - $amount;
            $transaction = Transactions::create([
                'user_id' => $user->id,
                'amount' => $user_amount,
                'method' => 'escrow',
                'state' => 'completed',
                'type' => 'book',
                'comment' => 'released from booking',
                'balance' => $user->balance
            ]);
            return redirect()->route('bookings', app()->getLocale());
        } catch (\Throwable $th) {
            //throw $th;
            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('message.error_request')]);
        }
    }

    public function filter_booking(Request $request){
        try {
            $combined_date_and_time1 = $request->from_date . ' ' . '24:00';
            $starting_date_timestamp1 = strtotime($combined_date_and_time1);
            $combined_date_and_time2 = $request->to_date . ' ' . '00:00';
            $starting_date_timestamp2 = strtotime($combined_date_and_time2);
            $from_date = date('Y-m-d H:i:s', $starting_date_timestamp1);
            $to_date = date('Y-m-d H:i:s', $starting_date_timestamp2);

            $query= Bookings::select('bookings.*')
            ->leftjoin('listings','bookings.listing_id','=','listings.id')
            ->leftjoin('locations as from_position','from_position.id','=','listings.location_id')
            ->leftjoin('locations as to_position','to_position.id','=','listings.destination_id')
            ->where('bookings.user_id', '=', Auth::user()->id);
            if($request->details != null)
                    $query->where(function ($query) use ($request) {
                        $query->where('from_position.city', $request->details)
                            ->orWhere('to_position.city', $request->details);
                    });
            if($request->from_amount != null)
                    $query->where('bookings.amount','>=',$request->from_amount);
            if($request->to_amount != null)
                    $query->where('bookings.amount','<=',$request->to_amount);
            if($request->from_date != null)
                    $query->where('bookings.created_at','<=',$from_date);
            if($request->to_date != null)
                    $query->where('bookings.created_at','>=',$to_date);
            if($request->active != null)
                    $query->where('bookings.active', $request->active);
            $bookings = $query->get();
            $data['template'] = view('profile.bookings_table', compact('bookings'))->render();
            $data['template_mobile'] = view('profile.bookings_table_mobile', compact('bookings'))->render();
            return $data;
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function filter_transaction(Request $request){
        try {
            $combined_date_and_time1 = $request->from_date . ' ' . '24:00';
            $starting_date_timestamp1 = strtotime($combined_date_and_time1);
            $combined_date_and_time2 = $request->to_date . ' ' . '00:00';
            $starting_date_timestamp2 = strtotime($combined_date_and_time2);
            $from_date = date('Y-m-d H:i:s', $starting_date_timestamp1);
            $to_date = date('Y-m-d H:i:s', $starting_date_timestamp2);

            $query= Transactions::where('user_id', '=', Auth::user()->id);
            if($request->details != null)
                    $query->where('type','=',$request->details);
            if($request->from_amount != null)
                    $query->where('amount','>=',$request->from_amount);
            if($request->to_amount != null)
                    $query->where('amount','<=',$request->to_amount);
            if($request->from_date != null)
                    $query->where('created_at','<=',$from_date);
            if($request->to_date != null)
                    $query->where('created_at','>=',$to_date);
            $transactions = $query->get();
            $data['template'] = view('profile.transactions_table', compact('transactions'))->render();
            $data['template_mobile'] = view('profile.transactions_table_mobile', compact('transactions'))->render();
            return $data;
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function filter_support(Request $request){
        try {
            $combined_date_and_time1 = $request->from_date . ' ' . '24:00';
            $starting_date_timestamp1 = strtotime($combined_date_and_time1);
            $combined_date_and_time2 = $request->to_date . ' ' . '00:00';
            $starting_date_timestamp2 = strtotime($combined_date_and_time2);
            $from_date = date('Y-m-d H:i:s', $starting_date_timestamp1);
            $to_date = date('Y-m-d H:i:s', $starting_date_timestamp2);

            $query= Demands::select('demands.*')
            ->leftjoin('demand_status','demands.demand_status_id','=','demand_status.id')
            ->where('user_id', '=', Auth::user()->id);
            if($request->details != null)
                    $query->where('demands.name','ilike', '%'.$request->details. '%');
            if($request->status_support != null)
                    $query->where('demand_status.name','=',$request->status_support);
            if($request->from_date != null)
                    $query->where('demands.created_at','<=',$from_date);
            if($request->to_date != null)
                    $query->where('demands.created_at','>=',$to_date);
            if($request->type == 'active')
                    $query->where('demands.archive','=',false);
            if($request->type == 'archive')
                    $query->where('demands.archive','=',true);
            $demandObjects = $query->get();
            $data['template'] = view('includes.demand_table', compact('demandObjects'))->render();
            $data['template_mobile'] = view('profile.support_table_mobile', compact('demandObjects'))->render();
            return $data;
        } catch (\Throwable $th) {
            //throw $th;
            echo $th;
            exit;
        }
    }

    protected function checkPhoneNumber($phone, $all = true)
    {
        //очистка от лишнего мусора
        $phoneFormat = '+' . preg_replace("/[^0-9A-Za-z]/", "", $phone);

        //проверка номера мир
        $pattern_world = "/^\+?([87](?!95[4-79]|99[08]|907|94[^0]|336)([348]\d|9[0-6789]|7[0247])\d{8}|[1246]\d{9,13}|68\d{7}|5[1-46-9]\d{8,12}|55[1-9]\d{9}|55[12]19\d{8}|500[56]\d{4}|5016\d{6}|5068\d{7}|502[45]\d{7}|5037\d{7}|50[4567]\d{8}|50855\d{4}|509[34]\d{7}|376\d{6}|855\d{8}|856\d{10}|85[0-4789]\d{8,10}|8[68]\d{10,11}|8[14]\d{10}|82\d{9,10}|852\d{8}|90\d{10}|96(0[79]|17[01]|13)\d{6}|96[23]\d{9}|964\d{10}|96(5[69]|89)\d{7}|96(65|77)\d{8}|92[023]\d{9}|91[1879]\d{9}|9[34]7\d{8}|959\d{7}|989\d{9}|97\d{8,12}|99[^4568]\d{7,11}|994\d{9}|9955\d{8}|996[57]\d{8}|9989\d{8}|380[3-79]\d{8}|381\d{9}|385\d{8,9}|375[234]\d{8}|372\d{7,8}|37[0-4]\d{8}|37[6-9]\d{7,11}|30[69]\d{9}|34[67]\d{8}|3[12359]\d{8,12}|36\d{9}|38[1679]\d{8}|382\d{8,9}|46719\d{10})$/";
        //проверка номера снг
        $pattern_sng = "/^((\+?7|8)(?!95[4-79]|99[08]|907|94[^0]|336)([348]\d|9[0-6789]|7[0247])\d{8}|\+?(99[^4568]\d{7,11}|994\d{9}|9955\d{8}|996[57]\d{8}|9989\d{8}|380[34569]\d{8}|375[234]\d{8}|372\d{7,8}|37[0-4]\d{8}))$/";

        if ($all) {
            $patt = $pattern_world;
        } else {
            $patt = $pattern_sng;
        }

        if (!preg_match($patt, $phoneFormat)) {
            return array('phone' => $phoneFormat, 'check' => false);
        }

        return array('phone' => $phoneFormat, 'check' => true);
    }

}
