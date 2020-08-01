@extends('adminlte::page')

@section('title', 'Cadastrar um novo detalhes')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin.home')}}">Home</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{route('plano.index')}}">planos</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{route('plano.show', $plano->url)}}">{{$plano->nome}}</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{route('detalhes.index', $plano->url)}}">planos</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{route('detalhes.create', $plano->url)}}">Criar</a>
        </li>
    </ol>
    <h1>Cadastrar um novo detalhes para o plano {{$plano->nome}}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('detalhes.store', $plano->url)}}" method="post" class="form">
                @csrf
                @include('admin.detalhesPlano._partials._form')
            </form>
        </div>
    </div>
    @include('includes.alert')
@stop