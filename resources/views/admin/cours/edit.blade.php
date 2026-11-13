
<div class="container mt-5">
    <h2>Modifier Cours</h2>

    <form action="{{ route('admin.cours.update', $cours->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Titre :</label>
            <input type="text" name="titre" class="form-control" value="{{ $cours->titre }}" required>
        </div>

        <div class="mb-3">
            <label>Description :</label>
            <textarea name="description" class="form-control" required>{{ $cours->description }}</textarea>
        </div>

        <div class="mb-3">
            <label>Vidéo :</label>
            <input type="file" name="video" class="form-control">
            @if($cours->video)
                <video width="200" controls class="mt-2">
                    <source src="{{ asset('storage/' . $cours->video) }}" type="video/mp4">
                </video>
            @endif
        </div>

        <div class="mb-3">
            <label>Sous-Formation :</label>
            <select name="sous_formation_id" class="form-control" required>
                @foreach($sousFormations as $sf)
                    <option value="{{ $sf->id }}" {{ $cours->sous_formation_id == $sf->id ? 'selected' : '' }}>
                        {{ $sf->nom }} ({{ $sf->formation->nom ?? 'N/A' }})
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="{{ route('admin.cours.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>

