<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Demands;
use Illuminate\Support\Facades\DB;
use App\SupportMessage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Models\DemandStatus;
use App\Models\DemandCategory;
use App\User;
use App\Models\DemandComplexity;
use App\Models\DemandCriticality;
use App\Models\SupportLevels;
use App\Models\FastAnswer;
use App\Models\EmailTemplate;
use Illuminate\Support\Facades\Mail;
use Telegram\Bot\Laravel\Facades\Telegram;

class SupportController extends AdminController
{
    //
    public function __construct()
    {
        $this->middleware(['auth', 'active']);
    }

    public function index(Request $request)
    {

        // support
        if ($request->ajax()) {
            // $to_day = $request->start_date;
            // $date1 = str_replace('-', '/', $to_day);
            // $to_day = date('yy-m-d', strtotime($date1 . "+1 days"));
            // $from_day = $request->end_date;


            $combined_date_and_time1 = $request->from_date . ' ' . '24:00';
            $starting_date_timestamp1 = strtotime($combined_date_and_time1);
            $combined_date_and_time2 = $request->to_date . ' ' . '00:00';
            $starting_date_timestamp2 = strtotime($combined_date_and_time2);
            $to_day = date('Y-m-d H:i:s', $starting_date_timestamp1);
            $from_day = date('Y-m-d H:i:s', $starting_date_timestamp2);

            $demands_by_support = DB::select(DB::raw("select 
            support.*, users.name from 
            (SELECT support_id, last_author, count(demands.id) as counts
            FROM public.demands
            WHERE
                created_at >= '$from_day'
            AND created_at <= '$to_day'
            group by support_id, last_author)
            as support 
            Left join users on users.id=support.support_id"));
            // dd($demands_by_support);
            $demands_by_support_filter = [];
            foreach ($demands_by_support as $key => $value) {
                if (!isset($demands_by_support_filter[$value->support_id])) $demands_by_support_filter[$value->support_id] = [];
                $demands_by_support_filter[$value->support_id][$value->last_author] = $value->counts;
                $demands_by_support_filter[$value->support_id]['name'] = $value->name;
                $demands_by_support_filter[$value->support_id]['open'] = Demands::where('support_id', $value->support_id)->where('archive', false)->count();
                $demands_by_support_filter[$value->support_id]['total'] = Demands::where('support_id', $value->support_id)->count();
            }
            // state
            // $demands_by_state = DB::select(DB::raw("SELECT demand_status, last_author, count(demands.id) as counts
            // FROM public.demands
            // group by demand_status_id, last_author
            // Left join demand_status on demand_status.id=support.demand_status_id"
            
            $demands_by_state = DB::select(DB::raw("select 
            demands.*, demand_status.name as state from 
            (SELECT demand_status_id, last_author, count(demands.id) as counts
            FROM public.demands
             WHERE
                    created_at >= '$from_day'
                AND created_at <= '$to_day'
            group by demand_status_id, last_author)
            as demands
            Left join demand_status on demand_status.id=demands.demand_status_id"));

            $demands_by_state_filter = [];
            foreach ($demands_by_state as $key => $value) {
                if (!isset($demands_by_state_filter[$value->state])) $demands_by_state_filter[$value->state] = [];
                $demands_by_state_filter[$value->state][$value->last_author] = $value->counts;
                $demands_by_state_filter[$value->state]['open'] = Demands::where('demand_status_id', $value->demand_status_id)->where('archive', false)->count();
                $demands_by_state_filter[$value->state]['total'] = Demands::where('demand_status_id', $value->demand_status_id)->count();
            }

            // category
            $demands_by_category = DB::select(DB::raw("select 
            demands.*, demand_categories.name from 
            (SELECT category_id, last_author, count(demands.id) as counts
            FROM public.demands
            WHERE
                    created_at >= '$from_day'
                AND created_at <= '$to_day'
            group by category_id, last_author)
            as demands
            Left join demand_categories on demand_categories.id=demands.category_id"));
            $demands_by_category_filter = [];
            foreach ($demands_by_category as $key => $value) {
                if (!isset($demands_by_category_filter[$value->name])) $demands_by_category_filter[$value->name] = [];
                $demands_by_category_filter[$value->name][$value->last_author] = $value->counts;
                $demands_by_category_filter[$value->name]['open'] = Demands::where('category_id', $value->category_id)->where('archive', false)->count();
                $demands_by_category_filter[$value->name]['total'] = Demands::where('category_id', $value->category_id)->count();
            }

            // criticality
            $demand_by_criticality = DB::select(DB::raw("select 
            demands.*, demand_criticality.name as criticality from 
            (SELECT demand_criticality_id, last_author, count(demands.id) as counts
            FROM public.demands
             WHERE
                    created_at >= '$from_day'
                AND created_at <= '$to_day'
            group by demand_criticality_id, last_author)
            as demands
            Left join demand_criticality on demand_criticality.id=demands.demand_criticality_id"));

            $demands_by_criticality_filter = [];
            foreach ($demand_by_criticality as $key => $value) {
                if (!isset($demands_by_criticality_filter[$value->criticality])) $demands_by_criticality_filter[$value->criticality] = [];
                $demands_by_criticality_filter[$value->criticality][$value->last_author] = $value->counts;
                $demands_by_criticality_filter[$value->criticality]['open'] = Demands::where('demand_criticality_id', $value->demand_criticality_id)->where('archive', false)->count();
                $demands_by_criticality_filter[$value->criticality]['total'] = Demands::where('demand_criticality_id', $value->demand_criticality_id)->count();
            }

            // difficulty

            $demand_by_complexity = DB::select(DB::raw("select 
            demands.*, demand_complexity.name as complexity from 
            (SELECT demand_complexity_id, last_author, count(demands.id) as counts
            FROM public.demands
             WHERE
                    created_at >= '$from_day'
                AND created_at <= '$to_day'
            group by demand_complexity_id, last_author)
            as demands
            Left join demand_complexity on demand_complexity.id=demands.demand_complexity_id"));

            $demands_by_complexity_filter = [];
            foreach ($demand_by_complexity as $key => $value) {
                if (!isset($demands_by_complexity_filter[$value->complexity])) $demands_by_complexity_filter[$value->complexity] = [];
                $demands_by_complexity_filter[$value->complexity][$value->last_author] = $value->counts;
                $demands_by_complexity_filter[$value->complexity]['open'] = Demands::where('demand_complexity_id', $value->demand_complexity_id)->where('archive', false)->count();
                $demands_by_complexity_filter[$value->complexity]['total'] = Demands::where('demand_complexity_id', $value->demand_complexity_id)->count();
            }

            // support level

            $demand_by_level = DB::select(DB::raw("select 
            demands.*, support_levels.name as level from 
            (SELECT demand_level_id, last_author, count(demands.id) as counts
            FROM public.demands
             WHERE
                    created_at >= '$from_day'
                AND created_at <= '$to_day'
            group by demand_level_id, last_author)
            as demands
            Left join support_levels on support_levels.id=demands.demand_level_id"));

            $demands_by_level_filter = [];
            foreach ($demand_by_level as $key => $value) {
                if (!isset($demands_by_level_filter[$value->level])) $demands_by_level_filter[$value->level] = [];
                $demands_by_level_filter[$value->level][$value->last_author] = $value->counts;
                $demands_by_level_filter[$value->level]['open'] = Demands::where('demand_level_id', $value->demand_level_id)->where('archive', false)->count();
                $demands_by_level_filter[$value->level]['total'] = Demands::where('demand_level_id', $value->demand_level_id)->count();
            }

            // dd($demands_by_criticality_filter);
            return view('admin.support.index_template', compact(
                'demands_by_support_filter',
                'demands_by_state_filter',
                'demands_by_category_filter',
                'demands_by_criticality_filter',
                'demands_by_complexity_filter',
                'demands_by_level_filter'
            ))->render();
        }
        else{
            $demands_by_support = DB::select(DB::raw("select 
        support.*, users.name from 
        (SELECT support_id, last_author, count(demands.id) as counts
        FROM public.demands
        group by support_id, last_author)
        as support 
        Left join users on users.id=support.support_id"));
            // dd($demands_by_support);
            $demands_by_support_filter = [];
            foreach ($demands_by_support as $key => $value) {
                if (!isset($demands_by_support_filter[$value->support_id])) $demands_by_support_filter[$value->support_id] = [];
                $demands_by_support_filter[$value->support_id][$value->last_author] = $value->counts;
                $demands_by_support_filter[$value->support_id]['name'] = $value->name;
                $demands_by_support_filter[$value->support_id]['open'] = Demands::where('support_id', $value->support_id)->where('archive', false)->count();
                $demands_by_support_filter[$value->support_id]['total'] = Demands::where('support_id', $value->support_id)->count();
            }
            // state
        //     $demands_by_state = DB::select(DB::raw("SELECT state, last_author, count(demands.id) as counts
        // FROM public.demands
        // group by state, last_author"));

            $demands_by_state = DB::select(DB::raw("select 
            demands.*, demand_status.name as state from 
            (SELECT demand_status_id, last_author, count(demands.id) as counts
            FROM public.demands
            group by demand_status_id, last_author)
            as demands
            Left join demand_status on demand_status.id=demands.demand_status_id"));

            $demands_by_state_filter = [];
            foreach ($demands_by_state as $key => $value) {
                if (!isset($demands_by_state_filter[$value->state])) $demands_by_state_filter[$value->state] = [];
                $demands_by_state_filter[$value->state][$value->last_author] = $value->counts;
                $demands_by_state_filter[$value->state]['open'] = Demands::where('demand_status_id', $value->demand_status_id)->where('archive', false)->count();
                $demands_by_state_filter[$value->state]['total'] = Demands::where('demand_status_id', $value->demand_status_id)->count();
            }

            // category
            $demands_by_category = DB::select(DB::raw("select 
            demands.*, demand_categories.name from 
            (SELECT category_id, last_author, count(demands.id) as counts
            FROM public.demands
            group by category_id, last_author)
            as demands
            Left join demand_categories on demand_categories.id=demands.category_id"));
            $demands_by_category_filter = [];
            foreach ($demands_by_category as $key => $value) {
                if (!isset($demands_by_category_filter[$value->name])) $demands_by_category_filter[$value->name] = [];
                $demands_by_category_filter[$value->name][$value->last_author] = $value->counts;
                $demands_by_category_filter[$value->name]['open'] = Demands::where('category_id', $value->category_id)->where('archive', false)->count();
                $demands_by_category_filter[$value->name]['total'] = Demands::where('category_id', $value->category_id)->count();
            }

            // criticality
            $demand_by_criticality = DB::select(DB::raw("select 
            demands.*, demand_criticality.name as criticality from 
            (SELECT demand_criticality_id, last_author, count(demands.id) as counts
            FROM public.demands
            group by demand_criticality_id, last_author)
            as demands
            Left join demand_criticality on demand_criticality.id=demands.demand_criticality_id"));

            $demands_by_criticality_filter = [];
            foreach ($demand_by_criticality as $key => $value) {
                if (!isset($demands_by_criticality_filter[$value->criticality]))$demands_by_criticality_filter[$value->criticality] = [];
                $demands_by_criticality_filter[$value->criticality][$value->last_author] = $value->counts;
                $demands_by_criticality_filter[$value->criticality]['open'] = Demands::where('demand_criticality_id', $value->demand_criticality_id)->where('archive', false)->count();
                $demands_by_criticality_filter[$value->criticality]['total'] = Demands::where('demand_criticality_id', $value->demand_criticality_id)->count();
            }

            // difficulty

            $demand_by_complexity = DB::select(DB::raw("select 
            demands.*, demand_complexity.name as complexity from 
            (SELECT demand_complexity_id, last_author, count(demands.id) as counts
            FROM public.demands
            group by demand_complexity_id, last_author)
            as demands
            Left join demand_complexity on demand_complexity.id=demands.demand_complexity_id"));

            $demands_by_complexity_filter = [];
            foreach ($demand_by_complexity as $key => $value) {
                if (!isset($demands_by_complexity_filter[$value->complexity])) $demands_by_complexity_filter[$value->complexity] = [];
                $demands_by_complexity_filter[$value->complexity][$value->last_author] = $value->counts;
                $demands_by_complexity_filter[$value->complexity]['open'] = Demands::where('demand_complexity_id', $value->demand_complexity_id)->where('archive', false)->count();
                $demands_by_complexity_filter[$value->complexity]['total'] = Demands::where('demand_complexity_id', $value->demand_complexity_id)->count();
            }

            // support level

            $demand_by_level = DB::select(DB::raw("select 
            demands.*, support_levels.name as level from 
            (SELECT demand_level_id, last_author, count(demands.id) as counts
            FROM public.demands
            group by demand_level_id, last_author)
            as demands
            Left join support_levels on support_levels.id=demands.demand_level_id"));

            $demands_by_level_filter = [];
            foreach ($demand_by_level as $key => $value) {
                if (!isset($demands_by_level_filter[$value->level])) $demands_by_level_filter[$value->level] = [];
                $demands_by_level_filter[$value->level][$value->last_author] = $value->counts;
                $demands_by_level_filter[$value->level]['open'] = Demands::where('demand_level_id', $value->demand_level_id)->where('archive', false)->count();
                $demands_by_level_filter[$value->level]['total'] = Demands::where('demand_level_id', $value->demand_level_id)->count();
            }

            return view('admin.support.index', compact(
                'demands_by_support_filter',
                'demands_by_state_filter',
                'demands_by_category_filter',
                'demands_by_criticality_filter',
                'demands_by_complexity_filter',
                'demands_by_level_filter'
            ));
        }
        
    }

    public function appeal(Request $request)
    {
        if ($request->ajax()) {
            $combined_date_and_time1 = $request->start_date . ' ' . '24:00';
            $starting_date_timestamp1 = strtotime($combined_date_and_time1);
            $combined_date_and_time2 = $request->end_date . ' ' . '00:00';
            $starting_date_timestamp2 = strtotime($combined_date_and_time2);
            $from_date = date('Y-m-d H:i:s', $starting_date_timestamp1);
            $to_date = date('Y-m-d H:i:s', $starting_date_timestamp2);
            $query= Demands::orderBy('id', 'desc');
            if($request->id != null){
                $query->where('id','=',$request->id);
            }
            if($request->active == 'true'){
                $query->where('archive','=',false);
            }
            if($request->start_date != null){
                $query->whereBetween('created_at',[$to_date, $from_date]);
            }
            $appealObjects = $query->get();
            $keys = array();
            if($request->indicator != null){
                foreach ( $appealObjects as $key => $value) {
                    if($value->indicator != $request->indicator){
                        array_push($keys,$key);
                    }
                }
                foreach ($keys as $key => $item) {
                    $appealObjects->forget($item);
                }

            }
            return view('admin.support.appeal_template', compact('appealObjects'))->render();
        }
        else{
            $appealObjects = Demands::orderBy('id', 'DESC')->get();
            return view('admin.support.appeal', compact('appealObjects'));
        }
    }

    public function edit($locale, $id)
    {
        $demand = Demands::findOrFail($id);
        $demandStatuses = DemandStatus::pluck('name', 'id')->all();
        $demandComplexities = DemandComplexity::pluck('name', 'id')->all();
        $demandCriticalities = DemandCriticality::pluck('name', 'id')->all();
        $supportLevelsObjects = SupportLevels::pluck('name', 'id')->all();
        $managers = User::whereHas(
            'role',
            function ($q) {
                $q->where('title', 'Support employee');
            }
        )->pluck('name', 'id')->all();
        return view('admin.support.edit_demand', compact(
            'demand',
            'demandStatuses',
            'demandComplexities',
            'demandCriticalities',
            'supportLevelsObjects',
            'managers'
        ));
    }

    public function update($locale, $id, Request $request)
    {
        try {
            // dd($request->state);
            $demand = Demands::findOrFail($id);
            $demand->demand_status_id = $request->state;
            $demand->demand_criticality_id = $request->criticality;
            $demand->demand_complexity_id = $request->complexity;
            $demand->support_id = $request->manager;
            $demand->demand_level_id = $request->support_level;
            $demand->archive = $request->archive;
            $demand->save();

            if($demand->support_id != $request->manager){
                try {
                    $template = EmailTemplate::where('symbol', 'change_support')->first();
                    if (!is_null($template) && !is_null($request->manager) && $template->active) {
                        
                        $user = User::findOrfail($request->manager)->first();
                        $message = $demand->message;
                        switch ($user->notification_way) {
                            case 'email':
                                $user_name = $user->name;
                                $tem = mailTemplate();
                                $header = $tem['header'];
                                $body_close = $tem['body_close'];
                                $body = $template->body;
                                $subject = $template->subject;
                                $subject = str_replace('#user_name#', $user_name, $subject);
                                $link = route('admin.support.chat', ['locale' => app()->getLocale(), 'id' => $demand->id]);
                                $body = str_replace('#user_name#', $user_name, $body);
                                $body = str_replace('#number#', $demand->id, $body);
                                $body = str_replace('#last_message#', $message, $body);
                                $body = str_replace('#link#', $link, $body);
                                $generated = $header . $body . $body_close;
                                Mail::send([], [], function ($message) use ($generated, $user, $subject) {
                                    $message->to($user->email)
                                    ->subject($subject)
                                    ->setBody($generated, 'text/html'); // for HTML rich messages
                                });
                                break;

                            case 'telegram':
                                $body = $template->telegram_text;
                                $user_name = $user->name;
                                $link = route('admin.support.chat', ['locale' => app()->getLocale(), 'id' => $demand->id]);
                                $body = str_replace('#user_name#', $user_name, $body);
                                $body = str_replace('#number#', $demand->id, $body);
                                $body = str_replace('#last_message#', $message, $body);
                                $body = str_replace('#link#', $link, $body);
                                if (!is_null($user->telegram_channel_id)) {
                                    Telegram::sendMessage([
                                        'chat_id' => $user->telegram_channel_id,
                                        'parse_mode' => 'HTML',
                                        'text' => $body
                                    ]);
                                }
                                break;

                            case 'viber':
                                # code...
                                break;

                            default:
                                # code...
                                break;
                        }
                    }
                } catch (\Throwable $th) {
                    \Session::put('error', 'SMS Error');
                }
            }

           
            return redirect()->route('admin.support.appeal', app()->getLocale())
                ->with('success_message', 'Demand was successfully updated.');
        } catch (\Throwable $th) {
            //throw $th;
            return back()->withInput()
            ->withErrors(['unexpected_error' => $th]);
        }
      
    }

    public function graph(Request $request)
    {
        $appealObjects = Demands::all();
        if ($request->ajax()) {
            $startDate = new \Carbon\Carbon($request->start_date);
            $period = $request->get('period');
            $end = new \Carbon\Carbon($startDate);
            $endDate = $end->addDays($period);
        }
        else{
            $endDate = Carbon::now()->addDays(1);
            $startDate = Carbon::now()->addDays(-7);
        }
        $all_dates = array();
        $data = array();
        $messages = array();
        while ($startDate->lte($endDate)) {
            $all_dates[] = $startDate->toDateString();
            $startDate->addDay();
            if (!isset($data[$startDate->toDateString()])) $data[$startDate->toDateString()] = [];
            $data[$startDate->toDateString()]['open'] = Demands::where('archive', false)->where('created_at', 'LIKE', '%' . $startDate->toDateString() . '%')->count();
            $data[$startDate->toDateString()]['close'] = Demands::where('archive', true)->where('created_at', 'LIKE', '%' . $startDate->toDateString() . '%')->count();
            $data[$startDate->toDateString()]['total'] = Demands::where('created_at', 'LIKE', '%' . $startDate->toDateString() . '%')->count();
            $messages[$startDate->toDateString()] = SupportMessage::where('created_at', 'LIKE', '%' . $startDate->toDateString() . '%')->count();
        }
        $demandsFilter = array();
        $messagesFilter = array();
        for ($i=0; $i < 9 ; $i++) {
            # code...
            $demandsFilter[$i] = 0;
            $messagesFilter[$i] = 0;
        }
        $demand_days = Demands::get();
        foreach ($demand_days as $key => $value) {
            # code...
            $days = $value->diffInDays;
            $message_count = SupportMessage::where('room_id', $value->id)->count();
            if(!isset($demandsFilter[$days])) $demandsFilter[$days] = 0;
            if($days > 7){
                $demandsFilter[8] += 1;
            }
            else{
                $demandsFilter[$days] += 1;
            }

            if ($message_count > 7) {
                $messagesFilter[8] += 1;
            } else {
                $messagesFilter[$message_count] += 1;
            }
        }
        if ($request->ajax()) {
            return view('admin.support.graph_template', compact(
                'appealObjects',
                'data',
                'messages',
                'demandsFilter',
                'messagesFilter'
            ))->render();;
        }
        else{
            // dd($messagesFilter);
            return view('admin.support.graph', compact(
                'appealObjects', 
                'data', 
                'messages',
                'demandsFilter',
                'messagesFilter'
            ));
        }
        // dd($messagesFilter);
    }

    public function category()
    {
        $appealObjects = Demands::all();
        return view('admin.support.category', compact('appealObjects'));
    }

    public function support($locale, Request $request)
    {
        // $data = array();
        $demand = Demands::findOrFail($request->id);
        $receiver = $demand->user_id;
        $support = $demand->user_id;
        $today_messages = [];
        $messages_dates = [];
        $messages = [];

        $dates = SupportMessage::where('support_messages.room_id', $request->id)
            ->select(DB::raw('DATE(created_at) as date'))
            ->orderBy('date', 'ASC')
            ->groupBy('date')
            ->get();

        foreach ($dates as $item) {
            if (!isset($messages_dates[$item->date])) {
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
                    // ->where('support_messages.receiver_id', $receiver)
                    // ->where('support_messages.support_id', Auth::user()->id)
                    ->where('support_messages.room_id', $request->id)
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
        // $messages = SupportMessage::select(
        //     'support_messages.id',
        //     'support_messages.body as body',
        //     'support_messages.user_id',
        //     'support_messages.attach',
        //     'support_messages.created_at',
        //     'support_messages.edited',
        //     'support_messages.deleted',
        //     'support_messages.seen',
        //     'support_messages.attach_name',
        //     'support_messages.attach_type',
        //     'messages_reply.body as replyContent',
        //     'reply.name as replyName',
        //     'sender.name as sender_name',
        //     'sender.avatar as sender_avatar'
        // )
        //     // ->where('support_messages.receiver_id', $receiver)
        //     // ->where('support_messages.support_id', Auth::user()->id)
        //     ->where('support_messages.room_id', $request->id)
        //     ->leftjoin('support_messages as messages_reply', 'messages_reply.id', '=', 'support_messages.reply_message_id')
        //     ->leftjoin('users as reply', 'reply.id', '=', 'messages_reply.user_id')
        //     ->leftjoin('users as sender', 'sender.id', '=', 'support_messages.user_id')
        //     ->orderBy('support_messages.id', 'ASC')
        //     ->get();
        // dd($messages);
        $room = $request->id;
        $answers = FastAnswer::get();
        $demandCategories = DemandCategory::get();
        return view('admin.support.chat', compact(
            'receiver', 
            'room', 
            'messages' , 
            'demand', 
            'support', 
            'answers', 
            'demandCategories',
            'today_messages',
            'messages_dates'
        ));
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

}
