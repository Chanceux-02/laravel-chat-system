<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShowController extends Controller
{
    public function index(){

        // $message = Message::all();
        $message = DB::table('messages_table')->get();

        return view('index', ['message'=>$message]);
    }
}
