<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestimonialTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['name' , 'position' , 'description' , 'locale' , 'testimonial_id'];
}
