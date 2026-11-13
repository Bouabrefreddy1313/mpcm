<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{  'MonProfChezMoi' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<style>
:root {
    --primary-blue: #2563EB;
    --dark-blue: #1E40AF;
    --light-blue: #DBEAFE;
    --pale-blue: #EFF6FF;
    --primary-orange: #F97316;
    --dark-orange: #EA580C;
    --light-orange: #FED7AA;
    --pale-orange: #FFF7ED;
    --text-dark: #1F2937;
    --text-gray: #6B7280;
    --bg-light: #F9FAFB;
    --white: #FFFFFF;
    --border-color: #E5E7EB;
    --success-green: #10B981;
    --header-h: 66px; /* mis à jour en JS */
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

/* ===== NAVBAR CORRIGÉE ET ALIGNÉE ===== */
.navbar {
    background: var(--white);
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
    padding: 0.5rem 0;
    position: sticky;
    top: 0;
    z-index: 1000;
    transition: box-shadow 0.3s ease;
}

.navbar.scrolled {
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
}

.logo-img {
    height: 50px;
    width: auto;
    border-radius: 8px;
    transition: transform 0.3s ease;
}

.logo-img:hover {
    transform: scale(1.05);
}

/* Container de la navbar pour centrer le contenu */
.navbar .container {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

/* Toggler button centré verticalement */
.navbar-toggler {
    border: none;
    padding: 0.5rem;
    display: flex;
    align-items: center;
    justify-content: center;
}

.navbar-toggler:focus {
    box-shadow: none;
    outline: none;
}

/* Menu de navigation aligné */
.navbar-nav {
    display: flex;
    align-items: center;
    gap: 0.25rem;
}

.nav-item {
    display: flex;
    align-items: center;
}

.nav-link {
    color: var(--text-gray) !important;
    font-weight: 500;
    padding: 0.5rem 0.75rem !important;
    margin: 0 0.15rem;
    border-radius: 8px;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 0.4rem;
    white-space: nowrap;
    font-size: 0.9rem;
    line-height: 1.4;
}

.nav-link i {
    font-size: 0.85rem;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 16px;
    text-align: center;
}

.nav-link:hover {
    color: var(--primary-blue) !important;
    background: var(--light-blue);
}

.nav-link.active {
    color: var(--white) !important;
    background: var(--primary-blue);
}

/* ===== MÉGA-MENU « NOS FORMATIONS » ===== */
button.nav-link {
    background: transparent;
    border: 0;
    font-family: inherit;
    cursor: pointer;
}

.nav-link .mega-chevron {
    font-size: 0.65rem;
    width: auto;
    margin-left: 0.1rem;
    transition: transform 0.25s ease;
}

.nav-link[aria-expanded="true"] {
    color: var(--primary-blue) !important;
    background: var(--light-blue);
}

.nav-link[aria-expanded="true"] .mega-chevron {
    transform: rotate(180deg);
}

.nav-link:focus-visible,
.mega-links a:focus-visible,
.mega-close:focus-visible {
    outline: 2px solid var(--primary-orange);
    outline-offset: 2px;
}

.mega-overlay {
    position: fixed;
    left: 0;
    right: 0;
    bottom: 0;
    top: var(--header-h);
    background: rgba(17, 24, 39, 0.35);
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.25s ease, visibility 0.25s ease;
    z-index: 1;
}

.mega-panel {
    position: fixed;
    left: 0;
    right: 0;
    top: var(--header-h);
    max-height: calc(100vh - var(--header-h));
    overflow-y: auto;
    background: var(--white);
    border-top: 1px solid var(--border-color);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12);
    opacity: 0;
    visibility: hidden;
    transform: translateY(-8px);
    transition: opacity 0.25s ease, transform 0.25s ease, visibility 0.25s ease;
    z-index: 2;
}

.navbar.mega-open .mega-overlay {
    opacity: 1;
    visibility: visible;
}

.mega-panel.open {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

.mega-inner {
    max-width: 1320px;
    margin: 0 auto;
    padding: 1.5rem 1.5rem 2rem;
    position: relative;
}

.mega-close {
    position: absolute;
    top: 0.75rem;
    right: 1.5rem;
    width: 40px;
    height: 40px;
    border: 0;
    border-radius: 50%;
    background: var(--bg-light);
    color: var(--text-dark);
    font-size: 1.1rem;
    cursor: pointer;
    transition: background 0.2s ease, color 0.2s ease;
    display: flex;
    align-items: center;
    justify-content: center;
}

.mega-close:hover {
    background: var(--primary-orange);
    color: var(--white);
}

.mega-head {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 1rem;
    padding: 0 3.5rem 1rem 0;
    margin-bottom: 0.5rem;
}

.mega-head h2 {
    font-size: 1.25rem;
    font-weight: 800;
    color: var(--text-dark);
    margin: 0;
}

.mega-all {
    color: var(--primary-orange);
    font-weight: 600;
    text-decoration: none;
    font-size: 0.95rem;
    display: inline-flex;
    align-items: center;
    gap: 0.4rem;
}

.mega-all:hover {
    color: var(--dark-orange);
}

.mega-row {
    display: grid;
    grid-template-columns: 260px 1fr;
    gap: 0;
    padding: 1.1rem 1rem;
    border-radius: 14px;
}

.mega-row:nth-child(even) {
    background: var(--pale-blue);
}

.mega-domain {
    font-size: 0.95rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.3px;
    color: var(--dark-blue);
    padding: 0.25rem 1rem 0.25rem 0;
    line-height: 1.4;
}

.mega-links {
    list-style: none;
    margin: 0;
    padding: 0 0 0 1.5rem;
    border-left: 2px solid var(--primary-orange);
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 0.15rem 1.5rem;
}

.mega-links a {
    display: block;
    padding: 0.4rem 0.6rem;
    border-radius: 8px;
    color: var(--text-dark);
    text-decoration: none;
    font-size: 0.95rem;
    line-height: 1.4;
    transition: background 0.2s ease, color 0.2s ease;
}

.mega-links a:hover {
    background: var(--light-blue);
    color: var(--primary-blue);
}

.mega-empty {
    padding: 2rem 0;
    color: var(--text-gray);
    text-align: center;
}

body.mega-lock {
    overflow: hidden;
}

/* ===== RESPONSIVE ===== */
@media (max-width: 1199px) {
    .navbar-collapse {
        background: var(--white);
        padding: 1rem 0;
        border-radius: 0 0 12px 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    }

    .navbar-nav {
        gap: 0.15rem;
    }

    .nav-link {
        padding: 0.6rem 1rem !important;
        font-size: 0.95rem;
    }

    /* Méga-menu en accordéon dans le menu mobile */
    .navbar-nav .nav-item.has-mega {
        flex-direction: column;
        align-items: stretch;
        width: 100%;
    }

    .mega-overlay {
        display: none;
    }

    .mega-panel {
        position: static;
        max-height: none;
        overflow: visible;
        box-shadow: none;
        border-top: 0;
        transform: none;
        opacity: 1;
        visibility: visible;
        display: none;
        transition: none;
    }

    .mega-panel.open {
        display: block;
    }

    .mega-inner {
        padding: 0.5rem 0.5rem 1rem;
    }

    .mega-close {
        display: none;
    }

    .mega-head {
        padding-right: 0;
    }

    .mega-head h2 {
        display: none;
    }

    .mega-row {
        grid-template-columns: 1fr;
        padding: 0.75rem;
    }

    .mega-domain {
        padding: 0 0 0.5rem;
        font-size: 0.85rem;
    }

    .mega-links {
        grid-template-columns: repeat(2, minmax(0, 1fr));
        padding-left: 1rem;
    }

    body.mega-lock {
        overflow: auto;
    }
}

@media (max-width: 576px) {
    .logo-img {
        height: 40px;
    }

    .nav-link {
        font-size: 0.9rem;
        padding: 0.5rem 0.75rem !important;
    }

    .nav-link i {
        width: 20px;
    }

    .mega-links {
        grid-template-columns: 1fr;
    }
}

/* Hero Section */
.hero-section {
    position: relative;
    padding: 5rem 0;
    overflow: hidden;
    background: var(--primary-blue);
}

.hero-background {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg width=\"100\" height=\"100\" xmlns=\"http://www.w3.org/2000/svg\"><circle cx=\"50\" cy=\"50\" r=\"2\" fill=\"white\" opacity=\"0.1\"/></svg>');
    opacity: 0.3;
}

.hero-content {
    position: relative;
    z-index: 1;
    animation: fadeInLeft 0.8s ease;
}

@keyframes fadeInLeft {
    from { opacity: 0; transform: translateX(-50px); }
    to { opacity: 1; transform: translateX(0); }
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
    color: var(--white);
}

.hero-title {
    font-size: 3.5rem;
    font-weight: 800;
    color: var(--white);
    margin-bottom: 1.5rem;
    line-height: 1.2;
}

.hero-subtitle {
    font-size: 1.2rem;
    color: rgba(255, 255, 255, 0.95);
    margin-bottom: 2.5rem;
    line-height: 1.7;
}

.hero-buttons {
    display: flex;
    gap: 1rem;
    margin-bottom: 3rem;
    flex-wrap: wrap;
}

.btn-hero {
    padding: 1rem 2rem;
    border-radius: 10px;
    font-weight: 600;
    font-size: 1.05rem;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.6rem;
    transition: all 0.3s ease;
}

.btn-hero.primary {
    background: var(--primary-orange);
    color: var(--white);
}

.btn-hero.primary:hover {
    background: var(--dark-orange);
    transform: translateY(-3px);
    box-shadow: 0 10px 30px rgba(249, 115, 22, 0.3);
}

.btn-hero.secondary {
    background: rgba(255, 255, 255, 0.15);
    color: var(--white);
    border: 2px solid var(--white);
    backdrop-filter: blur(10px);
}

.btn-hero.secondary:hover {
    background: var(--white);
    color: var(--primary-blue);
    transform: translateY(-3px);
}

/* Hero Stats */
.hero-stats {
    display: flex;
    gap: 2rem;
    align-items: center;
    flex-wrap: wrap;
}

.stat-item {
    display: flex;
    flex-direction: column;
    color: var(--white);
}

.stat-number {
    font-size: 2rem;
    font-weight: 800;
    line-height: 1;
}

.stat-label {
    font-size: 0.9rem;
    opacity: 0.9;
}

.stat-divider {
    width: 1px;
    height: 40px;
    background: rgba(255, 255, 255, 0.3);
}

/* Hero Image */
.hero-image-container {
    position: relative;
    z-index: 1;
    animation: fadeInRight 0.8s ease;
}

@keyframes fadeInRight {
    from { opacity: 0; transform: translateX(50px); }
    to { opacity: 1; transform: translateX(0); }
}

.hero-image-wrapper {
    position: relative;
}

.hero-image {
    width: 100%;
    border-radius: 20px;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
}

.floating-card {
    position: absolute;
    background: var(--white);
    padding: 1.25rem 1.5rem;
    border-radius: 12px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    display: flex;
    align-items: center;
    gap: 1rem;
    animation: float 3s ease-in-out infinite;
}

@keyframes float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-15px); }
}

