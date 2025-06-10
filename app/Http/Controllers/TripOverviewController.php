<?php

namespace App\Http\Controllers;
use App\Models\Trip;
use Illuminate\Http\Request;

class TripOverviewController extends Controller
{
    public function index()
    {
        $trips = Trip::with('bookings')
            ->orderBy('start_date', 'asc')
            ->get();

        return view('trips.index', compact('trips'));
    }
}
