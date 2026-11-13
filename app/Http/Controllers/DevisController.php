<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use Illuminate\Http\Request;

class DevisController extends Controller
{
    public function create(Cours $cours)
    {
        return view('devis.create', compact('cours'));
    }

    public function store(Request $request)
    {
        // Valider les informations du formulaire
        $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'numero' => 'required|string',
            'email' => 'required|email',
            'ville' => 'required|string',
        ]);

        // Créer la demande de devis
        DemandeDevis::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'numero' => $request->numero,
            'email' => $request->email,
            'ville' => $request->ville,
            'cours_id' => $request->cours_id, // Assurez-vous d'inclure le champ cours_id
        ]);

        return redirect()->route('welcome')->with('success', 'Demande de devis envoyée avec succès.');
    }
}