.floating-card.card-1 {
    bottom: 20%;
    left: -10%;
    animation-delay: 0s;
}

.floating-card.card-2 {
    top: 20%;
    right: -10%;
    animation-delay: 1.5s;
}

.floating-card i {
    font-size: 2rem;
    color: var(--primary-orange);
}

.card-number {
    font-size: 1.5rem;
    font-weight: 800;
    color: var(--primary-blue);
    line-height: 1;
}

.card-label {
    font-size: 0.85rem;
    color: var(--text-gray);
}

/* Section Headers */
.section-header {
    text-align: center;
    margin-bottom: 4rem;
}

.section-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: var(--light-blue);
    color: var(--primary-blue);
    padding: 0.5rem 1.25rem;
    border-radius: 50px;
    font-weight: 600;
    font-size: 0.9rem;
    margin-bottom: 1rem;
}

.section-title {
    font-size: 2.5rem;
    font-weight: 800;
    color: var(--text-dark);
    margin-bottom: 1rem;
}

.section-subtitle {
    font-size: 1.15rem;
    color: var(--text-gray);
    max-width: 700px;
    margin: 0 auto;
}

/* Bons Section */
.bons-section {
    padding: 5rem 0;
    background: var(--white);
}

.bons-card {
    background: var(--white);
    border: 2px solid var(--border-color);
    border-radius: 16px;
    overflow: hidden;
    transition: all 0.4s ease;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.bons-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
    border-color: var(--primary-blue);
}

