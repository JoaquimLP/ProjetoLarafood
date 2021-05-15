@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon">
                    <i class="fas fa-users"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Usuários</span>
                    <span class="info-box-number">{{$totUsers}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon">
                    <i class="fas fa-tablet"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Mesas</span>
                    <span class="info-box-number">{{$totMesa}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon">
                    <i class="fas fa-layer-group"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Categorias</span>
                    <span class="info-box-number">{{$totCategoria}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon">
                    <i class="fas fa-hamburger"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Produtos</span>
                    <span class="info-box-number">{{$totProduto}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

        @admin()
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon">
                        <i class="fas fa-building"></i>
                    </span>
                    <div class="info-box-content">
                        <span class="info-box-text">Empresas</span>
                        <span class="info-box-number">{{$totEmpresa}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        @endadmin
        @admin()
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon">
                    <i class="fas fa-list-ul"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Planos</span>
                    <span class="info-box-number">{{$totPlano}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        @endadmin
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon">
                    <i class="fas fa-user-tag"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Funções</span>
                    <span class="info-box-number">{{$totRole}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        @admin()
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon">
                    <i class="fas fa-user-circle"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Perfis</span>
                    <span class="info-box-number">{{$totPerfis}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        @endadmin
        @admin()
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon">
                    <i class="fas fa-lock"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Permissões</span>
                    <span class="info-box-number">{{$totPermissao}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        @endadmin
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon">
                    <i class="fas fa-utensils"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Pedidos</span>
                    <span class="info-box-number">{{$totPedido}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
    </div>
@stop
