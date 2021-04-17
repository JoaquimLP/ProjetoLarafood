@extends('adminlte::page')

@section('title', "Planos disponivel para o perfil {$perfil->nome}")

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
        <li class="breadcrumb-item active">
            <a href="{{route('perfil.plano.create', $perfil->id)}}">Adicionar</a>
        </li>
    </ol>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
           <form action="{{route('perfil.plano.store', $perfil->id)}}" class="form form-inline" method="post">
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
                            <th width="50px">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Descriçao</th>
                        </tr>
                    </thead>
                    <tbody>
                        <form action="{{route('perfil.plano.store', $perfil->id)}}" method="post">
                            @csrf
                            @method('POST')
                            @foreach ($planos as $plano)
                                <tr>
                                    <td>
                                        <input type="checkbox" name="plano[]" id="" value="{{$plano->id}}">
                                    </td>
                                    <td>
                                        {{$plano->nome}}
                                    </td>
                                    <td>
                                        {{$plano->descricao}}
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
                <h2>Todas as planos cadastrada no sistema já foram vinculado a esse perfil</h2>
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