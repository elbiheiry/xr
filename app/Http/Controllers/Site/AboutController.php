<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Partner;
use App\Models\Testimonial;
use App\Models\Work;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    //
    public function index()
    {
        $about = About::firstOrFail();
        $steps = Work::all()->sortByDesc('id');
        $testimonials = Testimonial::all()->sortByDesc('id');

        return view('site.pages.about.index' ,compact('about' , 'steps' , 'testimonials'));
    }

    public function partners()
    {
        $partners = Partner::all()->sortByDesc('id');

        return view('site.pages.about.partners' ,compact('partners'));
    }
}
