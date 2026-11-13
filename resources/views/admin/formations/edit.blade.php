
<div class="container mt-4">
    <h2>Modifier Formation</h2>

    <form action="{{ route('admin.formations.update', $formation->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label>Nom :</label>
            <input type="text" name="nom" class="form-control" value="{{ $formation->nom }}" required>
        </div>

        <div class="form-group mb-3">
            <label>Description :</label>
            <textarea name="description" class="form-control" required>{{ $formation->description }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label>Image :</label>
            <input type="file" name="image" class="form-control">
            @if($formation->image)
                <img src="{{ asset('storage/' . $formation->image) }}" width="100" class="mt-2">
            @endif
        </div>

        <div class="form-group mb-3">
            <label>Pour entreprise :</label>
            <input type="text" name="pour_entreprise" class="form-control" value="{{ $formation->pour_entreprise }}" required>
        </div>

        <div class="form-group mb-3">
            <label>Domaine :</label>
            <select name="domaine_id" class="form-control" required>
                <option value="">-- Sélectionnez un domaine --</option>
                @foreach($domaines as $domaine)
                    <option value="{{ $domaine->id }}" {{ $formation->domaine_id == $domaine->id ? 'selected' : '' }}>
                        {{ $domaine->titre }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="{{ route('admin.formations.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>

