<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormationClient;

class FormationClientController extends Controller
{
    public function create()
    {
        return view('client.formations.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'periode' => 'required|string|max:255',
            'nombre_personnes' => 'required|integer|min:1',
            'besoins' => 'required|string',
            'civilite' => 'required|in:Monsieur,Madame,Autre',
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telephone' => 'required|string|max:50',
            'entreprise' => 'nullable|string|max:255',
        ]);

        FormationClient::create($validated);

        return redirect()->back()->with('success', 'Votre demande de formation a bien été envoyée !');
    }

    public function index()
{
    $demandes = \App\Models\FormationClient::latest()->get();
    return view('admin.demandes.index', compact('demandes'));
}

}
