<?php

namespace App\Http\Controllers;

use App\Models\Avis;
use App\Models\Cours;
use Illuminate\Http\Request;

class AvisController extends Controller
{
    /**
     * Formulaire public d'évaluation (avec sélection de cours ou pré-rempli)
     */
    public function create(Request $request)
    {
        $cours = Cours::orderBy('titre')->get();
        $selectedCours = null;

        if ($request->filled('cours_id')) {
            $selectedCours = Cours::find($request->get('cours_id'));
        }

        return view('avis.create', compact('cours', 'selectedCours'));
    }

    /**
     * Lien direct envoyé au client pour noter un cours spécifique
     * Exemple : /noter-cours/5
     */
    public function noterCours(Cours $cours)
    {
        $selectedCours = $cours;
        $coursList = Cours::orderBy('titre')->get();

        return view('avis.create', [
            'cours' => $coursList,
            'selectedCours' => $selectedCours
        ]);
    }

    /**
     * Enregistrer l'avis
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'cours_id' => 'required|exists:cours,id',
            'nom' => 'required|string|max:255',
            'etoiles' => 'required|integer|min:1|max:5',
            'commentaire' => 'required|string|min:3|max:3000'
        ], [
            'cours_id.required' => 'Veuillez sélectionner un cours.',
            'cours_id.exists' => 'Le cours sélectionné est introuvable.',
            'nom.required' => 'Veuillez renseigner votre nom.',
            'etoiles.required' => 'Veuillez attribuer une note avec les étoiles.',
            'etoiles.min' => 'La note doit être comprise entre 1 et 5 étoiles.',
            'etoiles.max' => 'La note doit être comprise entre 1 et 5 étoiles.',
            'commentaire.required' => 'Veuillez rédiger un commentaire ou votre retour d\'expérience.',
            'commentaire.min' => 'Le commentaire doit contenir au moins 3 caractères.'
        ]);

        Avis::create([
            'cours_id' => $validated['cours_id'],
            'nom' => $validated['nom'],
            'etoiles' => $validated['etoiles'],
            'commentaire' => $validated['commentaire']
        ]);

        // Si la soumission provient de la page d'un cours spécifique, rediriger vers l'ancre #avis
        if ($request->has('redirect_to_cours')) {
            return redirect()->to(route('cours.show', $validated['cours_id']) . '#avis')
                ->with('success', 'Merci ! Votre avis a bien été enregistré.');
        }

        return redirect()->back()
            ->with('success', 'Merci beaucoup ! Votre avis a été enregistré avec succès.');
    }
}
