@extends('dashboard.master')

@section('content')

    @include('dashboard.fragment._errors-form')

    <a href="{{ route('category.create') }}" target='_blank'>Nuevo registro</a>
    <table>
        <caption>Listado de categorías</caption>
        <thead>
            <tr>
                <th>Id</th>
                <th>Título</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->title}}</td>
                <td>
                    <a href="{{ route('category.show', $category) }}">Ver</a>
                    <a href="{{ route('category.edit', $category) }}">Editar</a>
                    <form action="{{ route('category.destroy', $category) }}" method='POST'>
                        @method('DELETE')
                        @csrf
                        <button type="submit">Eliminar</button>
                    </form>
                    
                </td> 
            </tr>    
            @endforeach
        </tbody>
    </table>

    {{ $categories->links() }}
@endsection