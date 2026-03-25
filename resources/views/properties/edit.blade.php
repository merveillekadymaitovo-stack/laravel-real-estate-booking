<x-app-layout>

<div class="max-w-4xl mx-auto p-6">

    <h1 class="text-2xl font-bold mb-4">Modifier propriété</h1>

    <form action="/properties/{{ $property->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <input type="text" name="name"
               value="{{ $property->name }}"
               class="border p-2 w-full mb-3 rounded">

        <textarea name="description"
                  class="border p-2 w-full mb-3 rounded">{{ $property->description }}</textarea>

        <input type="number" name="price_per_night"
               value="{{ $property->price_per_night }}"
               class="border p-2 w-full mb-3 rounded">

        <input type="file" name="image"
               class="border p-2 w-full mb-3 rounded">

        <img src="{{ asset('storage/' . $property->image) }}"
             class="w-40 mb-3 rounded">

        <button class="bg-green-500 text-white px-4 py-2 rounded">
            Mettre à jour
        </button>

    </form>

</div>

</x-app-layout>