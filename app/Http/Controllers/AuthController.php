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
        // $email = $request->input('email');
        // $pwd = $request->input('password');
        // $gethashedPwd = DB::table('user_table')->where('email',$email)->get();
        // dd($request);
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
        // dd($request);
        $fname = $request->input('fname');
        $lname = $request->input('lname');
        $age = $request->input('age');
        $profile_pic = $request->input('image');
        $profile_pic = $request->input('bio');
        $username = $request->input('username');
        $email = $request->input('email');
        $password = $request->input('password');

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

        return view('auth.login');

    }
}
