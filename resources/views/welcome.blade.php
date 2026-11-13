@php
use Illuminate\Support\Facades\Storage;
@endphp

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - MonProfChezMoi</title>
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
}

/* ===== RESTE DU CSS (inchangé) ===== */
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
    background: url('data:image/svg+xml,<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg"><circle cx="50" cy="50" r="2" fill="white" opacity="0.1"/></svg>');
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
    padding: 2.5rem 2rem;
    height: 100%;
    transition: all 0.4s ease;
    position: relative;
}

.bons-card:hover {
    border-color: var(--primary-blue);
    transform: translateY(-8px);
    box-shadow: 0 12px 40px rgba(37, 99, 235, 0.15);
}

.bons-card.featured {
    border-color: var(--primary-orange);
    background: var(--pale-orange);
    transform: scale(1.05);
}

.bons-card.featured:hover {
    transform: scale(1.05) translateY(-8px);
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
    background: url('data:image/svg+xml,<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg"><circle cx="50" cy="50" r="2" fill="white" opacity="0.1"/></svg>');
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
    background: var(--light-blue);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--primary-blue);
    text-decoration: none;
    transition: all 0.3s ease;
}

.social-links a:hover {
    background: var(--primary-orange);
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
}

/* Empty State */
.empty-state {
    text-align: center;
    padding: 4rem 2rem;
    color: var(--text-gray);
}

.empty-state i {
    font-size: 4rem;
    margin-bottom: 1rem;
    opacity: 0.5;
}

/* Animations */
[data-aos] {
    opacity: 0;
    transition: all 0.6s ease;
}

[data-aos].aos-animate {
    opacity: 1;
}

[data-aos="fade-up"] {
    transform: translateY(30px);
}

[data-aos="fade-up"].aos-animate {
    transform: translateY(0);
}

[data-aos="fade-right"] {
    transform: translateX(-50px);
}

[data-aos="fade-right"].aos-animate {
    transform: translateX(0);
}

[data-aos="fade-left"] {
    transform: translateX(50px);
}

[data-aos="fade-left"].aos-animate {
    transform: translateX(0);
}

/* Responsive */
@media (max-width: 991px) {
    .hero-title {
        font-size: 2.5rem;
    }

    .section-title {
        font-size: 2rem;
    }

    .cta-title {
        font-size: 2rem;
    }

    .floating-card {
        display: none;
    }

    .custom-benefits {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 768px) {
    .hero-section {
        padding: 3rem 0;
    }

    .hero-title {
        font-size: 2rem;
    }

    .hero-subtitle {
        font-size: 1rem;
    }

    .hero-buttons {
        flex-direction: column;
    }

    .btn-hero {
        width: 100%;
        justify-content: center;
    }

    .hero-stats {
        flex-direction: column;
        align-items: flex-start;
    }

    .stat-divider {
        display: none;
    }

    .section-title {
        font-size: 1.8rem;
    }

    .bons-cta {
        flex-direction: column;
        text-align: center;
    }

    .bons-cta-content {
        flex-direction: column;
        text-align: center;
    }

    .btn-cta-bons {
        width: 100%;
        justify-content: center;
    }

    .cta-buttons {
        flex-direction: column;
    }

    .btn-cta {
        width: 100%;
        justify-content: center;
    }
}

@media (max-width: 576px) {
    .logo-img {
        height: 60px;
    }

    .bons-card.featured {
        transform: scale(1);
    }

    .bons-card.featured:hover {
        transform: scale(1) translateY(-8px);
    }
}

.img-small {
    width: 800px;
    height: 500px;
}

.domaines-section {
    position: relative;
    overflow: hidden;
}

.domaines-section::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(0,123,255,0.03) 1px, transparent 1px);
    background-size: 50px 50px;
    animation: backgroundMove 20s linear infinite;
    pointer-events: none;
}

@keyframes backgroundMove {
    0% { transform: translate(0, 0); }
    100% { transform: translate(50px, 50px); }
}

.section-title {
    color: #333;
    font-weight: 700;
    font-size: 2.5rem;
    position: relative;
    display: inline-block;
    padding-bottom: 15px;
    animation: titleFadeIn 0.8s ease-out;
}

.section-title::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 80px;
    height: 4px;
    background: linear-gradient(90deg, #007bff, #00d4ff);
    border-radius: 2px;
    animation: lineExpand 0.8s ease-out 0.3s backwards;
}

@keyframes titleFadeIn {
    from { opacity: 0; transform: translateY(-20px); }
    to { opacity: 1; transform: translateY(0); }
}

