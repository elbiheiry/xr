@extends('admin.layouts.master')
@section('content')
    <!-- Page head ==========================================-->
    <div class="page-head">
        <i class="fa fa-list"></i>
        Testimonials
        <ul class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-tachometer-alt"></i>
                    Dashboard</a>
            </li>
            <li class="active">Testimonials</li>
        </ul>
    </div>
    <!-- Page content ==========================================-->
    <div class="page-content">
        <div class="widget">
            <div class="widget-title">
                Testimonials
                <a class="custom-btn" href="{{ route('admin.testimonials.create') }}">
                    <i class="fa fa-plus"></i> Add Testimonial
                </a>
            </div>
            <div class="widget-content">
                @php
                    $x = 1;
                @endphp
                @foreach ($testimonials as $index => $testimonial)
                    <div class="slide_item">
                        <img src="{{ get_image($testimonial->image, 'testimonials') }}" />
                        <div class="slide_cont">
                            <span> #{{ $x }} </span>
                            <h3>{{ $testimonial->translate('en')->name }}</h3>
                            <div class="w-100">
                                <a class="custom-btn"
                                    href="{{ route('admin.testimonials.edit', ['id' => $testimonial->id]) }}">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                                <button class="custom-btn red-bc delete-btn"
                                    data-url="{{ route('admin.testimonials.delete', ['id' => $testimonial->id]) }}"
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
