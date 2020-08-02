@extends('adminlte::page')

@section('title', 'Perfil')

@section('content_header')
    @include('includes.alert')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin.home')}}">Home</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{route('perfil.index')}}">Perfil</a>
        </li>
    </ol>
    <h1>Perfil <a href="{{route('perfil.create')}}" class="btn btn-primary float-right"><i class="fas fa-plus-square"></i> ADICIONAR</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
           <form action="{{route('perfil.search')}}" class="form form-inline" method="post">
                @csrf
                <input type="text" class="form-control mr-1" name="filtrar" value="{{$filtros['filtrar'] ?? ''}}" id="filtrar" placeholder="nome do plano...">
                <button type="submit" class="btn btn-dark">Buscar</button>
            </form>
        </div>
        <div class="card-body">
            @if ($perfils->count() != 0)
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Descriçao</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($perfils as $perfil)
                            <tr>
                                <td>
                                    {{$perfil->nome}}
                                </td>
                                <td>
                                    {{$perfil->descricao}}
                                </td>
                                <td style="width: 150px">
                                    <a href="{{route('perfil.edit', $perfil->id)}}" class="btn btn-info">Edit</a>
                                    <a href="{{route('perfil.show',  $perfil->id)}}" class="btn btn-warning">Ver</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h1>Não existe perfil candastrado</h1>
            @endif
            <div class="card-footer">
                @if (isset($filtros))
                    {!!$perfils->appends($filtros)->links()!!}
                @else
                    {!!$perfils->links()!!}
                @endif
            </div>
        </div>
    </div>
@stop