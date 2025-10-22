<?php

namespace App\Http\Controllers\frontend;

use App\Models\Service;
use App\Models\Portfolio;
use App\Models\Entreprise;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    //
    public function index(){
            // recuperer les infos de entreprises
            $entreprise = Entreprise::first();
            $services = Service::active()->get();
            $portfolios = Portfolio::active()->get();


        return view('index' , compact('entreprise' , 'services' , 'portfolios'));
    }
}
