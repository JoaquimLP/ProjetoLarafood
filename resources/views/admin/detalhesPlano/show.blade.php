@extends('adminlte::page')

@section('title', 'Detalhes')

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
            <a href="{{route('detalhes.index', $plano->url)}}">Detalhes</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{route('detalhes.show',  [$plano->url, $detalhe->id])}}">Show</a>
        </li>
    </ol>
    <h1>Detalhes para o plano {{$plano->nome}}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
           <ul>
               <li>
                <strong>Nome: {{$detalhe->nome}}</strong>
               </li>
           </ul>
        </div>
        <div class="card-footer">
            <form action="{{route('detalhes.destroy',  [$plano->url, $detalhe->id])}}" method="post">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">Deletar o detalhe {{$detalhe->nome}}, do plano {{$plano->nome}}</button>
            </form>
        </div>
    </div>
    @include('includes.alert')
@stop