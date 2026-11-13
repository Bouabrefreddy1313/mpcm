<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Sous-thématique</title>
</head>
<body>
    <h1>Liste des Sous-thématique</h1>
    <a href="{{ route('sous_formations.create') }}">Créer une Sous-thématique</a>
    
    <ul>
        @foreach ($sousFormations as $sousFormation)
            <li>{{ $sousFormation->nom }} - {{ $sousFormation->description }}</li>
        @endforeach
    </ul>
</body>
</html>