<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Booking;

class BookingManager extends Component
{
    public $property_id;
    public $start_date;
    public $end_date;

    public function book()
    {
        if (!auth()->check()) {
            return redirect('/login');
        }

        Booking::create([
            'user_id' => auth()->id(),
            'property_id' => $this->property_id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
        ]);

        session()->flash('message', 'Réservation réussie !');

        // reset form
        $this->start_date = '';
        $this->end_date = '';
    }

    public function render()
    {
        return view('livewire.booking-manager');
    }
}