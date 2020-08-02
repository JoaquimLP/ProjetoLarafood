@extends('adminlte::page')

@section('title', 'Editar permissao')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin.home')}}">Home</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{route('permissao.index')}}">Permissâo</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{route('permissao.create', $permissao->id)}}">Editar</a>
        </li>
    </ol>
    <h1>Editar o Permissão {{$permissao->nome}}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('permissao.update', $permissao->id)}}" method="post" class="form">
                @csrf
                @method('PUT')
                @include('admin.permissao._partials._form')
            </form>
        </div>
    </div>
    @include('includes.alert')
@stop