<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MemberLinkRequest;
use App\Http\Traits\MemberLinkTrait;
use App\Models\MemberLink;
use Illuminate\Http\Request;

class MemberLinkController extends Controller
{
    use MemberLinkTrait;
    /**
     * Display a listing of the resource.
     *
     * @param Member $id
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $links = MemberLink::all()->where('member_id' , $id)->sortByDesc('id');

        return view('admin.pages.members.links.index' ,compact('links' , 'id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  MemberLinkRequest  $request
     * @param Member $id
     * @return \Illuminate\Http\Response
     */
    public function store(MemberLinkRequest $request , $id)
    {
        try {
            $this->store_row($request , $id);

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
        $link = MemberLink::findOrFail($id);

        return view('admin.pages.members.links.edit' ,compact('link'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  MemberLinkRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MemberLinkRequest $request, $id)
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
        MemberLink::findOrFail($id)->delete();

        return redirect()->back();
    }
}
