<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Testimonial extends Model implements TranslatableContract
{
    use HasFactory,Translatable;

    protected $fillable = [
        'image' , 'rate'
    ];

    public $translatedAttributes = ['name' , 'position' , 'description'];

    public function delete()
    {
        image_delete($this->image , 'testimonials');

        return parent::delete();
    }
}
