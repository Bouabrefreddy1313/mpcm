<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donner votre avis - MonProfChezMoi</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --primary-light: #eff6ff;
            --star-color: #f59e0b;
            --star-empty: #e5e7eb;
            --text-dark: #1f2937;
            --text-muted: #6b7280;
            --bg: #f8fafc;
            --card-bg: #ffffff;
            --border: #e2e8f0;
            --radius: 16px;
            --shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.08), 0 8px 10px -6px rgba(0, 0, 0, 0.05);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #f0f4ff 0%, #faf5ff 50%, #f0fdf4 100%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            color: var(--text-dark);
            padding: 20px 15px;
        }

        .header-brand {
            text-align: center;
            padding: 20px 0 10px;
        }

        .header-brand a {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            color: var(--primary);
            font-size: 1.4rem;
            font-weight: 800;
        }

        .header-brand i {
            font-size: 1.8rem;
            color: #f97316;
        }

        .review-wrapper {
            max-width: 680px;
            width: 100%;
            margin: 15px auto 40px;
            background: var(--card-bg);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            border: 1px solid var(--border);
            overflow: hidden;
        }

        .review-hero {
            background: linear-gradient(135deg, #2563eb, #4f46e5);
            color: white;
            padding: 35px 30px;
            text-align: center;
            position: relative;
        }

        .review-hero h1 {
            font-size: 1.75rem;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .review-hero p {
            color: rgba(255, 255, 255, 0.9);
            font-size: 0.95rem;
            max-width: 500px;
            margin: 0 auto;
            line-height: 1.5;
        }

        .review-body {
            padding: 30px;
        }

        .alert-success {
            background: #ecfdf5;
            border: 1px solid #a7f3d0;
            color: #065f46;
            padding: 16px 20px;
            border-radius: 12px;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 500;
            animation: fadeIn 0.3s ease;
        }

        .alert-success i {
            font-size: 1.5rem;
            color: #10b981;
        }

        .alert-danger {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #991b1b;
            padding: 14px 18px;
            border-radius: 12px;
            margin-bottom: 25px;
            font-size: 0.9rem;
        }

        .alert-danger ul {
            margin: 5px 0 0 20px;
        }

        /* Cours pré-sélectionné */
        .selected-course-card {
            background: var(--primary-light);
            border: 1.5px solid #bfdbfe;
            border-radius: 12px;
            padding: 16px 20px;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
        }

        .course-info {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .course-icon {
            width: 48px;
            height: 48px;
            border-radius: 10px;
            background: white;
            color: var(--primary);
            display: grid;
            place-items: center;
            font-size: 1.3rem;
            box-shadow: 0 2px 6px rgba(37, 99, 235, 0.15);
            flex-shrink: 0;
        }

        .course-title-label {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: var(--primary);
            font-weight: 700;
        }

        .course-title {
            font-size: 1.05rem;
            font-weight: 700;
            color: var(--text-dark);
        }

        .btn-change-course {
            font-size: 0.85rem;
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            padding: 6px 12px;
            border-radius: 8px;
            background: white;
            border: 1px solid #bfdbfe;
            white-space: nowrap;
            transition: all 0.2s;
        }

        .btn-change-course:hover {
            background: #dbeafe;
        }

        /* Form Controls */
        .form-group {
            margin-bottom: 24px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--text-dark);
            font-size: 0.95rem;
        }

        .form-label span.required {
            color: #ef4444;
        }

        .form-control {
            width: 100%;
            padding: 12px 16px;
            border: 1.5px solid var(--border);
            border-radius: 10px;
            font-size: 1rem;
            color: var(--text-dark);
            background: #fbfcfe;
            transition: all 0.2s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            background: white;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.12);
        }

        textarea.form-control {
            resize: vertical;
            min-height: 120px;
            line-height: 1.5;
        }

        /* Système d'étoiles interactif */
        .rating-box {
            background: #f8fafc;
            border: 1.5px solid var(--border);
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            transition: all 0.2s;
        }

        .rating-box:hover {
            border-color: #cbd5e1;
        }

        .stars-container {
            display: inline-flex;
            flex-direction: row-reverse;
            gap: 8px;
            margin: 5px 0 10px;
        }

        .stars-container input[type="radio"] {
            display: none;
        }

        .stars-container label {
            cursor: pointer;
            font-size: 2.4rem;
            color: var(--star-empty);
            transition: all 0.2s ease;
            user-select: none;
            padding: 2px 4px;
        }

        /* Hover & Checked stars */
        .stars-container label:hover,
        .stars-container label:hover ~ label,
        .stars-container input[type="radio"]:checked ~ label {
            color: var(--star-color);
            transform: scale(1.1);
        }

        .rating-hint {
            font-size: 0.95rem;
            font-weight: 600;
            color: var(--text-muted);
            min-height: 24px;
            transition: color 0.2s;
        }

        .rating-hint.active {
            color: #d97706;
        }

        /* Bouton Soumettre */
        .btn-submit {
            width: 100%;
            padding: 15px 25px;
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 1.05rem;
            font-weight: 700;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: all 0.25s ease;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.25);
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(37, 99, 235, 0.35);
        }

        .btn-submit:active {
            transform: translateY(0);
        }

        /* Partage du lien */
        .share-box {
            margin-top: 30px;
            padding: 18px 20px;
            background: #f1f5f9;
            border-radius: 12px;
            border: 1px dashed #cbd5e1;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            flex-wrap: wrap;
        }

        .share-info {
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--text-muted);
            font-size: 0.9rem;
        }

        .share-info i {
            color: var(--primary);
            font-size: 1.1rem;
        }

        .btn-copy {
            padding: 8px 16px;
            background: white;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            color: var(--text-dark);
            font-size: 0.85rem;
            font-weight: 600;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: all 0.2s;
        }

        .btn-copy:hover {
            background: #e2e8f0;
            border-color: #94a3b8;
        }

        .btn-copy.copied {
            background: #10b981;
            border-color: #10b981;
            color: white;
        }

        .footer-back {
            text-align: center;
            margin-top: 20px;
        }

        .footer-back a {
            color: var(--text-muted);
            text-decoration: none;
            font-size: 0.9rem;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: color 0.2s;
        }

        .footer-back a:hover {
            color: var(--primary);
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-8px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 600px) {
            .review-hero { padding: 25px 20px; }
            .review-body { padding: 20px; }
            .selected-course-card { flex-direction: column; align-items: flex-start; }
            .share-box { flex-direction: column; align-items: stretch; text-align: center; }
            .share-info { justify-content: center; }
            .btn-copy { justify-content: center; }
        }
    </style>
