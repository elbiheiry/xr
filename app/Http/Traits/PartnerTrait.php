<?php

namespace App\Http\Traits;

use App\Models\Partner;

trait PartnerTrait 
{
    public function store_row($request)
    {
        $data = [
            'image' => image_manipulate($request->image , 'partners' , 170 , 65),
        ];

        Partner::create($data);
    }

    public function update_row($request , $id)
    {
        $partner = Partner::findOrFail($id);

        if ($request->image) {
            image_delete($partner->image , 'partners');
            $data['image'] = image_manipulate($request->image , 'partners' , 170 , 65);
        }

        $partner->update($data);
    }
}