.bons-card.featured {
    border-color: var(--primary-orange);
    box-shadow: 0 12px 40px rgba(249, 115, 22, 0.15);
}

.featured-badge {
    position: absolute;
    top: -15px;
    right: 20px;
    background: var(--primary-orange);
    color: var(--white);
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 0.4rem;
}

.bons-icon {
    width: 70px;
    height: 70px;
    background: var(--primary-blue);
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--white);
    font-size: 2rem;
    margin-bottom: 1.5rem;
}

.bons-card.featured .bons-icon {
    background: var(--primary-orange);
}

.bons-title {
    font-size: 1.4rem;
    font-weight: 700;
    color: var(--text-dark);
    margin-bottom: 1rem;
}

.bons-description {
    color: var(--text-gray);
    margin-bottom: 1.5rem;
    line-height: 1.7;
}

.bons-features {
    list-style: none;
    padding: 0;
    margin: 0;
}

.bons-features li {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    margin-bottom: 0.75rem;
    color: var(--text-dark);
    font-weight: 500;
}

.bons-features i {
    color: var(--success-green);
    font-size: 1.1rem;
}

/* Bons CTA */
.bons-cta {
    background: var(--primary-orange);
    border-radius: 16px;
    padding: 2.5rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 2rem;
    flex-wrap: wrap;
}

