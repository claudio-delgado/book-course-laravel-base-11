@extends('dashboard.master')

@section('content')

        <p>
            <label for="">Title</label>
            <h1>{{$category->title}}</h1>
        </p>
        <p>
            <label for="">Slug</label>
            <span>{{$category->slug}}</span>
        </p>
    </form>
@endsection