<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SocialLinkRequest;
use App\Http\Traits\SocialLinkTrait;
use App\Models\SocialLink;

use Illuminate\Http\Request;

class SocialLinkController extends Controller
{
    use SocialLinkTrait;
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.links.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  SocialLinkRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SocialLinkRequest $request)
    {
        try {
            $this->store_row($request);

            return add_response();
        } catch (\Throwable $th) {
            return error_response();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $link = SocialLink::findOrFail($id);

        return view('admin.pages.links.edit' ,compact('link'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  SocialLinkRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SocialLinkRequest $request, $id)
    {
        try {
            $this->update_row($request , $id);

            return update_response();
        } catch (\Throwable $th) {
            return error_response();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SocialLink::findOrFail($id)->delete();

        return redirect()->back();
    }
}
