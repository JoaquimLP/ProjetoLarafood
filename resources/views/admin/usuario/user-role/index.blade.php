@extends('adminlte::page')

@section('title', "Planos para o usuario {$user->name}")

@section('content_header')
    @include('includes.alert')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin.home')}}">Home</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{route('usuario.index')}}">Usuario</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{route('user.role', $user->id)}}">{{$user->name}}</a>
        </li>
    </ol>
    <h1>Planos para o usuario <br>{{$user->name}} <a href="{{route('user.role.create', $user->id)}}" class="btn btn-primary float-right"><i class="fas fa-plus-square"></i> ADICIONAR PERMISSÃO</a></h1>
@stop

@section('content')
    <div class="card my-3">
        <div class="card-header">
           <form action="{{route('user.role.search', $user->id)}}" class="form form-inline" method="post">
                @csrf
                <input type="text" class="form-control mr-1" name="filtrar" value="{{$filtros['filtrar'] ?? ''}}" id="filtrar" placeholder="nome do role...">
                <button type="submit" class="btn btn-dark">Buscar</button>
            </form>
        </div>
        <div class="card-body">
            @if ($roles->count() != 0)
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td>
                                    {{$role->nome}}
                                </td>
                                <td>
                                    {{$role->descricao}}
                                </td>
                                <td style="width: 0px">
                                    <a href="{{route('user.role.detach', [$user->id, $role->id])}} " class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h1>Não existe usuario candastrada para essa função</h1>
            @endif
            <div class="card-footer">
                @if (isset($filtros))
                    {!!$roles->appends($filtros)->links()!!}
                @else
                    {!!$roles->links()!!}
                @endif
            </div>
        </div>
    </div>
@stop
