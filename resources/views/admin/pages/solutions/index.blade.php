@extends('admin.layouts.master')
@section('content')
    <!-- Page head ==========================================-->
    <div class="page-head">
        <i class="fa fa-list"></i>
        Solutions
        <ul class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-tachometer-alt"></i>
                    Dashboard</a>
            </li>
            <li class="active">Solutions</li>
        </ul>
    </div>
    <!-- Page content ==========================================-->
    <div class="page-content">
        <div class="widget">
            <div class="widget-title">
                Solutions
                <a class="custom-btn" href="{{ route('admin.solutions.create') }}">
                    <i class="fa fa-plus"></i> Add solution
                </a>
            </div>
            <div class="widget-content">
                @php
                    $x = 1;
                @endphp
                @foreach ($solutions as $index => $solution)
                    <div class="slide_item">
                        <img src="{{ get_image($solution->inner_image, 'solutions') }}" />
                        <div class="slide_cont">
                            <span> #{{ $x }} </span>
                            <h3>{{ $solution->translate('en')->title }}</h3>
                            <div class="w-100">
                                <a class="custom-btn"
                                    href="{{ route('admin.solutions.edit', ['id' => $solution->id]) }}">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                                <button class="custom-btn red-bc delete-btn"
                                    data-url="{{ route('admin.solutions.delete', ['id' => $solution->id]) }}"
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
