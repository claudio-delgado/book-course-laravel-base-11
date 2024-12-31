@extends('blog.master')

@section('content')

{{--     <x-card class='bg-white' title='mi título'>
        Contenido dinámico
    </x-card>
    <x-card class='bg-yellow-100'>
        Otro contenido dinámico
    </x-card>
 --}}
   <x-blog.show :post="$post" title='TITULO' data-id='1' class='demo'/>
   <x-dynamic-component component='blog.show' title='TITULO' :post="$post"/>
{{-- 
    <div class="card card-white">
        <h1>{{$post->title}}</h1>
        <span>{{$post->category->title}}</span>

        <hr>

        {{ $post->content}}
    </div>
--}}

@endsection