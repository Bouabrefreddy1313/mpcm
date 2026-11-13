<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $sousFormation->nom }} - MonProfChezMoi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style-soft.css">
</head>
<style>
:root {
    --primary-blue: #2563EB;
    --dark-blue: #1E40AF;
    --light-blue: #DBEAFE;
    --lighter-blue: #EFF6FF;
    --primary-orange: #F97316;
    --dark-orange: #EA580C;
    --light-orange: #FFEDD5;
    --lighter-orange: #FEF3C7;
    --text-dark: #1F2937;
    --text-gray: #6B7280;
    --bg-light: #F9FAFB;
    --white: #FFFFFF;
    --border-color: #E5E7EB;
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
    background: var(--lighter-blue);
}

.nav-link.active {
    color: var(--white) !important;
    background: var(--primary-blue);
}

.navbar-toggler {
    border: none;
    padding: 0.5rem;
}

.navbar-toggler:focus {
    box-shadow: none;
}

/* Header Card */
.header-card {
    background: var(--white);
    border-radius: 16px;
    padding: 3rem 2rem;
    text-align: center;
    margin-bottom: 3rem;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
    border: 1px solid var(--border-color);
    animation: fadeIn 0.6s ease;
}

.header-icon {
    width: 70px;
    height: 70px;
    background: var(--primary-blue);
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
    color: var(--white);
    font-size: 2rem;
    animation: float 3s ease-in-out infinite;
    box-shadow: 0 4px 15px rgba(37, 99, 235, 0.2);
}

@keyframes float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
}

.header-title {
    font-size: 2.2rem;
    font-weight: 700;
    color: var(--text-dark);
    margin-bottom: 1rem;
}

.header-description {
    font-size: 1.1rem;
    color: var(--text-gray);
    max-width: 700px;
    margin: 0 auto;
    line-height: 1.7;
}

/* Section Header */
.section-header {
    margin-bottom: 2rem;
}

.section-title {
    font-size: 1.8rem;
    font-weight: 700;
    color: var(--text-dark);
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.section-title i {
    color: var(--primary-orange);
    font-size: 1.5rem;
}

/* Cours Grid */
.cours-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 1.5rem;
    margin-bottom: 3rem;
}

/* Cours Card */
.cours-card {
    background: var(--white);
    border-radius: 12px;
    padding: 1.8rem;
    text-decoration: none;
    color: inherit;
    border: 1px solid var(--border-color);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    animation: fadeInUp 0.5s ease forwards;
    opacity: 0;
}

.cours-card[data-index="0"] { animation-delay: 0.1s; }
.cours-card[data-index="1"] { animation-delay: 0.2s; }
.cours-card[data-index="2"] { animation-delay: 0.3s; }
.cours-card[data-index="3"] { animation-delay: 0.4s; }
.cours-card[data-index="4"] { animation-delay: 0.5s; }
.cours-card[data-index="5"] { animation-delay: 0.6s; }

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

.cours-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 4px;
    height: 0;
    background: var(--primary-blue);
    transition: height 0.3s ease;
}

.cours-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 28px rgba(37, 99, 235, 0.15);
    border-color: var(--primary-blue);
}

.cours-card:hover::before {
    height: 100%;
}

.cours-number {
    position: absolute;
    top: 1rem;
    right: 1rem;
    font-size: 2rem;
    font-weight: 800;
    color: var(--lighter-blue);
    transition: all 0.3s ease;
}

.cours-card:hover .cours-number {
    color: var(--primary-blue);
    transform: scale(1.1) rotate(10deg);
}

.cours-icon {
    width: 55px;
    height: 55px;
    background: var(--lighter-blue);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--primary-blue);
    font-size: 1.5rem;
    margin-bottom: 1.25rem;
    transition: all 0.3s ease;
    box-shadow: 0 2px 8px rgba(37, 99, 235, 0.1);
}

.cours-card:hover .cours-icon {
    background: var(--primary-orange);
    color: var(--white);
    transform: scale(1.1);
    box-shadow: 0 4px 12px rgba(249, 115, 22, 0.2);
}

.cours-title {
    font-size: 1.2rem;
    font-weight: 600;
    color: var(--text-dark);
    margin-bottom: 1.25rem;
    flex-grow: 1;
    transition: color 0.3s ease;
    line-height: 1.4;
}

.cours-card:hover .cours-title {
    color: var(--primary-blue);
}

.cours-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-top: 1rem;
    border-top: 1px solid var(--border-color);
}

.cours-action {
    font-size: 0.95rem;
    font-weight: 500;
    color: var(--primary-blue);
    transition: all 0.3s ease;
}

.cours-card:hover .cours-action {
    color: var(--primary-orange);
}

