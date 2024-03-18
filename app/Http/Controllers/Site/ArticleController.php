<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleComment;
use App\Models\Home;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('id' , 'desc')->paginate(8);
        $content = Home::firstOrFail();

        return view('site.pages.articles.index' ,compact('articles' , 'content'));
    }

    public function article($slug)
    {
        $article = Article::whereSlug($slug)->firstOrFail();
        $related_articles = Article::where('id' , '!=' , $article->id)->orderBy('id' , 'desc')->take(3)->get();

        return view('site.pages.articles.article' , compact('article' , 'related_articles'));
    }

    /**
     * store new comment
     *
     * @param Request $request
     * @param Article $id
     * @return Response
     */
    public function store(Request $request , $id)
    {
        $validator = validator($request->all() , [
            'name' => ['required' , 'string' , 'max:255'],
            'email' => ['required' , 'string' , 'email' , 'max:255'],
            'comment' => ['required']
        ] ,[] ,[
            'name' => app()->getLocale() == 'en' ? 'Your name' : 'الإسم بالكامل',
            'email' => app()->getLocale() == 'en' ? 'Your Email' : 'البريد الإلكتروني',
            'comment' => app()->getLocale() == 'en' ? 'Your comment' : 'تعليقك'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->first() , 400);
        }

        try {
            ArticleComment::create([
                'name' => $request->name,
                'email' => $request->email,
                'comment' => $request->comment,
                'article_id' => $id
            ]);

            return response()->json(
                    app()->getLocale() == 'en' ? 'Your comment has been posted' : 'تم نشر تعليقك'
                , 200);
        } catch (\Throwable $th) {
            return error_response();
        }
    }
}
