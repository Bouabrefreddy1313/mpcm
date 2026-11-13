<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Fiche de formation - {{ $cours->titre }}</title>
    <style>
        @page { margin: 20mm; }
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            font-size: 11pt;
            line-height: 1.5;
            color: #333;
        }
        .header {
            text-align: center;
            border-bottom: 3px solid #4f46e5;
            padding-bottom: 15px;
            margin-bottom: 25px;
        }
        .header h1 {
            color: #4f46e5;
            font-size: 22pt;
            margin: 0 0 5px 0;
        }
        .header .badge {
            display: inline-block;
            background: #4f46e5;
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 9pt;
        }
        .section {
            margin-bottom: 20px;
        }
        .section-title {
            font-size: 13pt;
            font-weight: bold;
            color: #4f46e5;
            border-left: 4px solid #4f46e5;
            padding-left: 10px;
            margin-bottom: 10px;
        }
        .info-grid {
            display: table;
            width: 100%;
            margin-bottom: 15px;
        }
        .info-row {
            display: table-row;
        }
        .info-label {
            display: table-cell;
            font-weight: bold;
            color: #666;
            width: 30%;
            padding: 5px 0;
        }
        .info-value {
            display: table-cell;
            padding: 5px 0;
        }
        .objectives-list, .programme-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .objectives-list li {
            padding: 5px 0;
            padding-left: 20px;
            position: relative;
        }
        .objectives-list li::before {
            content: "✓";
            position: absolute;
            left: 0;
            color: #22c55e;
            font-weight: bold;
        }
        .programme-titre {
            font-weight: bold;
            color: #4f46e5;
            margin-top: 10px;
            margin-bottom: 5px;
        }
        .programme-sous {
            margin-left: 20px;
            color: #555;
        }
        .pricing-box {
            border: 2px solid #e5e7eb;
            border-radius: 8px;
            padding: 12px;
            margin-bottom: 10px;
            text-align: center;
        }
        .pricing-box.popular {
            border-color: #4f46e5;
            background: #eef2ff;
        }
        .pricing-title {
            font-weight: bold;
            font-size: 11pt;
        }
        .pricing-price {
            font-size: 14pt;
            color: #4f46e5;
            font-weight: bold;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 9pt;
            color: #888;
            border-top: 1px solid #ddd;
            padding-top: 15px;
        }
        .formateur-card {
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 12px;
            margin-bottom: 10px;
        }
        .formateur-name {
            font-weight: bold;
            color: #4f46e5;
            margin: 0 0 5px 0;
        }
        .page-break {
            page-break-after: always;
        }
    </style>
</head>
<body>

    <!-- HEADER -->
    <div class="header">
        <div class="badge">Formation professionnelle</div>
        <h1>{{ $cours->titre }}</h1>
    </div>

    <!-- INFOS PRATIQUES -->
    <div class="section">
        <div class="section-title">Informations pratiques</div>
        <div class="info-grid">
            <div class="info-row">
                <div class="info-label">Durée</div>
                <div class="info-value">{{ $cours->duree ?? 'Non précisé' }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Lieu</div>
                <div class="info-value">{{ $cours->lieu ?? 'Non précisé' }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Formateur</div>
                <div class="info-value">{{ $cours->formateur ?? 'Non précisé' }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Public cible</div>
                <div class="info-value">{{ $cours->public_cible ?? 'Tout public' }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Prérequis</div>
                <div class="info-value">{{ $cours->prerequis ?? 'Aucun prérequis' }}</div>
            </div>
        </div>
    </div>

    <!-- DESCRIPTION -->
    <div class="section">
        <div class="section-title">Description</div>
        <p>{{ $cours->description }}</p>
    </div>

    <!-- OBJECTIFS -->
    @if($cours->objectif)
    <div class="section">
        <div class="section-title">Ce que vous allez apprendre</div>
        <ul class="objectives-list">
            @foreach(explode("\n", $cours->objectif) as $o)
                @if(trim($o))
                    <li>{{ trim($o) }}</li>
                @endif
            @endforeach
        </ul>
    </div>
    @endif

    <!-- PROGRAMME -->
    @if($cours->programme)
    <div class="section">
        <div class="section-title">Programme</div>
        @php
            $lignes = explode("\n", $cours->programme);
            $groupeActuel = [];
            $groupes = [];
            
            foreach($lignes as $ligneBrute) {
                if (trim($ligneBrute) === '') continue;
                $estTitre = !preg_match('/^(\t|\s{2,})/', $ligneBrute);
                $lignePropre = ltrim($ligneBrute, "- \t");
                
                if ($estTitre) {
                    if (!empty($groupeActuel)) {
                        $groupes[] = $groupeActuel;
                    }
                    $groupeActuel = ['titre' => $lignePropre, 'sousPoints' => []];
                } else {
                    $groupeActuel['sousPoints'][] = $lignePropre;
                }
            }
            if (!empty($groupeActuel)) {
                $groupes[] = $groupeActuel;
            }
        @endphp

        @foreach($groupes as $groupe)
            <div class="programme-titre">➤ {{ $groupe['titre'] }}</div>
            @if(!empty($groupe['sousPoints']))
                <div class="programme-sous">
                    @foreach($groupe['sousPoints'] as $sousPoint)
                        - {{ $sousPoint }}<br>
                    @endforeach
                </div>
            @endif
        @endforeach
    </div>
    @endif

    <!-- PRIX -->
    @php
        function extrairePrixPdf($texte) {
            if (preg_match('/(\d[\d\s]*)\s*FCFA/i', $texte, $matches)) {
                return (int) str_replace(' ', '', $matches[1]);
            }
            return 0;
        }
        $prixBase = extrairePrixPdf($cours->tarif ?? '');
        if ($prixBase == 0) $prixBase = 450000;
        $formatPrix = function($prix) {
            return number_format($prix, 0, ',', ' ') . ' FCFA';
        };
    @endphp

    <div class="section">
        <div class="section-title">Tarifs</div>
        
        <div class="pricing-box">
            <div class="pricing-title">INDIVIDUEL</div>
            <div class="pricing-price">{{ $formatPrix($prixBase) }} / personne</div>
        </div>

        <div class="pricing-box popular">
            <div class="pricing-title">GROUPE STANDARD (3 à 6 pers.)</div>
            <div class="pricing-price">{{ $formatPrix($prixBase) }} / personne</div>
            <small>10% de réduction</small>
        </div>

        <div class="pricing-box">
            <div class="pricing-title">GROUPE PREMIUM (7 à 10 pers.)</div>
            <div class="pricing-price">{{ $formatPrix($prixBase) }} / personne</div>
            <small>20% de réduction</small>
        </div>
    </div>

    <!-- FORMATEURS -->
    @if($cours->formateurs && $cours->formateurs->count() > 0)
    <div class="section">
        <div class="section-title">Formateurs</div>
        @foreach($cours->formateurs as $formateur)
            <div class="formateur-card">
                <div class="formateur-name">{{ $formateur->nom }}</div>
                <div><strong>Fonction :</strong> {{ $formateur->fonction_actuelle ?? 'Non précisé' }}</div>
                <div><strong>Expertise :</strong> {{ $formateur->domaines_expertise ?? 'Non précisé' }}</div>
            </div>
        @endforeach
    </div>
    @endif

    <!-- FOOTER -->
    <div class="footer">
        <strong>MonProfChezMoi</strong> — Formation professionnelle<br>
        📧 formationpro@monprofchezmoi-ci.com | 📞 +225 07 10 00 05 88<br>
        Document généré le {{ now()->format('d/m/Y') }}
    </div>

</body>
</html>