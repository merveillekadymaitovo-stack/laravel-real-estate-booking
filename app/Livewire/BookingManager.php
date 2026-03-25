<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Booking;
use App\Models\Property;

class BookingManager extends Component
{
    public $property_id;
    public $start_date;
    public $end_date;
    public $price_per_night;
    public $property;

    // 🔥 IMPORTANT
    public function mount($property_id)
    {
        $this->property_id = $property_id;
        $this->property = Property::find($property_id);
        $this->price_per_night = $this->property->price_per_night ?? 0;
    }

    // Règles de validation
    protected function rules()
    {
        return [
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
        ];
    }

    // Messages de validation personnalisés
    protected $messages = [
        'start_date.required' => 'La date de début est requise.',
        'start_date.after_or_equal' => 'La date de début doit être aujourd\'hui ou plus tard.',
        'end_date.required' => 'La date de fin est requise.',
        'end_date.after' => 'La date de fin doit être après la date de début.',
    ];

    // Validation en temps réel
    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function book()
    {
        if (!auth()->check()) {
            session()->flash('error', 'Veuillez vous connecter pour réserver.');
            return redirect('/login');
        }

        // Validation
        $this->validate();

        // 🔥 Vérification conflit
        $conflict = Booking::where('property_id', $this->property_id)
            ->where(function ($query) {
                $query->whereBetween('start_date', [$this->start_date, $this->end_date])
                      ->orWhereBetween('end_date', [$this->start_date, $this->end_date])
                      ->orWhere(function ($q) {
                          $q->where('start_date', '<=', $this->start_date)
                            ->where('end_date', '>=', $this->end_date);
                      });
            })
            ->exists();

        if ($conflict) {
            session()->flash('error', '❌ Ces dates sont déjà réservées.');
            return;
        }

        // Calcul du nombre de nuits et du total
        $nights = \Carbon\Carbon::parse($this->start_date)->diffInDays($this->end_date);
        $total_price = $nights * $this->price_per_night;

        // Création de la réservation
        Booking::create([
            'user_id' => auth()->id(),
            'property_id' => $this->property_id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'total_price' => $total_price,
            'status' => 'pending', // Statut par défaut
        ]);

        session()->flash('message', '✅ Réservation réussie ! En attente de confirmation.');

        // Réinitialisation des champs
        $this->start_date = null;
        $this->end_date = null;
    }

    public function render()
    {
        return view('livewire.booking-manager');
    }
}