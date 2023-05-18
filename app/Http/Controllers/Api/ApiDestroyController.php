<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class ApiDestroyController extends Controller
{
    public function destroyProfile(){
        $userId = auth()->id();
        $user = User::findOrFail($userId);
        if (!$user) {
            return response()->json(['message' => 'Profile Failed to Deleted!'], 401);
        }
        $user->delete();
        return response()->json(['message' => 'Profile Deleted Successfuly!'], 200);
    }
    public function destroyMessage(Request $req){
        $message = Message::findOrFail($req->input('messageId'));
        $message->delete();
        if (!$message) {
            return response()->json(['message' => 'Deleting failed!'], 401);
        }
        return response()->json(['message' => 'Deleted successfuly!'], 200);
    }
}