.bons-cta-content {
    display: flex;
    align-items: center;
    gap: 1.5rem;
    color: var(--white);
}

.bons-cta-icon {
    width: 70px;
    height: 70px;
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(10px);
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2rem;
}

.bons-cta-text h3 {
    font-size: 1.6rem;
    font-weight: 700;
    margin-bottom: 0.25rem;
}

.bons-cta-text p {
    margin: 0;
    opacity: 0.95;
}

.btn-cta-bons {
    padding: 1rem 2rem;
    background: var(--white);
    color: var(--primary-orange);
    border-radius: 10px;
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.6rem;
    transition: all 0.3s ease;
}

.btn-cta-bons:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
}

/* Custom Formation Section */
.custom-formation-section {
    padding: 5rem 0;
    background: var(--bg-light);
}

.custom-image-wrapper {
    position: relative;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
}

.custom-image {
    width: 100%;
    display: block;
}

.custom-overlay {
    position: absolute;
    bottom: 2rem;
    left: 2rem;
}

.custom-stat {
    background: var(--white);
    padding: 1rem 1.5rem;
    border-radius: 12px;
    display: flex;
    align-items: center;
    gap: 0.75rem;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
}

.custom-stat i {
    font-size: 1.8rem;
    color: var(--primary-orange);
}

.custom-stat span {
    font-weight: 700;
    color: var(--text-dark);
    font-size: 1.1rem;
}

.custom-content {
    padding: 2rem 0;
}

.custom-steps {
    margin: 2.5rem 0;
}

.custom-step {
    display: flex;
    gap: 1.5rem;
    margin-bottom: 2rem;
}

.step-number {
    width: 50px;
    height: 50px;
    background: var(--primary-blue);
    color: var(--white);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.4rem;
    font-weight: 800;
    flex-shrink: 0;
}

