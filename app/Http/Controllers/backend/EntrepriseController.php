<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Entreprise;

class EntrepriseController extends Controller
{
    // Afficher la liste des entreprises
    public function index()
    {
        $entreprises = Entreprise::all();
        return view('backend.pages.entreprise.index', compact('entreprises'));
    }

    // Afficher le formulaire de création
    public function create()
    {
        return view('backend.pages.entreprise.create');
    }

    // Enregistrer une nouvelle entreprise
    public function store(Request $request)
    {
        $request->validate([
            'libelle_apropos' => 'required|string|max:255',
            'description_apropos' => 'nullable|string',
            'contact' => 'nullable|string|max:255',
            'autre_contact' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'adresse' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'linkedin' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'tiktok' => 'nullable|string|max:255',
            'banniere' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'image_apropos' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $entreprise = Entreprise::create($request->except(['banniere', 'image_apropos']));

        // Gestion des images avec Spatie MediaLibrary
        if ($request->hasFile('banniere')) {
            $entreprise->addMediaFromRequest('banniere')->toMediaCollection('banniere');
        }
        if ($request->hasFile('image_apropos')) {
            $entreprise->addMediaFromRequest('image_apropos')->toMediaCollection('image_apropos');
        }

        return redirect()->route('entreprise.index')->with('success', 'Entreprise créée avec succès.');
    }

    // Afficher le formulaire d'édition
    public function edit($id)
    {
        $entreprise = Entreprise::findOrFail($id);
        return view('backend.pages.entreprise.edit', compact('entreprise'));
    }

    // Mettre à jour une entreprise
    public function update(Request $request, $id)
    {
        $request->validate([
            'libelle_apropos' => 'required|string|max:255',
            'description_apropos' => 'nullable|string',
            'contact' => 'nullable|string|max:255',
            'autre_contact' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'adresse' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'linkedin' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'tiktok' => 'nullable|string|max:255',
            'banniere' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'image_apropos' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $entreprise = Entreprise::findOrFail($id);
        $entreprise->update($request->except(['banniere', 'image_apropos']));

        // Gestion des images avec Spatie MediaLibrary
        if ($request->hasFile('banniere')) {
            $entreprise->clearMediaCollection('banniere');
            $entreprise->addMediaFromRequest('banniere')->toMediaCollection('banniere');
        }
        if ($request->hasFile('image_apropos')) {
            $entreprise->clearMediaCollection('image_apropos');
            $entreprise->addMediaFromRequest('image_apropos')->toMediaCollection('image_apropos');
        }

        return redirect()->route('entreprise.index')->with('success', 'Entreprise mise à jour avec succès.');
    }

    // Supprimer une entreprise
    public function delete($id)
    {
        $entreprise = Entreprise::findOrFail($id);
        $entreprise->delete();
        return redirect()->route('entreprise.index')->with('success', 'Entreprise supprimée avec succès.');
    }
}
