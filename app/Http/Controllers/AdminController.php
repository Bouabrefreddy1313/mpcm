<?php

namespace App\Http\Controllers;

use App\Models\Bon;
use App\Models\Commande;
use App\Models\DemandeDevis;
use App\Models\UtilisationBon; // Ajoutez cette ligne
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function createBon()
    {
        return view('admin.create_bon');
    }

    public function storeBon(Request $request)
    {
        $request->validate([
            'titre' => 'required|string',
            'description' => 'required|string',
            'montant' => 'required|numeric',
        ]);

        Bon::create($request->all());

        return redirect()->route('admin.bons.index')->with('success', 'Bon créé avec succès.');
    }

    public function indexCommandes()
    {
        $commandes = Commande::with('bon')->get();
        return view('commandes.index', compact('commandes'));
    }

    public function validateCommande(Commande $commande)
    {
        $commande->update(['statut' => 'validée']);
        // Envoi d'email optionnel ici
        return redirect()->route('commandes.index')->with('success', 'Commande validée.');
    }

    public function rejectCommande(Commande $commande)
    {
        $commande->update(['statut' => 'rejetée']);
        return redirect()->route('commandes.index')->with('success', 'Commande rejetée.');
    }

    public function indexBons()
    {
        $bons = Bon::all(); // Récupérer tous les bons
        return view('admin.bons.index', compact('bons'));
    }
     public function destroy(Bon $bon)
    {
        // Supprimer le bon
        $bon->delete();

        return redirect()->route('admin.bons.index')->with('success', 'Bon supprimé avec succès.');
    }

     public function createUtilisation()
    {
        $bons = Bon::where('statut', 'actif')->get(); // Récupérer les bons actifs
        return view('admin.utilisation.create', compact('bons'));
    }

   public function storeUtilisation(Request $request)
{
    $request->validate([
        'code_unique' => 'required|string',
        'nom_client' => 'required|string',
        'formation' => 'required|string',
    ]);

    // Vérifier si le bon existe et n'a pas déjà été utilisé
    $bon = Bon::where('code_unique', $request->code_unique)->first();

    if (!$bon) {
        return redirect()->back()->withErrors(['code_unique' => 'Ce bon n\'existe pas.']);
    }

    $utilisation = UtilisationBon::where('bon_id', $bon->id)->first();

    if ($utilisation) {
        return redirect()->back()->withErrors(['code_unique' => 'Ce bon a déjà été utilisé.']);
    }

    // Créer l'utilisation du bon
    UtilisationBon::create([
        'bon_id' => $bon->id,
        'nom_client' => $request->nom_client,
        'formation' => $request->formation,
    ]);

    return redirect()->route('admin.utilisation.index')->with('success', 'Bon utilisé avec succès.');
}

  public function indexUtilisation()
{
    $utilisations = UtilisationBon::has('bon')->with('bon')->get();
    return view('admin.utilisation.index', compact('utilisations'));
}
    public function indexDemandesDevis()
{
    $demandes = DemandeDevis::with('cours')->get(); // Assurez-vous d'ajouter la relation dans le modèle
    return view('admin.demandes.voir', compact('demandes'));
}
}