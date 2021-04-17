@extends('adminlte::page')

@section('title', "Planos disponivel para o user {$user->nome}")

@section('content_header')
    @include('includes.alert')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin.home')}}">Home</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{route('usuario.index')}}">Usuário</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{route('user.role', $user->id)}}">{{$user->name}}</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{route('user.role.create', $user->id)}}">Adicionar</a>
        </li>
    </ol>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
           <form action="{{route('user.role.store', $user->id)}}" class="form form-inline" method="post">
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
                            <th width="50px">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Descriçao</th>
                        </tr>
                    </thead>
                    <tbody>
                        <form action="{{route('user.role.store', $user->id)}}" method="post">
                            @csrf
                            @method('POST')
                            @foreach ($roles as $role)
                                <tr>
                                    <td>
                                        <input type="checkbox" name="role[]" id="" value="{{$role->id}}">
                                    </td>
                                    <td>
                                        {{$role->nome}}
                                    </td>
                                    <td>
                                        {{$role->descricao}}
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
                <h2>Todas as roles cadastrada no sistema já foram vinculado a esse user</h2>
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
