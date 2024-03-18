<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PartnerRequest;
use App\Models\Partner;
use App\Http\Traits\PartnerTrait;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    use PartnerTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners = Partner::all()->sortByDesc('id');

        return view('admin.pages.partners.index' ,compact('partners'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PartnerRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PartnerRequest $request)
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
        $partner = Partner::findOrFail($id);

        return view('admin.pages.partners.edit' ,compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PartnerRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PartnerRequest $request, $id)
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
        Partner::findOrFail($id)->delete();

        return redirect()->back();
    }
}
