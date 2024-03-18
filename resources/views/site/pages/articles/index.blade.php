@extends('site.layouts.master')
@section('content')
    <!-- Start Page Banner Area -->
    <div class="page-banner-area bg-4 jarallax" data-jarallax='{"speed": 0.3}'>
        <div class="container">
            <div class="page-banner-content" data-aos="fade-right" data-aos-delay="50" data-aos-duration="500"
                data-aos-once="true">
                <h2>{{ __('layouts.articles') }}</h2>

                <ul>
                    <li>
                        <a href="{{ route('site.index') }}">{{ __('layouts.home') }}</a>
                    </li>
                    <li>{{ __('layouts.articles') }}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Page Banner Area -->

    <!-- Start Blog Area -->
    <div class="blog-area pt-100 pb-100">
        <div class="container">
            <div class="section-title">
                <span>{{ __('layouts.articles') }}</span>
                <h2>
                    {!! $content->translate(app()->getLocale())->title3 !!}
                    <span class="overlay"></span>
                </h2>
            </div>
            <div class="row justify-content-center">
                @foreach ($articles as $index => $article)
                    <div class="col-lg-6 col-md-12">
                        <div class="blog-card" data-aos="fade-up" data-aos-delay="{{ $index % 2 == 0 ? '80' : '90' }}"
                            data-aos-duration="{{ $index % 2 == 0 ? '800' : '900' }}" data-aos-once="true">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <div class="blog-image">
                                        <a href="{{ route('site.articles.article', ['slug' => $article->slug]) }}"><img
                                                src="{{ get_image($article->outer_image, 'articles') }}"
                                                alt="image" /></a>
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
                    </div>
                @endforeach
                {!! $articles->links('vendor.pagination.default') !!}
                {{-- <div class="col-lg-12 col-md-12">
                    <div class="pagination-area">
                        <a href="#" class="prev page-numbers"><i class="ri-arrow-left-s-line"></i></a>
                        <span class="page-numbers current" aria-current="page">1</span>
                        <a href="#" class="page-numbers">2</a>
                        <a href="#" class="page-numbers">3</a>
                        <a href="#" class="next page-numbers"><i class="ri-arrow-right-s-line"></i></a>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <!-- End Blog Area -->
@endsection
