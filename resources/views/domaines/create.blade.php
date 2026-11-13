
<div class="container mt-4">
    <h1>Créer un Domaine</h1>

    <form action="{{ route('domaines.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="titre">Titre :</label>
            <input type="text" name="titre" id="titre" required>
            @error('titre')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-success mt-2">Créer</button>
        <a href="{{ route('domaines.index') }}" class="btn btn-secondary mt-2">Annuler</a>
    </form>
</div>

