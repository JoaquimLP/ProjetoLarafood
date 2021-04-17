@extends('adminlte::page')

@section('title', 'Editar Função')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin.home')}}">Home</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{route('role.index')}}">Função</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{route('role.create', $role->id)}}">Editar</a>
        </li>
    </ol>
    <h1>Editar a função {{$role->nome}}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('role.update', $role->id)}}" method="post" class="form">
                @csrf
                @method('PUT')
                @include('admin.roles._partials._form')
            </form>
        </div>
    </div>
    @include('includes.alert')
@stop
