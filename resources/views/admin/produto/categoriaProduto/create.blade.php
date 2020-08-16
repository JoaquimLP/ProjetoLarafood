@extends('adminlte::page')

@section('title', "Permissões disponivel para o categoria {$produto->titulo}")

@section('content_header')
    @include('includes.alert')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin.home')}}">Home</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{route('produto.index')}}">produto</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{route('produto.categoria', $produto->id)}}">{{$produto->titulo}}</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{route('produto.categoria.createcategoria', $produto->id)}}">Adicionar</a>
        </li>
    </ol>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
           <form action="{{route('produto.categoria.searchcategoria', $produto->id)}}" class="form form-inline" method="post">
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
                            <th width="50px">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Descriçao</th>
                        </tr>
                    </thead>
                    <tbody>
                        <form action="{{route('produto.categoria.storecategoria', $produto->id)}}" method="post">
                            @csrf
                            @method('POST')
                            @foreach ($categorias as $categoria)
                                <tr>
                                    <td>
                                        <input type="checkbox" name="categoria[]" id="" value="{{$categoria->id}}">
                                    </td>
                                    <td>
                                        {{$categoria->nome}}
                                    </td>
                                    <td>
                                        {{$categoria->descricao}}
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="500">
                                    <button type="submit" class="btn btn-primary">Vincular</button>
                                </td>
                            </tr>
                        </form>
                    </tbody>
                </table>
            @else
                <h2>Todas as categoria cadastrada no sistema já foram vinculado a esse produto</h2>
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