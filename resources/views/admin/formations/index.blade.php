<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Tableau de Bord Formations</title>

    {{-- Bootstrap CSS CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f7f8fa;
            padding: 20px;
        }

        h2 {
            color: #333;
        }

        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .btn-success {
            background-color: #ff7f50;
            border: none;
        }

        .btn-success:hover {
            background-color: #ff6347;
        }

        .btn-warning {
            background-color: #ffa500;
            border: none;
            color: #fff;
        }

        .btn-warning:hover {
            background-color: #ff8c00;
        }

        .btn-danger {
            background-color: #dc3545;
            border: none;
        }

        .btn-danger:hover {
            background-color: #b02a37;
        }

        table {
            border-collapse: separate;
            border-spacing: 0 10px;
        }

        thead th {
            border-bottom: none;
            background-color: #343a40;
            color: #fff;
            border-radius: 10px 10px 0 0;
        }

        tbody tr {
            background-color: #f1f3f6;
            border-radius: 10px;
        }

        tbody td {
            vertical-align: middle;
        }

        img {
            border-radius: 5px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.2);
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border-radius: 5px;
            padding: 10px 15px;
        }

        @media (max-width: 768px) {
            table, thead, tbody, th, td, tr {
                display: block;
            }
            thead tr {
                display: none;
            }
            tbody tr {
                margin-bottom: 15px;
                background-color: #fff;
                padding: 15px;
                border-radius: 10px;
            }
            tbody td {
                display: flex;
                justify-content: space-between;
                padding: 5px 0;
            }
            tbody td::before {
                content: attr(data-label);
                font-weight: bold;
                text-transform: uppercase;
            }
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">Tableau de Bord - Formations</h2>

    {{-- Message de succès --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Bouton Ajouter --}}
    <a href="{{ route('formations.create') }}" class="btn btn-success mb-3">
        + Ajouter une formation
    </a>

    {{-- Tableau des formations --}}
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Domaine</th>
                <th>Image</th>
                <th>Pour entreprise</th>
                <th>Date de création</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($formations as $formation)
                <tr>
                    <td data-label="ID">{{ $formation->id }}</td>
                    <td data-label="Nom">{{ $formation->nom }}</td>
                    <td data-label="Domaine">{{ $formation->domaine->titre ?? 'Aucun domaine' }}</td>
                    <td data-label="Image">
                        @if($formation->image)
                            <img src="{{ asset('storage/' . $formation->image) }}" width="80" alt="Image formation">
                        @else
                            N/A
                        @endif
                    </td>
                    <td data-label="Pour entreprise">{{ $formation->pour_entreprise }}</td>
                    <td data-label="Date">{{ $formation->created_at->format('d/m/Y') }}</td>
                    <td data-label="Actions">
                        <a href="{{ route('admin.formations.edit', $formation->id) }}" class="btn btn-warning btn-sm mb-1">
                            Modifier
                        </a>
                        <form action="{{ route('admin.formations.destroy', $formation->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Supprimer cette formation ?')" class="btn btn-danger btn-sm">
                                Supprimer
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Aucune formation trouvée</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{-- Bootstrap JS CDN --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
