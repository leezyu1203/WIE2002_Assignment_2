<?php

namespace App\Http\Controllers;

use Date;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Room;
use App\Models\Booking;

class MainController extends Controller
{
    function check_rooms(Request $request) {
        $rooms = Room::all();
        $checkinDate = $request -> query('checkin-date');
        $checkoutDate = $request -> query('checkout-date');

        return view('rooms', compact('rooms', 'checkinDate', 'checkoutDate'));
    }

    function rooms_booking(Request $request, $roomId) {
        if(!session()->has('LoggedUser')) {
            return redirect(route('login'));
        }
        $rooms = Room::find($roomId);

        if (!$rooms) {
            abort(404, 'Room not found');
        }
        
        $checkinDate = $request -> query('checkin-date');
        $checkoutDate = $request -> query('checkout-date');

        $checkin_date = new \DateTime($checkinDate);
        $checkout_date = new \DateTime($checkoutDate);
        $interval = $checkin_date -> diff($checkout_date);
        $numOfNights = $interval->days;

        $data = ['UserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
        return view('booking', $data, compact('rooms', 'checkinDate', 'checkoutDate', 'numOfNights'));
    }

    function handle_booking(Request $request)
    {
        // Debugging: Check if all data is present
        $validatedData = $request->validate([
            'roomId' => 'required|integer|exists:rooms,id',
            'checkinDate' => 'required|date',
            'checkoutDate' => 'required|date',
            'numOfNights' => 'required|integer',
            'totalCost' => 'required|numeric',
        ]);

        // Debug: Log the validated data to the Laravel log
        \Log::info('Booking data:', $validatedData);

        // Logic for handling POST request to pass booking info
        $userId = session('LoggedUser');
        $booking = new Booking;
        $booking->user_id = $userId;
        $booking->room_id = $request->roomId;
        $booking->checkin_date = $request->checkinDate;
        $booking->checkout_date = $request->checkoutDate;
        $booking->num_of_nights = $request->numOfNights;
        $booking->total_cost = $request->totalCost;
        $booking->save();

        return redirect()->route('myprofile')->with('success', 'Booking successfully added!');
    }

}
