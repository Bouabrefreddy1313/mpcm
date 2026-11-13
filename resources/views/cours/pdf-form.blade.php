<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Télécharger la fiche - {{ $cours->titre }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .form-card {
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            max-width: 500px;
            width: 100%;
            animation: slideUp 0.5s ease;
        }
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .form-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .form-header i {
            font-size: 50px;
            color: #dc2626;
            margin-bottom: 15px;
        }
        .form-header h2 {
            color: #333;
            font-size: 24px;
            margin-bottom: 10px;
        }
        .form-header p {
            color: #666;
            font-size: 14px;
        }
        .cours-info {
            background: #f8f9fa;
            border-radius: 12px;
            padding: 15px;
            margin-bottom: 25px;
            border-left: 4px solid #667eea;
        }
        .cours-info h4 {
            color: #667eea;
            font-size: 16px;
            margin: 0;
        }
        .form-label {
            font-weight: 600;
            color: #555;
            margin-bottom: 8px;
        }
        .form-control {
            border-radius: 12px;
            border: 2px solid #e5e7eb;
            padding: 12px 15px;
            transition: all 0.3s;
        }
        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }
        .btn-download {
            background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
            color: white;
            border: none;
            border-radius: 12px;
            padding: 15px;
            font-weight: 600;
            font-size: 16px;
            width: 100%;
            margin-top: 20px;
            transition: all 0.3s;
        }
        .btn-download:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(220, 38, 38, 0.4);
            color: white;
        }
        .btn-back {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #667eea;
            text-decoration: none;
            font-weight: 500;
        }
        .btn-back:hover {
            color: #764ba2;
        }
        .invalid-feedback {
            font-size: 13px;
        }
        /* container */
.custom-check {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    cursor: pointer;
    font-size: 13px;
    color: #555;
    line-height: 1.4;
    user-select: none;
}

/* cacher checkbox original */
.custom-check input {
    display: none;
}

/* carré custom */
.checkmark {
    width: 20px;
    height: 20px;
    border: 2px solid #667eea;
    border-radius: 6px;
    position: relative;
    flex-shrink: 0;
    transition: all 0.2s ease;
}

/* check (✔) */
.checkmark::after {
    content: "";
    position: absolute;
    display: none;
    left: 5px;
    top: 1px;
    width: 5px;
    height: 10px;
    border: solid white;
    border-width: 0 2px 2px 0;
    transform: rotate(45deg);
}

/* quand coché */
.custom-check input:checked + .checkmark {
    background: linear-gradient(135deg, #667eea, #764ba2);
    border-color: transparent;
}

.custom-check input:checked + .checkmark::after {
    display: block;
}

/* hover */
.custom-check:hover .checkmark {
    transform: scale(1.05);
}
    </style>
</head>
<body>

    <div class="form-card">
        <div class="form-header">
            <i class="fas fa-file-pdf"></i>
            <h2>Télécharger la fiche PDF</h2>
            <p>Veuillez remplir ce formulaire pour accéder au téléchargement</p>
        </div>

        <div class="cours-info">
            <small class="text-muted">Formation</small>
            <h4>{{ $cours->titre }}</h4>
        </div>

        <form action="{{ route('cours.pdf.download', $cours) }}" method="POST">
            @csrf
            
            <div class="mb-3">
    <label for="nom" class="form-label">
        <i class="fas fa-user me-2"></i>Nom et prénom *
    </label>

    <input type="text"
           class="form-control @error('nom') is-invalid @enderror"
           id="nom"
           name="nom"
           value="{{ old('nom') }}"
           placeholder="Ex: Jean Dupont"
           required>

    @error('nom')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

            <div class="mb-3">
                <label for="nom_entreprise" class="form-label">
                    <i class="fas fa-building me-2"></i>société *
                </label>
                <input type="text" 
                       class="form-control @error('nom_entreprise') is-invalid @enderror" 
                       id="nom_entreprise" 
                       name="nom_entreprise" 
                       value="{{ old('nom_entreprise') }}"
                       placeholder="Ex: Le nom de la societé"
                       required>
                @error('nom_entreprise')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
<div class="mb-3">
    <label for="telephone" class="form-label">
        <i class="fas fa-phone me-2"></i>Numéro de téléphone *
    </label>

    <input type="text"
           class="form-control @error('telephone') is-invalid @enderror"
           id="telephone"
           name="telephone"
           value="{{ old('telephone') }}"
           placeholder="Ex: +225 07 00 00 00 00"
           required>

    @error('telephone')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
            <div class="mb-3">
                <label for="email_entreprise" class="form-label">
                    <i class="fas fa-envelope me-2"></i>Email de l'entreprise *
                </label>
                <input type="email" 
                       class="form-control @error('email_entreprise') is-invalid @enderror" 
                       id="email_entreprise" 
                       name="email_entreprise" 
                       value="{{ old('email_entreprise') }}"
                       placeholder="Ex: contact@entreprise.com"
                       required>
                @error('email_entreprise')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 mt-4">

    <label class="custom-check">

        <input type="checkbox" required>

        <span class="checkmark"></span>

        <span class="check-text">
            En soumettant ce formulaire, j’accepte que mes informations soient utilisées par les équipes de
            <strong>MonProChezMoi</strong> pour le traitement de ma demande.
        </span>

    </label>

</div>

            <button type="submit" class="btn-download">
                <i class="fas fa-download me-2"></i>Télécharger le PDF
            </button>
        </form>

        <a href="{{ route('formations.index') }}" class="btn-back">
            <i class="fas fa-arrow-left me-2"></i>Retour au catalogue
        </a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>