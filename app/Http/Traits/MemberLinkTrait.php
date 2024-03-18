<?php

namespace App\Http\Traits;

use App\Models\MemberLink;

trait MemberLinkTrait 
{
    public function store_row($request , $id)
    {
        MemberLink::create([
            'icon' => $request->icon,
            'link' => $request->link,
            'member_id' => $id
        ]);
    }

    public function update_row($request ,$id)
    {
        $link = MemberLink::findOrFail($id);

        $link->update($request->all());
    }
}