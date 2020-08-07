@extends('adminlte::page')

@section('title', "Permissões disponivel para o perfil {$permissao->nome}")

@section('content_header')
    @include('includes.alert')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin.home')}}">Home</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{route('permissao.index')}}">permissao</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{route('permissao.perfil', $permissao->id)}}">{{$permissao->nome}}</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="{{route('permissao.perfil.createperfil', $permissao->id)}}">Adicionar</a>
        </li>
    </ol>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
           <form action="{{route('permissao.perfil.searchperfil', $permissao->id)}}" class="form form-inline" method="post">
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
                            <th width="50px">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Descriçao</th>
                        </tr>
                    </thead>
                    <tbody>
                        <form action="{{route('permissao.perfil.storeperfil', $permissao->id)}}" method="post">
                            @csrf
                            @method('POST')
                            @foreach ($perfils as $perfil)
                                <tr>
                                    <td>
                                        <input type="checkbox" name="perfil[]" id="" value="{{$perfil->id}}">
                                    </td>
                                    <td>
                                        {{$perfil->nome}}
                                    </td>
                                    <td>
                                        {{$perfil->descricao}}
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
                <h2>Todas as permissões cadastrada no sistema já foram vinculado a esse perfil</h2>
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