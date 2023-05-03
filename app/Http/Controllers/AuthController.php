<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request){
        
        $validated = Validator::make($request->all(),[
            "email" => ['required', 'email'],
            "password" => 'required'
        ]);

        if ($validated->fails()) {
            return redirect('/login')
            ->withErrors($validated)
            ->withInput();
        }

        $credentials = $request->only('email', 'password');
        $auth = Auth::attempt($credentials);
        if (!$auth) {
            return back()->withErrors(['email' => 'Login Failed'])->onlyInput('email');
        }

        $request->session()->regenerate();
        return redirect('/')->with('message', 'Login successful!');

    }

    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('message', 'Logout successful');
    }

    public function register(Request $request){

        $validate = Validator::make($request->all(),[
            "fname" => ['required', 'min:3|max:10'],
            "lname" => ['required', 'min:3|max:10'],
            "age" => ['required', 'max:3'],
            "email" => ['required', 'email'],
            "password" => 'required'
        ]);

        if($validate->fails()){
            $errMessage = $validate->messages();
            return view('auth.register')->with('message',$errMessage);
        }

        $fname = strip_tags($request->input('fname'));
        $lname = strip_tags($request->input('lname'));
        $age = $request->input('age');
        $profile_pic = strip_tags($request->input('image'));
        $profile_pic = strip_tags($request->input('bio'));
        $username = strip_tags($request->input('username'));
        $email = strip_tags($request->input('email'));
        $password = strip_tags($request->input('password'));

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
        $profile->image_path = $profile_pic;
        $profile->bio = $profile_pic;
        $profile->save();

        return view('auth.login')->with('message','Logged in Successful!');

    }
}
