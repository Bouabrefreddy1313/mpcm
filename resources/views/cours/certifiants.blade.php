<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cours Certifiants - MonProfChezMoi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        /* ===== COPIEZ ICI TOUT LE CSS QUE VOUS M’AVEZ DONNÉ (le bloc complet) ===== */
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    line-height: 1.6;
    color: #333;
    overflow-x: hidden;
    background: #f8f9fa;
    position: relative;
}

/* Animated Background */
.animated-bg {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: -1;
    overflow: hidden;
    background: linear-gradient(to bottom, #ffffff 0%, #e3f2fd 100%);
}

.gradient-orb {
    position: absolute;
    border-radius: 50%;
    filter: blur(80px);
    opacity: 0.3;
    animation: float 20s infinite ease-in-out;
}

.orb-1 {
    width: 500px;
    height: 500px;
    background: linear-gradient(135deg, var(--primary-blue) 0%, var(--light-blue) 100%);
    top: -200px;
    left: -200px;
    animation-delay: 0s;
}

.orb-2 {
    width: 400px;
    height: 400px;
    background: linear-gradient(135deg, var(--primary-orange) 0%, var(--secondary-orange) 100%);
    bottom: -150px;
    right: -150px;
    animation-delay: -7s;
}

.orb-3 {
    width: 350px;
    height: 350px;
    background: linear-gradient(135deg, var(--primary-blue) 0%, var(--primary-blue) 100%);
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    animation-delay: -14s;
}

@keyframes float {
    0%, 100% {
        transform: translate(0, 0) scale(1);
    }
    33% {
        transform: translate(100px, -100px) scale(1.1);
    }
    66% {
        transform: translate(-100px, 100px) scale(0.9);
    }
}

/* Navbar */
.navbar-glass {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    box-shadow: 0 2px 20px rgba(0, 102, 255, 0.1);
    padding: 1rem 0;
    position: sticky;
    top: 0;
    z-index: 1000;
    transition: all 0.3s ease;
}

.navbar-glass.scrolled {
    box-shadow: 0 5px 30px rgba(0, 102, 255, 0.2);
}

.navbar-brand {
    font-size: 1.5rem;
    background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    font-weight: 700;
    transition: all 0.3s ease;
}

.navbar-brand:hover {
    transform: scale(1.05);
}

.navbar-brand i {
    -webkit-text-fill-color: var(--primary-orange);
}

.nav-link {
    color: var(--dark-blue) !important;
    font-weight: 500;
    padding: 0.5rem 1rem !important;
    margin: 0 0.25rem;
    border-radius: 8px;
    transition: all 0.3s ease;
    position: relative;
}

.nav-link::before {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    width: 0;
    height: 2px;
    background: var(--primary-blue);
    transform: translateX(-50%);
    transition: width 0.3s ease;
}

.nav-link:hover::before {
    width: 80%;
}

.nav-link:hover {
    background: rgba(0, 102, 255, 0.05);
    transform: translateY(-2px);
}

.nav-link.active {
    background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
    color: white !important;
    box-shadow: 0 4px 15px rgba(0, 102, 255, 0.3);
}

.nav-link.active::before {
    display: none;
}

.navbar-toggler {
    border: 2px solid var(--primary-blue);
}

.navbar-toggler-icon {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='%230066FF' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
}

/* Content Wrapper */
.content-wrapper {
    position: relative;
    z-index: 1;
}

/* Breadcrumb */
.breadcrumb-modern {
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(10px);
    padding: 1rem 1.5rem;
    border-radius: 15px;
    box-shadow: var(--shadow-sm);
    list-style: none;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
}

.breadcrumb-item {
    display: flex;
    align-items: center;
}

.breadcrumb-item + .breadcrumb-item::before {
    content: "→";
    color: var(--primary-orange);
    margin: 0 0.75rem;
    font-weight: bold;
}

.breadcrumb-item a {
    color: var(--primary-blue);
    text-decoration: none;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.breadcrumb-item a:hover {
    color: var(--primary-orange);
    transform: translateX(3px);
}

.breadcrumb-item.active {
    color: var(--dark-blue);
    font-weight: 600;
}

/* Formation Header */
.formation-header {
    position: relative;
    padding: 3rem 2rem;
    text-align: center;
    overflow: hidden;
}

.card-glass {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    border-radius: 20px;
    border: 1px solid rgba(255, 255, 255, 0.5);
    box-shadow: var(--shadow-md);
}

.floating-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
    font-size: 2.5rem;
    color: white;
    box-shadow: 0 10px 30px rgba(0, 102, 255, 0.3);
    animation: floatIcon 3s infinite ease-in-out;
}

@keyframes floatIcon {
    0%, 100% {
        transform: translateY(0px);
    }
    50% {
        transform: translateY(-10px);
    }
}

.formation-title {
    font-size: 2.5rem;
    font-weight: 800;
    color: var(--dark-blue);
    margin-bottom: 1rem;
    animation: slideInDown 0.6s ease;
}

.formation-description {
    font-size: 1.1rem;
    color: #666;
    max-width: 800px;
    margin: 0 auto;
    line-height: 1.8;
    animation: slideInUp 0.6s ease;
}

.header-decoration {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 5px;
    background: linear-gradient(90deg, var(--primary-blue) 0%, var(--primary-blue) 100%);
    border-radius: 0 0 20px 20px;
}

/* Section Title */
.section-title-wrapper {
    text-align: center;
    margin-bottom: 3rem;
}

.section-title {
    display: inline-flex;
    align-items: center;
    gap: 1rem;
    font-size: 2rem;
    font-weight: 700;
    color: var(--dark-blue);
    margin-bottom: 0.5rem;
}

.title-icon {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, var(--primary-orange) 0%, var(--secondary-orange) 100%);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.5rem;
}

