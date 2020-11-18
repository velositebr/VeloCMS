@extends('layouts.app')

@section('title')
    Configurações - Área Restrita
@endsection

@section('breadcrumb')

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 align-self-center">
                <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Configurações</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="/" class="text-muted">Painel</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Configurações</li>
                        </ol>
                    </nav>
                </div>
            </div>

        </div>
    </div>

@endsection

@section('content')

<!-- basic table -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card text-white bg-info">
                            <div class="card-header">
                                <h4 class="mb-0 text-white">Configurações de SMTP</h4>
                            </div>
                            <div class="card-body">
                                <p class="card-text">
                                    Gerencie os dados de sua conta de e-mail.
                                </p>
                                <a href="" class="btn btn-dark">Acessar</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-white bg-danger">
                            <div class="card-header">
                                <h4 class="mb-0 text-white">Configurações de SEO</h4>
                            </div>
                            <div class="card-body">
                                <p class="card-text">
                                    Gerencie os dados para otimização de busca.
                                </p>
                                <a href="" class="btn btn-dark">Acessar</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-white bg-success">
                            <div class="card-header">
                                <h4 class="mb-0 text-white">Configurações Open Graph</h4>
                            </div>
                            <div class="card-body">
                                <p class="card-text">
                                    Gerencie os dados de Facebook Open Graph.
                                </p>
                                <a href="" class="btn btn-dark">Acessar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
