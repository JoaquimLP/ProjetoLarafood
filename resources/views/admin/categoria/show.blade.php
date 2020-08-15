@extends('adminlte::page')

@section('title', 'Detalhes do categoria')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin.home')}}">Home</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{route('categoria.index')}}">categoria</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{route('categoria.show', $categoria->id)}}"> {{ $categoria->nome }}</a>
        </li>
    </ol>
    <h1>Detalhes do categoria <strong>{{ $categoria->nome }}</strong></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome:</strong> {{ $categoria->nome }}
                </li>
                <li>
                    <strong>URL: </strong> {{ $categoria->url }}
                </li>
                <li>
                    <strong>Descrição:</strong> <br>{{ $categoria->descricao }}
                </li>
            </ul>
            @include('includes.alert')
            <form action="{{route('categoria.destroy', $categoria->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Deleta o categoria {{$categoria->nome}}</button>
            </form>
        </div>
    </div>
@stop