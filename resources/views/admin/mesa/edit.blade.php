@extends('adminlte::page')

@section('title', 'Editar mesa')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin.home')}}">Home</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{route('mesa.index')}}">Mesa</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{route('mesa.edit', $mesa->id)}}">Editar</a>
        </li>
    </ol>
    <h1>Editar o Mesa {{$mesa->nome}}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('mesa.update', $mesa->id)}}" method="post" class="form">
                @csrf
                @method('PUT')
                @include('admin.mesa._partials._form')
            </form>
        </div>
    </div>
    @include('includes.alert')
@stop
