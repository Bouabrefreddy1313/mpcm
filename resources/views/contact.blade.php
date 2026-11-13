@include('partials.header', ['title' => 'Nous contacter - MonProfChezMoi'])

<style>
:root {
    --ct-blue: #2563EB;
    --ct-blue-dark: #1E40AF;
    --ct-navy: #1E3A8A;
    --ct-orange: #F97316;
    --ct-orange-dark: #EA580C;
    --ct-text: #1F2937;
    --ct-gray: #6B7280;
    --ct-light: #F5F8FF;
    --ct-border: #DBE3F3;
    --ct-white: #FFFFFF;
}

body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color: var(--ct-text); background: var(--ct-light); }

/* ---------- Hero ---------- */
.ct-hero {
    position: relative;
    overflow: hidden;
    background: linear-gradient(135deg, var(--ct-navy) 0%, var(--ct-blue) 60%, #3B82F6 100%);
    color: var(--ct-white);
    padding: 4.5rem 0 6rem;
    text-align: center;
}
.ct-hero::before,
.ct-hero::after {
    content: "";
    position: absolute;
    border-radius: 50%;
    filter: blur(2px);
    pointer-events: none;
}
.ct-hero::before { width: 380px; height: 380px; right: -110px; top: -140px; background: radial-gradient(circle, rgba(249,115,22,.55), rgba(249,115,22,0) 70%); }
.ct-hero::after  { width: 300px; height: 300px; left: -90px; bottom: -150px; background: radial-gradient(circle, rgba(255,255,255,.22), rgba(255,255,255,0) 70%); }
.ct-hero .container { position: relative; z-index: 1; }
.ct-hero-icon {
    width: 72px; height: 72px; margin: 0 auto 1.25rem;
    display: grid; place-items: center; font-size: 1.8rem;
    border-radius: 20px; color: var(--ct-white);
    background: linear-gradient(135deg, var(--ct-orange), var(--ct-orange-dark));
    box-shadow: 0 10px 30px rgba(249,115,22,.45);
    animation: ct-float 4s ease-in-out infinite;
}
.ct-hero h1 { font-size: clamp(2rem, 4vw, 2.8rem); font-weight: 800; margin-bottom: .75rem; }
.ct-hero p { max-width: 620px; margin: 0 auto; font-size: 1.1rem; opacity: .95; }

@keyframes ct-float { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-8px); } }

/* ---------- Contenu ---------- */
.ct-main { margin-top: -3.5rem; position: relative; z-index: 2; padding-bottom: 3rem; }

/* Cartes d'information */
.ct-info {
    display: flex; align-items: center; gap: 1.1rem;
    background: var(--ct-white);
    border: 1px solid var(--ct-border);
    border-radius: 16px;
    padding: 1.25rem 1.4rem;
    margin-bottom: 1rem;
    box-shadow: 0 4px 16px rgba(30,58,138,.07);
    transition: transform .25s ease, box-shadow .25s ease, border-color .25s ease;
}
.ct-info:hover { transform: translateY(-3px); box-shadow: 0 10px 26px rgba(30,58,138,.14); border-color: var(--ct-orange); }
.ct-info-icon {
    flex-shrink: 0; width: 52px; height: 52px; border-radius: 14px;
    display: grid; place-items: center; font-size: 1.25rem; color: var(--ct-white);
    background: linear-gradient(135deg, var(--ct-blue), var(--ct-blue-dark));
}
.ct-info:nth-child(even) .ct-info-icon { background: linear-gradient(135deg, var(--ct-orange), var(--ct-orange-dark)); }
.ct-info-title { margin: 0 0 .15rem; font-size: .8rem; font-weight: 700; letter-spacing: .06em; text-transform: uppercase; color: var(--ct-gray); }
.ct-info-text { margin: 0; font-size: 1.02rem; font-weight: 600; color: var(--ct-text); word-break: break-word; }

/* Carte formulaire */
.ct-form-card {
    background: var(--ct-white);
    border: 1px solid var(--ct-border);
    border-top: 5px solid var(--ct-orange);
    border-radius: 20px;
    padding: 2rem;
    box-shadow: 0 10px 34px rgba(30,58,138,.1);
}
.ct-form-card h2 { font-size: 1.45rem; font-weight: 800; color: var(--ct-navy); margin-bottom: .25rem; }
.ct-form-card .ct-sub { color: var(--ct-gray); margin-bottom: 1.5rem; }
.ct-form-card label { font-weight: 600; font-size: .9rem; color: var(--ct-navy); margin-bottom: .35rem; }
.ct-form-card .form-control,
.ct-form-card .form-select {
    border: 1.5px solid var(--ct-border);
    border-radius: 12px;
    padding: .75rem 1rem;
    background: #FBFCFF;
    transition: border-color .2s, box-shadow .2s, background .2s;
}
.ct-form-card .form-control:focus,
.ct-form-card .form-select:focus {
    background: var(--ct-white);
    border-color: var(--ct-blue);
    box-shadow: 0 0 0 4px rgba(37,99,235,.15);
}
.ct-submit {
    display: inline-flex; align-items: center; justify-content: center; gap: .6rem;
    width: 100%; border: 0; border-radius: 12px; padding: .95rem 1.5rem;
    font-size: 1.05rem; font-weight: 700; color: var(--ct-white); cursor: pointer;
    background: linear-gradient(135deg, var(--ct-orange), var(--ct-orange-dark));
    box-shadow: 0 8px 20px rgba(249,115,22,.35);
    transition: transform .2s ease, box-shadow .2s ease;
}
.ct-submit:hover { transform: translateY(-2px); box-shadow: 0 12px 26px rgba(249,115,22,.45); }
.ct-submit:focus-visible { outline: 3px solid rgba(37,99,235,.45); outline-offset: 2px; }

