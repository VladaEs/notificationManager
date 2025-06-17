 @props(['postId'=> 0])
 
 <a href="{{ route('eventPost', ['id'=> $postId]) }}">
    <div class="card">
               {{ $slot }}
    </div>
</a>