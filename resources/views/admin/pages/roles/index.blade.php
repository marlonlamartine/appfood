@extends('adminlte::page')

@section('title', 'Cargos')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('roles.index') }}">Cargos</a></li>
    </ol>

    <h1>Cargos <a href="{{ route('roles.create') }}" class="btn btn-dark"><i class="fas fa-plus-square"></i> Adicionar novo</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('roles.search') }}" class="form form-inline" method="POST">
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
                        <th style="width: 300px">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>                        
                            <td>{{$role->name}}</td>                                                  
                            <td style="width=10px">                                
                                <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-info">Editar</a>
                                <a href="{{ route('roles.show', $role->id) }}" class="btn btn-warning">Ver</a>
                                <a href="{{ route('roles.permissions', $role->id) }}" class="btn btn-warning"><i class="fas fa-lock"></i>Permissões</a>                                
                            </td>                    
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-footer">
                @if (isset($filters))
                    {!! $roles->appends($filters)->links() !!}   
                @else
                    {!! $roles->links() !!}
                @endif                
            </div>
        </div>
    </div>
@stop