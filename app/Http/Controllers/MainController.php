<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    function check_rooms(Request $request) {
        $checkinDate = $request -> query('checkin-date');
        $checkoutDate = $request -> query('checkout-date');

        return view('rooms', compact('checkinDate', 'checkoutDate'));
    }
}
