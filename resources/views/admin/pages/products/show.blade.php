@extends('adminlte::page')

@section('title', 'Detalhes do Produto')

@section('content_header')
    <h1>Detalhes do Produto: <b>{{$product->name}}</b> </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <img src="{{ url("storage/{$product->image}") }}" alt="{{$product->title}}" style="max-width: 150px">
                <li>
                    <strong> Título: {{$product->title}}</strong>
                </li>
                <li>
                    <strong> Flag: {{$product->flag}}</strong>
                </li>
                <li>
                    <strong> Descrição: {{$product->description}}</strong>
                </li>
            </ul>

            @include('admin.includes.alerts')
            
            <form action="{{ route('products.destroy', $product->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Deletar o produto: {{$product->title}}</button>
            </form>
        </div>
    </div>
@stop