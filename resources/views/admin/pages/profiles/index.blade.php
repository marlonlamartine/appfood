@extends('adminlte::page')

@section('title', 'Perfis')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('profiles.index') }}">Perfis</a></li>
    </ol>

    <h1>Perfis <a href="{{ route('profiles.create') }}" class="btn btn-dark"><i class="fas fa-plus-square"></i> Adicionar novo</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('profiles.search') }}" class="form form-inline" method="POST">
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
                        <th style="width: 250px">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($profiles as $profile)
                        <tr>                        
                            <td>{{$profile->name}}</td>                                                  
                            <td style="width=10px">
                                {{-- <a href="{{ route('details.plan.index', $plan->url) }}" class="btn btn-primary">Detalhes</a> --}}
                                <a href="{{ route('profiles.edit', $profile->id) }}" class="btn btn-info">Editar</a>
                                <a href="{{ route('profiles.show', $profile->id) }}" class="btn btn-warning">Ver</a>
                            </td>                    
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-footer">
                @if (isset($filters))
                    {!! $profiles->appends($filters)->links() !!}   
                @else
                    {!! $profiles->links() !!}
                @endif                
            </div>
        </div>
    </div>
@stop