@extends('adminlte::page')

@section('title', 'Permissao')

@section('content_header')
    @include('includes.alert')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin.home')}}">Home</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{route('permissao.index')}}">Permissão</a>
        </li>
    </ol>
    <h1>Permissão <a href="{{route('permissao.create')}}" class="btn btn-primary float-right"><i class="fas fa-plus-square"></i> ADICIONAR</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
           <form action="{{route('permissao.search')}}" class="form form-inline" method="post">
                @csrf
                <input type="text" class="form-control mr-1" name="filtrar" value="{{$filtros['filtrar'] ?? ''}}" id="filtrar" placeholder="nome do plano...">
                <button type="submit" class="btn btn-dark">Buscar</button>
            </form>
        </div>
        <div class="card-body">
            @if ($permissaos->count() != 0)
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Descriçao</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissaos as $permissao)
                            <tr>
                                <td>
                                    {{$permissao->nome}}
                                </td>
                                <td>
                                    {{$permissao->descricao}}
                                </td>
                                <td style="width: 150px">
                                    <a href="{{route('permissao.edit', $permissao->id)}}" class="btn btn-info">Edit</a>
                                    <a href="{{route('permissao.show',  $permissao->id)}}" class="btn btn-warning">Ver</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h1>Não existe permissão candastrada</h1>
            @endif
            <div class="card-footer">
                @if (isset($filtros))
                    {!!$permissaos->appends($filtros)->links()!!}
                @else
                    {!!$permissaos->links()!!}
                @endif
            </div>
        </div>
    </div>
@stop