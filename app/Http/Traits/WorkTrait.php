<?php

namespace App\Http\Traits;

use App\Models\Work;

trait WorkTrait 
{
    /**
    * Create regular or static methods here
    */

    public function store_row($request)
    {
        $data = [
            'en' => [
                'title' => $request->title_en,
                'description' => $request->description_en
            ],
            'ar' => [
                'title' => $request->title_ar,
                'description' => $request->description_ar
            ]
        ];

        Work::create($data);
    }

    public function update_row($request , $id)
    {
        $work = Work::findOrFail($id);

        $data = [
            'en' => [
                'title' => $request->title_en,
                'description' => $request->description_en
            ],
            'ar' => [
                'title' => $request->title_ar,
                'description' => $request->description_ar
            ]
        ];

        $work->update($data);
    }
}