@keyframes lineExpand {
    from { width: 0; }
    to { width: 80px; }
}

.domaine-card {
    background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
    border: 1px solid rgba(0,0,0,0.05);
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    cursor: pointer;
    position: relative;
    overflow: hidden;
    opacity: 0;
    animation: cardFadeIn 0.6s ease-out forwards;
}

.domaine-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(0,123,255,0.1), transparent);
    transition: left 0.6s ease;
}

.domaine-card:hover::before {
    left: 100%;
}

@keyframes cardFadeIn {
    to { opacity: 1; }
}

.col-md-3:nth-child(1) .domaine-card { animation-delay: 0.1s; }
.col-md-3:nth-child(2) .domaine-card { animation-delay: 0.2s; }
.col-md-3:nth-child(3) .domaine-card { animation-delay: 0.3s; }
.col-md-3:nth-child(4) .domaine-card { animation-delay: 0.4s; }
.col-md-3:nth-child(5) .domaine-card { animation-delay: 0.5s; }
.col-md-3:nth-child(6) .domaine-card { animation-delay: 0.6s; }

.domaine-card:hover {
    transform: translateY(-15px) scale(1.02);
    box-shadow: 0 20px 40px rgba(0,123,255,0.2);
    border-color: rgba(0,123,255,0.3);
}

.domaine-icon-wrapper {
    position: relative;
    display: inline-block;
    margin-bottom: 1rem;
}

.domaine-icon {
    position: relative;
    z-index: 2;
}

.icon-bg {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, #007bff15, #00d4ff15);
    border-radius: 50%;
    transition: all 0.4s ease;
    z-index: 1;
}

