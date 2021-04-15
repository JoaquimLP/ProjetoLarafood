@extends('adminlte::page')

@section('title', 'Cadastrar uma nova Empresa')

@section('content_header')
    <h1>Cadastrar uma nova Empresa</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('empresa.store')}}" method="post" enctype="multipart/form-data" class="form">
                @csrf
                @include('admin.empresa._partials._form')
            </form>
        </div>
    </div>
    @include('includes.alert')
@stop