.custom-step:nth-child(even) .step-number {
    background: var(--primary-orange);
}

.step-content h4 {
    font-size: 1.2rem;
    font-weight: 700;
    color: var(--text-dark);
    margin-bottom: 0.5rem;
}

.step-content p {
    color: var(--text-gray);
    margin: 0;
}

.custom-benefits {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1rem;
    margin: 2rem 0;
}

.benefit-item {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    font-weight: 500;
    color: var(--text-dark);
}

.benefit-item i {
    color: var(--success-green);
    font-size: 1.2rem;
}

.btn-custom-formation {
    padding: 1rem 2rem;
    background: var(--primary-blue);
    color: var(--white);
    border-radius: 10px;
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.6rem;
    transition: all 0.3s ease;
}

.btn-custom-formation:hover {
    background: var(--dark-blue);
    transform: translateY(-3px);
    box-shadow: 0 10px 30px rgba(37, 99, 235, 0.3);
    color: var(--white);
}

/* About Section */
.about-section {
    padding: 5rem 0;
    background: var(--white);
}

.feature-card {
    text-align: center;
    padding: 2rem;
    border-radius: 16px;
    transition: all 0.3s ease;
}

.feature-card:hover {
    background: var(--bg-light);
    transform: translateY(-5px);
}

.feature-icon {
    width: 80px;
    height: 80px;
    background: var(--primary-blue);
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
    color: var(--white);
    font-size: 2.5rem;
}

.feature-card:nth-child(even) .feature-icon {
    background: var(--primary-orange);
}

.feature-card h4 {
    font-size: 1.3rem;
    font-weight: 700;
    color: var(--text-dark);
    margin-bottom: 1rem;
}

.feature-card p {
    color: var(--text-gray);
    line-height: 1.7;
}

/* Formations Section */
.formations-section {
    padding: 5rem 0;
    background: var(--bg-light);
}

.formation-card-home {
    background: var(--white);
    border-radius: 16px;
    overflow: hidden;
    border: 1px solid var(--border-color);
    transition: all 0.4s ease;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.formation-card-home:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 40px rgba(37, 99, 235, 0.15);
    border-color: var(--primary-blue);
}

.formation-image {
    position: relative;
    height: 220px;
    overflow: hidden;
}

.formation-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s ease;
}

.formation-card-home:hover .formation-image img {
    transform: scale(1.1);
}

.formation-badge {
    position: absolute;
    top: 1rem;
    right: 1rem;
    background: var(--white);
    color: var(--primary-blue);
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 0.4rem;
}

.formation-content {
    padding: 1.5rem;
    flex: 1;
    display: flex;
    flex-direction: column;
}

.formation-title {
    font-size: 1.2rem;
    font-weight: 700;
    color: var(--text-dark);
    margin-bottom: 0.75rem;
}

.formation-description {
    color: var(--text-gray);
    margin-bottom: 1.5rem;
    flex: 1;
}

.btn-formation {
    padding: 0.75rem 1.5rem;
    background: var(--light-blue);
    color: var(--primary-blue);
    border-radius: 10px;
    font-weight: 600;
    text-decoration: none;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
}

.btn-formation:hover {
    background: var(--primary-blue);
    color: var(--white);
}

.btn-view-all {
    padding: 1rem 2.5rem;
    background: var(--primary-orange);
    color: var(--white);
    border-radius: 10px;
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.6rem;
    transition: all 0.3s ease;
}

.btn-view-all:hover {
    background: var(--dark-orange);
    transform: translateY(-3px);
    box-shadow: 0 10px 30px rgba(249, 115, 22, 0.3);
    color: var(--white);
}

/* CTA Section */
.cta-section {
    padding: 5rem 0;
    position: relative;
    overflow: hidden;
    background: var(--primary-blue);
}

.cta-background {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg width=\"100\" height=\"100\" xmlns=\"http://www.w3.org/2000/svg\"><circle cx=\"50\" cy=\"50\" r=\"2\" fill=\"white\" opacity=\"0.1\"/></svg>');
    opacity: 0.3;
}

