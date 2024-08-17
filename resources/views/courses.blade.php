@extends('layouts.master')

@section('css')
    <link href="{{ asset('assets/css/plugins/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/plugins/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/plugins/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/plugins/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/fonts/flaticon/flaticon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/fonts/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="relative subheader z-1" style="background-image: url(assets/images/subheader.jpg);">
        <div class="container relative z-1">
            <div class="row">
                <div class="col-12">
                    <h1 class="page_title">{{ __('NavCourses') }}</h1>
                </div>
            </div>
            <img src="{{ asset('assets/images/elements/element_19.png') }}" alt="element" class="element_1 slideRightTwo">
            <img src="{{ asset('assets/images/elements/element_10.png') }}" alt="element" class="element_2 zoom-fade">
            <img src="{{ asset('assets/images/elements/element_20.png') }}" alt="element" class="element_3 rotate_elem">
            <img src="{{ asset('assets/images/elements/element_21.png') }}" alt="element" class="element_4 rotate_elem">
        </div>
    </div>
    <!-- Subheader End -->
    <!-- Coach Grid Start -->
    <section class="section-padding">
        <div class="container">
            <div class="row">
                <!-- Coach block -->



                @isset($courses)
                    @foreach ($courses as $course)
                        <div class="col-xl-4 col-md-6" style="display: flex;flex-wrap: wrap; width: 100$ !important">
                            <div class="coach_block wow fadeInUp" data-wow-delay=".10ms">

                                <div class="coach_img">
                                    <img src="{{ asset('storage/' . $course->img) }}" alt="img" class="image-fit">

                                    <a href="{{ route('course.details', ['id' => $course->id]) }}"
                                        class="thm-btn thm-color-two bg-thm-color-white thm-color-two-shadow btn-circle link">
                                        <i class="fal fa-chevron-right"></i>
                                    </a>
                                </div>
                                <div class="coach_caption">
                                    <h5 class="title mb-xl-20">
                                        <a href="{{ route('course.details', ['id' => $course->id]) }}">
                                            {{ $course->title }} - <b
                                                style="color:#094309; font-weight: lighter">{{ $course->price }}$</b>
                                        </a>
                                    </h5>
                                    <a>
                                        {{ $course->description }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endisset()



                <!-- Coach block -->
            </div>
            <!-- Pagination -->
            <nav aria-label="Page navigation example" style="display:flex; justify-content: center; ">
                {{ $courses->links('pagination::bootstrap-4') }}
            </nav>
            <!-- Pagination -->
        </div>
    </section>
    <!-- Coach Grid End -->
@endsection
