@extends('adminlte::page')

@section('title', 'Cadastrar um novo Plano')

@section('content_header')
    <h1>Cadastrar um novo Plano</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('plano.store')}}" method="post" class="form">
                @csrf
                <div class="form-group">
                    <label for="nome">Nome: </label>
                    <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome">
                </div>
                <div class="form-group">
                    <label for="preco">Preço:</label>
                    <input type="text" class="form-control" name="preco" id="preco" placeholder="Preço">
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição:</label>
                    <input type="text" class="form-control" name="descricao" id="descricao" placeholder="descricao">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-dark">Salvar</button>
                </div>
              </form>
        </div>
    </div>
@stop