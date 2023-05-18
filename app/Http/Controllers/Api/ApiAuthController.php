<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApiAuthController extends Controller{
        public function login(Request $request){
        $validated = Validator::make($request->all(), [
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()], 422);
        }

        $credentials = $request->only('email', 'password');
        $auth = Auth::attempt($credentials);

        if (!$auth) {
            return response()->json(['message' => 'Login Failed!'], 401);
        }

        // Session regeneration can be omitted in API scenarios

        return response()->json(['message' => 'Login successful!'], 200);
    }
    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return response()->json(['message' => 'Logout successful!'], 200);
    }
    public function register(Request $request){

        $validate = Validator::make($request->all(),[
            "fname" => ['required', 'min:3','max:10'],
            "lname" => ['required', 'min:3','max:10'],
            "age" => ['required', 'max:3'],
            "email" => ['required', 'email'],
            "password" => 'required'
        ]);

        if($validate->fails()){
            return response()->json(['errors' => $validate->errors()], 422);
        }

        $fname = strip_tags($request->input('fname'));
        $lname = strip_tags($request->input('lname'));
        $age = $request->input('age');
        $profile_pic_img = $request->file('image');

        $uniquName = $profile_pic_img->hashName();
        $bio = strip_tags($request->input('bio'));
        $username = strip_tags($request->input('username'));
        $email = strip_tags($request->input('email'));
        $password = strip_tags($request->input('password'));
        
        $renameImage = str_replace(" ", "-", $fname);
        $toLowerCase = strtolower($renameImage);
        $imageName = $toLowerCase."-".$uniquName;
        $profile_pic_img->storeAs('public/profile-pics', $imageName);
        $hashedPassword = Hash::make($password);

        $user = new User;
        $user->username = $username;
        $user->email = $email;
        $user->password = $hashedPassword;
        $user->save();

        $userID = $user->u_id;

        $profile = new Profile;
        $profile->u_id = $userID;
        $profile->first_name = $fname;
        $profile->last_name = $lname;
        $profile->age = $age;
        $profile->image_path = $imageName;
        $profile->bio = $bio;
        $profile->save();

        return response()->json(['message' => 'Register successful!'], 200);
    }

}
