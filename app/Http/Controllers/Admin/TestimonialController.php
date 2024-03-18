<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TestimonialRequest;
use App\Http\Traits\TestimonialTrait;
use App\Models\Testimonial;

use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    use TestimonialTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonial::all()->sortByDesc('id');

        return view('admin.pages.testimonials.index' , compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.testimonials.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TestimonialRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TestimonialRequest $request)
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
        $testimonial = Testimonial::findOrFail($id);

        return view('admin.pages.testimonials.edit' ,compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TestimonialRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TestimonialRequest $request, $id)
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
        Testimonial::findOrFail($id)->delete();

        return redirect()->back();
    }
}
