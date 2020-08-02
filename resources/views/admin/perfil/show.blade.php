@extends('adminlte::page')

@section('title', 'Detalhes do Perfil')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin.home')}}">Home</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{route('perfil.index')}}">Perfil</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{route('perfil.show', $perfil->id)}}">Detalhes do {{$perfil->nome}}</a>
        </li>
    </ol>
    <h1>Detalhes do Perfil <b> {{$perfil->nome}}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{$perfil->nome}}
                </li>
                <li>
                    <strong>Descrição:</strong> <br>{{$perfil->descricao}}
                </li>
            </ul>
            @include('includes.alert')
            <form action="{{route('perfil.destroy', $perfil->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Deleta o Perfil {{$perfil->nome}}</button>
            </form>
        </div>
    </div>
@stop