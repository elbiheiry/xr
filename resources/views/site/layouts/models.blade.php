<div class="sidebarModal modal right fade" id="sidebarModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-bs-dismiss="modal">
                <i class="ri-close-line"></i>
            </button>
            <div class="modal-body">
                <a href="{{ route('site.index') }}">
                    <img src="{{ surl('images/logo.png') }}" class="black-logo" alt="image" />
                </a>
                <div class="sidebar-content">
                    <h3>{{ __('layouts.about') }}</h3>
                    <p>
                        {{ $settings->translate(app()->getLocale())->description }}
                    </p>
                    <div class="sidebar-btn">
                        <a href="" class="default-btn">{{ __('layouts.talk') }}</a>
                    </div>
                </div>
                <div class="sidebar-contact-info">
                    <h3>{{ __('layouts.contact') }}</h3>
                    <ul class="info-list">
                        <li>
                            <i class="ri-phone-fill"></i>
                            <a href="tel:{{ $settings->phone }}"> {{ $settings->phone }}</a>
                        </li>
                        <li>
                            <i class="ri-mail-line"></i>
                            <a href="mailto:{{ $settings->email }}">{{ $settings->email }}</a>
                        </li>
                        <li>
                            <i class="ri-map-pin-line"></i> {{ $settings->translate(app()->getLocale())->address }}
                        </li>
                    </ul>
                </div>
                <ul class="sidebar-social-list">
                    @foreach ($social_links as $link)
                        <li>
                            <a href="{{ $link->link }}" target="_blank">
                                {!! $link->icon !!}
                            </a>
                        </li>
                    @endforeach
                </ul>
                <div class="contact-form">
                    <h3>{{ __('layouts.ready') }}</h3>
                    <form id="contactForm" class="contact-form" method="post"
                        action="{{ route('site.contact.store') }}">
                        @csrf
                        @method('post')
                        <div class="row">
                            <div class="col-lg-12 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control"
                                        placeholder="{{ __('form.name') }}" />
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-6">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control"
                                        placeholder="{{ __('form.email') }}" />
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <input type="text" name="phone" class="form-control"
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
@stack('models')
@push('js')
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script>
        $(document).on('submit', '.contact-form', function() {
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
                        "{{ __('layouts.send') }} <span></span>");
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
