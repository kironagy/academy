<aside class="aside_bar aside_bar_left aside_mobile">
    <nav class="mt-4">
        <ul class="main-menu">
            @if (Auth::user())
                <li class="menu-item m-0 p-0">
                    <a href="{{ route('profile.show') }}">
                        <img class="m-0 p-0" style="width: 40px; height:auto; border-radius:20px"
                            src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    </a>
                </li>
                <li class="menu-item ">
                    <a href="{{ route('myCourses') }}">My Courses</a>
                </li>
            @else
                <li class="menu-item ">
                    <a href="{{ route('login') }}">Login</a>
                </li>
                <li class="menu-item ">
                    <a href="{{ route('register') }}">Register</a>
                </li>
            @endif
            <li class="menu-item ">
                <a href="#">Home</a>
            </li>
            <li class="menu-item ">
                <a href="#">Courses</a>
            </li>
            <li class="menu-item ">
                <a href="/posts">Blog</a>
            </li>

            <li class="menu-item dropdown">
                <a href="#" class="dropdown-toggle">Language</a>
                <ul class="dropdown-menu">
                    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <li>
                            <a rel="alternate" hreflang="{{ $localeCode }}"
                                href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                {{ $properties['native'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>
        </ul>
    </nav>
    <!-- Menu -->
</aside>


<header class="header header-absolute can-sticky">
    <div class="container">
        <!-- inner -->
        <div class="nav_warp">
            <nav>

                <!-- logo end -->
                <!-- Navigation Start -->
                <ul class="main-menu">
                    <li class="menu-item">
                        <a href="/">{{ __('NavHome') }}</a>
                    </li>
                    <li class="menu-item ">
                        <a href="{{ route('courses') }}">{{ __('NavCourses') }}</a>
                    </li>
                    <li class="menu-item ">
                        <a href="/posts">{{ __('NavBlog') }}</a>
                    </li>
                    @if (Auth::user())
                        <li class="menu-item ">
                            <a href="{{ route('myCourses') }}">{{ __('NavMy Courses') }}</a>
                        </li>
                        <li class="menu-item m-0 p-0">
                            <a href="{{ route('profile.show') }}">
                                <img class="m-0 p-0" style="width: 30px; height:auto; border-radius:20px"
                                    src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            </a>
                        </li>
                    @else
                        <li class="menu-item ">
                            <a href="{{ route('login') }}">{{ __('NavLogin') }}</a>
                        </li>
                        <li class="menu-item ">
                            <a href="{{ route('register') }}">{{ __('NavRegister') }}</a>
                        </li>
                    @endif

                    <li class="menu-item dropdown">
                        <a href="#" class="">{{ __('Language') }}</a>
                        <ul class="dropdown-menu">
                            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <li>
                                    <a rel="alternate" hreflang="{{ $localeCode }}"
                                        href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                        {{ $properties['native'] }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>

                </ul>
                <!-- Navigation Ens -->
            </nav>
            <!-- Head Actions -->
            <div class="head_actions">

                <button type="button" class="head_trigger mobile_trigger">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
            <!-- Head Actions -->
        </div>
        <!-- inner -->
    </div>
</header>
<style>
    /* Style for the dropdown menu */
    .menu-item.dropdown {
        position: relative;
    }

    .menu-item.dropdown .dropdown-menu {
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        background: white;
        border: 1px solid #ddd;
        list-style: none;
        padding: 0;
        margin: 0;
        z-index: 1000;
    }

    .menu-item.dropdown:hover .dropdown-menu {
        display: block;
    }

    .dropdown-menu li {
        padding: 10px;
    }

    .dropdown-menu li a {
        text-decoration: none;
        color: black;
        display: block;
    }

    .dropdown-menu li a:hover {
        background: #f5f5f5;
    }
</style>