</head>
<body>

    <div class="header-brand">
        <a href="{{ route('home') }}">
            <i class="fas fa-graduation-cap"></i>
            <span>MonProfChezMoi</span>
        </a>
    </div>

    <div class="review-wrapper">
        <div class="review-hero">
            <h1><i class="fas fa-star" style="color: #fbbf24; margin-right: 6px;"></i> Donnez votre avis</h1>
            <p>Votre expérience compte énormément pour nous ! Partagez votre retour afin d'aider les futurs apprenants et d'améliorer nos formations.</p>
        </div>

        <div class="review-body">

            @if(session('success'))
                <div class="alert-success">
                    <i class="fas fa-check-circle"></i>
                    <div>
                        <strong>Avis enregistré avec succès !</strong><br>
                        {{ session('success') }}
                    </div>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert-danger">
                    <strong>Veuillez corriger les erreurs suivantes :</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('avis.store') }}" method="POST" id="reviewForm">
                @csrf

                <!-- Sélection du cours ou affichage du cours pré-rempli -->
                @if(isset($selectedCours) && $selectedCours)
                    <input type="hidden" name="cours_id" value="{{ $selectedCours->id }}" id="coursIdInput">

                    <div class="selected-course-card">
                        <div class="course-info">
                            <div class="course-icon">
                                <i class="fas fa-book-open"></i>
                            </div>
                            <div>
                                <div class="course-title-label">Cours évalué</div>
                                <div class="course-title">{{ $selectedCours->titre }}</div>
                            </div>
                        </div>
                        <a href="{{ route('avis.create') }}" class="btn-change-course">
                            <i class="fas fa-exchange-alt"></i> Autre cours
                        </a>
                    </div>
                @else
                    <div class="form-group">
                        <label for="cours_id" class="form-label">
                            Cours à évaluer <span class="required">*</span>
                        </label>
                        <select name="cours_id" id="cours_id" class="form-control" required onchange="updateShareUrl(this.value)">
                            <option value="">-- Sélectionnez votre cours --</option>
                            @foreach($cours as $c)
                                <option value="{{ $c->id }}" {{ old('cours_id') == $c->id ? 'selected' : '' }}>
                                    {{ $c->titre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                @endif

                <!-- Système d'étoiles interactif -->
                <div class="form-group">
                    <label class="form-label">
                        Votre note globale <span class="required">*</span>
                    </label>
                    <div class="rating-box">
                        <div class="stars-container" id="starsContainer">
                            <input type="radio" id="star5" name="etoiles" value="5" {{ old('etoiles') == '5' ? 'checked' : '' }} required>
                            <label for="star5" title="5 étoiles - Excellent" data-text="5 / 5 - Excellent ! ⭐⭐⭐⭐⭐">
                                <i class="fas fa-star"></i>
                            </label>

                            <input type="radio" id="star4" name="etoiles" value="4" {{ old('etoiles') == '4' ? 'checked' : '' }}>
                            <label for="star4" title="4 étoiles - Très bien" data-text="4 / 5 - Très bien ! ⭐⭐⭐⭐">
                                <i class="fas fa-star"></i>
                            </label>

                            <input type="radio" id="star3" name="etoiles" value="3" {{ old('etoiles') == '3' ? 'checked' : '' }}>
                            <label for="star3" title="3 étoiles - Bien" data-text="3 / 5 - Bien ⭐⭐⭐">
                                <i class="fas fa-star"></i>
                            </label>

                            <input type="radio" id="star2" name="etoiles" value="2" {{ old('etoiles') == '2' ? 'checked' : '' }}>
                            <label for="star2" title="2 étoiles - Moyen" data-text="2 / 5 - Passable / Moyen ⭐⭐">
                                <i class="fas fa-star"></i>
                            </label>

                            <input type="radio" id="star1" name="etoiles" value="1" {{ old('etoiles') == '1' ? 'checked' : '' }}>
                            <label for="star1" title="1 étoile - Insatisfaisant" data-text="1 / 5 - À améliorer ⭐">
                                <i class="fas fa-star"></i>
                            </label>
                        </div>
                        <div class="rating-hint" id="ratingHint">
                            Cliquez sur une étoile pour attribuer votre note
                        </div>
                    </div>
                </div>

                <!-- Nom de la personne -->
                <div class="form-group">
                    <label for="nom" class="form-label">
                        Votre nom et prénom <span class="required">*</span>
                    </label>
                    <input type="text"
                           id="nom"
                           name="nom"
                           class="form-control"
                           placeholder="Ex: Kouamé Jean, Marie Konan..."
                           value="{{ old('nom') }}"
                           required>
                </div>

                <!-- Commentaire -->
                <div class="form-group">
                    <label for="commentaire" class="form-label">
                        Votre commentaire / retour d'expérience <span class="required">*</span>
                    </label>
                    <textarea id="commentaire"
                              name="commentaire"
                              class="form-control"
                              rows="5"
                              placeholder="Qu'avez-vous particulièrement apprécié ? Comment s'est déroulée la formation avec le formateur ? Quels ont été les points forts ?"
                              required>{{ old('commentaire') }}</textarea>
                </div>

                <!-- Bouton Enregistrer -->
                <button type="submit" class="btn-submit">
                    <i class="fas fa-paper-plane"></i>
                    <span>Envoyer mon avis</span>
                </button>
            </form>

            <!-- Boîte de lien à partager avec le client -->
            @php
                $currentShareUrl = isset($selectedCours) && $selectedCours
                    ? route('cours.noter', $selectedCours->id)
                    : route('avis.create');
            @endphp
            <div class="share-box">
                <div class="share-info">
                    <i class="fas fa-link"></i>
                    <span><strong>Lien à envoyer au client :</strong> Partagez ce lien par WhatsApp, e-mail ou SMS</span>
                </div>
                <button type="button" class="btn-copy" id="btnCopyLink" data-url="{{ $currentShareUrl }}">
                    <i class="fas fa-copy"></i>
                    <span id="btnCopyText">Copier le lien</span>
                </button>
            </div>

        </div>
    </div>

    <div class="footer-back">
        @if(isset($selectedCours) && $selectedCours)
            <a href="{{ route('cours.show', $selectedCours->id) }}">
                <i class="fas fa-arrow-left"></i> Retour à la fiche du cours
            </a>
        @else
            <a href="{{ route('home') }}">
                <i class="fas fa-arrow-left"></i> Retour au site
            </a>
        @endif
    </div>

    <script>
        // Gestion des libellés d'étoiles
        const ratingHint = document.getElementById('ratingHint');
        const starLabels = document.querySelectorAll('.stars-container label');
        const starRadios = document.querySelectorAll('.stars-container input[type="radio"]');

        const hintMap = {
            '5': '5 / 5 - Excellent ! ⭐⭐⭐⭐⭐',
            '4': '4 / 5 - Très bien ! ⭐⭐⭐⭐',
            '3': '3 / 5 - Bien ⭐⭐⭐',
            '2': '2 / 5 - Passable / Moyen ⭐⭐',
            '1': '1 / 5 - À améliorer ⭐'
        };

        function updateHintFromChecked() {
            const checked = document.querySelector('.stars-container input[type="radio"]:checked');
            if (checked && hintMap[checked.value]) {
                ratingHint.textContent = hintMap[checked.value];
                ratingHint.classList.add('active');
            } else {
                ratingHint.textContent = 'Cliquez sur une étoile pour attribuer votre note';
                ratingHint.classList.remove('active');
            }
        }

        starLabels.forEach(label => {
            label.addEventListener('mouseenter', function() {
                const text = this.getAttribute('data-text');
                if (text) {
                    ratingHint.textContent = text;
                    ratingHint.classList.add('active');
                }
            });
            label.addEventListener('mouseleave', function() {
                updateHintFromChecked();
            });
        });

        starRadios.forEach(radio => {
            radio.addEventListener('change', updateHintFromChecked);
        });

        // Initialisation si déjà checked
        updateHintFromChecked();

        // Bouton Copier le lien
        const btnCopy = document.getElementById('btnCopyLink');
        const btnCopyText = document.getElementById('btnCopyText');

        btnCopy.addEventListener('click', function() {
            const urlToCopy = this.getAttribute('data-url');
            navigator.clipboard.writeText(urlToCopy).then(() => {
                btnCopy.classList.add('copied');
                btnCopyText.textContent = 'Lien copié !';
                setTimeout(() => {
                    btnCopy.classList.remove('copied');
                    btnCopyText.textContent = 'Copier le lien';
                }, 2500);
            }).catch(() => {
                // Fallback
                const temp = document.createElement('input');
                temp.value = urlToCopy;
                document.body.appendChild(temp);
                temp.select();
                document.execCommand('copy');
                document.body.removeChild(temp);
                btnCopyText.textContent = 'Lien copié !';
                setTimeout(() => {
                    btnCopyText.textContent = 'Copier le lien';
                }, 2500);
            });
        });

        function updateShareUrl(coursId) {
            if (coursId) {
                const base = "{{ url('/noter-cours') }}";
                btnCopy.setAttribute('data-url', base + '/' + coursId);
            } else {
                btnCopy.setAttribute('data-url', "{{ route('avis.create') }}");
            }
        }
    </script>
</body>
</html>
