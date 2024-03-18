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
            <div class="widget-title">
                Work process
                <a class="custom-btn" href="{{ route('admin.works.create') }}">
                    <i class="fa fa-plus"></i> Add step
                </a>
            </div>
            <div class="widget-content">
                @php
                    $x = 1;
                @endphp
                @foreach ($works as $index => $work)
                    <div class="slide_item">
                        <div class="slide_cont">
                            <span> #{{ $x }} </span>
                            <h3>{{ $work->translate('en')->title }}</h3>
                            <div class="w-100">
                                <a class="custom-btn" href="{{ route('admin.works.edit', ['id' => $work->id]) }}">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                                <button class="custom-btn red-bc delete-btn"
                                    data-url="{{ route('admin.works.delete', ['id' => $work->id]) }}"
                                    style="margin-left:5px;">
                                    <i class="fa fa-trash-alt"></i> Delete
                                </button>
                            </div>
                        </div>
                    </div>
                    @php
                        $x++;
                    @endphp
                @endforeach

            </div>
        </div>

    </div>
    <!--End Page content-->
@endsection
