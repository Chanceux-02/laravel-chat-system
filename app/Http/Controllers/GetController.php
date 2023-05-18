<?php

namespace App\Http\Controllers;

use App\Http\Controllers\RecyclableControler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GetController extends Controller
{
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
        return view('pages.singleChat', $datas);
    }
    public function singleChatAjax($id){
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

        return view('ajax.singleChat', $datas);
    }
    public function viewEditProfile(){
        $method = new RecyclableControler;
        $title = ['title' => 'Edit Profile',];
        $datas = $method->viewEditProfile($title);
        return view('pages.editPages.editProfile', $datas);
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
            // dd("no user");
            return view('errors.404_not_found');
        }
       
        $datas = $method->allUserMessages($paramData);
        $datas['users'] = $searchedUser;
        // dd($datas);
        return view('index', $datas);
    }
}
