@extends('site.layouts.master')
@section('content')
    <!-- Start Main Slides Area -->
    <div class="main-slides-area darked">
        <div class="main-slides-item">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-7 col-md-12">
                        <div class="main-slides-content">
                            <span data-aos="fade-right" data-aos-delay="70" data-aos-duration="700" data-aos-once="true">New
                                level XR | XR Software House</span>
                            <h1 data-aos="fade-right" data-aos-delay="70" data-aos-duration="700" data-aos-once="true">
                                {{ $content->translate(app()->getLocale())->title1 }}
                                <span class="overlay"></span>
                            </h1>
                            <p data-aos="fade-right" data-aos-delay="70" data-aos-duration="700" data-aos-once="true">
                                {{ $content->translate(app()->getLocale())->description1 }}
                            </p>
                            <div class="slides-btn" data-aos="fade-right" data-aos-delay="70" data-aos-duration="700"
                                data-aos-once="true">
                                <a href="{{ route('site.about.index') }}" class="default-btn">
                                    {{ __('home.details') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-12" data-aos="fade-down" data-aos-delay="70" data-aos-duration="700"
                        data-aos-once="true">
                        <div class="main-slides-image" data-tilt>
                            <img src="{{ get_image($content->image, 'home') }}" alt="image" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="banner-shape-1">
            <img src="{{ surl('images/main-banner/banner-shape-1.png') }}" alt="image" />
        </div>
        <div class="banner-shape-2">
            <img src="{{ surl('images/main-banner/banner-shape-2.png') }}" alt="image" />
        </div>
        <div class="banner-dot-shape-1">
            <img src="{{ surl('images/main-banner/dot-1.png') }}" alt="image" />
        </div>
        <div class="banner-dot-shape-2">
            <img src="{{ surl('images/main-banner/dot-2.png') }}" alt="image" />
        </div>
        <div class="banner-dot-shape-3">
            <img src="{{ surl('images/main-banner/dot-3.png') }}" alt="image" />
        </div>
        <div class="banner-dot-shape-4">
            <img src="{{ surl('images/main-banner/dot-4.png') }}" alt="image" />
        </div>
        <div class="banner-dot-shape-5">
            <img src="{{ surl('images/main-banner/dot-5.png') }}" alt="image" />
        </div>
        <div class="lines">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
    </div>
    <!-- End Main Slides Area -->

    <!-- Start About Area -->
    <div class="about-area ptb-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12">
                    <div class="about-image" data-tilt>
                        <img src="{{ get_image($about->image1, 'about') }}" alt="image" data-aos="fade-down"
                            data-aos-delay="80" data-aos-duration="800" data-aos-once="true" />
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="about-content" data-aos="fade-up" data-aos-delay="80" data-aos-duration="800"
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

                        <div class="about-btn">
                            <a href="{{ route('site.about.index') }}" class="default-btn">{{ __('home.know') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End About Area -->

    <!-- Start Services Area -->
    <div class="services-area with-radius ptb-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="services-section-content text-center" data-aos="fade-down" data-aos-delay="80"
                        data-aos-duration="800" data-aos-once="true">
                        <span>XR Solutions</span>
                        <h3>
                            {!! $content->translate(app()->getLocale())->title2 !!}
                            <span class="overlay"></span>
                        </h3>
                        <p>
                            {!! $content->translate(app()->getLocale())->description2 !!}
                        </p>
                    </div>
                </div>
                @foreach ($services as $solution)
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="services-item">
                            <div class="services-image">
                                <a href="{{ route('site.solution', ['slug' => $solution->slug]) }}"><img
                                        src="{{ get_image($solution->outer_image, 'solutions') }}" alt="image" /></a>
                            </div>
                            <div class="services-content">
                                <h3>
                                    <a
                                        href="{{ route('site.solution', ['slug' => $solution->slug]) }}">{{ $solution->translate(app()->getLocale())->title }}</a>
                                </h3>
                                <p>
                                    {{ $solution->translate(app()->getLocale())->brief }}
                                </p>
                                <a href="{{ route('site.solution', ['slug' => $solution->slug]) }}"
                                    class="services-btn">{{ __('home.view') }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- End Services Area -->
    <!-- Start Blog Area -->
    <div class="blog-area pt-100 pb-75">
        <div class="container">
            <div class="section-title">
                <span>{{ __('layouts.articles') }}</span>
                <h2>
                    {!! $content->translate(app()->getLocale())->title3 !!}
                    <span class="overlay"></span>
                </h2>
            </div>
            <div class="blog-slides owl-carousel owl-theme">

                @foreach ($articles as $index => $article)
                    <div class="blog-card" data-aos="fade-up" data-aos-delay="{{ $index % 2 == 0 ? '80' : '90' }}"
                        data-aos-duration="{{ $index % 2 == 0 ? '800' : '900' }}" data-aos-once="true">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="blog-image">
                                    <a href="{{ route('site.articles.article', ['slug' => $article->slug]) }}s"><img
                                            src="{{ get_image($article->outer_image, 'articles') }}" alt="image" /></a>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="blog-content">
                                    <div class="date">{{ $article->created_at->isoFormat('Do MMM, YYYY') }}
                                    </div>
                                    <h3>
                                        <a
                                            href="{{ route('site.articles.article', ['slug' => $article->slug]) }}">{{ $article->translate(app()->getLocale())->title }}</a>
                                    </h3>
                                    <p>
                                        {{ $article->translate(app()->getLocale())->brief }}
                                    </p>
                                    <a href="{{ route('site.articles.article', ['slug' => $article->slug]) }}"
                                        class="blog-btn">{{ __('home.view') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- End Blog Area -->
    <!-- Start Team Area -->
    <div class="team-area pt-100 pb-75">
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
    </div>
    <!-- End Team Area -->
    <!-- Start Testimonials Area -->
    <div class="testimonials-area ptb-100 gray_bc">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12">
                    <div class="testimonials-section-content" data-aos="fade-right" data-aos-delay="80"
                        data-aos-duration="800" data-aos-once="true">
                        <span>{{ __('home.testimonials') }}</span>
                        <h3>
                            {!! $content->translate(app()->getLocale())->title5 !!}
                            <span class="overlay"></span>
                        </h3>
                        @foreach (explode("\n", $content->translate(app()->getLocale())->description5) as $text)
                            <p>
                                {{ $text }}
                            </p>
                        @endforeach
                        <div class="testimonials-btn">
                            <a href="" class="default-btn">{{ __('home.know') }}</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="testimonials-item" data-aos="fade-left" data-aos-delay="80" data-aos-duration="800"
                        data-aos-once="true">
                        @foreach ($testimonials as $test)
                            <div class="item-box" data-tilt>
                                <img src="{{ get_image($test->image, 'testimonials') }}" class="rounded-circle"
                                    alt="image" />
                                <p>
                                    {{ $test->translate(app()->getLocale())->description }}
                                </p>
                                <h4>{{ $test->translate(app()->getLocale())->name }},
                                    <span>{{ $test->translate(app()->getLocale())->position }}</span>
                                </h4>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="testimonialsbg-shape">
            <img src="{{ surl('images/testimonials/testimonials-shape.png') }}" alt="image" />
        </div>
    </div>
    <!-- End Testimonials Area -->
    <!-- Start Partner Area -->
    <div class="partner-area ptb-100">
        <div class="container">
            <div class="partner-slides owl-carousel owl-theme">
                @foreach ($partners as $partner)
                    <div class="partner-card" data-aos="fade-up" data-aos-delay="80" data-aos-duration="800"
                        data-aos-once="true">
                        <a href="#">
                            <img src="{{ get_image($partner->image, 'partners') }}" alt="partner" />
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- End Partner Area -->
@endsection
