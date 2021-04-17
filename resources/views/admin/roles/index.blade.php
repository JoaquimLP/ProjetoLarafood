@extends('adminlte::page')

@section('title', 'Função')

@section('content_header')
    @include('includes.alert')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin.home')}}">Home</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{route('role.index')}}">Função</a>
        </li>
    </ol>
    <h1>Função <a href="{{route('role.create')}}" class="btn btn-primary float-right"><i class="fas fa-plus-square"></i> ADICIONAR</a></h1>
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
            @if ($roles->count() != 0)
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Descriçao</th>
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
                                <td style="width: 250px">
                                    <a href="{{route('role.edit', $role->id)}}" class="btn btn-info">Edit</a>
                                    <a href="{{route('role.show',  $role->id)}}" class="btn btn-warning">Ver</a>
                                    {{-- <a href="{{route('role.permissao',  $role->id)}}" class="btn btn-secondary"><i class="fas fa-lock"></i></a>
                                    <a href="{{route('role.plano',  $role->id)}}" class="btn btn-success"><i class="fas fa-list-ul"></i></a> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h1>Não existe Fução candastrada</h1>
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
