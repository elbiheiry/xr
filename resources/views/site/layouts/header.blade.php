<header class="main-header-area">
    <!-- Start Navbar Area -->
    <div class="navbar-area">
        <div class="main-responsive-nav">
            <div class="container">
                <div class="main-responsive-menu">
                    <div class="logo">
                        <a href="{{ route('site.index') }}">
                            <img src="{{ surl('images/logo.png') }}" alt="image" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-navbar">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-md navbar-light">
                    <a class="navbar-brand" href="{{ route('site.index') }}">
                        <img src="{{ surl('images/logo.png') }}" alt="image" />
                    </a>
                    <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a href="{{ route('site.index') }}"
                                    class="nav-link {{ request()->routeIs('site.index') ? 'active' : '' }}">
                                    {{ __('layouts.home') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#"
                                    class="nav-link {{ request()->routeIs('site.about.index') || request()->routeIs('site.about.partners') ? 'active' : '' }}">
                                    {{ __('layouts.about') }}
                                    <i class="ri-arrow-down-s-line"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a href="{{ route('site.about.index') }}" class="nav-link">
                                            {{ __('layouts.who_we_are') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('site.about.partners') }}" class="nav-link">
                                            {{ __('layouts.partners') }}</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    XR {{ __('layouts.solutions') }}
                                    <i class="ri-arrow-down-s-line"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    @foreach ($services as $service)
                                        <li class="nav-item">
                                            <a href="{{ route('site.solution', ['slug' => $service->slug]) }}"
                                                class="nav-link">{{ $service->translate(app()->getLocale())->title }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('site.articles.index') }}"
                                    class="nav-link {{ request()->routeIs('site.articles.index') || request()->routeIs('site.articles.article') ? 'active' : '' }}">{{ __('layouts.articles') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('site.team') }}"
                                    class="nav-link {{ request()->routeIs('site.team') ? 'active' : '' }}">{{ __('layouts.team') }}</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('site.contact') }}"
                                    class="nav-link {{ request()->routeIs('site.contact') ? 'active' : '' }}">{{ __('layouts.contact_header') }}</a>
                            </li>
                            <li class="nav-item">
                                @if (app()->getLocale() == 'en')
                                    <a href="{{ LaravelLocalization::getLocalizedURL('ar') }}"
                                        class="lang nav-link"> AR </a>
                                @else
                                    <a href="{{ LaravelLocalization::getLocalizedURL('en') }}"
                                        class="lang nav-link"> EN </a>
                                @endif

                            </li>
                        </ul>
                        <div class="others-options d-flex align-items-center">
                            <div class="option-item">
                                <div class="side-menu-btn">
                                    <i class="ri-bar-chart-horizontal-line" data-bs-toggle="modal"
                                        data-bs-target="#sidebarModal"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <div class="others-option-for-responsive">
            <div class="container">
                <div class="dot-menu">
                    <div class="inner">
                        <div class="circle circle-one"></div>
                        <div class="circle circle-two"></div>
                        <div class="circle circle-three"></div>
                    </div>
                </div>
                <div class="container">
                    <div class="option-inner">
                        <div class="others-options d-flex align-items-center">
                            <div class="option-item">
                                <i class="search-btn ri-search-line"></i>
                                <i class="close-btn ri-close-line"></i>
                                <div class="search-overlay search-popup">
                                    <div class="search-box">
                                        <form class="search-form">
                                            <input class="search-input" placeholder="Search..." type="text" />
                                            <button class="search-button" type="submit">
                                                <i class="ri-search-line"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="option-item">
                                <div class="side-menu-btn">
                                    <i class="ri-bar-chart-horizontal-line" data-bs-toggle="modal"
                                        data-bs-target="#sidebarModal"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Navbar Area -->
</header>
