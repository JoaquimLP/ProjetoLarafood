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
                @include('admin.planos._partials._form')
            </form>
        </div>
    </div>
    @include('includes.alert')
@stop

@push('scripts')
<script>
    $(document).ready(function($){
        $('#_preco').mask('#.###,00', {reverse: true});
    });
</script>
@endpush
