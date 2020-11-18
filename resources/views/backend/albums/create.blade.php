@extends('layouts.app')

@section('title')
    Adicionar álbum - Área Restrita
@endsection

@section('breadcrumb')

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Adicionar álbum</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('backend.dashboard.index') }}" class="text-muted">Painel</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Adicionar álbum</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="col-5 align-self-center">
                <div class="customize-input float-right">
                    <a href="{{ route('backend.albums.index') }}"
                        class="btn waves-effect waves-light btn-primary">
                        <span><i data-feather="plus-circle" class="svg-icon"></i></span>
                        Voltar
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Formulário de cadastro de álbum</h4>
                        <p>Dimensões recomendadas para a imagem ilustrativa:</p>
                        <ul>
                            <li>Largura: 300px</li>
                            <li>Altura: 300px</li>
                        </ul>
                        <form action="{{ route('backend.albums.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-body">

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Título</label>
                                            <input id="title" type="text" class="form-control"
                                                name="title" value="" required autofocus
                                                placeholder="digite o título do álbum">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Ano de lançamento</label>
                                            <input id="year" type="text" class="form-control"
                                                name="year" value="" required
                                                placeholder="digite o ano de lançamento">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Tipo</label>
                                            <input id="type" type="text" class="form-control"
                                                name="type" value="" required
                                                placeholder="digite o tipo do álbum (EP, Single, Álbum)">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Link</label>
                                            <input id="link" type="url" class="form-control"
                                                name="link" value=""
                                                placeholder="digite o link que o álbum deverá abrir/redirecionar">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Imagem</label>
                                            <div class="input-group mb-3">
                                                <div class="custom-file">
                                                    <input type="file" name="image" class="custom-file-input" id="inputGroupFile01">
                                                    <label class="custom-file-label" for="inputGroupFile01">Selecionar arquivo</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <button type="submit" class="btn waves-effect waves-light btn-primary">
                                Salvar
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
