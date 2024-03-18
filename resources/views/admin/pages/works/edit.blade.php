@extends('admin.layouts.master')
@section('content')
    <!-- Page head ==========================================-->
    <div class="page-head">
        <i class="fa fa-list"></i>
        Work process
        <ul class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-tachometer-alt"></i>
                    Dashboard</a>
            </li>
            <li class="active">Work process</li>
        </ul>
    </div>
    <!-- Page content ==========================================-->
    <div class="page-content">
        <div class="widget">
            <div class="widget-title"> Work process</div>
            <div class="widget-content">
                <form method="put" action="{{ route('admin.works.update', ['id' => $work->id]) }}" class="ajax-form">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label> title (EN)</label>
                                <input type="text" class="form-control" name="title_en"
                                    value="{{ $work->translate('en')->title }}" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label> title (AR)</label>
                                <input type="text" class="form-control" name="title_ar"
                                    value="{{ $work->translate('ar')->title }}" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label> description (EN) </label>
                                <textarea class="form-control" name="description_en">{{ $work->translate('en')->description }}</textarea>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label> description (AR) </label>
                                <textarea class="form-control" name="description_ar">{{ $work->translate('ar')->description }}</textarea>
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
