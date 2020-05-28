@extends('adminlte::page')

@section('title', "Detalhes do perfil {$profile->name}")

@section('content_header')
    <h1>Detalhes do perfil: <b>{{$profile->name}}</b> </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong> Nome: {{$profile->name}}</strong>
                </li>                
                <li>
                    <strong> Descrição: {{$profile->description}}</strong>
                </li>
            </ul>

            @include('admin.includes.alerts')
            
            <form action="{{ route('profiles.destroy', $profile->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Deletar o plano: {{$profile->name}}</button>
            </form>
        </div>
    </div>
@stop