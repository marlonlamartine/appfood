@extends('adminlte::page')

@section('title', 'Detalhes do usuário')

@section('content_header')
    <h1>Detalhes do usuário: <b>{{$user->name}}</b> </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong> Nome: {{$user->name}}</strong>
                </li>
                <li>
                    <strong> Email: {{$user->email}}</strong>
                </li>
                <li>
                    <strong> Empresa: {{$user->tenant->name}}</strong>
                </li>
            </ul>

            @include('admin.includes.alerts')
            
            <form action="{{ route('users.destroy', $user->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Deletar o usuário: {{$user->name}}</button>
            </form>
        </div>
    </div>
@stop