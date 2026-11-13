
<div class="container">
    <h1>Liste des Thématiques</h1>

    @if(session('success'))
        <div style="color: green; margin-bottom: 20px;">
            {{ session('success') }}
        </div>
    @endif

    <div style="margin-bottom: 20px;">
        <a href="{{ route('formations.create') }}" 
           style="background-color: #ff7f00; color: white; padding: 10px 15px; border-radius: 5px; text-decoration: none;">
            ➕ Ajouter une Thématique
        </a>
    </div>

    <table border="1" width="100%" cellpadding="10" cellspacing="0">
        <thead style="background-color: #f2f2f2;">
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Domaine</th>
                <th>Pour entreprise</th>
                <th>Image</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($formations as $formation)
                <tr>
                    <td>{{ $formation->id }}</td>
                    <td>{{ $formation->nom }}</td>
                    <td>{{ $formation->domaine->titre ?? 'Non défini' }}</td>
                    <td>{{ $formation->pour_entreprise }}</td>
                    <td>
                        @if($formation->image)
                            <img src="{{ asset('storage/' . $formation->image) }}" alt="{{ $formation->nom }}" width="80">
                        @else
                            -
                        @endif
                    </td>
                    <td>{{ Str::limit($formation->description, 50) }}</td>
                    <td>
                        <a href="{{ route('formations.edit', $formation->id) }}" 
                           style="background-color: #007bff; color: white; padding: 5px 10px; border-radius: 5px; text-decoration: none;">Modifier</a>

                        <form action="{{ route('formations.destroy', $formation->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    style="background-color: #dc3545; color: white; padding: 5px 10px; border-radius: 5px; border:none;"
                                    onclick="return confirm('Voulez-vous vraiment supprimer cette formation ?');">
                                Supprimer
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" style="text-align:center;">Aucune Thématique disponible</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

