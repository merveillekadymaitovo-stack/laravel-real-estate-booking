<?php

namespace App\Http\Controllers;

use App\Models\Booking;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with('property', 'user')->latest()->get();
        return view('bookings.index', compact('bookings'));
    }

    public function confirm($id)
    {
        $booking = Booking::findOrFail($id);

        $booking->status = 'confirmed';
        $booking->save();

        return back();
    }

    public function cancel($id)
    {
        $booking = Booking::findOrFail($id);

        $booking->status = 'cancelled';
        $booking->save();

        return back();
    }
}