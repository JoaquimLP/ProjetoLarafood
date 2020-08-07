@extends('adminlte::page')

@section('title', "Perfil para a permissão {$permissao->nome}")

@section('content_header')
    @include('includes.alert')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin.home')}}">Home</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{route('permissao.index')}}">Permissão</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{route('permissao.perfil', $permissao->id)}}">{{$permissao->nome}}</a>
        </li>
    </ol>
    <h1>Perefil para o permissao <br>{{$permissao->nome}} <a href="{{route('permissao.perfil.createperfil', $permissao->id)}}" class="btn btn-primary float-right"><i class="fas fa-plus-square"></i> ADICIONAR PERFIL</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
           <form action="{{route('permissao.search')}}" class="form form-inline" method="post">
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
                                <td style="width: 0px">
                                    <a href="{{route('permissao.perfil.detachperfil', [$permissao->id, $perfil->id])}}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
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
                    {!!$perfils->appends($filtros)->links()!!}
                @else
                    {!!$perfils->links()!!}
                @endif
            </div>
        </div>
    </div>
@stop