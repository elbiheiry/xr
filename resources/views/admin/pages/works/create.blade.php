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
                <form method="post" action="{{ route('admin.works.store') }}" class="ajax-form">
                    @csrf
                    @method('post')
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label> title (EN)</label>
                                <input type="text" class="form-control" name="title_en" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label> title (AR)</label>
                                <input type="text" class="form-control" name="title_ar" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label> description (EN) </label>
                                <textarea class="form-control" name="description_en"></textarea>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label> description (AR) </label>
                                <textarea class="form-control" name="description_ar"></textarea>
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
