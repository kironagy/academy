@extends('layouts.master')



@section('content')
    <div class="subheader relative z-1" style="background-image: url(assets/images/subheader.jpg);">
        <div class="container relative z-1">
            <div class="row">
                <div class="col-12">
                    <h1 class="page_title">{{ __('Course Details') }}</h1>

                </div>
            </div>
            <img src="{{ asset('assets/images/elements/element_19.png') }}" alt="element" class="element_1 slideRightTwo">
            <img src="{{ asset('assets/images/elements/element_10.png') }}" alt="element" class="element_2 zoom-fade">
            <img src="{{ asset('assets/images/elements/element_20.png') }}" alt="element" class="element_3 rotate_elem">
            <img src="{{ asset('assets/images/elements/element_21.png') }}" alt="element" class="element_4 rotate_elem">
        </div>
    </div>
    <!-- Subheader End -->
    <!-- Details Start -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="course_details mb-md-80 wow fadeInDown">
                        <ul class="nav nav-tabs style_4">
                            <li class="nav-item">
                                <a href="#description" class="nav-link active" data-toggle="tab">{{ __('Description') }}</a>
                            </li>

                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="description">
                                <div class="desc_box">
                                    <h2 class="title">{{ $course->title }}</h2>

                                    <div class="detail_img mb-xl-30">
                                        <img src="{{ asset('storage/' . $course->img) }}" alt="img" class="image-fit">
                                    </div>
                                    <p>
                                        {!! $course->content !!}
                                    </p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="curriculum">
                                <h5>Why You Learn In Coach</h5>
                                <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
                                    consequuntur magni dolores eos quirati voluptatem sequi nesciunt. Neque porro quisquam
                                    est qui dolorem ipsum quia dolor sit aconsece tuadipisci velit, sed quia non numquam
                                    eius modi tempora incidunt ut labore et dolore magnam </p>
                                <ul class="about_list style_2">
                                    <li>
                                        Business Consulting
                                    </li>
                                    <li>
                                        Career Development
                                    </li>
                                    <li>
                                        Financial Solutions
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar">
                        <div class="sidebar_widget info_widgets wow fadeInUp">
                            <ul>
                                <li class="active">
                                    <div class="left-side">
                                        <i class="fal fa-usd-circle"></i>
                                        <h6 class="mb-0">{{ __('Course Price') }}</h6>
                                    </div>
                                    <div class="right-side">
                                        ${{ $course->price }}
                                    </div>
                                </li>

                            </ul>
                            <hr>
                            <cite class="mb-xl-20">{{ __('Pay Course Now') }} </cite>
                            <a href="{{ route('checkout', ['course' => $course->id]) }}"
                                class="thm-btn bg-thm-color-three thm-color-three-shadow btn-rectangle">{{ __('Enroll Now') }}</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
