@extends('adminlte::page')

@section('title', 'Detalhes do plano')

@section('content_header')
    <h1>Detalhes do plano: <b>{{$plan->name}}</b> </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong> Nome: {{$plan->name}}</strong>
                </li>
                <li>
                    <strong> URL: {{$plan->url}}</strong>
                </li>
                <li>
                    <strong> Preço: {{$plan->price}}</strong>
                </li>
                <li>
                    <strong> Descrição: {{$plan->description}}</strong>
                </li>
            </ul>
            <form action="{{ route('plans.destroy', $plan->url)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Deletar o plano: {{$plan->name}}</button>
            </form>
        </div>
    </div>
@stop