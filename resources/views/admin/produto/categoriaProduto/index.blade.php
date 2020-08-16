@extends('adminlte::page')

@section('title', "Adicionar categoria para {$produto->titulo}")

@section('content_header')
    @include('includes.alert')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin.home')}}">Home</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{route('produto.index')}}">Produto</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{route('produto.categoria', $produto->id)}}">{{$produto->titulo}}</a>
        </li>
    </ol>
    <h1>Perefil para o produto <br>{{$produto->titulo}} <a href="{{route('produto.categoria.createcategoria', $produto->id)}}" class="btn btn-primary float-right"><i class="fas fa-plus-square"></i> ADICIONAR CATEGORIA</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
           <form action="{{route('produto.search')}}" class="form form-inline" method="post">
                @csrf
                <input type="text" class="form-control mr-1" name="filtrar" value="{{$filtros['filtrar'] ?? ''}}" id="filtrar" placeholder="nome do plano...">
                <button type="submit" class="btn btn-dark">Buscar</button>
            </form>
        </div>
        <div class="card-body">
            @if ($categorias->count() != 0)
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Descriçao</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categorias as $categoria)
                            <tr>
                                <td>
                                    {{$categoria->nome}}
                                </td>
                                <td>
                                    {{$categoria->descricao}}
                                </td>
                                <td style="width: 0px">
                                    <a href="{{route('produto.categoria.detachcategoria', [$produto->id, $categoria->id])}}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h1>Não existe permissões candastrada para esse categoria</h1>
            @endif
            <div class="card-footer">
                @if (isset($filtros))
                    {!!$categorias->appends($filtros)->links()!!}
                @else
                    {!!$categorias->links()!!}
                @endif
            </div>
        </div>
    </div>
@stop