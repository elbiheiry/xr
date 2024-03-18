<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\HomeRequest;
use App\Http\Traits\HomeTrait;
use App\Models\Home;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use HomeTrait;

    public function index()
    {
        $home = Home::firstOrFail();

        return view('admin.pages.home.index' ,compact('home'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  HomeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(HomeRequest $request)
    {
        try {
            $this->update_row($request);

            return update_response();
        } catch (\Throwable $th) {

            dd($th->getMessage());
            return error_response();
        }
    }
}
