
<h1>Créer un Bon de Formation</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.bons.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="titre">Titre :</label>
        <input type="text" name="titre" id="titre" required>
    </div>
    <div class="form-group">
        <label for="description">Description :</label>
        <textarea name="description" id="description" required></textarea>
    </div>
    <div class="form-group">
        <label for="montant">Montant :</label>
        <input type="text" name="montant" id="montant" required>
    </div>
    <button type="submit">Créer le Bon</button>
</form>
