@extends('adminlte::page')

@section('title', "Editar {$table->identify}")

@section('content_header')
    <h1>Editar {{$table->identify}}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('tables.update', $table->id) }}" class="form" method="POST">
                @method('PUT')
                @include('admin.pages.tables._partials.form')                
            </form>
        </div>
    </div>
@stop