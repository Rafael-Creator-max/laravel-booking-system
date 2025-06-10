<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TripOverviewController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/trips', [TripOverviewController::class, 'index']);