.title-count {
    background: linear-gradient(135deg, var(--primary-blue) 0%, var(--light-blue) 100%);
    color: white;
    padding: 0.3rem 0.8rem;
    border-radius: 20px;
    font-size: 1rem;
    font-weight: 600;
}

.section-underline {
    width: 100px;
    height: 4px;
    background: linear-gradient(90deg, var(--primary-blue) 0%, var(--primary-blue) 100%);
    margin: 0 auto;
    border-radius: 2px;
}

/* Sous-Formation Cards */
.sous-formation-card {
    display: block;
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    border-radius: 20px;
    padding: 2rem;
    text-decoration: none;
    color: inherit;
    position: relative;
    overflow: hidden;
    border: 2px solid transparent;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: var(--shadow-sm);
    height: 100%;
    animation: fadeInUp 0.6s ease forwards;
    opacity: 0;
}

.sous-formation-card[data-index="0"] { animation-delay: 0.1s; }
.sous-formation-card[data-index="1"] { animation-delay: 0.2s; }
.sous-formation-card[data-index="2"] { animation-delay: 0.3s; }
.sous-formation-card[data-index="3"] { animation-delay: 0.4s; }
.sous-formation-card[data-index="4"] { animation-delay: 0.5s; }
.sous-formation-card[data-index="5"] { animation-delay: 0.6s; }

@keyframes fadeInUp {
    to {
        opacity: 1;
        transform: translateY(0);
    }
    from {
        opacity: 0;
        transform: translateY(20px);
    }
}

.sous-formation-card:hover {
    border-color: var(--primary-blue);
    transform: translateY(-10px) scale(1.02);
    box-shadow: 0 20px 60px rgba(0, 102, 255, 0.25);
}

.sous-formation-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, var(--primary-blue) 0%, var(--primary-blue) 100%);
    opacity: 0;
    transition: opacity 0.4s ease;
    border-radius: 20px;
}

.sous-formation-card:hover::before {
    opacity: 0.03;
}

.card-number {
    position: absolute;
    top: 1rem;
    right: 1rem;
    font-size: 3rem;
    font-weight: 800;
    color: var(--primary-orange);
    opacity: 0.1;
    transition: all 0.4s ease;
}

.sous-formation-card:hover .card-number {
    opacity: 0.2;
    transform: scale(1.2);
}

.card-icon {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, var(--primary-blue) 0%, var(--light-blue) 100%);
    border-radius: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.8rem;
    margin-bottom: 1.5rem;
    transition: all 0.4s ease;
    box-shadow: 0 5px 20px rgba(0, 102, 255, 0.3);
}

.sous-formation-card:hover .card-icon {
    background: linear-gradient(135deg, var(--primary-orange) 0%, var(--secondary-orange) 100%);
    transform: rotateY(360deg) scale(1.1);
}

.card-title {
    font-size: 1.3rem;
    font-weight: 700;
    color: var(--dark-blue);
    margin-bottom: 1rem;
    transition: all 0.3s ease;
}

.sous-formation-card:hover .card-title {
    color: var(--primary-blue);
}

