<?php

namespace App\Http\Controllers;

use App\Models\Domaine;
use Illuminate\Http\Request;

class DomaineController extends Controller
{
    /**
     * Affiche la liste des domaines
     */
    public function index()
    {
        $domaines = Domaine::all();
        return view('domaines.index', compact('domaines'));
    }

    /**
     * Affiche le formulaire de création d’un domaine
     */
    public function create()
    {
        return view('domaines.create');
    }

    /**
     * Enregistre un nouveau domaine
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
        ]);

        Domaine::create([
            'titre' => $request->titre,
        ]);

        return redirect()->route('domaines.index')->with('success', 'Domaine créé avec succès.');
    }

    /**
     * Affiche le détail d’un domaine spécifique
     */
    public function show($id)
    {
        // Récupère le domaine avec ses formations
        $domaine = Domaine::with('formations')->findOrFail($id);

        return view('domaines.show', compact('domaine'));
    }

    /**
     * Affiche le formulaire d’édition d’un domaine
     */
    public function edit(Domaine $domaine)
    {
        return view('domaines.edit', compact('domaine'));
    }

    /**
     * Met à jour un domaine
     */
    public function update(Request $request, Domaine $domaine)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
        ]);

        $domaine->update([
            'titre' => $request->titre,
        ]);

        return redirect()->route('domaines.index')->with('success', 'Domaine mis à jour avec succès.');
    }

    /**
     * Supprime un domaine
     */
    public function destroy(Domaine $domaine)
    {
        $domaine->delete();

        return redirect()->route('domaines.index')->with('success', 'Domaine supprimé avec succès.');
    }
}
