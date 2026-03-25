<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'property_id',
        'start_date',
        'end_date',
        'status',
        'total_price'  // 👈 ajouté
    ];

    protected static function booted()
    {
        static::creating(function ($booking) {
            $property = Property::find($booking->property_id);

            if ($property) {
                $start = \Carbon\Carbon::parse($booking->start_date);
                $end   = \Carbon\Carbon::parse($booking->end_date);
                $nights = $start->diffInDays($end);

                $booking->total_price = $nights * $property->price_per_night;
            }
        });
    }

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}