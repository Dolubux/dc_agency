<?php

namespace App\Http\Controllers\backend;

use Exception;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class ServiceController extends Controller
{
    /**
     * Affiche la liste des services.
     */
    public function index()
    {
        try {
            $services = Service::all();
            return view('backend.pages.services.index', compact('services'));
        } catch (Exception $e) {
            Log::error('Erreur index services: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Impossible d\'afficher les services.');
        }
    }

    /**
     * Affiche le formulaire de création.
     */
    public function create()
    {
        try {
            return view('backend.pages.services.create');
        } catch (Exception $e) {
            Log::error('Erreur create service: ' . $e->getMessage());
            return redirect()->route('services.index')->with('error', 'Impossible d\'afficher le formulaire.');
        }
    }

    /**
     * Enregistre un nouveau service.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'libelle' => 'required|string|max:255',
                'description' => 'required|string',
                'icone' => 'required|string',
                'statut' => 'boolean',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            $service = Service::create([
                'libelle' => $request->libelle,
                'description' => $request->description,
                'icone' => $request->icone,
                'statut' => $request->statut,
            ]);

            if ($request->hasFile('image')) {
                $service->addMediaFromRequest('image')->toMediaCollection('services');
            }
            Alert::success('Succès', 'Service créé avec succès.');

            return redirect()->route('service.index');
        } catch (Exception $e) {
            Log::error('Erreur store service: ' . $e->getMessage());
            return $e->getMessage();
        }
    }

    /**
     * Affiche un service.
     */
    public function show(string $id)
    {
        try {
            $service = Service::findOrFail($id);
            return view('backend.pages.services.show', compact('service'));
        } catch (Exception $e) {
            Log::error('Erreur show service: ' . $e->getMessage());
            return redirect()->route('service.index')->with('error', 'Service introuvable.');
        }
    }

    /**
     * Affiche le formulaire d'édition.
     */
    public function edit(string $id)
    {
        try {
            $service = Service::findOrFail($id);
            return view('backend.pages.services.edit', compact('service'));
        } catch (Exception $e) {
            Log::error('Erreur edit service: ' . $e->getMessage());
            return redirect()->route('service.index')->with('error', 'Service introuvable.');
        }
    }

    /**
     * Met à jour un service.
     */
    public function update(Request $request, string $id)
    {
        try {
            $service = Service::findOrFail($id);

            $request->validate([
                'libelle' => 'required|string|max:255',
                'description' => 'required|string',
                'icone' => 'required|string',
                'statut' => 'boolean',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            $service->update([
                'libelle' => $request->libelle,
                'description' => $request->description,
                'icone' => $request->icone,
                'statut' => $request->statut,
            ]);

            if ($request->hasFile('image')) {
                $service->clearMediaCollection('services');
                $service->addMediaFromRequest('image')->toMediaCollection('services');
            }
            Alert::success('Succès', 'Service mis à jour avec succès.');
            return redirect()->route('services.index');
        } catch (Exception $e) {
            Log::error('Erreur update service: ' . $e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Erreur lors de la mise à jour du service.');
        }
    }

    /**
     * Supprime un service.
     */
    public function delete(string $id)
    {
        try {
            $service = Service::findOrFail($id);
            $service->clearMediaCollection('services');
            $service->delete();
            return response()->json([
                'success' => 'Service supprimé avec succès.',
                'status' => 200
            ]);
        } catch (Exception $e) {
            Log::error('Erreur destroy service: ' . $e->getMessage());
            return response()->json(['error' => 'Erreur lors de la suppression du service.'], 500);
        }
    }
}
