<x-app-layout>

    <div class="max-w-5xl mx-auto p-6">

        <h1 class="text-3xl font-bold mb-2">
            {{ $property->name }}
        </h1>

        <p class="text-gray-600 mb-2">
            {{ $property->description }}
        </p>

        <p class="text-lg font-semibold mb-4">
            {{ $property->price_per_night }} € / nuit
        </p>

        <a href="/properties" class="text-blue-500 underline mb-6 inline-block">
            ← Retour
        </a>

        
        @livewire('booking-manager', ['property_id' => $property->id])

    </div>

</x-app-layout>