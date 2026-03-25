<x-app-layout>

<div class="max-w-6xl mx-auto p-6">

    <!-- HEADER -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold">Propriétés</h1>
            <p class="text-gray-500 text-sm">
                {{ $properties->count() }} biens disponibles
            </p>
        </div>

        <a href="/properties/create"
           class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
            + Ajouter un bien
        </a>
    </div>

    <!-- GRID -->
    <div class="grid md:grid-cols-3 gap-6">

        @foreach ($properties as $property)

        <div class="bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden">

            <!-- IMAGE -->
            <div class="relative">

                @php
                $defaultImages = [
                    'https://images.unsplash.com/photo-1568605114967-8130f3a36994?w=600&q=80',
                    'https://images.unsplash.com/photo-1570129477492-45c003edd2be?w=600&q=80',
                    'https://images.unsplash.com/photo-1554995207-c18c203602cb?w=600&q=80',
                    'https://images.unsplash.com/photo-1523217582562-09d0def993a6?w=600&q=80',
                    'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?w=600&q=80',
                    'https://images.unsplash.com/photo-1449844908441-8829872d2607?w=600&q=80',
                    'https://images.unsplash.com/photo-1464082354059-27db6ce50048?w=600&q=80',
                ];
                $img = $property->image
                    ? asset('storage/' . $property->image)
                    : $defaultImages[$property->id % count($defaultImages)];
                @endphp

                <img src="{{ $img }}"
                     alt="{{ $property->name }}"
                     class="w-full h-44 object-cover">

                <!-- BADGE TYPE -->
                <span class="absolute top-2 left-2 bg-white text-xs px-2 py-1 rounded shadow">
                    {{ $property->type ?? 'Logement' }}
                </span>

                <!-- BADGE DISPONIBLE -->
                <span class="absolute top-2 right-2 bg-green-500 text-white text-xs px-2 py-1 rounded">
                    Disponible
                </span>

            </div>

            <!-- CONTENU -->
            <div class="p-4">

                <h3 class="font-bold text-lg">
                    {{ $property->name }}
                </h3>

                <p class="text-gray-500 text-sm">
                    📍 {{ $property->city ?? 'Ville inconnue' }}
                </p>

                <p class="text-gray-600 text-sm mt-1 line-clamp-2">
                    {{ $property->description }}
                </p>

                <!-- NOTE -->
                <div class="flex items-center justify-between mt-3">
                    <span class="text-yellow-500 text-sm">
                        ⭐ 4.8
                    </span>
                    <span class="text-gray-400 text-xs">
                        10 avis
                    </span>
                </div>

                <!-- PRIX + BTN -->
                <div class="flex justify-between items-center mt-4">

                    <span class="text-blue-600 font-bold">
                        {{ $property->price_per_night }} € / nuit
                    </span>

                    <a href="/properties/{{ $property->id }}"
                       class="bg-blue-600 text-white px-3 py-1 rounded-lg text-sm hover:bg-blue-700">
                        Réserver →
                    </a>

                </div>

            </div>

        </div>

        @endforeach

    </div>

</div>

</x-app-layout>