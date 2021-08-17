<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use App\CuratorMessage;
use App\SupportMessage;
use App\CuratorMessageUnread;
use App\SupportMessageUnread;
use Illuminate\Support\Facades\Auth;
use App\Events\MessageSent;
use App\Events\MessageSeen;
use App\Events\CuratorMessageCreated;
use App\Events\SupportMessageCreated;
use App\User;
use App\Models\Demands;
use Illuminate\Support\Facades\DB;
use App\Models\EmailTemplate;
use Illuminate\Support\Facades\Mail;
use Telegram\Bot\Laravel\Facades\Telegram;

class SupportMessageController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show chats
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('chat');
    }

    /**
     * Fetch all messages
     *
     * @return Message
     */
    public function fetchMessages()
    {
        // return CuratorMessage::with('user')->get();
    }

    /**
     * Persist message to database
     *
     * @param  Request $request
     * @return Response
     */
    public function supportMessage(Request $request)
    {
        $messages = SupportMessage::where('receiver_id', Auth::user()->id)->with('user')
            ->orderBy('created_at', 'ASC')->get();
        $messages = SupportMessage::select(
            'support_messages.id',
            'support_messages.body as body',
            'support_messages.user_id',
            'support_messages.attach_url as attach_url',
            'support_messages.created_at',
            'support_messages.edited',
            'support_messages.deleted',
            'support_messages.attach_name',
            'support_messages.attach_type',
            'messages_reply.body as replyContent',
            'reply.name as replyName',
            'sender.name as senderName',
            'sender.avatar as senderAvatar'
        )
            ->where('support_messages.receiver_id', Auth::user()->id)
            ->leftjoin('support_messages as messages_reply', 'messages_reply.id', '=', 'support_messages.reply_message_id')
            ->leftjoin('users as reply', 'reply.id', '=', 'messages_reply.user_id')
            ->leftjoin('users as sender', 'sender.id', '=', 'support_messages.user_id')
            ->orderBy('support_messages.id', 'ASC')
            ->get();
        $support = 'setting';
        $assign = 0;
        $channel_name = Auth::user()->id . "-" . date("Y-m-d");
        try {
            //code...
            $support_id = SupportmessageUnread::where('from_id', Auth::user()->id)->where('channel_name', $channel_name)->first()->support_id;
        } catch (\Throwable $th) {
            $support_id = 0;
        }
        if ($support_id != 0) {
            $support = User::findOrFail($support_id);
            $assign = 1;
        }
        return response()->json(['messages' => $messages, 'support' => $support, 'assign' => $assign]);
    }

    public function customerSendMessage(Request $request)
    {
        $user = Auth::user();
        if (!empty($request['file'])) {

            $file = $request->file('file');
            $destinationPath = 'uploads/curator';
            $ext = '.' . $file->getClientOriginalExtension();
            $name = str_replace($ext, date('d-m-Y-H-i') . $ext, $file->getClientOriginalName());
            // echo $name;
            $file->move($destinationPath, $name);
            $url = 'uploads/curator/' . $name;
            if (($ext == '.gif') || ($ext == '.jpeg') || ($ext == '.png') || ($ext == '.jpg')) {
                $attach = ' <img src="' . url($url) . '" class="chat-attach-img" download>' . $name . '</>';
            } else {
                $attach = ' <a href="' . url($url) . '" download>' . $name . '</a>';
            }
        } else {
            $attach = null;
        }
        $channel_name = Auth::user()->id . "-" . date("Y-m-d");
        $message = $request->user()->supportMessages()->create([
            'body' => $request->input('body'),
            'user_id' => Auth::user()->id,
            'channel_name' => $channel_name,
            'receiver_id' => Auth::user()->id,
            'attach_url' => $attach
        ]);
        if (SupportMessageUnread::where('user_id', Auth::user()->id)->where('channel_name', $channel_name)->count() == 0) {
            $support_message_unread = SupportMessageUnread::create([
                'user_id' => Auth::user()->id,
                'last_message' => $request->input('body'),
                'receiver_id' => Auth::user()->id,
                'channel_name' => $channel_name,
                'support_id' => 0,
                'complete' => false,
                'unread' => 1
            ]);
        } else {
            $support_message_unread = SupportMessageUnread::where('user_id', Auth::user()->id)->where('channel_name', $channel_name)->first();
            $support_message_unread->unread = $support_message_unread->unread + 1;
            $support_message_unread->last_message = $request->input('body');
            $support_message_unread->save();
        }

        broadcast(new SupportMessageCreated($message))->toOthers();

        return response()->json(['message' => $message]);
    }


    public function supportSendMessage(Request $request)
    {
        $user = Auth::user();
        if ($request['file'] != 'null') {

            $file = $request->file('file');
            $destinationPath = 'uploads/demands';
            $ext = '.' . $file->getClientOriginalExtension();
            $name = str_replace($ext, date('d-m-Y-H-i') . $ext, $file->getClientOriginalName());
            // echo $name;
            $file->move($destinationPath, $name);
            $attach = 'uploads/demands/' . $name;
            $attach_name = $name;
            $attach_type = $file->getClientOriginalExtension();
        } else {
            $attach = "";
            $attach_name = null;
            $attach_type = null;
        }
        $reply_message_id = $request->reply_message_id == 'null' ? null : $request->reply_message_id;

        $message = $request->user()->supportMessages()->create([
            'body' => $request->input('body'),
            'user_id' => Auth::user()->id,
            'support_id' => $request->support_id,
            'receiver_id' => $request->receiver_id,
            'room_id' => $request->room_id,
            'reply_message_id' => $reply_message_id,
            'attach_url' => $attach,
            'attach_name' => $attach_name,
            'attach_type' => $attach_type,
        ]);

        $demand = Demands::findOrFail($request->room_id);

        if (Auth::user()->id == $request->receiver_id) {
            $demand->last_author = 'client';
        } else if (Auth::user()->id == $request->support_id) {
            $demand->last_author = 'support';
        } else {
            $demand->last_author = 'other';
        }
        $demand->save();

        $channel_name = Auth::user()->id . "-" . date("Y-m-d");

        if (SupportMessageUnread::where('user_id', Auth::user()->id)->where('receiver_id', $request->receiver_id)->where('channel_name', $request->room_id)->count() == 0) {
            $customer_message_unread = SupportMessageUnread::create([
                'user_id' => Auth::user()->id,
                'last_message' => $request->input('body'),
                'receiver_id' => $request->receiver_id,
                'channel_name' => $request->room_id,
                'support_id' => $request->support_id,
                'unread' => 1
            ]);
        } else {
            $customer_message_unread = SupportMessageUnread::where('user_id', Auth::user()->id)
                ->where('receiver_id', $request->receiver_id)
                ->where('channel_name', $request->room_id)
                ->first();
            $customer_message_unread->unread = $customer_message_unread->unread + 1;
            $customer_message_unread->last_message = $request->input('body');
            // $customer_message_unread->support_id = Auth::user()->id;
            $customer_message_unread->save();
        }

        // if (SupportMessageUnread::where('user_id', $request->user_id)->where('channel_name', $request->room_id)->count() == 0) {
        //     // $support_message_unread = SupportMessageUnread::create([
        //     //     'user_id' => $request->user_id,
        //     //     'last_message' => $request->input('body'),
        //     //     'from_id' => $request->user_id,
        //     //     'channel_name' => $channel_name,
        //     //     'unread' => 1
        //     // ]);
        // } else {
        //     $support_message_unread = SupportMessageUnread::where('user_id', $request->user_id)->where('channel_name', $request->room_id)->first();
        //     $support_message_unread->unread = $support_message_unread->unread + 1;
        //     //  $support_message_unread->last_message = $request->input('body');
        //     $support_message_unread->support_id = Auth::user()->id;
        //     $support_message_unread->save();
        // }

        broadcast(new SupportMessageCreated($message))->toOthers();

        return response()->json(['message' => $message]);
    }

    public function adminMessage(Request $request)
    {
        $receiver_id = $request->user_id;
        $channel_name = $request->channel_name;
        if (Auth::user()->role()->where('title', 'Administrator')->count() > 0) {
            $messages = SupportMessage::where('receiver_id', $receiver_id)->where('channel_name', $channel_name)->with(['user'])->orderBy('created_at', 'ASC')->get();

        } else if (Auth::user()->role()->where('title', 'Support')->count() > 0) {

            // $students = Transactions::where('teacher_id', Auth::user()->id)->with('user')->with('course')->get();
            $users = SupportMessageUnread::where('complete', false)->where('support_id', 0)->orWhere('support_id', Auth::user()->id)->where('user_id', '!=',  Auth::user()->id)->with('user')->get();
            $messages = SupportMessage::where('receiver_id', $receiver_id)->where('channel_name', $channel_name)->orWhere('support_id', Auth::user()->id)->with(['user'])->orderBy('created_at', 'ASC')->get();;
            return response()->json(['messages' => $messages, 'users' => $users]);
        }


        // $lessons = Lessons::select('name', 'id' , 'courses_id')->get();


        return response()->json(['messages' => $messages, 'users' => $users]);
    }

    public function unread(Request $request)
    {
        try {
            if (SupportMessageUnread::where('receiver_id', $request['receiver_id'])->where('channel_name', $request['demand_id'])->count() == 0) {
                $support_message_unread = SupportMessageUnread::create([
                    'user_id' => Auth::user()->id,
                    'channel_name' => $request['demand_id'],
                    'receiver_id' => $request['receiver_id'],
                    'unread' => $request['unread']
                ]);
            } else {
                $support_message_unread = SupportMessageUnread::where('receiver_id', Auth::user()->id)->where('channel_name', $request['demand_id'])->first();
                $support_message_unread->unread = 0;
                $support_message_unread->save();
            }
            if ($request['receiver_id'] == $request['support->id']) {
                $messages = SupportMessage::where('receiver_id', Auth::user()->id)->where('room_id', $request['demand_id'])->where('seen', false)->get();
            } else {
                $messages = SupportMessage::where('user_id', $request['receiver_id'])->where('room_id', $request['demand_id'])->where('seen', false)->get();
            }
            foreach ($messages  as $entry) {
                $entry->seen = true;
                $entry->update();
            }
            broadcast(new MessageSeen($messages, 'support'))
                ->toOthers();
            return response()->json(['message' => 'success']);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th]);
        }
    }

    public function unreadDemand(Request $request)
    {
        try {
            $user_id = Auth::user()->id;
            if ($request->type == 'support') {
                $unread = SupportMessageUnread::where('receiver_id', $user_id)
                    ->where('channel_name', $request->demandid)->first()->unread;
            } else if ($request->type == 'support_total') {
                $unread = DB::select(DB::raw("
                SELECT sum(unread) AS total from 
                public.support_message_unreads
                WHERE receiver_id = $user_id"))[0]->total;
            }
            return response()->json(['message' => 'success', 'unread' => $unread]);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['message' => $th]);
        }
    }

    public function closeDemand(Request $request)
    {
        $demand = Demands::findOrFail($request->demand_id);
        $demand->archive = $request->archive;
        if ($demand->save()) {
            return response()->json(['state' => 'success']);
        } else {
            return response()->json(['state' => 'error']);
        }
    }
}
