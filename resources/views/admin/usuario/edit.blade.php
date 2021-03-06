@extends('adminlte::page')

@section('title', 'Editar usuario')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin.home')}}">Home</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{route('usuario.index')}}">Permissâo</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{route('usuario.create', $usuario->id)}}">Editar</a>
        </li>
    </ol>
    <h1>Editar o Permissão {{$usuario->nome}}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('usuario.update', $usuario->id)}}" method="post" class="form">
                @csrf
                @method('PUT')
                @include('admin.usuario._partials._form')
            </form>
        </div>
    </div>
    @include('includes.alert')
@stop