.card-arrow {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
    border-radius: 50%;
    color: white;
    margin-top: 1rem;
    transition: all 0.4s ease;
    box-shadow: 0 4px 15px rgba(0, 102, 255, 0.3);
}

.sous-formation-card:hover .card-arrow {
    transform: translateX(10px) rotate(45deg);
}

.card-glow {
    position: absolute;
    bottom: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(0, 102, 255, 0.1) 0%, transparent 70%);
    opacity: 0;
    transition: opacity 0.4s ease;
}

.sous-formation-card:hover .card-glow {
    opacity: 1;
}

/* Empty State */
.empty-state {
    text-align: center;
    padding: 4rem 2rem;
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(10px);
    border-radius: 20px;
    box-shadow: var(--shadow-sm);
}

.empty-icon {
    width: 100px;
    height: 100px;
    background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
    font-size: 3rem;
    color: white;
    opacity: 0.8;
}

.empty-state h3 {
    color: var(--dark-blue);
    margin-bottom: 0.5rem;
}

.empty-state p {
    color: #666;
}

/* Footer */
.footer-modern {
    background: var(--dark-blue);
    color: white;
    padding: 4rem 0 2rem;
    margin-top: 5rem;
    position: relative;
    overflow: hidden;
}

.footer-gradient {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 5px;
    background: linear-gradient(90deg, var(--primary-blue) 0%, var(--primary-blue) 100%);
}

.footer-brand {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    margin-bottom: 1rem;
}

.footer-brand i {
    font-size: 2rem;
    color: var(--primary-orange);
}

.footer-description {
    color: rgba(255, 255, 255, 0.7);
    margin-bottom: 1.5rem;
}

.social-links {
    display: flex;
    gap: 1rem;
}

.social-links a {
    width: 40px;
    height: 40px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    text-decoration: none;
    transition: all 0.3s ease;
}

.social-links a:hover {
    background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
    transform: translateY(-3px);
}

.footer-heading {
    font-weight: 700;
    margin-bottom: 1rem;
    color: white;
}

.footer-links {
    list-style: none;
    padding: 0;
}

.footer-links li {
    margin-bottom: 0.5rem;
}

