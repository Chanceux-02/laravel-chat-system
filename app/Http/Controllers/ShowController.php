<?php

namespace App\Http\Controllers;
use App\Models\Profile;

use App\Http\Controllers\RecyclableControler;
use Illuminate\Support\Facades\DB;

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
        $method = new RecyclableControler;
        $title = ['title' => 'User Profile'];
        $datas = $method->viewEditProfile($title);
        return view('pages.profilePage', $datas);
    }
}
