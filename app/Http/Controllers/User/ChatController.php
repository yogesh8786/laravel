<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use Illuminate\Http\Request;
use App\Models\ChatRelation;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function createChatForm()
    {
        return view('user.create_chat');
    }
    public function chatsForm()
    {
        $data['users'] = User::where('id','!=', Auth::id())->get();
        return view('user.chats', $data);
    }

    public function chating(Request $request)
    {
        $data['chatuser'] = User::where('id',$request->id)->first();
        $data['users'] = User::where('id','!=', Auth::id())->get();
        $data['groupedUsers'] = $data['users']->groupBy(function($item,$key) {
            return $item->name[0];     //treats the name string as an array
        })->sortBy(function($item,$key){      //sorts A-Z at the top level
                return $key;
        });

        $relation = ChatRelation::where(function($q) use ($request){
            $q->where([
                'sender_id'      => Auth::id(),
                'receiver_id'    => $request->id,
            ]);
          })->orWhere(function($q) use ($request){
            $q->where([
                'sender_id'      => $request->id,
                'receiver_id'    => Auth::id(),
            ]);
        })->first();

        if($relation)
        {
            Chat::where(['chat_relation_id' => $relation->id, 'receiver_id' => Auth::id()])->update(['seen_status' => 1]);

            $data['messages'] = Chat::where('chat_relation_id', $relation->id)->get();
            $data['groupedBydate'] = $data['messages']->groupBy(function($item,$key) {
               return $item->created_at->format('D, Y-M d ');
            });
            $data['relation'] = $relation;
        }

        return view('user.chat-direct', $data);
    }

    public function sendMessage(Request $request)
    {
        $relation = ChatRelation::where(function($q) use ($request){
            $q->where([
                'sender_id'      => Auth::id(),
                'receiver_id'    => $request->id,
            ]);
          })->orWhere(function($q) use ($request){
            $q->where([
                'sender_id'      => $request->id,
                'receiver_id'    => Auth::id(),
            ]);
        })->first();

        if(!$relation)
        {
            $relation = new ChatRelation;
            $relation->sender_id = Auth::id();
            $relation->receiver_id = $request->id;
            $relation->save();
        }

       $data = Chat::create([
            'chat_relation_id' => $relation->id,
            'sender_id'        => Auth::id(),
            'receiver_id'      => $request->id,
            'message'          => $request->message,
            'seen_status'      => 0
        ]);
        return response()->json(['status' => 200, 'message' => __('Msg send'), 'data' => $data], 200);

        // return back();
    }

    public function chatAjax(Request $request){

        // $data['chat'] = Chat::with(['sender','receiver','media'])->where('chat_relation_id',$request->chat_relation_id)->paginate(40);
        $data['messages'] = Chat::where('chat_relation_id', $request->id)->get();
            $data['groupedBydate'] = $data['messages']->groupBy(function($item,$key) {
            return $item->created_at->format('D, Y-M d ');
            });
        return view('user.chatAjax',$data);

    }
    public function deletemessage($id)
    {
        Chat::where('id',$id)->delete();
        return back();
    }
}
