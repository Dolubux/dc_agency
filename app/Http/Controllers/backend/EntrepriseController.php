<?php

namespace App\Http\Controllers\backend;

use App\Models\Entreprise;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class EntrepriseController extends Controller
{
    // Afficher la liste des entreprises
    public function index()
    {
        $entreprises = Entreprise::get();
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
            'description_apropos' => 'required|string',
            'banniere' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'image_apropos' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $entreprise = Entreprise::firstOrCreate([
            'libelle_apropos' => $request->libelle_apropos,
            'description_apropos' => $request->description_apropos,

        ]);

        // Gestion des images avec Spatie MediaLibrary
        if ($request->hasFile('banniere')) {
            $entreprise->addMediaFromRequest('banniere')->toMediaCollection('banniere');
        }
        if ($request->hasFile('image_apropos')) {
            $entreprise->addMediaFromRequest('image_apropos')->toMediaCollection('image_apropos');
        }
        Alert::success('success', 'operation reussi avec success');
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
            'banniere' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'image_apropos' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        try {
            $entreprise = Entreprise::findOrFail($id);
            $entreprise->update([
                'libelle_apropos' => $request->libelle_apropos,
                'description_apropos' => $request->description_apropos,
            ]);

            // Gestion des images avec Spatie MediaLibrary
            if ($request->hasFile('banniere')) {
                $entreprise->clearMediaCollection('banniere');
                $entreprise->addMediaFromRequest('banniere')->toMediaCollection('banniere');
            }
            if ($request->hasFile('image_apropos')) {
                $entreprise->clearMediaCollection('image_apropos');
                $entreprise->addMediaFromRequest('image_apropos')->toMediaCollection('image_apropos');
            }

            Alert::success('success', 'operation reussi avec success');
            return redirect()->route('entreprise.index')->with('success', 'Entreprise mise à jour avec succès.');
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    // Supprimer une entreprise
    public function delete($id)
    {
        $entreprise = Entreprise::findOrFail($id);
        $entreprise->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Entreprise supprimée avec succès.'
        ]);
    }
}
