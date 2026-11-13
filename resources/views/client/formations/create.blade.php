<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demande de formation personnalisée - MonProfChezMoi</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            min-height: 100vh;
            padding: 2rem 1rem;
            color: #1e293b;
        }

        .hero-section {
            text-align: center;
            color: white;
            margin-bottom: 3rem;
            animation: fadeInDown 0.8s ease-out;
        }

        .logo {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            border-radius: 20px;
            margin: 0 auto 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            font-weight: 700;
            box-shadow: 0 10px 40px rgba(59, 130, 246, 0.3);
            animation: pulse 2s infinite;
        }

        .hero-section h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            background: linear-gradient(135deg, #ffffff 0%, #cbd5e1 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-section p {
            font-size: 1.1rem;
            color: #94a3b8;
            max-width: 700px;
            margin: 0 auto;
            line-height: 1.6;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
        }

        .success-message {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
            padding: 1.25rem 1.5rem;
            border-radius: 16px;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            box-shadow: 0 10px 30px rgba(16, 185, 129, 0.3);
            animation: slideInLeft 0.6s ease-out;
        }

        .success-message::before {
            content: "✓";
            font-size: 1.5rem;
            font-weight: bold;
            width: 32px;
            height: 32px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .form-card {
            background: white;
            border-radius: 24px;
            padding: 3rem;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            animation: fadeInUp 0.8s ease-out;
        }

        .form-section {
            margin-bottom: 3rem;
        }

        .form-section-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 1.5rem;
            padding-bottom: 0.75rem;
            border-bottom: 3px solid #3b82f6;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .form-section-title .icon {
            width: 32px;
            height: 32px;
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }

        .form-grid-2 {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
        }

        .form-group {
            position: relative;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        label {
            display: block;
            font-weight: 500;
            color: #334155;
            margin-bottom: 0.5rem;
            font-size: 0.95rem;
            transition: color 0.3s;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"],
        textarea,
        select {
            width: 100%;
            padding: 0.875rem 1rem;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            font-size: 1rem;
            font-family: inherit;
            transition: all 0.3s;
            background: #f8fafc;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="number"]:focus,
        textarea:focus,
        select:focus {
            outline: none;
            border-color: #3b82f6;
            background: white;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
            transform: translateY(-2px);
        }

        textarea {
            resize: vertical;
            min-height: 120px;
            line-height: 1.6;
        }

        select {
            cursor: pointer;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg width='12' height='8' viewBox='0 0 12 8' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1 1L6 6L11 1' stroke='%2364748b' stroke-width='2' stroke-linecap='round'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            padding-right: 3rem;
        }

        .submit-btn {
            width: 100%;
            padding: 1.25rem 2rem;
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 10px 30px rgba(59, 130, 246, 0.3);
            margin-top: 2rem;
        }

        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(59, 130, 246, 0.4);
        }

        .submit-btn:active {
            transform: translateY(-1px);
        }

        .team-section {
            background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
            border-radius: 16px;
            padding: 2rem;
            margin-top: 3rem;
            text-align: center;
        }

        .team-section h3 {
            font-size: 1.25rem;
            color: #1e293b;
            margin-bottom: 1.5rem;
        }

        .team-images {
            display: flex;
            justify-content: center;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .team-member {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid white;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .team-member:hover {
            transform: scale(1.1) rotate(5deg);
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
        }

        .floating-shapes {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 0;
            overflow: hidden;
        }

        .shape {
            position: absolute;
            opacity: 0.1;
            animation: float 20s infinite ease-in-out;
        }

        .shape:nth-child(1) {
            width: 80px;
            height: 80px;
            background: #3b82f6;
            border-radius: 50%;
            top: 10%;
            left: 10%;
            animation-delay: 0s;
        }

        .shape:nth-child(2) {
            width: 60px;
            height: 60px;
            background: #2563eb;
            border-radius: 50%;
            top: 60%;
            right: 15%;
            animation-delay: 5s;
        }

        .shape:nth-child(3) {
            width: 100px;
            height: 100px;
            background: #1d4ed8;
            border-radius: 30%;
            bottom: 15%;
            left: 20%;
            animation-delay: 10s;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0) rotate(0deg);
            }
            50% {
                transform: translateY(-30px) rotate(180deg);
            }
        }

        .container {
            position: relative;
            z-index: 1;
        }

        @media (max-width: 768px) {
            .form-grid-2 {
                grid-template-columns: 1fr;
            }

            .hero-section h1 {
                font-size: 2rem;
            }

            .form-card {
                padding: 2rem 1.5rem;
            }

            body {
                padding: 1rem;
            }
        }

        .input-icon {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            pointer-events: none;
        }

        .form-group:focus-within .input-icon {
            color: #3b82f6;
        }

        .required-star {
            color: #ef4444;
            margin-left: 0.25rem;
        }
    </style>
</head>
<body>
    <div class="floating-shapes">
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <div class="container">
        <div class="hero-section">
            <div class="hero-logo">
    <img src="{{ asset('img/logo.png') }}" 
         alt="MonProfChezMoi" 
         class="logo-img" 
         style="width: 100px; height: auto;">
</div>
            <h1>MonProfChezMoi</h1>
            <p>Votre formation sur mesure, adaptée à vos besoins spécifiques. Notre équipe d'experts vous accompagne dans la création d'un programme de formation unique pour développer les compétences de vos équipes.</p>
        </div>

        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        <div class="form-card">
            <form action="{{ route('client.formation.store') }}" method="POST" id="customForm">
                @csrf

                <div class="form-section">
                    <div class="form-section-title">
                        <span class="icon">📚</span>
                        Votre projet de formation
                    </div>
                    <div class="form-grid">
                        <div class="form-group full-width">
                            <label for="titre">Titre de la formation<span class="required-star">*</span></label>
                            <input type="text" id="titre" name="titre" placeholder="Ex: Formation en gestion de projet agile" required>
                        </div>

                        <div class="form-group full-width">
                            <label for="besoins">Décrivez vos besoins et objectifs<span class="required-star">*</span></label>
                            <textarea id="besoins" name="besoins" placeholder="Décrivez en détail vos besoins, les compétences à développer, le contexte et vos objectifs..." required></textarea>
                        </div>

                        <div class="form-grid-2">
                            <div class="form-group">
                                <label for="periode">Période de déploiement souhaitée<span class="required-star">*</span></label>
                                <input type="text" id="periode" name="periode" placeholder="Ex: Janvier 2026" required>
                            </div>

                            <div class="form-group">
                                <label for="nombre_personnes">Nombre de participants<span class="required-star">*</span></label>
                                <input type="number" id="nombre_personnes" name="nombre_personnes" placeholder="Ex: 15" min="1" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <div class="form-section-title">
                        <span class="icon">👤</span>
                        Vos coordonnées
                    </div>
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="civilite">Civilité<span class="required-star">*</span></label>
                            <select id="civilite" name="civilite" required>
                                <option value="">-- Sélectionner --</option>
                                <option value="Monsieur">Monsieur</option>
                                <option value="Madame">Madame</option>
                                <option value="Autre">Autre</option>
                            </select>
                        </div>

                        <div class="form-grid-2">
                            <div class="form-group">
                                <label for="nom">Nom<span class="required-star">*</span></label>
                                <input type="text" id="nom" name="nom" placeholder="Votre nom" required>
                            </div>

                            <div class="form-group">
                                <label for="prenom">Prénom<span class="required-star">*</span></label>
                                <input type="text" id="prenom" name="prenom" placeholder="Votre prénom" required>
                            </div>
                        </div>

                        <div class="form-grid-2">
                            <div class="form-group">
                                <label for="email">Adresse e-mail<span class="required-star">*</span></label>
                                <input type="email" id="email" name="email" placeholder="votre.email@exemple.com" required>
                            </div>

                            <div class="form-group">
                                <label for="telephone">Numéro de téléphone<span class="required-star">*</span></label>
                                <input type="text" id="telephone" name="telephone" placeholder="+225 6 12 34 56 78" required>
                            </div>
                        </div>

                        <div class="form-group full-width">
                            <label for="entreprise">Nom de l'entreprise</label>
                            <input type="text" id="entreprise" name="entreprise" placeholder="Votre entreprise">
                        </div>
                    </div>
                </div>

                <button type="submit" class="submit-btn">
                    Envoyer ma demande de formation personnalisée
                </button>
            </form>

            
        </div>
    </div>

    <script>
        // Animation des champs au focus
        const formInputs = document.querySelectorAll('input, textarea, select');

        formInputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'translateY(-2px)';
                this.parentElement.style.transition = 'transform 0.3s';
            });

            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'translateY(0)';
            });
        });

        // Validation en temps réel
        const form = document.getElementById('customForm');
        const emailInput = document.getElementById('email');
        const phoneInput = document.getElementById('telephone');

        emailInput.addEventListener('input', function() {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (this.value && !emailRegex.test(this.value)) {
                this.style.borderColor = '#ef4444';
            } else {
                this.style.borderColor = '#3b82f6';
            }
        });

        phoneInput.addEventListener('input', function() {
            // Format automatique du numéro de téléphone
            let value = this.value.replace(/\s/g, '');
            if (value.length > 0) {
                this.style.borderColor = '#3b82f6';
            }
        });

        // Animation du bouton submit
        const submitBtn = document.querySelector('.submit-btn');

        form.addEventListener('submit', function(e) {
            submitBtn.innerHTML = '<span style="display: inline-block; animation: spin 1s linear infinite;">⏳</span> Envoi en cours...';
            submitBtn.style.background = 'linear-gradient(135deg, #10b981 0%, #059669 100%)';
        });

        // Animation des sections au scroll
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, {
            threshold: 0.1
        });

        document.querySelectorAll('.form-section').forEach(section => {
            section.style.opacity = '0';
            section.style.transform = 'translateY(20px)';
            section.style.transition = 'all 0.6s ease-out';
            observer.observe(section);
        });

        // Effet de particules sur le logo
        const logo = document.querySelector('.logo');
        logo.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.1) rotate(5deg)';
        });

        logo.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1) rotate(0deg)';
        });

        // Animation des images de l'équipe
        const teamMembers = document.querySelectorAll('.team-member');
        teamMembers.forEach((member, index) => {
            member.style.animation = `fadeInUp 0.6s ease-out ${index * 0.1}s both`;
        });

        // Effet de typing pour le placeholder
        function typeEffect(element, text, speed = 50) {
            let i = 0;
            const originalPlaceholder = element.placeholder;
            element.placeholder = '';

            element.addEventListener('focus', function handler() {
                const interval = setInterval(() => {
                    if (i < text.length) {
                        element.placeholder += text.charAt(i);
                        i++;
                    } else {
                        clearInterval(interval);
                    }
                }, speed);
                element.removeEventListener('focus', handler);
            }, { once: true });
        }

        // Validation visuelle des champs requis
        const requiredInputs = document.querySelectorAll('[required]');
        requiredInputs.forEach(input => {
            input.addEventListener('blur', function() {
                if (!this.value) {
                    this.style.borderColor = '#fbbf24';
                    this.style.background = '#fffbeb';
                } else {
                    this.style.borderColor = '#10b981';
                    this.style.background = '#f0fdf4';

                    setTimeout(() => {
                        this.style.background = 'white';
                    }, 1000);
                }
            });

            input.addEventListener('input', function() {
                if (this.value) {
                    this.style.borderColor = '#3b82f6';
                    this.style.background = 'white';
                }
            });
        });

        // Compte de caractères pour le textarea
        const besoinsTextarea = document.getElementById('besoins');
        const charCountDiv = document.createElement('div');
        charCountDiv.style.cssText = 'text-align: right; color: #64748b; font-size: 0.875rem; margin-top: 0.5rem;';
        besoinsTextarea.parentElement.appendChild(charCountDiv);

        besoinsTextarea.addEventListener('input', function() {
            const count = this.value.length;
            charCountDiv.textContent = `${count} caractère${count > 1 ? 's' : ''}`;

            if (count > 500) {
                charCountDiv.style.color = '#3b82f6';
                charCountDiv.style.fontWeight = '600';
            }
        });

        // Animation CSS pour le spinner
        const style = document.createElement('style');
        style.textContent = `
            @keyframes spin {
                from { transform: rotate(0deg); }
                to { transform: rotate(360deg); }
            }
        `;
        document.head.appendChild(style);

        // Smooth scroll pour une meilleure UX
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });

        // Sauvegarde automatique dans localStorage (brouillon)
        const formElements = form.querySelectorAll('input:not([type="hidden"]), textarea, select');

        formElements.forEach(element => {
            // Charger les valeurs sauvegardées
            const savedValue = localStorage.getItem(`form_${element.name}`);
            if (savedValue && !element.value) {
                element.value = savedValue;
            }

            // Sauvegarder au changement
            element.addEventListener('input', function() {
                localStorage.setItem(`form_${this.name}`, this.value);
            });
        });

        // Nettoyer le localStorage après soumission réussie
        form.addEventListener('submit', function() {
            formElements.forEach(element => {
                localStorage.removeItem(`form_${element.name}`);
            });
        });
    </script>
</body>
</html>
