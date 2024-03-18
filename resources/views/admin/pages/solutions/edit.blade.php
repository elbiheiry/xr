@extends('admin.layouts.master')
@section('content')
    <!-- Page head ==========================================-->
    <div class="page-head">
        <i class="fa fa-list"></i>
        solutions
        <ul class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-tachometer-alt"></i>
                    Dashboard</a>
            </li>
            <li class="active">solutions</li>
        </ul>
    </div>
    <!-- Page content ==========================================-->
    <div class="page-content">
        <div class="widget">
            <div class="widget-title"> solutions</div>
            <div class="widget-content">
                <form method="put" action="{{ route('admin.solutions.update', ['id' => $solution->id]) }}"
                    class="ajax-form">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-6">
                            <img src="{{ get_image($solution->inner_image, 'solutions') }}"
                                style="height : 100px !important">
                        </div>
                        <div class="col-6">
                            <img src="{{ get_image($solution->outer_image, 'solutions') }}"
                                style="height : 100px !important">
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>solution inner image </label>
                                <div class="uplaod-wrap">
                                    <input type='file' name="inner_image">
                                    <span class='path'></span>
                                    <span class='button'>Select File</span>
                                </div>
                            </div>
                            <span class="text-danger">Image dimensions should be : 1250 * 750
                            </span>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>solution outer image </label>
                                <div class="uplaod-wrap">
                                    <input type='file' name="outer_image">
                                    <span class='path'></span>
                                    <span class='button'>Select File</span>
                                </div>
                            </div>
                            <span class="text-danger">Image dimensions should be : 750 * 800
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label> solution title (EN)</label>
                                <input type="text" class="form-control" name="title_en"
                                    value="{{ $solution->translate('en')->title }}" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label> solution title (AR)</label>
                                <input type="text" class="form-control" name="title_ar"
                                    value="{{ $solution->translate('ar')->title }}" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label> solution brief (EN)</label>
                                <textarea class="form-control" name="brief_en">{{ $solution->translate('en')->brief }}</textarea>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label> solution brief (AR)</label>
                                <textarea class="form-control" name="brief_ar">{{ $solution->translate('ar')->brief }}</textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label> solution content (EN) </label>
                                <textarea class="form-control tiny-editor"
                                    name="description_en">{{ $solution->translate('en')->description }}</textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label> solution content (AR) </label>
                                <textarea class="form-control tiny-editor"
                                    name="description_ar">{{ $solution->translate('ar')->description }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label> Meta title</label>
                                <input type="text" class="form-control" name="meta_title"
                                    value={{ $solution->meta_title }} />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label> Meta keywords</label>
                                <input type="text" class="form-control tags" name="meta_keywords"
                                    value="{{ $solution->meta_keywords }}" />
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label> Meta description</label>
                                <textarea class="form-control" name="meta_description">{{ $solution->meta_description }}</textarea>
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
