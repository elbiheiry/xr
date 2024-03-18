@extends('site.layouts.master')
@section('meta')
    <meta NAME="keywords" CONTENT="{{ $solution->meta_keywords }}" />
    <meta NAME="description" CONTENT="{{ $solution->meta_description }}" />
    <meta name="title" content="{{ $solution->meta_title }}">
@endsection
@section('content')
    <!-- Start Page Banner Area -->
    <div class="page-banner-area bg-4 jarallax" data-jarallax='{"speed": 0.3}'>
        <div class="container">
            <div class="page-banner-content" data-aos="fade-right" data-aos-delay="50" data-aos-duration="500"
                data-aos-once="true">
                <h2>{{ $solution->translate(app()->getLocale())->title }}</h2>

                <ul>
                    <li>
                        <a href="{{ route('site.index') }}">{{ __('layouts.home') }}</a>
                    </li>
                    <li>{{ $solution->translate(app()->getLocale())->title }}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Page Banner Area -->

    <!-- Start Services Details Area -->
    <div class="services-details-area ptb-100">
        <div class="container">
            <div class="services-details-desc">
                <div class="article-services-image">
                    <img src="{{ get_image($solution->inner_image, 'solutions') }}" alt="image" />
                </div>
                <div class="article-services-content">
                    <h3>{{ $solution->translate(app()->getLocale())->title }}</h3>
                </div>
                {!! $solution->translate(app()->getLocale())->description !!}
            </div>
        </div>

        <div class="services-details-shape">
            <img src="{{ surl('images/team/line-shape.png') }}" alt="image" />
        </div>
    </div>
    <!-- End Services Details Area -->

    <!-- Start Talk Area -->
    <!-- Start Services Area -->
    <div class="services-area with-radius ptb-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="services-section-content text-center" data-aos="fade-down" data-aos-delay="80"
                        data-aos-duration="800" data-aos-once="true">
                        <span>{{ __('home.related_solutions') }}</span>
                        <h3>
                            {!! $content->translate(app()->getLocale())->title2 !!}
                            <span class="overlay"></span>
                        </h3>
                        <p>
                            {!! $content->translate(app()->getLocale())->description2 !!}
                        </p>
                    </div>
                </div>
                @foreach ($related_solutions as $related_solution)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="services-item">
                            <div class="services-image">
                                <a href="{{ route('site.solution', ['slug' => $related_solution->slug]) }}"><img
                                        src="{{ get_image($related_solution->outer_image, 'solutions') }}"
                                        alt="image" /></a>
                            </div>
                            <div class="services-content">
                                <h3>
                                    <a
                                        href="{{ route('site.solution', ['slug' => $related_solution->slug]) }}">{{ $related_solution->translate(app()->getLocale())->title }}</a>
                                </h3>
                                <p>
                                    {{ $related_solution->translate(app()->getLocale())->brief }}
                                </p>
                                <a href="{{ route('site.solution', ['slug' => $related_solution->slug]) }}"
                                    class="services-btn">{{ __('home.view') }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Start Talk Area -->
    <div class="talk-area ptb-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12">
                    <div class="talk-image" data-tilt>
                        <img src="{{ surl('images/talk.png') }}" alt="image" />
                    </div>
                </div>

                <div class="col-lg-6 col-md-12">
                    <div class="talk-content margin-zero">
                        <span>{{ __('layouts.talk') }}</span>
                        <h3>
                            {{ __('home.hear') }}
                            <span class="overlay"></span>
                        </h3>

                        <form id="contactFormTwo" class="contact-form" method="post"
                            action="{{ route('site.contact.store') }}">
                            @csrf
                            @method('post')
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control"
                                            placeholder="{{ __('form.name') }}" />
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control"
                                            placeholder="{{ __('form.email') }}" />
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <input type="number" name="phone" class="form-control"
                                            placeholder="{{ __('form.phone') }}" />

                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <textarea name="message" class="form-control" cols="30" rows="6"
                                            placeholder="{{ __('form.message') }}..."></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 form-group">
                                    <div class="g-recaptcha" data-sitekey="6Lf4diYgAAAAAJZx1TBAoJeybyVXeATgcT7AX4NY"
                                        style="width:100px;">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <button type="submit" class="default-btn">
                                        {{ __('layouts.send') }}<span></span>
                                    </button>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
