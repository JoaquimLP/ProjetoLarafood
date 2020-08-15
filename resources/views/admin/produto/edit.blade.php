@extends('adminlte::page')

@section('title', 'Editar produto')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin.home')}}">Home</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{route('produto.index')}}">Produto</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{route('produto.edit', $produto->id)}}">Editar</a>
        </li>
    </ol>
    <h1>Editar o Produto {{$produto->nome}}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('produto.update', $produto->id)}}" enctype="multipart/form-data" method="post" class="form">
                @csrf
                @method('PUT')
                @include('admin.produto._partials._form')
            </form>
        </div>
    </div>
    @include('includes.alert')
@stop