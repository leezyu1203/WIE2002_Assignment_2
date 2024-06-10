<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Room;
use App\Models\Booking;

class MainController extends Controller
{
    public function check_rooms(Request $request)
    {
        $checkinDate = $request->query('checkin-date');
        $checkoutDate = $request->query('checkout-date');

        $rooms = Room::all();

        if ($checkinDate && $checkoutDate) {
            $rooms = $rooms->filter(function ($room) use ($checkinDate, $checkoutDate) {
                return $this->isRoomAvailable($room->id, $checkinDate, $checkoutDate);
            });
        }

        return view('rooms', compact('rooms', 'checkinDate', 'checkoutDate'));
    }

    public function rooms_booking(Request $request, $roomId)
    {
        if (!session()->has('LoggedUser')) {
            return redirect(route('login'));
        }
        
        $rooms = Room::find($roomId);

        if (!$rooms) {
            abort(404, 'Room not found');
        }

        $checkinDate = $request->query('checkin-date');
        $checkoutDate = $request->query('checkout-date');

        $checkin_date = new \DateTime($checkinDate);
        $checkout_date = new \DateTime($checkoutDate);
        $interval = $checkin_date->diff($checkout_date);
        $numOfNights = $interval->days;

        $data = ['UserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
        return view('booking', $data, compact('rooms', 'checkinDate', 'checkoutDate', 'numOfNights'));
    }

    public function handle_booking(Request $request)
    {
        $validatedData = $request->validate([
            'roomId' => 'required|integer|exists:rooms,id',
            'checkinDate' => 'required|date',
            'checkoutDate' => 'required|date',
            'numOfNights' => 'required|integer',
            'totalCost' => 'required|numeric',
        ]);

        $userId = session('LoggedUser');
        $roomId = $request->roomId;
        $checkinDate = $request->checkinDate;
        $checkoutDate = $request->checkoutDate;

        // Check room availability
        if (!$this->isRoomAvailable($roomId, $checkinDate, $checkoutDate)) {
            return redirect()->back()->with('fail', 'Room not available for the selected dates.');
        }

        // Create new booking
        $booking = new Booking;
        $booking->user_id = $userId;
        $booking->room_id = $roomId;
        $booking->checkin_date = $checkinDate;
        $booking->checkout_date = $checkoutDate;
        $booking->num_of_nights = $request->numOfNights;
        $booking->total_cost = $request->totalCost;
        $booking->save();

        return redirect()->route('myprofile')->with('success', 'Booking successfully added!');
    }

    private function isRoomAvailable($roomId, $checkinDate, $checkoutDate)
    {
        // Ensure dates are in the correct format
        $checkinDate = (new \DateTime($checkinDate))->format('Y-m-d');
        $checkoutDate = (new \DateTime($checkoutDate))->format('Y-m-d');

        $room = Room::find($roomId);

        // Get the number of overlapping bookings
        $overlappingBookings = Booking::where('room_id', $roomId)
            ->where(function ($query) use ($checkinDate, $checkoutDate) {
                $query->whereBetween('checkin_date', [$checkinDate, $checkoutDate])
                    ->orWhereBetween('checkout_date', [$checkinDate, $checkoutDate])
                    ->orWhere(function ($query) use ($checkinDate, $checkoutDate) {
                        $query->where('checkin_date', '<=', $checkinDate)
                            ->where('checkout_date', '>', $checkoutDate);
                    });
            })
            ->count();

        // Check if the room is available
        return ($room->numsRooms - $overlappingBookings) > 0;
    }

    public function cancelBooking($id)
    {
        $booking = Booking::find($id);
        if (!$booking) {
            return redirect()->back()->with('fail', 'Booking not found.');
        }

        $room = $booking->room;
        $booking->delete();
        $room->save();

        return redirect()->route('myprofile')->with('success', 'Booking successfully canceled!');
    }
}
