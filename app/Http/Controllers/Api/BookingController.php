<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Trip;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;

class BookingController extends Controller
{
    public function index()
    {
        return Booking::with('trip')->get();
    }
    public function store(Request $request)
    {
        
        // Check op token
        if (!$request->has('token')) {
            return response()->json(['error' => 'Token is vereist.'], 401);
        }
        

        $expectedToken = md5($request->email . 'canadarocks');
        
        \Log::debug('EMAIL:', [$request->email]);
        \Log::debug('EXPECTED:', [$expectedToken]);
        \Log::debug('GIVEN:', [$request->token]);


        if ($request->token !== $expectedToken) {
            return response()->json(['error' => 'Token is ongeldig.'], 403);
        }

        // Validatie
        $validator = Validator::make($request->all(), [
            'trip_id' => 'required|exists:trips,id',
            'name' => 'required|string',
            'email' => 'required|email',
            'number_of_people' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Booking aanmaken
        $booking = Booking::create([
            'trip_id' => $request->trip_id,
            'name' => $request->name,
            'email' => $request->email,
            'number_of_people' => $request->number_of_people,
            'status' => 'pending',
        ]);

        return response()->json($booking, 201);
    }
}

