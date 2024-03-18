@extends('site.layouts.master')
@section('content')
    <!-- Start Page Banner Area -->
    <div class="page-banner-area bg-5 jarallax" data-jarallax='{"speed": 0.3}'>
        <div class="container">
            <div class="page-banner-content" data-aos="fade-right" data-aos-delay="50" data-aos-duration="500"
                data-aos-once="true">
                <h2>{{ __('layouts.team') }}</h2>

                <ul>
                    <li>
                        <a href="{{ route('site.index') }}">{{ __('layouts.home') }}</a>
                    </li>
                    <li>{{ __('layouts.team') }}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Page Banner Area -->

    <!-- Start Team Area -->
    <div class="team-area pt-100 pb-75 white_bc">
        <div class="container">
            <div class="section-title section-style-two">
                <span>{{ __('layouts.team') }}</span>
                <h2>{!! $content->translate(app()->getLocale())->title4 !!} <span class="overlay"></span></h2>
                <p>
                    {!! $content->translate(app()->getLocale())->description4 !!}
                </p>
            </div>

            <div class="row justify-content-center">
                @foreach ($members as $member)
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-team-card">
                            <div class="team-image" data-tilt>
                                <img src="{{ get_image($member->image, 'members') }}" alt="image" />
                                @isset($member->links)
                                    <ul class="team-social">
                                        @foreach ($member->links as $link)
                                            <li>
                                                <a href="{{ $link->link }}" target="_blank">
                                                    {!! $link->icon !!}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endisset

                            </div>
                            <div class="team-content">
                                <h3>{{ $member->translate(app()->getLocale())->name }}</h3>
                                <span> {{ $member->translate(app()->getLocale())->position }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="team-shape">
            <img src="{{ surl('images/team/line-shape.png') }}" alt="image" />
        </div>
    </div>
    <!-- End Team Area -->
@endsection
