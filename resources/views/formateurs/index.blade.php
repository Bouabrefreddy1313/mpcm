<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Formateurs - MonProfChezMoi</title>
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
            --danger-red: #EF4444;
        }

        body { background: var(--bg-light); }

        .page-header {
            background: linear-gradient(135deg, var(--primary-blue), var(--dark-blue));
            color: white;
            padding: 2.5rem 2rem;
            border-radius: 16px;
            margin-bottom: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .page-header h1 {
            font-size: 1.8rem;
            font-weight: 700;
            margin: 0;
        }

        .btn-add {
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

        .btn-add:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(249,115,22,0.3);
            color: white;
        }

        .formateur-card {
            background: white;
            border-radius: 16px;
            border: 1px solid var(--border-color);
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
            overflow: hidden;
            transition: all 0.3s;
            height: 100%;
        }

        .formateur-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 40px rgba(37,99,235,0.12);
        }

        .formateur-card-header {
            background: linear-gradient(135deg, var(--lighter-blue), #dbeafe);
            padding: 1.5rem;
            text-align: center;
            position: relative;
        }

        .formateur-avatar {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            border: 4px solid white;
            box-shadow: 0 4px 15px rgba(0,0,0,0.15);
            margin: 0 auto 1rem;
            overflow: hidden;
            background: linear-gradient(135deg, var(--primary-blue), var(--primary-orange));
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .formateur-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .formateur-avatar-placeholder {
            font-size: 2rem;
            color: white;
            font-weight: 700;
        }

        .formateur-status {
            position: absolute;
            top: 1rem;
            right: 1rem;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            border: 2px solid white;
        }

        .formateur-status.actif { background: var(--success-green); }
        .formateur-status.inactif { background: var(--danger-red); }

        .formateur-card-body {
            padding: 1.5rem;
        }

        .formateur-name {
            font-size: 1.15rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 0.25rem;
            text-align: center;
        }

        .formateur-function {
            font-size: 0.85rem;
            color: var(--primary-blue);
            text-align: center;
            margin-bottom: 1rem;
            font-weight: 500;
        }

        .formateur-cours {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.85rem;
            color: var(--text-gray);
            margin-bottom: 1rem;
            padding: 0.5rem;
            background: var(--bg-light);
            border-radius: 8px;
        }

        .formateur-cours i {
            color: var(--primary-orange);
        }

        .formateur-expertise {
            font-size: 0.8rem;
            color: var(--text-gray);
            line-height: 1.5;
            margin-bottom: 1rem;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .formateur-actions {
            display: flex;
            gap: 0.5rem;
        }

        .btn-action {
            flex: 1;
            padding: 0.6rem;
            border-radius: 8px;
            border: none;
            font-size: 0.85rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.4rem;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.3s;
        }

        .btn-view {
            background: var(--lighter-blue);
            color: var(--primary-blue);
        }

        .btn-view:hover {
            background: var(--primary-blue);
            color: white;
        }

        .btn-edit {
            background: var(--lighter-orange);
            color: var(--primary-orange);
        }

        .btn-edit:hover {
            background: var(--primary-orange);
            color: white;
        }

        .btn-delete {
            background: #FEF2F2;
            color: var(--danger-red);
        }

        .btn-delete:hover {
            background: var(--danger-red);
            color: white;
        }

        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
        }

        .empty-state i {
            font-size: 4rem;
            color: var(--border-color);
            margin-bottom: 1rem;
        }

        .empty-state h3 {
            color: var(--text-gray);
            margin-bottom: 0.5rem;
        }

        .pagination {
            justify-content: center;
            margin-top: 2rem;
        }

        .page-link {
            border-radius: 8px;
            margin: 0 0.25rem;
            color: var(--primary-blue);
            border: 1px solid var(--border-color);
        }

        .page-item.active .page-link {
            background: var(--primary-blue);
            border-color: var(--primary-blue);
        }

        .alert-success {
            background: #ECFDF5;
            color: #065F46;
            border: 1px solid #A7F3D0;
            border-radius: 10px;
            padding: 1rem;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="page-header">
            <h1><i class="fas fa-users"></i> Liste des formateurs</h1>
            <a href="{{ route('formateurs.create') }}" class="btn-add">
                <i class="fas fa-plus"></i> Ajouter un formateur
            </a>
        </div>

        @if(session('success'))
            <div class="alert-success">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
            </div>
        @endif

        @if($formateurs->count() > 0)
            <div class="row g-4">
                @foreach($formateurs as $formateur)
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="formateur-card">
                            <div class="formateur-card-header">
                                <div class="formateur-status {{ $formateur->actif ? 'actif' : 'inactif' }}" title="{{ $formateur->actif ? 'Actif' : 'Inactif' }}"></div>
                                <div class="formateur-avatar">
                                    @if($formateur->photo)
                                        <img src="{{ asset('storage/formateurs/' . $formateur->photo) }}" alt="{{ $formateur->nom }}">
                                    @else
                                        <div class="formateur-avatar-placeholder">
                                            {{ strtoupper(substr($formateur->nom, 0, 1)) }}
                                        </div>
                                    @endif
                                </div>
                                <div class="formateur-name">{{ $formateur->nom }}</div>
                                <div class="formateur-function">{{ $formateur->fonction_actuelle }}</div>
                            </div>
                            <div class="formateur-card-body">
                                <div class="formateur-cours">
                                    <i class="fas fa-book"></i>
                                    <span>{{ $formateur->cours->titre ?? 'Aucun cours lié' }}</span>
                                </div>
                                <div class="formateur-expertise">
                                    {{ $formateur->domaines_expertise }}
                                </div>
                                <div class="formateur-actions">
                                    <a href="{{ route('formateurs.show', $formateur->slug) }}" class="btn-action btn-view" title="Voir">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('formateurs.edit', $formateur->id) }}" class="btn-action btn-edit" title="Modifier">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <form action="{{ route('formateurs.destroy', $formateur->id) }}" method="POST" style="flex:1;" onsubmit="return confirm('Supprimer ce formateur ?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-action btn-delete" title="Supprimer" style="width:100%;">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="d-flex justify-content-center mt-4">
                {{ $formateurs->links() }}
            </div>
        @else
            <div class="empty-state">
                <i class="fas fa-user-tie"></i>
                <h3>Aucun formateur</h3>
                <p class="text-muted">Commencez par ajouter un formateur à votre catalogue.</p>
                <a href="{{ route('formateurs.create') }}" class="btn-add mt-3">
                    <i class="fas fa-plus"></i> Ajouter un formateur
                </a>
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>