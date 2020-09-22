@extends('adminlte::page')

@section('title', 'Detalhes do Produto')

@section('content_header')
    <h1>Detalhes do Produto: <b>{{$tenant->name}}</b> </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <img src="{{ url("storage/{$tenant->logo}") }}" alt="{{$tenant->name}}" style="max-width: 150px">
                <li>
                    <strong> Plano: {{$tenant->plan->name}}</strong>
                </li>
                <li>
                    <strong> URL: {{$tenant->url}}</strong>
                </li>
                <li>
                    <strong> Email: {{$tenant->email}}</strong>
                </li>
                <li>
                    <strong>CNPJ: {{$tenant->cnpj}}</strong>
                </li>
                <li>
                    <strong>Ativo: {{$tenant->active == 'Y' ? 'SIM' : 'NÃO'}}</strong>
                </li>
            </ul>
            <hr>
            <h3>Assinatura</h3>
            <ul>
                <li>
                    <strong>Data Assinatura: {{$tenant->subscription}}</strong>
                </li>
                <li>
                    <strong>Data expira: {{$tenant->expires_at}}</strong>
                </li>
                <li>
                    <strong>Identificador: {{$tenant->subscription_id}}</strong>
                </li>                
                <li>
                    <strong>Ativo? {{$tenant->subscription_active == 'Y' ? 'SIM' : 'NÃO'}}</strong>
                </li>
                <li>
                    <strong>Cancelou? {{$tenant->subscription_suspended == 'Y' ? 'SIM' : 'NÃO'}}</strong>
                </li>
            </ul>

            @include('admin.includes.alerts')
            
            
        </div>
    </div>
@stop