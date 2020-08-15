@extends('adminlte::page')

@section('title', 'Cadastrar um novo Categoria')

@section('content_header')
    <h1>Cadastrar um novo Categoria</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('categoria.store')}}" method="post" class="form">
                @csrf
                @include('admin.categoria._partials._form')
            </form>
        </div>
    </div>
    @include('includes.alert')
@stop