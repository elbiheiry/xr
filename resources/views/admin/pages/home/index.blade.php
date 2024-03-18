@extends('admin.layouts.master')
@section('content')
    <!-- Page head ==========================================-->
    <div class="page-head">
        <i class="fa fa-list"></i>
        Home section
        <ul class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-tachometer-alt"></i>
                    Dashboard</a>
            </li>
            <li class="active">Home section</li>
        </ul>
    </div>
    <!-- Page content ==========================================-->
    <div class="page-content">
        <div class="widget">
            <div class="widget-title">Home section</div>
            <div class="widget-content">
                <form method="put" action="{{ route('admin.home.update') }}" class="ajax-form">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-6">
                            <img src="{{ get_image($home->image, 'home') }}" style="height : 100px !important">
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>First section image </label>
                                <div class="uplaod-wrap">
                                    <input type='file' name="image">
                                    <span class='path'></span>
                                    <span class='button'>Select File</span>
                                </div>
                            </div>
                            <span class="text-danger">Image dimensions should be : 760 * 735
                            </span>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>First section title (EN)</label>
                                <input class="form-control" type="text" name="title1_en"
                                    value="{{ $home->translate('en')->title1 }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>First section title (AR)</label>
                                <input class="form-control" type="text" name="title1_ar"
                                    value="{{ $home->translate('ar')->title1 }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>First section description (EN)</label>
                                <input class="form-control" type="text" name="description1_en"
                                    value="{{ $home->translate('en')->description1 }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>First section description (AR)</label>
                                <input class="form-control" type="text" name="description1_ar"
                                    value="{{ $home->translate('ar')->description1 }}">
                            </div>
                        </div>
                        <div class="col-12">
                            <hr>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>solutions section title (EN)</label>
                                <input class="form-control" type="text" name="title2_en"
                                    value="{{ $home->translate('en')->title2 }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>solutions section title (AR)</label>
                                <input class="form-control" type="text" name="title2_ar"
                                    value="{{ $home->translate('ar')->title2 }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>solutions section description (EN)</label>
                                <textarea class="form-control" name="description2_en">{{ $home->translate('en')->description2 }}</textarea>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>solutions section description (AR)</label>
                                <textarea class="form-control" name="description2_ar">{{ $home->translate('ar')->description2 }}</textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <hr>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Article section title (EN)</label>
                                <input class="form-control" type="text" name="title3_en"
                                    value="{{ $home->translate('en')->title3 }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Article section title (AR)</label>
                                <input class="form-control" type="text" name="title3_ar"
                                    value="{{ $home->translate('ar')->title3 }}">
                            </div>
                        </div>
                        <div class="col-12">
                            <hr>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Team member section title (EN)</label>
                                <input class="form-control" type="text" name="title4_en"
                                    value="{{ $home->translate('en')->title4 }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Team member section title (AR)</label>
                                <input class="form-control" type="text" name="title4_ar"
                                    value="{{ $home->translate('ar')->title4 }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Team member section description (EN)</label>
                                <textarea class="form-control" name="description4_en">{{ $home->translate('en')->description4 }}</textarea>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Team member section description (AR)</label>
                                <textarea class="form-control" name="description4_ar">{{ $home->translate('ar')->description4 }}</textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <hr>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Testimonials section title (EN)</label>
                                <input class="form-control" type="text" name="title5_en"
                                    value="{{ $home->translate('en')->title5 }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Testimonials section title (AR)</label>
                                <input class="form-control" type="text" name="title5_ar"
                                    value="{{ $home->translate('ar')->title5 }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Testimonials section description (EN)</label>
                                <textarea class="form-control" name="description5_en">{{ $home->translate('en')->description5 }}</textarea>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Testimonials section description (AR)</label>
                                <textarea class="form-control" name="description5_ar">{{ $home->translate('ar')->description5 }}</textarea>
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
