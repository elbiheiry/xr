@extends('site.layouts.master')
@section('content')
    <!-- Start Page Banner Area -->
    <div class="page-banner-area bg-5 jarallax" data-jarallax='{"speed": 0.3}'>
        <div class="container">
            <div class="page-banner-content" data-aos="fade-right" data-aos-delay="50" data-aos-duration="500"
                data-aos-once="true">
                <h2>{{ __('layouts.contact_header') }}</h2>

                <ul>
                    <li>
                        <a href="{{ route('site.index') }}">{{ __('layouts.home') }}</a>
                    </li>
                    <li>{{ __('layouts.contact_header') }}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Page Banner Area -->

    <!-- Start Overview Area -->
    <div class="overview-area pt-100 pb-75">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6">
                    <div class="overview-card">
                        <i class="ri-phone-line"></i>
                        <h3>{{ __('home.call') }}</h3>
                        <span>
                            <a href="tel:{{ $settings->phone }}"> {{ $settings->phone }}</a>
                        </span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="overview-card">
                        <i class="ri-whatsapp-line"></i>
                        <h3>{{ __('home.whats') }}</h3>
                        <span>
                            <a href="tel:{{ $settings->whatsapp }}">{{ $settings->whatsapp }}</a>
                        </span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="overview-card">
                        <i class="ri-mail-line"></i>
                        <h3>{{ __('home.email') }}</h3>
                        <span>
                            <a href="mailto:{{ $settings->email }}">{{ $settings->email }}</a>
                        </span>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="overview-card">
                        <i class="ri-map-pin-2-line"></i>
                        <h3>{{ __('home.visit') }}</h3>
                        <span>
                            {{ $settings->translate(app()->getLocale())->address }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Overview Area -->

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
    <!-- End Talk Area -->

    <!-- Start Map Area -->
    <div class="container ptb-100">
        <div class="map-location">
            <iframe src="{{ $settings->map }}" width="100%" height="450" style="border: 0" allowfullscreen=""
                loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
    <!-- End Map Area -->
@endsection
