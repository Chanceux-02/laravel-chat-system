<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Profile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UpdateController extends Controller
{
    public function editProfile(Request $req){
        // dd($last_name);
        
        $validatedData = Validator::make($req->all(),[
            'profilePic' => 'nullable',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'bio' => 'required|string|nullable',
            'age' => 'required|nullable|integer|min:18',
        ]);
        
        if($validatedData->fails()){
            return redirect()->back()->withErrors($validatedData)->withInput();
        }    
        $first_name = $req->input('first_name');
        $last_name = $req->input('last_name');
        $bio = $req->input('bio');
        $age = $req->input('age');
        $picture = $req->file('profilePic');
        
        $uid = auth()->id();
        $userProfile = DB::table('profile_table')->where('u_id', $uid)->value('p_id');
        $user = Profile::findOrFail($userProfile);
        
        $image = $picture;
        if (!$image) {
            $image = "default.img";
        }
        $uniquName = $image->hashName();
        $renameImage = str_replace(" ", "-", $last_name);
        $toLowerCase = strtolower($renameImage);
        $imageName = $toLowerCase."-".$uniquName;
        $picture->storeAs('public/profile-pics', $imageName);
        $localImage = $user->image_path;
        $pictureDelete = 'public/profile-pics/'. $localImage;

        if (!Storage::exists($pictureDelete)) {

        }
        Storage::delete($pictureDelete);
        
        $user->image_path = $imageName;
        $user->first_name = htmlspecialchars($first_name);
        $user->last_name = htmlspecialchars($last_name);
        $user->bio = htmlspecialchars($bio);
        $user->age = $age;
        $user->save();

        return redirect('/user/profile')->with('message','Edit Profile Successful!');
    }
}
