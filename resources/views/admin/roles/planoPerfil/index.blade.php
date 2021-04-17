@extends('adminlte::page')

@section('title', "Planos para o perfil {$perfil->nome}")

@section('content_header')
    @include('includes.alert')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin.home')}}">Home</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{route('perfil.index')}}">Perfil</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{route('perfil.plano', $perfil->id)}}">{{$perfil->nome}}</a>
        </li>
    </ol>
    <h1>Planos para o perfil <br>{{$perfil->nome}} <a href="{{route('perfil.plano.create', $perfil->id)}}" class="btn btn-primary float-right"><i class="fas fa-plus-square"></i> ADICIONAR PERMISSÃO</a></h1>
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
            @if ($planos->count() != 0)
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Descriçao</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($planos as $plano)
                            <tr>
                                <td>
                                    {{$plano->nome}}
                                </td>
                                <td>
                                    {{$plano->descricao}}
                                </td>
                                <td style="width: 0px">
                                    <a href="{{route('perfil.plano.detach', [$perfil->id, $plano->id])}} " class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h1>Não existe permissões candastrada para esse perfil</h1>
            @endif
            <div class="card-footer">
                @if (isset($filtros))
                    {!!$planos->appends($filtros)->links()!!}
                @else
                    {!!$planos->links()!!}
                @endif
            </div>
        </div>
    </div>
@stop