.cours-footer i {
    color: var(--primary-orange);
    transition: transform 0.3s ease;
    font-size: 1rem;
}

.cours-card:hover .cours-footer i {
    transform: translateX(5px);
}

/* Empty State */
.empty-state {
    grid-column: 1 / -1;
    text-align: center;
    padding: 4rem 2rem;
    background: var(--white);
    border-radius: 12px;
    border: 1px solid var(--border-color);
}

.empty-icon {
    width: 80px;
    height: 80px;
    background: var(--lighter-blue);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
    color: var(--primary-blue);
    font-size: 2.5rem;
}

.empty-state h3 {
    color: var(--text-dark);
    font-size: 1.5rem;
    margin-bottom: 0.5rem;
}

.empty-state p {
    color: var(--text-gray);
    font-size: 1rem;
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
    margin-bottom: 0;
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

/* Responsive */
@media (max-width: 768px) {
    .header-card {
        padding: 2rem 1.5rem;
    }

    .header-title {
        font-size: 1.8rem;
    }

    .section-title {
        font-size: 1.5rem;
    }

    .cours-grid {
        grid-template-columns: 1fr;
    }

    .nav-link i {
        display: none;
    }
}

@media (max-width: 576px) {
    .header-icon {
        width: 60px;
        height: 60px;
        font-size: 1.6rem;
    }

    .cours-card {
        padding: 1.5rem;
    }

    .cours-number {
        font-size: 1.5rem;
    }
}

</style>
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
                            <i class="fas fa-layer-group"></i>Catalogue
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('client.formation.create') }}">
                            <i class="fas fa-layer-group"></i>Formation sur-mesure
                        </a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link" href="/sous-formations/1/eligible-cours">
                            <i class="fas fa-layer-group"></i>Financement FDFP
                        </a>
                    </li>
                    
                     <li class="nav-item">
                        <a class="nav-link" href="">
                            <i class="fas fa-layer-group"></i>Monprofchezmoi Pro
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        <!-- Header Section -->
        <div class="header-card">
            <div class="header-icon">
                <i class="fas fa-layer-group"></i>
            </div>
            <h1 class="header-title">{{ $sousFormation->nom }}</h1>
            <p class="header-description">{{ $sousFormation->description }}</p>
        </div>

        <!-- Cours Section -->
        <div class="section-header">
            <h2 class="section-title">
                <i class="fas fa-book-reader"></i>
                Formations disponibles
            </h2>
        </div>

        <div class="cours-grid">
            @if($sousFormation->cours->isNotEmpty())
                @foreach($sousFormation->cours as $index => $cours)
                    <a href="{{ route('cours.show', $cours->id) }}" class="cours-card" data-index="{{ $index }}">
                        <div class="cours-number">{{ $index + 1 }}</div>
                        <div class="cours-icon">
                            <i class="fas fa-play-circle"></i>
                        </div>
                        <h3 class="cours-title">{{ $cours->titre }}</h3>
                        <div class="cours-footer">
                            <span class="cours-action">Commencer</span>
                            <i class="fas fa-arrow-right"></i>
                        </div>
                    </a>
                @endforeach
            @else
                <div class="empty-state">
                    <div class="empty-icon">
                        <i class="fas fa-book-open"></i>
                    </div>
                    <h3>Aucune formation disponible</h3>
                    <p>Les cours seront bientôt ajoutés à cette sous-formation.</p>
                </div>
            @endif
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="footer-brand">
                        <i class="fas fa-graduation-cap"></i>
                        <h5>MonProfChezMoi</h5>
                    </div>
                    <p class="footer-text">Votre partenaire pour la formation professionnelle en entreprise.</p>
                </div>
                <div class="col-md-4">
                    <h6 class="footer-heading">Services</h6>
                    <ul class="footer-links">
                        <li><a href="{{ route('formations.index') }}">Formations</a></li>
                        <li><a href="#">Conseil</a></li>
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

// Smooth scroll
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
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

// Intersection Observer for animations
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

// Observe cards
document.querySelectorAll('.cours-card').forEach(card => {
    observer.observe(card);
});

// Add subtle hover effect
document.querySelectorAll('.cours-card').forEach(card => {
    card.addEventListener('mouseenter', function() {
        this.style.transition = 'all 0.3s cubic-bezier(0.4, 0, 0.2, 1)';
    });
});

// Performance: Throttle function
function throttle(func, limit) {
    let inThrottle;
    return function() {
        const args = arguments;
        const context = this;
        if (!inThrottle) {
            func.apply(context, args);
            inThrottle = true;
            setTimeout(() => inThrottle = false, limit);
        }
    };
}

// Log
console.log('%cMonProfChezMoi', 'color: #5B8CC6; font-size: 20px; font-weight: bold;');

    </script>
</body>
</html>
