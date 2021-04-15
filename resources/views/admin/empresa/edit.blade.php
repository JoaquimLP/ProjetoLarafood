@extends('adminlte::page')

@section('title', 'Editar empresa')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin.home')}}">Home</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{route('empresa.index')}}">Empresa</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{route('empresa.edit', $empresa->id)}}">Editar</a>
        </li>
    </ol>
    <h1>Editar o Empresa {{$empresa->nome}}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('empresa.update', $empresa->id)}}" enctype="multipart/form-data" method="post" class="form">
                @csrf
                @method('PUT')
                @include('admin.empresa._partials._form')
            </form>
        </div>
    </div>
    @include('includes.alert')
@stop
