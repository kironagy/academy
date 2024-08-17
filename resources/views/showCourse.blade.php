@extends('layouts.master')

@section('content')
    <!-- Subheader End -->

    <!-- Details Start -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="" style="max-width: auto !important; width:100%">
                    <div class="course_details mb-md-80 wow fadeInDown">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="description">
                                <div class="desc_box">
                                    <h2 class="title">{{ $course->title }}</h2>
                                    <div id="videoPlayerContainer" class="mt-3">
                                        @php
                                            // الحصول على ID الفيديو الأول في القائمة لعرضه بشكل تلقائي عند تحميل الصفحة
                                            preg_match('/vimeo\.com\/(\d+)/', $course->video_url, $matches);
                                            $firstVideoId = $matches[1] ?? null;
                                        @endphp
                                        @if ($firstVideoId)
                                            <div style="position:relative; padding-top:56.25%; height: 0;">
                                                <iframe id="vimeoPlayer"
                                                    src="https://player.vimeo.com/video/{{ $firstVideoId }}?badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479"
                                                    frameborder="0"
                                                    allow="autoplay; fullscreen; picture-in-picture; clipboard-write"
                                                    style="position:absolute; top:0; left:0; width:100%; height:100%;"
                                                    title="Video"></iframe>
                                            </div>
                                            <script src="https://player.vimeo.com/api/player.js"></script>
                                        @else
                                            <p>Invalid Vimeo URL.</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-10">
            <div class="col-lg-8 mb-md-80">
                <h5 class="m-10">People Comments</h5>
                <form action="{{ route('add.comment', ['id' => $course->id]) }}" method="POST" class="mb-5">
                    @csrf
                    <textarea name="comment" rows="5" name="#" placeholder="Write Message"
                        class="form-control form-control-custom style_1 mb-4" autocomplete="off"></textarea>
                    <button type="submit" class="thm-btn bg-thm-color-three thm-color-three-shadow btn-rectangle">Send
                        Comment
                        <i class="fal fa-chevron-right ml-2"></i></button>
                </form>

                <ul class="comments mb-xl-30">
                    @isset($comments)
                        @foreach ($comments as $comment)
                            <li class="comment" style="width: 100%">
                                <div class="comment_img">
                                    <img src="https://ui-avatars.com/api/?name={{ $comment->user->name }}&color=7F9CF5&background=EBF4FF"
                                        alt="img" class="image-fit">
                                </div>
                                <div class="comment_text">
                                    <h6 class="mb-0">{{ $comment->user->name }}</h6>
                                    <p class="comment_date">{{ date('d-m - H:m A', strtotime($course->created_at)) }}</p>
                                    <p class="mb-0">{{ $comment->comment }}</p>
                                </div>
                            </li>
                        @endforeach
                    @endisset

                </ul>
            </div>
        </div>

    </section>
@endsection

<script>
    function playVideo(videoId) {
        const playerContainer = document.getElementById('vimeoPlayer');
        playerContainer.src =
            `https://player.vimeo.com/video/${videoId}?badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479`;
    }
</script>
