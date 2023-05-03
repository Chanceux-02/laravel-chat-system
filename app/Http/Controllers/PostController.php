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
        $getPid = Profile::select('p_id')->where('u_id', $uid)->get();
        $p_id = "";
        foreach ($getPid as  $pid) {
            $p_id = $pid->p_id;
        }
        
        $chat_id = $request->input('c_id');
        $chatMember_id = $request->input('cm_id');
        $messageInput = $request->input('message');
        
        $message = new Message;
        $message->p_id = $p_id;
        $message->c_id = $chat_id;
        $message->cm_id = $chatMember_id;
        $message->message = $messageInput;
        $message->save();

        return redirect('/');
    }
}
