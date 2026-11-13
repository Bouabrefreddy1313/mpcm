
<div class="container">
    <h1>Modifier la Formation</h1>

    <form action="{{ route('formations.update', $formation->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label>Nom :</label>
        <input type="text" name="nom" value="{{ $formation->nom }}" required><br><br>

        <label>Description :</label>
        <textarea name="description" required>{{ $formation->description }}</textarea><br><br>

        <label>Pour entreprise :</label>
        <input type="text" name="pour_entreprise" value="{{ $formation->pour_entreprise }}" required><br><br>

        <label>Domaine :</label>
        <select name="domaine_id" required>
            @foreach($domaines as $domaine)
                <option value="{{ $domaine->id }}" {{ $formation->domaine_id == $domaine->id ? 'selected' : '' }}>
                    {{ $domaine->titre }}
                </option>
            @endforeach
        </select><br><br>

        <label>Image :</label>
        @if($formation->image)
            <img src="{{ asset('storage/' . $formation->image) }}" width="80"><br>
        @endif
        <input type="file" name="image"><br><br>

        <button type="submit" style="background-color: #28a745; color: white; padding: 10px 15px; border-radius: 5px;">
            Mettre à jour
        </button>
    </form>
</div>

