@extends('adminlte::page')

@section('title', 'Detalhes do Produto')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin.home')}}">Home</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{route('produto.index')}}">produto</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{route('produto.show', $produto->id)}}"> {{ $produto->titulo }}</a>
        </li>
    </ol>
    <h1>Detalhes do Produto <strong>{{ $produto->titulo }}</strong></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <img src="{{url("storage/{$produto->image}")}}" alt="{{$produto->image}}" class="imageProduto" style="width: 100px; height: 100px;">
                <li>
                    <strong>Nome:</strong> {{ $produto->titulo }}
                </li>
                <li>
                    <strong>URL: </strong> {{ $produto->flag }}
                </li>
                <li>
                    <strong>Descrição:</strong> <br>{{ $produto->descricao }}
                </li>
            </ul>
            @include('includes.alert')
            <form action="{{route('produto.destroy', $produto->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Deleta o produto {{$produto->titulo}}</button>
            </form>
        </div>
    </div>
@stop