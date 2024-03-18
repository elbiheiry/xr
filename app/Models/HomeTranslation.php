<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeTranslation extends Model
{
    use HasFactory;

    protected $fillable = [
        'title1' , 'description1',
        'title2' , 'description2',
        'title3',
        'title4' , 'description4',
        'title5' , 'description5',
        'home_id' , 'locale'
    ];
}
