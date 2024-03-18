<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'en' ? 'ltr' : 'rtl' }}">
@include('site.layouts.head')

<body>
    <!-- Start Preloader Area -->
    <div class="preloader">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="lds-spinner">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Preloader Area -->

    <div class="mouse-cursor cursor-outer"></div>
    <div class="mouse-cursor cursor-inner"></div>
    <!-- Start Header Area -->
    @include('site.layouts.header')
    <!-- End Header Area -->
    <!-- Sidebar Modal -->
    @include('site.layouts.models')
    <!-- End Sidebar Modal -->
    @yield('content')
    <!-- End Footer Area -->
    @include('site.layouts.footer')
    <!-- End Footer Area -->

    <!-- Start Go Top Area -->
    <div class="go-top">
        <i class="ri-arrow-up-s-line"></i>
    </div>
    <!-- End Go Top Area -->

    <!-- Links of JS files -->
    @include('site.layouts.scripts')
</body>

</html>
