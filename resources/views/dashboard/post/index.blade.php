@extends('dashboard.master')

@section('content')

    @include('dashboard.fragment._errors-form')

    <a class='btn btn-primary' href="{{ route('post.create') }}" target='_blank'>Nuevo registro</a>
    <table class='table'>
        <caption>Listado de posts</caption>
        <thead>
            <tr>
                <th>Id</th>
                <th>Título</th>
                <th>Categoría</th>
                <th>Posteado</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->category->title}}</td>
                <td>{{$post->posted}}</td>
                <td>
                    <a class='btn btn-success' href="{{ route('post.show', $post) }}">Ver</a>
                    <a class='btn btn-warning' href="{{ route('post.edit', $post) }}">Editar</a>
                    <form action="{{ route('post.destroy', $post) }}" method='POST'>
                        @method('DELETE')
                        @csrf
                        <button class='btn btn-danger' type="submit">Eliminar</button>
                    </form>
                    
                </td> 
            </tr>    
            @endforeach
        </tbody>
    </table>

    {{ $posts->links() }}
@endsection