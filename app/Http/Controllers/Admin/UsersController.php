<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Models\Roles;
use App\Models\DriverLisence;
use App\Models\Transactions;
use App\Models\Message;
use App\Models\Passport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\File;
use App\Models\AdminUserChat;
use App\Models\Withdraws;

class UsersController extends AdminController
{

    /**
     * Display a listing of the users.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {

        if (!Gate::allows('user_access')) {
            return abort(401);
        }
        $usersObjects = User::orderBy('id', 'desc')->get();
        $roles = Roles::paginate(25);
        return view('admin.users.index', compact('usersObjects', 'roles'));
    }

    /**
     * Show the form for creating a new users.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        // if (!Gate::allows('user_create')) {
        //     return abort(401);
        // }
        $roles = Roles::pluck('title', 'id')->all();
        $methods = "create";
        return view('admin.users.create', compact('roles', 'methods'));
    }

    /**
     * Store a new users in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            // if (!Gate::allows('user_create')) {
            //     return abort(401);
            // }
            if (!empty($request['upload_image'])) {
                $file = $request->file('upload_image');
                $destinationPath = 'uploads/avatar';
                $ext = '.' . $file->getClientOriginalExtension();
                $name = str_replace($ext, date('d-m-Y-H-i') . $ext, $file->getClientOriginalName());
                $name = str_replace(' ', "_", $name);
                // echo $name;
                $file->move($destinationPath, $name);
                $request['avatar'] = 'uploads/avatar/' . $name;
            }
            $data = $this->getData($request);
            $data['password'] = Hash::make($request['password']);

            $user = User::create($data);
            $user->role()->sync(array_filter((array) $request->input('role_id')));
            

            return redirect()->route('admin.users.index', app()->getLocale())
                ->with('success_message', trans('message.user.success_add'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('message.error_request')]);
        }
    }

    /**
     * Display the specified users.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($locale, $id)
    {

        // if (!Gate::allows('user_view')) {
        //     return abort(401);
        // }
        // echo $request['locale'];
        // foreach($request as $k=>$v){
        //     echo $k.'/n';
        // }
        // exit;
        $users = User::findOrFail($id);

        return view('admin.users.show', compact('users'));
    }

    public function curator($locale, $id)
    {
        $levelOne = User::where('invited_id', $id)->count();
        $levelCounts = [];
        $this->curatorCount($id, $levelCounts, 0);
        return view('admin.users.curator', compact('levelCounts', 'id'));
    }

    public function level1($locale, $id)
    {
        $levelOneUsers = User::where('invited_id', $id)->get();
        $levelTotal = [];
        $levelCounts = [];
        foreach ($levelOneUsers as $user) {
            $this->curatorCount($user->id, $levelCounts, 0);
            if (is_array($levelCounts)) {
                $levelTotal[$user->id] = $levelCounts;
            } else {
                $levelTotal[$user->id] = 0;
            }
        }
        // dd($levelTotal);
        // dd($levelTotal);
        // $this->curatorCount($id, $levelCounts, 0);
        return view('admin.users.level1', compact('levelOneUsers', 'levelCounts', 'levelTotal', 'id'));
    }

    protected function curatorTotal($id, &$levelCounts, $level)
    {
        if (!isset($levelCounts[$level])) $levelCounts[$level] = 0;
        $levelCounts[$level] += User::where('invited_id', $id)->count();
        $levelUsers = User::where('invited_id', $id)->get();
        foreach ($levelUsers as $user) {
            $this->curatorCount($user->id, $levelCounts, $level + 1);
        }
        return $levelCounts;
    }

    protected function curatorCount($id, &$levelCounts, $level)
    {
        if (!isset($levelCounts[$level])) $levelCounts[$level] = 0;
        $levelCounts[$level] += User::where('invited_id', $id)->count();
        $levelUsers = User::where('invited_id', $id)->get();
        foreach ($levelUsers as $user) {
            $this->curatorCount($user->id, $levelCounts, $level + 1);
        }
    }

    /**
     * Show the form for editing the specified users.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($locale, $id, Request $request)
    {
        // if (!Gate::allows('user_edit')) {
        //     return abort(401);
        // }
        $users = User::findOrFail($id);
        $roles = Roles::pluck('title', 'id')->all();
        $cars = DB::table('cars')->where('user_id', $id)->orderBy('id', 'ASC')->get();
        $trucks = DB::table('trucks')->where('user_id', $id)->orderBy('id', 'ASC')->get();
        $passport = DB::table('passport')->where('user_id', $id)->first();
        $body_types = DB::table('body_types')->get();
        $brands = DB::table('car_brands')->get();
        $models = DB::table('car_models')->get();
        $categories = DB::table('lisence_categories')->get();
        $colors = DB::table('colors')->get();
        $transactions = Transactions::where('user_id', '=', $id)->get();
        $methods = "edit";
        $today_messages = [];
        $messages_dates = [];
        $messages = [];

        $dates = Message::where('messages.room_id', $users->id)
            ->where('messages.type', 'admin')
            ->select(DB::raw('DATE(created_at) as date'))
            ->orderBy('date', 'ASC')
            ->groupBy('date')
            ->get();

        foreach ($dates as $item) {
            if (!isset($messages_dates[$item->date])) {
                $messages = Message::select(
                    'messages.id',
                    'messages.body',
                    'messages.user_id',
                    'messages.created_at',
                    'messages.edited',
                    'messages.deleted',
                    'messages.attach_name',
                    'messages.attach_type',
                    'messages.attach_url',
                    'messages.seen',
                    'messages.reply_message_id',
                    'messages_reply.body as replyContent',
                    'replyer.name as replyName',
                    'sender.name as sender_name',
                    'sender.avatar as sender_avatar'
                )
                ->where('messages.type', 'admin')
                ->where('messages.room_id', $users->id)
                ->where('messages.created_at', 'LIKE', '%' . $item->date . '%')
                ->orderBy('messages.id', 'ASC')
                ->leftjoin('messages as messages_reply', 'messages_reply.id', '=', 'messages.reply_message_id')
                ->leftjoin('users as sender', 'sender.id', '=', 'messages.user_id')
                ->leftjoin('users as replyer', 'replyer.id', '=', 'messages_reply.user_id')
                ->get();
               
                if (date('Y-m-d') == $item->date) {
                    $today_messages  = $messages;
                } else {
                    $messages_dates[$item->date]  = $messages;
                }
            }
        }
   
        if (AdminUserChat::where('user_id', $users->id)->count() > 0) {
            $archive = AdminUserChat::where('user_id', $users->id)->first()->archive;
        }
        else{
            $archive = false;
        }
        return view('admin.users.edit', compact(
                'users', 
                'roles', 
                'methods', 
                'cars', 
                'trucks', 
                'body_types', 
                'passport', 
                'categories', 
                'transactions', 
                'messages', 
                'brands', 
                'models', 
                'colors',
                'archive',
                'today_messages',
                'messages_dates'
            ));
    }

    public function edit_main($locale, $id, Request $request)
    {
        try {
            if (!empty($request['upload_image'])) {
                $file = $request->file('upload_image');
                $destinationPath = 'uploads/photos';
                if (!File::isDirectory($destinationPath)) {

                    File::makeDirectory($destinationPath, 0777, true, true);
                }
                $ext = '.' . $file->getClientOriginalExtension();
                $name = str_replace($ext, date('d-m-Y-H-i') . $ext, $file->getClientOriginalName());
                $name = str_replace(' ', "_", $name);
                // echo $name;
                $file->move($destinationPath, $name);
                $request['image'] = 'uploads/photos/' . $name;
                DB::table('users')->where('id', $id)->update(array('avatar' => $request['image']));
            }else{
                DB::table('users')->where('id', $id)->update(array('avatar' => null));
            }
            if (!empty($request['password'])) {
                $password = Hash::make($request['password']);
                DB::table('users')->where('id', $id)->update(array('password' => $password));
            }
            if (empty($request['active'])) {$request['active'] = false;}

            $users = User::findOrFail($id);
            $users->update(array(
                'name' => $request['name'],
                'surname' => $request['surname'],
                'middle_name' => $request['middle_name'],
                'language' => $request['language'],
                'phone' => $request['phone'],
                'email' => $request['email'],
                'active' => $request['active']
            ));

            $users->role()->sync(array_filter((array) $request->input('role_id')));

            return redirect()->route('admin.users.edit', ['locale' => app()->getLocale(), 'id' => $id, 'tab' => 'main'])
                ->with('success_message', trans('message.user.success_update'));
        } catch (Exception $exception) {
            // echo $exception;
            return back()->withInput()
                ->withErrors(['unexpected_error' =>  trans('message.error_request')]);
        }
    }
    public function edit_car($locale, $id, Request $request)
    {
        try {
            $count = $request->car_count;
            for($i = 1;$i <= $count;$i++){
                if($request['car_id'.$i] == null){
                    DB::table('cars')->insert(
                        [
                            'name' => $request['name'.$i],
                            'model' => $request['model'.$i],
                            'body_type' => $request['type'.$i],
                            'color' => $request['color'.$i],
                            'number' => $request['number'.$i],
                            'year' => $request['year'.$i],
                            'user_id' => $id
                        ]
                    );
                }
                else{
                    DB::table('cars')->where('id', $request['car_id'.$i])->update(array('name' => $request['name'.$i],'model' => $request['model'.$i],'body_type' => $request['type'.$i],
                    'color' => $request['color'.$i],'number' => $request['number'.$i],'year' => $request['year'.$i]));
                }
            }
            return redirect()->route('admin.users.edit', ['locale' => app()->getLocale(), 'id' => $id, 'tab' => 'auto'])
                ->with('success_message', trans('message.car.success_update'));
        } catch (Exception $exception) {
            // echo $exception;
            return back()->withInput()
                ->withErrors(['unexpected_error' =>  trans('message.error_request')]);
        }
    }
    public function edit_truck($locale, $id, Request $request)
    {
        try {
            $count = $request->truck_count;
            for($i = 1;$i <= $count;$i++){
                if($request['truck_id'.$i] == null){
                    DB::table('trucks')->insert(
                        [
                            'name' => $request['name'.$i],
                            'model' => $request['model'.$i],
                            'body_type_id' => $request['body_type_id'.$i],
                            'color' => $request['color'.$i],
                            'number' => $request['number'.$i],
                            'year' => $request['year'.$i],
                            'carcase_type' => $request['carcase_type'.$i],
                            'capacity' => $request['capacity'.$i],
                            'place' => $request['place'.$i],
                            'max_size' => $request['max_size'.$i],
                            'user_id' => $id
                        ]
                    );
                }
                else{
                    DB::table('trucks')->where('id', $request['truck_id'.$i])->update(array('name' => $request['name'.$i],'model' => $request['model'.$i],'body_type_id' => $request['body_type_id'.$i],
                    'color' => $request['color'.$i],'number' => $request['number'.$i],'year' => $request['year'.$i],'carcase_type' => $request['carcase_type'.$i],
                    'capacity' => $request['capacity'.$i],'place' => $request['place'.$i],'max_size' => $request['max_size'.$i]));
                }
            }
            return redirect()->route('admin.users.edit', ['locale' => app()->getLocale(), 'id' => $id, 'tab' => 'truck'])
                ->with('success_message', trans('message.truck.success_update'));
        } catch (Exception $exception) {
            // echo $exception;
            return back()->withInput()
                ->withErrors(['unexpected_error' =>  trans('message.error_request')]);
        }
    }

    public function edit_passport($locale, $id, Request $request)
    {
        try {
            if($request['passport_id'] == null){
                if($request['passport_verified'] == null) $verified = false;
                else $verified = true;
                if($request['passport_issued_date'] != null){
                    $starting_date_timestamp = strtotime($request['passport_issued_date']);
                    $date = date('Y-m-d H:i:s', $starting_date_timestamp);
                }
                else{
                    $date = null;
                }
                DB::table('passport')->insert(
                    [
                        'series' => $request['passport_series'],
                        'room' => $request['passport_room'],
                        'department_code' => $request['passport_department_code'],
                        'issued_by' => $request['passport_issued_by'],
                        'issued_date' => $date,
                        'place_residence' => $request['passport_place_residence'],
                        'verified' => $verified,
                        'user_id' => $id
                    ]
                );
            }
            else{
                if($request['passport_verified'] == null) $verified = false;
                else $verified = true;
                if($request['passport_issued_date'] != null){
                    $starting_date_timestamp = strtotime($request['passport_issued_date']);
                    $date = date('Y-m-d H:i:s', $starting_date_timestamp);
                }
                else{
                    $date = null;
                }
                DB::table('passport')
                ->where('id', $request['passport_id'])
                ->update(array(
                    'series' => $request['passport_series'],
                    'room' => $request['passport_room'],
                    'department_code' => $request['passport_department_code'],
                    'issued_by' => $request['passport_issued_by'],
                    'place_residence' => $request['passport_place_residence'],
                    'issued_date' => $date,
                    'verified' => $verified)
                );
            }
            $users = User::findOrFail($id);
            // $users->update(['name' => $request['name'],'surname' => $request['surname'], 'middle_name' => $request['middle_name']]);

            return redirect()->route('admin.users.edit', ['locale' => app()->getLocale(), 'id' => $id, 'tab' => 'passport'])
                ->with('success_message', trans('message.passport.success_update'));
        } catch (Exception $exception) {
            // echo $exception;
            return back()->withInput()
                ->withErrors(['unexpected_error' =>  trans('message.error_request')]);
        }
    }

    public function edit_lisence($locale, $id, Request $request)
    {
        // try {
            if($request['lisence_id'] == null){
                if($request['lisence_verified'] == null) $verified = false;
                else $verified = true;
                $lisenceid = DB::table('driver_lisence')->insertGetId(
                    [
                        'document_no' => $request['document_no'],
                        'verified' => $verified,
                        'user_id' => $id
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
                if($request['lisence_verified'] == null) $verified = false;
                else $verified = true;
                DB::table('driver_lisence')->where('id', $request['lisence_id'])->update(array('document_no' => $request['document_no'],'verified' => $verified));
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
            $users = User::findOrFail($id);
            // $users->update(['name' => $request['name'],'surname' => $request['surname'], 'middle_name' => $request['middle_name']]);
            return redirect()->route('admin.users.edit', ['locale' => app()->getLocale(), 'id' => $id, 'tab' => 'driver_license'])
                ->with('success_message', trans('message.driver_license.success_update'));
        // } catch (Exception $exception) {
        //     // echo $exception;
        //     return back()->withInput()
        //         ->withErrors(['unexpected_error' =>  trans('message.error_request')]);
        // }
    }

    /**
     * Update the specified users in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($locale, $id, Request $request)
    {

        // if (!Gate::allows('user_edit')) {
        //     return abort(401);
        // }
        $users = User::findOrFail($id);
        try {
            if (!empty($request['upload_image'])) {
                $file = $request->file('upload_image');
                $destinationPath = 'uploads/avatar';
                $ext = '.' . $file->getClientOriginalExtension();
                $name = str_replace($ext, date('d-m-Y-H-i') . $ext, $file->getClientOriginalName());
                // echo $name;
                $file->move($destinationPath, $name);
                $request['avatar'] = 'uploads/avatar/' . $name;
            } elseif ($request['delete_image'] == 'delete') {

                $request['avatar'] = null;
                $image_path = $users->img_url;
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
            }
            $data = $this->getData($request);
            if (!empty($request['password'])) {
                $data['password'] = Hash::make($request['password']);
            }

            $users->update($data);
            $users->role()->sync(array_filter((array) $request->input('role')));

            if ($request->teacher_edit) {

                return redirect()->route('admin-dashboard', app()->getLocale())
                    ->with('success_message', trans('message.user.success_update'));
            } else {
                return redirect()->route('admin.users.index', app()->getLocale())
                    ->with('success_message', trans('message.user.success_update'));
            }
        } catch (Exception $exception) {
            // echo $exception;
            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('message.error_request')]);
        }
    }

    /**
     * Remove the specified users from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($locale, $id)
    {
        // if (!Gate::allows('user_delete')) {
        //     return abort(401);
        // }
        try {
            $users = User::findOrFail($id);
            $users->delete();

            return redirect()->route('admin.users.index')
                ->with('success_message', trans('message.user.success_delete'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('message.error_request')]);
        }
    }

    public function massDestroy(Request $request)
    {
        // if (!Gate::allows('user_delete')) {
        //     return abort(401);
        // }
        if ($request->input('ids')) {
            $entries = User::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

    public function search(Request $request)
    {
        $users = User::where('name', 'ilike', '%' . $request->input('term', '') . '%')
            ->get(['name as text', 'id']);
        return ['results' => $users];
    }

    public function loginAs()
    {
        //get the id from the post
        $id = request('user_id');
        //if session exists remove it and return login to original user
        if (session()->get('hasClonedUser') == 1) {
            auth()->loginUsingId(session()->remove('hasClonedUser'));
            session()->remove('hasClonedUser');
            return redirect()->route('admin.users.index', app()->getLocale());
        }

        //only run for developer, clone selected user and create a cloned session
        if (auth()->user()->id == 1) {
            $user = User::findOrFail($id);
            session()->put('hasClonedUser', auth()->user()->id);
            auth()->loginUsingId($id);
            if ($user->role()->where('title', 'Simple user')->count() > 0) {
                // return redirect('/');
                return redirect()->route('profile', ['locale' => app()->getLocale(), 'tab' => 'personal_data']);
            }
            else if($user->role()->where('title', 'Support employee')->count() > 0){
                return redirect()->route('admin.support.index', app()->getLocale());
            }
            else if($user->role()->where('title', 'Accountant')->count() > 0){
                return redirect()->route('admin.transactions.index', app()->getLocale());
            }
            else if($user->role()->where('title', 'Content manager')->count() > 0){
                return redirect()->route('admin.pages.index', app()->getLocale());
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
            'name' => 'string|min:1|max:255|nullable',
            'email' => 'nullable',
            'phone' => 'string|min:1|nullable',
            'role_id' => 'numeric|nullable',
            'course_position' => 'numeric|nullable',
            'lesson_position' => 'numeric|nullable',
            'isVerified' => 'nullable',
            'avatar' => 'nullable',
            'invited_id' => 'nullable',
            'active' => 'nullable'
        ];

        $data = $request->validate($rules);


        return $data;
    }

    public function filter(Request $request)
    {
        $query= User::select('users.*')->orderBy('id', 'ASC')
        ->join('role_user','users.id','=','role_user.user_id');
        if($request->user_id != null)
            $query->where('users.id','=',$request->user_id);
        if($request->user_name != null)
            $query->where('users.name', 'ilike', '%' . $request->user_name . '%');
        if($request->user_email != null)
            $query->where('users.email', 'ilike', '%' . $request->user_email. '%');
        if($request->user_role != null)
            $query->where('role_user.roles_id','=',$request->user_role);
        if($request->confirmed == '1')
            $query->where('users.active','=',true);
        else if($request->confirmed == '0')
            $query->where('users.active','=',false);
        $usersObjects = $query->get();

        $data['template'] = view('admin.users.table_template', compact('usersObjects'))->render();
        $data['template_mobile'] = view('admin.users.table_template_mobile', compact('usersObjects'))->render();
        return $data;
    }

    public function transaction_filter(Request $request)
    {
        $combined_date_and_time1 = $request->from_date . ' ' . '24:00';
        $starting_date_timestamp1 = strtotime($combined_date_and_time1);
        $combined_date_and_time2 = $request->to_date . ' ' . '00:00';
        $starting_date_timestamp2 = strtotime($combined_date_and_time2);
        $from_date = date('Y-m-d H:i:s', $starting_date_timestamp1);
        $to_date = date('Y-m-d H:i:s', $starting_date_timestamp2);
        $query = Transactions::orderBy('created_at','desc')->where('user_id', '=', $request->user_id);
        if($request->status != null)
            $query->where('state', '=', $request->status);
        if($request->method != null)
            $query->where('method', '=', $request->method);
        if($request->from_date != null)
            $query->whereBetween('created_at', [$to_date, $from_date]);
        $transactions = $query->get();
        $data['template'] = view('admin.users.transaction_template', compact('transactions'))->render();
        $data['template_mobile'] = view('admin.users.transaction_template_mobile', compact('transactions'))->render();
        return $data;
    }

    public function chat($locale, $id)
    {

        // if (!Gate::allows('user_view')) {
        //     return abort(401);
        // }
        // echo $request['locale'];
        // foreach($request as $k=>$v){
        //     echo $k.'/n';
        // }
        // exit;
        $users = User::findOrFail($id);
        // $messages = Message::where('type', 'admin')->where('receiver_id', $user->id)->get();
        $today_messages = [];
        $messages_dates = [];

        $dates = Message::where('messages.room_id', $users->id)
            ->where('messages.type', 'admin')
            ->select(DB::raw('DATE(created_at) as date'))
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get();
        $messages = [];
        foreach ($dates as $item) {
            if (!isset($messages_dates[$item->date])) {
                $messages = Message::select(
                    'messages.id',
                    'messages.body',
                    'messages.user_id',
                    'messages.created_at',
                    'messages.edited',
                    'messages.deleted',
                    'messages.attach_name',
                    'messages.attach_type',
                    'messages.attach_url',
                    'messages.reply_message_id',
                    'messages_reply.body as replyContent',
                    'replyer.name as replyName',
                    'sender.name as sender_name',
                    'sender.avatar as sender_avatar'
                )
                ->where('messages.type', 'admin')
                ->where('messages.room_id', $users->id)
                ->where('messages.created_at', 'LIKE', '%' . $item->date . '%')
                ->orderBy('messages.id', 'ASC')
                ->leftjoin('messages as messages_reply', 'messages_reply.id', '=', 'messages.reply_message_id')
                ->leftjoin('users as sender', 'sender.id', '=', 'messages.user_id')
                ->leftjoin('users as replyer', 'replyer.id', '=', 'messages_reply.user_id')
                ->get();

                if (date('Y-m-d') == $item->date) {
                    $today_messages  = $messages;
                } else {
                    $messages_dates[$item->date]  = $messages;
                }
            }
        }

        

        return view('admin.users.chat', compact(
            'users', 
            'messages',
            'today_messages',
            'messages_dates'
        ));
    }

    public function replenish($locale, $id, Request $request)
    {
        try {
            $user = User::findOrfail($id);
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
                'user_id' => $id,
                'amount' => $amount,
                'method' => 'admin',
                'state' => 'completed',
                'comment' => $request->comment,
                'balance' => $user->balance,
                'type' => $type
            ]);
            return redirect()->route('admin.users.edit', ['locale' => app()->getLocale(), 'id' => $id, 'tab' => 'balance'])
                ->with('success_message', trans('message.user.balance_success_update'));
        } catch (\Throwable $th) {
            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('message.error_request')]);
        }
    }

    public function withdraw($locale, $id, Request $request)
    {
        try {
            $user = User::findOrfail($id);
            $amount = floatval($request->amount);
            $user->balance  = $user->balance - $amount;
            // dd($amount * 1000);
            $user->save();
            if(is_array($request->type)){
                $type = [];
                foreach ($request->type as  $item) {
                    # code...
                    array_push($type, $item);
                }
                $type = implode(",", $type);
            }
            else{
                $type = "";
            }
            $transaction = Transactions::create([
                'user_id' => $id,
                'amount' => (0 - $amount),
                'method' => 'admin',
                'state' => 'completed',
                'comment' => $request->comment,
                'balance' => $user->balance,
                'type' => $type
            ]);

            $withdraws = Withdraws::create([
                'user_id' => $id,
                'amount' => $amount,
                'method' => 'admin',
                'status' => 'complete',
                'transactions_id' => $transaction->id,
            ]);

            return redirect()->route('admin.users.edit', ['locale' => app()->getLocale(), 'id' => $id, 'tab' => 'balance'])
                ->with('success_message', trans('message.user.balance_success_update'));
        } catch (\Throwable $th) {
            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('message.error_request')]);
        }
    }

    public function verify_pdf($locale, Request $request){
        // $user = User::findOrfail($id);
        try {
            $passport = Passport::where('user_id', $request->user_id);
            if($request->type == 'pdf1_verify'){
                $passport->update(['pdf1_verify' => true]);
                return response()->json(['state' => 'success']);
            }
            else if($request->type == 'pdf2_verify'){
                $passport->update(['pdf2_verify' => true]);
                return response()->json(['state' => 'success']);
            }
            else if($request->type == 'driver_license'){
                $license = DriverLisence::where('user_id', $request->user_id)->first();
                $license->update(['verified' => true]);
                return response()->json(['state' => 'success']);
            }
            return response()->json(['state' => 'error']);
        } catch (\Throwable $th) {
            //throw $th;
            echo $th;
            exit;
            return response()->json(['state' => 'error']);
        }
    }

    public function verify_pdf_delete($locale, Request $request){
        // $user = User::findOrfail($id);
        try {
            $passport = Passport::where('user_id', $request->user_id)->first();;
            if($request->type == 'pdf1_verify'){
                $passport->update(['pdf1_verify' => false, 'pdf1' => null, 'pdf1_extension' => null, 'verified' => false]);
                return response()->json(['state' => 'success']);
            } 
            else if($request->type == 'pdf2_verify'){
                $passport->update(['pdf2_verify' => false, 'pdf2' => null, 'pdf2_extension' => null, 'verified' => false]);
                return response()->json(['state' => 'success']);
            }
            else if($request->type == 'driver_license'){
                $license = DriverLisence::where('user_id', $request->user_id)->first();
                $license->update(['verified' => false, 'pdf' => null, 'pdf_extension' => null]);
                return response()->json(['state' => 'success']);
            }
            return response()->json(['state' => 'error']);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['state' => 'error']);
        }
    }

}