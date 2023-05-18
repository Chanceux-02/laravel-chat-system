<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecyclableControler extends Controller
{
    public function allUserMessages($add){
   
        $message = DB::table('profile_table')
        ->join('messages_table', 'profile_table.p_id', '=', 'messages_table.p_id')
        ->select('profile_table.*', 'messages_table.*')
        ->where('messages_table.receiver_id', 0)
        ->orderByDesc('messages_table.created_at')
        ->get();

        $userId = auth()->id();
        $userProfile = DB::table('profile_table')->where('u_id', $userId)->value('p_id');
        $users = DB::table('profile_table')->whereNot('profile_table.p_id', $userProfile)->get(); 

        $data = [
            'message'=>$message,
            'users'=>$users,
            ];

        $result =  array_merge($data, $add);
        return $result;
    }

    public function viewEditProfile($add){
        $userId = auth()->id();
        $datas = DB::table('profile_table')->where('u_id', $userId)->get();
        $data = [
            'datas'=>$datas,
        ];
        $result =  array_merge($data, $add);
        return $result;
    }

}
