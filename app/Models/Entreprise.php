<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Entreprise extends Model implements HasMedia
{
    use InteractsWithMedia;
    //
    protected $fillable = [
        'libelle_apropos',
        'description_apropos',
    ];
}
