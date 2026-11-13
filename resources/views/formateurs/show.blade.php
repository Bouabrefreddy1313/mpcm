    <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $formateur->nom }} - MonProfChezMoi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-blue: #2563EB;
            --dark-blue: #1E40AF;
            --lighter-blue: #EFF6FF;
            --primary-orange: #F97316;
            --dark-orange: #EA580C;
            --lighter-orange: #FEF3C7;
            --pink-accent: #F472B6;
            --text-dark: #1F2937;
            --text-gray: #6B7280;
            --bg-light: #F9FAFB;
            --border-color: #E5E7EB;
            --success-green: #10B981;
        }

        body { background: var(--bg-light); }

        .fiche-header {
            background: linear-gradient(135deg, #0B1120 0%, #1a1f3a 100%);
            border-radius: 20px;
            padding: 3rem 2.5rem;
            margin-bottom: 2rem;
            position: relative;
            overflow: hidden;
        }

        .fiche-header::before {
            content: '';
            position: absolute;
            bottom: -50px;
            right: -50px;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(244,114,182,0.12) 0%, transparent 70%);
            border-radius: 50%;
        }

        .fiche-header-content {
            display: flex;
            align-items: center;
            gap: 2.5rem;
            position: relative;
            z-index: 1;
        }

        .fiche-avatar {
            width: 160px;
            height: 160px;
            border-radius: 50%;
            border: 5px solid rgba(255,255,255,0.15);
            overflow: hidden;
            flex-shrink: 0;
            box-shadow: 0 8px 30px rgba(0,0,0,0.3);
        }

        .fiche-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .fiche-avatar-placeholder {
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, var(--primary-blue), var(--primary-orange));
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 4rem;
            color: white;
            font-weight: 700;
        }

        .fiche-info {
            color: white;
        }

        .fiche-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(244,114,182,0.2);
            color: var(--pink-accent);
            padding: 0.4rem 1rem;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 1rem;
            border: 1px solid rgba(244,114,182,0.3);
        }

        .fiche-name {
            font-size: 2.2rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
        }

        .fiche-function {
            font-size: 1.1rem;
            color: rgba(255,255,255,0.8);
            margin-bottom: 1rem;
        }

        .fiche-cours-link {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--primary-orange);
            text-decoration: none;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.3s;
        }

        .fiche-cours-link:hover {
            color: var(--lighter-orange);
            gap: 0.75rem;
        }

        .section-card {
            background: white;
            border-radius: 16px;
            border: 1px solid var(--border-color);
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
            padding: 2rem;
            margin-bottom: 1.5rem;
        }

        .section-title {
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 1.25rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .section-title i {
            color: var(--primary-orange);
            font-size: 1.1rem;
        }

        .section-content {
            color: var(--text-gray);
            line-height: 1.8;
            font-size: 0.95rem;
        }

        .section-content p {
            margin-bottom: 0.75rem;
        }

        .section-content p:last-child {
            margin-bottom: 0;
        }

        .devise-box {
            background: linear-gradient(135deg, var(--lighter-blue), #dbeafe);
            border-left: 4px solid var(--primary-blue);
            padding: 1.5rem;
            border-radius: 0 12px 12px 0;
            font-style: italic;
            color: var(--text-dark);
            font-size: 1.05rem;
            line-height: 1.7;
        }

        .devise-box::before {
            content: '"';
            font-size: 2rem;
            color: var(--primary-blue);
            line-height: 1;
        }

        .domaines-list {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
        }

        .domaine-tag {
            background: var(--lighter-blue);
            color: var(--primary-blue);
            padding: 0.4rem 1rem;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 500;
        }

        .parcours-timeline {
            position: relative;
            padding-left: 1.5rem;
        }

        .parcours-timeline::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 3px;
            background: linear-gradient(to bottom, var(--primary-blue), var(--primary-orange));
            border-radius: 3px;
        }

        .parcours-item {
            position: relative;
            padding-bottom: 1.5rem;
        }

        .parcours-item::before {
            content: '';
            position: absolute;
            left: -1.65rem;
            top: 0.5rem;
            width: 12px;
            height: 12px;
            background: var(--primary-blue);
            border-radius: 50%;
            border: 3px solid white;
            box-shadow: 0 0 0 3px var(--lighter-blue);
        }

        .parcours-item:last-child {
            padding-bottom: 0;
        }

        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--text-gray);
            text-decoration: none;
            font-weight: 500;
            margin-bottom: 1.5rem;
            transition: all 0.3s;
        }

        .btn-back:hover {
            color: var(--primary-blue);
            gap: 0.75rem;
        }

        .btn-edit-fiche {
            background: linear-gradient(135deg, var(--primary-orange), var(--dark-orange));
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 10px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s;
        }

        .btn-edit-fiche:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(249,115,22,0.3);
            color: white;
        }

        @media (max-width: 768px) {
            .fiche-header-content {
                flex-direction: column;
                text-align: center;
            }

            .fiche-avatar {
                width: 120px;
                height: 120px;
            }

            .fiche-name {
                font-size: 1.6rem;
            }
        }
    </style>
