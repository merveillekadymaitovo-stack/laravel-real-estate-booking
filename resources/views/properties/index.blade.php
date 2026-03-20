<!DOCTYPE html>
<html>
<head>
    <title>Properties</title>
</head>
<body>

<h1>Liste des propriétés</h1>

@foreach($properties as $property)
    <div style="border:1px solid black; margin:10px; padding:10px;">
        <h2>{{ $property->name }}</h2>
        <p>{{ $property->description }}</p>
        <p>{{ $property->price_per_night }} € / nuit</p>
        <a href="/properties/{{ $property->id }}">Voir</a>
    </div>
@endforeach

</body>
</html>