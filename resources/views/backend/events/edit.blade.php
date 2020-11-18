@extends('layouts.app')

@section('title')
    Editar agenda - Área Restrita
@endsection

@section('breadcrumb')

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Editar agenda</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="/" class="text-muted">Painel</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Editar agenda</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="col-5 align-self-center">
                <div class="customize-input float-right">
                    <a href="{{ route('backend.events.index') }}"
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
                        <h4 class="card-title">Formulário para edição de agenda</h4>
                        <p>Dimensões recomendadas para a imagem ilustrativa:</p>
                        <ul>
                            <li>Largura: 600px</li>
                            <li>Altura: 748px</li>
                        </ul>

                        <form action="{{ route('backend.events.update', $event) }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-body">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Data</label>
                                            <input id="date" type="date" class="form-control"
                                                name="date" value="{{ $event->date }}" required autofocus
                                                placeholder="escolha a data desejada">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Local</label>
                                            <input id="place" type="text" class="form-control"
                                                name="place" value="{{ $event->place }}" required
                                                placeholder="escolha a data desejada">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Cidade</label>
                                            <input id="city" type="text" class="form-control"
                                                name="city" value="{{ $event->city }}" required
                                                placeholder="escolha a data desejada">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Estado</label>
                                            <input id="state" type="text" class="form-control"
                                                name="state" value="{{ $event->state }}" required                                               required
                                                placeholder="escolha a data desejada">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Link</label>
                                            <input id="link" type="url" class="form-control"
                                                name="link" value="{{ $event->link }}"
                                                placeholder="digite o link para redirecionamento">
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
                @if(!empty($event->image))
                    <img style="width: 100%; max-width: 600px; height: auto;"
                        src="{{ asset($event->image) }}" alt="{{ $event->place }}">
                @else
                    <img style="width: 100%; max-width: 600px; height: auto;"
                        src="{{ asset('images/events/events-image.jpg') }}" alt="{{ $event->place }}">
                @endif
            </div>
        </div>
    </div>

@endsection
