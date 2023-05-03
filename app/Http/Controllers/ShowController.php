<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShowController extends Controller
{
    public function index(){

        // $message = Message::all();
        $message = DB::table('profile_table')
        ->join('messages_table', 'profile_table.p_id', '=', 'messages_table.p_id')
        ->select('profile_table.*', 'messages_table.*')
        ->get();

        return view('index', ['message'=>$message]);
    }
}