.footer-links a {
    color: rgba(255, 255, 255, 0.7);
    text-decoration: none;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.footer-links a:hover {
    color: var(--primary-orange);
    transform: translateX(5px);
}

.footer-contact {
    list-style: none;
    padding: 0;
}

.footer-contact li {
    color: rgba(255, 255, 255, 0.7);
    margin-bottom: 0.75rem;
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.footer-contact i {
    color: var(--primary-orange);
    width: 20px;
}

.footer-divider {
    border-color: rgba(255, 255, 255, 0.1);
    margin: 2rem 0;
}

.footer-bottom {
    text-align: center;
    color: rgba(255, 255, 255, 0.5);
}

/* Animations */
@keyframes slideInDown {
    from {
        opacity: 0;
        transform: translateY(-30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes slideInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Responsive */
@media (max-width: 768px) {
    .formation-title {
        font-size: 2rem;
    }

    .section-title {
        font-size: 1.5rem;
        flex-direction: column;
        gap: 0.5rem;
    }

    .navbar-brand {
        font-size: 1.25rem;
    }

    .floating-icon {
        width: 60px;
        height: 60px;
        font-size: 2rem;
    }

    .gradient-orb {
        filter: blur(60px);
    }

    .orb-1 {
        width: 300px;
        height: 300px;
    }

    .orb-2 {
        width: 250px;
        height: 250px;
    }

    .orb-3 {
        width: 200px;
        height: 200px;
    }
}

@media (max-width: 576px) {
    .formation-header {
        padding: 2rem 1rem;
    }

    .sous-formation-card {
        padding: 1.5rem;
    }

    .card-number {
        font-size: 2rem;
    }
}


        :root {
            --primary-blue: #0066FF;
            --secondary-blue: #0047AB;
            --dark-blue: #001F3F;
            --light-blue: #4DA3FF;
            --very-light-blue: #E8F4FF;
            --primary-orange: #FF6B35;
            --secondary-orange: #FF8C42;
            --dark-orange: #E55A1F;
            --light-orange: #FFBB99;
            --very-light-orange: #FFF0E6;
            --shadow-sm: 0 2px 10px rgba(0, 102, 255, 0.1);
            --shadow-md: 0 8px 30px rgba(0, 102, 255, 0.15);
            --shadow-lg: 0 15px 50px rgba(0, 102, 255, 0.2);
        }
        /* ... (copiez la totalité du <style> que vous m’avez fourni) ... */
    </style>
</head>
<body>
    <!-- Animated Background -->
    <div class="animated-bg">
        <div class="gradient-orb orb-1"></div>
        <div class="gradient-orb orb-2"></div>
        <div class="gradient-orb orb-3"></div>
    </div>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-glass">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('home') }}">
                <i class="fas fa-graduation-cap me-2"></i>MonProfChezMoi
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}"><i class="fas fa-home"></i>Accueil</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('formations.index') }}"><i class="fas fa-layer-group"></i>Catalogue</a></li>
                    <li class="nav-item"><a class="nav-link " href="{{ route('cours.eligibleFdfp') }}"><i class="fas fa-money-bill-wave"></i>FDFP</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('client.formation.create') }}"><i class="fas fa-layer-group"></i>Formation sur-mesure</a></li>
                    <li class="nav-item"><a class="nav-link active" href="{{ route('cours.certifiants') }}"><i class="fas fa-layer-group"></i>Certifications</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}"><i class="fas fa-layer-group"></i>Nous Contacter</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- CONTENU PRINCIPAL -->
    <div class="container py-5 content-wrapper">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-5">
            <ol class="breadcrumb-modern">
                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i> Accueil</a></li>
                <li class="breadcrumb-item"><a href="{{ route('formations.index') }}"><i class="fas fa-book"></i> Formations</a></li>
                <li class="breadcrumb-item active">formations certifiants</li>
            </ol>
        </nav>

        <!-- HERO SECTION -->
        <div class="formation-header card-glass mb-5">
            <div class="floating-icon"><i class="fas fa-certificate"></i></div>
            <h1 class="formation-title">Formations Certifiantes</h1>
            <p class="formation-description">Tous les cours ci-dessous vous délivrent un certificat officiel à la fin du parcours.</p>
            <div class="header-decoration"></div>
        </div>

        <!-- SECTION COURS CERTIFIANTS -->
        <div class="section-title-wrapper mb-4">
            <h2 class="section-title">
                <span class="title-icon"><i class="fas fa-certificate"></i></span>
                Nos Formations certifiantes
                <span class="title-count">{{ $cours->count() }}</span>
            </h2>
            <div class="section-underline"></div>
        </div>

        @if($cours->isEmpty())
            <div class="empty-state">
                <div class="empty-icon"><i class="fas fa-certificate"></i></div>
                <h3>Aucune Formation certifiante pour le moment</h3>
                <p>Revenez bientôt : de nouvelles certifications seront ajoutées.</p>
            </div>
        @else
            <div class="row g-4">
                @foreach($cours as $index => $coursItem)
                    <div class="col-12 col-md-6 col-lg-4">
                        <a href="{{ route('cours.show', $coursItem) }}" class="sous-formation-card" data-index="{{ $index }}">
                            <div class="card-number">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</div>
                            <div class="card-icon"><i class="fas fa-award"></i></div>
                            <h3 class="card-title">{{ $coursItem->titre }}</h3>
                            <div class="certifiante-badge">
                                <i class="fas fa-certificate"></i> Certification
                            </div>
                            <div class="card-arrow"><i class="fas fa-arrow-right"></i></div>
                            <div class="card-glow"></div>
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <!-- FOOTER -->
    <footer class="footer-modern">
        <div class="footer-gradient"></div>
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="footer-brand">
                        <i class="fas fa-graduation-cap"></i>
                        <h5 class="fw-bold">MonProfChezMoi</h5>
                    </div>
                    <p class="footer-description">Votre partenaire pour la formation professionnelle en entreprise.</p>
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
                        <li><a href="{{ route('formations.index') }}"><i class="fas fa-chevron-right"></i> Formations</a></li>
                        <li><a href="{{ route('cours.certifiants') }}"><i class="fas fa-chevron-right"></i> Cours certifiants</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Support</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h6 class="footer-heading">Contact</h6>
                    <ul class="footer-contact">
                        <li><i class="fas fa-phone"></i> +225 07 10 00 05 88</li>
                        <li><i class="fas fa-envelope"></i> formation@monprofchezmoi-ci.com</li>
                        <li><i class="fas fa-map-marker-alt"></i> Riviera 4 Synacassi 1</li>
                    </ul>
                </div>
            </div>
            <hr class="footer-divider">
            <div class="footer-bottom">
                <p>&copy; {{ date('Y') }} MonProfChezMoi. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>