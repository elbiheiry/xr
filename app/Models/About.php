<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class About extends Model implements TranslatableContract
{
    use HasFactory , Translatable;

    protected $fillable = [
        'image1' , 'image2'
    ];

    public $translatedAttributes = [
        'title1' , 'description1',
        'title2' , 'description2',
        'title3' , 'description3',
        'title4' , 'description4',
    ];
}
