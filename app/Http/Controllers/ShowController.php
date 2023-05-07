<?php

namespace App\Http\Controllers;

use App\Http\Controllers\RecyclableControler;

class ShowController extends Controller
{
    public function index(){
        $method = new RecyclableControler;
        $title = ['title' => 'Group Chat'];
        $datas = $method->allUserMessages($title);
        return view('index', $datas);
    }
}
