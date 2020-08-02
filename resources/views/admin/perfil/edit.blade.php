@extends('adminlte::page')

@section('title', 'Editar Perfil')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin.home')}}">Home</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{route('perfil.index')}}">Perfil</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{route('perfil.create', $perfil->id)}}">Editar</a>
        </li>
    </ol>
    <h1>Editar o perfil {{$perfil->nome}}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('perfil.update', $perfil->id)}}" method="post" class="form">
                @csrf
                @method('PUT')
                @include('admin.perfil._partials._form')
            </form>
        </div>
    </div>
    @include('includes.alert')
@stop