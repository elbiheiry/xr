<?php

namespace App\Http\Traits;

use App\Models\Home;

trait HomeTrait {

    protected function update_row($request){
        $home = Home::firstOrFail();

        $data = [
            'en' => [
                'title1' => $request->title1_en,
                'title2' => $request->title2_en,
                'title3' => $request->title3_en,
                'title4' => $request->title4_en,
                'title5' => $request->title5_en,
                'description1' => $request->description1_en,
                'description2' => $request->description2_en,
                'description4' => $request->description4_en,
                'description5' => $request->description5_en
            ],
            'ar' => [
                'title1' => $request->title1_ar,
                'title2' => $request->title2_ar,
                'title3' => $request->title3_ar,
                'title4' => $request->title4_ar,
                'title5' => $request->title5_ar,
                'description1' => $request->description1_ar,
                'description2' => $request->description2_ar,
                'description4' => $request->description4_ar,
                'description5' => $request->description5_ar
            ]
        ];

        if ($request->image) {
            image_delete($home->image , 'home');
            $data['image'] = image_manipulate($request->image , 'home' , 760 , 735);
        }

        $home->update($data);
    }
}