@extends('adminlte::page')

@section('title', 'Produtos')

@section('content_header')
    <h1>Produto <a href="{{route('produto.create')}}" class="btn btn-primary float-right"><i class="fas fa-plus-square"></i> ADICIONAR</a></h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin.home')}}">Home</a>
        </li>
        <li <li class="breadcrumb-item active">
            <a href="{{route('produto.index')}}">Produto</a>
        </li>
    </ol>
@stop

@section('content')
    <div class="card">
        @include('includes.alert')
        <div class="card-header">
           <form action="{{route('produto.search')}}" class="form form-inline" method="post">
                @csrf
                <input type="text" class="form-control mr-1" name="filtrar" value="{{$filtros['filtrar'] ?? ''}}" id="filtrar" placeholder="nome do produto...">
                <button type="submit" class="btn btn-dark">Buscar</button>
            </form>
            
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th scope="col">Imagem</th>
                        <th scope="col">Nome</th>
                        <th scope="col">preço R$</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produtos as $produto)
                        <tr>
                            <td>
                                <img src="{{url("storage/{$produto->image}")}}" alt="{{$produto->image}}" class="imageProduto" style="width: 100px; height: 100px;">
                            </td>
                            <td>
                                {{$produto->titulo}}
                            </td>
                            <td>
                                {{number_format($produto->preco, 2, ',', '.')}}
                            </td>
                            <td>
                                {{$produto->descricao}}
                            </td>
                            <td style="width: 250px">
                                <a href="{{route('produto.edit', $produto->id)}}" class="btn btn-info">Edit</a>
                                <a href="{{route('produto.show', $produto->id)}}" class="btn btn-success">Ver</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-footer">
                @if (isset($filtros))
                    {!! $produtos->links()!!}
                @else
                    {!! $produtos->links()!!}
                @endif
            </div>
        </div>
    </div>
@stop