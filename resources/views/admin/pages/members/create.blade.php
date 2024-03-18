@extends('admin.layouts.master')
@section('content')
    <!-- Page head ==========================================-->
    <div class="page-head">
        <i class="fa fa-list"></i>
        members
        <ul class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-tachometer-alt"></i>
                    Dashboard</a>
            </li>
            <li class="active">members</li>
        </ul>
    </div>
    <!-- Page content ==========================================-->
    <div class="page-content">
        <div class="widget">
            <div class="widget-title"> members</div>
            <div class="widget-content">
                <form method="post" action="{{ route('admin.members.store') }}" class="ajax-form">
                    @csrf
                    @method('post')
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Member image </label>
                                <div class="uplaod-wrap">
                                    <input type='file' name="image">
                                    <span class='path'></span>
                                    <span class='button'>Select File</span>
                                </div>
                            </div>
                            <span class="text-danger">Image dimensions should be : 285 * 305
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label> Member name (EN)</label>
                                <input type="text" class="form-control" name="name_en" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label> Member name (AR)</label>
                                <input type="text" class="form-control" name="name_ar" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label> Member position (EN)</label>
                                <input type="text" class="form-control" name="position_en" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label> Member position (AR)</label>
                                <input type="text" class="form-control" name="position_ar" />
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
