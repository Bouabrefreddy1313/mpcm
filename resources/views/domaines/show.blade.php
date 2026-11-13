<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Thématiques - MonProfChezMoi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="formations-style.css">
</head>
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
    margin-bottom: 2.5rem;
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

/* Search & Filter Bar */
.search-filter-bar {
    background: var(--white);
    border-radius: 16px;
    padding: 1.5rem;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
    position: relative;
    z-index: 1;
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
    align-items: center;
}

.search-box {
    flex: 1;
    min-width: 250px;
    position: relative;
}

.search-box i {
    position: absolute;
    left: 1.25rem;
    top: 50%;
    transform: translateY(-50%);
    color: var(--text-gray);
    font-size: 1.1rem;
}

.search-box input {
    width: 100%;
    padding: 0.9rem 1.25rem 0.9rem 3.5rem;
    border: 2px solid var(--border-color);
    border-radius: 10px;
    font-size: 1rem;
    transition: all 0.3s ease;
}

.search-box input:focus {
    outline: none;
    border-color: var(--primary-blue);
    box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
}

.filter-buttons {
    display: flex;
    gap: 0.75rem;
    flex-wrap: wrap;
}

.filter-btn {
    padding: 0.75rem 1.25rem;
    border: 2px solid var(--border-color);
    background: var(--white);
    color: var(--text-gray);
    border-radius: 10px;
    font-weight: 600;
    font-size: 0.95rem;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.filter-btn:hover {
    border-color: var(--primary-blue);
    color: var(--primary-blue);
    background: var(--very-light-blue);
}

.filter-btn.active {
    background: var(--primary-blue);
    border-color: var(--primary-blue);
    color: var(--white);
    box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
}

/* Formations Section */
.formations-section {
    padding: 4rem 0;
}

/* Stats Bar */
.stats-bar {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1.5rem;
    margin-bottom: 3rem;
}

.stat-item {
    background: var(--white);
    padding: 1.5rem;
    border-radius: 12px;
    border: 1px solid var(--border-color);
    display: flex;
    align-items: center;
    gap: 1rem;
    transition: all 0.3s ease;
}

.stat-item:hover {
    transform: translateY(-3px);
    box-shadow: 0 6px 20px rgba(37, 99, 235, 0.1);
}

.stat-item i {
    font-size: 2rem;
    color: var(--primary-orange);
}

.stat-number {
    display: block;
    font-size: 1.8rem;
    font-weight: 800;
    color: var(--primary-blue);
    line-height: 1;
}

.stat-label {
    display: block;
    font-size: 0.9rem;
    color: var(--text-gray);
    margin-top: 0.25rem;
}

/* Formations Grid */
.formations-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
    gap: 2rem;
}

/* Formation Card */
.formation-card {
    background: var(--white);
    border-radius: 16px;
    overflow: hidden;
    border: 1px solid var(--border-color);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    animation: fadeInUp 0.6s ease forwards;
    opacity: 0;
    display: flex;
    flex-direction: column;
}

.formation-card[data-index="0"] { animation-delay: 0.1s; }
.formation-card[data-index="1"] { animation-delay: 0.15s; }
.formation-card[data-index="2"] { animation-delay: 0.2s; }
.formation-card[data-index="3"] { animation-delay: 0.25s; }
.formation-card[data-index="4"] { animation-delay: 0.3s; }
.formation-card[data-index="5"] { animation-delay: 0.35s; }
.formation-card[data-index="6"] { animation-delay: 0.4s; }
.formation-card[data-index="7"] { animation-delay: 0.45s; }
.formation-card[data-index="8"] { animation-delay: 0.5s; }

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

.formation-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 40px rgba(37, 99, 235, 0.18);
    border-color: var(--primary-blue);
}

.card-header-img {
    height: 180px;
    background: linear-gradient(135deg, var(--primary-blue) 0%, var(--dark-blue) 100%);
    position: relative;
    overflow: hidden;
}

