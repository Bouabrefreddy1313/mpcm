
<div class="container mt-4">
    <h1 class="mb-4">Liste des Domaines</h1>

    @if(session('success'))
        <div style="color: green; margin-bottom: 10px;">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('domaines.create') }}" class="btn btn-primary mb-3">+ Ajouter un Domaine</a>

    <table border="1" width="100%" cellspacing="0" cellpadding="8">
        <thead>
            <tr style="background-color: #f3f3f3;">
                <th>ID</th>
                <th>Titre</th>
                <th>Date de création</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($domaines as $domaine)
                <tr>
                    <td>{{ $domaine->id }}</td>
                    <td>{{ $domaine->titre }}</td>
                    <td>{{ $domaine->created_at->format('d/m/Y') }}</td>
                    <td>
                        <a href="{{ route('domaines.show', $domaine->id) }}">Voir</a> |
                        <a href="{{ route('domaines.edit', $domaine->id) }}">Modifier</a> |
                        <form action="{{ route('domaines.destroy', $domaine->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Supprimer ce domaine ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" style="text-align: center;">Aucun domaine enregistré</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