.domaine-card:hover .icon-bg {
    transform: translate(-50%, -50%) scale(1.3);
    background: linear-gradient(135deg, #007bff25, #00d4ff25);
    animation: pulse 1.5s ease-in-out infinite;
}

@keyframes pulse {
    0%, 100% { box-shadow: 0 0 0 0 rgba(0,123,255,0.4); }
    50% { box-shadow: 0 0 0 20px rgba(0,123,255,0); }
}

.domaine-icon i {
    color: #007bff;
    transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    display: inline-block;
}

.domaine-card:hover .domaine-icon i {
    color: #0056b3;
    transform: scale(1.2) rotate(10deg);
    filter: drop-shadow(0 5px 10px rgba(0,123,255,0.3));
}

.domaine-title {
    font-size: 1.3rem;
    font-weight: 700;
    margin-bottom: 12px;
    color: #2c3e50;
    transition: color 0.3s ease;
    line-height: 1.4;
}

.domaine-card:hover .domaine-title {
    color: #007bff;
}

.domaine-desc {
    font-size: 0.95rem;
    color: #666;
    min-height: 40px;
    line-height: 1.6;
    transition: color 0.3s ease;
}

.domaine-card:hover .domaine-desc {
    color: #555;
}

.btn-primary {
    font-size: 0.9rem;
    padding: 10px 24px;
    border-radius: 25px;
    font-weight: 600;
    background: linear-gradient(135deg, #007bff, #0056b3);
    border: none;
    position: relative;
    overflow: hidden;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

.btn-primary::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, #0056b3, #003d82);
    transition: left 0.3s ease;
    z-index: 0;
}

.btn-primary:hover::before {
    left: 0;
}

.btn-primary span,
.btn-primary i {
    position: relative;
    z-index: 1;
    transition: transform 0.3s ease;
}

.btn-primary:hover i {
    transform: translateX(5px);
}

.btn-primary:hover {
    transform: scale(1.05);
    box-shadow: 0 8px 20px rgba(0,123,255,0.4);
}

.btn-primary:active {
    transform: scale(0.98);
}

@media (max-width: 768px) {
    .col-md-3 { margin-bottom: 20px; }
    .section-title { font-size: 2rem; }
    .domaine-card:hover { transform: translateY(-10px) scale(1.01); }
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
   @include('partials.header', ['title' => 'Cours Éligibles FDFP - MonProfChezMoi'])




    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-background"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 hero-content">
                    <div class="hero-badge">
                        <i class="fas fa-graduation-cap"></i>
                        <span>Formation Professionnelle</span>
                    </div>
                    <h1 class="hero-title">MonProfChezMoi</h1>
                    <p class="hero-subtitle">
                        Votre expert en formation professionnelle pour entreprises. 
                        Nous proposons des formations sur mesure pour développer les compétences de vos équipes.
                    </p>
                    <div class="hero-buttons">
                        <a href="{{ route('bons.index') }}" class="btn-hero primary">
                            <i class="fas fa-ticket-alt"></i>
                            Acheter un bon
                        </a>
                       
                        
                        <a href="{{ route('client.formation.create') }}" class="btn-hero secondary">
                            <i class="fas fa-magic"></i>
                            Formations sur mesure
                        </a>
                    </div>
                    <div class="hero-stats">
                        <div class="stat-item">
                            <span class="stat-number">10+</span>
                            <span class="stat-label">Ans d'expérience</span>
                        </div>
                        <div class="stat-divider"></div>
                        <div class="stat-item">
                            <span class="stat-number">500+</span>
                            <span class="stat-label">Entreprises formées</span>
                        </div>
                        <div class="stat-divider"></div>
                        <div class="stat-item">
                            <span class="stat-number">95%</span>
                            <span class="stat-label">Satisfaction</span>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </section>
    

    <!-- Section Bons de Commande -->
    <section class="bons-section">
        <div class="container">
            <div class="section-header">
                <div class="section-badge">
                    <i class="fas fa-ticket-alt"></i>
                    <span>Bons de Formation</span>
                </div>
                <h2 class="section-title">Offrez des compétences, offrez un bon de formation</h2>
                <p class="section-subtitle">
                    Achetez vos bons de formation en toute simplicité et utilisez-les quand vous le souhaitez
                </p>
            </div>

            <div class="row g-4 mb-5">
                <div class="col-lg-4 col-md-6">
                    <div class="bons-card" data-aos="fade-up" data-aos-delay="100">
                        <div class="bons-icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <h3 class="bons-title">Achat Simple</h3>
                        <p class="bons-description">
                            Achetez vos bons de formation en quelques clics. Choisissez le montant qui correspond à vos besoins.
                        </p>
                        <ul class="bons-features">
                            <li><i class="fas fa-check"></i>Paiement sécurisé</li>
                            <li><i class="fas fa-check"></i>Confirmation instantanée</li>
                            <li><i class="fas fa-check"></i>Facture automatique</li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="bons-card featured" data-aos="fade-up" data-aos-delay="200">
                        <div class="featured-badge">
                            <i class="fas fa-star"></i>
                            Recommandé
                        </div>
                        <div class="bons-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <h3 class="bons-title">Flexibilité Totale</h3>
                        <p class="bons-description">
                            Utilisez vos bons quand vous voulez, sur toutes nos formations. Aucune date d'expiration.
                        </p>
                        <ul class="bons-features">
                            <li><i class="fas fa-check"></i>Validité illimitée</li>
                            <li><i class="fas fa-check"></i>Toutes formations</li>
                            <li><i class="fas fa-check"></i>Transférable</li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="bons-card" data-aos="fade-up" data-aos-delay="300">
                        <div class="bons-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h3 class="bons-title">Suivi en Ligne</h3>
                        <p class="bons-description">
                            Suivez l'utilisation de vos bons en temps réel via votre espace personnel dédié.
                        </p>
                        <ul class="bons-features">
                            <li><i class="fas fa-check"></i>Tableau de bord</li>
                            <li><i class="fas fa-check"></i>Historique détaillé</li>
                            <li><i class="fas fa-check"></i>Notifications</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="bons-cta">
                <div class="bons-cta-content">
                    <div class="bons-cta-icon">
                        <i class="fas fa-gift"></i>
                    </div>
                    <div class="bons-cta-text">
                        <h3>Commandez vos bons dès maintenant</h3>
                        <p>Profitez de nos offres spéciales pour les achats en volume</p>
                    </div>
                </div>
                <a href="{{ route('bons.index') }}" class="btn-cta-bons">
                    <span>Acheter des bons</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Section Formation Sur Mesure -->
    <section class="custom-formation-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="custom-image-wrapper">
                        <img src="{{ asset('img/img2.jpeg') }}" alt="Image" style="width:640px; height:auto;"> 
                             
                        <div class="custom-overlay">
                            <div class="custom-stat">
                                <i class="fas fa-magic"></i>
                                <span>100% Personnalisé</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6" data-aos="fade-left">
                    <div class="custom-content">
                        <div class="section-badge">
                            <i class="fas fa-palette"></i>
                            <span>Sur Mesure</span>
                        </div>
                        <h2 class="section-title">Créez Votre Formation Personnalisée</h2>
                        <p class="section-subtitle">
                            Nous concevons avec vous un programme de formation unique, adapté aux besoins spécifiques de votre entreprise et de vos équipes.
                        </p>

                        <div class="custom-steps">
                            <div class="custom-step">
                                <div class="step-number">1</div>
                                <div class="step-content">
                                    <h4>Analyse de vos besoins</h4>
                                    <p>Nous identifions ensemble vos objectifs et vos contraintes</p>
                                </div>
                            </div>

                            <div class="custom-step">
                                <div class="step-number">2</div>
                                <div class="step-content">
                                    <h4>Conception du programme</h4>
                                    <p>Nos experts créent un contenu adapté à vos attentes</p>
                                </div>
                            </div>

                            <div class="custom-step">
                                <div class="step-number">3</div>
                                <div class="step-content">
                                    <h4>Déploiement et suivi</h4>
                                    <p>Formation de vos équipes avec un accompagnement personnalisé</p>
                                </div>
                            </div>
                        </div>

                        <div class="custom-benefits">
                            <div class="benefit-item">
                                <i class="fas fa-check-circle"></i>
                                <span>Durée flexible</span>
                            </div>
                            <div class="benefit-item">
                                <i class="fas fa-check-circle"></i>
                                <span>Contenu exclusif</span>
                            </div>
                            <div class="benefit-item">
                                <i class="fas fa-check-circle"></i>
                                <span>Formateurs dédiés</span>
                            </div>
                            <div class="benefit-item">
                                <i class="fas fa-check-circle"></i>
                                <span>Support continu</span>
                            </div>
                        </div>

                        <a href="{{ route('client.formation.create') }}" class="btn-custom-formation">
                            <i class="fas fa-paper-plane"></i>
                            <span>Créer ma formation</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- À propos -->
    <section class="about-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Pourquoi choisir MonProfChezMoi ?</h2>
                <p class="section-subtitle">
                    Depuis plus de 10 ans, nous accompagnons les entreprises dans leur développement 
                    grâce à des formations adaptées et personnalisées.
                </p>
            </div>
            
            <div class="row g-4">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h4>Expertise Reconnue</h4>
                        <p>
                            Des formateurs experts dans leur domaine avec une expérience terrain solide et des certifications reconnues.
                        </p>
                    </div>
                </div>
                
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-cog"></i>
                        </div>
                        <h4>Formations Sur Mesure</h4>
                        <p>
                            Nous adaptons nos contenus aux besoins spécifiques de votre entreprise pour un impact maximal.
                        </p>
                    </div>
                </div>
                
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h4>Résultats Mesurables</h4>
                        <p>
                            Un suivi personnalisé et des indicateurs précis pour garantir l'efficacité de nos formations.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

   <!-- Section Formations -->
@php
    // Image associée à chaque formation (début du nom, sans accents ni majuscules)
    $imagesFormations = [
        'commercial'    => 'wel1.jpg',  // Commercial & Relation Client
        'comptabilite'  => 'wel3.jpg',  // Comptabilité, Finance & Banque
        'langues'       => 'wel5.jpg',  // Langues Étrangères
        'rh'            => 'wel7.jpg',  // RH & Administratives
        'secretariat'   => 'wel2.jpg',  // Secrétariat & Assistanat
        'communication' => 'wel4.jpg',  // Communication d'entreprise
    ];

    $imageDeFormation = function ($formation) use ($imagesFormations) {
        $slug = \Illuminate\Support\Str::slug($formation->nom);
        foreach ($imagesFormations as $cle => $fichier) {
            if (\Illuminate\Support\Str::startsWith($slug, $cle)) {
                return asset('img/' . $fichier);
            }
        }
        // Secours : image uploadée, sinon image par défaut
        return $formation->image
            ? Storage::url($formation->image)
            : 'https://images.pexels.com/photos/3184292/pexels-photo-3184292.jpeg';
    };
@endphp

<section class="formations-section">
    <div class="container">
        <div class="section-header">
            <div class="section-badge">
                <i class="fas fa-book"></i>
                <span>Catalogue</span>
            </div>
            <h2 class="section-title">Nos Formations Professionnelles</h2>
            <p class="section-subtitle">
                Des solutions de formation adaptées aux besoins spécifiques de votre secteur d'activité
            </p>
        </div>

        @if($formations->count() > 0)
        <div class="row g-4">
            @foreach($formations->take(6) as $index => $formation)
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
                <div class="formation-card-home">
                    <div class="formation-image">
                        <img src="{{ $imageDeFormation($formation) }}" alt="{{ $formation->nom }}">
                        <div class="formation-badge">
                            <i class="fas fa-building"></i>
                            Entreprise
                        </div>
                    </div>

                    <div class="formation-content">
                        <h3 class="formation-title">{{ $formation->nom }}</h3>
                        <p class="formation-description">
                            {{ Str::limit($formation->description, 100) }}
                        </p>
                        <a href="{{ route('formations.show', $formation) }}" class="btn-formation">
                            <span>Découvrir</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-5">
            <a href="{{ route('formations.index') }}" class="btn-view-all">
                <span>Voir toutes les formations</span>
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>
        @else
        <div class="empty-state">
            <i class="fas fa-inbox"></i>
            <p>Aucune formation disponible pour le moment.</p>
        </div>
        @endif
    </div>
</section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="cta-background"></div>
        <div class="container">
            <div class="cta-content">
                <h2 class="cta-title">Prêt à former vos équipes ?</h2>
                <p class="cta-subtitle">
                    Contactez-nous pour établir un programme de formation adapté à vos besoins
                </p>
                <div class="cta-buttons">
                    <a href="tel:+33123456789" class="btn-cta primary">
                        <i class="fas fa-phone"></i>
                        <span>+225 07 10 00 05 88</span>
                    </a>
                    <a href="mailto:formationpro@monprofchezmoi-ci.com" class="btn-cta secondary">
                        <i class="fas fa-envelope"></i>
                        <span>Nous écrire</span>
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
                        <li><i class="fas fa-envelope"></i> formation@monprofchezmoi-ci.com</li>
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
        
        document.addEventListener('DOMContentLoaded', function() {
    const cards = document.querySelectorAll('.domaine-card');
    
    cards.forEach((card, index) => {
        card.addEventListener('mouseenter', function() {
            this.style.zIndex = '10';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.zIndex = '1';
        });
        
        card.addEventListener('mousemove', function(e) {
            const rect = this.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            
            const centerX = rect.width / 2;
            const centerY = rect.height / 2;
            
            const rotateX = (y - centerY) / 10;
            const rotateY = (centerX - x) / 10;
            
            this.style.transform = `translateY(-15px) scale(1.02) perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1) perspective(1000px) rotateX(0) rotateY(0)';
        });
    });
});

        // Navbar scroll effect
window.addEventListener('scroll', function() {
    const navbar = document.querySelector('.navbar');
    if (window.scrollY > 20) {
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }
});

// Simple AOS-like animation
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -100px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('aos-animate');
            observer.unobserve(entry.target);
        }
    });
}, observerOptions);

// Observe all elements with data-aos attribute
document.querySelectorAll('[data-aos]').forEach(el => {
    observer.observe(el);
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

// Counter animation for stats
const animateCounter = (element, target) => {
    let current = 0;
    const increment = target / 50;
    const timer = setInterval(() => {
        current += increment;
        if (current >= target) {
            element.textContent = target + (element.dataset.suffix || '');
            clearInterval(timer);
        } else {
            element.textContent = Math.ceil(current) + (element.dataset.suffix || '');
        }
    }, 30);
};

// Observe stats for counter animation
const statsObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const statNumber = entry.target.querySelector('.stat-number');
            if (statNumber && !statNumber.classList.contains('animated')) {
                statNumber.classList.add('animated');
                const text = statNumber.textContent;
                const number = parseInt(text.replace(/\D/g, ''));
                const suffix = text.replace(/[0-9]/g, '');
                statNumber.dataset.suffix = suffix;
                animateCounter(statNumber, number);
            }
            statsObserver.unobserve(entry.target);
        }
    });
}, { threshold: 0.5 });

document.querySelectorAll('.stat-item, .hero-stats').forEach(stat => {
    statsObserver.observe(stat);
});

// Add hover effects to cards
document.querySelectorAll('.bons-card, .feature-card, .formation-card-home').forEach(card => {
    card.addEventListener('mouseenter', function() {
        this.style.transition = 'all 0.4s cubic-bezier(0.4, 0, 0.2, 1)';
    });
});

// Parallax effect for hero section
window.addEventListener('scroll', function() {
    const scrolled = window.pageYOffset;
    const heroImage = document.querySelector('.hero-image-wrapper');
    if (heroImage) {
        heroImage.style.transform = `translateY(${scrolled * 0.3}px)`;
    }
});

console.log('%c✨ MonProfChezMoi - Accueil ✨', 'color: #5B8CC6; font-size: 20px; font-weight: bold;');
console.log('%cBienvenue sur votre plateforme de formation professionnelle', 'color: #F4A261; font-size: 14px;');

    </script>
</body>
</html>
