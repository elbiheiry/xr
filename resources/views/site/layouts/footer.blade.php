<footer class="footer-area with-black-background pt-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-6">
                <div class="single-footer-widget" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500"
                    data-aos-once="true">
                    <div class="widget-logo">
                        <a href="{{ route('site.index') }}"><img src="{{ surl('images/logo.png') }}"
                                alt="image" /></a>
                    </div>
                    <p>
                        {{ $settings->translate(app()->getLocale())->description }}
                    </p>
                    <ul class="widget-social">
                        @foreach ($social_links as $link)
                            <li>
                                <a href="{{ $link->link }}" target="_blank">
                                    {!! $link->icon !!}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="single-footer-widget ps-5" data-aos="fade-up" data-aos-delay="70" data-aos-duration="700"
                    data-aos-once="true">
                    <h3>XR {{ __('layouts.solutions') }}</h3>
                    <ul class="quick-links">
                        @foreach ($services as $service)
                            <li>
                                <a href="{{ route('site.solution', ['slug' => $service->slug]) }}">{{ $service->translate(app()->getLocale())->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="single-footer-widget ps-5" data-aos="fade-up" data-aos-delay="60" data-aos-duration="600"
                    data-aos-once="true">
                    <h3>{{ __('layouts.quick') }}</h3>
                    <ul class="quick-links">
                        <li><a href="{{ route('site.about.index') }}">{{ __('layouts.who_we_are') }} </a></li>
                        <li><a href="{{ route('site.about.partners') }}"> {{ __('layouts.partners') }} </a></li>
                        <li><a href="{{ route('site.articles.index') }}">{{ __('layouts.articles') }} </a></li>
                        <li><a href="{{ route('site.team') }}"> {{ __('layouts.team') }}</a></li>
                        <li><a href="{{ route('site.contact') }}">{{ __('layouts.contact_header') }}</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="single-footer-widget" data-aos="fade-up" data-aos-delay="80" data-aos-duration="800"
                    data-aos-once="true">
                    <h3>{{ __('layouts.newsletter') }}</h3>
                    <form class="newsletter-form" method="post" action="{{ route('site.subscribe') }}">
                        @csrf
                        @method('post')
                        <input type="email" class="input-newsletter" placeholder="{{ __('layouts.email') }}"
                            name="email" autocomplete="off" />
                        <button type="submit" class="default-btn">{{ __('layouts.subscribe') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-area">
        <div class="container">
            <div class="copyright-area-content">
                @if (app()->getLocale() == 'en')
                    <p>Copyright @ 2022 Newlevel XR All Rights Reserved</p>
                @else
                    <p>حقوق النشر @ 2022 Newlevel XR جميع الحقوق محفوظة</p>
                @endif
            </div>
        </div>
    </div>
</footer>
@push('js')
    <script>
        //submit form using ajax
        $(document).on('submit', '.newsletter-form', function() {
            var form = $(this);
            var url = form.attr('action');
            var formData = new FormData(form[0]);
            form.find(":submit").attr('disabled', true).html("{{ __('form.wait') }}");

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
                        "{{ __('layouts.subscribe') }}");
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
