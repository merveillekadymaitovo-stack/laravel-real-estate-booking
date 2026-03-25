<x-app-layout>

<div class="max-w-6xl mx-auto p-6 space-y-6">

    <!-- HEADER -->
    <div class="flex items-center gap-3">
        <div>
            <h1 class="text-2xl font-bold">
                Bonjour, {{ auth()->user()->name }} 
            </h1>
            <p class="text-gray-400 text-sm">
                Voici un aperçu de votre activité immobilière
            </p>
        </div>
    </div>

    <!-- STATS -->
    <div class="grid md:grid-cols-4 gap-4">

        <!-- PROPRIETES -->
        <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100 flex items-center gap-4">
            <div class="bg-blue-400 p-3 rounded-xl text-blue-600 text-xl"></div>
            <div>
                <p class="text-3xl font-bold">{{ \App\Models\Property::count() }}</p>
                <p class="text-gray-400 text-sm">Propriétés</p>
                <p class="text-gray-300 text-xs">biens actifs</p>
            </div>
        </div>

        <!-- RESERVATIONS -->
        <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100 flex items-center gap-4">
            <div class="bg-purple-400 p-3 rounded-xl text-purple-600 text-xl"></div>
            <div>
                <p class="text-3xl font-bold">{{ \App\Models\Booking::count() }}</p>
                <p class="text-gray-400 text-sm">Réservations</p>
                <p class="text-gray-300 text-xs">au total</p>
            </div>
        </div>

        <!-- CONFIRMEES -->
        <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100 flex items-center gap-4">
            <div class="bg-green-400 p-3 rounded-xl text-green-600 text-xl"></div>
            <div>
                <p class="text-3xl font-bold">{{ \App\Models\Booking::where('status', 'confirmed')->count() }}</p>
                <p class="text-gray-400 text-sm">Confirmées</p>
                <p class="text-gray-300 text-xs">réservations</p>
            </div>
        </div>

        <!-- REVENUS -->
        <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100 flex items-center gap-4">
            <div class="bg-yellow-400 p-3 rounded-xl text-yellow-600 text-xl"></div>
            <div>
                <p class="text-3xl font-bold text-gray-800">
                    {{ number_format(\App\Models\Booking::where('status', 'confirmed')->sum('total_price'), 0, ',', ' ') }} €
                </p>
                <p class="text-gray-400 text-sm">Revenus</p>
                <p class="text-gray-300 text-xs">confirmés</p>
            </div>
        </div>

    </div>

    <!-- CONTENU -->
    <div class="grid md:grid-cols-3 gap-6">

        <!-- RESERVATIONS RECENTES -->
        <div class="md:col-span-2 bg-white rounded-2xl shadow-sm border border-gray-100">

            <div class="p-5 border-b border-gray-100 flex justify-between items-center">
                <h2 class="font-bold text-gray-800">Réservations récentes</h2>
                <a href="/my-bookings" class="text-blue-500 text-sm hover:underline">Voir tout</a>
            </div>

            <div class="divide-y divide-gray-50">

                @foreach (\App\Models\Booking::with(['property', 'user'])->latest()->take(5)->get() as $booking)

                <div class="px-5 py-4 flex justify-between items-center hover:bg-gray-50 transition">

                    <div>
                        <p class="font-semibold text-gray-800">
                            {{ $booking->property->name ?? 'Bien' }}
                        </p>
                        <p class="text-sm text-gray-400 mt-0.5">
                            {{ $booking->user->name ?? '' }}
                            • {{ \Carbon\Carbon::parse($booking->start_date)->format('d M') }}
                            → {{ \Carbon\Carbon::parse($booking->end_date)->format('d M Y') }}
                        </p>
                    </div>

                    <div class="text-right flex flex-col items-end gap-1">
                        <p class="font-bold text-gray-800">
                            {{ number_format($booking->total_price ?? 0, 0, ',', ' ') }} €
                        </p>

                        @if($booking->status == 'confirmed')
                            <span class="text-xs px-3 py-1 rounded-full bg-green-100 text-green-600 font-medium">
                                Confirmée
                            </span>
                        @elseif($booking->status == 'cancelled')
                            <span class="text-xs px-3 py-1 rounded-full bg-red-100 text-red-500 font-medium">
                                Annulée
                            </span>
                        @else
                            <span class="text-xs px-3 py-1 rounded-full bg-orange-100 text-orange-500 font-medium">
                                En attente
                            </span>
                        @endif
                    </div>

                </div>

                @endforeach

            </div>

        </div>

        <!-- PANNEAU DROIT -->
        <div class="space-y-4">

            <!-- ATTENTE -->
            <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100">
                <div class="flex items-center gap-2 mb-2">
                    <span class="text-orange-400"></span>
                    <h3 class="font-semibold text-gray-800">En attente</h3>
                </div>

                @php $pending = \App\Models\Booking::where('status', 'pending')->count(); @endphp

                <p class="text-sm text-gray-400 mb-4">
                    @if($pending > 0)
                        {{ $pending }} réservation(s) à traiter
                    @else
                        Aucune réservation en attente
                    @endif
                </p>

                <a href="/my-bookings"
                   class="block text-center border border-yellow-300 text-yellow-600 py-2 rounded-xl text-sm hover:bg-yellow-50 transition">
                    Gérer les réservations
                </a>
            </div>

            <!-- AJOUTER BIEN -->
            <div class="bg-gradient-to-br from-blue-600 to-green-600 text-white p-5 rounded-2xl shadow">
                <h3 class="font-bold text-lg">Ajouter un bien</h3>
                <p class="text-sm mt-1 text-blue-100">
                    Mettez votre propriété en ligne dès maintenant
                </p>
                <a href="/properties/create"
                   class="mt-4 block bg-white text-blue-600 font-semibold text-center py-2.5 rounded-xl hover:bg-blue-50 transition">
                    + Nouvelle propriété
                </a>
            </div>

        </div>

    </div>

</div>

</x-app-layout>