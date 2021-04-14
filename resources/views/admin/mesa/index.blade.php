@extends('adminlte::page')

@section('title', 'mesas')

@section('content_header')
    <h1>Mesas <a href="{{route('mesa.create')}}" class="btn btn-primary float-right"><i class="fas fa-plus-square"></i> ADICIONAR</a></h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin.home')}}">Home</a>
        </li>
        <li <li class="breadcrumb-item active">
            <a href="{{route('mesa.index')}}">Mesas</a>
        </li>
    </ol>
@stop

@section('content')
    <div class="card">
        @include('includes.alert')
        <div class="card-header">
           <form action="{{route('mesa.search')}}" class="form form-inline" method="post">
                @csrf
                <input type="text" class="form-control mr-1" name="filtrar" value="{{$filtros['filtrar'] ?? ''}}" id="filtrar" placeholder="nome do mesa...">
                <button type="submit" class="btn btn-dark">Buscar</button>
            </form>

        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mesas as $mesa)
                        <tr>
                            <td>
                                {{$mesa->id}}
                            </td>
                            <td>
                                {{$mesa->nome}}
                            </td>
                            <td>
                                {{$mesa->descricao}}
                            </td>
                            <td style="width: 250px">
                                <a href="{{route('mesa.edit', $mesa->id)}}" class="btn btn-info">Edit</a>
                                <a href="{{route('mesa.show', $mesa->id)}}" class="btn btn-success">Ver</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-footer">
                @if (isset($filtros))
                    {!! $mesas->links()!!}
                @else
                    {!! $mesas->links()!!}
                @endif
            </div>
        </div>
    </div>
@stop
