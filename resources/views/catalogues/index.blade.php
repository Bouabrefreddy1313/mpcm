
<div class="container mt-4">
    <h1>Liste des catalogues</h1>

    @if(session('success'))
        <div style="color: green; margin-bottom: 15px;">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('catalogues.create') }}" class="btn btn-primary mb-3">+ Ajouter un catalogue</a>

    <table border="1" width="100%" cellspacing="0" cellpadding="8">
        <thead style="background-color: #f3f3f3;">
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Domaine</th>
                <th>Fichier PDF</th>
                <th>Date de création</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($catalogues as $catalogue)
                <tr>
                    <td>{{ $catalogue->id }}</td>
                    <td>{{ $catalogue->titre }}</td>
                    <td>{{ $catalogue->domaine->titre ?? 'N/A' }}</td>
                    <td>
                        @if($catalogue->fichier)
                            <a href="{{ asset('storage/' . $catalogue->fichier) }}" target="_blank">Télécharger PDF</a>
                        @else
                            Aucun fichier
                        @endif
                    </td>
                    <td>{{ $catalogue->created_at->format('d/m/Y') }}</td>
                    <td>
                        <a href="{{ route('catalogues.edit', $catalogue->id) }}">Modifier</a> |
                        <form action="{{ route('catalogues.destroy', $catalogue->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Supprimer ce catalogue ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center;">Aucun catalogue trouvé</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
