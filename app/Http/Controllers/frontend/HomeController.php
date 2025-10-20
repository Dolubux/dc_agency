<?php

namespace App\Http\Controllers\frontend;

use App\Models\Entreprise;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    //
    public function index(){
            // recuperer les infos de entreprises
            $entreprise = Entreprise::first();


        return view('index' , compact('entreprise'));
    }
}
