<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Spatie\MediaLibrary\InteractsWithMedia;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class Portfolio extends Model implements HasMedia
{
    //
     use InteractsWithMedia, Sluggable;

    //
    protected $fillable = [
        'libelle',
        'slug',
        'description',
        'statut',
        'video_facebook', //lien video facebook
        'video_youtube', //lien video youtube
    ];



    //ID GENERERATED
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = IdGenerator::generate(['table' => 'portfolios', 'length' => 10, 'prefix' =>
            mt_rand()]);
        });
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'libelle'
            ]
        ];
    }

    //SCOPE ACTIVE
    public function scopeActive($query)
    {
        return $query->where('statut', true);
    }
}