.cta-content {
    position: relative;
    z-index: 1;
    text-align: center;
    color: var(--white);
}

.cta-title {
    font-size: 2.5rem;
    font-weight: 800;
    margin-bottom: 1rem;
}

.cta-subtitle {
    font-size: 1.2rem;
    opacity: 0.95;
    margin-bottom: 2.5rem;
}

.cta-buttons {
    display: flex;
    gap: 1rem;
    justify-content: center;
    flex-wrap: wrap;
}

.btn-cta {
    padding: 1rem 2rem;
    border-radius: 10px;
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.6rem;
    transition: all 0.3s ease;
}

.btn-cta.primary {
    background: var(--primary-orange);
    color: var(--white);
}

.btn-cta.primary:hover {
    background: var(--dark-orange);
    transform: translateY(-3px);
    box-shadow: 0 10px 30px rgba(249, 115, 22, 0.3);
}

.btn-cta.secondary {
    background: rgba(255, 255, 255, 0.15);
    color: var(--white);
    border: 2px solid var(--white);
    backdrop-filter: blur(10px);
}

.btn-cta.secondary:hover {
    background: var(--white);
    color: var(--primary-blue);
    transform: translateY(-3px);
}

/* Footer */
.footer {
    background: var(--white);
    padding: 3rem 0 1.5rem;
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
    font-size: 1.2rem;
    font-weight: 700;
    color: var(--text-dark);
}

.footer-text {
    color: var(--text-gray);
    margin-bottom: 1.5rem;
    line-height: 1.6;
}

.social-links {
    display: flex;
    gap: 0.75rem;
}

.social-links a {
    width: 40px;
    height: 40px;
    background: var(--bg-light);
    color: var(--text-dark);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    transition: all 0.3s ease;
    font-size: 1rem;
}

.social-links a:hover {
    background: var(--primary-blue);
    color: var(--white);
}

.footer-heading {
    font-size: 0.95rem;
    font-weight: 700;
    color: var(--text-dark);
    margin-bottom: 1rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.footer-links {
    list-style: none;
    padding: 0;
    margin: 0;
}

.footer-links li {
    margin-bottom: 0.75rem;
}

.footer-links a {
    color: var(--text-gray);
    text-decoration: none;
    transition: color 0.3s ease;
}

.footer-links a:hover {
    color: var(--primary-blue);
}

.footer-contact {
    list-style: none;
    padding: 0;
    margin: 0;
}

.footer-contact li {
    margin-bottom: 0.75rem;
    color: var(--text-gray);
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.footer-contact i {
    color: var(--primary-blue);
    width: 20px;
}

.footer-divider {
    margin: 2rem 0;
    border: none;
    border-top: 1px solid var(--border-color);
}

.footer-bottom {
    text-align: center;
    padding-top: 1.5rem;
    color: var(--text-gray);
    font-size: 0.9rem;
}

@media (max-width: 768px) {
    .section-title {
        font-size: 2rem;
    }
}

@media (prefers-reduced-motion: reduce) {
    * {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.01ms !important;
    }
}
</style>
<body>
    @php
        // Domaines + formations pour le méga-menu (triés par nom)
        $megaDomaines = $megaDomaines ?? \App\Models\Domaine::with(['formations' => fn ($q) => $q->orderBy('nom')])
            ->orderBy('titre')
            ->get();
    @endphp

    <!-- Navigation -->
    <nav class="navbar navbar-expand-xl" id="mainNavbar">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('img/logo.png') }}" alt="MonProfChezMoi" class="logo-img">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Ouvrir le menu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                            <i class="fas fa-home"></i>Accueil
                        </a>
                    </li>

                    {{-- Nos formations : déclencheur du méga-menu --}}
                    <li class="nav-item has-mega">
                        <button type="button"
                                class="nav-link {{ request()->routeIs('formations.*') ? 'active' : '' }}"
                                id="megaToggle"
                                aria-haspopup="true"
                                aria-expanded="false"
                                aria-controls="megaPanel">
                            <i class="fas fa-layer-group"></i>Nos formations
                            <i class="fas fa-chevron-down mega-chevron" aria-hidden="true"></i>
                        </button>

                        <div class="mega-panel" id="megaPanel" role="region" aria-label="Catalogue des formations par domaine">
                            <div class="mega-inner">
                                <button type="button" class="mega-close" id="megaClose" aria-label="Fermer le menu des formations">
                                    <i class="fas fa-xmark"></i>
                                </button>

                                
                                @forelse($megaDomaines->filter(fn ($d) => $d->formations->isNotEmpty()) as $domaine)
                                    <div class="mega-row">
                                        <div class="mega-domain">{{ $domaine->titre }}</div>
                                        <ul class="mega-links">
                                            @foreach($domaine->formations as $formation)
                                                <li>
                                                    <a href="{{ route('formations.index', ['formation' => $formation->id]) }}#formation-{{ $formation->id }}">
                                                        {{ $formation->nom }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @empty
                                    <p class="mega-empty">Aucune formation disponible pour le moment.</p>
                                @endforelse
                            </div>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('client.formation.create') }}">
                            <i class="fas fa-pen-ruler"></i>Formation sur-mesure
                        </a>
                    </li>
                    <li class="nav-item">
    <a class="nav-link" href="{{ route('bons.index') }}">
        <i class="fas fa-gift"></i>Nos bons cadeaux
    </a>
