<x-app-layout>

<div class="max-w-4xl mx-auto p-6">

    <h1 class="text-2xl font-bold mb-4">Ajouter une propriété</h1>

    <form action="/properties" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="text" name="name" placeholder="Nom"
               class="border p-2 w-full mb-3 rounded">

        <textarea name="description"
                  placeholder="Description"
                  class="border p-2 w-full mb-3 rounded"></textarea>

        <input type="number" name="price_per_night"
               placeholder="Prix"
               class="border p-2 w-full mb-3 rounded">

        <input type="file" name="image"
               onchange="previewImage(event)"
               class="border p-2 w-full mb-3 rounded">

        <img id="preview" class="w-40 hidden rounded">

        <button class="bg-blue-500 text-white px-4 py-2 rounded">
            Ajouter
        </button>
    </form>

</div>

<script>
function previewImage(event) {
    const img = document.getElementById('preview');
    img.src = URL.createObjectURL(event.target.files[0]);
    img.classList.remove('hidden');
}
</script>

</x-app-layout>