<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    //
    protected $fillable = [
        'libelle_apropos',
        'description_apropos',
        'contact',
        'autre_contact',
        'email',
        'adresse',
        'facebook',
        'linkedin',
        'instagram',
        'tiktok',
    ];
}
