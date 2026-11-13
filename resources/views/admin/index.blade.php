
<h1>Commandes</h1>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Titre du Bon</th>
            <th>Montant</th>
            <th>Téléphone</th>
            <th>Email</th>
            <th>Statut</th>
            <th>Date de Création</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($commandes as $commande)
        <tr>
            <td>{{ $commande->id }}</td>
            <td>{{ $commande->bon->titre }}</td>
            <td>{{ $commande->montant }}</td>
            <td>{{ $commande->telephone }}</td>
            <td>{{ $commande->email }}</td>
            <td>{{ $commande->statut }}</td>
            <td>{{ $commande->created_at }}</td>
            <td>
                @if ($commande->statut == 'en attente')
                <form action="{{ route('admin.commandes.validate', $commande) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit">Valider</button>
                </form>
                <form action="{{ route('admin.commandes.reject', $commande) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit">Rejeter</button>
                </form>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
