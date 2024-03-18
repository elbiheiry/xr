<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Home extends Model implements TranslatableContract
{
    use HasFactory,Translatable;

    protected $fillable = [
        'image'
    ];

    public $translatedAttributes = [
        'title1' , 'description1',
        'title2' , 'description2',
        'title3',
        'title4' , 'description4',
        'title5' , 'description5'
    ];
}
