@extends('adminlte::page')

@section('title', 'Empresas')

@section('content_header')
    <h1>Empresas <a href="{{ route('tenants.create') }}" class="btn btn-dark">Adicionar novo</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('tenants.search') }}" class="form form-inline" method="POST">
                @csrf
                <input type="text" name="filter" class="form-control" placeholder="Filtrar:" value="{{ $filters['filter'] ?? ''}}">
                <button type="submit" class="btn btn-dark">Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th style="width: 100px">Logo</th>
                        <th>Nome</th>                        
                        <th style="width: 150px">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tenants as $tenant)
                        <tr>                        
                            <td>
                                <img src="{{ url("storage/{$tenant->logo}") }}" alt="{{$tenant->name}}" style="max-width: 90px">
                            </td>
                            <td>{{$tenant->name}}</td>                            
                            <td style="width=10px">                                                                
                                <a href="{{ route('tenants.edit', $tenant->id) }}" class="btn btn-info">Editar</a>
                                <a href="{{ route('tenants.show', $tenant->id) }}" class="btn btn-warning">Ver</a>                                
                            </td>                    
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-footer">
                @if (isset($filters))
                    {!! $tenants->appends($filters)->links() !!}   
                @else
                    {!! $tenants->links() !!}
                @endif                
            </div>
        </div>
    </div>
@stop