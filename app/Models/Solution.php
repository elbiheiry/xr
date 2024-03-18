<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Cviebrock\EloquentSluggable\Sluggable;

class Solution extends Model implements TranslatableContract
{
    use HasFactory,Sluggable , Translatable;

    public $translatedAttributes = ['title' , 'brief' , 'description'];

    protected $fillable = [
        'inner_image' , 'outer_image' , 'slug' ,'meta_title' , 'meta_keywords' ,'meta_description'
    ];

    /**
     * create slug input 
     *
     * @return response
     */
    public function sluggable() :Array
    {
        return [
            'slug' => [
                'source' => 'title_en'
            ]
        ];
    }

    public function delete()
    {
        image_delete($this->outer_image , 'solutions');
        image_delete($this->inner_image , 'solutions');

        return parent::delete();
    }
}
