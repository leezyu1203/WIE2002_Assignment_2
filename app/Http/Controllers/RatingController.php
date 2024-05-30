<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function store(Request $request)
    {
        $rating = intval($request->input('rating'));

        if ($rating >= 1 && $rating <= 5) {
            // Here, you would typically store the rating in a database
            // For demonstration, we're just returning a success message
            return response()->json(['message' => 'Rating submitted successfully!']);
        } else {
            return response()->json(['message' => 'Invalid rating value.'], 400);
        }
    }
}
