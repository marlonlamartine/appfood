@extends('adminlte::page')

@section('title', 'Mesas')

@section('content_header')
    <h1>Mesas <a href="{{ route('tables.create') }}" class="btn btn-dark">Adicionar novo</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('tables.search') }}" class="form form-inline" method="POST">
                @csrf
                <input type="text" name="filter" class="form-control" placeholder="Filtrar:" value="{{ $filters['filter'] ?? ''}}">
                <button type="submit" class="btn btn-dark">Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Identificador</th>
                        <th>Descrição</th>
                        <th style="width: 150px">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tables as $table)
                        <tr>                        
                            <td>{{$table->identify}}</td>
                            <td>{{$table->description}}</td>
                            <td style="width=10px">                                
                                <a href="{{ route('tables.edit', $table->id) }}" class="btn btn-info">Editar</a>
                                <a href="{{ route('tables.show', $table->id) }}" class="btn btn-warning">Ver</a>                                
                            </td>                    
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-footer">
                @if (isset($filters))
                    {!! $tables->appends($filters)->links() !!}   
                @else
                    {!! $tables->links() !!}
                @endif                
            </div>
        </div>
    </div>
@stop