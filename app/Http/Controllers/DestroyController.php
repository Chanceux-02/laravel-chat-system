<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DestroyController extends Controller
{
    public function destroyProfile(){
        $userId = auth()->id();
        $user = User::findOrFail($userId);
        $check = $user->delete();
        if (!$check) {
            return redirect()->back()->withErrors($check);
        }
        return redirect('/login')->with(['message' => 'deleted successful']);
    }
    public function destroyMessage(Request $req){
        $message = Message::findOrFail($req->input('messageId'));
        $check = $message->delete();
        if (!$message) {
            return redirect()->back()->withErrors($check);
        }
        return redirect('/')->with(['message' => 'deleted successful']);
    }
}
