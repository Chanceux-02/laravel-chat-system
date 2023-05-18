<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\RecyclableControler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiGetController extends Controller
{
    public function index(){
        $method = new RecyclableControler;
        $title = ['title' => 'Group Chat'];
        $datas = $method->allUserMessages($title);
        return response()->json($datas, 200);
    }
    public function allChat(){
        $method = new RecyclableControler;
        $title = ['title' => 'Group Chat'];
        $datas = $method->allUserMessages($title);
        return response()->json($datas, 200);
    }
    public function userProfile(){
        $method = new RecyclableControler;
        $title = ['title' => 'User Profile'];
        $datas = $method->viewEditProfile($title);
        return response()->json($datas, 200);
    }
    public function viewEditProfile(){
        $method = new RecyclableControler;
        $title = ['title' => 'Edit Profile',];
        $datas = $method->viewEditProfile($title);
        return response()->json($datas, 200);
    }
    public function singleChat($id){
        $method = new RecyclableControler;
        $userId = auth()->id();
        $userProfile = DB::table('profile_table')->where('u_id', $userId)->value('p_id');
        
        $twoUserMessage = DB::table('profile_table')
        ->join('messages_table', 'profile_table.p_id', '=', 'messages_table.p_id')
        ->whereIn('messages_table.p_id', [$id, $userProfile])
        ->whereIn('messages_table.receiver_id', [$id, $userProfile])
        ->orderByDesc('messages_table.created_at')
        ->get();

        $arr = ['title' => 'Single Chat',
                'toUser' => $twoUserMessage
                ];
        $datas = $method->allUserMessages($arr);
        return response()->json($datas, 200);
    }
    public function search(Request $req){

        $search = $req->search;
        $searchedUser = DB::table('profile_table')
        ->where('first_name', 'like', $search)
        ->orWhere('last_name', 'like', $search)
        ->get();
        $method = new RecyclableControler;
        $paramData = [
            'title' => 'Searched',
        ];
        if(count($searchedUser) == 0){
            return response()->json(['errors'=>'404_not_found'], 404);
        }
       
        $datas = $method->allUserMessages($paramData);
        $datas['users'] = $searchedUser;
        return response()->json($datas, 200);
    }
}
