<?php

namespace App\Http\Traits;

use App\Models\Setting;

trait SettingsTrait 
{
    public function update_row($request)
    {
        $settings = Setting::firstOrFail();

        $data = [
            'en' => [
                'address' => $request->address_en,
                'description' => $request->description_en
            ],
            'ar' => [
                'address' => $request->address_ar,
                'description' => $request->description_ar
            ],
            'phone' => $request->phone,
            'map' => $request->map,
            'whatsapp' => $request->whatsapp,
            'email' => $request->email
        ];

        if ($request->image) {
            image_delete($settings->image , 'settings');
            $data['image'] = image_manipulate($request->image , 'settings' , 546 , 557);
        }

        $settings->update($data);
    }
}