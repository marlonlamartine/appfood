@extends('adminlte::page')

@section('title', 'Detalhes da Mesa')

@section('content_header')
    <h1>Detalhes da Mesa: <b>{{$table->identify}}</b> </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong> Identificador da Mesa: {{$table->identify}}</strong>
                </li>                
                <li>
                    <strong> Descrição: {{$table->description}}</strong>
                </li>
            </ul>

            @include('admin.includes.alerts')
            
            <form action="{{ route('tables.destroy', $table->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Deletar a mesa: {{$table->identify}}</button>
            </form>
        </div>
    </div>
@stop