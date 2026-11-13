<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une Thématique</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            color: #343a40;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .form-container {
            max-width: 600px;
            margin: auto;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
            opacity: 0;
            animation: slideIn 0.5s forwards;
        }

        @keyframes slideIn {
            from { transform: translateY(-20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        textarea,
        input[type="file"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        input[type="text"]:focus,
        textarea:focus,
        input[type="file"]:focus,
        select:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s, transform 0.3s;
        }

        button:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }

        .error-message {
            color: red;
            margin-top: 10px;
            animation: fadeIn 0.5s ease-in;
        }

        .success-message {
            color: green;
            margin-top: 10px;
            animation: fadeIn 0.5s ease-in;
        }
    </style>
</head>
<body>
   <h1>Créer une Thématique</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-container">
    <!-- 🔹 Bouton pour voir la liste des formations -->
    <div style="margin-bottom: 20px;">
        <a href="{{ route('admin.formations.index') }}" 
           class="btn btn-secondary" 
           style="background-color: #ff7f00; color: white; padding: 10px 15px; border-radius: 5px; text-decoration: none;">
            Voir la liste des formations
        </a>
    </div>

    <form action="{{ route('formations.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nom">Thématique :</label>
            <input type="text" name="nom" id="nom" required>
        </div>

        <div class="form-group">
            <label for="description">Description :</label>
            <textarea name="description" id="description" required></textarea>
        </div>

        <div class="form-group">
            <label for="image">Image :</label>
            <input type="file" name="image" id="image">
        </div>

        <div class="form-group">
            <label for="pour_entreprise">Pour entreprise :</label>
            <input type="text" name="pour_entreprise" id="pour_entreprise" required>
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

        <button type="submit" 
                style="background-color: #28a745; color: white; padding: 10px 15px; border: none; border-radius: 5px;">
            Créer
        </button>

        <div id="form-message" class="success-message" style="display: none;"></div>
    </form>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    document.querySelector('form').addEventListener('submit', function() {
        const formMessage = document.getElementById('form-message');
        formMessage.textContent = "Envoi en cours...";
        formMessage.style.display = 'block';
    });
</script>

</body>
</html>