<!DOCTYPE html>
<html>
<head>
    <title>Détail</title>
    @livewireStyles
</head>
<body>

<h1>{{ $property->name }}</h1>

<p>{{ $property->description }}</p>
<p>{{ $property->price_per_night }} € / nuit</p>

<a href="/properties">Retour</a>

<hr>

<!--  COMPOSANT LIVEWIRE -->
@livewire('booking-manager', ['property_id' => $property->id])

@livewireScripts
</body>
</html>