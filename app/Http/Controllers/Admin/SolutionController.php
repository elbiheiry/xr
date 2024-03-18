<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SolutionRequest;
use App\Http\Traits\SolutionTrait;
use App\Models\Solution;
use Illuminate\Http\Request;

class SolutionController extends Controller
{
    use SolutionTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $solutions = Solution::all()->sortByDesc('id');

        return view('admin.pages.solutions.index' , compact('solutions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.solutions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  SolutionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SolutionRequest $request)
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
        $solution = Solution::findOrFail($id);

        return view('admin.pages.solutions.edit' ,compact('solution'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  SolutionRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SolutionRequest $request, $id)
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
        Solution::findOrFail($id)->delete();

        return redirect()->back();
    }
}
