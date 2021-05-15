@extends('adminlte::page')

@section('title', 'Detalhes do mesa')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin.home')}}">Home</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{route('mesa.index')}}">mesa</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{route('mesa.show', $mesa->id)}}"> {{ $mesa->nome }}</a>
        </li>
    </ol>
    <h1>Detalhes do mesa <strong>{{ $mesa->nome }}</strong></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome:</strong> {{ $mesa->nome }}
                </li>
                <li>
                    <strong>URL: </strong> {{ $mesa->url }}
                </li>
                <li>
                    <strong>Descrição:</strong> <br>{{ $mesa->descricao }}
                </li>
            </ul>
            @include('includes.alert')
            <form action="{{route('mesa.destroy', $mesa->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Deleta o mesa {{$mesa->nome}}</button>
            </form>
        </div>
    </div>
@stop
