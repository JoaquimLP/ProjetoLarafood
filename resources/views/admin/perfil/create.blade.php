@extends('adminlte::page')

@section('title', 'Cadastrar um novo Perfil')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin.home')}}">Home</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{route('perfil.index')}}">Perfil</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{route('perfil.create')}}">Cadastrar</a>
        </li>
    </ol>
    <h1>Cadastrar um novo Perfil</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('perfil.store')}}" method="post" class="form">
                @csrf
                @method('POST')
                @include('admin.perfil._partials._form')
            </form>
        </div>
    </div>
    @include('includes.alert')
@stop