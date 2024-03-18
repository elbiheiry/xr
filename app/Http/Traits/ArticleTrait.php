<?php

namespace App\Http\Traits;

use App\Models\About;
use App\Models\Article;
use Cviebrock\EloquentSluggable\Services\SlugService;

trait ArticleTrait {
    public function store_row($request)
    {
        $data = [
            'en' => [
                'title' => $request->title_en,
                'brief' => $request->brief_en,
                'description' => $request->description_en
            ],
            'ar' => [
                'title' => $request->title_ar,
                'brief' => $request->brief_ar,
                'description' => $request->description_ar
            ],
            'created_by' => $request->created_by,
            'slug' => SlugService::createSlug(Article::class ,'slug' , $request->title_en , ['unique' => true]),
            'inner_image' => image_manipulate($request->inner_image , 'articles' , 1250 , 750),
            'outer_image' => image_manipulate($request->outer_image , 'articles' , 750 , 800),
            'meta_title' => $request->meta_title,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description
        ];

        Article::create($data);
    }

    public function update_row($request , $id)
    {
        $article = Article::findOrFail($id);

        $data = [
            'en' => [
                'title' => $request->title_en,
                'brief' => $request->brief_en,
                'description' => $request->description_en
            ],
            'ar' => [
                'title' => $request->title_ar,
                'brief' => $request->brief_ar,
                'description' => $request->description_ar
            ],
            'created_by' => $request->created_by,
            'meta_title' => $request->meta_title,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description
        ];

        if ($request->inner_image) {
            image_delete($article->inner_image , 'articles');
            $data['inner_image'] = image_manipulate($request->inner_image , 'articles' , 1250 , 750);
        }

        if ($request->outer_image) {
            image_delete($article->outer_image , 'articles');
            $data['outer_image'] = image_manipulate($request->outer_image , 'articles' , 750 , 800);
        }

        if ($request->title_en != $article->translate('en')->title) {
            $data['slug'] = SlugService::createSlug(Article::class ,'slug' , $request->title_en , ['unique' => true]);
        }

        $article->update($data);
    }
}