</li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cours.eligibleFdfp') }}">
                            <i class="fas fa-hand-holding-dollar"></i>Financement FDFP
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('telecharger.index') }}">
                            <i class="fas fa-certificate"></i> Nos ressources
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">
                            <i class="fas fa-envelope"></i>Contact
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        {{-- Fond assombri derrière le méga-menu (desktop) --}}
        <div class="mega-overlay" id="megaOverlay" aria-hidden="true"></div>
    </nav>

    <script>
    (function () {
        var nav     = document.getElementById('mainNavbar');
        var toggle  = document.getElementById('megaToggle');
        var panel   = document.getElementById('megaPanel');
        var overlay = document.getElementById('megaOverlay');
        var closeBt = document.getElementById('megaClose');
        if (!nav || !toggle || !panel) return;

        var desktop = window.matchMedia('(min-width: 1200px)');

        function setHeaderHeight() {
            document.documentElement.style.setProperty('--header-h', nav.offsetHeight + 'px');
        }

        function openMenu() {
            setHeaderHeight();
            panel.classList.add('open');
            nav.classList.add('mega-open');
            toggle.setAttribute('aria-expanded', 'true');
            if (desktop.matches) document.body.classList.add('mega-lock');
        }

        function closeMenu(returnFocus) {
            panel.classList.remove('open');
            nav.classList.remove('mega-open');
            toggle.setAttribute('aria-expanded', 'false');
            document.body.classList.remove('mega-lock');
            if (returnFocus) toggle.focus();
        }

        toggle.addEventListener('click', function (e) {
            e.stopPropagation();
            panel.classList.contains('open') ? closeMenu(false) : openMenu();
        });

        if (closeBt) closeBt.addEventListener('click', function () { closeMenu(true); });
        if (overlay) overlay.addEventListener('click', function () { closeMenu(false); });

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && panel.classList.contains('open')) closeMenu(true);
        });

        // Clic en dehors (desktop)
        document.addEventListener('click', function (e) {
            if (desktop.matches && panel.classList.contains('open') && !panel.contains(e.target) && !toggle.contains(e.target)) {
                closeMenu(false);
            }
        });

        window.addEventListener('resize', function () {
            setHeaderHeight();
            if (panel.classList.contains('open') && !desktop.matches) {
                document.body.classList.remove('mega-lock');
            }
        });

        window.addEventListener('scroll', function () {
            nav.classList.toggle('scrolled', window.scrollY > 10);
        }, { passive: true });

        setHeaderHeight();
    })();
    </script>