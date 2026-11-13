<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Gestion des Cours</title>

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f7f7f7;
            padding: 20px;
        }

        h2 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }

        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 6px 18px rgba(0,0,0,0.1);
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            0% {opacity: 0; transform: translateY(-20px);}
            100% {opacity: 1; transform: translateY(0);}
        }

        .btn-success {
            background-color: #28a745;
            border: none;
            transition: transform 0.2s ease;
        }

        .btn-success:hover {
            background-color: #218838;
            transform: scale(1.05);
        }

        .btn-warning {
            background-color: #ffc107;
            color: #212529;
            border: none;
            transition: transform 0.2s ease;
        }

        .btn-warning:hover {
            transform: scale(1.05);
        }

        .btn-danger {
            background-color: #dc3545;
            border: none;
            transition: transform 0.2s ease;
        }

        .btn-danger:hover {
            transform: scale(1.05);
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border-radius: 6px;
            padding: 12px 15px;
            text-align: center;
            opacity: 0;
            animation: showAlert 1s forwards;
        }

        @keyframes showAlert {
            0% {opacity: 0; transform: translateY(-10px);}
            100% {opacity: 1; transform: translateY(0);}
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
            transition: transform 0.2s, box-shadow 0.2s;
        }

        tbody tr:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        img, video {
            border-radius: 5px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.2);
        }

        @media (max-width: 768px) {
            table, thead, tbody, th, td, tr {
                display: block;
            }
            thead tr {display: none;}
            tbody tr {
                margin-bottom: 15px;
                padding: 15px;
                background-color: #fff;
                border-radius: 10px;
            }
            tbody td {
                display: flex;
                justify-content: space-between;
                padding: 8px 0;
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
    <h2>Gestion des Cours (Admin)</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('cours.create') }}" class="btn btn-success mb-3">+ Ajouter un cours</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Description</th>
                <th>Formation</th>
                <th>Sous-Formation</th>
                <th>Vidéo</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($cours as $c)
                <tr>
                    <td data-label="ID">{{ $c->id }}</td>
                    <td data-label="Titre">{{ $c->titre }}</td>
                    <td data-label="Description">{{ $c->description }}</td>
                    <td data-label="Formation">{{ $c->sousFormation->formation->nom ?? 'N/A' }}</td>
                    <td data-label="Sous-Formation">{{ $c->sousFormation->nom ?? 'N/A' }}</td>
                    <td data-label="Vidéo">
                        @if($c->video)
                            <video width="150" controls>
                                <source src="{{ asset('storage/' . $c->video) }}" type="video/mp4">
                            </video>
                        @else
                            N/A
                        @endif
                    </td>
                    <td data-label="Actions">
                        <a href="{{ route('admin.cours.edit', $c->id) }}" class="btn btn-warning btn-sm mb-1">Modifier</a>
                        <form action="{{ route('admin.cours.destroy', $c->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Supprimer ce cours ?')" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Aucun cours trouvé</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{-- Bootstrap JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

{{-- JS Animation pour les alertes --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const alert = document.querySelector('.alert-success');
        if (alert) {
            setTimeout(() => {
                alert.style.transition = 'opacity 0.8s';
                alert.style.opacity = 0;
                setTimeout(() => alert.remove(), 800);
            }, 3000); // L'alerte disparaît après 3 secondes
        }
    });
</script>

</body>
</html>
