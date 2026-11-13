
<div class="container mt-4">
    <h1>Créer un catalogue</h1>

    <form action="{{ route('catalogues.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="titre">Titre :</label>
            <input type="text" name="titre" id="titre" required>
        </div>

        <div class="form-group">
            <label for="domaine_id">Domaine :</label>
            <select name="domaine_id" id="domaine_id" required>
                <option value="">-- Sélectionnez un domaine --</option>
                @foreach($domaines as $domaine)
                    <option value="{{ $domaine->id }}">{{ $domaine->titre }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="fichier">Fichier PDF :</label>
            <input type="file" name="fichier" id="fichier" accept=".pdf" required>
        </div>

        <button type="submit" class="btn btn-success mt-2">Créer</button>
    </form>
</div>

