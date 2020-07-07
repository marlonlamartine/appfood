@extends('adminlte::page')

@section('title', 'Detalhes da Categoria')

@section('content_header')
    <h1>Detalhes da Categoria: <b>{{$category->name}}</b> </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong> Nome: {{$category->name}}</strong>
                </li>
                <li>
                    <strong> URL: {{$category->url}}</strong>
                </li>
                <li>
                    <strong> Descrição: {{$category->description}}</strong>
                </li>
            </ul>

            @include('admin.includes.alerts')
            
            <form action="{{ route('categories.destroy', $category->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Deletar a categoria: {{$category->name}}</button>
            </form>
        </div>
    </div>
@stop