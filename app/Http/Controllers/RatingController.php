<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;

class RatingController extends Controller
{
    public function contact_us() {
        return view('contact-us');
    }

    public function store(Request $request)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);

        $rates = new Rating;
        $rates -> rating = $request -> rating;
        $rates -> comment = $request -> comment;
        $save = $rates -> save();

        if ($save) {
            return response()->json(['message' => 'Rating submitted successfully!']);
        } else {
            return response()->json(['message' => 'Invalid rating value.'], 400);
        }

    }
}
