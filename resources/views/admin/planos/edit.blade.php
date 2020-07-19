@extends('adminlte::page')

@section('title', 'Editar do Plano')

@section('content_header')
    <h1>Editar do Plano <b> {{$plano->nome}}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('plano.update', $plano->id)}}" method="post" class="form">
                @method('PUT')
                @csrf
                @include('admin.planos._partials._form')
            </form>
        </div>
    </div>
    @include('includes.alert')
@stop