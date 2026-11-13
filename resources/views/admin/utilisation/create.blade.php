<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Utiliser un Bon de Formation - Admin</title>
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
            padding: 2rem 1rem;
            color: #1e293b;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            animation: fadeIn 0.8s ease-out;
        }

        .page-header {
            text-align: center;
            margin-bottom: 3rem;
            color: white;
        }

        .header-icon {
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            border-radius: 24px;
            margin: 0 auto 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            animation: float 3s ease-in-out infinite;
            box-shadow: 0 20px 60px rgba(16, 185, 129, 0.4);
        }

        .page-header h1 {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
            background: linear-gradient(135deg, #ffffff 0%, #cbd5e1 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .page-header p {
            font-size: 1.1rem;
            color: #94a3b8;
            line-height: 1.6;
        }

        .info-banner {
            background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
            border-left: 5px solid #3b82f6;
            padding: 1.5rem 2rem;
            border-radius: 16px;
            margin-bottom: 2rem;
            box-shadow: 0 4px 20px rgba(59, 130, 246, 0.2);
        }

        .info-banner h3 {
            color: #1e40af;
            font-size: 1.1rem;
            margin-bottom: 0.75rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .info-banner h3::before {
            content: "💡";
            font-size: 1.5rem;
        }

        .info-banner p {
            color: #1e3a8a;
            line-height: 1.6;
            font-size: 0.95rem;
        }

        .alert {
            padding: 1.25rem 1.5rem;
            border-radius: 12px;
            margin-bottom: 2rem;
            animation: slideInDown 0.6s ease-out;
        }

        .alert-danger {
            background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
            border-left: 4px solid #ef4444;
            color: #991b1b;
        }

        .alert-danger ul {
            margin: 0;
            padding-left: 1.5rem;
        }

        .alert-danger li {
            margin: 0.5rem 0;
            font-weight: 500;
        }

        .form-container {
            background: white;
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            position: relative;
            overflow: hidden;
        }

        .form-container::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, #10b981 0%, #059669 50%, #10b981 100%);
            background-size: 200% 100%;
            animation: shimmer 3s infinite;
        }

        .form-header {
            text-align: center;
            margin-bottom: 2rem;
            padding-bottom: 1.5rem;
            border-bottom: 2px solid #f1f5f9;
        }

        .form-header h2 {
            color: #1e293b;
            font-size: 1.75rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .form-header p {
            color: #64748b;
            font-size: 0.95rem;
        }

        .steps-indicator {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-bottom: 2.5rem;
        }

        .step {
            flex: 1;
            max-width: 150px;
            text-align: center;
        }

        .step-circle {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #e2e8f0 0%, #cbd5e1 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 0.75rem;
            font-weight: 700;
            font-size: 1.25rem;
            color: #64748b;
            transition: all 0.3s;
        }

        .step.active .step-circle {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
            box-shadow: 0 8px 20px rgba(16, 185, 129, 0.4);
            transform: scale(1.1);
        }

        .step-label {
            font-size: 0.875rem;
            color: #64748b;
            font-weight: 500;
        }

        .step.active .step-label {
            color: #1e293b;
            font-weight: 600;
        }

        .form-group {
            margin-bottom: 2rem;
            position: relative;
        }

        .form-group label {
            display: block;
            font-weight: 600;
            color: #334155;
            margin-bottom: 0.75rem;
            font-size: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .form-group label .required {
            color: #ef4444;
            font-weight: 700;
        }

        .form-group label .icon {
            font-size: 1.25rem;
        }

        .form-input {
            width: 100%;
            padding: 1rem 1.25rem;
            padding-left: 3rem;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            font-size: 1rem;
            font-family: inherit;
            transition: all 0.3s;
            background: #f8fafc;
        }

        .form-input:focus {
            outline: none;
            border-color: #10b981;
            background: white;
            box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.1);
            transform: translateY(-2px);
        }

        .form-input.valid {
            border-color: #10b981;
            background: #f0fdf4;
        }

        .form-input.invalid {
            border-color: #ef4444;
            background: #fef2f2;
        }

        .form-input::placeholder {
            color: #94a3b8;
        }

        .input-icon {
            position: absolute;
            left: 1rem;
            bottom: 1rem;
            font-size: 1.25rem;
            color: #64748b;
            transition: all 0.3s;
        }

        .form-input:focus ~ .input-icon {
            color: #10b981;
            transform: scale(1.1);
        }

        .input-hint {
            font-size: 0.875rem;
            color: #64748b;
            margin-top: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            line-height: 1.5;
        }

        .input-hint::before {
            content: "ℹ️";
            font-size: 1rem;
        }

        .input-feedback {
            margin-top: 0.5rem;
            font-size: 0.875rem;
            font-weight: 500;
            display: none;
        }

        .input-feedback.show {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .input-feedback.valid {
            color: #10b981;
        }

        .input-feedback.valid::before {
            content: "✓";
        }

        .input-feedback.invalid {
            color: #ef4444;
        }

        .input-feedback.invalid::before {
            content: "✗";
        }

        .code-examples {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            padding: 1.25rem;
            border-radius: 12px;
            margin-top: 0.75rem;
            border: 2px dashed #cbd5e1;
        }

        .code-examples h4 {
            font-size: 0.875rem;
            color: #475569;
            margin-bottom: 0.75rem;
            font-weight: 600;
        }

        .code-example {
            display: inline-block;
            background: white;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-family: 'Courier New', monospace;
            font-weight: 600;
            color: #10b981;
            margin-right: 0.75rem;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
            border: 1px solid #e2e8f0;
        }

        .submit-btn {
            width: 100%;
            padding: 1.5rem 2rem;
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 1.2rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 10px 30px rgba(16, 185, 129, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            margin-top: 2.5rem;
        }

        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(16, 185, 129, 0.5);
        }

        .submit-btn:active {
            transform: translateY(-1px);
        }

        .submit-btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
        }

        .submit-btn::after {
            content: "✓";
            font-size: 1.5rem;
            transition: transform 0.3s;
        }

        .submit-btn:hover::after {
            transform: scale(1.2);
        }

        .security-badge {
            background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
            padding: 1.5rem;
            border-radius: 12px;
            margin-top: 2rem;
            text-align: center;
            border: 2px solid #e2e8f0;
        }

        .security-badge p {
            color: #64748b;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .security-badge p::before {
            content: "🔒";
            font-size: 1.25rem;
        }

        .help-section {
            background: white;
            border-radius: 20px;
            padding: 2.5rem;
            margin-top: 2rem;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
        }

        .help-section h3 {
            color: #1e293b;
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .help-section h3::before {
            content: "❓";
            font-size: 2rem;
        }

        .faq-item {
            border-bottom: 1px solid #e2e8f0;
            padding: 1.25rem 0;
        }

        .faq-question {
            font-weight: 600;
            color: #1e293b;
            font-size: 1rem;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 1rem;
            transition: color 0.3s;
        }

        .faq-question:hover {
            color: #10b981;
        }

        .faq-question::after {
            content: "+";
            font-size: 1.5rem;
            color: #10b981;
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
            max-height: 300px;
            padding-top: 1rem;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        @keyframes shimmer {
            0% { background-position: 200% 0; }
            100% { background-position: -200% 0; }
        }

        @keyframes slideInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        @media (max-width: 768px) {
            .page-header h1 {
                font-size: 2rem;
            }

            .form-container {
                padding: 1.5rem;
            }

            .steps-indicator {
                flex-wrap: wrap;
            }

            .step {
                flex: 0 0 80px;
            }

            .step-circle {
                width: 40px;
                height: 40px;
                font-size: 1rem;
            }

            .step-label {
                font-size: 0.75rem;
            }
        }

        .character-count {
            font-size: 0.875rem;
            color: #94a3b8;
            text-align: right;
            margin-top: 0.5rem;
        }

        .progress-bar {
            width: 100%;
            height: 6px;
            background: #e2e8f0;
            border-radius: 3px;
            overflow: hidden;
            margin-top: 2rem;
            margin-bottom: 1rem;
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, #10b981 0%, #059669 100%);
            width: 0%;
            transition: width 0.3s;
        }

        .progress-label {
            text-align: center;
            font-size: 0.875rem;
            color: #64748b;
            font-weight: 500;
        }

        .status-display {
            background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
            border: 2px solid #10b981;
            border-radius: 12px;
            padding: 1.5rem;
            margin-top: 1rem;
            display: none;
        }

        .status-display.show {
            display: block;
            animation: slideInDown 0.6s ease-out;
        }

        .status-display h4 {
            color: #065f46;
            font-size: 1.1rem;
            margin-bottom: 0.75rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .status-display h4::before {
            content: "✓";
            font-size: 1.5rem;
        }

        .status-display p {
            color: #047857;
            line-height: 1.6;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="page-header">
            <div class="header-icon">✓</div>
            <h1>Utiliser un Bon de Formation</h1>
            <p>Activez le bon de formation d'un client pour lui permettre d'accéder à sa formation</p>
        </div>

        <div class="info-banner">
            <h3>Instructions pour l'activation</h3>
            <p>
                Vérifiez que le code unique est valide et correspond à un bon validé dans le système.
                Assurez-vous que le client est bien le bénéficiaire du bon avant de l'activer.
                Une fois activé, le bon ne pourra plus être utilisé.
            </p>
        </div>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="form-container">
            <div class="form-header">
                <h2>Activer un bon de formation</h2>
                <p>Complétez les informations ci-dessous pour utiliser le bon du client</p>
            </div>

            <div class="steps-indicator">
                <div class="step active">
                    <div class="step-circle">1</div>
                    <div class="step-label">Code</div>
                </div>
                <div class="step">
                    <div class="step-circle">2</div>
                    <div class="step-label">Client</div>
                </div>
                <div class="step">
                    <div class="step-circle">3</div>
                    <div class="step-label">Formation</div>
                </div>
            </div>

            <div class="progress-bar">
                <div class="progress-fill" id="progressBar"></div>
            </div>
            <div class="progress-label" id="progressLabel">0% complété</div>

            <form action="{{ route('admin.utilisation.store') }}" method="POST" id="utilizationForm">
                @csrf

                <div class="form-group">
                    <label for="code_unique">
                        <span class="icon">🔑</span>
                        Code Unique du Bon
                        <span class="required">*</span>
                    </label>
                    <div style="position: relative;">
                        <input
                            type="text"
                            name="code_unique"
                            id="code_unique"
                            class="form-input"
                            placeholder="Entrez le code (ex: FORM-2024-ABCD1234)"
                            required
                            maxlength="50"
                        >
                        <div class="input-icon">🔑</div>
                    </div>
                    <div class="input-hint">
                        Le code unique se trouve dans l'email envoyé au client après validation de sa commande
                    </div>
                    <div class="code-examples">
                        <h4>Exemples de format de code valide :</h4>
                        <span class="code-example">FORM-2024-ABCD1234</span>
                        <span class="code-example">BON-XYZ789-2024</span>
                        <span class="code-example">MPM-12345-FORM</span>
                    </div>
                    <div class="input-feedback" id="codeFeedback"></div>
                    <div class="status-display" id="codeStatus">
                        <h4>Code vérifié</h4>
                        <p>Ce bon est valide et peut être utilisé</p>
                    </div>
                </div>

                <div class="form-group">
                    <label for="nom_client">
                        <span class="icon">👤</span>
                        Nom Complet du Client
                        <span class="required">*</span>
                    </label>
                    <div style="position: relative;">
                        <input
                            type="text"
                            name="nom_client"
                            id="nom_client"
                            class="form-input"
                            placeholder="Prénom et Nom du client (ex: Jean Dupont)"
                            required
                            maxlength="100"
                        >
                        <div class="input-icon">👤</div>
                    </div>
                    <div class="input-hint">
                        Entrez le nom complet du client tel qu'il apparaîtra sur le certificat de formation
                    </div>
                    <div class="input-feedback" id="nameFeedback"></div>
                    <div class="character-count" id="nameCount">0/100 caractères</div>
                </div>

                <div class="form-group">
                    <label for="formation">
                        <span class="icon">📚</span>
                        Formation Attribuée
                        <span class="required">*</span>
                    </label>
                    <div style="position: relative;">
                        <input
                            type="text"
                            name="formation"
                            id="formation"
                            class="form-input"
                            placeholder="Nom de la formation (ex: Développement Web Full Stack)"
                            required
                            maxlength="150"
                        >
                        <div class="input-icon">📚</div>
                    </div>
                    <div class="input-hint">
                        Indiquez le titre exact de la formation à laquelle le client aura accès avec ce bon
                    </div>
                    <div class="input-feedback" id="formationFeedback"></div>
                    <div class="character-count" id="formationCount">0/150 caractères</div>
                </div>

                <button type="submit" class="submit-btn" id="submitBtn" disabled>
                    Activer le bon de formation
                </button>

                <div class="security-badge">
                    <p>Cette action est irréversible et sera enregistrée dans le système</p>
                </div>
            </form>
        </div>

        <div class="help-section">
            <h3>Questions fréquentes</h3>

            <div class="faq-item">
                <div class="faq-question" onclick="toggleFaq(this)">
                    Comment vérifier la validité d'un code ?
                </div>
                <div class="faq-answer">
                    Le système vérifie automatiquement la validité du code lorsque vous le saisissez. Un code valide doit correspondre
                    à un bon qui a été validé par un administrateur et qui n'a pas encore été utilisé. Si le code n'est pas valide,
                    un message d'erreur s'affichera.
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question" onclick="toggleFaq(this)">
                    Que se passe-t-il après l'activation ?
                </div>
                <div class="faq-answer">
                    Une fois le bon activé, le client reçoit un email de confirmation avec les détails de sa formation et les instructions
                    pour y accéder. Le code unique est marqué comme utilisé dans le système et ne peut plus être réutilisé. Le client a
                    alors accès à sa formation selon les modalités prévues.
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question" onclick="toggleFaq(this)">
                    Puis-je annuler une activation ?
                </div>
                <div class="faq-answer">
                    L'activation d'un bon est une action irréversible. Si une erreur a été commise, vous devez contacter un superviseur
                    qui pourra potentiellement corriger la situation dans des cas exceptionnels. Il est donc crucial de bien vérifier
                    toutes les informations avant de valider.
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question" onclick="toggleFaq(this)">
                    Comment traiter un code expiré ?
                </div>
                <div class="faq-answer">
                    Les bons de formation sont valables 12 mois après l'achat. Si un client tente d'utiliser un code expiré, contactez
                    le service client pour évaluer la situation. Dans certains cas exceptionnels, une extension peut être accordée
                    par la direction.
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question" onclick="toggleFaq(this)">
                    Que faire si le montant du bon est insuffisant ?
                </div>
                <div class="faq-answer">
                    Si le montant du bon est inférieur au prix de la formation choisie, le client devra régler la différence.
                    Si le montant du bon est supérieur, le crédit restant sera conservé sur son compte et pourra être utilisé
                    pour d'autres services MonProfChezMoi.
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleFaq(element) {
            const answer = element.nextElementSibling;
            const isActive = answer.classList.contains('active');

            document.querySelectorAll('.faq-answer').forEach(ans => {
                ans.classList.remove('active');
            });
            document.querySelectorAll('.faq-question').forEach(q => {
                q.classList.remove('active');
            });

            if (!isActive) {
                answer.classList.add('active');
                element.classList.add('active');
            }
        }

        const form = document.getElementById('utilizationForm');
        const codeInput = document.getElementById('code_unique');
        const nameInput = document.getElementById('nom_client');
        const formationInput = document.getElementById('formation');
        const submitBtn = document.getElementById('submitBtn');
        const progressBar = document.getElementById('progressBar');
        const progressLabel = document.getElementById('progressLabel');

        const codeFeedback = document.getElementById('codeFeedback');
        const nameFeedback = document.getElementById('nameFeedback');
        const formationFeedback = document.getElementById('formationFeedback');
        const codeStatus = document.getElementById('codeStatus');

        const nameCount = document.getElementById('nameCount');
        const formationCount = document.getElementById('formationCount');

        function validateCode(code) {
            const codeRegex = /^[A-Z0-9\-_]{8,50}$/i;
            return codeRegex.test(code) && code.length >= 8;
        }

        function validateName(name) {
            return name.trim().length >= 3 && /^[a-zÀ-ÿ\s\-']+$/i.test(name);
        }

        function validateFormation(formation) {
            return formation.trim().length >= 3;
        }

        function updateFieldValidation(input, isValid, feedback, message) {
            if (input.value.length > 0) {
                if (isValid) {
                    input.classList.add('valid');
                    input.classList.remove('invalid');
                    feedback.classList.add('show', 'valid');
                    feedback.classList.remove('invalid');
                    feedback.textContent = message.valid;
                } else {
                    input.classList.add('invalid');
                    input.classList.remove('valid');
                    feedback.classList.add('show', 'invalid');
                    feedback.classList.remove('valid');
                    feedback.textContent = message.invalid;
                }
            } else {
                input.classList.remove('valid', 'invalid');
                feedback.classList.remove('show');
            }
        }

        function updateProgress() {
            const codeValid = validateCode(codeInput.value);
            const nameValid = validateName(nameInput.value);
            const formationValid = validateFormation(formationInput.value);

            let progress = 0;
            if (codeValid) progress += 33.33;
            if (nameValid) progress += 33.33;
            if (formationValid) progress += 33.34;

            progressBar.style.width = progress + '%';
            progressLabel.textContent = Math.round(progress) + '% complété';

            const steps = document.querySelectorAll('.step');
            steps[0].classList.toggle('active', codeInput.value.length > 0);
            steps[1].classList.toggle('active', nameInput.value.length > 0);
            steps[2].classList.toggle('active', formationInput.value.length > 0);

            submitBtn.disabled = !(codeValid && nameValid && formationValid);
        }

        codeInput.addEventListener('input', function() {
            this.value = this.value.toUpperCase();
            const isValid = validateCode(this.value);
            updateFieldValidation(this, isValid, codeFeedback, {
                valid: 'Code valide - prêt à être utilisé',
                invalid: 'Le code doit contenir au moins 8 caractères alphanumériques'
            });

            if (isValid) {
                codeStatus.classList.add('show');
            } else {
                codeStatus.classList.remove('show');
            }

            updateProgress();
        });

        nameInput.addEventListener('input', function() {
            const isValid = validateName(this.value);
            updateFieldValidation(this, isValid, nameFeedback, {
                valid: 'Nom valide',
                invalid: 'Le nom doit contenir au moins 3 caractères (lettres uniquement)'
            });
            nameCount.textContent = `${this.value.length}/100 caractères`;
            updateProgress();
        });

        formationInput.addEventListener('input', function() {
            const isValid = validateFormation(this.value);
            updateFieldValidation(this, isValid, formationFeedback, {
                valid: 'Formation valide',
                invalid: 'Le nom de la formation doit contenir au moins 3 caractères'
            });
            formationCount.textContent = `${this.value.length}/150 caractères`;
            updateProgress();
        });

        form.addEventListener('submit', function(e) {
            submitBtn.innerHTML = '<span style="display: inline-block; width: 20px; height: 20px; border: 3px solid rgba(255,255,255,0.3); border-radius: 50%; border-top-color: white; animation: spin 0.8s linear infinite;"></span> Activation en cours...';
            submitBtn.style.pointerEvents = 'none';
        });

        const formInputs = document.querySelectorAll('.form-input');
        formInputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.parentElement.style.transform = 'translateY(-2px)';
                this.parentElement.parentElement.style.transition = 'transform 0.3s';
            });

            input.addEventListener('blur', function() {
                this.parentElement.parentElement.style.transform = 'translateY(0)';
            });
        });

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' && e.ctrlKey) {
                if (!submitBtn.disabled) {
                    form.submit();
                }
            }
        });

        updateProgress();

        console.log('%c✓ Utilisation Bon Admin - MonProfChezMoi', 'font-size: 20px; color: #10b981; font-weight: bold;');
        console.log('%cPage chargée avec succès!', 'font-size: 14px; color: #10b981;');
        console.log('%cRaccourci: Ctrl + Enter pour soumettre', 'font-size: 12px; color: #64748b;');
    </script>
</body>
</html>
