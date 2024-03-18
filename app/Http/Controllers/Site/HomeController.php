<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\SubscribeRequest;
use App\Models\About;
use App\Models\Article;
use App\Models\Home;
use App\Models\Member;
use App\Models\Partner;
use App\Models\Subscriber;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $content = Home::firstOrFail();
        $about = About::firstOrFail();
        $articles = Article::all()->sortByDesc('id')->take(5);
        $members = Member::all()->sortByDesc('id');
        $testimonials = Testimonial::all()->sortByDesc('id')->take(5);
        $partners = Partner::all()->sortByDesc('id');

        return view('site.pages.index' , compact('content' , 'about' , 'articles' , 'members' , 'testimonials' , 'partners'));
    }

    /**
     * add new subscriber
     *
     * @param SubscribeRequest $request
     * @return Response
     */
    public function subscribe(SubscribeRequest $request)
    {
        try {
            Subscriber::create($request->all());

            return response()->json( 
                app()->getLocale() == 'en' ? 'Email added successfully' : 'تم إضافه البريد الإلكتروني بنجاح'
                , 200);
        } catch (\Throwable $th) {
            return error_response();
        }
    }
}
