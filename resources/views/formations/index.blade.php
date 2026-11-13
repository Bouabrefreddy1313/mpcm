@include('partials.header', ['title' => 'Nos formations - MonProfChezMoi'])

    @php
        // Toutes les formations (à plat, sans domaines)
        $allFormations = collect($domaines ?? [])->flatMap(fn ($d) => $d->formations);

        // Si on arrive depuis le méga-menu : ?formation=ID => on n'affiche que celle-ci
        $selectedId = request('formation');
        $formationsAffichees = $selectedId
            ? $allFormations->where('id', (int) $selectedId)
            : $allFormations;

        // Sécurité : id inconnu => on montre tout
        if ($selectedId && $formationsAffichees->isEmpty()) {
            $formationsAffichees = $allFormations;
            $selectedId = null;
        }

        $single = (bool) $selectedId;
        $labels = [
            'top_vente'      => 'TOP VENTE',
            'nouveaute'      => 'NOUVEAUTÉ',
            'incontournable' => 'INCONTOURNABLE',
            'premium'        => 'PREMIUM',
        ];

        // Type de formation : flash (3 ou 4 heures) sinon pratique
        $typeOf = function ($duree) {
            $d = mb_strtolower(trim((string) $duree));
            if (preg_match('/^(\d+)$/', $d, $m) && in_array((int) $m[1], [3, 4])) {
                return 'flash'; // durée saisie sans unité : "3" ou "4"
            }
            if (preg_match('/(\d+(?:[.,]\d+)?)\s*(h|heure)/u', $d, $m)) {
                $h = (float) str_replace(',', '.', $m[1]);
                if ($h == 3 || $h == 4) return 'flash';
            }
            return 'pratique';
        };

        // Compteurs du filtre
        $tousCours = $formationsAffichees
            ->flatMap(fn ($f) => $f->sousFormations)
            ->flatMap(fn ($s) => $s->cours);
        $nbFlash    = $tousCours->filter(fn ($c) => $typeOf($c->duree) === 'flash')->count();
        $nbPratique = $tousCours->count() - $nbFlash;
    @endphp

    <style>
    :root {
    --primary-blue: #2563EB;
    --navy: #1E3A8A;
    --pink: #E6007E;
    --text-dark: #1F2937;
    --text-gray: #6B7280;
    --bg-light: #F9FAFB;
    --card-bg: #FAFAFA;
    --white: #FFFFFF;
    --border-color: #D1D5DB;
    --divider: #9CA3AF;
    --primary-orange: #F97316;
    --dark-orange: #EA580C;
    --primary-green: #16A34A;
    --dark-green: #15803D;
}

    body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color: var(--text-dark); background: var(--white); }

    /* Hero compact */
    .page-hero { background: linear-gradient(135deg, var(--primary-blue), #1E40AF); color: var(--white); padding: 2.5rem 0 2rem; }
    .page-hero h1 { font-size: 2rem; font-weight: 800; margin-bottom: .5rem; }
    .page-hero p { opacity: .95; margin-bottom: 1.25rem; }
    .search-box { position: relative; max-width: 560px; }
    .search-box i { position: absolute; left: 1.1rem; top: 50%; transform: translateY(-50%); color: var(--text-gray); }
    .search-box input { width: 100%; padding: .8rem 1.2rem .8rem 3rem; border: 0; border-radius: 10px; font-size: 1rem; }
    .search-box input:focus { outline: 3px solid rgba(249,115,22,.5); }
    .back-link { color: var(--white); text-decoration: none; font-weight: 600; font-size: .9rem; display: inline-flex; gap: .4rem; align-items: center; margin-bottom: 1rem; opacity: .9; }
    .back-link:hover { color: var(--white); opacity: 1; text-decoration: underline; }

    /* Carte formation */
    .formations-wrap { padding: 2.5rem 0 1rem; }
    .formation-block { background: transparent; padding: 1.25rem 0 1rem; margin-bottom: 1.75rem; scroll-margin-top: 90px; }

    .formation-head { display: flex; align-items: center; gap: 1rem; cursor: pointer; }
    .formation-head h2 { flex: 1; margin: 0; font-size: 1.9rem; font-weight: 400; color: var(--pink); line-height: 1.25; }
    .formation-count { color: var(--text-gray); font-size: .95rem; white-space: nowrap; }

    /* Boutons chevron */
    .chev-btn { flex-shrink: 0; width: 34px; height: 34px; border-radius: 6px; display: grid; place-items: center; font-size: 1rem; cursor: pointer; border: 2px solid var(--navy); transition: background .2s; padding: 0; }
    .chev-btn i { transition: transform .25s ease; }
    .chev-btn.solid { background: var(--navy); color: var(--white); width: 36px; height: 36px; }
    .chev-btn.outline { background: transparent; color: var(--navy); }
    .chev-btn.collapsed i { transform: rotate(180deg); }

    /* Sous-formation */
    .formation-body { margin-top: 1.5rem; }
    .sous-block { margin-bottom: 1.25rem; }
    .sous-head { display: flex; align-items: center; gap: 1rem; cursor: pointer; }
    .sous-head h3 { margin: 0; font-size: 1.15rem; font-weight: 500; text-transform: uppercase; color: var(--text-dark); flex: 1; }
    .sous-head .sous-count { color: var(--text-gray); font-size: .85rem; }

    /* Cours */
    .cours-list { margin-top: 1rem; }
    .cours-item { display: flex; justify-content: space-between; align-items: flex-start; gap: 1.5rem; padding: 1.4rem 0; border-bottom: 1px solid var(--divider); text-decoration: none; color: var(--text-dark); transition: background .2s; }
    .cours-item:last-child { border-bottom: 0; }
    .cours-item:hover { background: rgba(37,99,235,.05); color: var(--text-dark); }
    .cours-main h4 { font-size: 1.15rem; font-weight: 400; margin: 0 0 .9rem; line-height: 1.35; }
    .cours-session { font-size: .85rem; font-weight: 400; color: var(--text-gray); margin: 0; }

    .cours-side { display: flex; flex-direction: column; align-items: flex-end; gap: .7rem; flex-shrink: 0; }
    .cours-line { display: flex; align-items: center; gap: 1.5rem; }
    .cours-code { font-size: .95rem; color: var(--text-dark); white-space: nowrap; }
    .cours-note { display: flex; align-items: center; gap: .5rem; font-weight: 500; font-size: 1.1rem; white-space: nowrap; }
    .cours-note i { color: #FBBF24; font-size: 1.3rem; }

    .tags { display: flex; gap: .4rem; flex-wrap: wrap; justify-content: flex-end; }
    .tag { padding: .1rem .55rem; border-radius: 4px; font-size: .7rem; font-weight: 500; background: transparent; border: 1px solid currentColor; opacity: .85; }
    .tag.top_vente { color: #EA580C; }
    .tag.nouveaute { color: #16A34A; }
    .tag.incontournable { color: #7C3AED; }
    .tag.premium { color: #4B5563; }
    .tag.certifiante { color: var(--primary-green); }
    .tag.eligible { color: #6B7280; }

    .hidden-by-search { display: none !important; }
    .collapsed-panel { display: none; }

    /* Colonne de filtres */
    .filters-col { position: sticky; top: 100px; align-self: flex-start; }
    .filter-card { background: var(--white); border-radius: 10px; padding: 1.25rem 1.25rem 1rem; box-shadow: 0 1px 6px rgba(0,0,0,.06); margin-bottom: 1.5rem; }
    .filter-title { font-size: 1.15rem; font-weight: 600; color: var(--text-dark); margin: 0 0 1rem; }
    .filter-option { display: flex; align-items: flex-start; gap: .75rem; cursor: pointer; margin-bottom: .75rem; color: var(--text-dark); }
    .filter-option input { appearance: none; -webkit-appearance: none; flex-shrink: 0; width: 22px; height: 22px; margin-top: 2px; border: 2px solid var(--navy); border-radius: 4px; background: var(--white); cursor: pointer; display: grid; place-items: center; }
    .filter-option input:checked { background: var(--navy); }
    .filter-option input:checked::after { content: "\2713"; color: var(--white); font-size: .85rem; line-height: 1; }
    .filter-option input:focus-visible { outline: 3px solid rgba(37,99,235,.4); }
    .filter-option small { display: block; color: var(--text-gray); font-size: .8rem; }
    .filter-count { color: var(--text-gray); font-size: .85rem; margin-left: .25rem; }
    .filter-reset { background: none; border: 0; color: var(--primary-blue); font-size: .85rem; padding: 0; cursor: pointer; text-decoration: underline; }

    /* États vides */
    .empty-state, .no-results { text-align: center; padding: 3rem 1rem; background: var(--card-bg); border-radius: 10px; color: var(--text-gray); }
    .no-results { display: none; }

    /* CTA */
    .cta-section { padding: 2rem 0 3rem; }
    .cta-content { background: linear-gradient(135deg, var(--primary-orange), var(--dark-orange)); border-radius: 16px; padding: 2.5rem 1.5rem; text-align: center; color: var(--white); }
    .cta-content h2 { font-size: 1.8rem; font-weight: 800; }
    .cta-content p { opacity: .95; max-width: 650px; margin: .5rem auto 1.5rem; }
    .btn-cta { padding: .9rem 1.8rem; border-radius: 10px; font-weight: 600; text-decoration: none; display: inline-flex; gap: .6rem; align-items: center; transition: all .3s; }
    .btn-cta.primary { background: var(--white); color: var(--primary-orange); }
    .btn-cta.secondary { border: 2px solid var(--white); color: var(--white); margin-left: .5rem; }
    .btn-cta:hover { transform: translateY(-3px); }

    /* Footer */
    .footer { background: var(--white); padding: 3rem 0 1.5rem; border-top: 1px solid #E5E7EB; }
    .footer-brand { display: flex; align-items: center; gap: .5rem; margin-bottom: 1rem; }
    .footer-brand i { font-size: 1.8rem; color: var(--primary-orange); }
    .footer-brand h5 { margin: 0; font-weight: 700; color: var(--primary-blue); }
    .footer-text { color: var(--text-gray); }
    .footer-heading { font-weight: 700; margin-bottom: 1rem; }
    .footer-links, .footer-contact { list-style: none; padding: 0; }
    .footer-links li { margin-bottom: .5rem; }
    .footer-links a { color: var(--text-gray); text-decoration: none; }
    .footer-links a:hover { color: var(--primary-blue); }
    .footer-contact li { color: var(--text-gray); margin-bottom: .75rem; display: flex; gap: .75rem; align-items: center; }
    .footer-contact i { color: var(--primary-orange); width: 18px; }
    .footer-bottom { text-align: center; margin-top: 2rem; padding-top: 1.5rem; border-top: 1px solid #E5E7EB; color: var(--text-gray); font-size: .9rem; }

    @media (max-width: 991px) {
        .filters-col { position: static; }
    }
    @media (max-width: 768px) {
        .formation-head h2 { font-size: 1.4rem; }
        .cours-item { flex-direction: column; gap: .75rem; }
        .cours-side { align-items: flex-start; }
        .cours-line { gap: 1rem; }
        .formation-count { display: none; }
    }
    /* Partenaires */
.partners-section { padding: 2.5rem 0 2rem; background: var(--bg-light); border-top: 1px solid #E5E7EB; border-bottom: 1px solid #E5E7EB; }
.partners-title { text-align: center; font-size: 1.6rem; font-weight: 700; color: var(--navy); margin: 0; }
.partners-sub { text-align: center; color: var(--text-gray); margin: .3rem 0 1.75rem; }

.partners-marquee {
    overflow: hidden;
    position: relative;
    /* fondu sur les bords */
    -webkit-mask-image: linear-gradient(to right, transparent, #000 8%, #000 92%, transparent);
            mask-image: linear-gradient(to right, transparent, #000 8%, #000 92%, transparent);
}
.partners-track {
    display: flex;
    align-items: center;
    width: max-content;
    animation: partners-scroll 30s linear infinite;
}
.partners-marquee:hover .partners-track { animation-play-state: paused; }

.partner-logo {
    flex: 0 0 auto;
    width: 180px;
    height: 90px;
    margin: 0 1.75rem;
    display: grid;
    place-items: center;
}
.partner-logo img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
    transition: transform .3s;
}
.partner-logo img:hover { transform: scale(1.08); }

@keyframes partners-scroll {
    from { transform: translateX(0); }
    to   { transform: translateX(-50%); }
}

@media (max-width: 768px) {
    .partner-logo { width: 130px; height: 70px; margin: 0 1rem; }
    .partners-track { animation-duration: 22s; }
}
@media (prefers-reduced-motion: reduce) {
    .partners-track { animation: none; }
    .partners-marquee { overflow-x: auto; }
}
    </style>

    <!-- Hero -->
    <section class="page-hero">
        <div class="container">
            @if($single)
                <a class="back-link" href="{{ route('formations.index') }}"><i class="fas fa-arrow-left"></i> Voir toutes les formations</a>
            @endif
            <h1>{{ $single ? $formationsAffichees->first()->nom : 'Nos formations' }}</h1>
            <p>{{ $single ? 'Découvrez les thématiques et les cours associés.' : 'Des programmes sur mesure pour développer vos compétences et celles de vos équipes.' }}</p>
            <div class="search-box">
                <i class="fas fa-search"></i>
                <input type="text" id="searchInput" placeholder="Rechercher une formation...">
            </div>
        </div>
    </section>

    <!-- Liste -->
    <section class="formations-wrap">
        <div class="container">
            <div class="row g-4">

                <!-- Filtres -->
                <aside class="col-lg-3" aria-label="Filtres">
                    <div class="filters-col">
                        <div class="filter-card">
                            <h5 class="filter-title">Type de formation</h5>

                            <label class="filter-option">
                                <input type="checkbox" class="type-filter" value="flash">
                                <span>
                                    Flash <span class="filter-count">({{ $nbFlash }})</span>
                                    <small>Formations courtes de 3 à 4 heures</small>
                                </span>
                            </label>

                            <label class="filter-option">
                                <input type="checkbox" class="type-filter" value="pratique">
                                <span>
                                    Formation pratique <span class="filter-count">({{ $nbPratique }})</span>
                                    <small>Formations de plus longue durée</small>
                                </span>
                            </label>

                            <button type="button" class="filter-reset" id="resetFilters">Réinitialiser</button>
                        </div>
                    </div>
                </aside>

                <!-- Contenu -->
                <div class="col-lg-9">

                    @forelse($formationsAffichees as $formation)
                        @php $nbSous = $formation->sousFormations->count(); @endphp

                        <div class="formation-block" id="formation-{{ $formation->id }}">
                            <!-- Titre formation -->
                            <div class="formation-head" data-toggle-target="formBody{{ $formation->id }}">
                                <span class="chev-btn solid {{ $single ? '' : 'collapsed' }}"><i class="fas fa-chevron-up"></i></span>
                                <h2>{{ $formation->nom }}</h2>
                                <span class="formation-count">{{ $nbSous }} thématique{{ $nbSous > 1 ? 's' : '' }}</span>
                            </div>

                            <div id="formBody{{ $formation->id }}" class="formation-body {{ $single ? '' : 'collapsed-panel' }}">
                                @foreach($formation->sousFormations as $sous)
                                    @php $nbCours = $sous->cours->count(); @endphp

                                    <div class="sous-block">
                                        <!-- Sous-formation (déroulant) -->
                                        <div class="sous-head" data-toggle-target="sous{{ $sous->id }}">
                                            <span class="chev-btn outline collapsed"><i class="fas fa-chevron-up"></i></span>
                                            <h3>{{ $sous->nom }}</h3>
                                            <span class="sous-count">{{ $nbCours }} formation{{ $nbCours > 1 ? 's' : '' }}</span>
                                        </div>

                                        <!-- Cours -->
                                        <div id="sous{{ $sous->id }}" class="cours-list collapsed-panel">
                                            @forelse($sous->cours as $cours)
                                                @php
                                                    $nbAvis  = $cours->avis->count();
                                                    $moyenne = $nbAvis ? $cours->avis->avg('etoiles') : null;
                                                @endphp
                                                <a href="{{ route('cours.show', $cours->id) }}"
                                                   class="cours-item cours-search"
                                                   data-search="{{ strtolower($cours->titre) }}"
                                                   data-type="{{ $typeOf($cours->duree) }}">
                                                    <div class="cours-main">
                                                        <h4>{{ $cours->titre }}</h4>
                                                        <p class="cours-session"><i class="fas fa-user-tie"></i> {{ $cours->formateur }}</p>
                                                    </div>

                                                    <div class="cours-side">
                                                        <div class="cours-line">
                                                            <span class="cours-code"><i class="far fa-clock"></i> {{ $cours->duree }}</span>
                                                            @if($moyenne)
                                                                <span class="cours-note">
                                                                    <i class="fas fa-star"></i>{{ number_format($moyenne, 1, ',', '') }}/5
                                                                </span>
                                                            @endif
                                                        </div>
                                                        <div class="tags">
                                                            @if($cours->etiquette)
                                                                <span class="tag {{ $cours->etiquette }}">
                                                                    {{ $labels[$cours->etiquette] ?? strtoupper($cours->etiquette) }}
                                                                </span>
                                                            @endif
                                                            @if((int) $cours->certifiante === 1)
                                                                <span class="tag certifiante">Certifiante interne</span>
                                                            @endif
                                                            @if((int) $cours->eligible === 1)
                                                                <span class="tag eligible">Éligible FDFP</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </a>
                                            @empty
                                                <p class="text-muted py-3 mb-0">Aucun cours disponible</p>
                                            @endforelse
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @empty
                        <div class="empty-state">
                            <h3>Aucune formation disponible</h3>
                            <p class="mb-0">Les formations seront bientôt ajoutées. Revenez plus tard !</p>
                        </div>
                    @endforelse

                    <div class="no-results" id="noResults">
                        <h3>Aucune formation trouvée</h3>
                        <p class="mb-0">Essayez avec d'autres mots-clés ou d'autres filtres</p>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- Partenaires -->
@php
    $partenaires = ['par1.png', 'par2.png', 'par3.png', 'par4.png', 'par5.jpg', 'par6.png'];
@endphp
<section class="partners-section" aria-label="Nos partenaires">
    <div class="container">
        <h2 class="partners-title">Ils nous font confiance</h2>
        <p class="partners-sub">Nos entreprises partenaires</p>
    </div>

    <div class="partners-marquee">
        <div class="partners-track">
            {{-- Deux séries identiques pour une boucle sans coupure --}}
            @foreach([1, 2] as $serie)
                @foreach($partenaires as $img)
                    <div class="partner-logo" @if($serie === 2) aria-hidden="true" @endif>
                        <img src="{{ asset('img/' . $img) }}"
                             alt="{{ $serie === 1 ? 'Logo partenaire ' . ($loop->iteration) : '' }}"
                             loading="lazy">
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>
</section>

    <!-- CTA -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-content">
                <h2>Besoin d'une formation sur mesure ?</h2>
                <p>Nos experts sont à votre disposition pour créer un programme adapté à vos besoins spécifiques</p>
                <a class="btn-cta primary" href="{{ route('contact') }}"><i class="fas fa-envelope"></i> Nous contacter</a>
                <a class="btn-cta secondary" href="tel:+2250710000588"><i class="fas fa-phone"></i> +225 07 10 00 05 88</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="footer-brand"><i class="fas fa-graduation-cap"></i><h5>MonProfChezMoi</h5></div>
                    <p class="footer-text">Votre partenaire pour la formation professionnelle en entreprise.</p>
                </div>
                <div class="col-md-4">
                    <h6 class="footer-heading">Services</h6>
                    <ul class="footer-links">
                        <li><a href="{{ route('formations.index') }}">Formations</a></li>
                        <li><a href="{{ route('bons.index') }}">Bons de commande</a></li>
                        <li><a href="{{ route('client.formation.create') }}">Formation sur mesure</a></li>
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
            <div class="footer-bottom"><p class="mb-0">&copy; {{ date('Y') }} MonProfChezMoi. Tous droits réservés.</p></div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    (function () {
        // Déroulants (formation + sous-formation)
        document.querySelectorAll('[data-toggle-target]').forEach(function (head) {
            head.addEventListener('click', function () {
                var panel = document.getElementById(head.dataset.toggleTarget);
                var btn = head.querySelector('.chev-btn');
                if (!panel) return;
                var hidden = panel.classList.toggle('collapsed-panel');
                if (btn) btn.classList.toggle('collapsed', hidden);
            });
        });

        // Recherche + filtre par type (combinés)
        var input = document.getElementById('searchInput');
        var noResults = document.getElementById('noResults');
        var typeBoxes = document.querySelectorAll('.type-filter');

        function openPanel(p) {
            if (!p) return;
            p.classList.remove('collapsed-panel');
            var btn = document.querySelector('[data-toggle-target="' + p.id + '"] .chev-btn');
            if (btn) btn.classList.remove('collapsed');
        }

        function applyFilters() {
            var q = input.value.toLowerCase().trim();
            var types = Array.from(typeBoxes)
                .filter(function (b) { return b.checked; })
                .map(function (b) { return b.value; });
            var active = q !== '' || types.length > 0;
            var visible = 0;

            document.querySelectorAll('.cours-search').forEach(function (c) {
                var okSearch = q === '' || c.dataset.search.includes(q);
                var okType = types.length === 0 || types.includes(c.dataset.type);
                var match = okSearch && okType;

                c.classList.toggle('hidden-by-search', !match);
                if (match && active) {
                    visible++;
                    openPanel(c.closest('.cours-list'));
                    openPanel(c.closest('.formation-body'));
                }
            });

            // Masque les sous-formations et formations sans résultat
            document.querySelectorAll('.sous-block').forEach(function (s) {
                var has = s.querySelector('.cours-search:not(.hidden-by-search)');
                s.classList.toggle('hidden-by-search', active && !has);
            });
            document.querySelectorAll('.formation-block').forEach(function (f) {
                var has = f.querySelector('.cours-search:not(.hidden-by-search)');
                f.classList.toggle('hidden-by-search', active && !has);
            });

            noResults.style.display = (active && visible === 0) ? 'block' : 'none';
        }

        input.addEventListener('input', applyFilters);
        typeBoxes.forEach(function (b) { b.addEventListener('change', applyFilters); });
        document.getElementById('resetFilters').addEventListener('click', function () {
            typeBoxes.forEach(function (b) { b.checked = false; });
            applyFilters();
        });

        // Ancre depuis le méga-menu : scroll vers la formation
        if (location.hash) {
            var t = document.querySelector(location.hash);
            if (t) setTimeout(function () { t.scrollIntoView({ behavior: 'smooth', block: 'start' }); }, 200);
        }
    })();
    </script>
    </body>
    </html>