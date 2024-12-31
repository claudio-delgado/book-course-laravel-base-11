<div class="card card-white">
    {{ $changeTitle() }}
    <h1>{{$post->title}}</h1>
    <span>{{$post->category->title}}</span>
    <hr>

    {{ $attributes->filter((function($value, $key) { 
        $a = 1;
        return $key == 'data-id'; })) 
    }}

    {{ $post->content}}
</div>