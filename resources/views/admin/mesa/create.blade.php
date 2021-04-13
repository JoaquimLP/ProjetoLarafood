@extends('adminlte::page')

@section('title', 'Cadastrar um novo Categoria')

@section('content_header')
    <h1>Cadastrar um nova Mesa</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('mesa.store')}}" method="post" class="form">
                @csrf
                @include('admin.mesa._partials._form')
            </form>
        </div>
    </div>
    @include('includes.alert')
@stop
