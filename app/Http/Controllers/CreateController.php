<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CreateController extends Controller
{
    public function sendGroupMessage(Request $request){
        // dd($request);

        $profile_id = $request->input('p_id');
        $chat_id = $request->input('c_id');
        $chatMember_id = $request->input('cm_id');
        $messageInput = $request->input('message');

        // $message = Message::all();
        // $message = DB::table('messages_table');
        $message = new Message;
        $message->p_id = $profile_id;
        $message->c_id = $chat_id;
        $message->cm_id = $chatMember_id;
        $message->message = $messageInput;
        $message->save();

    }
}
