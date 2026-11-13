<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demander un Devis - {{ $cours->titre }} | MonProfChezMoi</title>
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
            display: flex;
            flex-direction: column;
            color: #1e293b;
        }

        .navbar {
            background: linear-gradient(135deg, #1e293b 0%, #334155 100%);
            padding: 1rem 2rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
            animation: slideDown 0.6s ease-out;
        }

        .navbar-container {
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 1rem;
            color: white;
            text-decoration: none;
            transition: transform 0.3s;
        }

        .navbar-brand:hover {
            transform: scale(1.05);
        }

        .logo {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 1.25rem;
            color: white;
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.4);
        }

        .brand-text {
            font-size: 1.5rem;
            font-weight: 700;
        }

        .nav-links {
            display: flex;
            gap: 2rem;
            align-items: center;
            list-style: none;
        }

        .nav-links a {
            color: #cbd5e1;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s;
            position: relative;
            padding: 0.5rem 0;
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, #3b82f6 0%, #2563eb 100%);
            transition: width 0.3s;
        }

        .nav-links a:hover {
            color: white;
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .nav-links a.active {
            color: white;
        }

        .nav-links a.active::after {
            width: 100%;
        }

        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
            padding: 0.5rem;
        }

        .main-content {
            flex: 1;
            padding: 3rem 2rem;
            max-width: 900px;
            margin: 0 auto;
            width: 100%;
            animation: fadeInUp 0.8s ease-out;
        }

        .page-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .page-header h1 {
            font-size: 2.5rem;
            font-weight: 800;
            color: #1e293b;
            margin-bottom: 0.75rem;
            background: linear-gradient(135deg, #1e293b 0%, #3b82f6 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .page-header .course-title {
            font-size: 1.25rem;
            color: #3b82f6;
            font-weight: 600;
            margin-top: 0.5rem;
        }

        .page-header p {
            color: #64748b;
            font-size: 1.1rem;
            margin-top: 0.5rem;
        }

        .form-card {
            background: white;
            border-radius: 20px;
            padding: 3rem;
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

        .form-control {
            width: 100%;
            padding: 1rem 1.25rem;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            font-size: 1rem;
            font-family: inherit;
            transition: all 0.3s;
            background: #f8fafc;
        }

        .form-control:focus {
            outline: none;
            border-color: #3b82f6;
            background: white;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
            transform: translateY(-2px);
        }

        .form-control:disabled,
        .form-control[readonly] {
            background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
            cursor: not-allowed;
            color: #475569;
            font-weight: 600;
        }

        .form-control.valid {
            border-color: #10b981;
            background: #f0fdf4;
        }

        .form-control.invalid {
            border-color: #ef4444;
            background: #fef2f2;
        }

        .input-hint {
            font-size: 0.875rem;
            color: #64748b;
            margin-top: 0.5rem;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
        }

        .btn-submit {
            width: 100%;
            padding: 1.25rem 2rem;
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 1.1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 10px 30px rgba(59, 130, 246, 0.3);
            margin-top: 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
        }

        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(59, 130, 246, 0.5);
        }

        .btn-submit:active {
            transform: translateY(-1px);
        }

        .btn-submit::after {
            content: "→";
            font-size: 1.5rem;
            transition: transform 0.3s;
        }

        .btn-submit:hover::after {
            transform: translateX(5px);
        }

        .footer {
            background: linear-gradient(135deg, #1e293b 0%, #334155 100%);
            color: white;
            padding: 3rem 2rem 1.5rem;
            margin-top: auto;
        }

        .footer-container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 3rem;
            margin-bottom: 2rem;
        }

        .footer-section h3 {
            font-size: 1.25rem;
            margin-bottom: 1.5rem;
            color: white;
        }

        .footer-section p {
            color: #cbd5e1;
            line-height: 1.8;
            margin-bottom: 1rem;
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 0.75rem;
        }

        .footer-links a {
            color: #cbd5e1;
            text-decoration: none;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .footer-links a::before {
            content: "→";
            transition: transform 0.3s;
        }

        .footer-links a:hover {
            color: white;
            transform: translateX(5px);
        }

        .footer-links a:hover::before {
            transform: translateX(3px);
        }

        .social-links {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }

        .social-link {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: all 0.3s;
            font-size: 1.25rem;
        }

        .social-link:hover {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            transform: translateY(-3px);
            box-shadow: 0 5px 20px rgba(59, 130, 246, 0.4);
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 1.5rem;
            text-align: center;
            color: #94a3b8;
            font-size: 0.9rem;
        }

        .progress-indicator {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        .progress-steps {
            display: flex;
            justify-content: space-between;
            position: relative;
        }

        .progress-steps::before {
            content: '';
            position: absolute;
            top: 25px;
            left: 50px;
            right: 50px;
            height: 3px;
            background: #e2e8f0;
            z-index: 0;
        }

        .progress-step {
            text-align: center;
            position: relative;
            z-index: 1;
            flex: 1;
        }

        .step-circle {
            width: 50px;
            height: 50px;
            background: #e2e8f0;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 0.75rem;
            font-weight: 700;
            color: #64748b;
            transition: all 0.3s;
        }

        .progress-step.active .step-circle {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.4);
        }

        .progress-step.completed .step-circle {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
        }

        .step-label {
            font-size: 0.875rem;
            color: #64748b;
            font-weight: 500;
        }

        .progress-step.active .step-label {
            color: #1e293b;
            font-weight: 600;
        }

        @keyframes slideDown {
            from {
                transform: translateY(-100%);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
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

        @keyframes shimmer {
            0% { background-position: 200% 0; }
            100% { background-position: -200% 0; }
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        @media (max-width: 968px) {
            .nav-links {
                display: none;
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background: #1e293b;
                flex-direction: column;
                padding: 2rem;
                gap: 1rem;
                box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
            }

            .nav-links.active {
                display: flex;
            }

            .mobile-menu-btn {
                display: block;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-card {
                padding: 2rem 1.5rem;
            }

            .page-header h1 {
                font-size: 2rem;
            }

            .main-content {
                padding: 2rem 1rem;
            }
        }

        @media (max-width: 640px) {
            .progress-steps::before {
                display: none;
            }

            .progress-steps {
                flex-direction: column;
                gap: 1rem;
            }

            .step-circle {
                width: 40px;
                height: 40px;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="navbar-container">
            <a href="/" class="navbar-brand">
                <div class="logo">MP</div>
                <span class="brand-text">MonProfChezMoi</span>
            </a>
            <button class="mobile-menu-btn" onclick="toggleMobileMenu()">
                ☰
            </button>
            <ul class="nav-links" id="navLinks">
                <li><a href="/">Accueil</a></li>
                <li><a href="/formations">Formations</a></li>
                <li><a href="/bons-formation">Bons de Formation</a></li>
                <li><a href="/contact">Contact</a></li>
            </ul>
        </div>
    </nav>

    <main class="main-content">
        <div class="page-header">
            <h1>Demander un Devis</h1>
            <p class="course-title">{{ $cours->titre }}</p>
            <p>Remplissez le formulaire ci-dessous pour recevoir votre devis personnalisé</p>
        </div>

        <div class="progress-indicator">
            <div class="progress-steps">
                <div class="progress-step active">
                    <div class="step-circle">1</div>
                    <div class="step-label">Cours</div>
                </div>
                <div class="progress-step active">
                    <div class="step-circle">2</div>
                    <div class="step-label">Informations</div>
                </div>
                <div class="progress-step">
                    <div class="step-circle">3</div>
                    <div class="step-label">Confirmation</div>
                </div>
            </div>
        </div>

        <div class="form-card">
            <form action="{{ route('devis.store') }}" method="POST" id="devisForm">
                @csrf
                <input type="hidden" name="cours_id" value="{{ $cours->id }}">

                <div class="form-section">
                    <div class="form-section-title">
                        <span class="icon">📚</span>
                        Cours sélectionné
                    </div>
                    <div class="form-group">
                        <label for="titre" class="form-label">Titre du Cours</label>
                        <input type="text" class="form-control" id="titre" value="{{ $cours->titre }}" readonly>
                        <p class="input-hint">Le cours que vous avez choisi</p>
                    </div>
                </div>

                <div class="form-section">
                    <div class="form-section-title">
                        <span class="icon">👤</span>
                        Vos informations
                    </div>

                    <div class="form-grid">
                        <div class="form-group">
                            <label for="nom" class="form-label">
                                Nom
                                <span class="required">*</span>
                            </label>
                            <input type="text" class="form-control" id="nom" name="nom" placeholder="Votre nom" required>
                        </div>

                        <div class="form-group">
                            <label for="prenom" class="form-label">
                                Prénom
                                <span class="required">*</span>
                            </label>
                            <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Votre prénom" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label">
                            Email
                            <span class="required">*</span>
                        </label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="votre.email@exemple.com" required>
                        <p class="input-hint">Nous vous enverrons le devis à cette adresse</p>
                    </div>

                    <div class="form-grid">
                        <div class="form-group">
                            <label for="numero" class="form-label">
                                Numéro de Téléphone
                                <span class="required">*</span>
                            </label>
                            <input type="tel" class="form-control" id="numero" name="numero" placeholder="+33 6 12 34 56 78" required>
                        </div>

                        <div class="form-group">
                            <label for="ville" class="form-label">
                                Ville
                                <span class="required">*</span>
                            </label>
                            <input type="text" class="form-control" id="ville" name="ville" placeholder="Votre ville" required>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn-submit" id="submitBtn">
                    Envoyer la Demande de Devis
                </button>
            </form>
        </div>
    </main>

    <footer class="footer">
        <div class="footer-container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>MonProfChezMoi</h3>
                    <p>
                        Votre plateforme de formation professionnelle en ligne.
                        Des cours de qualité dispensés par des experts pour développer vos compétences.
                    </p>
                    <div class="social-links">
                        <a href="#" class="social-link" title="Facebook">f</a>
                        <a href="#" class="social-link" title="Twitter">𝕏</a>
                        <a href="#" class="social-link" title="LinkedIn">in</a>
                        <a href="#" class="social-link" title="Instagram">📷</a>
                    </div>
                </div>

                <div class="footer-section">
                    <h3>Formations</h3>
                    <ul class="footer-links">
                        <li><a href="/formations">Catalogue des formations</a></li>
                        <li><a href="/bons-formation">Bons de formation</a></li>
                        <li><a href="/formation-personnalisee">Formation sur mesure</a></li>
                        <li><a href="/certifications">Nos certifications</a></li>
                    </ul>
                </div>

                <div class="footer-section">
                    <h3>Support</h3>
                    <ul class="footer-links">
                        <li><a href="/faq">Questions fréquentes</a></li>
                        <li><a href="/contact">Nous contacter</a></li>
                        <li><a href="/aide">Centre d'aide</a></li>
                        <li><a href="/conditions">Conditions d'utilisation</a></li>
                    </ul>
                </div>

                <div class="footer-section">
                    <h3>Contact</h3>
                    <p>📧 contact@monprofchezmoi.fr</p>
                    <p>📞 +33 1 23 45 67 89</p>
                    <p>📍 Paris, France</p>
                    <p>🕐 Lun - Ven : 9h - 18h</p>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; 2024 MonProfChezMoi. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <script>
        function toggleMobileMenu() {
            const navLinks = document.getElementById('navLinks');
            navLinks.classList.toggle('active');
        }

        const form = document.getElementById('devisForm');
        const submitBtn = document.getElementById('submitBtn');
        const formInputs = document.querySelectorAll('.form-control:not([readonly])');

        function validateEmail(email) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }

        function validatePhone(phone) {
            const phoneRegex = /^[\d\s\+\-\(\)]+$/;
            return phoneRegex.test(phone) && phone.replace(/\D/g, '').length >= 10;
        }

        function validateField(input) {
            const value = input.value.trim();

            if (!value && input.required) {
                input.classList.remove('valid');
                input.classList.add('invalid');
                return false;
            }

            if (input.type === 'email') {
                if (validateEmail(value)) {
                    input.classList.add('valid');
                    input.classList.remove('invalid');
                    return true;
                } else {
                    input.classList.remove('valid');
                    input.classList.add('invalid');
                    return false;
                }
            }

            if (input.id === 'numero') {
                if (validatePhone(value)) {
                    input.classList.add('valid');
                    input.classList.remove('invalid');
                    return true;
                } else {
                    input.classList.remove('valid');
                    input.classList.add('invalid');
                    return false;
                }
            }

            if (value.length >= 2) {
                input.classList.add('valid');
                input.classList.remove('invalid');
                return true;
            } else {
                input.classList.remove('valid');
                input.classList.add('invalid');
                return false;
            }
        }

        formInputs.forEach(input => {
            input.addEventListener('blur', function() {
                validateField(this);
            });

            input.addEventListener('input', function() {
                if (this.classList.contains('invalid')) {
                    validateField(this);
                }
            });

            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'translateY(-2px)';
                this.parentElement.style.transition = 'transform 0.3s';
            });

            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'translateY(0)';
            });
        });

        form.addEventListener('submit', function(e) {
            e.preventDefault();

            let isValid = true;
            formInputs.forEach(input => {
                if (!validateField(input)) {
                    isValid = false;
                }
            });

            if (isValid) {
                submitBtn.innerHTML = '<span style="display: inline-block; width: 20px; height: 20px; border: 3px solid rgba(255,255,255,0.3); border-radius: 50%; border-top-color: white; animation: spin 0.8s linear infinite;"></span> Envoi en cours...';
                submitBtn.style.pointerEvents = 'none';

                const steps = document.querySelectorAll('.progress-step');
                steps[2].classList.add('active');
                steps[1].classList.add('completed');

                setTimeout(() => {
                    form.submit();
                }, 500);
            } else {
                const firstInvalid = form.querySelector('.form-control.invalid');
                if (firstInvalid) {
                    firstInvalid.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    firstInvalid.focus();
                }
            }
        });

        const emailInput = document.getElementById('email');
        const phoneInput = document.getElementById('numero');

        emailInput.addEventListener('input', function() {
            if (this.value && !validateEmail(this.value)) {
                this.style.borderColor = '#ef4444';
            } else if (this.value) {
                this.style.borderColor = '#10b981';
            }
        });

        phoneInput.addEventListener('input', function() {
            let value = this.value.replace(/\s/g, '');
            if (value.length > 0) {
                if (validatePhone(value)) {
                    this.style.borderColor = '#10b981';
                } else {
                    this.style.borderColor = '#ef4444';
                }
            }
        });

        window.addEventListener('scroll', function() {
            if (window.scrollY > 100) {
                document.querySelector('.navbar').style.boxShadow = '0 10px 40px rgba(0, 0, 0, 0.2)';
            } else {
                document.querySelector('.navbar').style.boxShadow = '0 4px 20px rgba(0, 0, 0, 0.1)';
            }
        });

        const savedData = {
            nom: localStorage.getItem('devis_nom'),
            prenom: localStorage.getItem('devis_prenom'),
            email: localStorage.getItem('devis_email'),
            numero: localStorage.getItem('devis_numero'),
            ville: localStorage.getItem('devis_ville')
        };

        Object.keys(savedData).forEach(key => {
            const input = document.getElementById(key);
            if (savedData[key] && input) {
                input.value = savedData[key];
            }
        });

        formInputs.forEach(input => {
            input.addEventListener('input', function() {
                localStorage.setItem(`devis_${this.id}`, this.value);
            });
        });

        form.addEventListener('submit', function() {
            Object.keys(savedData).forEach(key => {
                localStorage.removeItem(`devis_${key}`);
            });
        });

        console.log('%c📋 Demande de Devis - MonProfChezMoi', 'font-size: 20px; color: #3b82f6; font-weight: bold;');
        console.log('%cFormulaire chargé avec succès!', 'font-size: 14px; color: #10b981;');
    </script>
</body>
</html>
