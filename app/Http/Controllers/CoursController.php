<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use App\Models\Formation;
use App\Models\SousFormation;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str; // ← Ajoute ça
use App\Models\TelechargementPdf;

class CoursController extends Controller
{
    public function create()
    {
        $sousFormations = SousFormation::all();
        return view('cours.create', compact('sousFormations'));
    }
    
     public function liste()
    {
        $formations = Formation::all();
        return view('formations.index', compact('formations'));
    }
    
    
     public function tout()
    {
        $formations = Formation::all();
        return view('formations.index', compact('formations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required',
            'objectif' => 'required',
            'lieu' => 'required',
            'public_cible' => 'required',
            'formateur' => 'required',
            'prerequis' => 'required',
            'programme' => 'required',
            'duree' => 'required',
            'tarif' => 'required',
            'description' => 'required',
            'image' => 'nullable|image',
            'sous_formation_id' => 'required|exists:sous_formations,id',
            'eligible' => 'nullable|boolean',
            'certifiante' => 'nullable|boolean',
            'etiquette' => 'nullable|in:top_vente,nouveaute,incontournable,premium',
        ]);
       $data = $request->all();
$data['eligible'] = $request->has('eligible') ? true : false;

Cours::create([
    'titre' => $request->titre,
    'objectif' => $request->objectif,
    'lieu' => $request->lieu,
    'public_cible' => $request->public_cible,
    'formateur' => $request->formateur,
    'prerequis' => $request->prerequis,
    'programme' => $request->programme,
    'duree' => $request->duree,
    'tarif' => $request->tarif,
    'description' => $request->description,
    'image' => $request->image,
    'sous_formation_id' => $request->sous_formation_id,
    'eligible' => $request->has('eligible'),
    'certifiante'  => $request->has('certifiante'),
    'etiquette' => $request->etiquette,
]);


        return redirect()->route('cours.index')->with('success', 'Cours créé avec succès.');
    }

    public function index(Request $request)
    {
        $formations = Formation::orderBy('nom')->get();
        $selectedFormationId = $request->query('formation_id');
        $selectedFormation = null;
        $cours = collect();

        if ($selectedFormationId) {
            $query = Cours::with(['sousFormation.formation']);

            if ($selectedFormationId !== 'all') {
                $query->whereHas('sousFormation', function ($q) use ($selectedFormationId) {
                    $q->where('formation_id', $selectedFormationId);
                });
                $selectedFormation = Formation::find($selectedFormationId);
            }

            $cours = $query->orderBy('titre')->get();
        }

        return view('cours.index', compact('cours', 'formations', 'selectedFormationId', 'selectedFormation'));
    }
    public function show($id)
    {
        $cours = Cours::with([
            'formateurs',
            'avis' => function ($query) {
                $query->latest();
            }
        ])->findOrFail($id);

        // Moyenne des notes
        $average = $cours->avis->avg('etoiles') ?? 0;

        // Nombre d'avis
        $totalAvis = $cours->avis->count();

        return view('cours.show', compact('cours', 'average', 'totalAvis'));
    }
public function eligibleCours($id)
{
    $cours = Cours::where('eligible', 1)
                  ->orderBy('titre')
                  ->get();

    return view('cours.eligible', compact('cours'));
}

// Liste des cours pour admin
    public function adminIndex()
    {
        $cours = Cours::with('sousFormation.formation')->get();
        return view('admin.cours.index', compact('cours'));
    }

    // Formulaire édition
    public function edit($id)
    {
        $cours = Cours::findOrFail($id);
        $formations = Formation::all();
        $sousFormations = SousFormation::all();
        return view('admin.cours.edit', compact('cours', 'formations', 'sousFormations'));
    }

    // Mise à jour du cours
    public function update(Request $request, $id)
    {
        $request->validate([
            'titre' => 'required',
            'description' => 'required',
            'video' => 'nullable|mimetypes:video/mp4,video/avi,video/mov|max:20000', // max 20MB
            'sous_formation_id' => 'required|exists:sous_formations,id',
        ]);

        $cours = Cours::findOrFail($id);

        if ($request->hasFile('video')) {
            $file = $request->file('video');
            $path = $file->store('videos', 'public');
            $cours->video = $path;
        }

        $cours->update($request->all());

        return redirect()->route('admin.cours.index')->with('success', 'Cours mis à jour avec succès.');
    }

    // Supprimer un cours
    public function destroy($id)
    {
        $cours = Cours::findOrFail($id);
        $cours->delete();

        return redirect()->route('admin.cours.index')->with('success', 'Cours supprimé avec succès.');
    }
    // app/Http/Controllers/CoursController.php
public function certifiants()
{
    $cours = Cours::with('sousFormation.formation')
                  ->where('certifiante', true)
                  ->get();

    return view('cours.certifiants', compact('cours'));
}

// app/Http/Controllers/CoursController.php
public function eligibleFdfp()
{
    $cours = Cours::with('sousFormation.formation')
                  ->where('eligible', true)
                  ->get();

    return view('cours.eligibleFdfp', compact('cours'));
}

 public function downloadPdf(Cours $cours)
    {
        // Charge les relations nécessaires
        $cours->load('formateurs');
        
        $pdf = Pdf::loadView('cours.pdf', compact('cours'));
        
        // Nom du fichier : fiche-{slug-du-cours}.pdf
        $filename = 'fiche-' . \Str::slug($cours->titre) . '.pdf';
        
        return $pdf->download($filename);
    }
 /**
     * Affiche le formulaire avant téléchargement PDF
     */
     public function showPdfForm(Cours $cours)
    {
        return view('cours.pdf-form', compact('cours'));
    }

    public function downloadPdfWithForm(Request $request, Cours $cours)
    {
       $validated = $request->validate([
    'nom' => 'required|string|max:255',
    'nom_entreprise' => 'required|string|max:255',
    'email_entreprise' => 'required|email|max:255',
    'telephone' => 'required|string|max:20',
]);

        $cours->load('formateurs');
        $pdf = Pdf::loadView('cours.pdf', compact('cours'));
        $filename = 'fiche-' . Str::slug($cours->titre) . '.pdf';

        // Enregistrement
        TelechargementPdf::create([
    'cours_id' => $cours->id,
    'nom' => $validated['nom'],
    'nom_entreprise' => $validated['nom_entreprise'],
    'email_entreprise' => $validated['email_entreprise'],
    'telephone' => $validated['telephone'],
    'nom_fichier_pdf' => $filename,
    'ip_address' => $request->ip(),
    'user_agent' => $request->userAgent(),
]);

        return $pdf->download($filename);
    }
    // Ajoutez d'autres méthodes pour edit, update, delete, etc.
}