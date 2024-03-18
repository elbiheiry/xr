<?php

namespace App\Http\Traits;

use App\Models\SocialLink;

trait SocialLinkTrait 
{
    /**
    * Create regular or static methods here
    */

    public function store_row($request)
    {
        SocialLink::create($request->all());
    }

    public function update_row($request , $id)
    {
        $link = SocialLink::findOrFail($id);

       $link->update($request->all());
    }
}