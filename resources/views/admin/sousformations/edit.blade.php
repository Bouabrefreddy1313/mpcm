<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Sous-Formation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f7f7f7;
            padding: 20px;
        }
        .container {
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 6px 18px rgba(0,0,0,0.1);
            max-width: 700px;
            margin: auto;
            animation: fadeIn 1s ease-in-out;
        }
        h2 { text-align: center; margin-bottom: 30px; }
        .btn-primary:hover { transform: scale(1.05); transition: 0.2s; }
        @keyframes fadeIn { 0% {opacity:0; transform:translateY(-20px);} 100% {opacity:1; transform:translateY(0);} }
        img { margin-top: 10px; border-radius: 5px; box-shadow: 0 2px 6px rgba(0,0,0,0.2); }
    </style>
</head>
<body>
<div class="container">
    <h2>Modifier Sous-Formation</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.sousformations.update', $sousFormation->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nom" class="form-label">Nom :</label>
            <input type="text" name="nom" id="nom" class="form-control" value="{{ old('nom', $sousFormation->nom) }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description :</label>
            <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description', $sousFormation->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="formation_id" class="form-label">Formation :</label>
            <select name="formation_id" id="formation_id" class="form-control" required>
                <option value="">-- Sélectionnez une formation --</option>
                @foreach($formations as $formation)
                    <option value="{{ $formation->id }}" {{ $sousFormation->formation_id == $formation->id ? 'selected' : '' }}>
                        {{ $formation->nom }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image :</label>
            <input type="file" name="image" id="image" class="form-control">
            @if($sousFormation->image)
                <img src="{{ asset('storage/' . $sousFormation->image) }}" width="120" alt="Image actuelle">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="{{ route('admin.sousformations.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