.card-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg"><circle cx="50" cy="50" r="2" fill="white" opacity="0.2"/></svg>');
    opacity: 0.4;
}

.card-badge {
    position: absolute;
    top: 1rem;
    right: 1rem;
    z-index: 1;
}

.badge {
    padding: 0.4rem 0.9rem;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 0.4rem;
}

.badge-popular {
    background: linear-gradient(135deg, var(--primary-orange) 0%, var(--dark-orange) 100%);
    color: var(--white);
}

.badge-new {
    background: var(--very-light-orange);
    color: var(--primary-orange);
}

.card-icon {
    position: absolute;
    bottom: -30px;
    left: 50%;
    transform: translateX(-50%);
    width: 70px;
    height: 70px;
    background: var(--white);
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2rem;
    color: var(--primary-blue);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    transition: all 0.3s ease;
}

.formation-card:hover .card-icon {
    transform: translateX(-50%) scale(1.1) rotateY(180deg);
    color: var(--primary-orange);
}

.card-body {
    padding: 2.5rem 1.5rem 1.5rem;
    flex: 1;
}

.card-title {
    font-size: 1.3rem;
    font-weight: 700;
    color: var(--text-dark);
    margin-bottom: 0.75rem;
    line-height: 1.3;
    transition: color 0.3s ease;
}

.formation-card:hover .card-title {
    color: var(--primary-blue);
}

