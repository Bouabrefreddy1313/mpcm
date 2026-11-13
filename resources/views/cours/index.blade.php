<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogue des Cours par Thématique - MonProfChezMoi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-blue: #5B8CC6;
            --light-blue: #E8F1F8;
            --primary-orange: #F4A261;
            --light-orange: #FFF3E6;
            --success-green: #48BB78;
            --light-green: #E6F9F0;
            --purple: #9F7AEA;
            --light-purple: #F5F0FF;
            --text-dark: #2D3748;
            --text-gray: #718096;
            --bg-light: #F7FAFC;
            --white: #FFFFFF;
            --border-color: #E2E8F0;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: var(--bg-light);
            color: var(--text-dark);
            min-height: 100vh;
            padding-bottom: 3rem;
        }

        /* Top Header */
        .page-header {
            background: var(--white);
            border-bottom: 1px solid var(--border-color);
            padding: 1.5rem 2rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.03);
            margin-bottom: 2rem;
        }

        .header-content {
            max-width: 1300px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .header-title-group h1 {
            font-size: 1.75rem;
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 0.25rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .header-title-group h1 i {
            color: var(--primary-orange);
        }

        .header-title-group p {
            color: var(--text-gray);
            font-size: 0.95rem;
            margin: 0;
        }

        .header-actions {
            display: flex;
            gap: 0.75rem;
            align-items: center;
        }

        .btn-header {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.65rem 1.25rem;
            border-radius: 10px;
            font-weight: 600;
            font-size: 0.9rem;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-header-light {
            background: var(--light-blue);
            color: var(--primary-blue);
            border: 1px solid rgba(91, 140, 198, 0.2);
        }

        .btn-header-light:hover {
            background: var(--primary-blue);
            color: var(--white);
            transform: translateY(-2px);
        }

        .btn-header-primary {
            background: linear-gradient(135deg, var(--primary-blue), #4A7AB8);
            color: var(--white);
            border: none;
            box-shadow: 0 4px 12px rgba(91, 140, 198, 0.3);
        }

        .btn-header-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(91, 140, 198, 0.4);
            color: var(--white);
        }

        .container-custom {
            max-width: 1300px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }

        /* Filter Card */
        .filter-card {
            background: var(--white);
            border-radius: 16px;
            border: 1px solid var(--border-color);
            padding: 1.75rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.04);
            margin-bottom: 2rem;
            transition: all 0.3s ease;
        }

        .filter-label {
            font-weight: 700;
            font-size: 0.95rem;
            color: var(--text-dark);
            margin-bottom: 0.6rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .filter-label i {
            color: var(--primary-blue);
        }

        .select-custom {
            height: 52px;
            border: 2px solid var(--border-color);
            border-radius: 12px;
            padding: 0 1.25rem;
            font-size: 1rem;
            font-weight: 500;
            color: var(--text-dark);
            background-color: var(--bg-light);
            transition: all 0.3s ease;
        }

        .select-custom:focus {
            outline: none;
            border-color: var(--primary-blue);
            background-color: var(--white);
            box-shadow: 0 0 0 4px rgba(91, 140, 198, 0.15);
        }

        .btn-afficher {
            height: 52px;
            padding: 0 2rem;
            background: linear-gradient(135deg, var(--primary-blue), var(--primary-orange));
            border: none;
            border-radius: 12px;
            color: var(--white);
            font-weight: 700;
            font-size: 1rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.6rem;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(91, 140, 198, 0.3);
        }

        .btn-afficher:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(91, 140, 198, 0.4);
            color: var(--white);
        }

        /* Results Card */
        .results-card {
            background: var(--white);
            border-radius: 16px;
            border: 1px solid var(--border-color);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.04);
            overflow: hidden;
            animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(15px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .results-header {
            padding: 1.5rem 1.75rem;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
            background: #FAFCFE;
        }

        .results-info h2 {
            font-size: 1.25rem;
            font-weight: 800;
            color: var(--text-dark);
            margin: 0 0 0.25rem 0;
            display: flex;
            align-items: center;
            gap: 0.6rem;
        }

        .badge-thematique {
            background: var(--light-blue);
            color: var(--primary-blue);
            font-size: 0.85rem;
            font-weight: 700;
            padding: 0.35rem 0.85rem;
            border-radius: 20px;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
        }

        .badge-count {
            background: var(--light-orange);
            color: var(--primary-orange);
            font-size: 0.8rem;
            font-weight: 700;
            padding: 0.3rem 0.75rem;
            border-radius: 20px;
        }

        .search-table-wrapper {
            position: relative;
            max-width: 320px;
            width: 100%;
        }

        .search-table-wrapper i {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-gray);
            font-size: 0.9rem;
        }

        .search-table-input {
            width: 100%;
            padding: 0.65rem 1rem 0.65rem 2.5rem;
            border: 1.5px solid var(--border-color);
            border-radius: 10px;
            font-size: 0.9rem;
            background: var(--white);
            transition: all 0.3s ease;
        }

        .search-table-input:focus {
            outline: none;
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 3px rgba(91, 140, 198, 0.15);
        }

        /* Modern Table */
        .table-responsive {
            overflow-x: auto;
        }

        .custom-table {
            width: 100%;
            border-collapse: collapse;
            margin: 0;
        }

        .custom-table thead {
            background: #F8FAFC;
        }

        .custom-table th {
            padding: 1rem 1.25rem;
            font-size: 0.82rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: var(--text-gray);
            border-bottom: 2px solid var(--border-color);
            white-space: nowrap;
        }

        .custom-table td {
            padding: 1.15rem 1.25rem;
            vertical-align: middle;
            border-bottom: 1px solid var(--border-color);
            color: var(--text-dark);
            font-size: 0.95rem;
        }

        .custom-table tbody tr {
            transition: all 0.2s ease;
        }

        .custom-table tbody tr:hover {
            background-color: #F8FBFE;
        }

        /* Columns Styling */
        .badge-sous-thematique {
            background: var(--light-blue);
            color: var(--primary-blue);
            font-size: 0.85rem;
            font-weight: 600;
            padding: 0.4rem 0.75rem;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            border: 1px solid rgba(91, 140, 198, 0.15);
        }

        .cours-title {
            font-weight: 700;
            color: var(--text-dark);
            text-decoration: none;
            transition: color 0.2s ease;
            display: block;
        }

        .cours-title:hover {
            color: var(--primary-blue);
        }

        .badge-duree {
            background: var(--light-orange);
            color: #C05621;
            font-size: 0.85rem;
            font-weight: 600;
            padding: 0.35rem 0.75rem;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            white-space: nowrap;
        }

        .badge-public {
            background: var(--light-green);
            color: #276749;
            font-size: 0.85rem;
            font-weight: 600;
            padding: 0.35rem 0.75rem;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
        }

        .btn-action-view {
            width: 36px;
            height: 36px;
            border-radius: 8px;
            background: var(--light-blue);
            color: var(--primary-blue);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .btn-action-view:hover {
            background: var(--primary-blue);
            color: var(--white);
            transform: scale(1.05);
        }

        /* Empty State Card */
        .empty-state {
            padding: 4rem 2rem;
            text-align: center;
        }

        .empty-state-icon {
            width: 80px;
            height: 80px;
            border-radius: 24px;
            background: var(--light-blue);
            color: var(--primary-blue);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 2.2rem;
            margin-bottom: 1.25rem;
        }

        .empty-state h3 {
            font-size: 1.35rem;
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 0.5rem;
        }

        .empty-state p {
            color: var(--text-gray);
            font-size: 0.95rem;
            max-width: 480px;
            margin: 0 auto;
        }

        @media (max-width: 768px) {
            .page-header {
                padding: 1rem;
            }

            .filter-card {
                padding: 1.25rem;
            }

            .results-header {
                padding: 1rem;
            }

            .search-table-wrapper {
                max-width: none;
            }
        }
    </style>
</head>
<body>

    <!-- Header -->
    <header class="page-header">
        <div class="header-content">
            <div class="header-title-group">
                <h1>
                    <i class="fas fa-graduation-cap"></i>
                    <span>Catalogue des Cours</span>
                </h1>
                <p>Consultez les cours, durées et publics cibles filtrés par thématique</p>
            </div>
            <div class="header-actions">
                @auth
                    @if(auth()->user()->isCommercial())
                        <a href="{{ route('commercial.dashboard') }}" class="btn-header btn-header-light">
                            <i class="fas fa-arrow-left"></i>
                            <span>Dashboard Commercial</span>
                        </a>
                    @else
                        <a href="{{ route('dashboard') }}" class="btn-header btn-header-light">
                            <i class="fas fa-arrow-left"></i>
                            <span>Dashboard Admin</span>
                        </a>
                    @endif
                @else
                    <a href="{{ route('home') }}" class="btn-header btn-header-light">
                        <i class="fas fa-home"></i>
                        <span>Accueil</span>
                    </a>
                @endauth
                <a href="{{ route('cours.create') }}" class="btn-header btn-header-primary">
                    <i class="fas fa-plus"></i>
                    <span>Nouveau Cours</span>
                </a>
            </div>
        </div>
    </header>

    <main class="container-custom">
        <!-- Filter Form -->
        <div class="filter-card">
            <form method="GET" action="{{ route('cours.index') }}">
                <div class="row g-3 align-items-end">
                    <div class="col-md-9 col-lg-9">
                        <label for="formation_id" class="filter-label">
                            <i class="fas fa-layer-group"></i>
                            <span>Sélectionner une Thématique</span>
                        </label>
                        <select name="formation_id" id="formation_id" class="form-select select-custom" required>
                            <option value="" disabled {{ empty($selectedFormationId) ? 'selected' : '' }}>
                                -- Choisissez une thématique dans la liste --
                            </option>
                            <option value="all" {{ $selectedFormationId === 'all' ? 'selected' : '' }}>
                                ✨ Toutes les thématiques
                            </option>
                            @foreach ($formations as $formation)
                                <option value="{{ $formation->id }}" {{ $selectedFormationId == $formation->id ? 'selected' : '' }}>
                                    {{ $formation->nom }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 col-lg-3">
                        <button type="submit" class="btn-afficher w-100">
                            <i class="fas fa-eye"></i>
                            <span>Afficher</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Results Table Section -->
        @if (!empty($selectedFormationId))
            <div class="results-card">
                <div class="results-header">
                    <div class="results-info">
                        <h2>
                            @if ($selectedFormationId === 'all')
                                <span>Toutes les Thématiques</span>
                            @elseif ($selectedFormation)
                                <span>{{ $selectedFormation->nom }}</span>
                            @endif
                            <span class="badge-count">{{ $cours->count() }} cours</span>
                        </h2>
                    </div>
                    @if ($cours->isNotEmpty())
                        <div class="search-table-wrapper">
                            <i class="fas fa-search"></i>
                            <input type="text" id="tableSearch" class="search-table-input" placeholder="Filtrer dans ce tableau...">
                        </div>
                    @endif
                </div>

                @if ($cours->isNotEmpty())
                    <div class="table-responsive">
                        <table class="custom-table" id="coursTable">
                            <thead>
                                <tr>
                                    <th style="width: 5%;">#</th>
                                    <th style="width: 25%;">Sous-Thématique</th>
                                    <th style="width: 35%;">Cours</th>
                                    <th style="width: 15%;">Durée</th>
                                    <th style="width: 15%;">Public</th>
                                    <th style="width: 5%; text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cours as $index => $cour)
                                    <tr>
                                        <td class="text-muted fw-bold">{{ $index + 1 }}</td>
                                        <td>
                                            <span class="badge-sous-thematique">
                                                <i class="fas fa-folder me-1"></i>
                                                {{ $cour->sousFormation->nom ?? 'Non définie' }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('cours.show', $cour->id) }}" class="cours-title">
                                                {{ $cour->titre }}
                                            </a>
                                            @if(!empty($cour->description))
                                                <small class="text-muted d-block mt-1 text-truncate" style="max-width: 420px;">
                                                    {{ Str::limit($cour->description, 85) }}
                                                </small>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="badge-duree">
                                                <i class="far fa-clock"></i>
                                                {{ $cour->duree ?? 'Non spécifiée' }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge-public">
                                                <i class="fas fa-users"></i>
                                                {{ $cour->public_cible ?? 'Tout public' }}
                                            </span>
                                        </td>
                                        <td style="text-align: center;">
                                            <a href="{{ route('cours.show', $cour->id) }}" class="btn-action-view" title="Consulter la fiche du cours">
                                                <i class="fas fa-external-link-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="empty-state">
                        <div class="empty-state-icon" style="background: var(--light-orange); color: var(--primary-orange);">
                            <i class="fas fa-folder-open"></i>
                        </div>
                        <h3>Aucun cours trouvé</h3>
                        <p>Il n'y a actuellement aucun cours enregistré sous cette thématique.</p>
                        <a href="{{ route('cours.create') }}" class="btn btn-primary mt-3" style="background: var(--primary-blue); border: none; border-radius: 10px; padding: 0.6rem 1.5rem;">
                            <i class="fas fa-plus me-1"></i> Ajouter un cours
                        </a>
                    </div>
                @endif
            </div>
        @else
            <!-- Initial State (No Thématique Selected Yet) -->
            <div class="results-card">
                <div class="empty-state">
                    <div class="empty-state-icon">
                        <i class="fas fa-hand-pointer"></i>
                    </div>
                    <h3>Choisissez une thématique</h3>
                    <p>Veuillez sélectionner une thématique dans le menu déroulant ci-dessus, puis appuyez sur le bouton <strong>Afficher</strong> pour visualiser le tableau des cours, sous-thématiques, durées et publics correspondants.</p>
                </div>
            </div>
        @endif
    </main>

    <script>
        // Live client-side filter in the rendered table
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('tableSearch');
            const table = document.getElementById('coursTable');

            if (searchInput && table) {
                searchInput.addEventListener('input', function() {
                    const query = this.value.toLowerCase().trim();
                    const rows = table.querySelectorAll('tbody tr');

                    rows.forEach(row => {
                        const rowText = row.innerText.toLowerCase();
                        if (rowText.includes(query)) {
                            row.style.display = '';
                        } else {
                            row.style.display = 'none';
                        }
                    });
                });
            }
        });
    </script>
</body>
</html>