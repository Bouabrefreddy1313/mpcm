<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\SousFormationController;
use App\Http\Controllers\CoursController;
use App\Http\Controllers\DevisController;
use App\Http\Controllers\FormationClientController;
use App\Models\Formation;
use App\Models\SousFormation; // Assurez-vous que ce modèle existe
use App\Models\Cours; // Assurez-vous que ce modèle existe
use App\Http\Controllers\BonController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DomaineController;
use App\Http\Controllers\CatalogueController;
use App\Http\Controllers\FormateurController;
use App\Http\Controllers\AvisController;
use App\Http\Controllers\Commercial\CommercialAuthController;
use App\Http\Controllers\Commercial\CommercialDashboardController;

Route::get('/', [FormationController::class, 'welcome'])->name('home');

Route::get('/dashboard', function () {
    $stats = [
        'formations'      => Formation::count(),
        'sous_formations' => SousFormation::count(),
        'cours'           => Cours::count(),
    ];

    // Liste des cours avec leur nombre d'avis, pour la section "Liens d'évaluation"
    $coursList = Cours::withCount('avis')->orderBy('titre')->get();

    // Statistiques de visites (jour / semaine / mois)
    $visites = \App\Support\VisiteStats::pourDashboard();

    return view('dashboard', compact('stats', 'coursList', 'visites'));
})->name('dashboard');

