<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bons de Formation - MonProfChezMoi</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
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
            color: #1e293b;
        }

        .hero-banner {
            background: linear-gradient(135deg, #1e293b 0%, #334155 100%);
            padding: 4rem 2rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .hero-banner::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg"><defs><pattern id="grid" width="100" height="100" patternUnits="userSpaceOnUse"><path d="M 100 0 L 0 0 0 100" fill="none" stroke="rgba(255,255,255,0.03)" stroke-width="1"/></pattern></defs><rect width="100%" height="100%" fill="url(%23grid)"/></svg>');
            opacity: 0.5;
        }

        .hero-content {
            position: relative;
            z-index: 1;
            max-width: 900px;
            margin: 0 auto;
        }

        .hero-logo {
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            border-radius: 24px;
            margin: 0 auto 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            animation: float 3s ease-in-out infinite;
            box-shadow: 0 20px 60px rgba(59, 130, 246, 0.4);
        }

        .hero-content h1 {
            font-size: 3rem;
            font-weight: 800;
            color: white;
            margin-bottom: 1rem;
            background: linear-gradient(135deg, #ffffff 0%, #cbd5e1 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-content p {
            font-size: 1.25rem;
            color: #94a3b8;
            line-height: 1.8;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 3rem 1.5rem;
        }

        .info-section {
            background: white;
            border-radius: 20px;
            padding: 2.5rem;
            margin-bottom: 3rem;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            animation: slideInUp 0.6s ease-out;
        }

        .info-section h2 {
            font-size: 2rem;
            color: #1e293b;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .info-section h2::before {
            content: "ℹ️";
            font-size: 2.5rem;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-top: 2rem;
        }

        .info-card {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            padding: 1.5rem;
            border-radius: 16px;
            border-left: 4px solid #3b82f6;
            transition: all 0.3s;
        }

        .info-card:hover {
            transform: translateX(5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .info-card h3 {
            font-size: 1.1rem;
            color: #1e293b;
            margin-bottom: 0.75rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .info-card p {
            color: #64748b;
            line-height: 1.6;
            font-size: 0.95rem;
        }

        .steps-section {
            background: white;
            border-radius: 20px;
            padding: 2.5rem;
            margin-bottom: 3rem;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        }

        .steps-section h2 {
            font-size: 2rem;
            color: #1e293b;
            margin-bottom: 2rem;
            text-align: center;
        }

        .steps-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .step-card {
            position: relative;
            background: linear-gradient(135deg, #f8fafc 0%, #ffffff 100%);
            padding: 2rem;
            border-radius: 16px;
            border: 2px solid #e2e8f0;
            transition: all 0.3s;
        }

        .step-card:hover {
            transform: translateY(-5px);
            border-color: #3b82f6;
            box-shadow: 0 15px 40px rgba(59, 130, 246, 0.2);
        }

        .step-number {
            position: absolute;
            top: -15px;
            left: 20px;
            width: 45px;
            height: 45px;
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 1.25rem;
            box-shadow: 0 8px 20px rgba(59, 130, 246, 0.4);
        }

        .step-card h3 {
            margin-top: 1rem;
            font-size: 1.25rem;
            color: #1e293b;
            margin-bottom: 0.75rem;
        }

        .step-card p {
            color: #64748b;
            line-height: 1.6;
        }

        /* ===== LISTE DES BONS (image à gauche, infos à droite) ===== */
        .bons-panel {
            background: white;
            border-radius: 20px;
            padding: 2rem 2.5rem 1.5rem;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
            animation: slideInUp 0.6s ease-out;
        }

        .bons-panel > h2 {
            font-size: 1.7rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 0.5rem;
        }

        .bon-row {
            display: flex;
            align-items: center;
            gap: 1.75rem;
            padding: 1.75rem 0;
            border-bottom: 1px solid #e2e8f0;
        }

        .bon-thumb {
            width: 140px;
            height: 160px;
            flex-shrink: 0;
            border-radius: 16px;
            overflow: hidden;
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3.2rem;
            box-shadow: 0 6px 18px rgba(15, 23, 42, 0.15);
        }

        .bon-thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .bon-info {
            flex: 1;
            min-width: 0;
        }

        .bon-title {
            font-size: 1.2rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 0.5rem;
        }

        .bon-price {
            font-size: 1.5rem;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 0.6rem;
            white-space: nowrap;
        }

        .bon-description {
            color: #475569;
            line-height: 1.6;
            font-size: 1rem;
        }

        .bon-tag {
            display: inline-block;
            margin-top: 0.7rem;
            background: #dcfce7;
            color: #15803d;
            padding: 0.2rem 0.75rem;
            border-radius: 999px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .btn-buy {
            flex-shrink: 0;
            padding: 0.85rem 1.4rem;
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 0.95rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 6px 18px rgba(59, 130, 246, 0.3);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            text-decoration: none;
        }

        .btn-buy:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 28px rgba(59, 130, 246, 0.5);
        }

        .btn-buy:focus-visible {
            outline: 3px solid rgba(249, 115, 22, 0.6);
            outline-offset: 2px;
        }

        .btn-buy::after {
            content: "→";
            font-size: 1.1rem;
            transition: transform 0.3s;
        }

        .btn-buy:hover::after {
            transform: translateX(4px);
        }

        .bons-note {
            color: #64748b;
            font-size: 0.9rem;
            padding-top: 1.25rem;
            line-height: 1.6;
        }

        .bons-empty {
            text-align: center;
            color: #64748b;
            padding: 3rem 1rem;
        }

        .faq-section {
            background: white;
            border-radius: 20px;
            padding: 2.5rem;
            margin-top: 3rem;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        }

        .faq-section h2 {
            font-size: 2rem;
            color: #1e293b;
            margin-bottom: 2rem;
            text-align: center;
        }

        .faq-item {
            border-bottom: 1px solid #e2e8f0;
            padding: 1.5rem 0;
        }

        .faq-question {
            font-weight: 600;
            color: #1e293b;
            font-size: 1.1rem;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 1rem;
            transition: color 0.3s;
        }

        .faq-question:hover {
            color: #3b82f6;
        }

        .faq-question::after {
            content: "+";
            font-size: 1.5rem;
            color: #3b82f6;
            transition: transform 0.3s;
        }

        .faq-question.active::after {
            transform: rotate(45deg);
        }

        .faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s ease-out;
            color: #64748b;
            line-height: 1.8;
        }

        .faq-answer.active {
            max-height: 500px;
            padding-top: 1rem;
        }

        .guarantee-banner {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
            padding: 2rem;
            border-radius: 16px;
            text-align: center;
            margin-top: 3rem;
            box-shadow: 0 10px 40px rgba(16, 185, 129, 0.3);
        }

        .guarantee-banner h3 {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }

        .guarantee-banner p {
            opacity: 0.95;
            font-size: 1.1rem;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
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

        .trust-badges {
            display: flex;
            justify-content: center;
            gap: 2rem;
            flex-wrap: wrap;
            margin-top: 2rem;
            padding: 2rem;
        }

        .trust-badge {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #94a3b8;
            font-size: 0.9rem;
        }

        .trust-badge::before {
            content: "✓";
            width: 30px;
            height: 30px;
            background: rgba(59, 130, 246, 0.1);
            color: #3b82f6;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .hero-content h1 {
                font-size: 2rem;
            }

            .info-grid, .steps-container {
                grid-template-columns: 1fr;
            }

            .container {
                padding: 2rem 1rem;
            }

            .bons-panel {
                padding: 1.5rem 1.25rem 1rem;
            }
        }

        @media (max-width: 640px) {
            .bon-row {
                display: grid;
                grid-template-columns: 96px 1fr;
                align-items: start;
                gap: 1rem;
            }

            .bon-thumb {
                width: 96px;
                height: 112px;
                font-size: 2.2rem;
                border-radius: 12px;
            }

            .bon-title { font-size: 1.05rem; }
            .bon-price { font-size: 1.3rem; }
            .bon-description { font-size: 0.92rem; }

            .btn-buy {
                grid-column: 1 / -1;
                width: 100%;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            * { animation: none !important; transition: none !important; }
        }
    </style>
</head>
<body>
    <div class="hero-banner">
        <div class="hero-content">
            <div class="hero-logo">
                <img src="{{ asset('img/logo.png') }}"
                     alt="MonProfChezMoi"
                     class="logo-img"
                     style="width: 100px; height: auto;">
            </div>
            <h1>Bons de Formation MonProfChezMoi</h1>
            <p>Offrez ou recevez le cadeau de la connaissance. Nos bons de formation sont valables sur l'ensemble de notre catalogue et personnalisables selon vos besoins.</p>
            <div class="trust-badges">
                <div class="trust-badge">Valable 12 mois</div>
                <div class="trust-badge">Aucune restriction</div>
                <div class="trust-badge">Transférable</div>
            </div>
        </div>
    </div>

    <div class="container">

        <!-- LISTE DES BONS -->
        <section class="bons-panel" aria-labelledby="bons-title">
            <h2 id="bons-title">Les bons de formation proposés</h2>

            @forelse ($bons->sortBy(fn ($b) => (float) preg_replace('/[^\d.]/', '', str_replace(',', '.', (string) $b->montant)))->values() as $bon)
                @php
                    // Image du bon : champ "image" si présent (URL complète ou chemin dans storage/public)
                    $img = $bon->image ?? null;
                    if ($img && !\Illuminate\Support\Str::startsWith($img, ['http://', 'https://', '/'])) {
                        $img = asset('storage/' . $img);
                    }
                    $montant = is_numeric($bon->montant)
                        ? number_format($bon->montant, 0, ',', ' ')
                        : $bon->montant;
                @endphp

                <article class="bon-row">
                    <div class="bon-thumb">
                        @if($img)
                            <img src="{{ $img }}" alt="{{ $bon->titre }}" loading="lazy">
                        @else
                            <span aria-hidden="true">🎁</span>
                        @endif
                    </div>

                    <div class="bon-info">
                        <h3 class="bon-title">{{ $bon->titre }}</h3>
                        <p class="bon-price">{{ $montant }} FCFA</p>
                        <p class="bon-description">{{ $bon->description }}</p>

                        @if($loop->index === 1)
                            <span class="bon-tag">Populaire</span>
                        @endif
                    </div>

                    <a href="{{ route('bons.show', $bon) }}" class="btn-buy">Acheter ce bon</a>
                </article>
            @empty
                <p class="bons-empty">Aucun bon de formation disponible pour le moment.</p>
            @endforelse

            <p class="bons-note">Les bons ont une validité de 12 mois, sont transférables et utilisables sur toutes nos formations. Un code unique et un certificat personnalisable sont inclus.</p>
        </section>

        <br><br>

        <div class="info-section">
            <h2>Pourquoi choisir nos bons de formation ?</h2>
            <div class="info-grid">
                <div class="info-card">
                    <h3>🎯 Flexibilité totale</h3>
                    <p>Utilisez votre bon pour n'importe quelle formation de notre catalogue. Changez d'avis ? Aucun problème !</p>
                </div>
                <div class="info-card">
                    <h3>⏰ Validité longue durée</h3>
                    <p>12 mois pour utiliser votre bon, à votre rythme. Planifiez votre formation quand vous le souhaitez.</p>
                </div>
                <div class="info-card">
                    <h3>🎁 Cadeau idéal</h3>
                    <p>Parfait pour offrir ! Vous recevez un certificat personnalisable à imprimer ou envoyer par email.</p>
                </div>
                <div class="info-card">
                    <h3>💼 Formations certifiantes</h3>
                    <p>Accédez à des formations de qualité avec certificat à la clé. Boostez votre carrière professionnelle.</p>
                </div>
            </div>
        </div>

        <div class="steps-section">
            <h2>Comment utiliser votre bon de formation ? 🚀</h2>
            <div class="steps-container">
                <div class="step-card">
                    <div class="step-number">1</div>
                    <h3>Achetez votre bon</h3>
                    <p>Choisissez le montant qui vous convient et procédez au paiement sécurisé. Vous recevez instantanément votre code unique par email.</p>
                </div>
                <div class="step-card">
                    <div class="step-number">2</div>
                    <h3>Choisissez votre formation</h3>
                    <p>Parcourez notre catalogue et sélectionnez la formation qui correspond à vos objectifs professionnels ou personnels.</p>
                </div>
                <div class="step-card">
                    <div class="step-number">3</div>
                    <h3>Activez votre bon</h3>
                    <p>Lors de l'inscription, entrez votre code unique dans le champ prévu. Le montant est automatiquement déduit de votre formation.</p>
                </div>
                <div class="step-card">
                    <div class="step-number">4</div>
                    <h3>Commencez à apprendre</h3>
                    <p>Accédez immédiatement à votre formation et progressez à votre rythme avec l'accompagnement de nos experts.</p>
                </div>
            </div>
        </div>

        <div class="guarantee-banner">
            <h3>🛡️ Garantie Satisfaction 100%</h3>
            <p>Si vous n'êtes pas satisfait de votre formation, nous vous remboursons intégralement sous 30 jours.</p>
        </div>

        <div class="faq-section">
            <h2>Questions fréquentes 💬</h2>

            <div class="faq-item">
                <div class="faq-question" onclick="toggleFaq(this)">
                    Puis-je offrir mon bon de formation à quelqu'un d'autre ?
                </div>
                <div class="faq-answer">
                    Oui, absolument ! Les bons de formation sont entièrement transférables. Vous recevez un certificat cadeau personnalisable que vous pouvez imprimer ou envoyer par email. Le bénéficiaire pourra utiliser le code unique pour s'inscrire à la formation de son choix.
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question" onclick="toggleFaq(this)">
                    Quelle est la durée de validité de mon bon ?
                </div>
                <div class="faq-answer">
                    Tous nos bons de formation sont valables 12 mois à partir de la date d'achat. Vous avez donc une année complète pour choisir et démarrer votre formation. Une fois la formation commencée, vous bénéficiez d'un accès illimité au contenu.
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question" onclick="toggleFaq(this)">
                    Puis-je utiliser plusieurs bons pour une même formation ?
                </div>
                <div class="faq-answer">
                    Oui, vous pouvez cumuler plusieurs bons de formation pour une formation dont le prix est supérieur. Par exemple, si vous avez deux bons de 100.000 FCFA et que la formation coûte 250.000 FCFA, vous ne paierez que 50.000 FCFA en complément.
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question" onclick="toggleFaq(this)">
                    Que se passe-t-il si ma formation coûte moins cher que mon bon ?
                </div>
                <div class="faq-answer">
                    Si le montant de votre bon est supérieur au prix de la formation choisie, le crédit restant reste disponible sur votre compte et peut être utilisé pour d'autres formations ou services MonProfChezMoi dans la limite de validité du bon.
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question" onclick="toggleFaq(this)">
                    Comment vais-je recevoir mon bon de formation ?
                </div>
                <div class="faq-answer">
                    Immédiatement après l'achat, vous recevez un email de confirmation contenant votre code unique et un certificat cadeau en PDF. Ce certificat est personnalisable avec le nom du bénéficiaire et un message personnel si vous le souhaitez.
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question" onclick="toggleFaq(this)">
                    Puis-je me faire rembourser mon bon ?
                </div>
                <div class="faq-answer">
                    Les bons de formation non utilisés peuvent être remboursés dans les 14 jours suivant l'achat, conformément à la législation en vigueur. Une fois le bon activé pour une formation, c'est notre garantie satisfaction de 30 jours qui s'applique.
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question" onclick="toggleFaq(this)">
                    Les formations sont-elles certifiantes ?
                </div>
                <div class="faq-answer">
                    Oui ! Toutes nos formations donnent accès à un certificat de réussite une fois les modules complétés et les évaluations validées. Certaines de nos formations sont également éligibles au FDFP et reconnues par des organismes professionnels.
                </div>
            </div>
        </div>
    </div>

    <script>
        // Toggle FAQ
        function toggleFaq(element) {
            const answer = element.nextElementSibling;
            const isActive = answer.classList.contains('active');

            // Ferme toutes les FAQ
            document.querySelectorAll('.faq-answer').forEach(ans => {
                ans.classList.remove('active');
            });
            document.querySelectorAll('.faq-question').forEach(q => {
                q.classList.remove('active');
            });

            // Ouvre la FAQ cliquée si elle n'était pas active
            if (!isActive) {
                answer.classList.add('active');
                element.classList.add('active');
            }
        }

        // Apparition des bons au défilement
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });

        document.querySelectorAll('.bon-row').forEach((row, index) => {
            row.style.opacity = '0';
            row.style.transform = 'translateY(24px)';
            row.style.transition = 'opacity 0.5s ease-out ' + (index * 0.08) + 's, transform 0.5s ease-out ' + (index * 0.08) + 's';
            observer.observe(row);
        });

        // Défilement doux pour les ancres
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });
    </script>
</body>
</html>