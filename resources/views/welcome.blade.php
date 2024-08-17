@extends('layouts.master')


@section('content')
    <!-- Banner Start -->
    <div class="banner relative z-1">
        <img src="{{ asset('assets/images/banner/element_1.png') }}" class="element_1" alt="Element">
        <img src="{{ asset('assets/images/banner/element_line.png') }}" class="element_line" alt="Element Line">
        <!-- Texts -->
        <div class="transform-center">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="text_box">
                            <h1 class="title wow fadeInUp" data-wow-delay=".30ms"><span>{{ __('Modern Life') }}</span>
                                {{ __('Coach School Podcast') }}</h1>
                            <p class="wow fadeInUp" data-wow-delay=".40ms">
                                {{ __('Sed ut perspiciatis unde omnis iste natus error voluptatem accan tium doloremque laudantium totam rem aperiam') }}
                            </p>
                            <a href="{{ route('courses') }}"
                                class="thm-btn bg-thm-color-two thm-color-two-shadow btn-rounded mr-4 mb-4 wow fadeInRight"
                                data-wow-delay=".50ms">{{ __('Get Coach') }}</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="image_box relative wow fadeInRight" data-wow-delay=".80ms">
                            <span class="bg-thm-color-three circle_element"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bottom Line -->
        <div class="bottom-line container"></div>
    </div>
@endsection