/* ---------- Carte ---------- */
.ct-section-title { display: flex; align-items: center; gap: .9rem; margin: 3rem 0 1.25rem; }
.ct-section-title .ct-title-icon {
    width: 46px; height: 46px; border-radius: 12px; display: grid; place-items: center;
    color: var(--ct-white); background: linear-gradient(135deg, var(--ct-blue), var(--ct-blue-dark));
}
.ct-section-title h2 { margin: 0; font-size: 1.6rem; font-weight: 800; color: var(--ct-navy); }
.ct-section-title::after { content: ""; flex: 1; height: 3px; border-radius: 3px; background: linear-gradient(90deg, var(--ct-orange), rgba(249,115,22,0)); }

.ct-map {
    border-radius: 20px; overflow: hidden; background: var(--ct-white);
    border: 1px solid var(--ct-border); box-shadow: 0 10px 34px rgba(30,58,138,.12);
    line-height: 0;
}
.ct-map iframe { width: 100%; height: 450px; border: 0; }

/* ---------- Footer ---------- */
.ct-footer { background: var(--ct-navy); color: #CBD5F5; padding: 3.5rem 0 1.5rem; border-top: 5px solid var(--ct-orange); }
.ct-footer-brand { display: flex; align-items: center; gap: .6rem; margin-bottom: 1rem; }
.ct-footer-brand i { font-size: 1.8rem; color: var(--ct-orange); }
.ct-footer-brand h5 { margin: 0; font-weight: 800; color: var(--ct-white); }
.ct-footer p { color: #CBD5F5; }
.ct-footer-heading { font-weight: 700; color: var(--ct-white); margin-bottom: 1rem; }
.ct-footer ul { list-style: none; padding: 0; margin: 0; }
.ct-footer li { margin-bottom: .65rem; }
.ct-footer a { color: #CBD5F5; text-decoration: none; transition: color .2s; }
.ct-footer a:hover { color: var(--ct-orange); }
.ct-footer-links i { font-size: .7rem; margin-right: .5rem; color: var(--ct-orange); }
.ct-footer-contact li { display: flex; align-items: center; gap: .75rem; }
.ct-footer-contact i { color: var(--ct-orange); width: 18px; }
.ct-social { display: flex; gap: .6rem; margin-top: 1rem; }
.ct-social a {
    width: 38px; height: 38px; border-radius: 50%; display: grid; place-items: center;
    background: rgba(255,255,255,.1); color: var(--ct-white);
    transition: background .2s, transform .2s;
}
.ct-social a:hover { background: var(--ct-orange); color: var(--ct-white); transform: translateY(-3px); }
.ct-footer-bottom { margin-top: 2.5rem; padding-top: 1.25rem; border-top: 1px solid rgba(255,255,255,.15); text-align: center; font-size: .9rem; color: #93A3D9; }

/* ---------- Animation d'apparition ---------- */
.fade-in { opacity: 0; transform: translateY(18px); animation: ct-fade .6s ease forwards; }
.fade-in.d2 { animation-delay: .1s; }
.fade-in.d3 { animation-delay: .2s; }
.fade-in.d4 { animation-delay: .3s; }
@keyframes ct-fade { to { opacity: 1; transform: translateY(0); } }

@media (prefers-reduced-motion: reduce) {
    .fade-in, .ct-hero-icon { animation: none; opacity: 1; transform: none; }
}
@media (max-width: 768px) {
    .ct-hero { padding: 3rem 0 5rem; }
    .ct-form-card { padding: 1.4rem; }
    .ct-map iframe { height: 320px; }
}
</style>

<!-- HERO -->
<section class="ct-hero">
    <div class="container">
        <div class="ct-hero-icon"><i class="fas fa-envelope"></i></div>
        <h1>Contactez-nous</h1>
        <p>Votre partenaire pour la formation professionnelle en entreprise. Nous sommes là pour vous accompagner.</p>
    </div>
</section>

<!-- CONTENU -->
<div class="container ct-main">
    <div class="row g-4">

        <!-- Colonne gauche : coordonnées -->
        <div class="col-lg-5">
            <div class="ct-info fade-in">
                <div class="ct-info-icon"><i class="fas fa-phone"></i></div>
                <div>
                    <h3 class="ct-info-title">Téléphone</h3>
                    <p class="ct-info-text">+225 07 10 00 05 88 / +225 07 13 41 44 85</p>
                </div>
            </div>

            <div class="ct-info fade-in d2">
                <div class="ct-info-icon"><i class="fas fa-envelope"></i></div>
                <div>
                    <h3 class="ct-info-title">Email</h3>
                    <p class="ct-info-text">formation@monprofchezmoi-ci.com</p>
                </div>
            </div>

            <div class="ct-info fade-in d3">
                <div class="ct-info-icon"><i class="fas fa-map-marker-alt"></i></div>
                <div>
                    <h3 class="ct-info-title">Adresse</h3>
                    <p class="ct-info-text">Riviera 4 Synacassi 1</p>
                </div>
            </div>

            <div class="ct-info fade-in d4">
                <div class="ct-info-icon"><i class="fas fa-clock"></i></div>
                <div>
                    <h3 class="ct-info-title">Horaires</h3>
                    <p class="ct-info-text">Lun - Ven : 08h00 - 18h00<br>Sam : 09h00 - 13h00</p>
                </div>
            </div>
        </div>

        <!-- Colonne droite : formulaire -->
        <div class="col-lg-7">
            <div class="ct-form-card fade-in">
                <h2>Envoyez-nous un message</h2>
                <p class="ct-sub">Remplissez le formulaire, nous vous répondrons sous 24 h.</p>

                <form id="contactForm">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="nom">Nom complet *</label>
                            <input type="text" class="form-control" id="nom" name="nom" autocomplete="name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="email">Email *</label>
                            <input type="email" class="form-control" id="email" name="email" autocomplete="email" required>
                        </div>
                        <div class="col-md-6">
                            <label for="telephone">Téléphone</label>
                            <input type="tel" class="form-control" id="telephone" name="telephone" autocomplete="tel">
                        </div>
                        <div class="col-md-6">
                            <label for="sujet">Sujet *</label>
                            <select class="form-select" id="sujet" name="sujet" required>
                                <option value="">-- Sélectionner --</option>
                                <option>Demande de formation</option>
                                <option>Question sur un bon</option>
                                <option>Problème technique</option>
                                <option>Autre</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="message">Message *</label>
                            <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                        </div>
                    </div>

                    <button type="submit" class="ct-submit mt-4">
                        <i class="fas fa-paper-plane"></i> Envoyer le message
                    </button>
                </form>

                <div id="formMessage" class="mt-3" style="display: none;" role="status" aria-live="polite"></div>
            </div>
        </div>
    </div>

    <!-- CARTE -->
    <div class="ct-section-title fade-in">
        <span class="ct-title-icon"><i class="fas fa-map-marker-alt"></i></span>
        <h2>Notre localisation</h2>
    </div>
    <div class="ct-map fade-in">
        <iframe
            title="Localisation de MonProfChezMoi"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3972.556443707524!2d-3.9514885!3d5.3417569!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfc1edea1cd83b09:0x32fd88f7cbbbec42!2sMONPROFCHEZMOI!5e0!3m2!1sfr!2sfr!4v1700000000000"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>
</div>

<!-- FOOTER -->
<footer class="ct-footer">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="ct-footer-brand">
                    <i class="fas fa-graduation-cap"></i>
                    <h5>MonProfChezMoi</h5>
                </div>
                <p>Votre partenaire pour la formation professionnelle en entreprise.</p>
                <div class="ct-social">
                    <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-md-4">
                <h6 class="ct-footer-heading">Services</h6>
                <ul class="ct-footer-links">
                    <li><a href="{{ route('formations.index') }}"><i class="fas fa-chevron-right"></i>Formations</a></li>
                    <li><a href="{{ route('cours.eligibleFdfp') }}"><i class="fas fa-chevron-right"></i>FDFP</a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i>Support</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h6 class="ct-footer-heading">Contact</h6>
                <ul class="ct-footer-contact">
                    <li><i class="fas fa-phone"></i> +225 07 10 00 05 88</li>
                    <li><i class="fas fa-envelope"></i> formation@monprofchezmoi-ci.com</li>
                    <li><i class="fas fa-map-marker-alt"></i> Riviera 4 Synacassi 1</li>
                </ul>
            </div>
        </div>
        <div class="ct-footer-bottom">
            <p class="mb-0">&copy; {{ date('Y') }} MonProfChezMoi. Tous droits réservés.</p>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Formulaire de contact
    const form = document.getElementById('contactForm');
    const messageDiv = document.getElementById('formMessage');

    form.addEventListener('submit', function (e) {
        e.preventDefault();

        // Simulation d'envoi
        messageDiv.style.display = 'block';
        messageDiv.className = 'alert alert-success mt-3';
        messageDiv.innerHTML = '<i class="fas fa-check-circle"></i> Message envoyé avec succès ! Nous vous répondrons sous 24 h.';

        // Réinitialiser le formulaire
        form.reset();

        // Redirection automatique après 2 s
        setTimeout(function () {
            window.location.href = "{{ route('home') }}";
        }, 2000);
    });

    // Effet de la barre de navigation au défilement (si elle existe)
    window.addEventListener('scroll', function () {
        const navbar = document.querySelector('.navbar-glass');
        if (!navbar) return;
        navbar.classList.toggle('scrolled', window.scrollY > 50);
    });
</script>
</body>
</html>