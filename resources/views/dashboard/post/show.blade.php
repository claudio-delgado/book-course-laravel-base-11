@extends('dashboard.master')

@section('content')

        <p>
            <label for="">Title</label>
            <h1>{{$post->title}}</h1>
        </p>
        <p>
            <label for="">Slug</label>
            <span>{{$post->slug}}</span>
        </p>
        <p>
            <label for="">Content</label>
            <span>{{$post->content}}</span>
        </p>
        <p>
            <label for="">Category</label>
            <span>{{$post->category->title}}</span>
        </p>
        <p>
            <label for="">Description</label>
            <span>{{$post->description}}</span>
        </p>
        <p>
            <label for="">Posted</label>
            <span>{{$post->posted}}</span>
        </p>
        <p><img src="{{ "/uploads/posts/$post->image" }}" style="width:250px" height=""/></p>
    </form>
@endsection