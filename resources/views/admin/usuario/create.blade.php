@extends('adminlte::page')

@section('title', 'Cadastrar um novo Usuário')

@section('content_header')
    <h1>Cadastrar um novo Usuário</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('usuario.store')}}" method="post" class="form">
                @csrf
                @include('admin.usuario._partials._form')
            </form>
        </div>
    </div>
    @include('includes.alert')
@stop