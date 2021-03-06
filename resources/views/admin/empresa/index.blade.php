@extends('adminlte::page')

@section('title', 'Empresas')

@section('content_header')
    <h1>Empresa {{-- <a href="{{route('empresa.create')}}" class="btn btn-primary float-right"><i class="fas fa-plus-square"></i> ADICIONAR</a> --}}</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin.home')}}">Home</a>
        </li>
        <li <li class="breadcrumb-item active">
            <a href="{{route('empresa.index')}}">Empresa</a>
        </li>
    </ol>
@stop

@section('content')
    <div class="card">
        @include('includes.alert')
        <div class="card-header">
           <form action="{{route('empresa.search')}}" class="form form-inline" method="post">
                @csrf
                <input type="text" class="form-control mr-1" name="filtrar" value="{{$filtros['filtrar'] ?? ''}}" id="filtrar" placeholder="nome do empresa...">
                <button type="submit" class="btn btn-dark">Buscar</button>
            </form>

        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th scope="col">Imagem</th>
                        <th scope="col">Nome</th>
                        <th scope="col">preço R$</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($empresas as $empresa)
                        <tr>
                            <td>
                                @if ($empresa->logo)
                                    <img src="{{url("storage/{$empresa->logo}")}}" alt="{{$empresa->logo}}" class="imageEmpresa" style="width: 100px; height: 100px;">
                                @endif
                            </td>
                            <td>
                                {{$empresa->nome}}
                            </td>
                            <td class="cnpj">
                                {{$empresa->cnpj}}
                            </td>
                            <td>
                                {{$empresa->planos->nome}}
                            </td>
                            <td style="width: 250px">
                                <a href="{{route('empresa.edit', $empresa->id)}}" class="btn btn-info">Edit</a>
                                <a href="{{route('empresa.show', $empresa->id)}}" class="btn btn-warning">Ver</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-footer">
                @if (isset($filtros))
                    {!! $empresas->links()!!}
                @else
                    {!! $empresas->links()!!}
                @endif
            </div>
        </div>
    </div>
@stop
@push('scripts')
<script>
    $(document).ready(function($){
        $('.cnpj').mask('00.000.000/0000-00');
    });
</script>
@endpush
