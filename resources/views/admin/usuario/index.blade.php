@extends('adminlte::page')

@section('title', 'usuarios')

@section('content_header')
    <h1>Usuários <a href="{{route('usuario.create')}}" class="btn btn-primary float-right"><i class="fas fa-plus-square"></i> ADICIONAR</a></h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin.home')}}">Home</a>
        </li>
        <li <li class="breadcrumb-item active">
            <a href="{{route('usuario.index')}}">Usuários</a>
        </li>
    </ol>
@stop

@section('content')
    <div class="card">
        @include('includes.alert')
        <div class="card-header">
           <form action="{{route('usuario.search')}}" class="form form-inline" method="post">
                @csrf
                <input type="text" class="form-control mr-1" name="filtrar" value="{{$filtros['filtrar'] ?? ''}}" id="filtrar" placeholder="nome do usuario...">
                <button type="submit" class="btn btn-dark">Buscar</button>
            </form>

        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuarios as $usuario)
                        <tr>
                            <td>
                                {{$usuario->id}}
                            </td>
                            <td>
                                {{$usuario->name}}
                            </td>
                            <td>
                                {{$usuario->email}}
                            </td>
                            <td style="width: 250px">
                                <a href="{{route('usuario.edit', $usuario->id)}}" class="btn btn-info">Edit</a>
                                <a href="{{route('user.role',  $usuario->id)}}" class="btn btn-success"><i class="fas fa-user-tag"></i> Funções</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-footer">
                @if (isset($filtros))
                    {!! $usuarios->links()!!}
                @else
                    {!! $usuarios->links()!!}
                @endif
            </div>
        </div>
    </div>
@stop
