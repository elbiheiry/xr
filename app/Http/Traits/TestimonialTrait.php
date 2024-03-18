<?php

namespace App\Http\Traits;

use App\Models\Testimonial;

trait TestimonialTrait 
{
    /**
    * Create regular or static methods here
    */

    public function store_row($request)
    {
        $data = [
            'en' => [
                'name' => $request->name_en,
                'position' => $request->position_en,
                'description' => $request->description_en
            ],
            'ar' => [
                'name' => $request->name_ar,
                'position' => $request->position_ar,
                'description' => $request->description_ar
            ],
            'image' => image_manipulate($request->image , 'testimonials' , 150 , 150),
            'rate' => $request->rate
        ];

        Testimonial::create($data);
    }

    public function update_row($request , $id)
    {
        $testimonial = Testimonial::findOrFail($id);

        $data = [
            'en' => [
                'name' => $request->name_en,
                'position' => $request->position_en,
                'description' => $request->description_en
            ],
            'ar' => [
                'name' => $request->name_ar,
                'position' => $request->position_ar,
                'description' => $request->description_ar
            ],
            'rate' => $request->rate
        ];
        
        if ($request->image) {
            image_delete($testimonial->image , 'testimonials');
            $data['image'] = image_manipulate($request->image , 'testimonials' , 150 , 150);
        }

        $testimonial->update($data);
    }
}