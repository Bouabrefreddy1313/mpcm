<?php

namespace App\Http\Controllers;

use App\Models\Formateur;
use App\Models\Cours;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class FormateurController extends Controller
{
    public function index()
    {
        $formateurs = Formateur::with('cours')->orderBy('nom')->paginate(20);
        return view('formateurs.index', compact('formateurs'));
    }

    public function create()
    {
        $cours = Cours::all();
        return view('formateurs.create', compact('cours'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'cours_id' => 'required|exists:cours,id',
            'nom' => 'required|string|max:255',
            'fonction_actuelle' => 'required|string|max:255',
            'domaines_intervention' => 'required|string',
            'domaines_expertise' => 'required|string',
            'parcours_professionnel_academique' => 'required|string',
            'style_pedagogique' => 'required|string',
            'devise_philosophie' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'actif' => 'boolean',
        ]);

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('formateurs', 'public');
            $validated['photo'] = basename($photoPath);
        }

        $validated['slug'] = Str::slug($validated['nom']);
        $validated['actif'] = $request->has('actif');

        Formateur::create($validated);

        return redirect()->route('formateurs.index')
            ->with('success', 'Formateur créé avec succès !');
    }

    public function show($slug)
    {
        $formateur = Formateur::with('cours')->where('slug', $slug)->firstOrFail();
        return view('formateurs.show', compact('formateur'));
    }

    public function edit($id)
    {
        $formateur = Formateur::findOrFail($id);
        $cours = Cours::all();
        return view('formateurs.edit', compact('formateur', 'cours'));
    }

    public function update(Request $request, $id)
    {
        $formateur = Formateur::findOrFail($id);

        $validated = $request->validate([
            'cours_id' => 'required|exists:cours,id',
            'nom' => 'required|string|max:255',
            'fonction_actuelle' => 'required|string|max:255',
            'domaines_intervention' => 'required|string',
            'domaines_expertise' => 'required|string',
            'parcours_professionnel_academique' => 'required|string',
            'style_pedagogique' => 'required|string',
            'devise_philosophie' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'actif' => 'boolean',
        ]);

        if ($request->hasFile('photo')) {
            if ($formateur->photo) {
                Storage::disk('public')->delete('formateurs/' . $formateur->photo);
            }
            $photoPath = $request->file('photo')->store('formateurs', 'public');
            $validated['photo'] = basename($photoPath);
        }

        $validated['slug'] = Str::slug($validated['nom']);
        $validated['actif'] = $request->has('actif');

        $formateur->update($validated);

        return redirect()->route('formateurs.index')
            ->with('success', 'Formateur mis à jour avec succès !');
    }

    public function destroy($id)
    {
        $formateur = Formateur::findOrFail($id);
        
        if ($formateur->photo) {
            Storage::disk('public')->delete('formateurs/' . $formateur->photo);
        }
        
        $formateur->delete();

        return redirect()->route('formateurs.index')
            ->with('success', 'Formateur supprimé avec succès !');
    }
}