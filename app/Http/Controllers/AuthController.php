<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Booking;
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
            return back() -> with('fail', 'Incorrect email or password. Try again.');
        } else {
            if(Hash::check($request -> password, $userInfo -> password)) {
                $request -> session() -> put('LoggedUser', $userInfo -> id);
                return redirect(route('home'));
            } else {
                return back() -> with('fail', 'Incorrect email or password. Try again.');
            }
        }
    }

    // function profile(Request $request) {
    //     $data = ['UserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
    //     return view('my-profile', $data);
    // }

    public function profile(Request $request)
    {
        $userId = session('LoggedUser');
        $user = User::find($userId);

        // Retrieve bookings for the logged-in user
        $bookings = Booking::where('user_id', $userId)->with('room')->get();

        // Pass user info and bookings to the view
        $data = [
            'UserInfo' => $user,
            'bookings' => $bookings
        ];

        return view('my-profile', $data);
    }
    
    function edit(Request $request) {
        $request -> validate([
            'name' => 'required',
            'phone' => 'required',
        ]);

        $user = User::findOrFail(session('LoggedUser'));
        $user -> name = $request -> name;
        $user -> phone = $request -> phone;

        $updated = $user -> save();

        if($updated) {
            return back()->with('success', 'Your information updated successfully.');
        } else {
            return back()->with('fail', 'Something went wrong, try again later.');
        }
    }

    function logout(Request $request) {
        if(session()->has('LoggedUser')) {
            session()->pull('LoggedUser');
            return redirect(route('login'));
        }
    }
}
