<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class TripController extends Controller
{
    public function setup(Request $request)
    {
        Carbon::parse($request->data['checkIn']);
        Carbon::parse($request->data['checkOut']);

        $data = [
            'next' => env('APP_URL') . '/trip',
        ];

        return response()->json($data, 200);
    }

    public function plan(Request $request)
    {
        return view('frontend.entities.trip.plan');
    }
}
