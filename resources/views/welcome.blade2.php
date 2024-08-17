@php
   // Extract the video ID from the Vimeo URL
   preg_match('/vimeo\.com\/(\d+)/', $videoUrl, $matches);
   $videoId = $matches[1] ?? null;
@endphp

@if ($videoId)
   <div style="padding:75% 0 0 0;position:relative;">
       <iframe src="https://player.vimeo.com/video/{{ $videoId }}?badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479"
               frameborder="0" allow="autoplay; fullscreen; picture-in-picture; clipboard-write"
               style="position:absolute;top:0;left:0;width:100%;height:100%;"
               title="Video"></iframe>
   </div>
   <script src="https://player.vimeo.com/api/player.js"></script>
@else
   <p>Invalid Vimeo URL.</p>
@endif
