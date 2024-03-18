@extends('admin.layouts.master')
@section('content')
    <!-- Page head ==========================================-->
    <div class="page-head">
        <i class="fa fa-list"></i>
        About us
        <ul class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-tachometer-alt"></i>
                    Dashboard</a>
            </li>
            <li class="active">About us</li>
        </ul>
    </div>
    <!-- Page content ==========================================-->
    <div class="page-content">
        <div class="widget">
            <div class="widget-title">About us</div>
            <div class="widget-content">
                <form method="put" action="{{ route('admin.about.update') }}" class="ajax-form">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-6">
                            <img src="{{ get_image($about->image1, 'about') }}" style="height : 100px !important">
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>About us image </label>
                                <div class="uplaod-wrap">
                                    <input type='file' name="image1">
                                    <span class='path'></span>
                                    <span class='button'>Select File</span>
                                </div>
                            </div>
                            <span class="text-danger">Image dimensions should be : 750 * 642
                            </span>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>About us title (EN)</label>
                                <input class="form-control" type="text" name="title1_en"
                                    value="{{ $about->translate('en')->title1 }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>About us title (AR)</label>
                                <input class="form-control" type="text" name="title1_ar"
                                    value="{{ $about->translate('ar')->title1 }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>About us description (EN)</label>
                                <textarea class="form-control" name="description1_en">{{ $about->translate('en')->description1 }}</textarea>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>About us description (AR)</label>
                                <textarea class="form-control" name="description1_ar">{{ $about->translate('ar')->description1 }}</textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <hr>
                        </div>
                        <div class="col-6">
                            <img src="{{ get_image($about->image2, 'about') }}" style="height : 100px !important">
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>About us second image </label>
                                <div class="uplaod-wrap">
                                    <input type='file' name="image2">
                                    <span class='path'></span>
                                    <span class='button'>Select File</span>
                                </div>
                            </div>
                            <span class="text-danger">Image dimensions should be : 650 * 350
                            </span>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Our vision title (EN)</label>
                                <input class="form-control" type="text" name="title2_en"
                                    value="{{ $about->translate('en')->title2 }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Our vision title (AR)</label>
                                <input class="form-control" type="text" name="title2_ar"
                                    value="{{ $about->translate('ar')->title2 }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Our vision description (EN)</label>
                                <textarea class="form-control" name="description2_en">{{ $about->translate('en')->description2 }}</textarea>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Our vision description (AR)</label>
                                <textarea class="form-control" name="description2_ar">{{ $about->translate('ar')->description2 }}</textarea>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Our mission title (EN)</label>
                                <input class="form-control" type="text" name="title3_en"
                                    value="{{ $about->translate('en')->title3 }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Our mission title (AR)</label>
                                <input class="form-control" type="text" name="title3_ar"
                                    value="{{ $about->translate('ar')->title3 }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Our mission description (EN)</label>
                                <textarea class="form-control" name="description3_en">{{ $about->translate('en')->description3 }}</textarea>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Our mission description (AR)</label>
                                <textarea class="form-control" name="description3_ar">{{ $about->translate('ar')->description3 }}</textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <hr>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>work process title (EN)</label>
                                <input class="form-control" type="text" name="title4_en"
                                    value="{{ $about->translate('en')->title4 }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>work process title (AR)</label>
                                <input class="form-control" type="text" name="title4_ar"
                                    value="{{ $about->translate('ar')->title4 }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>work process description (EN)</label>
                                <textarea class="form-control" name="description4_en">{{ $about->translate('en')->description4 }}</textarea>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>work process description (AR)</label>
                                <textarea class="form-control" name="description4_ar">{{ $about->translate('ar')->description4 }}</textarea>
                            </div>
                        </div>

                    </div>
                    <div class="col-12">
                        <button class="custom-btn" type="submit">
                            Save Change <i class="fa fa-long-arrow-alt-right"></i>
                        </button>
                    </div>
                </form>
            </div>
            <!--End Widget-content-->
        </div>
    </div>
    <!--End Page content-->
@endsection
