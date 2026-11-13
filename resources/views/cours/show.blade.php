<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $cours->titre }} - MonProfChezMoi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <style>
        :root {
            --primary-blue: #2563EB;
            --dark-blue: #1E40AF;
            --lighter-blue: #EFF6FF;
            --primary-orange: #F97316;
            --dark-orange: #EA580C;
            --lighter-orange: #FEF3C7;
            --text-dark: #1F2937;
            --text-gray: #6B7280;
            --bg-light: #F9FAFB;
            --white: #FFFFFF;les 
            --border-color: #E5E7EB;
            --success-green: #10B981;
            --pink-accent: #F472B6;
            --purple-accent: #8B5CF6;
        }

        .futur-hero{
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--dark-blue) 100%);
            color:var(--white);
            border-radius:20px;
            padding:3rem 2rem;
            text-align:center;
            position:relative;
            overflow:hidden;
            margin-bottom:3rem;
        }
        .futur-hero::before{
            content:'';
            position:absolute;
            inset:0;
            background:url('data:image/svg+xml,<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg"><circle cx="50" cy="50" r="2" fill="white" opacity=".1"/></svg>');
            opacity:.3;
        }
        .futur-hero h1{
            font-size:2.8rem;
            font-weight:800;
            position:relative;
            z-index:1;
            margin-bottom:1rem;
        }
        .futur-hero-badge{
            display:inline-flex;
            align-items:center;
            gap:.5rem;
            background:rgba(255,255,255,.15);
            backdrop-filter:blur(10px);
            padding:.5rem 1.2rem;
            border-radius:50px;
            font-size:.95rem;
            margin-bottom:1rem;
            border:1px solid rgba(255,255,255,.3);
        }
        .futur-hero-meta {
            display: flex;
            justify-content: center;
            gap: 1.5rem;
            flex-wrap: wrap;
            margin-top: 1rem;
            position: relative;
            z-index: 1;
        }
        .futur-hero-meta span {
            display: inline-flex;
            align-items: center;
            gap: .4rem;
            font-size: .9rem;
            opacity: .9;
        }

        .futur-grid{
            display:grid;
            grid-template-columns:1fr;
            gap:2rem;
        }
        @media (min-width:992px){
            .futur-grid{
                grid-template-columns:2fr 1fr;
            }
        }

        .futur-card{
            background:var(--white);
            border-radius:16px;
            border:1px solid var(--border-color);
            box-shadow:0 6px 25px rgba(37,99,235,.08);
            overflow:hidden;
            transition:transform .3s, box-shadow .3s;
        }
        .futur-card:hover{
            transform:translateY(-4px);
            box-shadow:0 12px 40px rgba(37,99,235,.15);
        }
        .futur-card-header{
            padding:1.5rem;
            border-bottom:1px solid var(--border-color);
            display:flex;
            align-items:center;
            gap:.75rem;
        }
        .futur-card-header i{
            color:var(--primary-orange);
            font-size:1.3rem;
        }
        .futur-card-header h2{
            margin:0;
            font-size:1.3rem;
            font-weight:700;
            color:var(--text-dark);
        }
        .futur-card-body{
            padding:1.5rem;
        }

        .futur-sticky{
            position:sticky;
            top:100px;
        }

        /* ===== ONGLETS DE PRIX (STYLE IMAGE) ===== */
        .pricing-tabs-wrapper {
            background: var(--white);
            border-radius: 16px;
            border: 1px solid var(--border-color);
            box-shadow: 0 6px 25px rgba(37,99,235,.08);
            overflow: hidden;
            margin-bottom: 1.5rem;
        }

        .pricing-tabs-nav {
            display: flex;
            background: #f3f4f6;
            border-radius: 12px;
            margin: 12px;
            padding: 4px;
            gap: 4px;
        }

        .pricing-tab-btn {
            flex: 1;
            padding: 12px 8px;
            border: none;
            background: transparent;
            color: var(--text-gray);
            font-weight: 600;
            font-size: 0.85rem;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .pricing-tab-btn:hover {
            color: var(--text-dark);
        }

        .pricing-tab-btn.active {
            background: linear-gradient(135deg, #f4a261, #e76f51);
            color: white;
            box-shadow: 0 4px 15px rgba(231, 111, 81, 0.3);
        }

        .pricing-tab-content {
            display: none;
            padding: 1.5rem;
            animation: fadeIn 0.3s ease;
        }

        .pricing-tab-content.active {
            display: block;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

       .pricing-tab-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 1rem;
}

.pricing-tab-header > div:first-child {
    display: flex;
    flex-direction: column;
    gap: 0.4rem;
}

        .pricing-tab-title {
            font-size: 0.9rem;
            color: var(--text-gray);
            margin-bottom: 0.25rem;
        }

    .pricing-tab-location {
    font-size: 1.1rem;
    font-weight: bold;
    color: var(--text-dark);
}
        .pricing-tab-date {
            font-size: 1.1rem;
            color: var(--text-dark);
            font-weight: 600;
        }

        .pricing-tab-cart {
            width: 50px;
            height: 50px;
            background: #f3f4f6;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-gray);
            font-size: 1.2rem;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
        }

        .pricing-tab-cart:hover {
            background: var(--primary-orange);
            color: white;
        }

.pricing-tab-details {
    display: flex;
    flex-direction: column; /* Affichage vertical */
    gap: 0.8rem;
    margin-top: 1rem;
    padding-top: 1rem;
    border-top: 1px solid var(--border-color);
}

.pricing-tab-detail {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: var(--text-gray);
    font-size: 0.9rem;
    font-weight: 400; /* Pas de gras */
}

.pricing-tab-detail i {
    color: var(--text-gray);
    font-size: 1rem;
    flex-shrink: 0;
}
        .pricing-tab-detail.price-highlight {
            color: var(--text-dark);
            font-weight: 700;
        }

        .pricing-tab-detail.price-highlight i {
            color: var(--primary-orange);
        }

        .pricing-tab-footer {
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 1px solid var(--border-color);
            text-align: center;
            font-weight: 700;
            color: var(--text-dark);
            font-size: 0.95rem;
        }

        .pricing-tab-footer .free-meal {
            color: var(--success-green);
        }

        .pricing-tab-btn-action {
            width: 100%;
            padding: 1rem;
            margin-top: 1rem;
            border: none;
            border-radius: 12px;
            font-weight: 700;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .pricing-tab-btn-action.bronze {
            background: linear-gradient(135deg, #cd7f32, #b87333);
            color: white;
        }

        .pricing-tab-btn-action.silver {
            background: linear-gradient(135deg, var(--primary-orange), var(--dark-orange));
            color: white;
        }

        .pricing-tab-btn-action.gold {
            background: linear-gradient(135deg, #ffd700, #ffb800);
            color: var(--text-dark);
        }

        .pricing-tab-btn-action:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.15);
        }

        .futur-detail{
            display:flex;
            align-items:center;
            gap:1rem;
            padding:1rem;
            background:var(--lighter-blue);
            border-radius:10px;
            margin-bottom:.75rem;
            transition: background .3s, transform .3s;
        }
        .futur-detail:hover{
            background:var(--lighter-blue);
            transform:translateX(4px);
        }
        .futur-detail-icon{
            width:50px;
            height:50px;
            background:var(--primary-blue);
            color:var(--white);
            border-radius:12px;
            display:grid;
            place-items:center;
            font-size:1.2rem;
            box-shadow:0 4px 10px rgba(37,99,235,.2);
        }
        .futur-detail-label{
            font-size:.8rem;
            color:var(--text-gray);
        }
        .futur-detail-value{
            font-size:1rem;
            font-weight:600;
            color:var(--text-dark);
        }

        .futur-highlights{
            background:var(--lighter-orange);
            border:none;
        }
        .futur-highlight{
            display:flex;
            align-items:center;
            gap:.75rem;
            padding:.75rem;
            background:var(--white);
            border-radius:8px;
            margin-bottom:.5rem;
            font-weight:500;
            transition: transform .3s;
        }
        .futur-highlight:hover{
            transform:translateX(4px);
        }
        .futur-highlight i{
            color:var(--primary-orange);
        }

        .futur-cta{
            background:linear-gradient(135deg, var(--primary-blue), var(--dark-blue));
            color:var(--white);
            border-radius:16px;
            padding:2.5rem 2rem;
            text-align:center;
            box-shadow:0 8px 30px rgba(37,99,235,.2);
        }
        .futur-cta h2{
            font-size:2rem;
            font-weight:700;
            margin-bottom:.5rem;
        }
        .futur-cta p{
            opacity:.95;
            margin-bottom:1.5rem;
        }
        .futur-cta-actions{
            display:flex;
            gap:1rem;
            justify-content:center;
            flex-wrap:wrap;
        }
        .futur-cta-btn{
            padding:.9rem 1.8rem;
            border:none;
            border-radius:10px;
            font-weight:600;
            font-size:1rem;
            display:inline-flex;
            align-items:center;
            gap:.5rem;
            cursor:pointer;
            transition: all .3s ease;
        }
        .futur-cta-btn.primary{
            background:var(--primary-orange);
            color:var(--white);
        }
        .futur-cta-btn.primary:hover{
            background:var(--dark-orange);
            transform:translateY(-3px);
            box-shadow:0 8px 20px rgba(249,115,22,.3);
        }
        .futur-cta-btn.secondary{
            background:transparent;
            color:var(--white);
            border:2px solid var(--white);
        }
        .futur-cta-btn.secondary:hover{
            background:var(--white);
            color:var(--primary-blue);
            transform:translateY(-3px);
        }

        .formateurs-section {
            margin-bottom: 3rem;
        }

        .formateurs-section-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--pink-accent);
            margin-bottom: 1.5rem;
            text-align: left;
        }

        .formateur-card-wrapper {
            background: linear-gradient(135deg, #0B1120 0%, #1a1f3a 100%);
            border-radius: 20px;
            padding: 3rem 2.5rem;
            position: relative;
            overflow: hidden;
            min-height: 380px;
            display: flex;
            align-items: center;
        }

        .formateur-card-wrapper::before {
            content: '';
            position: absolute;
            bottom: 0;
            right: 0;
            width: 200px;
            height: 200px;
            background: radial-gradient(circle, rgba(244,114,182,0.15) 0%, transparent 70%);
            border-radius: 50%;
            pointer-events: none;
        }

        .formateur-content {
            display: flex;
            align-items: center;
            gap: 2.5rem;
            width: 100%;
            position: relative;
            z-index: 1;
        }

        .formateur-avatar {
            flex-shrink: 0;
            width: 140px;
            height: 140px;
            border-radius: 50%;
            overflow: hidden;
            border: 4px solid rgba(255,255,255,0.2);
            box-shadow: 0 8px 30px rgba(0,0,0,0.3);
        }

        .formateur-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .formateur-avatar-placeholder {
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, var(--primary-blue), var(--primary-orange));
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            color: white;
            font-weight: 700;
        }

        .formateur-info {
            flex: 1;
            color: var(--white);
        }

        .formateur-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--pink-accent);
            font-size: 0.9rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 1rem;
        }

        .formateur-badge i {
            font-size: 0.8rem;
        }

        .formateur-name {
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: var(--white);
        }

        .formateur-bio {
            font-size: 0.95rem;
            line-height: 1.7;
            color: rgba(255,255,255,0.85);
            margin-bottom: 1.5rem;
            max-width: 600px;
        }

        .formateur-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: var(--pink-accent);
            color: var(--white);
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .formateur-btn:hover {
            background: #ec4899;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(244,114,182,0.4);
            color: var(--white);
        }

        .formateur-nav {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            margin-top: 1.5rem;
        }

        .formateur-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: var(--border-color);
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            padding: 0;
        }

        .formateur-dot.active {
            background: var(--pink-accent);
            width: 24px;
            border-radius: 5px;
        }

        .formateur-dot:hover {
            background: var(--pink-accent);
            opacity: 0.7;
        }

        .formateur-arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255,255,255,0.1);
            border: 1px solid rgba(255,255,255,0.2);
            color: var(--white);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            z-index: 10;
        }

        .formateur-arrow:hover {
            background: rgba(255,255,255,0.2);
        }

        .formateur-arrow.prev {
            left: 1rem;
        }

        .formateur-arrow.next {
            right: 1rem;
        }

        @media (max-width: 768px) {
            .formateur-content {
                flex-direction: column;
                text-align: center;
                gap: 1.5rem;
            }

            .formateur-card-wrapper {
                padding: 2rem 1.5rem;
                min-height: auto;
            }

            .formateur-avatar {
                width: 100px;
                height: 100px;
            }

            .formateur-name {
                font-size: 1.2rem;
            }

            .formateur-bio {
                font-size: 0.9rem;
            }

            .formateur-arrow {
                display: none;
            }
        }

        .objectives-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .objectives-list li {
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
            padding: 0.6rem 0;
            border-bottom: 1px solid var(--border-color);
        }
        .objectives-list li:last-child {
            border-bottom: none;
        }
        .objectives-list li i {
            color: var(--success-green);
            margin-top: 0.2rem;
            flex-shrink: 0;
        }

        .navbar{box-shadow:0 1px 3px rgba(0,0,0,.05);}
        .nav-link.active{background:var(--primary-blue);color:var(--white)!important;}

        .programme-block{
            margin-bottom:25px;
            padding:15px;
            border-radius:12px;
            background:#f9fafb;
            border-left:5px solid #6366f1;
        }

        .programme-title{
            font-size:18px;
            font-weight:800;
            color:#111827;
            margin-bottom:10px;
            padding-bottom:6px;
            border-bottom:1px solid #e5e7eb;
        }

        .programme-items{
            margin:0;
            padding-left:20px;
        }

        .programme-items li{
            margin-bottom:6px;
            color:#4b5563;
            font-size:14px;
        }
        .btn-pdf {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
            color: white;
            padding: 12px 24px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            box-shadow: 0 4px 15px rgba(220, 38, 38, 0.3);
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .btn-pdf:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(220, 38, 38, 0.4);
            color: white;
        }

        .btn-pdf i {
            font-size: 16px;
        }

        .certification-badges {
            display: flex;
            justify-content: center;
            gap: 1rem;
            flex-wrap: wrap;
            margin-top: 1rem;
            position: relative;
            z-index: 1;
        }
        .certification-badges .badge-item {
            display: inline-flex;
            align-items: center;
            gap: .4rem;
            padding: .4rem 1rem;
            border-radius: 50px;
            font-size: .85rem;
            font-weight: 600;
        }
        .badge-certifiante {
            background: linear-gradient(135deg, #fbbf24, #f59e0b);
            color: #1f2937;
        }
        .badge-eligible {
            background: linear-gradient(135deg, #34d399, #10b981);
            color: white;
        }
        .badge-diplome {
            background: linear-gradient(135deg, #a78bfa, #8b5cf6);
            color: white;
        }

        .formation-image-wrapper {
            position: relative;
            border-radius: 16px;
            overflow: hidden;
            margin-bottom: 2rem;
            box-shadow: 0 8px 30px rgba(0,0,0,0.15);
        }
        .formation-image-wrapper img {
            width: 100%;
            height: 400px;
            object-fit: cover;
            display: block;
        }
        .formation-image-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(transparent, rgba(0,0,0,0.7));
            padding: 2rem 1.5rem 1.5rem;
            color: white;
        }
        .formation-image-overlay .ref {
            font-size: .85rem;
            opacity: .8;
            font-family: monospace;
        }

        .methodes-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1rem;
        }

        .methode-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 15px 20px;
            background: var(--lighter-blue);
            border-radius: 12px;
            width: 100%;
            transition: all .3s ease;
        }
        .methode-item:hover {
            transform: translateX(5px);
            box-shadow: 0 4px 12px rgba(37,99,235,.1);
        }
        .methode-item i {
            width: 40px;
            height: 40px;
            background: var(--primary-blue);
            color: white;
            border-radius: 10px;
            display: grid;
            place-items: center;
            font-size: 1rem;
            flex-shrink: 0;
        }
        .methode-item span {
            font-weight: 600;
            color: var(--text-dark);
            font-size: .95rem;
            line-height: 1.4;
            align-self: center;
        }

        .avis-section {
            margin-bottom: 3rem;
        }
        .avis-card {
            background: white;
            border-radius: 16px;
            border: 1px solid var(--border-color);
            padding: 1.5rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        }
        .avis-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1rem;
        }
        .avis-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary-blue), var(--primary-orange));
            display: grid;
            place-items: center;
            color: white;
            font-weight: 700;
            font-size: 1.2rem;
            flex-shrink: 0;
        }
        .avis-meta h4 {
            margin: 0;
            font-size: 1rem;
            font-weight: 700;
            color: var(--text-dark);
        }
        .avis-meta .avis-date {
            font-size: .8rem;
            color: var(--text-gray);
        }
        .avis-stars {
            color: #fbbf24;
            margin-bottom: .5rem;
        }
        .avis-text {
            color: var(--text-gray);
            line-height: 1.7;
            font-style: italic;
        }

        .modalites-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .modalites-list li {
            display: flex;
            align-items: center;
            gap: .75rem;
            padding: .6rem 0;
            border-bottom: 1px solid var(--border-color);
        }
        .modalites-list li:last-child {
            border-bottom: none;
        }
        .modalites-list li i {
            color: var(--primary-blue);
            width: 24px;
            text-align: center;
        }

        .dates-session {
            display: flex;
            flex-wrap: wrap;
            gap: .5rem;
        }
        .date-badge {
            display: inline-flex;
            align-items: center;
            gap: .4rem;
            padding: .5rem 1rem;
            background: var(--lighter-blue);
            border: 1px solid var(--primary-blue);
            border-radius: 8px;
            color: var(--primary-blue);
            font-weight: 600;
            font-size: .9rem;
        }
        .card {
            border-radius: 12px;
        }

        .fa-star {
            margin-right: 2px;
        }

        .review-section {
            margin-top: 30px;
        }

        .rating-summary {
            background: linear-gradient(135deg, #4f46e5, #9333ea);
            color: white;
            border-radius: 16px;
            padding: 25px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        }

        .rating-summary h2 {
            font-size: 42px;
            font-weight: bold;
            margin: 10px 0;
        }

        .rating-summary i {
            font-size: 22px;
            margin: 2px;
        }

        .review-title {
            font-size: 22px;
            font-weight: 700;
            margin: 25px 0 15px;
        }

        .review-card {
            background: #fff;
            border-radius: 14px;
            padding: 18px;
            margin-bottom: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            transition: all 0.25s ease;
            border-left: 4px solid transparent;
        }

        .review-card:hover {
            transform: translateY(-3px);
            border-left: 4px solid #6366f1;
            box-shadow: 0 10px 25px rgba(0,0,0,0.12);
        }

        .review-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 8px;
        }

        .review-name {
            font-weight: 600;
            font-size: 16px;
            color: #111827;
        }

        .review-date {
            font-size: 12px;
            color: #9ca3af;
        }

        .stars {
            margin: 6px 0;
            display: flex;
            gap: 2px;
        }

        .stars i {
            font-size: 15px;
            color: #fbbf24;
        }

        .stars i.empty {
            color: #e5e7eb;
        }

        .review-text {
            font-size: 14px;
            color: #4b5563;
            line-height: 1.5;
        }

        .no-reviews {
            background: #f9fafb;
            padding: 15px;
            border-radius: 10px;
            color: #6b7280;
        }

        /* Formulaire d'avis */
        .review-form-card {
            background: #ffffff;
            border-radius: 16px;
            padding: 24px;
            margin-top: 25px;
            border: 1px solid var(--border-color);
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        }
        .review-form-title {
            font-size: 1.15rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 6px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .review-form-desc {
            font-size: 0.88rem;
            color: var(--text-gray);
            margin-bottom: 18px;
        }
        .review-rating-picker {
            display: flex;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
            margin-bottom: 16px;
            padding: 12px 16px;
            background: #f8fafc;
            border-radius: 10px;
            border: 1px solid #e2e8f0;
        }
        .review-stars-group {
            display: inline-flex;
            flex-direction: row-reverse;
            gap: 4px;
        }
        .review-stars-group input {
            display: none;
        }
        .review-stars-group label {
            font-size: 1.7rem;
            color: #d1d5db;
            cursor: pointer;
            transition: all 0.2s;
            padding: 0 2px;
        }
        .review-stars-group label:hover,
        .review-stars-group label:hover ~ label,
        .review-stars-group input:checked ~ label {
            color: #fbbf24;
            transform: scale(1.15);
        }
        .review-rating-label {
            font-size: 0.9rem;
            font-weight: 600;
            color: #64748b;
        }
        .review-field {
            margin-bottom: 14px;
        }
        .review-field label {
            display: block;
            font-size: 0.88rem;
            font-weight: 600;
            color: #374151;
            margin-bottom: 6px;
        }
        .review-input, .review-textarea {
            width: 100%;
            padding: 10px 14px;
            border: 1.5px solid #d1d5db;
            border-radius: 8px;
            font-size: 0.95rem;
            font-family: inherit;
            color: #1f2937;
            background: #fff;
            transition: all 0.2s;
            box-sizing: border-box;
        }
        .review-input:focus, .review-textarea:focus {
            outline: none;
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 3px rgba(91, 140, 198, 0.15);
        }
        .btn-submit-review {
            background: linear-gradient(135deg, var(--primary-blue), #3b82f6);
            color: white;
            border: none;
            padding: 11px 22px;
            border-radius: 8px;
            font-size: 0.95rem;
            font-weight: 600;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.2s;
        }
        .btn-submit-review:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
        }
        .share-eval-link {
            margin-top: 20px;
            padding: 12px 16px;
            background: #f0fdf4;
            border: 1px dashed #86efac;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            flex-wrap: wrap;
        }
        .share-eval-link span {
            font-size: 0.85rem;
            color: #166534;
            font-weight: 500;
        }
        .btn-share-copy {
            background: white;
            border: 1px solid #86efac;
            color: #15803d;
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 0.82rem;
            font-weight: 600;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            transition: all 0.2s;
        }
        .btn-share-copy:hover {
            background: #dcfce7;
        }

        .footer{
            background: linear-gradient(135deg, #0f172a, #1e293b);
            color: #e5e7eb;
            padding: 60px 0 20px;
            margin-top: 60px;
            position: relative;
            overflow: hidden;
        }

        .footer::before{
            content:"";
            position:absolute;
            top:-100px;
            left:-100px;
            width:300px;
            height:300px;
            background: radial-gradient(circle, rgba(99,102,241,0.4), transparent 60%);
            filter: blur(40px);
        }

        .footer::after{
            content:"";
            position:absolute;
            bottom:-120px;
            right:-120px;
            width:300px;
            height:300px;
            background: radial-gradient(circle, rgba(236,72,153,0.3), transparent 60%);
            filter: blur(40px);
        }

        .footer-brand{
            display:flex;
            align-items:center;
            gap:10px;
            margin-bottom:10px;
        }

        .footer-brand i{
            font-size:26px;
            color:#6366f1;
        }

        .footer-brand h5{
            margin:0;
            font-size:20px;
            font-weight:700;
            color:#ffffff;
        }

        .footer-text{
            color:#cbd5e1;
            font-size:14px;
            line-height:1.6;
        }

        .footer-heading{
            font-size:16px;
            font-weight:700;
            margin-bottom:15px;
            color:#ffffff;
            position:relative;
        }

        .footer-heading::after{
            content:"";
            display:block;
            width:40px;
            height:3px;
            background:linear-gradient(90deg,#6366f1,#ec4899);
            margin-top:6px;
            border-radius:10px;
        }

        .footer-links,
        .footer-contact{
            list-style:none;
            padding:0;
            margin:0;
        }

        .footer-links li,
        .footer-contact li{
            margin-bottom:10px;
            font-size:14px;
            color:#cbd5e1;
        }

        .footer-links a{
            color:#cbd5e1;
            text-decoration:none;
            transition:0.3s;
        }

        .footer-links a:hover{
            color:#6366f1;
            padding-left:5px;
        }

        .footer-contact i{
            margin-right:8px;
            color:#6366f1;
        }

        .footer-bottom{
            text-align:center;
            margin-top:40px;
            padding-top:20px;
            border-top:1px solid rgba(255,255,255,0.1);
            font-size:13px;
            color:#94a3b8;
        }

        @media (max-width:768px){
            .footer{
                text-align:center;
            }

            .footer-heading::after{
                margin-left:auto;
                margin-right:auto;
            }

            .footer-brand{
                justify-content:center;
            }
        }

        .points-list{
            list-style:none;
            padding:0;
            margin:0;
        }

        .points-list li{
            position:relative;
            padding-left:28px;
            margin-bottom:10px;
            font-size:14.5px;
            color:#374151;
            line-height:1.6;
            transition:0.2s ease;
        }

        .points-list li::before{
            content:"➜";
            position:absolute;
            left:0;
            top:0;
            color:#6366f1;
            font-weight:bold;
            font-size:16px;
            transition:0.2s ease;
        }

        .points-list li:hover{
            color:#111827;
            transform:translateX(3px);
        }

        .points-list li:hover::before{
            color:#ec4899;
        }

        .points-forts-list{
            list-style:none;
            padding:0;
            margin:0;
        }

        .points-forts-list li{
            position:relative;
            padding:12px 15px 12px 40px;
            margin-bottom:12px;
            font-size:14.5px;
            color:#1f2937;
            background:#f9fafb;
            border-radius:10px;
            border-left:4px solid #10b981;
            line-height:1.5;
            transition:0.25s ease;
            box-shadow:0 2px 8px rgba(0,0,0,0.04);
        }

        .points-forts-list li::before{
            content:"✔";
            position:absolute;
            left:12px;
            top:50%;
            transform:translateY(-50%);
            color:#10b981;
            font-weight:bold;
            font-size:14px;
        }

        .points-forts-list li:hover{
            transform:translateX(5px);
            background:#ecfdf5;
            border-left-color:#059669;
        }

        .course-badge{
            display:inline-block;
            padding:8px 18px;
            border-radius:30px;
            color:#fff;
            font-weight:700;
            margin-top:15px;
        }

        .course-badge.top_vente{
            background:#ff7a00;
        }

        .course-badge.nouveaute{
            background:#16a34a;
        }

        .course-badge.incontournable{
            background:#7c3aed;
        }

        .course-badge.premium{
            background:#333333;
        }
        /* Médailles dans les onglets */
.pricing-medal {
    font-size: 2.5rem;
    text-align: center;
    margin-bottom: 0.5rem;
    line-height: 1;
}
.course-badge.flash{
    background:#FACC15;
    color:#1F2937;
}
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <i class="fas fa-graduation-cap"></i> MonProfChezMoi
            </a>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}"><i class="fas fa-home"></i> Accueil</a></li>
                    <li class="nav-item"><a class="nav-link active" href="{{ route('formations.index') }}"><i class="fas fa-layer-group"></i> Catalogue</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('client.formation.create') }}"><i class="fas fa-layer-group"></i> Formation sur-mesure</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        @php
    // Flash = durée de 3 ou 4 heures (même règle que le catalogue)
    $estFlash = (function ($duree) {
        $d = mb_strtolower(trim((string) $duree));
        if (preg_match('/^(\d+)$/', $d, $m) && in_array((int) $m[1], [3, 4])) {
            return true; // durée saisie sans unité : "3" ou "4"
        }
        if (preg_match('/(\d+(?:[.,]\d+)?)\s*(h|heure)/u', $d, $m)) {
            $h = (float) str_replace(',', '.', $m[1]);
            return $h == 3 || $h == 4;
        }
        return false;
    })($cours->duree);
