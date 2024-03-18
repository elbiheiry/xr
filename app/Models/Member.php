<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Member extends Model implements TranslatableContract
{
    use HasFactory,Translatable;

    public $translatedAttributes = ['name' , 'position'];

    protected $fillable = [
        'image'
    ];

    public function links()
    {
        return $this->hasMany(MemberLink::class);
    }

    public function delete()
    {
        image_delete($this->image , 'members');
        return parent::delete();
    }
}
