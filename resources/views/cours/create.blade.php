<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Formation - Admin | MonProfChezMoi</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #f0f4f8 0%, #e2e8f0 100%);
            min-height: 100vh;
            padding: 2rem 1rem;
            color: #1e293b;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            animation: fadeIn 0.6s ease-out;
        }

        .page-header {
            background: linear-gradient(135deg, #1e293b 0%, #334155 100%);
            border-radius: 20px;
            padding: 2rem 2.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
        }

        .page-header h1 {
            color: white;
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .page-header p {
            color: #cbd5e1;
            font-size: 0.95rem;
        }

        .form-card {
            background: white;
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
        }

        .form-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, #3b82f6 0%, #2563eb 50%, #3b82f6 100%);
            background-size: 200% 100%;
            animation: shimmer 3s infinite;
        }

        .form-section {
            margin-bottom: 2.5rem;
        }

        .form-section-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 1.5rem;
            padding-bottom: 0.75rem;
            border-bottom: 2px solid #f1f5f9;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .form-section-title .icon {
            font-size: 1.5rem;
        }

        .form-group {
            margin-bottom: 1.75rem;
            position: relative;
        }

        .form-label {
            display: block;
            font-weight: 600;
            color: #334155;
            margin-bottom: 0.75rem;
            font-size: 0.95rem;
        }

        .form-label .required {
            color: #ef4444;
            margin-left: 0.25rem;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
        }

        .form-grid-3 {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.5rem;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        .form-input,
        .form-textarea,
        .form-select {
            width: 100%;
            padding: 1rem 1.25rem;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            font-size: 1rem;
            font-family: inherit;
            transition: all 0.3s;
            background: #f8fafc;
        }

        .form-input:focus,
        .form-textarea:focus,
        .form-select:focus {
            outline: none;
            border-color: #3b82f6;
            background: white;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
            transform: translateY(-2px);
        }

        .form-textarea {
            resize: vertical;
            min-height: 120px;
            line-height: 1.6;
        }

        .form-select {
            cursor: pointer;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg width='12' height='8' viewBox='0 0 12 8' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1 1L6 6L11 1' stroke='%2364748b' stroke-width='2' stroke-linecap='round'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            padding-right: 3rem;
        }

        .file-upload {
            position: relative;
            display: inline-block;
            width: 100%;
        }

        .file-input {
            display: none;
        }

        .file-label {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
            padding: 2rem;
            border: 2px dashed #cbd5e1;
            border-radius: 12px;
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            cursor: pointer;
            transition: all 0.3s;
        }

        .file-label:hover {
            border-color: #3b82f6;
            background: #f0f4f8;
        }

        .file-label.active {
            border-color: #10b981;
            background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
        }

        .file-icon {
            font-size: 2.5rem;
        }

        .file-info {
            text-align: center;
        }

        .file-info h4 {
            color: #1e293b;
            font-size: 1rem;
            margin-bottom: 0.25rem;
        }

        .file-info p {
            color: #64748b;
            font-size: 0.875rem;
        }

        .file-preview {
            margin-top: 1rem;
            position: relative;
        }

        .file-preview img {
            width: 100%;
            max-width: 300px;
            height: auto;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .file-preview-remove {
            position: absolute;
            top: -10px;
            right: -10px;
            width: 40px;
            height: 40px;
            background: #ef4444;
            border-radius: 50%;
            border: none;
            color: white;
            font-size: 1.25rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(239, 68, 68, 0.3);
        }

        .file-preview-remove:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 20px rgba(239, 68, 68, 0.4);
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1.5rem;
            background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
            border: 2px solid #3b82f6;
            border-radius: 12px;
            transition: all 0.3s;
        }

        .checkbox-group:hover {
            box-shadow: 0 4px 20px rgba(59, 130, 246, 0.2);
        }

        .checkbox-group.active {
            background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
            border-color: #10b981;
        }

        .checkbox-input {
            width: 24px;
            height: 24px;
            accent-color: #3b82f6;
            cursor: pointer;
            flex-shrink: 0;
        }

        .checkbox-group.active .checkbox-input {
            accent-color: #10b981;
        }

        .checkbox-label {
            flex: 1;
            cursor: pointer;
        }

        .checkbox-label-title {
            font-weight: 600;
            color: #1e293b;
            font-size: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .checkbox-label-title::before {
            content: "✓";
            font-size: 1.25rem;
            color: #3b82f6;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .checkbox-group.active .checkbox-label-title::before {
            opacity: 1;
            color: #10b981;
        }

        .checkbox-label-desc {
            font-size: 0.875rem;
            color: #475569;
            margin-top: 0.25rem;
        }

        .checkbox-icon {
            font-size: 1.75rem;
            flex-shrink: 0;
            transition: transform 0.3s;
        }

        .checkbox-group.active .checkbox-icon {
            transform: scale(1.2);
        }

        .form-actions {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 2px solid #f1f5f9;
        }

        .btn {
            padding: 1rem 2rem;
            border: none;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
        }

        .btn-submit {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
            box-shadow: 0 10px 30px rgba(16, 185, 129, 0.3);
        }

        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(16, 185, 129, 0.5);
        }

        .btn-submit::after {
            content: "✓";
            font-size: 1.5rem;
        }

        .btn-cancel {
            background: #e2e8f0;
            color: #475569;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .btn-cancel:hover {
            background: #cbd5e1;
            transform: translateY(-2px);
        }

        .btn-cancel::before {
            content: "✕";
            font-size: 1.5rem;
        }

        .char-count {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 0.5rem;
            font-size: 0.875rem;
            color: #64748b;
        }

        .char-bar {
            width: 100%;
            height: 4px;
            background: #e2e8f0;
            border-radius: 2px;
            overflow: hidden;
            margin-top: 0.5rem;
        }

        .char-fill {
            height: 100%;
            background: linear-gradient(90deg, #3b82f6 0%, #2563eb 100%);
            width: 0%;
            transition: width 0.3s;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes shimmer {
            0% { background-position: 200% 0; }
            100% { background-position: -200% 0; }
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        @media (max-width: 768px) {
            .form-grid,
            .form-grid-3 {
                grid-template-columns: 1fr;
            }

            .form-actions {
                grid-template-columns: 1fr;
            }

            .page-header {
                padding: 1.5rem;
            }

            .form-card {
                padding: 1.5rem;
            }

            .checkbox-group {
                flex-direction: column;
                text-align: center;
            }

            .checkbox-label {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="page-header">
            <h1>Ajouter une nouvelle formation</h1>
            <p>Remplissez tous les champs pour créer une nouvelle formation</p>
        </div>

        <div class="form-card">
            <form action="{{ route('cours.store') }}" method="POST" enctype="multipart/form-data" id="coursForm">
                @csrf

                <div class="form-section">
                    <div class="form-section-title">
                        <span class="icon">📚</span>
                        Informations Générales
                    </div>

                    <div class="form-grid">
                        <div class="form-group">
                            <label for="titre" class="form-label">
                                formation
                                <span class="required">*</span>
                            </label>
                            <input
                                type="text"
                                name="titre"
                                id="titre"
                                class="form-input"
                                placeholder="Ex: Développement Web Full Stack"
                                required
                                maxlength="255"
                            >
                        </div>

                        <div class="form-group">
                            <label for="duree" class="form-label">
                                Durée
                                <span class="required">*</span>
                            </label>
                            <input
                                type="text"
                                name="duree"
                                id="duree"
                                class="form-input"
                                placeholder="Ex: 40 heures"
                                required
                            >
                        </div>
                    </div>

                    <div class="form-grid">
                        <div class="form-group">
                            <label for="lieu" class="form-label">
                                Lieu
                                <span class="required">*</span>
                            </label>
                            <input
                                type="text"
                                name="lieu"
                                id="lieu"
                                class="form-input"
                                placeholder="Ex: Paris, France"
                                required
                            >
                        </div>

                        <div class="form-group">
                            <label for="tarif" class="form-label">
                                Tarif (FCFA)
                                <span class="required">*</span>
                            </label>
                            <input
                                type="text"
                                name="tarif"
                                id="tarif"
                                class="form-input"
                                placeholder="Ex: 499"
                                required
                                min="0"
                                step="0.01"
                            >
                        </div>
                    </div>

                    <div class="form-group full-width">
                        <label for="description" class="form-label">
                            Description
                            <span class="required">*</span>
                        </label>
                        <textarea
                            name="description"
                            id="description"
                            class="form-textarea"
                            placeholder="Description courte du cours..."
                            required
                            maxlength="500"
                        ></textarea>
                        <div class="char-count">
                            <span id="descCount">0</span><span>/ 500</span>
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <div class="form-section-title">
                        <span class="icon">👥</span>
                        Détails de la formation
                    </div>

                    <div class="form-grid">
                        <div class="form-group">
                            <label for="formateur" class="form-label">
                                Formateur
                                <span class="required">*</span>
                            </label>
                            <input
                                type="text"
                                name="formateur"
                                id="formateur"
                                class="form-input"
                                placeholder="Nom du formateur"
                                required
                            >
                        </div>

                        <div class="form-group">
                            <label for="public_cible" class="form-label">
                                Public Cible
                                <span class="required">*</span>
                            </label>
                            <input
                                type="text"
                                name="public_cible"
                                id="public_cible"
                                class="form-input"
                                placeholder="Ex: Développeurs intermédiaires"
                                required
                            >
                        </div>
                    </div>

                    <div class="form-group full-width">
                        <label for="objectif" class="form-label">
                            Objectif
                            <span class="required">*</span>
                        </label>
                        <textarea
                            name="objectif"
                            id="objectif"
                            class="form-textarea"
                            placeholder="Objectifs pédagogiques du cours..."
                            required
                        ></textarea>
                    </div>

                    <div class="form-group full-width">
                        <label for="prerequis" class="form-label">
                            Prérequis
                            <span class="required">*</span>
                        </label>
                        <textarea
                            name="prerequis"
                            id="prerequis"
                            class="form-textarea"
                            placeholder="Compétences et connaissances requises..."
                            required
                        ></textarea>
                    </div>

                    <div class="form-group full-width">
                        <label for="programme" class="form-label">
                            Programme
                            <span class="required">*</span>
                        </label>
                        <textarea
                            name="programme"
                            id="programme"
                            class="form-textarea"
                            placeholder="Contenu détaillé du cours..."
                            required
                        ></textarea>
                    </div>
                </div>

                <div class="form-section">
                    <div class="form-section-title">
                        <span class="icon">🎓</span>
                        Classification et Options
                    </div>

                    <div class="form-grid">
                        <div class="form-group">
                            <label for="sous_formation_id" class="form-label">
                                Sous-Formation
                                <span class="required">*</span>
                            </label>
                            <select name="sous_formation_id" id="sous_formation_id" class="form-select" required>
                                <option value="">-- Sélectionner une sous-formation --</option>
                                @foreach ($sousFormations as $sousFormation)
                                    <option value="{{ $sousFormation->id }}">{{ $sousFormation->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group full-width">
                        <label class="form-label">Éligibilité aux FDFP</label>
                        <div class="checkbox-group" id="eligibleGroup">
                            <input
                                type="checkbox"
                                name="eligible"
                                id="eligible"
                                class="checkbox-input"
                                value="1"
                            >
                            <div class="checkbox-label">
                                <div class="checkbox-label-title">🎫 Rendre ce cours éligible FDFP</div>
                                <div class="checkbox-label-desc">
                                    
                                </div>
                            </div>
                            <div class="checkbox-icon">✓</div>
                        </div>
                    </div>
                    <div class="form-group full-width">
    <label class="form-label">Certification</label>
    <div class="checkbox-group">
        <input
            type="checkbox"
            name="certifiante"
            id="certifiante"
            class="checkbox-input"
            value="1"
        >
        <div class="checkbox-label">
            <div class="checkbox-label-title">🏆 Cette formation donne droit à une certification</div>
            <div class="checkbox-label-desc">
                Le client recevra un certificat à la fin de la formation
            </div>
        </div>
        <div class="checkbox-icon">✓</div>
    </div>
</div>
                </div>

                <div class="form-section">
                    <div class="form-section-title">
                        <span class="icon">🖼️</span>
                        Image de la formation
                    </div>

                    <div class="form-group full-width">
                        <label for="image" class="form-label">Image de couverture</label>
                        <div class="file-upload">
                            <input
                                type="file"
                                name="image"
                                id="image"
                                class="file-input"
                                accept="image/*"
                            >
                            <label for="image" class="file-label" id="fileLabel">
                                <div class="file-icon">🖼️</div>
                                <div class="file-info">
                                    <h4>Cliquez pour ajouter une image</h4>
                                    <p>ou déposez votre fichier ici</p>
                                    <p style="margin-top: 0.5rem; font-size: 0.8rem; color: #94a3b8;">
                                        JPG, PNG, GIF - Max 2 MB
                                    </p>
                                </div>
                            </label>
                            <div class="file-preview" id="filePreview" style="display: none;">
                                <img id="previewImage" src="" alt="Preview">
                                <button type="button" class="file-preview-remove" onclick="removeImage()">×</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-submit" id="submitBtn">
                        Créer la formation
                    </button>
                    <a href="{{ route('cours.index') }}" class="btn btn-cancel">
                        Annuler
                    </a>
                </div>

                <div id="form-message" style="display: none; margin-top: 2rem; padding: 1rem; border-radius: 12px; text-align: center; font-weight: 600;"></div>
            </form>
        </div>
    </div>

    <script>
        const coursForm = document.getElementById('coursForm');
        const descriptionField = document.getElementById('description');
        const descCount = document.getElementById('descCount');
        const fileInput = document.getElementById('image');
        const fileLabel = document.getElementById('fileLabel');
        const filePreview = document.getElementById('filePreview');
        const previewImage = document.getElementById('previewImage');
        const eligibleCheckbox = document.getElementById('eligible');
        const eligibleGroup = document.getElementById('eligibleGroup');
        const submitBtn = document.getElementById('submitBtn');

        descriptionField.addEventListener('input', function() {
            descCount.textContent = this.value.length;
        });

        fileInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    previewImage.src = event.target.result;
                    filePreview.style.display = 'block';
                    fileLabel.style.display = 'none';
                };
                reader.readAsDataURL(file);
            }
        });

        fileLabel.addEventListener('dragover', function(e) {
            e.preventDefault();
            fileLabel.style.borderColor = '#3b82f6';
            fileLabel.style.background = '#f0f4f8';
        });

        fileLabel.addEventListener('dragleave', function(e) {
            e.preventDefault();
            fileLabel.style.borderColor = '#cbd5e1';
            fileLabel.style.background = 'linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%)';
        });

        fileLabel.addEventListener('drop', function(e) {
            e.preventDefault();
            const files = e.dataTransfer.files;
            fileInput.files = files;
            const event = new Event('change', { bubbles: true });
            fileInput.dispatchEvent(event);
        });

        function removeImage() {
            fileInput.value = '';
            filePreview.style.display = 'none';
            fileLabel.style.display = 'flex';
        }

        eligibleCheckbox.addEventListener('change', function() {
            if (this.checked) {
                eligibleGroup.classList.add('active');
            } else {
                eligibleGroup.classList.remove('active');
            }
        });

        coursForm.addEventListener('submit', function(e) {
            submitBtn.innerHTML = '<span style="display: inline-block; width: 20px; height: 20px; border: 3px solid rgba(255,255,255,0.3); border-radius: 50%; border-top-color: white; animation: spin 0.8s linear infinite;"></span> Création en cours...';
            submitBtn.disabled = true;
        });

        const allInputs = document.querySelectorAll('.form-input, .form-textarea, .form-select');
        allInputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'translateY(-2px)';
                this.parentElement.style.transition = 'transform 0.3s';
            });

            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'translateY(0)';
            });
        });

        const savedData = {
            titre: localStorage.getItem('cours_titre'),
            description: localStorage.getItem('cours_description'),
            lieu: localStorage.getItem('cours_lieu'),
            public_cible: localStorage.getItem('cours_public_cible'),
            formateur: localStorage.getItem('cours_formateur'),
            prerequis: localStorage.getItem('cours_prerequis'),
            programme: localStorage.getItem('cours_programme'),
            duree: localStorage.getItem('cours_duree'),
            tarif: localStorage.getItem('cours_tarif'),
            objectif: localStorage.getItem('cours_objectif'),
        };

        Object.keys(savedData).forEach(key => {
            const input = document.getElementById(key);
            if (savedData[key] && input) {
                input.value = savedData[key];
                if (input.id === 'description') {
                    descCount.textContent = input.value.length;
                }
            }
        });

        allInputs.forEach(input => {
            input.addEventListener('input', function() {
                localStorage.setItem(`cours_${this.id}`, this.value);
            });
        });

        coursForm.addEventListener('submit', function() {
            Object.keys(savedData).forEach(key => {
                localStorage.removeItem(`cours_${key}`);
            });
        });

        console.log('%c📚 Ajout Cours - MonProfChezMoi', 'font-size: 20px; color: #3b82f6; font-weight: bold;');
        console.log('%cFormulaire chargé avec succès!', 'font-size: 14px; color: #10b981;');
    </script>
</body>
</html>
