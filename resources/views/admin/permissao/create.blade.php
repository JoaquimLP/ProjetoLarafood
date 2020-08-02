@extends('adminlte::page')

@section('title', 'Cadastrar um novo permissao')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin.home')}}">Home</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{route('permissao.index')}}">Permissâo</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{route('permissao.create')}}">Cadastrar</a>
        </li>
    </ol>
    <h1>Cadastrar um novo permissao</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('permissao.store')}}" method="post" class="form">
                @csrf
                @method('POST')
                @include('admin.permissao._partials._form')
            </form>
        </div>
    </div>
    @include('includes.alert')
@stop