@extends('adminlte::page')

@section('title', 'Cadastrar um novo Produto')

@section('content_header')
    <h1>Cadastrar um novo Produto</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('produto.store')}}" method="post" enctype="multipart/form-data" class="form">
                @csrf
                @include('admin.produto._partials._form')
            </form>
        </div>
    </div>
    @include('includes.alert')
@stop