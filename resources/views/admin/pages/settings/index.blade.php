@extends('admin.layouts.master')
@section('content')
    <!-- Page head ==========================================-->
    <div class="page-head">
        <i class="fa fa-list"></i>
        Site settings
        <ul class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-tachometer-alt"></i>
                    Dashboard</a>
            </li>
            <li class="active">Site settings</li>
        </ul>
    </div>
    <!-- Page content ==========================================-->
    <div class="page-content">
        <div class="widget">
            <div class="widget-title"> Site settings</div>
            <div class="widget-content">
                <form method="put" action="{{ route('admin.settings.update') }}" class="ajax-form">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-6">
                            <img src="{{ get_image($settings->image, 'settings') }}" style="height : 100px !important">
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Contact us image </label>
                                <div class="uplaod-wrap">
                                    <input type='file' name="image">
                                    <span class='path'></span>
                                    <span class='button'>Select File</span>
                                </div>
                            </div>
                            <span class="text-danger">Image dimensions should be : 546 * 557
                            </span>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label> Map</label>
                                <input type="text" class="form-control" name="map" value="{{ $settings->map }}" />
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label> Phone number</label>
                                <input type="text" class="form-control" name="phone" value="{{ $settings->phone }}" />
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label> Whatsapp number</label>
                                <input type="text" class="form-control" name="whatsapp"
                                    value="{{ $settings->whatsapp }}" />
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label> Contact email</label>
                                <input type="email" class="form-control" name="email" value="{{ $settings->email }}" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label> Address (EN)</label>
                                <input type="text" class="form-control" name="address_en"
                                    value="{{ $settings->translate('en')->address }}" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label> Address (AR)</label>
                                <input type="text" class="form-control" name="address_ar"
                                    value="{{ $settings->translate('ar')->address }}" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label> Description (EN) </label>
                                <textarea class="form-control" name="description_en">{{ $settings->translate('en')->description }}</textarea>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label> Description (AR) </label>
                                <textarea class="form-control" name="description_ar">{{ $settings->translate('ar')->description }}</textarea>
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