</head>
<body>
    <div class="container py-5">
       

        <!-- Header -->
        <div class="fiche-header">
            <div class="fiche-header-content">
                <div class="fiche-avatar">
                    @if($formateur->photo)
                        <img src="{{ asset('storage/formateurs/' . $formateur->photo) }}" alt="{{ $formateur->nom }}">
                    @else
                        <div class="fiche-avatar-placeholder">
                            {{ strtoupper(substr($formateur->nom, 0, 1)) }}
                        </div>
                    @endif
                </div>
                <div class="fiche-info">
                    <div class="fiche-badge">
                        <i class="fas fa-star"></i> Formateur
                    </div>
                    <h1 class="fiche-name">{{ $formateur->nom }}</h1>
                    <p class="fiche-function">{{ $formateur->fonction_actuelle }}</p>
                    @if($formateur->cours)
                        <a href="{{ route('cours.show', $formateur->cours->id) }}" class="fiche-cours-link">
                            <i class="fas fa-book-open"></i> Voir le cours : {{ $formateur->cours->titre }}
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    @endif
                </div>
            </div>
        </div>

        <!-- Domaines d'intervention -->
        <div class="section-card">
            <h2 class="section-title"><i class="fas fa-crosshairs"></i> Domaines d'intervention</h2>
            <div class="section-content">
                <div class="domaines-list">
                    @foreach(explode(',', $formateur->domaines_intervention) as $domaine)
                        @if(trim($domaine))
                            <span class="domaine-tag">{{ trim($domaine) }}</span>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Domaines d'expertise -->
        <div class="section-card">
            <h2 class="section-title"><i class="fas fa-brain"></i> Domaines d'expertise</h2>
            <div class="section-content">
                <p>{{ $formateur->domaines_expertise }}</p>
            </div>
        </div>

        <!-- Parcours -->
        <div class="section-card">
            <h2 class="section-title"><i class="fas fa-road"></i> Parcours professionnel et académique</h2>
            <div class="section-content">
                <div class="parcours-timeline">
                    @foreach(explode("\n", $formateur->parcours_professionnel_academique) as $ligne)
                        @if(trim($ligne))
                            <div class="parcours-item">
                                <p>{{ trim($ligne) }}</p>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Style pédagogique -->
        <div class="section-card">
            <h2 class="section-title"><i class="fas fa-chalkboard-teacher"></i> Style pédagogique</h2>
            <div class="section-content">
                <p>{{ $formateur->style_pedagogique }}</p>
            </div>
        </div>

        <!-- Devise / Philosophie -->
        @if($formateur->devise_philosophie)
        <div class="section-card" style="border: none; box-shadow: none; padding: 0;">
            <div class="devise-box">
                {{ $formateur->devise_philosophie }}
            </div>
        </div>
        @endif

       
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>