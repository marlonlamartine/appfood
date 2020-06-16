@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
    <h1>Usuários <a href="{{ route('users.create') }}" class="btn btn-dark"><i class="fas fa-plus-square"></i> Adicionar novo</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('users.search') }}" class="form form-inline" method="POST">
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
                        <th>Email</th>
                        <th style="width: 300px">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>                        
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td style="width=10px">                                
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info">Editar</a>
                                <a href="{{ route('users.show', $user->id) }}" class="btn btn-warning">Ver</a>                                
                            </td>                    
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-footer">
                @if (isset($filters))
                    {!! $users->appends($filters)->links() !!}   
                @else
                    {!! $users->links() !!}
                @endif                
            </div>
        </div>
    </div>
@stop