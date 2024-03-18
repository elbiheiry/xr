@extends('site.layouts.master')
@section('meta')
    <meta NAME="keywords" CONTENT="{{ $article->meta_keywords }}" />
    <meta NAME="description" CONTENT="{{ $article->meta_description }}" />
    <meta name="title" content="{{ $article->meta_title }}">
@endsection
@section('content')
    <div class="page-banner-area bg-2 jarallax" data-jarallax='{"speed": 0.3}'>
        <div class="container">
            <div class="page-banner-content" data-aos="fade-right" data-aos-delay="50" data-aos-duration="500"
                data-aos-once="true">
                <h2>{{ $article->translate(app()->getLocale())->title }}</h2>

                <ul>
                    <li>
                        <a href="{{ route('site.index') }}">{{ __('layouts.home') }}</a>
                    </li>
                    <li>{{ $article->translate(app()->getLocale())->title }}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Page Banner Area -->

    <!-- Start Blog Details Area -->
    <div class="blog-details-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="blog-details-desc">
                        <div class="article-image">
                            <img src="{{ get_image($article->inner_image, 'articles') }}" alt="image" />
                        </div>

                        <div class="article-content">
                            <ul class="entry-list">
                                <li>{{ app()->getLocale() == 'en' ? 'By' : 'بواسطة' }} <a
                                        href="javascript:;">{{ $article->created_by }}</a></li>
                                <li>{{ $article->created_at->isoFormat('Do MMM, YYYY') }}</li>
                            </ul>
                            <h3>{{ $article->translate(app()->getLocale())->title }}</h3>
                            {!! $article->translate(app()->getLocale())->description !!}
                        </div>

                        <div class="article-share">
                            <div class="row align-items-center">
                                <div class="col-lg-6 col-md-6">
                                    <div class="share-content">
                                        <h4>{{ app()->getLocale() == 'en' ? 'Share The Article' : 'مشاركة المقال' }}:
                                        </h4>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <!-- AddToAny BEGIN -->

                                    <script async src="https://static.addtoany.com/menu/page.js"></script>
                                    <!-- AddToAny END -->
                                    <ul class="share-social text-end a2a_kit a2a_kit_size_32 a2a_default_style">
                                        <li>
                                            <a class="a2a_button_facebook"></a>
                                        </li>
                                        <li>
                                            <a class="a2a_button_twitter"></a>
                                        </li>
                                        <li>
                                            <a class="a2a_button_whatsapp"></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="article-comments">
                            <h3>{{ $article->comments->count() }}
                                {{ app()->getLocale() == 'en' ? 'Comments' : 'تعليقات' }}:</h3>

                            @foreach ($article->comments as $comment)
                                <div class="comments-list">
                                    <img src="{{ $comment->user_image() }}" alt="image" />
                                    <h5>{{ $comment->name }}, <span>{{ $comment->created_at->diffForHumans() }}</span>
                                    </h5>
                                    <p>
                                        {{ $comment->comment }}
                                    </p>
                                </div>
                            @endforeach
                        </div>

                        <div class="article-leave-comment">
                            <h3>{{ app()->getLocale() == 'en' ? 'Leave a reply' : 'إترك تعليقك' }}</h3>

                            <form method="post" action="{{ route('site.articles.store', ['id' => $article->id]) }}"
                                class="comment-form">
                                @csrf
                                @method('post')
                                <div class="row justify-content-center">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="name"
                                                placeholder="{{ __('form.name') }}" />
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <input type="email" class="form-control"
                                                placeholder="{{ __('form.email') }}" name="email" />
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <textarea name="comment" class="form-control" placeholder="{{ __('form.message') }}"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <button type="submit" class="default-btn">
                                            {{ app()->getLocale() == 'en' ? 'Post A Comment' : 'إترك تعليقك' }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12">
                    <aside class="widget-area">

                        <div class="widget widget_recent_post">
                            <h3 class="widget-title">
                                {{ app()->getLocale() == 'en' ? 'Recent Post' : 'المقالات الحالية' }}</h3>

                            @foreach ($related_articles as $index => $realted_article)
                                <article class="item">
                                    <a href="{{ route('site.articles.article', ['slug' => $realted_article->slug]) }}"
                                        class="thumb">
                                        <span class="fullimage bg1" role="img"></span>
                                    </a>
                                    <div class="info">
                                        <span>{{ $realted_article->created_at->isoFormat('Do MMM, YYYY') }}</span>
                                        <h4 class="title usmall">
                                            <a
                                                href="{{ route('site.articles.article', ['slug' => $realted_article->slug]) }}">How
                                                {{ $article->translate(app()->getLocale())->title }}</a>
                                        </h4>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog Details Area -->
@endsection
@push('js')
    <script>
        $(document).on('submit', '.comment-form', function() {
            var form = $(this);
            var url = form.attr('action');
            var formData = new FormData(form[0]);
            form.find(":submit").attr('disabled', true).html(
                "{{ app()->getLocale() == 'en' ? 'Please wait' : 'برجاء الإنتظار' }} <span></span>");

            $.ajax({
                url: url,
                method: 'POST',
                dataType: 'json',
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    notification("success", response, "fas fa-check");
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);
                },
                error: function(jqXHR) {
                    var response = $.parseJSON(jqXHR.responseText);
                    notification("danger", response, "fas fa-times");
                    form.find(":submit").attr('disabled', false).html(
                        "{{ app()->getLocale() == 'en' ? 'Post A Comment' : 'إترك تعليقك' }}");
                }
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': $('input[name="_token"]').val()
                }
            });
            return false;
        });
    </script>
@endpush
