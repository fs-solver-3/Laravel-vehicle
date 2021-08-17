<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\SupportMessage;
use App\Models\MessageUnreads;
use App\Models\Rooms;
use App\Models\AdminUserChat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\MessageCreated;
use App\Events\MessageDeleted;
use App\Events\MessageEdited;
use App\Events\MessageSeen;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ChatsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show chats
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Auth::user()->messages());
        if (Auth::user() && Auth::user()->role()->where('title', 'Administrator')->count() > 0) {
            return redirect('/');
        }
        $messages = Auth::user()->messages;
        return view('personal-message', compact('messages'));
    }

    /**
     * Fetch all messages
     *
     * @return Message
     */

    public function fetchRooms(Request $request)
    {
        $user_id = Auth::user()->id;
        $results = DB::select(DB::raw("SELECT
            rooms.id as room_id,
            users.name as sender_name,
            users.avatar as sender_avatar,
            rooms.sender_id as sender_id,
            from_location.city as from_full,
            from_location.state as from_state,
            to_location.city as to_full,
            to_location.state as to_state,
            message_unreads.unread as unread,
            message_unreads.last_message as last_message,
            message_unreads.updated_at as last_message_at
            FROM public.rooms
            left JOIN listings
            On rooms.listing_id=listings.id
            left JOIN locations AS from_location
            on from_location.id=listings.location_id
            left JOIN locations AS to_location
            on to_location.id=listings.destination_id
            left JOIN users
            ON users.id=rooms.sender_id
            left JOIN message_unreads
            On message_unreads.sender_id=rooms.sender_id AND message_unreads.type='trip' AND message_unreads.receiver_id=$user_id And message_unreads.room_id=rooms.id
            where rooms.receiver_id=$user_id AND rooms.sender_id!=$user_id  And rooms.archive=false ORDER BY message_unreads.updated_at DESC NULLS LAST"));
        
        $archived_results = DB::select(DB::raw("SELECT
            DISTINCT ON (rooms.id) rooms.id as room_id,
            users.name as sender_name,
            users.avatar as sender_avatar,
            rooms.sender_id as sender_id,
            from_location.city as from_full,
            from_location.state as from_state,
            message_unreads.unread as unread,
            message_unreads.last_message as last_message,
            message_unreads.created_at as last_message_at
            FROM public.rooms
            left JOIN listings
            On rooms.listing_id=listings.id
            left JOIN locations AS from_location
            on from_location.id=listings.location_id
            left JOIN users
            ON users.id=rooms.sender_id
            left JOIN message_unreads
            On message_unreads.sender_id=rooms.sender_id AND message_unreads.type='trip' AND message_unreads.receiver_id=$user_id And message_unreads.room_id=rooms.id
            where rooms.receiver_id=$user_id AND rooms.sender_id!=$user_id And rooms.archive =true ORDER BY rooms.id Desc"));
            
        $admin_message = DB::select(DB::raw(
            "SELECT
            users.name as sender_name,
            users.avatar as sender_avatar,
            message_unreads.unread as unread,
            message_unreads.last_message as last_message,
            message_unreads.created_at as last_message_at
            FROM public.users
            left JOIN message_unreads
            On message_unreads.receiver_id=$user_id AND message_unreads.type='admin' AND message_unreads.sender_id=1
            where users.id=1"
           ));
        // MessageUnreads::where('sender_id', 1)->where('receiver_id', Auth::user()->id)->where('type', 'admin')->first();
        return response()->json([
            'rooms' => $results,
            'archived_rooms' => $archived_results,
            'admin_message' => $admin_message
        ]);
    }

    public function fetchDriverRooms(Request $request)
    {
        $user_id = Auth::user()->id;
        $results = DB::select(DB::raw("SELECT
            users.name as sender_name,
            users.avatar as sender_avatar,
            rooms.receiver_id as sender_id,
            rooms.listing_id as listing_id,
            rooms.id as room_id,
            from_location.city as from_full,
            from_location.state as from_state,
            to_location.city as to_full,
            to_location.state as to_state,
            message_unreads.unread as unread,
            message_unreads.last_message as last_message,
            message_unreads.created_at as last_message_at
            FROM public.rooms
            left JOIN listings
            On rooms.listing_id=listings.id
            left JOIN locations AS from_location
            on from_location.id=listings.location_id
            left JOIN locations AS to_location
            on to_location.id=listings.destination_id
            left JOIN users
            ON users.id=rooms.receiver_id
            left JOIN message_unreads
            On message_unreads.sender_id=rooms.receiver_id And message_unreads.receiver_id=$user_id  AND message_unreads.type='trip' AND message_unreads.room_id=rooms.id
            where rooms.receiver_id!=$user_id AND rooms.sender_id=$user_id"));
        // MessageUnreads::where('sender_id', 1)->where('receiver_id', Auth::user()->id)->where('type', 'admin')->first();
        return response()->json([
            'rooms' => $results
        ]);
    }

    public function fetchFellowers(Request $request){
        $user_id = Auth::user()->id;
        $results = DB::select(DB::raw("SELECT
            users.name as sender_name,
            users.avatar as sender_avatar,
            rooms.sender_id as sender_id,
            rooms.id as room_id,
            message_unreads.unread as unread,
            message_unreads.last_message as last_message,
            message_unreads.created_at as last_message_at
            FROM public.rooms
            left JOIN users
            ON users.id=rooms.sender_id
            left JOIN message_unreads
            On message_unreads.sender_id=rooms.sender_id AND message_unreads.type='trip' AND message_unreads.room_id=$request->trip_id
            where rooms.listing_id=$request->trip_id AND rooms.receiver_id=$user_id AND rooms.sender_id!=$user_id ORDER BY rooms.id Desc"));
        // MessageUnreads::where('sender_id', 1)->where('receiver_id', Auth::user()->id)->where('type', 'admin')->first();
        return response()->json([
            'rooms' => $results
        ]);
    }

    public function fetchDriverMessages(Request $request)
    {
        try {
            $room_id = $request->room_id;
            $room = Rooms::findOrFail($room_id);
            $dates = Message::where('messages.room_id', $room_id)
            ->select(DB::raw('DATE(created_at) as date'))
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get();

            $today_messages = [];
            $messages_dates = [];
            foreach ($dates as $item) {
                if (!isset($messages_dates[$item->date])){
                    $messages = Message::select(
                        'messages.id',
                        'messages.body',
                        'messages.user_id',
                        'messages.created_at',
                        'messages.edited',
                        'messages.deleted',
                        'messages.seen',
                        'messages.attach_name',
                        'messages.attach_type',
                        'messages.attach_url',
                        'messages.reply_message_id',
                        'messages_reply.body as replyContent',
                        'replyer.name as replyName',
                        'sender.name as sender_name',
                        'sender.avatar as sender_avatar'
                    )
                    ->where('messages.room_id', $room_id)
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
            return response()->json([
                'messages_dates' => $messages_dates,
                'today_messages' => $today_messages,
                'archive' => $room->archive
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' =>[],
            ]);
        }
    }


    public function fetchMessages(Request $request)
    {
        $room = Rooms::where('sender_id', Auth::user()->id)->where('listing_id', $request->listing_id)->get();
        if($room->count() > 0 ){
            $messages = Message::select(
                    'messages.id',
                    'messages.body',
                    'messages.user_id',
                    'messages.created_at',
                    'messages.edited',
                    'messages.deleted',
                    'messages.seen',
                    'messages.attach_name',
                    'messages.attach_type',
                    'messages.attach_url',
                    'messages.reply_message_id',
                    'messages_reply.body as replyContent',
                    'replyer.name as replyName',
                    'sender.name as sender_name',
                    'sender.avatar as sender_avatar'
                )
                ->where('messages.room_id', $room->first()->id)
                ->orderBy('messages.id', 'ASC')
                ->leftjoin('messages as messages_reply', 'messages_reply.id', '=', 'messages.reply_message_id')
                ->leftjoin('users as sender', 'sender.id', '=', 'messages.user_id')
                ->leftjoin('users as replyer', 'replyer.id', '=', 'messages_reply.user_id')
                ->get();
            return response()->json(['message' => $messages]);
        }
        else{
            return response()->json(['message' => []]);
        }
        // return Message::with('user')->get();
    }

    public function fetchAdminMessages(Request $request)
    {
        $dates = Message::where('messages.room_id', Auth::user()->id)
            ->where('messages.type', 'admin')
            ->select(DB::raw('DATE(created_at) as date'))
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get();
        $messages_dates = [];
        $today_messages = [];
        $messages = [];
        foreach ( $dates as $item) {
            if (!isset($messages_dates[$item->date]))
                $messages = Message::select(
                    'messages.id',
                    'messages.body',
                    'messages.user_id',
                    'messages.created_at',
                    'messages.edited',
                    'messages.deleted',
                    'messages.seen',
                    'messages.attach_name',
                    'messages.attach_type',
                    'messages.attach_url',
                    'messages.reply_message_id',
                    'messages_reply.body as replyContent',
                    'replyer.name as replyName',
                    'sender.name as sender_name',
                    'sender.avatar as sender_avatar'
                )
                    ->where('messages.room_id', Auth::user()->id)
                    ->where('messages.type', 'admin')
                    ->where('messages.created_at', 'LIKE', '%' . $item->date. '%')
                    ->orderBy('messages.id', 'ASC')
                    ->leftjoin('messages as messages_reply', 'messages_reply.id', '=', 'messages.reply_message_id')
                    ->leftjoin('users as sender', 'sender.id', '=', 'messages.user_id')
                    ->leftjoin('users as replyer', 'replyer.id', '=', 'messages_reply.user_id')
                    ->get();
                if(date('Y-m-d') == $item->date){
                    $today_messages  = $messages;
                }
                else{
                    $messages_dates[$item->date]  = $messages;
                }
        }
        return response()->json([
            'message' => $messages,
            'messages_dates' => $messages_dates,
            'today_messages' => $today_messages
        ]);
    }

    public function unRead(Request $request)
    {
        $sender_id = $request->sender_id;
        $type = $request->type;
        if(($type == 'driver' || $type == 'passenger')  && MessageUnreads::where('sender_id', $sender_id)->where('receiver_id', Auth::user()->id)->where('room_id', $request->room_id)->count() > 0){
            MessageUnreads::where('sender_id', $sender_id)->where('receiver_id', Auth::user()->id)->where('room_id', $request->room_id)->first()->update(['unread' => 0]);
            $unreadToal = MessageUnreads::where('receiver_id', Auth::user()->id)->get()->sum('unread');
            $unreads = MessageUnreads::where('receiver_id', Auth::user()->id)->get();
            if(MessageUnreads::where('type', 'admin')->where('receiver_id', Auth::user()->id)->count() > 0){
                $unreadsAdmin = MessageUnreads::where('type', 'admin')->where('receiver_id', Auth::user()->id)->first()->unread;
            }
            else{
                $unreadsAdmin = 0;
            }
            $messages = Message::where('user_id', $sender_id)->where('receiver_id', Auth::user()->id)->where('seen', false)->get();
            foreach($messages  as $entry) {
                $entry->seen = true;
                $entry->update();
            }
            return response()->json([
                'state' => 'success', 
                'unread_total' => $unreadToal, 
                'unreads' => $unreads,
                'unread_admin' => $unreadsAdmin
            ]);
        }
        else if($type == 'admin'){
            $unread1 = MessageUnreads::where('type', 'admin')->where('receiver_id', Auth::user()->id)->first();
            if(!is_null($unread1))
            $unread1->update(['unread' => 0]);
            $unread2 = MessageUnreads::where('type', 'admin')->where('sender_id', $request->receiver_id)->first();
            if(!is_null($unread2))
            $unread2->update(['unread' => 0]);
            $unreadToal = MessageUnreads::where('receiver_id', Auth::user()->id)->get()->sum('unread');
            $unreads = MessageUnreads::where('receiver_id', Auth::user()->id)->get();
            $unreadsAdmin = 0;
            $messages = Message::where('type', 'admin')->where('receiver_id', Auth::user()->id)->where('seen', false)->get();
            foreach($messages  as $entry) {
                $entry->seen = true;
                $entry->update();
            }
            return response()->json([
                'state' => 'success', 
                'unread_total' => $unreadToal, 
                'unreads' => $unreads,
                'unread_admin' => $unreadsAdmin
            ]);
        }
        return response()->json(['state' => 'error']);
    }

    public function unreadTotal(Request $request)
    {
        $unreadToal = MessageUnreads::where('receiver_id', Auth::user()->id)->get()->sum('unread');
        return response()->json(['state' => 'success', 'unread' => $unreadToal]);
    }

    /**
     * Persist message to database
     *
     * @param  Request $request
     * @return Response
     */
    public function sendMessage(Request $request)
    {
        $user = Auth::user();
        if ($request['file'] != 'null') {

            $file = $request->file('file');
            $destinationPath = 'uploads/chat/';
            if (!File::isDirectory($destinationPath)) {

                File::makeDirectory($destinationPath, 0777, true, true);
            }
            $ext = '.' . $file->getClientOriginalExtension();
            $name = str_replace($ext, date('d-m-Y') . $ext, $file->getClientOriginalName());
            // echo $name;
            $file->move($destinationPath, $name);
            $url = 'uploads/chat/' . $name;
            $attach = $url;
            $attach_name = $name;
            $attach_type = $file->getClientOriginalExtension();
        } else {
            $attach = "";
            $attach_name = null;
            $attach_type = null;
        }
        $body = $request->body;
        if($body == null) $body = "";
        $reply_message_id = $request->reply_message_id == 'null' ? null : $request->reply_message_id;
        try {
            if($request->type == 'passenger'){
                if (Rooms::where('sender_id', Auth::user()->id)->where('receiver_id', $request->receiver_id)->where('listing_id', $request->listing_id)->count() == 0) {
                    $room = Rooms::create([
                        'sender_id' => Auth::user()->id,
                        'receiver_id' => $request->receiver_id,
                        'listing_id' => $request->listing_id
                    ]);
                } else {
                    $room = Rooms::where('sender_id', Auth::user()->id)->where('receiver_id', $request->receiver_id)->where('listing_id', $request->listing_id)->first();
                }
                $room_id = $room->id;
            }
            else if($request->type == 'driver') {
                $room_id = $request->room_id;
            }
            $message = $user->messages()->create([
                'body' => $body,
                'receiver_id' => $request->receiver_id,
                'reply_message_id' => $reply_message_id,
                'attach_url' => $attach,
                'attach_name' => $attach_name,
                'attach_type' => $attach_type,
                'type' => $request->type,
                'room_id' => $room_id
            ]);

            if(MessageUnreads::where('sender_id', Auth::user()->id)->where('receiver_id', $request->receiver_id)->where('room_id', $room_id)->count() == 0){
                MessageUnreads::create([
                    'sender_id' => Auth::user()->id,
                    'receiver_id' => $request->receiver_id,
                    'last_message' => $request->input('body'),
                    'unread' => 1,
                    'type' => 'trip',
                    'room_id' => $room_id
                ]);
            }
            else{
                $unread = MessageUnreads::where('sender_id', Auth::user()->id)->where('receiver_id', $request->receiver_id)->where('room_id', $room_id)->first();
                // $unread->last_message = $request->input('body');
                // $unread->unread +=1;
                $unread->update([
                    'last_message' => $request->input('body'),
                    'unread' => $unread->unread + 1
                ]); 
            }

            broadcast(new MessageCreated($message))
                ->toOthers();


            return response()->json(['message' => $message]);
        } catch (\Throwable $th) {
            throw $th;
            // return response()->json(['message' => $th]);
        }
    }

    public function adminSendMessage(Request $request)
    {
        $user = Auth::user();
        if ($request['file'] != 'null') {

            $file = $request->file('file');
            $destinationPath = 'uploads/chat';
            if (!File::isDirectory($destinationPath)) {

                File::makeDirectory($destinationPath, 0777, true, true);
            }
            $ext = '.' . $file->getClientOriginalExtension();
            $name = str_replace($ext, date('d-m-Y') . $ext, $file->getClientOriginalName());
            // echo $name;
            $file->move($destinationPath, $name);
            $url = 'uploads/chat/' . $name;
            $attach = $url;
            $attach_name = $name;
            $attach_type = $file->getClientOriginalExtension();
        } else {
            $attach = "";
            $attach_name = null;
            $attach_type = null;
        }
        $body = $request->body;
        if ($body == null) $body = "";
        $reply_message_id = $request->reply_message_id == 'null' ? null : $request->reply_message_id;
        try {
            // if ($request->type == 'passenger') {
            //     if (Rooms::where('sender_id', Auth::user()->id)->where('receiver_id', $request->receiver_id)->where('listing_id', $request->listing_id)->count() == 0) {
            //         $room = Rooms::create([
            //             'sender_id' => Auth::user()->id,
            //             'receiver_id' => $request->receiver_id,
            //             'listing_id' => $request->listing_id
            //         ]);
            //     } else {
            //         $room = Rooms::where('sender_id', Auth::user()->id)->where('receiver_id', $request->receiver_id)->first();
            //     }
            //     $room_id = $room->id;
            // } else if ($request->type == 'driver') {
            // }
            if (Auth::user()->role[0]->title == 'Administrator') {
                $room_id = $request->receiver_id;
            }
            else{
                $room_id = Auth::user()->id;
            }
            $message = $user->messages()->create([
                'body' => $body,
                'receiver_id' => $request->receiver_id,
                'reply_message_id' => $reply_message_id,
                'attach_url' => $attach,
                'attach_name' => $attach_name,
                'attach_type' => $attach_type,
                'type' => $request->type,
                'room_id' => $room_id
            ]);

            if (MessageUnreads::where('sender_id', Auth::user()->id)->where('receiver_id', $request->receiver_id)->where('type', 'admin')->count() == 0) {
                MessageUnreads::create([
                    'sender_id' => Auth::user()->id,
                    'receiver_id' => $request->receiver_id,
                    'last_message' => $request->input('body'),
                    'type' => 'admin',
                    'unread' => 1
                ]);
            } else {
                $unread = MessageUnreads::where('sender_id', Auth::user()->id)->where('receiver_id', $request->receiver_id)->where('type', 'admin')->first();
                $unread->update([
                    'last_message' => $request->input('body'),
                    'unread' => $unread->unread + 1
                ]); 
            }

            broadcast(new MessageCreated($message))
                ->toOthers();
            return response()->json(['message' => $message]);
        } catch (\Throwable $th) {
            throw $th;
            // return response()->json(['message' => $th]);
        }
    }

    public function edit(Request $request)
    {
        try {
            $message_id = $request->message_id;
            if ($request->type == 'driver' || $request->type == 'passenger' || $request->type == 'admin') {
                $message = Message::findOrfail($message_id);
                $message->update(['body' => $request->body]);
            }else if ($request->type == 'supportAdmin') {
                $message = SupportMessage::findOrfail($message_id);
                $message->body = $request->body;
                $message->update(['body' => $request->body]);
            }
            $message->edited = true;
            // $message->type = $request->type;
            $message->update(['edited' => true]);
            broadcast(new MessageEdited($message))
                ->toOthers();
            return response()->json(['state' => 'success']);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['message' => 'error']);
        }
    }

    public function delete(Request $request)
    {
        try {
            $message_id = $request->message_id;
            if ($request->type == 'driver' || $request->type == 'passenger' || $request->type == 'admin') {
                $message = Message::findOrfail($message_id);
            } else if ($request->type == 'curator' || $request->type == 'referral') {
                // $message = CuratorMessage::findOrfail($message_id);
            } else if ($request->type == 'supportAdmin') {
                // $message = SupportMessage::findOrfail($message_id);
            }
            $message->deleted = true;
            $message->update(['deleted' => true]);
            $message->type = $request->type;
            broadcast(new MessageDeleted($message))
                ->toOthers();
            return response()->json(['message' => 'success']);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['state' => 'error']);
        }
    }

    public function deleteMulti(Request $request)
    {

        try {
            if ($request->input('message_ids')) {
                $ids = explode(",", $request->input('message_ids'));
                $entries = Message::whereIn('id', $ids)->get();

                foreach ($entries as $entry) {
                    $entry->update(['deleted' => true]);
                }
            }
            // broadcast(new MessageDeleted($message))
            //     ->toOthers();
            return response()->json(['message' => 'success']);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['message' => 'error']);
        }
    }

    public function roomArchive(Request $request)
    {
        try {
            if ($request->room_id == 'undefinded') {
                // $room = Rooms::create([
                //     'student_id' => Auth::user()->id,
                //     'lesson_id' => $request->lessons_id,
                //     'archive' => $request->archive
                // ]);
            } else {
                $room = Rooms::findOrfail($request->room_id);
                $room->update(['archive' => $request->archive]);
            }
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['message' => $th]);
        }
    }

    public function adminroomArchive(Request $request)
    {
        try {
            if (AdminUserChat::where('user_id', $request->user_id)->count() > 0) {
                $room = AdminUserChat::where('user_id', $request->user_id)->first();
                $room->archive = $request->archive;
                $room->save();
            } else {
                AdminUserChat::create([
                    'user_id' => $request->user_id,
                    'archive' => $request->archive,
                    'unread' => 0
                ]);
            }
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['message' => $th]);
        }
    }

    public function fetchAdminNotification(Request $request){
        $user_id = Auth::user()->id;
        $total = MessageUnreads::where('receiver_id', $user_id)->where('type', 'admin')->get()->sum('unread');
        
        $rooms = DB::select(DB::raw("SELECT
            users.name as sender_name,
            users.avatar as sender_avatar,
            message_unreads.sender_id as sender_id,
            message_unreads.unread as unread,
            message_unreads.last_message as last_message,
            message_unreads.created_at as last_message_at
            FROM public.message_unreads
            left JOIN users
            ON users.id=message_unreads.sender_id
            where message_unreads.type='admin' AND message_unreads.receiver_id=$user_id AND message_unreads.unread > 0 "));

        return response()->json([
            'unread_total' => $total,
            'rooms' => $rooms, 
            ]
        );
    }
}
