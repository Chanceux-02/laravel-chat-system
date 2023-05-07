<?php

namespace App\Http\Controllers;

use App\Http\Controllers\RecyclableControler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GetController extends Controller
{
    public function singleChat($id){
        $method = new RecyclableControler;
        // $user = DB::table('profile_table')->where('p_id', $id)->get();
        $userId = auth()->id();
        $twoUserMessage = DB::table('profile_table')
        ->join('messages_table', 'profile_table.p_id', '=', 'messages_table.p_id')
        ->select('profile_table.*', 'messages_table.*')
        ->where('profile_table.p_id', $id)
        ->orWhere('profile_table.p_id', $userId)
        ->orderByDesc('messages_table.created_at')
        ->get();
        $arr = ['title' => 'Single Chat',
                'toUser' => $twoUserMessage
                ];
        $datas = $method->allUserMessages($arr);

        return view('pages.singleChat', $datas);
    }
}
