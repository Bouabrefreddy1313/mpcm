<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use App\Models\Domaine;
use App\Models\Cours;
use App\Models\Telechargement;
use Illuminate\Http\Request;

class FormationController extends Controller
{
     public function televoir()
    {
        $telechargements = Telechargement::orderBy('created_at', 'desc')->paginate(20);
        
        // Statistiques
        $stats = [
            'total' => Telechargement::count(),
            'aujourd_hui' => Telechargement::whereDate('created_at', today())->count(),
            'ce_mois' => Telechargement::whereMonth('created_at', now()->month)
                                       ->whereYear('created_at', now()->year)
                                       ->count(),
        ];
        
        // Compteur par catalogue
        $parCatalogue = Telechargement::select('catalogue')
            ->selectRaw('COUNT(*) as total')
            ->groupBy('catalogue')
            ->orderByDesc('total')
            ->get();
        
        return view('admin.telechargements.index', compact('telechargements', 'stats', 'parCatalogue'));
    }
     public function welcome()
    {
        $formations = Formation::all();  // Récupérez toutes les formations
        // Récupère tous les domaines (ou les 4 premiers si tu veux limiter)
    $domaines = Domaine::all(); // ou ->take(4) pour limiter à 4

    // Passe les données à la vue
    return view('welcome', compact('formations', 'domaines'));  // Remplacez par le nom de votre vue
    }
    
    public function telecharger()
    {
        $catalogues = [
            [
                'id' => 'management-soft-skills',
                'titre' => 'Catalogue Management & Soft Skills',
                'description' => 'Développez vos compétences managériales et comportementales avec nos formations en leadership, gestion d\'équipe et communication.',
                'icone' => 'fa-users-cog',
                'fichier' => 'catalogues/management-soft-skills.pdf'
            ],
            [
                'id' => 'informatique',
                'titre' => 'Catalogue Informatique',
                'description' => 'Formations en bureautique, programmation, cybersécurité et nouvelles technologies pour maîtriser les outils numériques.',
                'icone' => 'fa-laptop-code',
                'fichier' => 'catalogues/informatique.pdf'
            ],
            [
                'id' => 'competences-metiers',
                'titre' => 'Catalogue Compétences Métiers',
                'description' => 'Renforcez votre expertise professionnelle avec nos formations sectorielles adaptées à votre métier.',
                'icone' => 'fa-briefcase',
                'fichier' => 'catalogues/competences-metiers.pdf'
            ],
            [
                'id' => 'industrielles-techniques',
                'titre' => 'Catalogue Formations Industrielles et Techniques',
                'description' => 'Formations techniques pour les secteurs industriel, maintenance, sécurité et production.',
                'icone' => 'fa-industry',
                'fichier' => 'catalogues/industrielles-techniques.pdf'
            ],
            [
                'id' => 'catalogue-general',
                'titre' => 'Catalogue Général',
                'description' => 'Découvrez l\'ensemble de nos formations dans notre catalogue complet et actualisé.',
                'icone' => 'fa-book-open',
                'fichier' => 'catalogues/catalogue-general.pdf'
            ]
        ];

        return view('catalogues.telecharger', compact('catalogues'));
    }
    
    public function storetele(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telephone' => 'nullable|string|max:20',
            'entreprise' => 'nullable|string|max:255',
            'fonction' => 'nullable|string|max:255',
            'catalogue' => 'required|string',
            'fichier' => 'required|string'
        ]);

        // Enregistrer les informations
        Telechargement::create($validated);

        // Rediriger vers le téléchargement du fichier
        return redirect()->route('telecharger.download', [
            'fichier' => $validated['fichier']
        ]);
    }
 public function download($fichier)
    {
        $path = storage_path('app/public/' . $fichier);
        
        if (!file_exists($path)) {
            $path = public_path($fichier);
        }

        if (file_exists($path)) {
            return response()->download($path);
        }

        return redirect()->route('telecharger.index')->with('error', 'Fichier non trouvé.');
    }
 public function index()
{
    $domaines = Domaine::with(['formations.sousFormations.cours'])->get();
    $formations = Formation::all(); // <-- ajoutez cette ligne
    return view('formations.index', compact('domaines', 'formations'));
}
    

 public function create()
    {
        $domaines = Domaine::all();
        return view('formations.create', compact('domaines'));
    }

    public function store(Request $request)
{
    $request->validate([
        'nom' => 'required',
        'description' => 'required',
        'image' => 'nullable|image|max:2048',
        'pour_entreprise' => 'required',
        'domaine_id' => 'required|exists:domaines,id',
    ]);

    $data = $request->only(['nom', 'description', 'pour_entreprise', 'domaine_id']);

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('formations', 'public');
        $data['image'] = $imagePath;
    }

    Formation::create($data);

    return redirect()->route('formations.index')->with('success', 'Formation créée avec succès.');
}

    public function show(Formation $formation)
{
    return view('formations.show', compact('formation'));
}

// Afficher le formulaire d'édition
public function edit($id)
{
    $formation = Formation::findOrFail($id);
    $domaines = Domaine::all(); // Pour la sélection du domaine
    return view('admin.formations.edit', compact('formation', 'domaines'));
}

// Mettre à jour la formation
public function update(Request $request, $id)
{
    $request->validate([
        'nom' => 'required',
        'description' => 'required',
        'image' => 'nullable|image',
        'pour_entreprise' => 'required',
        'domaine_id' => 'required|exists:domaines,id',
    ]);

    $formation = Formation::findOrFail($id);

    // Si une image est uploadée
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $path = $file->store('images', 'public');
        $formation->image = $path;
    }

    $formation->update($request->all());

    return redirect()->route('admin.formations.index')->with('success', 'Formation mise à jour avec succès.');
}

// Supprimer une formation
public function destroy($id)
{
    $formation = Formation::findOrFail($id);
    $formation->delete();

    return redirect()->route('admin.formations.index')->with('success', 'Formation supprimée avec succès.');
}

   public function adminIndex()
    {
        // On récupère les formations avec leur domaine associé
        $formations = Formation::with('domaine')->get();

        // On envoie ça à la vue admin.formations.index
        return view('admin.formations.index', compact('formations'));
    }
    public function catalogueInteractif()
{
    $domaines = Domaine::with(['formations.sousFormations.cours'])->get();
    return view('formations.catalogue-interactif', compact('domaines'));
}
// app/Http/Controllers/FormationController.php


    // Ajoutez d'autres méthodes pour edit, update, delete, etc.
}