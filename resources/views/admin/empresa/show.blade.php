@extends('adminlte::page')

@section('title', 'Detalhes do Empresa')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin.home')}}">Home</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{route('empresa.index')}}">empresa</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{route('empresa.show', $empresa->id)}}"> {{ $empresa->nome }}</a>
        </li>
    </ol>
    <h1>Detalhes do Empresa <strong>{{ $empresa->nome }}</strong></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <img src="{{url("storage/{$empresa->logo}")}}" alt="{{$empresa->logo}}" class="imageEmpresa" style="width: 100px; height: 100px;">
                <li>
                    <strong>Nome:</strong> {{ $empresa->nome }}
                </li>
                <li>
                    <strong>URL: </strong> {{ $empresa->url }}
                </li>
                <li>
                    <strong>cnpj:</strong>{{ $empresa->cnpj }}
                </li>
            </ul>
            @include('includes.alert')
            <form action="{{route('empresa.destroy', $empresa->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Deleta o empresa {{$empresa->nome}}</button>
            </form>
        </div>
    </div>
@stop
