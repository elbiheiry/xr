@extends('site.layouts.master')
@section('content')
    <!-- Start Page Banner Area -->
    <div class="page-banner-area bg-5 jarallax" data-jarallax='{"speed": 0.3}'>
        <div class="container">
            <div class="page-banner-content" data-aos="fade-right" data-aos-delay="50" data-aos-duration="500"
                data-aos-once="true">
                <h2>{{ __('layouts.who_we_are') }}</h2>

                <ul>
                    <li>
                        <a href="{{ route('site.index') }}">{{ __('layouts.home') }}</a>
                    </li>
                    <li>{{ __('layouts.who_we_are') }}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Page Banner Area -->

    <!-- Start About Area -->
    <div class="about-area pt-100 pb-50">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12">
                    <div class="about-wrap-image" data-tilt>
                        <img src="{{ get_image($about->image1, 'about') }}" alt="image" data-aos="fade-down"
                            data-aos-delay="80" data-aos-duration="800" data-aos-once="true" />
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="about-wrap-content" data-aos="fade-up" data-aos-delay="80" data-aos-duration="800"
                        data-aos-once="true">
                        <span>{{ __('layouts.who_we_are') }}</span>
                        <h3>
                            {!! $about->translate(app()->getLocale())->title1 !!}
                            <span class="overlay"></span>
                        </h3>
                        @foreach (explode("\n", $about->translate(app()->getLocale())->description1) as $text)
                            <p>
                                {{ $text }}
                            </p>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="about-inner-box">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6">
                        <div class="single-about-card" data-aos="fade-up" data-aos-delay="80" data-aos-duration="800"
                            data-aos-once="true">
                            <h3>{{ $about->translate(app()->getLocale())->title2 }}</h3>
                            <p>
                                {!! $about->translate(app()->getLocale())->description2 !!}
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-about-card" data-aos="fade-down" data-aos-delay="70" data-aos-duration="700"
                            data-aos-once="true">
                            <h3>{{ $about->translate(app()->getLocale())->title3 }}</h3>
                            <p>
                                {!! $about->translate(app()->getLocale())->description3 !!}
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-about-card" data-aos="fade-up" data-aos-delay="80" data-aos-duration="800"
                            data-aos-once="true">
                            <div class="card-image" data-tilt>
                                <img src="{{ get_image($about->image2, 'about') }}" alt="image" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End About Area -->

    <!-- Start Choose Area -->
    <div class="choose-area border-none pb-50">
        <div class="container">
            <div class="section-title section-style-two">
                <span>{{ __('home.work') }}</span>
                <h2>{{ $about->translate(app()->getLocale())->title4 }} <span class="overlay"></span></h2>
                <p>
                    {{ $about->translate(app()->getLocale())->description4 }}
                </p>
            </div>

            <div class="row justify-content-center">
                @foreach ($steps as $step)
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-choose-card" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500"
                            data-aos-once="true">
                            <div class="choose-content">
                                <h3>
                                    <a href="#">{{ $step->translate(app()->getLocale())->title }}</a>
                                </h3>
                                <p>
                                    {{ $step->translate(app()->getLocale())->description }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- End Choose Area -->

    <!-- Start Testimonials Area -->
    <div class="testimonials-area ptb-100">
        <div class="container-fluid">
            <div class="section-title section-style-two">
                <span>{{ __('home.testimonials') }}</span>
                <h2>{{ __('home.feedback') }} <span class="overlay"></span></h2>
            </div>

            <div class="testimonials-slides owl-carousel owl-theme">
                @foreach ($testimonials as $testimonial)
                    <div class="single-testimonials-card" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500"
                        data-aos-once="true">
                        <p>
                            {{ $testimonial->translate(app()->getLocale())->description }}
                        </p>

                        <div class="info-item-box">
                            <img src="{{ get_image($testimonial->image, 'testimonials') }}" class="rounded-circle"
                                alt="image" />
                            <h4>{{ $testimonial->translate(app()->getLocale())->name }},
                                <span>{{ $testimonial->translate(app()->getLocale())->name }}</span>
                            </h4>
                            <ul class="rating-list">
                                @for ($i = 0; $i < $testimonial->rate; $i++)
                                    <li><i class="ri-star-fill"></i></li>
                                @endfor
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- End Testimonials Area -->
@endsection
