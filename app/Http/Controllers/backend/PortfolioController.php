<?php

namespace App\Http\Controllers\backend;

use Exception;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class PortfolioController extends Controller
{
    /**
     * Affiche la liste des portfolios.
     */
    public function index()
    {
        try {
            $portfolios = Portfolio::all();
            return view('backend.pages.portfolios.index', compact('portfolios'));
        } catch (Exception $e) {
            Log::error('Erreur index portfolios: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Impossible d\'afficher les portfolios.');
        }
    }

    /**
     * Affiche le formulaire de création.
     */
    public function create()
    {
        try {
            return view('backend.pages.portfolios.create');
        } catch (Exception $e) {
            Log::error('Erreur create portfolio: ' . $e->getMessage());
            return redirect()->route('portfolios.index')->with('error', 'Impossible d\'afficher le formulaire.');
        }
    }

    /**
     * Enregistre un nouveau portfolio.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'libelle' => 'required|string|max:255',
                'description' => 'nullable|string',
                'statut' => 'boolean',
                'image_principale' => 'required|image|mimes:jpeg,png,jpg,gif,webp,svg,avif|max:1024',
                'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1024'
            ]);

            $portfolio = Portfolio::create([
                'libelle' => $request->libelle,
                'description' => $request->description,
                'statut' => $request->statut,
            ]);

            // Image principale
            if ($request->hasFile('image_principale')) {
                $portfolio->addMediaFromRequest('image_principale')->toMediaCollection('principal');
            }

            // Autres images
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $portfolio->addMedia($image)->toMediaCollection('gallery');
                }
            }

            Alert::success('Succès', 'Portfolio créé avec succès.');

            return redirect()->route('portfolios.index')->with('success', 'Portfolio créé avec succès.');
        } catch (Exception $e) {
            Log::error('Erreur store portfolio: ' . $e->getMessage());
            return $e->getMessage();}
    }

    /**
     * Affiche un portfolio.
     */
    public function show(string $id)
    {
        try {
            $portfolio = Portfolio::findOrFail($id);
            return view('backend.pages.portfolios.show', compact('portfolio'));
        } catch (Exception $e) {
            Log::error('Erreur show portfolio: ' . $e->getMessage());
            return redirect()->route('portfolios.index')->with('error', 'Portfolio introuvable.');
        }
    }

    /**
     * Affiche le formulaire d'édition.
     */
    public function edit(string $id)
    {
        try {
            $portfolio = Portfolio::findOrFail($id);
            return view('backend.pages.portfolios.edit', compact('portfolio'));
        } catch (Exception $e) {
            Log::error('Erreur edit portfolio: ' . $e->getMessage());
            return redirect()->route('portfolios.index')->with('error', 'Portfolio introuvable.');
        }
    }

    /**
     * Met à jour un portfolio.
     */
    public function update(Request $request, string $id)
    {
        try {
            $portfolio = Portfolio::findOrFail($id);

            $request->validate([
                'libelle' => 'required|string|max:255',
                'description' => 'nullable|string',
                'statut' => 'boolean',
                'image_principale' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg,avif|max:4096',
                'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096'
            ]);

            $portfolio->update([
                'libelle' => $request->libelle,
                'description' => $request->description,
                'statut' => $request->statut,
            ]);

            // Mise à jour image principale
            if ($request->hasFile('image_principale')) {
                $portfolio->clearMediaCollection('principal');
                $portfolio->addMediaFromRequest('image_principale')->toMediaCollection('principal');
            }

            // Ajout d'autres images (ne supprime pas la galerie existante)
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $portfolio->addMedia($image)->toMediaCollection('gallery');
                }
            }

            Alert::success('Succès', 'Portfolio mis à jour avec succès.');

            return redirect()->route('portfolios.index')->with('success', 'Portfolio mis à jour avec succès.');
        } catch (Exception $e) {
            Log::error('Erreur update portfolio: ' . $e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Erreur lors de la mise à jour du portfolio.');
        }
    }

    /**
     * Supprime un portfolio.
     */
    public function destroy(string $id)
    {
        try {
            $portfolio = Portfolio::findOrFail($id);
            $portfolio->clearMediaCollection('principal');
            $portfolio->clearMediaCollection('gallery');
            $portfolio->delete();

            return redirect()->route('portfolios.index')->with('success', 'Portfolio supprimé avec succès.');
        } catch (Exception $e) {
            Log::error('Erreur destroy portfolio: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Erreur lors de la suppression du portfolio.');
        }
    }

    /**
     * Supprime une image de la galerie d'un portfolio.
     */
    public function deleteMedia($portfolioId, $mediaId)
    {
        $portfolio = Portfolio::findOrFail($portfolioId);
        $media = $portfolio->media()->where('id', $mediaId)->first();
        if ($media) {
            $media->delete();
            return back()->with('success', 'Image supprimée de la galerie.');
        }
        return back()->with('error', 'Image non trouvée.');
    }
}
