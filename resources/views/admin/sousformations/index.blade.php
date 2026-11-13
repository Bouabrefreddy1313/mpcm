<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Gestion des Sous-Formations</title>
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
            animation: fadeIn 1s ease-in-out;
        }
        h2 { text-align: center; margin-bottom: 30px; }
        table tbody tr:hover { transform: translateY(-2px); box-shadow: 0 4px 12px rgba(0,0,0,0.1); transition: 0.2s; }
        img { border-radius: 5px; box-shadow: 0 2px 6px rgba(0,0,0,0.2); }
        @keyframes fadeIn { 0% {opacity:0; transform:translateY(-20px);} 100% {opacity:1; transform:translateY(0);} }
    </style>
</head>
<body>
<div class="container mt-5">
    <h2>Gestion des Sous-Formations (Admin)</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('sous_formations.create') }}" class="btn btn-success mb-3">+ Ajouter une sous-formation</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Formation</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($sousFormations as $sf)
                <tr>
                    <td>{{ $sf->id }}</td>
                    <td>{{ $sf->nom }}</td>
                    <td>{{ $sf->description }}</td>
                    <td>{{ $sf->formation->nom ?? 'N/A' }}</td>
                    <td>
                        @if($sf->image)
                            <img src="{{ asset('storage/' . $sf->image) }}" width="80" alt="Image">
                        @else
                            N/A
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.sousformations.edit', $sf->id) }}" class="btn btn-warning btn-sm mb-1">Modifier</a>
                        <form action="{{ route('admin.sousformations.destroy', $sf->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Supprimer cette sous-formation ?')" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6" class="text-center">Aucune sous-formation trouvée</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
