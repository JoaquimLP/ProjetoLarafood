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
            <a href="{{route('empresa.show', $empresa->id)}}"> {{ $empresa->titulo }}</a>
        </li>
    </ol>
    <h1>Detalhes do Empresa <strong>{{ $empresa->titulo }}</strong></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <img src="{{url("storage/{$empresa->image}")}}" alt="{{$empresa->image}}" class="imageEmpresa" style="width: 100px; height: 100px;">
                <li>
                    <strong>Nome:</strong> {{ $empresa->titulo }}
                </li>
                <li>
                    <strong>URL: </strong> {{ $empresa->flag }}
                </li>
                <li>
                    <strong>Descrição:</strong> <br>{{ $empresa->descricao }}
                </li>
            </ul>
            @include('includes.alert')
            <form action="{{route('empresa.destroy', $empresa->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Deleta o empresa {{$empresa->titulo}}</button>
            </form>
        </div>
    </div>
@stop
