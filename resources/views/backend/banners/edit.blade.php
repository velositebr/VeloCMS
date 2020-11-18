@extends('layouts.app')

@section('title')
    Editar banner - Área Restrita
@endsection

@section('breadcrumb')

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Editar banner</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('backend.dashboard.index') }}" class="text-muted">Painel</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Editar banner</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="col-5 align-self-center">
                <div class="customize-input float-right">
                    <a href="{{ route('backend.banners.index') }}"
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
            <div class="col-12 col-lg-6">

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Formulário para edição de banner</h4>
                        <p>Dimensões recomendadas para a imagem ilustrativa:</p>
                        <ul>
                            <li>Largura: 1920px</li>
                            <li>Altura: 1280px</li>
                        </ul>

                        <form action="{{ route('backend.banners.update', $banner) }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-body">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Título</label>
                                            <input id="title" type="text" class="form-control"
                                                name="title" value="{{ $banner->title }}" required autofocus
                                                placeholder="digite o título do banner">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Subtítulo</label>
                                            <input id="subtitle" type="text" class="form-control"
                                                name="subtitle" value="{{ $banner->subtitle }}" required
                                                placeholder="digite o subtítulo do banner">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Botão para ação (call to action)</label>
                                            <input id="calltoaction" type="text" class="form-control"
                                                name="calltoaction" value="{{ $banner->calltoaction }}" required
                                                placeholder="digite o texto de chamada para ação">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Link</label>
                                            <input id="link" type="url" class="form-control"
                                                name="link" value="{{ $banner->link }}" required                                               required
                                                placeholder="digite o link que o botão deverá abrir/redirecionar">
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

                            {{  method_field('PUT') }}

                            <button type="submit" class="btn waves-effect waves-light btn-primary">
                                Salvar
                            </button>
                        </form>
                    </div>
                </div>

            </div>

            <div class="col-12 col-lg-6">
                @if(!empty($banner->image))
                    <img style="width: 100%; max-width: 600px; height: auto;"
                        src="{{ asset($banner->image) }}" alt="{{ $banner->place }}">
                @else
                    <img style="width: 100%; max-width: 600px; height: auto;"
                        src="{{ asset('images/banners/banners-image.jpg') }}" alt="{{ $banner->title }}">
                @endif
            </div>
        </div>
    </div>

@endsection
