
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acheter {{ $bon->titre }} - MonProfChezMoi</title>
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
            max-width: 1100px;
            margin: 0 auto;
        }

        .page-header {
            text-align: center;
            margin-bottom: 3rem;
            color: white;
            animation: fadeInDown 0.8s ease-out;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: #94a3b8;
            text-decoration: none;
            margin-bottom: 2rem;
            transition: all 0.3s;
            font-weight: 500;
        }

        .back-link:hover {
            color: white;
            transform: translateX(-5px);
        }

        .page-header h1 {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
            background: linear-gradient(135deg, #ffffff 0%, #cbd5e1 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .page-header p {
            font-size: 1.1rem;
            color: #94a3b8;
        }

        .content-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
            align-items: start;
        }

        .bon-summary {
            background: white;
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            position: sticky;
            top: 2rem;
            animation: slideInLeft 0.8s ease-out;
        }

        .bon-summary-header {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            color: white;
            padding: 2rem;
            border-radius: 16px;
            margin: -2.5rem -2.5rem 2rem -2.5rem;
            position: relative;
            overflow: hidden;
        }

        .bon-summary-header::after {
            content: "🎓";
            position: absolute;
            right: -10px;
            top: -10px;
            font-size: 6rem;
            opacity: 0.1;
            transform: rotate(-15deg);
        }

        .bon-summary-header h2 {
            font-size: 1.75rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            position: relative;
            z-index: 1;
        }

        .bon-summary-header p {
            opacity: 0.95;
            font-size: 1rem;
            line-height: 1.6;
            position: relative;
            z-index: 1;
        }

        .price-display {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            padding: 2rem;
            border-radius: 16px;
            text-align: center;
            margin-bottom: 2rem;
            border: 2px solid #e2e8f0;
        }

        .price-label {
            font-size: 0.875rem;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .price-amount {
            font-size: 3.5rem;
            font-weight: 800;
            color: #1e293b;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .price-currency {
            font-size: 2rem;
            color: #64748b;
        }

        .features-list {
            list-style: none;
            margin-bottom: 2rem;
        }

        .features-list li {
            padding: 0.875rem 0;
            color: #475569;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            border-bottom: 1px solid #e2e8f0;
            font-size: 0.95rem;
        }

        .features-list li:last-child {
            border-bottom: none;
        }

        .features-list li::before {
            content: "✓";
            width: 24px;
            height: 24px;
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 0.875rem;
            flex-shrink: 0;
        }

        .payment-section {
            background: white;
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            animation: slideInRight 0.8s ease-out;
        }

        .section-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .section-title .step-badge {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 1.25rem;
        }

        .instruction-box {
            background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
            border-left: 4px solid #f59e0b;
            padding: 1.5rem;
            border-radius: 12px;
            margin-bottom: 2rem;
        }

        .instruction-box h3 {
            font-size: 1.1rem;
            color: #92400e;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .instruction-box h3::before {
            content: "💡";
            font-size: 1.5rem;
        }

        .instruction-steps {
            list-style: none;
            counter-reset: step-counter;
        }

        .instruction-steps li {
            counter-increment: step-counter;
            color: #78350f;
            margin-bottom: 0.75rem;
            padding-left: 2.5rem;
            position: relative;
            line-height: 1.6;
        }

        .instruction-steps li::before {
            content: counter(step-counter);
            position: absolute;
            left: 0;
            width: 28px;
            height: 28px;
            background: #f59e0b;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 0.875rem;
        }

        .payment-options {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .payment-option {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            padding: 1.25rem;
            text-align: center;
            transition: all 0.3s;
            cursor: pointer;
        }

        .payment-option:hover {
            border-color: #3b82f6;
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.2);
        }

        .payment-option img {
            height: 40px;
            margin-bottom: 0.5rem;
        }

        .payment-option .provider-name {
            font-weight: 600;
            color: #1e293b;
            font-size: 0.95rem;
        }

        .phone-display {
            background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
            border: 3px solid #3b82f6;
            border-radius: 16px;
            padding: 2rem;
            text-align: center;
            margin-bottom: 2rem;
            position: relative;
            overflow: hidden;
        }

        .phone-display::before {
            content: "📱";
            position: absolute;
            right: -20px;
            bottom: -20px;
            font-size: 8rem;
            opacity: 0.1;
        }

        .phone-display h3 {
            font-size: 1rem;
            color: #1e40af;
            margin-bottom: 1rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
        }

        .phone-number {
            font-size: 2.5rem;
            font-weight: 800;
            color: #1e293b;
            letter-spacing: 2px;
            margin-bottom: 1rem;
            position: relative;
            z-index: 1;
        }

        .copy-btn {
            background: white;
            color: #3b82f6;
            border: 2px solid #3b82f6;
            padding: 0.75rem 1.5rem;
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            position: relative;
            z-index: 1;
        }

        .copy-btn:hover {
            background: #3b82f6;
            color: white;
            transform: scale(1.05);
        }

        .copy-btn.copied {
            background: #10b981;
            color: white;
            border-color: #10b981;
        }

        .form-section {
            margin-top: 2rem;
        }

        .form-group {
            margin-bottom: 1.75rem;
        }

        .form-group label {
            display: block;
            font-weight: 600;
            color: #334155;
            margin-bottom: 0.75rem;
            font-size: 1rem;
        }

        .form-group label .required {
            color: #ef4444;
            margin-left: 0.25rem;
        }

        .form-input {
            width: 100%;
            padding: 1rem 1.25rem;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            font-size: 1rem;
            font-family: inherit;
            transition: all 0.3s;
            background: #f8fafc;
        }

        .form-input:focus {
            outline: none;
            border-color: #3b82f6;
            background: white;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
            transform: translateY(-2px);
        }

        .form-input::placeholder {
            color: #94a3b8;
        }

        .input-hint {
            font-size: 0.875rem;
            color: #64748b;
            margin-top: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .input-hint::before {
            content: "ℹ️";
        }

        .submit-btn {
            width: 100%;
            padding: 1.5rem 2rem;
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 1.2rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 10px 30px rgba(59, 130, 246, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            margin-top: 2rem;
        }

        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(59, 130, 246, 0.5);
        }

        .submit-btn:active {
            transform: translateY(-1px);
        }

        .submit-btn::after {
            content: "→";
            font-size: 1.5rem;
            transition: transform 0.3s;
        }

        .submit-btn:hover::after {
            transform: translateX(5px);
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

        .timeline {
            position: relative;
            padding-left: 2rem;
            margin: 2rem 0;
        }

        .timeline::before {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 3px;
            background: linear-gradient(180deg, #3b82f6 0%, #2563eb 100%);
            border-radius: 2px;
        }

        .timeline-item {
            position: relative;
            margin-bottom: 1.5rem;
            padding-left: 1.5rem;
        }

        .timeline-item::before {
            content: "";
            position: absolute;
            left: -2.4rem;
            top: 0.25rem;
            width: 12px;
            height: 12px;
            background: #3b82f6;
            border-radius: 50%;
            border: 3px solid white;
            box-shadow: 0 0 0 3px #3b82f6;
        }

        .timeline-item h4 {
            font-size: 1rem;
            color: #1e293b;
            margin-bottom: 0.25rem;
        }

        .timeline-item p {
            color: #64748b;
            font-size: 0.9rem;
            line-height: 1.6;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
        }

        @media (max-width: 968px) {
            .content-grid {
                grid-template-columns: 1fr;
            }

            .bon-summary {
                position: static;
            }

            .payment-options {
                grid-template-columns: 1fr;
            }

            .page-header h1 {
                font-size: 2rem;
            }

            .phone-number {
                font-size: 2rem;
            }

            .price-amount {
                font-size: 2.5rem;
            }
        }

        .alert {
            padding: 1.25rem 1.5rem;
            border-radius: 12px;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            animation: slideInDown 0.6s ease-out;
        }

        .alert-success {
            background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
            border-left: 4px solid #10b981;
            color: #065f46;
        }

        .alert-success::before {
            content: "✓";
            font-size: 1.5rem;
            font-weight: bold;
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
    </style>
</head>
<body>
    <div class="container">
        <div class="page-header">
            <a href="{{ route('bons.index') }}" class="back-link">
                ← Retour aux bons de formation
            </a>
            <h1>Finaliser votre achat</h1>
            <p>Suivez les étapes ci-dessous pour obtenir votre bon de formation</p>
        </div>

        <div class="content-grid">
            <div class="bon-summary">
                <div class="bon-summary-header">
                    <h2>{{ $bon->titre }}</h2>
                    <p>{{ $bon->description }}</p>
                </div>

                <div class="price-display">
                    <div class="price-label">Montant à payer</div>
                    <div class="price-amount">
                        {{ $bon->montant }}
                        <span class="price-currency">FCFA</span>
                    </div>
                </div>

                <ul class="features-list">
                    <li>Code unique et sécurisé</li>
                    <li>Valable 12 mois</li>
                    <li>Utilisable sur toutes nos formations</li>
                    <li>Certificat personnalisable</li>
                    <li>Transférable à un tiers</li>
                    <li>Support client 7j/7</li>
                </ul>

                <div class="timeline">
                    <div class="timeline-item">
                        <h4>Après validation</h4>
                        <p>Votre commande sera vérifiée sous 2-4 heures</p>
                    </div>
                    <div class="timeline-item">
                        <h4>Réception du code</h4>
                        <p>Vous recevrez votre code par email une fois validé</p>
                    </div>
                    <div class="timeline-item">
                        <h4>Utilisation</h4>
                        <p>Activez votre bon lors de votre inscription à une formation</p>
                    </div>
                </div>
            </div>

            <div class="payment-section">
                <div class="section-title">
                    <span class="step-badge">1</span>
                    Effectuez le paiement
                </div>

                <div class="instruction-box">
                    <h3>Comment procéder ?</h3>
                    <ol class="instruction-steps">
                        <li>Copiez le numéro de téléphone ci-dessous</li>
                        <li>Ouvrez votre application de paiement mobile (Wave, Orange Money, Moov Money ou MTN Money)</li>
                        <li>Effectuez un transfert du montant exact vers ce numéro</li>
                        <li>Remplissez le formulaire avec vos informations</li>
                        <li>Recevez votre code par email sous 2-4 heures</li>
                    </ol>
                </div>

                <h4 style="color: #64748b; margin-bottom: 1rem; font-size: 0.95rem; text-transform: uppercase; letter-spacing: 0.5px;">Moyens de paiement acceptés</h4>

                <div class="payment-options">
                    <div class="payment-option">
                        <div style="width: 50px; height: 50px; background: linear-gradient(135deg, #0066cc 0%, #004d99 100%); border-radius: 10px; margin: 0 auto 0.5rem; display: flex; align-items: center; justify-content: center; color: white; font-weight: 700; font-size: 1.25rem;">W</div>
                        <div class="provider-name">Wave</div>
                    </div>
                    <div class="payment-option">
                        <div style="width: 50px; height: 50px; background: linear-gradient(135deg, #ff7900 0%, #cc6100 100%); border-radius: 10px; margin: 0 auto 0.5rem; display: flex; align-items: center; justify-content: center; color: white; font-weight: 700; font-size: 1.25rem;">OM</div>
                        <div class="provider-name">Orange Money</div>
                    </div>
                    <div class="payment-option">
                        <div style="width: 50px; height: 50px; background: linear-gradient(135deg, #00bfff 0%, #0099cc 100%); border-radius: 10px; margin: 0 auto 0.5rem; display: flex; align-items: center; justify-content: center; color: white; font-weight: 700; font-size: 1.25rem;">M</div>
                        <div class="provider-name">Moov Money</div>
                    </div>
                    <div class="payment-option">
                        <div style="width: 50px; height: 50px; background: linear-gradient(135deg, #ffcc00 0%, #cc9900 100%); border-radius: 10px; margin: 0 auto 0.5rem; display: flex; align-items: center; justify-content: center; color: white; font-weight: 700; font-size: 1.25rem;">MTN</div>
                        <div class="provider-name">MTN Money</div>
                    </div>
                </div>

                <div class="phone-display">
                    <h3>Numéro de paiement</h3>
                    <div class="phone-number" id="phoneNumber">+225 07 09 89 18 48</div>
                    <button class="copy-btn" onclick="copyPhone()">
                        📋 Copier le numéro
                    </button>
                </div>

                <div class="section-title" style="margin-top: 3rem;">
                    <span class="step-badge">2</span>
                    Confirmez votre commande
                </div>

                <form action="{{ route('commandes.store') }}" method="POST" id="orderForm" class="form-section">
                    @csrf
                    <input type="hidden" name="bon_id" value="{{ $bon->id }}">

                    <div class="form-group">
                        <label for="telephone">
                            Numéro ayant effectué le paiement
                            <span class="required">*</span>
                        </label>
                        <input
                            type="text"
                            name="telephone"
                            id="telephone"
                            class="form-input"
                            placeholder="+225 XX XX XX XX"
                            required
                        >
                        <div class="input-hint">
                            Entrez le numéro de téléphone utilisé pour le transfert
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="montant">
                            Montant payé (en FCFA)
                            <span class="required">*</span>
                        </label>
                        <input
                            type="number"
                            name="montant"
                            id="montant"
                            class="form-input"
                            placeholder="{{ $bon->montant }}"
                            value="{{ $bon->montant }}"
                            step="0.01"
                            required
                        >
                        <div class="input-hint">
                            Le montant doit correspondre exactement au prix du bon
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">
                            Adresse email pour recevoir le code
                            <span class="required">*</span>
                        </label>
                        <input
                            type="email"
                            name="email"
                            id="email"
                            class="form-input"
                            placeholder="votre.email@exemple.com"
                            required
                        >
                        <div class="input-hint">
                            Vérifiez bien votre email, c'est là que vous recevrez votre code
                        </div>
                    </div>

                    <button type="submit" class="submit-btn">
                        Valider ma commande
                    </button>

                    <div class="security-badge">
                        <p>Vos informations sont sécurisées et ne seront jamais partagées</p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function copyPhone() {
            const phoneNumber = document.getElementById('phoneNumber').textContent;
            const btn = document.querySelector('.copy-btn');

            navigator.clipboard.writeText(phoneNumber).then(() => {
                btn.classList.add('copied');
                btn.innerHTML = '✓ Copié !';

                setTimeout(() => {
                    btn.classList.remove('copied');
                    btn.innerHTML = '📋 Copier le numéro';
                }, 2000);
            }).catch(() => {
                const tempInput = document.createElement('input');
                tempInput.value = phoneNumber;
                document.body.appendChild(tempInput);
                tempInput.select();
                document.execCommand('copy');
                document.body.removeChild(tempInput);

                btn.classList.add('copied');
                btn.innerHTML = '✓ Copié !';

                setTimeout(() => {
                    btn.classList.remove('copied');
                    btn.innerHTML = '📋 Copier le numéro';
                }, 2000);
            });
        }

        const form = document.getElementById('orderForm');
        const phoneInput = document.getElementById('telephone');
        const montantInput = document.getElementById('montant');
        const emailInput = document.getElementById('email');

        phoneInput.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');

            if (value.length > 0) {
                if (value.startsWith('229')) {
                    value = '+' + value;
                } else if (!value.startsWith('+')) {
                    value = '+229' + value;
                }
            }

            this.style.borderColor = value.length >= 12 ? '#10b981' : '#e2e8f0';
        });

        montantInput.addEventListener('input', function() {
            const expectedAmount = {{ $bon->montant }};
            const enteredAmount = parseFloat(this.value);

            if (Math.abs(enteredAmount - expectedAmount) < 0.01) {
                this.style.borderColor = '#10b981';
            } else {
                this.style.borderColor = '#ef4444';
            }
        });

        emailInput.addEventListener('input', function() {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            this.style.borderColor = emailRegex.test(this.value) ? '#10b981' : '#e2e8f0';
        });

        form.addEventListener('submit', function(e) {
            const submitBtn = form.querySelector('.submit-btn');
            submitBtn.innerHTML = '<span style="display: inline-block; width: 20px; height: 20px; border: 3px solid rgba(255,255,255,0.3); border-radius: 50%; border-top-color: white; animation: spin 0.8s linear infinite;"></span> Envoi en cours...';
            submitBtn.style.pointerEvents = 'none';
        });

        const style = document.createElement('style');
        style.textContent = `
            @keyframes spin {
                to { transform: rotate(360deg); }
            }
        `;
        document.head.appendChild(style);

        const formInputs = document.querySelectorAll('.form-input');
        formInputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'translateY(-2px)';
                this.parentElement.style.transition = 'transform 0.3s';
            });

            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'translateY(0)';
            });
        });

        const savedData = {
            telephone: localStorage.getItem('form_telephone'),
            email: localStorage.getItem('form_email')
        };

        if (savedData.telephone) phoneInput.value = savedData.telephone;
        if (savedData.email) emailInput.value = savedData.email;

        phoneInput.addEventListener('input', () => localStorage.setItem('form_telephone', phoneInput.value));
        emailInput.addEventListener('input', () => localStorage.setItem('form_email', emailInput.value));

        form.addEventListener('submit', function() {
            localStorage.removeItem('form_telephone');
            localStorage.removeItem('form_email');
        });

        console.log('%c🎓 Achat de bon - MonProfChezMoi', 'font-size: 20px; color: #3b82f6; font-weight: bold;');
        console.log('%cPage chargée avec succès!', 'font-size: 14px; color: #10b981;');
    </script>
</body>
</html>
