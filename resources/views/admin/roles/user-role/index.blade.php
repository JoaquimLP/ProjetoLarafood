@extends('adminlte::page')

@section('title', "Planos para o role {$role->nome}")

@section('content_header')
    @include('includes.alert')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin.home')}}">Home</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{route('role.index')}}">Usuario</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{route('role.user', $role->id)}}">{{$role->nome}}</a>
        </li>
    </ol>
    <h1>Planos para o role <br>{{$role->nome}} <a href="{{route('role.user.create', $role->id)}}" class="btn btn-primary float-right"><i class="fas fa-plus-square"></i> ADICIONAR PERMISSÃO</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
           <form action="{{route('role.search')}}" class="form form-inline" method="post">
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
                            <th scope="col">Nome</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>
                                    {{$user->name}}
                                </td>
                                <td>
                                    {{$user->email}}
                                </td>
                                <td style="width: 0px">
                                    <a href="{{route('role.user.detach', [$role->id, $user->id])}} " class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
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
                    {!!$users->appends($filtros)->links()!!}
                @else
                    {!!$users->links()!!}
                @endif
            </div>
        </div>
    </div>
@stop
