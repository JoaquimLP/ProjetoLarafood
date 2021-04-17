@extends('adminlte::page')

@section('title', 'Detalhes do Perfil')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin.home')}}">Home</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{route('role.index')}}">Função</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{route('role.show', $role->id)}}">Detalhes da função {{$role->nome}}</a>
        </li>
    </ol>
    <h1>Detalhes da Função <b> {{$role->nome}}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{$role->nome}}
                </li>
                <li>
                    <strong>Descrição:</strong> <br>{{$role->descricao}}
                </li>
            </ul>
            @include('includes.alert')
            <form action="{{route('role.destroy', $role->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Deleta o Perfil {{$role->nome}}</button>
            </form>
        </div>
    </div>
@stop
