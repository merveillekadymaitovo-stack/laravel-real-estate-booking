<x-app-layout>

<div class="max-w-6xl mx-auto p-6 space-y-6">

    <h1 class="text-2xl font-bold">Réservations</h1>

    <div class="space-y-4">

        @foreach ($bookings as $booking)

        @php
            $nights = \Carbon\Carbon::parse($booking->start_date)
                        ->diffInDays($booking->end_date);

            $price = $booking->property->price_per_night ?? 0;
            $total = $nights * $price;
            
            // Traduction du statut
            $statusLabel = match($booking->status) {
                'confirmed' => 'Confirmée',
                'cancelled' => 'Annulée',
                'pending' => 'En attente',
                default => ucfirst($booking->status)
            };
        @endphp

        <div class="bg-white p-4 rounded-xl shadow flex justify-between items-center">

            <!-- LEFT -->
            <div>
                <h3 class="font-bold text-lg">
                    {{ $booking->property->name ?? 'Bien' }}
                </h3>

                <p class="text-sm text-gray-500">
                     {{ $booking->user->name ?? '' }}
                    •  {{ $booking->start_date }} → {{ $booking->end_date }}
                </p>

                <p class="text-sm text-gray-400">
                     {{ $nights }} nuit(s)
                </p>
            </div>

            <!-- RIGHT -->
            <div class="text-right space-y-2">

                <!-- PRIX -->
                <p class="font-bold text-lg text-blue-600">
                    {{ $total }} €
                </p>

                <!-- STATUS (traduit) -->
                <span class="
                    px-3 py-1 text-xs rounded-full font-medium
                    @if($booking->status == 'confirmed') bg-green-100 text-green-600
                    @elseif($booking->status == 'cancelled') bg-red-100 text-red-600
                    @else bg-gray-100 text-gray-600
                    @endif
                ">
                    {{ $statusLabel }}
                </span>

                <!-- ACTIONS -->
                <div class="flex gap-2 justify-end mt-2">

                    <!-- CONFIRM -->
                    @if($booking->status !== 'confirmed')
                    <form action="/bookings/{{ $booking->id }}/confirm" method="POST">
                        @csrf
                        <button class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded text-xs">
                             Confirmer
                        </button>
                    </form>
                    @endif

                    <!-- CANCEL -->
                    @if($booking->status !== 'cancelled')
                    <form action="/bookings/{{ $booking->id }}/cancel" method="POST">
                        @csrf
                        <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs">
                             Annuler
                        </button>
                    </form>
                    @endif

                </div>

            </div>

        </div>

        @endforeach

    </div>

</div>

</x-app-layout>