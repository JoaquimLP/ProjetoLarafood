@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <h1>Planos <a href="{{route('plano.create')}}" class="btn btn-primary"><i class="fas fa-plus-square"></i> ADICIONAR</a></h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin.home')}}">Home</a>
        </li>
        <li <li class="breadcrumb-item active">
            <a href="{{route('plano.index')}}">planos</a>
        </li>
    </ol>
@stop

@section('content')
    <div class="card">
        @include('includes.alert')
        <div class="card-header">
           <form action="{{route('plano.search')}}" class="form form-inline" method="post">
                @csrf
                <input type="text" class="form-control mr-1" name="filtrar" value="{{$filtros['filtrar'] ?? ''}}" id="filtrar" placeholder="nome do plano...">
                <button type="submit" class="btn btn-dark">Buscar</button>
            </form>
            
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th scope="col"> Nome</th>
                        <th scope="col">Preço</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($planos as $plano)
                        <tr>
                            <td>
                                {{$plano->nome}}
                            </td>
                            <td>
                                {{number_format($plano->preco, 2, ',', '.')}}
                            </td>
                            <td style="width: 250px">
                                <a href="{{route('detalhes.index', $plano->url)}}" class="btn btn-primary">Detalhes</a>
                                <a href="{{route('plano.edit', $plano->id)}}" class="btn btn-info">Edit</a>
                                <a href="{{route('plano.show', $plano->url)}}" class="btn btn-warning">Ver</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-footer">
                @if (isset($filtros))
                {!! $planos->appends($filtros)->links()!!}
                @else
                    {!! $planos->links()!!}
                @endif
            </div>
        </div>
    </div>
@stop