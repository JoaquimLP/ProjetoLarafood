@extends('adminlte::page')

@section('title', 'Permissões para o Perfil')

@section('content_header')
    @include('includes.alert')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin.home')}}">Home</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{route('role.index')}}">Função</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{route('role.permissao', $role->id)}}">{{$role->nome}}</a>
        </li>
    </ol>
    <h1>Permissões para o role <br>{{$role->nome}} <a href="{{route('role.permissao.createPermissao', $role->id)}}" class="btn btn-primary float-right"><i class="fas fa-plus-square"></i> ADICIONAR PERMISSÃO</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
           <form action="{{route('role.search')}}" class="form form-inline" method="post">
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
                                <td style="width: 0px">
                                    <a href="{{route('role.permissao.detachPermissao', [$role->id, $permissao->id])}}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h1>Não existe permissões candastrada para esse role</h1>
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
