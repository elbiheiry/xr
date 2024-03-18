<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Article extends Model implements TranslatableContract
{
    use HasFactory,Sluggable , Translatable;

    public $translatedAttributes = ['title' , 'brief' , 'description'];

    protected $fillable = [
        'inner_image' , 'outer_image' , 'slug' , 'created_by',
        'meta_title' , 'meta_keywords' ,'meta_description'
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

    public function comments()
    {
        return $this->hasMany(ArticleComment::class);
    }

    public function delete()
    {
        image_delete($this->outer_image , 'articles');
        image_delete($this->inner_image , 'articles');

        return parent::delete();
    }
}
