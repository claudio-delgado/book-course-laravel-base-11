@extends('blog.master')

@section('content')
    <x-blog.post.index :posts='$posts'>
        Post List
       
        @slot('extra', 'Extras')
       
        @slot('footer')
            El footer
        @endslot
    </x-blog.post.index>
@endsection