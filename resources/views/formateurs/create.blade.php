<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Formateur - MonProfChezMoi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-blue: #2563EB;
            --dark-blue: #1E40AF;
            --lighter-blue: #EFF6FF;
            --primary-orange: #F97316;
            --dark-orange: #EA580C;
            --lighter-orange: #FEF3C7;
            --pink-accent: #F472B6;
            --text-dark: #1F2937;
            --text-gray: #6B7280;
            --bg-light: #F9FAFB;
            --border-color: #E5E7EB;
        }

        body { background: var(--bg-light); }

        .form-header {
            background: linear-gradient(135deg, var(--primary-blue), var(--dark-blue));
            color: white;
            padding: 2.5rem 2rem;
            border-radius: 16px;
            margin-bottom: 2rem;
            text-align: center;
        }

        .form-header h1 {
            font-size: 1.8rem;
            font-weight: 700;
            margin: 0;
        }

        .form-card {
            background: white;
            border-radius: 16px;
            border: 1px solid var(--border-color);
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
            padding: 2rem;
            margin-bottom: 2rem;
        }

        .form-label {
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 0.5rem;
        }

        .form-label .required {
            color: var(--primary-orange);
        }

        .form-control, .form-select {
            border-radius: 10px;
            border: 1px solid var(--border-color);
            padding: 0.75rem 1rem;
            transition: all 0.3s;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 3px rgba(37,99,235,0.1);
        }

        textarea.form-control {
            min-height: 120px;
            resize: vertical;
        }

        .btn-submit {
            background: linear-gradient(135deg, var(--primary-orange), var(--dark-orange));
            color: white;
            border: none;
            padding: 0.9rem 2.5rem;
            border-radius: 10px;
            font-weight: 600;
            font-size: 1rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(249,115,22,0.3);
        }

        .btn-cancel {
            background: var(--border-color);
            color: var(--text-dark);
            border: none;
            padding: 0.9rem 2rem;
            border-radius: 10px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s;
        }

        .btn-cancel:hover {
            background: #d1d5db;
        }

        .photo-preview {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border: 3px dashed var(--border-color);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            background: var(--bg-light);
            cursor: pointer;
            transition: all 0.3s;
        }

        .photo-preview:hover {
            border-color: var(--primary-blue);
        }

        .photo-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .photo-preview i {
            font-size: 2.5rem;
            color: var(--text-gray);
        }

        .form-section-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--primary-blue);
            margin-bottom: 1.5rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid var(--lighter-blue);
        }

        .alert-error {
            background: #FEF2F2;
            color: #991B1B;
            border: 1px solid #FECACA;
            border-radius: 10px;
            padding: 1rem;
            margin-bottom: 1.5rem;
        }

        .alert-error ul {
            margin: 0;
            padding-left: 1.5rem;
        }

        .form-text {
            font-size: 0.85rem;
            color: var(--text-gray);
            margin-top: 0.25rem;
        }

        .cours-select {
            background-color: var(--lighter-blue);
            border: 2px solid var(--primary-blue);
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="form-header">
            <h1><i class="fas fa-user-tie"></i> Ajouter un nouveau formateur</h1>
        </div>

        @if($errors->any())
            <div class="alert-error">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('formateurs.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Sélection du cours -->
            <div class="form-card" style="border: 2px solid var(--primary-blue);">
                <h3 class="form-section-title"><i class="fas fa-link"></i> Lier à un cours</h3>
                
                <div class="mb-3">
                    <label class="form-label">Cours associé <span class="required">*</span></label>
                    <select name="cours_id" class="form-select cours-select" required>
                        <option value="">-- Sélectionnez un cours --</option>
                        @foreach($cours as $c)
                            <option value="{{ $c->id }}" {{ old('cours_id') == $c->id ? 'selected' : '' }}>
                                {{ $c->titre }}
                            </option>
                        @endforeach
                    </select>
                    <div class="form-text">Ce formateur sera affiché sur la page de ce cours</div>
                </div>
            </div>

            <!-- Identité -->
            <div class="form-card">
                <h3 class="form-section-title"><i class="fas fa-id-card"></i> Identité</h3>
                
                <div class="row">
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label class="form-label">Nom complet <span class="required">*</span></label>
                            <input type="text" name="nom" class="form-control" value="{{ old('nom') }}" placeholder="Ex: Jean-Michel P." required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Fonction actuelle <span class="required">*</span></label>
                            <input type="text" name="fonction_actuelle" class="form-control" value="{{ old('fonction_actuelle') }}" placeholder="Ex: Expert Supply Chain & Négociation commerciale" required>
                            <div class="form-text">Titre ou poste actuel du formateur</div>
                        </div>
                    </div>

                    <div class="col-md-4 text-center">
                        <label class="form-label d-block">Photo</label>
                        <div class="photo-preview mx-auto" onclick="document.getElementById('photo').click()">
                            <i class="fas fa-camera" id="photoIcon"></i>
                            <img id="photoPreview" style="display:none;">
                        </div>
                        <input type="file" name="photo" id="photo" class="d-none" accept="image/*" onchange="previewPhoto(this)">
                        <small class="text-muted d-block mt-2">Cliquez pour ajouter une photo</small>
                    </div>
                </div>
            </div>

            <!-- Expertise -->
            <div class="form-card">
                <h3 class="form-section-title"><i class="fas fa-brain"></i> Expertise & Intervention</h3>
                
                <div class="mb-3">
                    <label class="form-label">Domaines d'intervention <span class="required">*</span></label>
                    <textarea name="domaines_intervention" class="form-control" placeholder="Listez les domaines dans lesquels le formateur intervient" required>{{ old('domaines_intervention') }}</textarea>
                    <div class="form-text">Ex: Supply Chain, Négociation commerciale, Management d'équipe</div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Domaines d'expertise <span class="required">*</span></label>
                    <textarea name="domaines_expertise" class="form-control" placeholder="Détaillez les compétences et savoir-faire spécifiques du formateur" required>{{ old('domaines_expertise') }}</textarea>
                    <div class="form-text">Ex: Optimisation logistique, Techniques de négociation avancées</div>
                </div>
            </div>

            <!-- Parcours -->
            <div class="form-card">
                <h3 class="form-section-title"><i class="fas fa-road"></i> Parcours</h3>
                
                <div class="mb-3">
                    <label class="form-label">Parcours professionnel et académique <span class="required">*</span></label>
                    <textarea name="parcours_professionnel_academique" class="form-control" placeholder="Décrivez le parcours professionnel et les formations du formateur" required>{{ old('parcours_professionnel_academique') }}</textarea>
                    <div class="form-text">Formations, diplômes, expériences clés, entreprises accompagnées...</div>
                </div>
            </div>

            <!-- Pédagogie -->
            <div class="form-card">
                <h3 class="form-section-title"><i class="fas fa-chalkboard-teacher"></i> Pédagogie & Philosophie</h3>
                
                <div class="mb-3">
                    <label class="form-label">Style pédagogique <span class="required">*</span></label>
                    <textarea name="style_pedagogique" class="form-control" placeholder="Décrivez la méthode et l'approche pédagogique du formateur" required>{{ old('style_pedagogique') }}</textarea>
                    <div class="form-text">Ex: Apprentissage par la pratique, cas concrets, coaching personnalisé...</div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Votre devise ou philosophie de formation</label>
                    <textarea name="devise_philosophie" class="form-control" placeholder="Une phrase ou citation qui résume la vision du formateur">{{ old('devise_philosophie') }}</textarea>
                    <div class="form-text">Ex: "Transmettre l'expérience pour faire monter en compétences chaque collaborateur"</div>
                </div>
            </div>

            <!-- Options -->
            <div class="form-card">
                <h3 class="form-section-title"><i class="fas fa-cog"></i> Options</h3>
                
                <div class="form-check">
                    <input type="checkbox" name="actif" class="form-check-input" id="actif" checked value="1">
                    <label class="form-check-label" for="actif">
                        Formateur actif (visible sur le site)
                    </label>
                </div>
            </div>

            <!-- Boutons -->
            <div class="d-flex gap-3 justify-content-center">
                <a href="{{ route('formateurs.index') }}" class="btn-cancel">
                    <i class="fas fa-times"></i> Annuler
                </a>
                <button type="submit" class="btn-submit">
                    <i class="fas fa-save"></i> Enregistrer le formateur
                </button>
            </div>
        </form>
    </div>

    <script>
        function previewPhoto(input) {
            const preview = document.getElementById('photoPreview');
            const icon = document.getElementById('photoIcon');
            
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                    icon.style.display = 'none';
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</body>
</html>