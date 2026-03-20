<!DOCTYPE html>
<html>
<head>
    <title>Détail</title>
</head>
<body>

<h1>{{ $property->name }}</h1>

<p>{{ $property->description }}</p>
<p>{{ $property->price_per_night }} € / nuit</p>

<a href="/properties">Retour</a>

</body>
</html>