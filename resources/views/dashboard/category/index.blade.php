@extends('dashboard.master')

@section('content')

    @include('dashboard.fragment._errors-form')
    <a href="{{ route('category.create') }}" target='_blank' class="btn btn-primary">
        Nuevo registro
    </a>
    <table class='table'>
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
                    
                    <form action="{{ route('category.destroy', $category) }}" method='POST'>
                        @method('DELETE')
                        @csrf
                        <a class='btn btn-success' href="{{ route('category.show', $category) }}">Ver</a>
                        <a class='btn btn-warning' href="{{ route('category.edit', $category) }}">Editar</a>
                        <button type="submit" class='btn btn-danger'>Eliminar</button>
                    </form>
                    
                </td> 
            </tr>    
            @endforeach
        </tbody>
    </table>

    {{ $categories->links() }}
@endsection