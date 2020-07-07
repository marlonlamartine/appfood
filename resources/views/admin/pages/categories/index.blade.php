@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
    <h1>Categorias <a href="{{ route('categories.create') }}" class="btn btn-dark">Adicionar novo</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('categories.search') }}" class="form form-inline" method="POST">
                @csrf
                <input type="text" name="filter" class="form-control" placeholder="Filtrar:" value="{{ $filters['filter'] ?? ''}}">
                <button type="submit" class="btn btn-dark">Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th style="width: 150px">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>                        
                            <td>{{$category->name}}</td>
                            <td>{{$category->description}}</td>
                            <td style="width=10px">                                
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-info">Editar</a>
                                <a href="{{ route('categories.show', $category->id) }}" class="btn btn-warning">Ver</a>                                
                            </td>                    
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-footer">
                @if (isset($filters))
                    {!! $categories->appends($filters)->links() !!}   
                @else
                    {!! $categories->links() !!}
                @endif                
            </div>
        </div>
    </div>
@stop