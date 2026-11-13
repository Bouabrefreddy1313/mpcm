<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Télécharger nos catalogues - MonProfChezMoi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
   
    <style>
        :root {
            --primary-blue: #2563EB;
            --dark-blue: #1E40AF;
            --light-blue: #DBEAFE;
            --very-light-blue: #F0F9FF;
            --primary-orange: #F97316;
            --dark-orange: #EA580C;
            --light-orange: #FFEDD5;
            --very-light-orange: #FFF7ED;
            --text-dark: #1F2937;
            --text-gray: #6B7280;
            --bg-light: #F9FAFB;
            --white: #FFFFFF;
            --border-color: #E5E7EB;
            --success-green: #10B981;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: var(--text-dark);
            background: var(--bg-light);
        }

        /* Navbar */
        .navbar {
            background: var(--white);
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            padding: 1rem 0;
            position: sticky;
            top: 0;
            z-index: 1000;
            transition: box-shadow 0.3s ease;
        }

        .navbar.scrolled {
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .navbar-brand {
            font-size: 1.4rem;
            color: var(--primary-blue);
            font-weight: 700;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .navbar-brand i {
            color: var(--primary-orange);
        }

        .navbar-brand:hover {
            color: var(--dark-blue);
            transform: translateY(-2px);
        }

        .nav-link {
            color: var(--text-gray) !important;
            font-weight: 500;
            padding: 0.5rem 1rem !important;
            margin: 0 0.25rem;
            border-radius: 8px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .nav-link i {
            font-size: 0.9rem;
        }

        .nav-link:hover {
            color: var(--primary-blue) !important;
            background: var(--very-light-blue);
        }

        .nav-link.active {
            color: var(--white) !important;
            background: var(--primary-blue);
        }

        .navbar-toggler {
            border: none;
        }

        .navbar-toggler:focus {
            box-shadow: none;
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--dark-blue) 100%);
            padding: 4rem 0 3rem;
            color: var(--white);
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg"><circle cx="50" cy="50" r="2" fill="white" opacity="0.1"/></svg>');
            opacity: 0.3;
        }

        .hero-content {
            text-align: center;
            position: relative;
            z-index: 1;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            padding: 0.5rem 1.25rem;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.9rem;
            margin-bottom: 1.5rem;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .hero-title {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 1rem;
            line-height: 1.2;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .hero-subtitle {
            font-size: 1.2rem;
            opacity: 0.95;
            max-width: 700px;
            margin: 0 auto;
        }

        /* Section Catalogues */
        .catalogues-section {
            padding: 4rem 0;
        }

        /* Carte Catalogue */
        .catalogue-card {
            background: var(--white);
            border-radius: 16px;
            padding: 2rem;
            border: 1px solid var(--border-color);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            align-items: center;
            gap: 1.5rem;
            margin-bottom: 1.5rem;
            cursor: pointer;
            animation: fadeInUp 0.6s ease forwards;
            opacity: 0;
        }

        .catalogue-card[data-index="0"] { animation-delay: 0.1s; }
        .catalogue-card[data-index="1"] { animation-delay: 0.15s; }
        .catalogue-card[data-index="2"] { animation-delay: 0.2s; }
        .catalogue-card[data-index="3"] { animation-delay: 0.25s; }
        .catalogue-card[data-index="4"] { animation-delay: 0.3s; }

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

        .catalogue-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 40px rgba(37, 99, 235, 0.18);
            border-color: var(--primary-blue);
        }

        .catalogue-icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--primary-orange) 100%);
            border-radius: 16px;
            display: grid;
            place-items: center;
            color: var(--white);
            font-size: 1.8rem;
            box-shadow: 0 6px 20px rgba(37, 99, 235, 0.25);
            flex-shrink: 0;
        }

        .catalogue-content {
            flex: 1;
        }

        .catalogue-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 0.5rem;
            transition: color 0.3s ease;
        }

        .catalogue-card:hover .catalogue-title {
            color: var(--primary-blue);
        }

        .catalogue-desc {
            font-size: 0.95rem;
            color: var(--text-gray);
            margin: 0;
        }

        .catalogue-btn {
            background: var(--very-light-blue);
            color: var(--primary-blue);
            padding: 0.75rem 1.5rem;
            border-radius: 10px;
            font-weight: 600;
            font-size: 0.95rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
            transition: all 0.3s ease;
            border: 2px solid transparent;
            flex-shrink: 0;
            border: none;
        }

        .catalogue-btn:hover {
            background: var(--primary-blue);
            color: var(--white);
            transform: scale(1.05);
            box-shadow: 0 6px 20px rgba(37, 99, 235, 0.3);
        }

        .catalogue-btn i {
            transition: transform 0.3s ease;
        }

        .catalogue-btn:hover i {
            transform: translateY(2px);
        }

        /* Section Header */
        .section-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .section-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: var(--very-light-orange);
            color: var(--primary-orange);
            padding: 0.5rem 1.25rem;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        .section-title {
            font-size: 2.2rem;
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 1rem;
        }

        .section-subtitle {
            font-size: 1.1rem;
            color: var(--text-gray);
            max-width: 600px;
            margin: 0 auto;
        }

        /* Modal Styles */
        .modal-content {
            border-radius: 20px;
            border: none;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        }

        .modal-header {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--dark-blue) 100%);
            color: var(--white);
            border-radius: 20px 20px 0 0;
            padding: 1.5rem;
            border-bottom: none;
        }

        .modal-title {
            font-weight: 700;
            font-size: 1.3rem;
        }

        .btn-close {
            filter: invert(1);
            opacity: 0.8;
        }

        .btn-close:hover {
            opacity: 1;
        }

        .modal-body {
            padding: 2rem;
        }

        .form-label {
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 0.5rem;
        }

        .form-control {
            border: 2px solid var(--border-color);
            border-radius: 10px;
            padding: 0.75rem 1rem;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .form-control::placeholder {
            color: var(--text-gray);
            opacity: 0.6;
        }

        .modal-footer {
            padding: 1.5rem;
            border-top: 1px solid var(--border-color);
        }

        .btn-modal-primary {
            background: var(--primary-blue);
            color: var(--white);
            padding: 0.75rem 2rem;
            border-radius: 10px;
            font-weight: 600;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-modal-primary:hover {
            background: var(--dark-blue);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(37, 99, 235, 0.3);
        }

        .btn-modal-secondary {
            background: var(--bg-light);
            color: var(--text-gray);
            padding: 0.75rem 2rem;
            border-radius: 10px;
            font-weight: 600;
            border: 2px solid var(--border-color);
            transition: all 0.3s ease;
        }

        .btn-modal-secondary:hover {
            background: var(--border-color);
            color: var(--text-dark);
        }

        /* CTA Section */
        .cta-section {
            padding: 4rem 0;
        }

        .cta-content {
            background: linear-gradient(135deg, var(--primary-orange) 0%, var(--dark-orange) 100%);
            border-radius: 20px;
            padding: 3.5rem 2rem;
            text-align: center;
            color: var(--white);
            box-shadow: 0 12px 40px rgba(249, 115, 22, 0.25);
        }

        .cta-content h2 {
            font-size: 2.2rem;
            font-weight: 800;
            margin-bottom: 0.75rem;
        }

        .cta-content p {
            font-size: 1.15rem;
            opacity: 0.95;
            margin-bottom: 2rem;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }

        .cta-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn-cta {
            padding: 1rem 2rem;
            border: none;
            border-radius: 10px;
            font-size: 1.05rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 0.6rem;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .btn-cta.primary {
            background: var(--white);
            color: var(--primary-orange);
        }

        .btn-cta.primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .btn-cta.secondary {
            background: rgba(255, 255, 255, 0.15);
            color: var(--white);
            border: 2px solid var(--white);
            backdrop-filter: blur(10px);
        }

        .btn-cta.secondary:hover {
            background: var(--white);
            color: var(--primary-orange);
            transform: translateY(-3px);
        }

        /* Footer */
        .footer {
            background: var(--white);
            padding: 3rem 0 1.5rem;
            margin-top: 4rem;
            border-top: 1px solid var(--border-color);
        }

        .footer-brand {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }

        .footer-brand i {
            font-size: 1.8rem;
            color: var(--primary-orange);
        }

        .footer-brand h5 {
            font-weight: 700;
            color: var(--primary-blue);
            margin: 0;
        }

        .footer-text {
            color: var(--text-gray);
            margin-bottom: 1.5rem;
        }

        .social-links {
            display: flex;
            gap: 0.75rem;
        }

        .social-links a {
            width: 38px;
            height: 38px;
            background: var(--very-light-blue);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-blue);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .social-links a:hover {
            background: var(--primary-blue);
            color: var(--white);
            transform: translateY(-3px);
        }

        .footer-heading {
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 1rem;
        }

        .footer-links {
            list-style: none;
            padding: 0;
        }

        .footer-links li {
            margin-bottom: 0.5rem;
        }

        .footer-links a {
            color: var(--text-gray);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .footer-links a:hover {
            color: var(--primary-blue);
            padding-left: 5px;
        }

        .footer-contact {
            list-style: none;
            padding: 0;
        }

        .footer-contact li {
            color: var(--text-gray);
            margin-bottom: 0.75rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .footer-contact i {
            color: var(--primary-orange);
            width: 18px;
        }

        .footer-bottom {
            text-align: center;
            margin-top: 2rem;
            padding-top: 1.5rem;
            border-top: 1px solid var(--border-color);
            color: var(--text-gray);
            font-size: 0.9rem;
        }

        /* Alert */
        .alert {
            border-radius: 12px;
            padding: 1rem 1.5rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2rem;
            }

            .hero-subtitle {
                font-size: 1rem;
            }

            .section-title {
                font-size: 1.8rem;
            }

            .catalogue-card {
                flex-direction: column;
                text-align: center;
                padding: 1.5rem;
            }

            .catalogue-icon {
                width: 60px;
                height: 60px;
                font-size: 1.5rem;
            }

            .catalogue-btn {
                width: 100%;
                justify-content: center;
                margin-top: 1rem;
            }

            .modal-body {
                padding: 1.5rem;
            }

            .cta-content h2 {
                font-size: 1.6rem;
            }

            .cta-buttons {
                flex-direction: column;
            }

            .btn-cta {
                width: 100%;
                justify-content: center;
            }

            .nav-link i {
                display: none;
            }
        }

        @media (max-width: 576px) {
            .hero-section {
                padding: 3rem 0 2rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <i class="fas fa-graduation-cap"></i>MonProfChezMoi
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">
                            <i class="fas fa-home"></i>Accueil
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('formations.index') }}">
                            <i class="fas fa-book"></i>Catalogue
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('telecharger.index') }}">
                            <i class="fas fa-download"></i>Téléchargements
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('client.formation.create') }}">
                            <i class="fas fa-layer-group"></i>Formation sur-mesure
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cours.eligibleFdfp') }}">
                            <i class="fas fa-layer-group"></i>Financement FDFP
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cours.certifiants') }}">
                            <i class="fas fa-layer-group"></i>Certifications
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">
                            <i class="fas fa-layer-group"></i>Nous Contacter
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <div class="hero-badge">
                    <i class="fas fa-download"></i>
                    <span>À télécharger</span>
                </div>
                <h1 class="hero-title">Les catalogues à télécharger</h1>
                <p class="hero-subtitle">Téléchargez nos catalogues de formations en PDF et découvrez toutes nos offres</p>
            </div>
        </div>
    </section>

    <!-- Catalogues Section -->
    <section class="catalogues-section">
        <div class="container">
            
            @if(session('success'))
                <div class="alert alert-success mb-4">
                    <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger mb-4">
                    <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                </div>
            @endif

            <div class="section-header">
                <div class="section-badge">
                    <i class="fas fa-file-pdf"></i>
                    Catalogues PDF
                </div>
                <h2 class="section-title">Nos Catalogues de Formation</h2>
                <p class="section-subtitle">Remplissez le formulaire pour télécharger nos catalogues spécialisés</p>
            </div>

            @foreach($catalogues as $index => $catalogue)
            <div class="catalogue-card" data-index="{{ $index }}">
                <div class="catalogue-icon">
                    <i class="fas {{ $catalogue['icone'] }}"></i>
                </div>
                <div class="catalogue-content">
                    <h3 class="catalogue-title">{{ $catalogue['titre'] }}</h3>
                    <p class="catalogue-desc">{{ $catalogue['description'] }}</p>
                </div>
                <button type="button" class="catalogue-btn" data-bs-toggle="modal" data-bs-target="#downloadModal" 
                        onclick="setCatalogue('{{ $catalogue['titre'] }}', '{{ $catalogue['fichier'] }}')">
                    <i class="fas fa-download"></i>
                    Télécharger
                </button>
            </div>
            @endforeach

        </div>
    </section>

    <!-- Modal Formulaire -->
    <div class="modal fade" id="downloadModal" tabindex="-1" aria-labelledby="downloadModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="downloadModalLabel">
                        <i class="fas fa-user-circle me-2"></i>Télécharger le catalogue
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('telecharger.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <p class="text-muted mb-3">Veuillez remplir vos informations pour accéder au téléchargement.</p>
                        
                        <input type="hidden" name="catalogue" id="catalogueName">
                        <input type="hidden" name="fichier" id="catalogueFile">

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="nom" class="form-label">Nom *</label>
                                <input type="text" class="form-control @error('nom') is-invalid @enderror" 
                                       id="nom" name="nom" required placeholder="Votre nom">
                                @error('nom')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="prenom" class="form-label">Prénom *</label>
                                <input type="text" class="form-control @error('prenom') is-invalid @enderror" 
                                       id="prenom" name="prenom" required placeholder="Votre prénom">
                                @error('prenom')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email *</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                   id="email" name="email" required placeholder="votre@email.com">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="telephone" class="form-label">Téléphone</label>
                            <input type="tel" class="form-control @error('telephone') is-invalid @enderror" 
                                   id="telephone" name="telephone" placeholder="+225 XX XX XX XX">
                            @error('telephone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="entreprise" class="form-label">Entreprise</label>
                                <input type="text" class="form-control @error('entreprise') is-invalid @enderror" 
                                       id="entreprise" name="entreprise" placeholder="Nom de l'entreprise">
                                @error('entreprise')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="fonction" class="form-label">Fonction</label>
                                <input type="text" class="form-control @error('fonction') is-invalid @enderror" 
                                       id="fonction" name="fonction" placeholder="Votre poste">
                                @error('fonction')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-text text-muted">
                            <i class="fas fa-info-circle me-1"></i>Les champs marqués d'un * sont obligatoires.
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn-modal-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn-modal-primary">
                            <i class="fas fa-download me-2"></i>Télécharger maintenant
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-content">
                <h2>Besoin d'une formation sur mesure ?</h2>
                <p>Nos experts sont à votre disposition pour créer un programme adapté à vos besoins spécifiques</p>
                <div class="cta-buttons">
                    <a href="mailto:formationpro@monprofchezmoi-ci.com" class="btn-cta primary">
                        <i class="fas fa-envelope"></i>
                        Nous contacter
                    </a>
                    <a href="tel:+2250710000588" class="btn-cta secondary">
                        <i class="fas fa-phone"></i>
                        +225 07 10 00 05 88
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="-footer-brand">
                        <i class="fas fa-graduation-cap"></i>
                        <h5>MonProfChezMoi</h5>
                    </div>
                    <p class="footer-text">Votre partenaire pour la formation professionnelle en entreprise.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <h6 class="footer-heading">Services</h6>
                    <ul class="footer-links">
                        <li><a href="{{ route('formations.index') }}">Formations</a></li>
                        <li><a href="{{ route('bons.index') }}">Bons de commande</a></li>
                        <li><a href="{{ route('client.formation.create') }}">Formation sur mesure</a></li>
                        <li><a href="#">Support</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h6 class="footer-heading">Contact</h6>
                    <ul class="footer-contact">
                        <li><i class="fas fa-phone"></i> +225 07 10 00 05 88</li>
                        <li><i class="fas fa-envelope"></i> formationpro@monprofchezmoi-ci.com</li>
                        <li><i class="fas fa-map-marker-alt"></i> Riviera 4 Synacassi 1</li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; {{ date('Y') }} MonProfChezMoi. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 20) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Set catalogue info in modal
        function setCatalogue(nom, fichier) {
            document.getElementById('catalogueName').value = nom;
            document.getElementById('catalogueFile').value = fichier;
            document.getElementById('downloadModalLabel').innerHTML = 
                '<i class="fas fa-file-pdf me-2"></i>' + nom;
        }

        // Intersection Observer for card animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Observe all catalogue cards
        document.querySelectorAll('.catalogue-card').forEach(card => {
            observer.observe(card);
        });

        // Navbar collapse on mobile
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', () => {
                const navbarCollapse = document.querySelector('.navbar-collapse');
                if (navbarCollapse && navbarCollapse.classList.contains('show')) {
                    const bsCollapse = bootstrap.Collapse.getInstance(navbarCollapse);
                    if (bsCollapse) {
                        bsCollapse.hide();
                    }
                }
            });
        });

        console.log('%c✨ MonProfChezMoi - Téléchargements PDF ✨', 'color: #5B8CC6; font-size: 20px; font-weight: bold;');
        console.log('%c5 catalogues disponibles au téléchargement', 'color: #F4A261; font-size: 14px;');
    </script>
</body>
</html>