@endphp
        <div class="futur-hero">
            <div class="futur-hero-badge">
                <i class="fas fa-chalkboard-teacher"></i>
                <span>Formation professionnelle</span>
            </div>
            <h1>{{ $cours->titre }}</h1>
            @if($estFlash)
    <div class="course-badge flash"><i class="fas fa-bolt"></i> Flash</div>
@endif
            @if($cours->etiquette)
                <div class="course-badge {{ $cours->etiquette }}">
                    @switch($cours->etiquette)
                        @case('top_vente') Top Vente @break
                        @case('nouveaute') Nouveauté @break
                        @case('incontournable') Incontournable @break
                        @case('premium') Premium @break
                    @endswitch
                </div>
            @endif
            @if($cours->reference_formation)
                <div class="futur-hero-meta">
                    <span><i class="fas fa-hashtag"></i> Réf. : {{ $cours->reference_formation }}</span>
                </div>
            @endif
            <div class="certification-badges">
                @if($cours->certifiante)
                    <span class="badge-item badge-certifiante"><i class="fas fa-certificate"></i> Certifiante interne</span>
                @endif
                @if($cours->eligible)
                    <span class="badge-item badge-eligible"><i class="fas fa-check-circle"></i> Éligible FDFP</span>
                @endif
                @if($cours->diplome_de_fin)
                    <span class="badge-item badge-diplome"><i class="fas fa-award"></i> {{ $cours->diplome_de_fin }}</span>
                @endif
            </div>
        </div>

        <div class="futur-grid">
            <div class="futur-main">
                <div class="futur-card mb-4">
                    <div class="futur-card-header">
                        <i class="fas fa-align-left"></i>
                        <h2>Description</h2>
                    </div>
                    <div class="futur-card-body">
                        <p>{{ $cours->description }}</p>
                    </div>
                </div>

                <div class="futur-card mb-4">
                    <div class="futur-card-header">
                        <i class="fas fa-bullseye"></i>
                        <h2>Ce que vous allez apprendre</h2>
                    </div>
                    <div class="futur-card-body">
                        <ul class="objectives-list">
                            @foreach(explode("\n", $cours->objectif) as $o)
                                @if(trim($o))
                                    <li><i class="fas fa-check-circle"></i><span>{{ trim($o) }}</span></li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="futur-card mb-4">
                    <div class="futur-card-header">
                        <i class="fas fa-book-open"></i>
                        <h2>Programme</h2>
                    </div>
                    <div class="futur-card-body">
                        <ul class="programme-list">
                            @php
                                $lignes = explode("\n", $cours->programme);
                                $groupes = [];
                                $groupe = null;
                                foreach ($lignes as $ligne) {
                                    $ligne = trim($ligne);
                                    if ($ligne === '') continue;
                                    $estTitre = preg_match('/^(Jour\s*\d+)/i', $ligne) || preg_match('/^\d+\s*[-.]/', $ligne) || preg_match('/^[A-Z𝐀-𝐙]/u', $ligne);
                                    if ($estTitre) {
                                        if ($groupe) { $groupes[] = $groupe; }
                                        $groupe = ['titre' => $ligne, 'items' => []];
                                    } else {
                                        if (!$groupe) { $groupe = ['titre' => 'Programme', 'items' => []]; }
                                        $groupe['items'][] = $ligne;
                                    }
                                }
                                if ($groupe) { $groupes[] = $groupe; }
                            @endphp
                            @foreach($groupes as $groupe)
                                <div class="programme-block">
                                    <div class="programme-title">{{ $groupe['titre'] }}</div>
                                    <ul class="programme-items">
                                        @foreach($groupe['items'] as $item)
                                            <li>{{ $item }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endforeach
                        </ul>
                    </div>
                </div>

                @if($cours->methode_pedagogique)
                <div class="futur-card mb-4">
                    <div class="futur-card-header">
                        <i class="fas fa-lightbulb"></i>
                        <h2>Méthodes pédagogiques</h2>
                    </div>
                    <div class="futur-card-body">
                        <div class="methodes-grid">
                            @foreach(explode("\n", $cours->methode_pedagogique) as $methode)
                                @if(trim($methode))
                                    <div class="methode-item">
                                        <i class="fas fa-check"></i>
                                        <span>{{ trim($methode) }}</span>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif

                @if($cours->avis_participants)
                <section class="avis-section">
                    <div class="futur-card">
                        <div class="futur-card-header">
                            <i class="fas fa-comments"></i>
                            <h2>Avis des participants</h2>
                        </div>
                        <div class="futur-card-body">
                            <div class="avis-card">
                                <div class="avis-header">
                                    <div class="avis-avatar"><i class="fas fa-user"></i></div>
                                    <div class="avis-meta">
                                        <h4>Participant</h4>
                                        <span class="avis-date"><i class="fas fa-calendar"></i> Session récente</span>
                                    </div>
                                </div>
                                <div class="avis-stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <p class="avis-text">"{{ $cours->avis_participants }}"</p>
                            </div>
                        </div>
                    </div>
                </section>
                @endif

                <section class="formateurs-section">
                    <h2 class="formateurs-section-title">Un formateur pour chaque métier, une expertise pour chaque besoin</h2>
                    <div class="formateur-card-wrapper" id="formateurCarousel">
                        <button class="formateur-arrow prev" onclick="changeFormateur(-1)">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button class="formateur-arrow next" onclick="changeFormateur(1)">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                        @php
                            $formateurs = $cours->formateurs ?? collect();
                        @endphp
                        @forelse($formateurs as $index => $formateur)
                            <div class="formateur-content" data-index="{{ $index }}" style="{{ $index > 0 ? 'display:none;' : '' }}">
                                <div class="formateur-avatar">
                                    @if($formateur->photo)
                                        <img src="{{ asset('storage/formateurs/' . $formateur->photo) }}" alt="{{ $formateur->nom }}">
                                    @else
                                        <div class="formateur-avatar-placeholder">
                                            {{ strtoupper(substr($formateur->nom, 0, 1)) }}
                                        </div>
                                    @endif
                                </div>
                                <div class="formateur-info">
                                    <div class="formateur-badge">
                                        <i class="fas fa-plus"></i> Découvrez {{ $formateur->nom }}
                                    </div>
                                    <h3 class="formateur-name">{{ $formateur->nom }}</h3>
                                    <p class="formateur-function">{{ $formateur->fonction_actuelle }}</p>
                                    <p class="formateur-bio">{{ $formateur->domaines_expertise }}</p>
                                    <a href="{{ route('formateurs.show', $formateur->slug) }}" class="formateur-btn">
                                        Voir sa fiche formateur
                                    </a>
                                </div>
                            </div>
                        @empty
                            <div class="formateur-content">
                                <div class="formateur-avatar">
                                    <div class="formateur-avatar-placeholder">?</div>
                                </div>
                                <div class="formateur-info">
                                    <div class="formateur-badge">
                                        <i class="fas fa-plus"></i> Formateur
                                    </div>
                                    <h3 class="formateur-name">Formateur à venir</h3>
                                    <p class="formateur-bio">Les informations sur le formateur seront bientôt disponibles.</p>
                                </div>
                            </div>
                        @endforelse
                    </div>
                    <div class="formateur-nav">
                        @foreach($formateurs as $index => $formateur)
                            <button class="formateur-dot {{ $index === 0 ? 'active' : '' }}" onclick="goToFormateur({{ $index }})"></button>
                        @endforeach
                    </div>
                </section>
                <hr>

                @php
                    $avg = round($average);
                @endphp
                <div class="review-section">
                    <div class="rating-summary">
                        <h3>Note globale</h3>
                        <h2>{{ number_format($average, 1) }}/5</h2>
                        <div>
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= $avg)
                                    <i class="fa fa-star" style="color:#fbbf24;"></i>
                                @else
                                    <i class="fa fa-star" style="color:#e5e7eb;"></i>
                                @endif
                            @endfor
                        </div>
                        <p style="margin-top:10px;">{{ $totalAvis }} avis</p>
                    </div>
                    <div class="review-title">Avis des participants</div>
                    @if($cours->avis->count() == 0)
                        <div class="no-reviews">Aucun avis pour ce cours pour le moment.</div>
                    @endif
                    @foreach($cours->avis as $avis)
                        <div class="review-card">
                            <div class="review-header">
                                <div class="review-name">{{ $avis->nom }}</div>
                                <div class="review-date">{{ $avis->created_at->format('d/m/Y') }}</div>
                            </div>
                            <div class="stars">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $avis->etoiles)
                                        <i class="fa fa-star"></i>
                                    @else
                                        <i class="fa fa-star empty"></i>
                                    @endif
                                @endfor
                            </div>
                            <div class="review-text">{{ $avis->commentaire }}</div>
                        </div>
                    @endforeach
                </div>

                {{-- ===== FORMULAIRE NOTER CE COURS ===== --}}
                <div id="laisser-avis" style="
                    margin-top: 2.5rem;
                    background: linear-gradient(135deg, #f0f4ff 0%, #faf5ff 100%);
                    border-radius: 18px;
                    border: 1.5px solid #c7d2fe;
                    overflow: hidden;
                    box-shadow: 0 8px 25px rgba(99,102,241,0.08);
                ">
                    <!-- En-tête formulaire -->
                    <div style="
                        background: linear-gradient(135deg, #2563eb, #4f46e5);
                        color: white;
                        padding: 24px 28px;
                        display: flex;
                        align-items: center;
                        gap: 14px;
                    ">
                        <div style="
                            width: 48px; height: 48px;
                            background: rgba(255,255,255,0.2);
                            border-radius: 12px;
                            display: flex; align-items: center; justify-content: center;
                            font-size: 1.4rem;
                            flex-shrink: 0;
                        ">⭐</div>
                        <div>
                            <h3 style="margin:0; font-size:1.2rem; font-weight:700;">Donnez votre avis sur ce cours</h3>
                            <p style="margin:4px 0 0; font-size:0.88rem; opacity:0.85;">Votre retour aide les futurs apprenants à choisir les meilleures formations</p>
                        </div>
                    </div>

                    <div style="padding: 28px;">
                        @if(session('success') && request()->is('cours/'.$cours->id))
                            <div style="
                                background: #ecfdf5;
                                border: 1px solid #a7f3d0;
                                color: #065f46;
                                padding: 14px 18px;
                                border-radius: 10px;
                                margin-bottom: 20px;
                                display: flex;
                                align-items: center;
                                gap: 10px;
                                font-weight: 500;
                            ">
                                <i class="fas fa-check-circle" style="color:#10b981; font-size:1.3rem;"></i>
                                {{ session('success') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div style="
                                background: #fef2f2;
                                border: 1px solid #fecaca;
                                color: #991b1b;
                                padding: 14px 18px;
                                border-radius: 10px;
                                margin-bottom: 20px;
                                font-size: 0.9rem;
                            ">
                                <strong>Veuillez corriger les erreurs :</strong>
                                <ul style="margin:6px 0 0 20px;">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('avis.store') }}" method="POST" id="inlineReviewForm">
                            @csrf
                            <input type="hidden" name="cours_id" value="{{ $cours->id }}">
                            <input type="hidden" name="redirect_to_cours" value="1">

                            <!-- Étoiles interactives -->
                            <div style="margin-bottom: 22px;">
                                <label style="display:block; font-weight:600; color:#1f2937; margin-bottom:10px; font-size:0.95rem;">
                                    Votre note <span style="color:#ef4444;">*</span>
                                </label>
                                <div style="
                                    background: white;
                                    border: 1.5px solid #e2e8f0;
                                    border-radius: 12px;
                                    padding: 20px;
                                    text-align: center;
                                ">
                                    <div class="inline-stars-container" style="
                                        display: inline-flex;
                                        flex-direction: row-reverse;
                                        gap: 6px;
                                        margin-bottom: 10px;
                                    ">
                                        @foreach([5,4,3,2,1] as $star)
                                        <input type="radio" id="istar{{ $star }}" name="etoiles" value="{{ $star }}"
                                            {{ old('etoiles') == $star ? 'checked' : '' }} required
                                            style="display:none;">
                                        <label for="istar{{ $star }}"
                                            data-hint="{{ $star == 5 ? '5/5 – Excellent ! ⭐⭐⭐⭐⭐' : ($star == 4 ? '4/5 – Très bien ! ⭐⭐⭐⭐' : ($star == 3 ? '3/5 – Bien ⭐⭐⭐' : ($star == 2 ? '2/5 – Passable ⭐⭐' : '1/5 – À améliorer ⭐'))) }}"
                                            style="
                                                cursor: pointer;
                                                font-size: 2.2rem;
                                                color: #e5e7eb;
                                                transition: all 0.18s ease;
                                                user-select: none;
                                                line-height: 1;
                                        ">★</label>
                                        @endforeach
                                    </div>
                                    <div id="inlineRatingHint" style="
                                        font-size: 0.9rem;
                                        font-weight: 600;
                                        color: #9ca3af;
                                        min-height: 22px;
                                        transition: color 0.2s;
                                    ">Cliquez sur une étoile</div>
                                </div>
                            </div>

                            <!-- Nom -->
                            <div style="margin-bottom: 20px;">
                                <label style="display:block; font-weight:600; color:#1f2937; margin-bottom:8px; font-size:0.95rem;">
                                    Votre nom et prénom <span style="color:#ef4444;">*</span>
                                </label>
                                <input type="text"
                                    name="nom"
                                    value="{{ old('nom') }}"
                                    placeholder="Ex : Kouamé Jean, Marie Konan..."
                                    required
                                    style="
                                        width: 100%;
                                        padding: 12px 16px;
                                        border: 1.5px solid #e2e8f0;
                                        border-radius: 10px;
                                        font-size: 1rem;
                                        color: #1f2937;
                                        background: white;
                                        transition: border-color 0.2s, box-shadow 0.2s;
                                        outline: none;
                                        box-sizing: border-box;
                                    "
                                    onfocus="this.style.borderColor='#2563eb'; this.style.boxShadow='0 0 0 3px rgba(37,99,235,0.12)'"
                                    onblur="this.style.borderColor='#e2e8f0'; this.style.boxShadow='none'"
                                >
                            </div>

                            <!-- Commentaire -->
                            <div style="margin-bottom: 24px;">
                                <label style="display:block; font-weight:600; color:#1f2937; margin-bottom:8px; font-size:0.95rem;">
                                    Votre commentaire <span style="color:#ef4444;">*</span>
                                </label>
                                <textarea
                                    name="commentaire"
                                    rows="4"
                                    placeholder="Qu'avez-vous apprécié ? Comment s'est déroulée la formation ? Quels sont les points forts ?"
                                    required
                                    style="
                                        width: 100%;
                                        padding: 12px 16px;
                                        border: 1.5px solid #e2e8f0;
                                        border-radius: 10px;
                                        font-size: 1rem;
                                        color: #1f2937;
                                        background: white;
                                        transition: border-color 0.2s, box-shadow 0.2s;
                                        outline: none;
                                        resize: vertical;
                                        min-height: 110px;
                                        box-sizing: border-box;
                                        font-family: inherit;
                                    "
                                    onfocus="this.style.borderColor='#2563eb'; this.style.boxShadow='0 0 0 3px rgba(37,99,235,0.12)'"
                                    onblur="this.style.borderColor='#e2e8f0'; this.style.boxShadow='none'"
                                >{{ old('commentaire') }}</textarea>
                            </div>

                            <!-- Bouton Envoyer -->
                            <div>
                                <button type="submit" style="
                                    width: 100%;
                                    padding: 14px 24px;
                                    background: linear-gradient(135deg, #2563eb, #1d4ed8);
                                    color: white;
                                    border: none;
                                    border-radius: 12px;
                                    font-size: 1rem;
                                    font-weight: 700;
                                    cursor: pointer;
                                    display: flex;
                                    align-items: center;
                                    justify-content: center;
                                    gap: 8px;
                                    transition: all 0.25s;
                                    box-shadow: 0 4px 12px rgba(37,99,235,0.25);
                                "
                                onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 20px rgba(37,99,235,0.35)'"
                                onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 12px rgba(37,99,235,0.25)'"
                                >
                                    <i class="fas fa-paper-plane"></i>
                                    Envoyer mon avis
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                {{-- ===== FIN FORMULAIRE NOTER CE COURS ===== --}}

            </div>

            <div class="futur-sidebar">
                <div class="futur-sticky">
                    @php
                        function extrairePrix($texte) {
                            if (preg_match('/(\d[\d\s]*)\s*FCFA/i', $texte, $matches)) {
                                return (int) str_replace(' ', '', $matches[1]);
                            }
                            return 0;
                        }
                        $prixBase = extrairePrix($cours->tarif ?? '');
                        if ($prixBase == 0) { $prixBase = 450000; }
                        $prixStandard = round($prixBase * 0.90);
                        $prixPremium = round($prixBase * 0.80);
                        $formatPrix = function($prix) {
                            return number_format($prix, 0, ',', ' ') . ' FCFA';
                        };
                    @endphp

                    <div class="futur-hero-actions mt-3 mb-4">
                        <a href="{{ route('cours.pdf.form', $cours) }}" class="btn-pdf" style="width: 100%; justify-content: center;">
                            <i class="fas fa-file-pdf"></i> Télécharger la fiche PDF
                        </a>
                    </div>

                    <!-- ===== ONGLETS DE PRIX (STYLE IMAGE) ===== -->
                    <!-- ===== ONGLETS DE PRIX (STYLE IMAGE) ===== -->
<div class="pricing-tabs-wrapper">
    <div class="pricing-tabs-nav">
        <button class="pricing-tab-btn active" onclick="switchPricingTab('inter')">Individuel</button>
        <button class="pricing-tab-btn" onclick="switchPricingTab('intra')">Groupe Standard</button>
        <button class="pricing-tab-btn" onclick="switchPricingTab('sur-mesure')">Groupe Premium</button>
    </div>

    <!-- INTER (Individuel) -->
    <div class="pricing-tab-content active" id="tab-inter">
        <div class="pricing-tab-header">
            <div>
                <div class="pricing-medal">🥉</div>
               
                <div class="pricing-tab-location">{{ $formatPrix($prixBase) }} / personne</div>
                
            </div>
            <button class="pricing-tab-cart" onclick="window.location='{{ route('devis.create', $cours) }}?type=inter&prix={{ $prixBase }}'">
                <i class="fas fa-shopping-cart"></i>
            </button>
        </div>
        <div class="pricing-tab-details">
            <div class="pricing-tab-detail">
                <i class="fas fa-check-circle"></i>
                <span>Formation complète</span>
            </div>
            <div class="pricing-tab-detail ">
                <i class="fas fa-certificate"></i>
                <span>Certification incluse</span>
            </div>
            
        </div>
        <div class="pricing-tab-footer">
            
        </div>
        <button class="pricing-tab-btn-action bronze" onclick="window.location='{{ route('devis.create', $cours) }}?type=inter&prix={{ $prixBase }}'">
            <i class="fas fa-user"></i>  Je m’inscris
        </button>
    </div>

    <!-- INTRA (Groupe Standard) -->
    <div class="pricing-tab-content" id="tab-intra">
        <div class="pricing-tab-header">
    <div class="pricing-info">
        <div class="pricing-medal">🥈</div>

        <div>
            3 à 6 pers
            <span class="free-meal">(10 % Réduction)</span>
        </div>

        <div class="pricing-tab-location">
            {{ $formatPrix($prixStandard) }} / personne
        </div>
    </div>

    <button class="pricing-tab-cart"
        onclick="window.location='{{ route('devis.create', $cours) }}?type=intra&prix={{ $prixStandard }}'">
        <i class="fas fa-shopping-cart"></i>
    </button>
</div>
        <div class="pricing-tab-details">
           <div class="pricing-tab-detail">
                <i class="fas fa-check-circle"></i>
                <span>Formation complète</span>
            </div>
            <div class="pricing-tab-detail ">
                <i class="fas fa-certificate"></i>
                <span>Certification incluse</span>
            </div>
        </div>
        <div class="pricing-tab-footer">
            
        </div>
        <button class="pricing-tab-btn-action silver" onclick="window.location='{{ route('devis.create', $cours) }}?type=intra&prix={{ $prixStandard }}'">
            <i class="fas fa-paper-plane"></i> Demander un devis 
        </button>
    </div>

    <!-- SUR-MESURE (Groupe Premium) -->
    <div class="pricing-tab-content" id="tab-sur-mesure">
        <div class="pricing-tab-header">
    <div class="pricing-info">
        <div class="pricing-medal">🥇</div>

        <div>
            7 à 10 pers  <span class="free-meal">(20 % Réduction)</span>
        </div>

        <div class="pricing-tab-location" >
            {{ $formatPrix($prixPremium) }} / personne
        </div>
    </div>

    <button class="pricing-tab-cart"
        onclick="window.location='{{ route('devis.create', $cours) }}?type=sur-mesure&prix={{ $prixPremium }}'">
        <i class="fas fa-shopping-cart"></i>
    </button>
</div>
        <div class="pricing-tab-details">
           <div class="pricing-tab-detail">
                <i class="fas fa-check-circle"></i>
                <span>Formation complète</span>
            </div>
            <div class="pricing-tab-detail ">
                <i class="fas fa-certificate"></i>
                <span>Certification incluse</span>
            </div>
            
        <div class="pricing-tab-detail ">
                <i class="fas fa-certificate"></i>
                <span>Bonus et support prioritaire</span>
            </div>
        </div>
        <div class="pricing-tab-footer">
            
        </div>
        <button class="pricing-tab-btn-action gold" onclick="window.location='{{ route('devis.create', $cours) }}?type=sur-mesure&prix={{ $prixPremium }}'">
            <i class="fas fa-paper-plane"></i> Demander un devis 
        </button>
    </div>
</div>

                    <div class="futur-card mb-4">
                        <div class="futur-card-header">
                            <i class="fas fa-info-circle"></i>
                            <h3>Infos pratiques</h3>
                        </div>
                        <div class="futur-card-body">
                            @if($cours->reference_formation)
                                <div class="futur-detail">
                                    <div class="futur-detail-icon"><i class="fas fa-hashtag"></i></div>
                                    <div>
                                        <div class="futur-detail-label">Référence</div>
                                        <div class="futur-detail-value">{{ $cours->reference_formation }}</div>
                                    </div>
                                </div>
                            @endif
                            <div class="futur-detail">
                                <div class="futur-detail-icon"><i class="fas fa-clock"></i></div>
                                <div>
                                    <div class="futur-detail-label">Durée</div>
                                    <div class="futur-detail-value">{{ $cours->duree }}</div>
                                </div>
                            </div>
                            <div class="futur-detail">
                                <div class="futur-detail-icon"><i class="fas fa-map-marker-alt"></i></div>
                                <div>
                                    <div class="futur-detail-label">Lieu</div>
                                    <div class="futur-detail-value">{{ $cours->lieu }}</div>
                                </div>
                            </div>
                            @if($cours->date_de_session || $cours->date_sessions)
                                <div class="futur-detail">
                                    <div class="futur-detail-icon"><i class="fas fa-calendar-alt"></i></div>
                                    <div>
                                        <div class="futur-detail-label">Prochaines sessions</div>
                                        <div class="futur-detail-value dates-session">
                                            @if($cours->date_de_session)
                                                <span class="date-badge"><i class="fas fa-calendar"></i> {{ $cours->date_de_session }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="futur-detail">
                                <div class="futur-detail-icon"><i class="fas fa-user-check"></i></div>
                                <div>
                                    <div class="futur-detail-label">Public cible</div>
                                    <div class="futur-detail-value">{{ $cours->public_cible }}</div>
                                </div>
                            </div>
                            @if($cours->nombre_de_participants)
                                <div class="futur-detail">
                                    <div class="futur-detail-icon"><i class="fas fa-users"></i></div>
                                    <div>
                                        <div class="futur-detail-label">Nombre de participants</div>
                                        <div class="futur-detail-value">{{ $cours->nombre_de_participants }}</div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="futur-card mb-4">
                        <div class="futur-card-header">
                            <i class="fas fa-check-circle"></i>
                            <h2>Prérequis</h2>
                        </div>
                        <div class="futur-card-body">
                            @php
                                $points = explode("\n", $cours->prerequis);
                            @endphp
                            <ul class="points-list">
                                @foreach($points as $point)
                                    @if(trim($point) != '')
                                        <li>{{ trim($point) }}</li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="futur-card futur-highlights">
                        <div class="futur-card-header">
                            <i class="fas fa-star"></i>
                            <h3>Les + de la formation</h3>
                        </div>
                        <div class="futur-card-body">
                            <div class="futur-highlight"><i class="fas fa-certificate"></i><span>Certification incluse</span></div>
                            <div class="futur-highlight"><i class="fas fa-users"></i><span>Petit groupe (max 10)</span></div>
                            <div class="futur-highlight"><i class="fas fa-laptop"></i><span>Matériel fourni</span></div>
                            <div class="futur-highlight"><i class="fas fa-headset"></i><span>Support post-formation</span></div>
                        </div>
                    </div>

                    <div class="futur-card mb-4">
                        <div class="futur-card-header">
                            <i class="fas fa-check-circle"></i>
                            <h2>Les points forts de la formation</h2>
                        </div>
                        <div class="futur-card-body">
                            @php
                                $points = explode("\n", $cours->POINTS_FORTS);
                            @endphp
                            <ul class="points-forts-list">
                                @foreach($points as $point)
                                    @if(trim($point) != '')
                                        <li>{{ trim($point) }}</li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="futur-cta">
            <h2>Prêt à commencer cette formation ?</h2>
            <p>Contactez-nous pour plus d'informations ou pour réserver votre place</p>
            <div class="futur-cta-actions">
                <button class="futur-cta-btn primary" onclick="window.location='mailto:formationpro@monprofchezmoi-ci.com'">
                    <i class="fas fa-envelope"></i> Nous contacter
                </button>
                <button class="futur-cta-btn secondary" onclick="window.location='tel:+225071000588'">
                    <i class="fas fa-phone"></i> +225 07 10 00 05 88 / 07 13 41 44 85
                </button>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="footer-brand">
                        <i class="fas fa-graduation-caps"></i>
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
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        // ===== SCRIPT ONGLETS PRIX =====
        function switchPricingTab(tabName) {
            // Retirer active de tous les boutons
            document.querySelectorAll('.pricing-tab-btn').forEach(btn => {
                btn.classList.remove('active');
            });
            // Retirer active de tous les contenus
            document.querySelectorAll('.pricing-tab-content').forEach(content => {
                content.classList.remove('active');
            });
            // Ajouter active au bouton cliqué
            event.target.classList.add('active');
            // Ajouter active au contenu correspondant
            document.getElementById('tab-' + tabName).classList.add('active');
        }

        // ===== SCRIPT CARROUSEL FORMATEURS =====
        let currentFormateur = 0;
        const formateurContents = document.querySelectorAll('.formateur-content[data-index]');
        const formateurDots = document.querySelectorAll('.formateur-dot');
        const totalFormateurs = formateurContents.length;

        function showFormateur(index) {
            formateurContents.forEach(content => {
                content.style.display = 'none';
                content.style.opacity = '0';
            });
            formateurDots.forEach((dot, i) => {
                dot.classList.toggle('active', i === index);
            });
            const current = formateurContents[index];
            if (current) {
                current.style.display = 'flex';
                setTimeout(() => {
                    current.style.opacity = '1';
                    current.style.transition = 'opacity 0.4s ease';
                }, 10);
            }
            currentFormateur = index;
        }

        function changeFormateur(direction) {
            let newIndex = currentFormateur + direction;
            if (newIndex < 0) newIndex = totalFormateurs - 1;
            if (newIndex >= totalFormateurs) newIndex = 0;
            showFormateur(newIndex);
        }

        function goToFormateur(index) {
            showFormateur(index);
        }

        if (totalFormateurs > 0) {
            showFormateur(0);
        }
    </script>

    <script>
        // ===== ÉTOILES INTERACTIVES – FORMULAIRE INLINE COURS =====
        (function () {
            const container = document.querySelector('.inline-stars-container');
            if (!container) return;

            const labels  = Array.from(container.querySelectorAll('label'));
            const radios  = Array.from(container.querySelectorAll('input[type="radio"]'));
            const hint    = document.getElementById('inlineRatingHint');

            const starActive   = '#f59e0b';
            const starInactive = '#e5e7eb';

            function paintStars(upToValue) {
                labels.forEach(lbl => {
                    const v = parseInt(lbl.getAttribute('for').replace('istar',''));
                    lbl.style.color = v <= upToValue ? starActive : starInactive;
                    lbl.style.transform = v <= upToValue ? 'scale(1.1)' : 'scale(1)';
                });
            }

            function getCheckedValue() {
                const checked = container.querySelector('input[type="radio"]:checked');
                return checked ? parseInt(checked.value) : 0;
            }

            function updateHint(val) {
                const map = {
                    5: '5/5 – Excellent ! ⭐⭐⭐⭐⭐',
                    4: '4/5 – Très bien ! ⭐⭐⭐⭐',
                    3: '3/5 – Bien ⭐⭐⭐',
                    2: '2/5 – Passable ⭐⭐',
                    1: '1/5 – À améliorer ⭐'
                };
                if (map[val]) {
                    hint.textContent = map[val];
                    hint.style.color = '#d97706';
                } else {
                    hint.textContent = 'Cliquez sur une étoile';
                    hint.style.color = '#9ca3af';
                }
            }

            labels.forEach(lbl => {
                const v = parseInt(lbl.getAttribute('for').replace('istar',''));

                lbl.addEventListener('mouseenter', () => {
                    paintStars(v);
                    updateHint(v);
                });
                lbl.addEventListener('mouseleave', () => {
                    paintStars(getCheckedValue());
                    updateHint(getCheckedValue());
                });
                lbl.addEventListener('click', () => {
                    setTimeout(() => {
                        paintStars(getCheckedValue());
                        updateHint(getCheckedValue());
                    }, 10);
                });
            });

            radios.forEach(radio => {
                radio.addEventListener('change', () => {
                    paintStars(parseInt(radio.value));
                    updateHint(parseInt(radio.value));
                });
            });

            // Initialiser si old('etoiles') est déjà coché
            paintStars(getCheckedValue());
            updateHint(getCheckedValue());
        })();

        // Scroll vers le formulaire si ancre #laisser-avis ou #avis
        if (window.location.hash === '#laisser-avis' || window.location.hash === '#avis') {
            setTimeout(() => {
                const el = document.getElementById('laisser-avis');
                if (el) el.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }, 300);
        }
    </script>
            }, 300);
        }
    </script>
</body>
</html>