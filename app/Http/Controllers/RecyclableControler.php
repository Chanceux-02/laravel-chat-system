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
        ->orderByDesc('messages_table.created_at')
        ->get();

        $users = DB::table('profile_table')->get();

        $data = [
            'message'=>$message,
            'users'=>$users,
            ];

        $result =  array_merge($data, $add);
        return $result;
    }
}
