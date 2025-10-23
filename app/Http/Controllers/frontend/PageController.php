<?php

namespace App\Http\Controllers\frontend;

use App\Models\Service;
use App\Mail\ContactMail;
use App\Models\Portfolio;
use App\Models\Entreprise;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
    //
    public function accueil()
    {
        // recuperer les infos de entreprises
        $entreprise = Entreprise::first();
        $services = Service::active()->get();
        $portfolios = Portfolio::active()->get();


        return view('index', compact('entreprise', 'services', 'portfolios'));
    }


    public function portfolio()
    {
        $portfolios = Portfolio::active()->latest()->paginate(12);
        return view('frontend.pages.portfolios', compact('portfolios'));
    }

    // candidature
    public function candidature()
    {
        return view('frontend.pages.candidature');
    }
    public function candidatureStore(Request $request)
    {
        // valider les données du formulaire
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'contact' => 'required|string|max:255',
            'cv' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'message' => 'nullable|string',
        ]);

        // traiter le fichier cv
        $cvPath = $request->file('cv')->store('cvs', 'public');

        // envoyer un email de confirmation ou de notification
        // ...

        return response()->json([
            'success' => true,
            'message' => 'Candidature envoyée avec succès'
        ]);
    }









    // soumettre un devis pour un service par email
    public function contact(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'contact' => 'required|string|max:255',
            'message' => 'nullable|string',
            'evenement' => 'nullable|string|max:255',
        ]);


        try {
            $data = [
                'nom' => $request->nom,
                'email' => $request->email,
                'contact' => $request->contact,
                'evenement' => $request->evenement,
                'message' => $request->message,
            ];

            Mail::to('contact@dcagency.com')->queue(new ContactMail($data));
            // Mail::to('contact@dcagency.com')
            //     ->later(now()->addSeconds(10), new ContactMail($data));


            return response()->json([
                'success' => true,
                'message' => 'Email envoyé avec succès'
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de l\'envoi de l\'email: ' . $e->getMessage()
            ], 500);
        }
    }
}
