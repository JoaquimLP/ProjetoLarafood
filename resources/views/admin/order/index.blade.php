@extends('adminlte::page')

@section('title', 'Pedidos')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('orders.index') }}" class="active">Pedidos</a></li>
    </ol>

    <h1>Pedidos</h1>
@stop

@section('content')
    <div id="app" class="card">
        <orders-empresa></orders-empresa>
    </div>
@stop

@section('adminlte_js')
<script src="{{ asset('js/app.js') }}"></script>
@stop

@push('script')
    <script>
        window.Laravel = {!! json_encode([
            'empresa_id' => auth()->check() ? auth()->user()->empresa_id : ''
        ]) !!}
    </script>
@endpush
