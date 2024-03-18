<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MemberRequest;
use App\Http\Traits\MemberTrait;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    use MemberTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Member::all()->sortByDesc('id');

        return view('admin.pages.members.index' , compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.members.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  MemberRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MemberRequest $request)
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
        $member = Member::findOrFail($id);

        return view('admin.pages.members.edit' ,compact('member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  MemberRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MemberRequest $request, $id)
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
        Member::findOrFail($id)->delete();

        return redirect()->back();
    }
}
