<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function login() {
        return view('auth/login');
    }

    function sign_up() {
        return view('auth/sign-up');
    }

    function save(Request $request) {
        $request -> validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'password' => 'required|min:6|max:12'
        ]);

        $user = new User;
        $user -> name = $request -> name;
        $user -> email = $request -> email;
        $user -> phone = $request -> phone;
        $user -> password = Hash::make($request -> password);
        $save = $user -> save();

        if($save) {
            return back() -> with('success', 'Sign up successful. <a href="'. route('login').'">Login</a> now');
        } else {
            return back() -> with('fail', 'Something went wrong, try again later');
        }
    }

    function check(Request $request) {
        $request -> validate([
            'email' => 'required|email',
            'password' => 'required|min:6|max:12'
        ]);

        $userInfo = User::where('email', '=', $request -> email) -> first();

        if(!$userInfo) {
            return back() -> with('fail', 'We do not recognize your email address');
        } else {
            if(Hash::check($request -> password, $userInfo -> password)) {
                $request -> session() -> put('LoggedUser', $userInfo -> id);
                return redirect(route('home'));
            } else {
                return back() -> with('fail', 'Incorrect password');
            }
        }
    }
}
