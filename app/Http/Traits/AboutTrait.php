<?php

namespace App\Http\Traits;

use App\Models\About;

trait AboutTrait {
    public function update_row($request)
    {
        $about = About::firstOrFail();

        $data = [
            'en' => [
                'title1' => $request->title1_en,
                'title2' => $request->title2_en,
                'title3' => $request->title3_en,
                'title4' => $request->title4_en,
                'description1' => $request->description1_en,
                'description2' => $request->description2_en,
                'description3' => $request->description3_en,
                'description4' => $request->description4_en
            ],
            'ar' => [
                'title1' => $request->title1_ar,
                'title2' => $request->title2_ar,
                'title3' => $request->title3_ar,
                'title4' => $request->title4_ar,
                'description1' => $request->description1_ar,
                'description2' => $request->description2_ar,
                'description3' => $request->description3_ar,
                'description4' => $request->description4_ar
            ]
        ];

        if ($request->image1) {
            image_delete($about->image1 , 'about');
            $data['image1'] = image_manipulate($request->image1 , 'about' , 750 , 642);
        }

        if ($request->image2) {
            image_delete($about->image2 , 'about');
            $data['image2'] = image_manipulate($request->image2 , 'about' , 650 , 350);
        }

        $about->update($data);
    }
}