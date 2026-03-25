<div class="mt-4 p-5 bg-white border rounded-xl shadow">

    <h3 class="text-lg font-bold mb-3">Réserver ce bien</h3>

    <!-- MESSAGES -->
    @if (session()->has('message'))
        <p class="text-green-600 mb-2 font-medium">
            {{ session('message') }}
        </p>
    @endif

    @if (session()->has('error'))
        <p class="text-red-600 mb-2 font-medium">
            {{ session('error') }}
        </p>
    @endif

    <!-- RÉCAPITULATIF DU SÉJOUR AVEC TOTAL DYNAMIQUE -->
    @if ($start_date && $end_date)
        @php
            $nights = \Carbon\Carbon::parse($start_date)->diffInDays($end_date);
            $total = $nights * $price_per_night;
        @endphp
        
        <div class="bg-blue-50 p-3 rounded mb-3 border border-blue-200">
            <p class="text-sm text-blue-700">
                📅 Séjour du <strong>{{ \Carbon\Carbon::parse($start_date)->format('d/m/Y') }}</strong> 
                au <strong>{{ \Carbon\Carbon::parse($end_date)->format('d/m/Y') }}</strong>
            </p>

            <p class="text-sm text-gray-700 mt-1">
                🏠 {{ $nights }} nuit(s) à {{ number_format($price_per_night, 0, ',', ' ') }} € / nuit
            </p>
            
            <p class="text-xl font-bold text-blue-600 mt-2">
                💰 Total : {{ number_format($total, 0, ',', ' ') }} €
            </p>
        </div>
    @endif

    <!-- INPUT DATE DÉBUT -->
    <div class="mb-3">
        <label class="block text-sm font-medium mb-1">Date début</label>
        <input type="date"
               wire:model.live="start_date"
               min="{{ date('Y-m-d') }}"
               class="border p-2 w-full rounded focus:ring-2 focus:ring-blue-400 @error('start_date') border-red-500 @enderror">
        @error('start_date') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
    </div>

    <!-- INPUT DATE FIN -->
    <div class="mb-4">
        <label class="block text-sm font-medium mb-1">Date fin</label>
        <input type="date"
               wire:model.live="end_date"
               min="{{ date('Y-m-d') }}"
               class="border p-2 w-full rounded focus:ring-2 focus:ring-blue-400 @error('end_date') border-red-500 @enderror">
        @error('end_date') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
    </div>

    <!-- BOUTON -->
    <button wire:click="book"
            wire:loading.attr="disabled"
            wire:loading.class="opacity-50 cursor-not-allowed"
            class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition font-medium w-full sm:w-auto">
        <span wire:loading.remove>✅ Réserver</span>
        <span wire:loading>Traitement en cours...</span>
    </button>

</div>