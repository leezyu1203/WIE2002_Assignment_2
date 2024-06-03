<?php

namespace App\Http\Controllers;

use Date;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Room;

class MainController extends Controller
{
    function check_rooms(Request $request) {
        $rooms = Room::all();
        $checkinDate = $request -> query('checkin-date');
        $checkoutDate = $request -> query('checkout-date');

        return view('rooms', compact('rooms', 'checkinDate', 'checkoutDate'));
    }

    function rooms_booking(Request $request) {
        if(!session()->has('LoggedUser')) {
            return redirect(route('login'));
        }
        $checkinDate = $request -> query('checkin-date');
        $checkoutDate = $request -> query('checkout-date');

        $checkin_date = new \DateTime($checkinDate);
        $checkout_date = new \DateTime($checkoutDate);
        $interval = $checkin_date -> diff($checkout_date);
        $numOfNights = $interval->days;

        $data = ['UserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
        return view('booking', $data, compact('checkinDate', 'checkoutDate', 'numOfNights'));
    }
}
