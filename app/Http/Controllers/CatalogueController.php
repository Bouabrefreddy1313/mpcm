<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalogue;
use App\Models\Domaine;

class CatalogueController extends Controller
{
    public function index()
    {
        $catalogues = Catalogue::all();
        return view('catalogues.index', compact('catalogues'));
    }

    public function create()
    {
        $domaines = Domaine::all();
        return view('catalogues.create', compact('domaines'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'domaine_id' => 'required|exists:domaines,id',
            'fichier' => 'required|mimes:pdf|max:10240', // 10 MB max
        ]);

        // Upload du PDF
        $pdfPath = $request->file('fichier')->store('catalogues', 'public');

        Catalogue::create([
            'titre' => $request->titre,
            'domaine_id' => $request->domaine_id,
            'fichier' => $pdfPath,
        ]);

        return redirect()->route('catalogues.index')->with('success', 'Catalogue créé avec succès.');
    }
}
