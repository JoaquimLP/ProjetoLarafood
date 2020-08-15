@extends('adminlte::page')

@section('title', 'Editar categoria')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin.home')}}">Home</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{route('categoria.index')}}">Categoria</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{route('categoria.edit', $categoria->id)}}">Editar</a>
        </li>
    </ol>
    <h1>Editar o Categoria {{$categoria->nome}}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('categoria.update', $categoria->id)}}" method="post" class="form">
                @csrf
                @method('PUT')
                @include('admin.categoria._partials._form')
            </form>
        </div>
    </div>
    @include('includes.alert')
@stop