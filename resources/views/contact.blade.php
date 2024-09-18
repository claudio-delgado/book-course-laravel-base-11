@extends('master')

@section('content')
    <h1>Hello world!</h1>
    <a href="{{ route("welcome") }}">CRUD</a>
    <ul>
    @foreach ([1, 2, 3, 4, 5] as $item)
        <li>{{ $item }}</li>
    @endforeach
    </ul>
@endsection
