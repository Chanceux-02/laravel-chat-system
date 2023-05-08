<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function sendGroupMessage(Request $request){
        // dd($request);

        $uid = auth()->id();
        $p_id = Profile::select('p_id')->where('u_id', $uid)->value('p_id');
        
        $chat_id = $request->input('c_id');
        $chatMember_id = $request->input('cm_id');
        $messageInput = $request->input('message');
        $receiverId = $request->input('receiver_id');

        $message = new Message;
        $message->p_id = $p_id;
        $message->c_id = $chat_id;
        $message->receiver_id = $receiverId;
        $message->cm_id = $chatMember_id;
        $message->message = $messageInput;
        $message->save();

        return redirect('/');
    }
}
