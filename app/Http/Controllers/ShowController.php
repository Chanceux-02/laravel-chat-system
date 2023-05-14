<?php

namespace App\Http\Controllers;
use App\Models\User;

use App\Http\Controllers\RecyclableControler;

class ShowController extends Controller
{
    public function index(){
        $method = new RecyclableControler;
        $title = ['title' => 'Group Chat'];
        $datas = $method->allUserMessages($title);
        return view('index', $datas);
    }
    public function groupChat(){
        $method = new RecyclableControler;
        $title = ['title' => 'Group Chat'];
        $datas = $method->allUserMessages($title);
        return view('ajax.group_chat', $datas);
    }
    public function userProfile(){
        $method = new User;
        $method->first_name;
        dd($method);
        return view('pages.profilePage', $datas);
    }
}
