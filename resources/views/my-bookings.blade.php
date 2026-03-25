<x-app-layout>

<div class="max-w-6xl mx-auto space-y-6">

    <h1 class="text-2xl font-bold">Mes réservations</h1>

    <div class="space-y-3">

        @forelse($bookings as $booking)
        <div class="bg-white p-3 rounded-lg shadow-sm hover:shadow-md transition flex justify-between items-center">

            <!-- INFOS -->
            <div class="space-y-1">

                <h2 class="font-semibold text-sm">
                    {{ $booking->property->name }}
                </h2>

                <p class="text-xs text-gray-500">
                     {{ $booking->start_date }} → {{ $booking->end_date }}
                </p>

                <p class="text-xs text-gray-400">
                    {{ \Carbon\Carbon::parse($booking->start_date)->diffInDays($booking->end_date) }} nuits
                </p>

            </div>

            <!-- PRIX -->
            <div class="text-right">

                @php
                $price = $booking->property->price_per_night *
                    \Carbon\Carbon::parse($booking->start_date)->diffInDays($booking->end_date);
                @endphp

                <p class="font-bold text-sm text-green-600">
                    {{ $price }} €
                </p>

                <span class="text-xs bg-green-100 text-green-600 px-2 py-1 rounded">
                    Confirmée
                </span>

            </div>

        </div>

        @empty
        <p class="text-gray-500 text-sm">
            Aucune réservation pour le moment.
        </p>
        @endforelse

    </div>

</div>

</x-app-layout>