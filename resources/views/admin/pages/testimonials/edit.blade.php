@extends('admin.layouts.master')
@section('content')
    <!-- Page head ==========================================-->
    <div class="page-head">
        <i class="fa fa-list"></i>
        testimonials
        <ul class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-tachometer-alt"></i>
                    Dashboard</a>
            </li>
            <li class="active">testimonials</li>
        </ul>
    </div>
    <!-- Page content ==========================================-->
    <div class="page-content">
        <div class="widget">
            <div class="widget-title"> testimonials</div>
            <div class="widget-content">
                <form method="put" action="{{ route('admin.testimonials.update', ['id' => $testimonial->id]) }}"
                    class="ajax-form">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-12">
                            <img src="{{ get_image($testimonial->image, 'testimonials') }}"
                                style="height : 100px !important">
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>image </label>
                                <div class="uplaod-wrap">
                                    <input type='file' name="image">
                                    <span class='path'></span>
                                    <span class='button'>Select File</span>
                                </div>
                            </div>
                            <span class="text-danger">Image dimensions should be : 150 * 150
                            </span>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label> Rate</label>
                                <input type="number" class="form-control" name="rate" min="1" max="5"
                                    value="{{ $testimonial->rate }}" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label> name (EN)</label>
                                <input type="text" class="form-control" name="name_en"
                                    value="{{ $testimonial->translate('en')->name }}" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label> name (AR)</label>
                                <input type="text" class="form-control" name="name_ar"
                                    value="{{ $testimonial->translate('ar')->name }}" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label> position (EN)</label>
                                <input type="text" class="form-control" name="position_en"
                                    value="{{ $testimonial->translate('en')->position }}" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label> position (AR)</label>
                                <input type="text" class="form-control" name="position_ar"
                                    value="{{ $testimonial->translate('ar')->position }}" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label> description (EN)</label>
                                <textarea class="form-control" name="description_en">{{ $testimonial->translate('en')->description }}</textarea>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label> description (AR)</label>
                                <textarea class="form-control" name="description_ar">{{ $testimonial->translate('ar')->description }}</textarea>
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