Route::get('/admin/telechargements', [FormationController::class, 'televoir'])
    ->name('admin.telechargements.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

 Route::resource('formations', FormationController::class);
    Route::resource('sous_formations', SousFormationController::class);
    Route::resource('cours', CoursController::class);
// ✅ Route pour afficher les demandes des clients
Route::get('/demandes-formations', [App\Http\Controllers\FormationClientController::class, 'index'])
    ->name('admin.demandes.index');
Route::resource('formations', FormationController::class);
Route::get('/formations/{formation}', [FormationController::class, 'show'])->name('formations.show');
Route::get('/sous-formations/{sousFormation}', [SousFormationController::class, 'show'])->name('sous-formations.show');
Route::get('/cours/{cours}', [CoursController::class, 'show'])->name('cours.show');


Route::get('/bons', [BonController::class, 'index'])->name('bons.index');
Route::get('/bons/{bon}', [BonController::class, 'show'])->name('bons.show');

Route::get('/commandes/create/{bon}', [CommandeController::class, 'create'])->name('commandes.create');
Route::post('/commandes', [CommandeController::class, 'store'])->name('commandes.store');
Route::get('/commandes', [CommandeController::class, 'index'])->name('commandes.index');
Route::post('/commandes/validate/{commande}', [CommandeController::class, 'validateCommande'])->name('commandes.validate');
Route::post('/commandes/reject/{commande}', [CommandeController::class, 'rejectCommande'])->name('commandes.reject');



// Routes pour l'administration
// Routes pour l'administration
Route::prefix('admin')->group(function () {
    Route::get('/bons', [AdminController::class, 'indexBons'])->name('admin.bons.index');
    Route::get('/bons/create', [AdminController::class, 'createBon'])->name('admin.bons.create');
    Route::post('/bons', [AdminController::class, 'storeBon'])->name('admin.bons.store');
    Route::delete('/bons/{bon}', [AdminController::class, 'destroy'])->name('admin.bons.destroy'); // Route de suppression
    Route::get('/commandes', [AdminController::class, 'indexCommandes'])->name('admin.commandes.index');
    Route::post('/commandes/validate/{commande}', [AdminController::class, 'validateCommande'])->name('admin.commandes.validate');
    Route::post('/commandes/reject/{commande}', [AdminController::class, 'rejectCommande'])->name('admin.commandes.reject');
    Route::get('/utilisation/create', [AdminController::class, 'createUtilisation'])->name('admin.utilisation.create');
    Route::post('/utilisation', [AdminController::class, 'storeUtilisation'])->name('admin.utilisation.store');
    Route::get('/utilisation', [AdminController::class, 'indexUtilisation'])->name('admin.utilisation.index');
});


Route::get('/demande-formation', [FormationClientController::class, 'create'])->name('client.formation.create');
Route::post('/demande-formation', [FormationClientController::class, 'store'])->name('client.formation.store');


Route::get('/devis/{cours}', [DevisController::class, 'create'])->name('devis.create');
Route::post('/devis', [DevisController::class, 'store'])->name('devis.store');

Route::get('/admin/demandes-devis', [AdminController::class, 'indexDemandesDevis'])->name('admin.demandes.voir');


// Afficher les cours éligibles d'une sous-formation
Route::get('/sous-formations/{id}/eligible-cours', [CoursController::class, 'eligibleCours'])
    ->name('sousformations.eligibleCours');
    
    Route::resource('domaines', DomaineController::class);

Route::resource('catalogues', CatalogueController::class);


// Route admin (nouvelle)
Route::get('/admin/formations', [FormationController::class, 'adminIndex'])->name('admin.formations.index');
// Modifier une formation
Route::get('/admin/formations/{id}/edit', [FormationController::class, 'edit'])->name('admin.formations.edit');
Route::put('/admin/formations/{id}', [FormationController::class, 'update'])->name('admin.formations.update');

// Supprimer une formation
Route::delete('/admin/formations/{id}', [FormationController::class, 'destroy'])->name('admin.formations.destroy');

// Admin - Liste des cours
Route::get('/admin/cours', [CoursController::class, 'adminIndex'])->name('admin.cours.index');

// Modifier un cours
Route::get('/admin/cours/{id}/edit', [CoursController::class, 'edit'])->name('admin.cours.edit');
Route::put('/admin/cours/{id}', [CoursController::class, 'update'])->name('admin.cours.update');

// Supprimer un cours
Route::delete('/admin/cours/{id}', [CoursController::class, 'destroy'])->name('admin.cours.destroy');

// Admin - Liste des sous-formations
Route::get('/admin/sous-formations', [SousFormationController::class, 'adminIndex'])->name('admin.sousformations.index');

// Modifier une sous-formation
Route::get('/admin/sous-formations/{id}/edit', [SousFormationController::class, 'edit'])->name('admin.sousformations.edit');
Route::put('/admin/sous-formations/{id}', [SousFormationController::class, 'update'])->name('admin.sousformations.update');

// Supprimer une sous-formation
Route::delete('/admin/sous-formations/{id}', [SousFormationController::class, 'destroy'])->name('admin.sousformations.destroy');

// Page pour voir les formations d’un domaine
Route::get('/domaines/{id}', [DomaineController::class, 'show'])->name('domaines.show');

Route::get('/catalogue-interactif', [FormationController::class, 'catalogueInteractif'])->name('formations.catalogue-interactif');

Route::get('/telecharger', [FormationController::class, 'telecharger'])->name('telecharger.index');
Route::post('/telecharger', [FormationController::class, 'storetele'])->name('telecharger.store');
Route::get('/telecharger/download/{fichier}', [FormationController::class, 'download'])->name('telecharger.download');
// routes/web.php
// routes/web.php
Route::get('/cours-certifiants', [CoursController::class, 'certifiants'])->name('cours.certifiants');

// routes/web.php
Route::get('/cours-eligible-fdfp', [CoursController::class, 'eligibleFdfp'])->name('cours.eligibleFdfp');
// routes/web.php
Route::view('/contact', 'contact')->name('contact');

Route::get('/formateurs', [FormateurController::class, 'index'])->name('formateurs.index');
    Route::get('/formateurs/create', [FormateurController::class, 'create'])->name('formateurs.create');
    Route::post('/formateurs', [FormateurController::class, 'store'])->name('formateurs.store');
    Route::get('/formateurs/{id}/edit', [FormateurController::class, 'edit'])->name('formateurs.edit');
    Route::put('/formateurs/{id}', [FormateurController::class, 'update'])->name('formateurs.update');
    Route::delete('/formateurs/{id}', [FormateurController::class, 'destroy'])->name('formateurs.destroy');
    // ===== ROUTES PUBLIQUES =====
Route::get('/formateur/{slug}', [FormateurController::class, 'show'])->name('formateurs.show');
Route::get('/cours/{id}', [CoursController::class, 'show'])->name('cours.show');

Route::get('/cours/{cours}/pdf', [CoursController::class, 'downloadPdf'])->name('cours.pdf');

// Route pour afficher le formulaire (GET)
Route::get('/cours/{cours}/pdf/formulaire', [CoursController::class, 'showPdfForm'])->name('cours.pdf.form');

// Route pour traiter le formulaire et télécharger (POST)
Route::post('/cours/{cours}/pdf/telecharger', [CoursController::class, 'downloadPdfWithForm'])->name('cours.pdf.download');

Route::get('/avis/create', [AvisController::class, 'create'])->name('avis.create');
Route::get('/noter-cours/{cours}', [AvisController::class, 'noterCours'])->name('cours.noter');
Route::get('/avis/cours/{cours}', [AvisController::class, 'noterCours'])->name('avis.cours');
Route::post('/avis/store', [AvisController::class, 'store'])
    ->name('avis.store');

// ===== ROUTES ESPACE COMMERCIAL =====
Route::prefix('commercial')->name('commercial.')->group(function () {
    Route::get('/login', [CommercialAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [CommercialAuthController::class, 'login'])->name('login.submit');
    Route::get('/register', [CommercialAuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [CommercialAuthController::class, 'register'])->name('register.submit');
    Route::post('/logout', [CommercialAuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [CommercialDashboardController::class, 'index'])
        ->name('dashboard');
});

require __DIR__.'/auth.php';
