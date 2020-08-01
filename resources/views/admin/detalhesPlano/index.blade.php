@extends('adminlte::page')

@section('title', 'Detalhes do Plando {{$plano->nome}}')

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
    </ol>
    <h1>Detalhes do plano <a href="{{route('detalhes.create', $plano->url)}}" class="btn btn-primary"><i class="fas fa-plus-square"></i> ADICIONAR</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th scope="col"> Nome</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detalhes as $detalhe)
                        <tr>
                            <td>
                                {{$detalhe->nome}}
                            </td>
                            <td style="width: 150px">
                                <a href="{{route('detalhes.edit', $detalhe->id)}}" class="btn btn-info">Edit</a>
                                <a href="{{route('plano.show', $plano->url)}}" class="btn btn-warning">Ver</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-footer">
                @if (isset($filtros))
                {!! $detalhes ?? ''->appends($filtros)->links()!!}
                @else
                    {!! $detalhes ?? ''->links()!!}
                @endif
            </div>
        </div>
    </div>
@stop