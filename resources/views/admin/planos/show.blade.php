@extends('adminlte::page')

@section('title', 'Detalhes do Plano')

@section('content_header')
    <h1>Detalhes do Plano <b> {{$plano->nome}}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong>{{$plano->nome}}
                </li>
                <li>
                    <strong>URL: </strong>{{$plano->url}}
                </li>
                <li>
                    <strong>Preço: </strong>R${{number_format($plano->preco, 2, ',', '.')}}
                </li>
                <li>
                    <strong>Descrição: </strong>R${{$plano->descricao}}
                </li>
            </ul>
            <form action="{{route('plano.destroy', $plano->url)}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">DELETAR O PLANO {{$plano->nome}}</button>
            </form>
        </div>
    </div>
@stop