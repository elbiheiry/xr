<?php

namespace App\Http\Traits;

use App\Models\Member;

trait MemberTrait {
    public function store_row($request)
    {
        $data = [
            'en' => [
                'name' => $request->name_en,
                'position' => $request->position_en
            ],
            'ar' => [
                'name' => $request->name_ar,
                'position' => $request->position_ar
            ],
            'image' => image_manipulate($request->image , 'members' , 285 , 305)
        ];

        Member::create($data);
    }

    public function update_row($request , $id)
    {
        $member = Member::findOrFail($id);

        $data = [
            'en' => [
                'name' => $request->name_en,
                'position' => $request->position_en
            ],
            'ar' => [
                'name' => $request->name_ar,
                'position' => $request->position_ar
            ]
        ];
        
        if ($request->image) {
            image_delete($member->image , 'members');
            $data['image'] = image_manipulate($request->image , 'members' , 285 , 305);
        }

        $member->update($data);
    }
}