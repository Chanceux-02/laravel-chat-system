<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
}
