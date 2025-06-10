<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Trip extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'region', 'start_date', 'duration_days', 'price_per_person'];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
