@extends('adminlte::page')

@section('title', 'Detalhes do Permissao')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin.home')}}">Home</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{route('permissao.index')}}">Permissao</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{route('permissao.show', $permissao->id)}}">Detalhes do {{$permissao->nome}}</a>
        </li>
    </ol>
    <h1>Detalhes do Permissao <b> {{$permissao->nome}}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{$permissao->nome}}
                </li>
                <li>
                    <strong>Descrição:</strong> <br>{{$permissao->descricao}}
                </li>
            </ul>
            @include('includes.alert')
            <form action="{{route('permissao.destroy', $permissao->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Deleta o permissao {{$permissao->nome}}</button>
            </form>
        </div>
    </div>
@stop