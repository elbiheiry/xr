@extends('site.layouts.master')
@section('content')
    <!-- Start Page Banner Area -->
    <div class="page-banner-area bg-5 jarallax" data-jarallax='{"speed": 0.3}'>
        <div class="container">
            <div class="page-banner-content" data-aos="fade-right" data-aos-delay="50" data-aos-duration="500"
                data-aos-once="true">
                <h2>{{ __('layouts.partners') }}</h2>

                <ul>
                    <li>
                        <a href="{{ route('site.index') }}">{{ __('layouts.home') }}</a>
                    </li>
                    <li>{{ __('layouts.partners') }}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Page Banner Area -->
    <!-- Start Partner Area -->
    <div class="partner-area ptb-100 inner">
        <div class="container">
            <div class="row">
                @foreach ($partners as $partner)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="partner-card" data-aos="fade-up" data-aos-delay="80" data-aos-duration="800"
                            data-aos-once="true">
                            <a href="#">
                                <img src="{{ get_image($partner->image, 'partners') }}" alt="partner" />
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
