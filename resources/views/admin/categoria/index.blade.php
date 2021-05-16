@extends('adminlte::page')

@section('title', 'categorias')

@section('content_header')
    <h1 class="text-light">Categorias <a href="{{route('categoria.create')}}" class="btn btn-primary float-right"><i class="fas fa-plus-square"></i> ADICIONAR</a></h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin.home')}}">Home</a>
        </li>
        <li <li class="breadcrumb-item active">
            <a href="{{route('categoria.index')}}">Categorias</a>
        </li>
    </ol>
@stop

@section('content')
    <div class="card">
        @include('includes.alert')
        <div class="card-header">
           <form action="{{route('categoria.search')}}" class="form form-inline" method="post">
                @csrf
                <input type="text" class="form-control mr-1" name="filtrar" value="{{$filtros['filtrar'] ?? ''}}" id="filtrar" placeholder="nome do categoria...">
                <button type="submit" class="btn btn-dark">Buscar</button>
            </form>

        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categorias as $categoria)
                        <tr>
                            <td>
                                {{$categoria->id}}
                            </td>
                            <td>
                                {{$categoria->nome}}
                            </td>
                            <td>
                                {{$categoria->descricao}}
                            </td>
                            <td style="width: 250px">
                                <a href="{{route('categoria.edit', $categoria->id)}}" class="btn btn-info">Edit</a>
                                <a href="{{route('categoria.show', $categoria->id)}}" class="btn btn-success">Ver</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-footer">
                @if (isset($filtros))
                    {!! $categorias->links()!!}
                @else
                    {!! $categorias->links()!!}
                @endif
            </div>
        </div>
    </div>
@stop
