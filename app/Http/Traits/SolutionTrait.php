<?php

namespace App\Http\Traits;

use App\Models\Solution;
use Cviebrock\EloquentSluggable\Services\SlugService;

trait SolutionTrait 
{
    /**
    * Create regular or static methods here
    */

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
            'slug' => SlugService::createSlug(Solution::class ,'slug' , $request->title_en , ['unique' => true]),
            'inner_image' => image_manipulate($request->inner_image , 'solutions' , 1250 , 750),
            'outer_image' => image_manipulate($request->outer_image , 'solutions' , 500 , 335),
            'meta_title' => $request->meta_title,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description
        ];

        Solution::create($data);
    }

    public function update_row($request , $id)
    {
        $solution = Solution::findOrFail($id);

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
            'meta_title' => $request->meta_title,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description
        ];

        if ($request->inner_image) {
            image_delete($solution->inner_image , 'solutions');
            $data['inner_image'] = image_manipulate($request->inner_image , 'solutions' , 1250 , 750);
        }

        if ($request->outer_image) {
            image_delete($solution->outer_image , 'solutions');
            $data['outer_image'] = image_manipulate($request->outer_image , 'solutions' , 500 , 335);
        }

        if ($request->title_en != $solution->translate('en')->title) {
            $data['slug'] = SlugService::createSlug(solution::class ,'slug' , $request->title_en , ['unique' => true]);
        }

        $solution->update($data);
    }
}