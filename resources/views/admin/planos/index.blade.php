@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <h1>Planos</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            #filtros
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th scope="col"> Nome</th>
                        <th scope="col">Preço</th>
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
                                {{$plano->preco}}
                            </td>
                            <td style="width: 50px">
                                <a href="" class="btn btn-warning">Ver</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-footer">
                {!! $planos->links()!!}
            </div>
        </div>
    </div>
@stop