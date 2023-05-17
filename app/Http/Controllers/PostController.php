<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isNull;

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

        if(is_null($receiverId)){
            $receiverId = 0;
        }
        
        $message = new Message;
        $message->p_id = $p_id;
        $message->c_id = $chat_id;
        $message->receiver_id = $receiverId;
        $message->cm_id = $chatMember_id;
        $message->message = $messageInput;
        $message->save();
        // return redirect('/');
    }

    public function search(Request $req){
        $search = $req->search;
        $method = DB::table('profile_table')
        ->where('first_name', 'like', $search)
        ->orWhere('last_name', 'like', $search)
        ->get();
        if(count($method) == 0){
            dd("no user");
            return view('pages.searched', ['result' => $method]);
        }
        return view('pages.searched', ['result' => $method]);
    }
}
