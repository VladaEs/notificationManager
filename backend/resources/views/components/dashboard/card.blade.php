 @props(['postId'=> 0])
 
 <a href="{{ route('eventPost', ['id'=> $postId]) }}" >
    <div  {{ $attributes->merge([
        'class'=> "card" 
    ]) }}>
                {{ $slot }}
    </div>
</a>