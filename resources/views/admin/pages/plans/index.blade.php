@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Planos <a href="{{ route('plans.create') }}" class="btn btn-dark"><i class="fas fa-plus-square"></i> Adicionar novo</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('plans.search') }}" class="form form-inline" method="POST">
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
                        <th>Preço</th>
                        <th style="width: 300px">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($plans as $plan)
                        <tr>                        
                            <td>{{$plan->name}}</td>
                            <td>R$ {{number_format($plan->price, 2, ',', '.')}}</td>                            
                            <td style="width=10px">
                                <a href="{{ route('details.plan.index', $plan->url) }}" class="btn btn-primary">Detalhes</a>
                                <a href="{{ route('plans.edit', $plan->url) }}" class="btn btn-info">Editar</a>
                                <a href="{{ route('plans.show', $plan->url) }}" class="btn btn-warning">Ver</a>
                                <a href="{{ route('plans.profiles', $plan->id) }}" class="btn btn-warning"><i class="fas fa-address-book"></i></a>
                            </td>                    
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-footer">
                @if (isset($filters))
                    {!! $plans->appends($filters)->links() !!}   
                @else
                    {!! $plans->links() !!}
                @endif                
            </div>
        </div>
    </div>
@stop