@extends('adminlte::page')

@section('title', "Planos disponivel para o role {$role->nome}")

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
            <a href="{{route('role.user', $role->id)}}">{{$role->nome}}</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{route('role.user.create', $role->id)}}">Adicionar</a>
        </li>
    </ol>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
           <form action="{{route('role.user.store', $role->id)}}" class="form form-inline" method="post">
                @csrf
                <input type="text" class="form-control mr-1" name="filtrar" value="{{$filtros['filtrar'] ?? ''}}" id="filtrar" placeholder="nome do user...">
                <button type="submit" class="btn btn-dark">Buscar</button>
            </form>
        </div>
        <div class="card-body">
            @if ($users->count() != 0)
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th width="50px">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Descriçao</th>
                        </tr>
                    </thead>
                    <tbody>
                        <form action="{{route('role.user.store', $role->id)}}" method="post">
                            @csrf
                            @method('POST')
                            @foreach ($users as $user)
                                <tr>
                                    <td>
                                        <input type="checkbox" name="user[]" id="" value="{{$user->id}}">
                                    </td>
                                    <td>
                                        {{$user->name}}
                                    </td>
                                    <td>
                                        {{$user->email}}
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
                <h2>Todas as users cadastrada no sistema já foram vinculado a esse role</h2>
            @endif
            <div class="card-footer">
                @if (isset($filtros))
                    {!!$users->appends($filtros)->links()!!}
                @else
                    {!!$users->links()!!}
                @endif
            </div>
        </div>
    </div>
@stop
