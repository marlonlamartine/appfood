@extends('adminlte::page')

@section('title', 'Produtos')

@section('content_header')
    <h1>Produtos <a href="{{ route('products.create') }}" class="btn btn-dark">Adicionar novo</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('products.search') }}" class="form form-inline" method="POST">
                @csrf
                <input type="text" name="filter" class="form-control" placeholder="Filtrar:" value="{{ $filters['filter'] ?? ''}}">
                <button type="submit" class="btn btn-dark">Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th style="max-width: 90px">Imagem</th>
                        <th>Título</th>
                        <th>Preço</th>
                        <th style="width: 150px">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>                        
                            <td>
                                <img src="{{ url("storage/{$product->image}") }}" alt="{{$product->title}}" style="max-width: 90px">
                            </td>
                            <td>{{$product->title}}</td>
                            <td>{{$product->price}}</td>
                            <td style="width=10px">                                
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-info">Editar</a>
                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-warning">Ver</a>                                
                            </td>                    
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-footer">
                @if (isset($filters))
                    {!! $products->appends($filters)->links() !!}   
                @else
                    {!! $products->links() !!}
                @endif                
            </div>
        </div>
    </div>
@stop