.card-description {
    font-size: 0.95rem;
    color: var(--text-gray);
    line-height: 1.6;
    margin-bottom: 1.25rem;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.card-meta {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
}

.meta-item {
    display: flex;
    align-items: center;
    gap: 0.4rem;
    font-size: 0.85rem;
    color: var(--text-gray);
    font-weight: 500;
}

.meta-item i {
    color: var(--primary-orange);
    font-size: 0.9rem;
}

.card-footer {
    padding: 0 1.5rem 1.5rem;
}

.btn-card {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    width: 100%;
    padding: 0.9rem;
    background: var(--very-light-blue);
    color: var(--primary-blue);
    border: 2px solid transparent;
    border-radius: 10px;
    font-weight: 600;
    font-size: 1rem;
    text-decoration: none;
    transition: all 0.3s ease;
}

.btn-card:hover {
    background: var(--primary-blue);
    color: var(--white);
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(37, 99, 235, 0.3);
}

.btn-card i {
    transition: transform 0.3s ease;
}

.btn-card:hover i {
    transform: translateX(5px);
}

/* Empty State */
.empty-state,
.no-results {
    text-align: center;
    padding: 4rem 2rem;
    background: var(--white);
    border-radius: 16px;
    border: 1px solid var(--border-color);
}

.empty-icon {
    width: 90px;
    height: 90px;
    background: var(--very-light-blue);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
    color: var(--primary-blue);
    font-size: 3rem;
}

.empty-state h3,
.no-results h3 {
    color: var(--text-dark);
    font-size: 1.6rem;
    margin-bottom: 0.5rem;
}

.empty-state p,
.no-results p {
    color: var(--text-gray);
    font-size: 1.05rem;
}

/* CTA Section */
.cta-section {
    padding: 4rem 0;
    margin-top: 3rem;
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

/* Hidden class for filtering */
.hidden {
    display: none !important;
}

/* Responsive */
@media (max-width: 768px) {
    .hero-title {
        font-size: 2rem;
    }

    .hero-subtitle {
        font-size: 1rem;
    }

    .search-filter-bar {
        flex-direction: column;
    }

    .search-box {
        width: 100%;
    }

    .filter-buttons {
        width: 100%;
        justify-content: center;
    }

    .formations-grid {
        grid-template-columns: 1fr;
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

    .stats-bar {
        grid-template-columns: 1fr;
    }

    .card-icon {
        width: 60px;
        height: 60px;
        font-size: 1.6rem;
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
                        <a class="nav-link active" href="{{ route('formations.index') }}">
                            <i class="fas fa-book"></i>Catalogue
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

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <div class="hero-badge">
                    <i class="fas fa-book"></i>
                    <span>Catalogue de Thématiques</span>
                </div>
                <h1 class="hero-title">Formations dans le domaine : {{ $domaine->titre }}</h1>
                <p class="hero-subtitle">Des programmes sur mesure pour développer vos compétences et celles de vos équipes</p>
            </div>
            
            <!-- Search & Filter Bar -->
            <div class="search-filter-bar">
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" id="searchInput" placeholder="Rechercher une formation...">
                </div>
                <div class="filter-buttons">
                    <button class="filter-btn active" data-filter="all">
                        <i class="fas fa-th"></i>
                        Toutes
                    </button>
                    <button class="filter-btn" data-filter="populaire">
                        <i class="fas fa-fire"></i>
                        Populaires
                    </button>
                    <button class="filter-btn" data-filter="nouveau">
                        <i class="fas fa-star"></i>
                        Nouveautés
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Formations Grid -->
    <section class="formations-section">
        <div class="container">
            <!-- Stats Bar -->
            <div class="stats-bar">
                <div class="stat-item">
                    <i class="fas fa-book-open"></i>
                    <div>
                        <span class="stat-number"></span>
                        <span class="stat-label">Formations disponibles</span>
                    </div>
                </div>
                <div class="stat-item">
                    <i class="fas fa-users"></i>
                    <div>
                        <span class="stat-number">500+</span>
                        <span class="stat-label">Entreprises formées</span>
                    </div>
                </div>
                <div class="stat-item">
                    <i class="fas fa-award"></i>
                    <div>
                        <span class="stat-number">95%</span>
                        <span class="stat-label">Taux de satisfaction</span>
                    </div>
                </div>
            </div>

            <!-- Formations Grid -->
            <div class="formations-grid" id="formationsGrid">
                 @forelse($domaine->formations as $formation)
                    <div class="formation-card" data-index="" data-category="all">
                        <div class="card-header-img">
                            <div class="card-overlay"></div>
                            <div class="card-badge">
                                
                            </div>
                            
                        </div>
                        
                        <div class="card-body">
                            <h3 class="card-title">{{ $formation->nom }}</h3>
                            <p class="card-description">{{ $formation->description }}</p>
                            
                            <div class="card-meta">
                                <div class="meta-item">
                                    <i class="fas fa-layer-group"></i>
                                    <span>{{ rand(3, 12) }} modules</span>
                                </div>
                                <div class="meta-item">
                                    <i class="fas fa-clock"></i>
                                    <span>{{ rand(10, 40) }}h</span>
                                </div>
                                <div class="meta-item">
                                    <i class="fas fa-signal"></i>
                                    <span>{{ ['Débutant', 'Intermédiaire', 'Avancé'][rand(0, 2)] }}</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card-footer">
                            <a href="{{ route('formations.show', $formation) }}" class="btn-card">
                                <span>Découvrir</span>
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

           

            <!-- No Results (Hidden by default) -->
            <div class="no-results" id="noResults" style="display: none;">
                <div class="empty-icon">
                    <i class="fas fa-search"></i>
                </div>
                <h3>Aucune formation trouvée</h3>
                <p>Essayez avec d'autres mots-clés</p>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-content">
                <h2>Besoin d'une formation sur mesure ?</h2>
                <p>Nos experts sont à votre disposition pour créer un programme adapté à vos besoins spécifiques</p>
                <div class="cta-buttons">
                    <button class="btn-cta primary">
                        <i class="fas fa-envelope"></i>
                        Nous contacter
                    </button>
                    <button class="btn-cta secondary">
                        <i class="fas fa-phone"></i>
                        +225 07 10 00 05 88
                    </button>
                </div>
            </div>
        </div>
    </section>

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

// Search functionality
const searchInput = document.getElementById('searchInput');
const formationsGrid = document.getElementById('formationsGrid');
const noResults = document.getElementById('noResults');

if (searchInput) {
    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase().trim();
        const cards = formationsGrid.querySelectorAll('.formation-card');
        let visibleCount = 0;

        cards.forEach(card => {
            const title = card.querySelector('.card-title').textContent.toLowerCase();
            const description = card.querySelector('.card-description').textContent.toLowerCase();

            if (title.includes(searchTerm) || description.includes(searchTerm)) {
                card.classList.remove('hidden');
                visibleCount++;
            } else {
                card.classList.add('hidden');
            }
        });

        // Show/hide no results message
        if (visibleCount === 0 && searchTerm !== '') {
            noResults.style.display = 'block';
            formationsGrid.style.display = 'none';
        } else {
            noResults.style.display = 'none';
            formationsGrid.style.display = 'grid';
        }
    });
}

// Filter functionality
const filterButtons = document.querySelectorAll('.filter-btn');

filterButtons.forEach(button => {
    button.addEventListener('click', function() {
        // Remove active class from all buttons
        filterButtons.forEach(btn => btn.classList.remove('active'));
        
        // Add active class to clicked button
        this.classList.add('active');

        const filter = this.getAttribute('data-filter');
        const cards = formationsGrid.querySelectorAll('.formation-card');

        cards.forEach(card => {
            if (filter === 'all') {
                card.classList.remove('hidden');
            } else if (filter === 'populaire') {
                const hasPopularBadge = card.querySelector('.badge-popular');
                if (hasPopularBadge) {
                    card.classList.remove('hidden');
                } else {
                    card.classList.add('hidden');
                }
            } else if (filter === 'nouveau') {
                const hasNewBadge = card.querySelector('.badge-new');
                if (hasNewBadge) {
                    card.classList.remove('hidden');
                } else {
                    card.classList.add('hidden');
                }
            }
        });

        // Reset search when filtering
        if (searchInput) {
            searchInput.value = '';
        }
    });
});

// CTA button handlers
const ctaPrimary = document.querySelector('.btn-cta.primary');
const ctaSecondary = document.querySelector('.btn-cta.secondary');

if (ctaPrimary) {
    ctaPrimary.addEventListener('click', function() {
        window.location.href = 'mailto:contact@monprofchezmoi.fr';
    });
}

if (ctaSecondary) {
    ctaSecondary.addEventListener('click', function() {
        window.location.href = 'tel:+33123456789';
    });
}

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

// Observe all formation cards
document.querySelectorAll('.formation-card').forEach(card => {
    observer.observe(card);
});

// Add hover effect to stats
document.querySelectorAll('.stat-item').forEach(stat => {
    stat.addEventListener('mouseenter', function() {
        this.style.transition = 'all 0.3s cubic-bezier(0.4, 0, 0.2, 1)';
    });
});

// Count animation for stats on scroll
const statsObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const statNumbers = entry.target.querySelectorAll('.stat-number');
            statNumbers.forEach(stat => {
                const finalValue = stat.textContent;
                // Simple animation - can be enhanced
                stat.style.transform = 'scale(1.1)';
                setTimeout(() => {
                    stat.style.transform = 'scale(1)';
                }, 300);
            });
            statsObserver.unobserve(entry.target);
        }
    });
}, { threshold: 0.5 });

const statsBar = document.querySelector('.stats-bar');
if (statsBar) {
    statsObserver.observe(statsBar);
}

console.log('%c✨ MonProfChezMoi - Formations ✨', 'color: #5B8CC6; font-size: 20px; font-weight: bold;');
console.log('%c' + document.querySelectorAll('.formation-card').length + ' formations disponibles', 'color: #F4A261; font-size: 14px;');

    </script>
</body>
</html>
