<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SettingsRequest;
use App\Http\Traits\SettingsTrait;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    use SettingsTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.settings.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  SettingsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(SettingsRequest $request)
    {
        try {
            $this->update_row($request);

            return update_response();
        } catch (\Throwable $th) {
            return error_response();
        }
    }
}
