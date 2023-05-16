<?php

namespace App\Http\Controllers;

use App\Http\Controllers\RecyclableControler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GetController extends Controller
{
    public function singleChat($id){
        $method = new RecyclableControler;
        $userId = auth()->id();
        $userProfile = DB::table('profile_table')->where('u_id', $userId)->value('p_id');
        
        $twoUserMessage = DB::table('profile_table')
        ->join('messages_table', 'profile_table.p_id', '=', 'messages_table.p_id')
        ->whereIn('messages_table.p_id', [$id, $userProfile])
        ->whereIn('messages_table.receiver_id', [$id, $userProfile])
        ->orderByDesc('messages_table.created_at')
        ->get();

        $arr = ['title' => 'Single Chat',
                'toUser' => $twoUserMessage
                ];
        $datas = $method->allUserMessages($arr);
        return view('pages.singleChat', $datas);


        // return view('pages.singleChat', $datas);
    }
    public function singleChatAjax($id){
        $method = new RecyclableControler;
        $userId = auth()->id();
        $userProfile = DB::table('profile_table')->where('u_id', $userId)->value('p_id');
        
        $twoUserMessage = DB::table('profile_table')
        ->join('messages_table', 'profile_table.p_id', '=', 'messages_table.p_id')
        ->whereIn('messages_table.p_id', [$id, $userProfile])
        ->whereIn('messages_table.receiver_id', [$id, $userProfile])
        ->orderByDesc('messages_table.created_at')
        ->get();

        $arr = ['title' => 'Single Chat',
                'toUser' => $twoUserMessage
                ];
        $datas = $method->allUserMessages($arr);

        return view('ajax.singleChat', $datas);
    }
    public function viewEditProfile(){
        $method = new RecyclableControler;
        $datas = $method->viewEditProfile();
        return view('pages.editPages.editProfile', $datas);
    }
}
