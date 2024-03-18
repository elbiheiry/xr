<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\WorkRequest;
use App\Http\Traits\WorkTrait;
use App\Models\Work;

use Illuminate\Http\Request;

class WorkController extends Controller
{
    use WorkTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $works = Work::all()->sortByDesc('id');

        return view('admin.pages.works.index' , compact('works'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.works.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  WorkRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WorkRequest $request)
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
        $work = Work::findOrFail($id);

        return view('admin.pages.works.edit' ,compact('work'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  WorkRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(WorkRequest $request, $id)
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
        Work::findOrFail($id)->delete();

        return redirect()->back();
    }
}
