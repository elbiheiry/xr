@extends('admin.layouts.master')
@section('content')
    <!-- Page head ==========================================-->
    <div class="page-head">
        <i class="fa fa-list"></i>
        Members
        <ul class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-tachometer-alt"></i>
                    Dashboard</a>
            </li>
            <li class="active">Members</li>
        </ul>
    </div>
    <!-- Page content ==========================================-->
    <div class="page-content">
        <div class="widget">
            <div class="widget-title">
                Members
                <a class="custom-btn" href="{{ route('admin.members.create') }}">
                    <i class="fa fa-plus"></i> Add member
                </a>
            </div>
            <div class="widget-content">
                @php
                    $x = 1;
                @endphp
                @foreach ($members as $index => $member)
                    <div class="slide_item">
                        <img src="{{ get_image($member->image, 'members') }}" />
                        <div class="slide_cont">
                            <span> #{{ $x }} </span>
                            <h3>{{ $member->translate('en')->name }}</h3>
                            <div class="w-100">
                                <a class="custom-btn blue-bc"
                                    href="{{ route('admin.members.links.index', ['id' => $member->id]) }}">
                                    <i class="fa fa-link"></i> links
                                </a>
                                <a class="custom-btn" href="{{ route('admin.members.edit', ['id' => $member->id]) }}">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                                <button class="custom-btn red-bc delete-btn"
                                    data-url="{{ route('admin.members.delete', ['id' => $member->id]) }}"
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
