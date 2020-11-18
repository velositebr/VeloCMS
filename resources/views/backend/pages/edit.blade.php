@extends('layouts.app')

@section('title')
    Páginas - Área Restrita
@endsection

@section('breadcrumb')

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Editar página: {{ $page->menu }}</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="/" class="text-muted">Painel</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Páginas</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="col-5 align-self-center">
                <div class="customize-input float-right">
                    <a href="{{ route('backend.pages.index') }}"
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


<div class="row">
    <div class="col-12">

        <div class="card">
            <div class="card-body">
                <form action="{{ route('backend.pages.update', $page) }}" method="POST">
                    <div class="form-body">
                        <input name="id" value="{{ $page->id }}" type="hidden"/>

                        <label>Título do menu</label>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input id="menu" type="text" class="form-control"
                                        name="menu" value="{{ $page->menu }}" required
                                        placeholder="digite o título do menu">
                                </div>
                            </div>
                        </div>

                        <label>Título</label>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input id="title" type="text" class="form-control"
                                        name="title" value="{{ $page->title }}"
                                        placeholder="digite o título principal">
                                </div>
                            </div>
                        </div>

                        <label>Subtítulo</label>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input id="subtitle" type="text" class="form-control"
                                        name="subtitle" value="{{ $page->subtitle }}"
                                        placeholder="digite o subtítulo">
                                </div>
                            </div>
                        </div>

                        @if($page->type == "text")
                            <label>Conteúdo</label>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="form-control" id="content" name="content"
                                        rows="3" placeholder="Digite o conteúdo da página">{!! $page->content !!}</textarea>
                                    </div>
                                </div>
                            </div>
                        @elseif($page->type == "link")
                            <label>Link</label>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="url" class="form-control" id="link"
                                        name="link" value="{{ $page->link }}"
                                        placeholder="Digite o link para redirecionamento">
                                    </div>
                                </div>
                            </div>
                        @elseif($page->type == "code")
                            <label>Código</label>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="form-control" id="code" name="code"
                                        rows="3" placeholder="Digite o código a ser carregado">{!! $page->code !!}</textarea>
                                    </div>
                                </div>
                            </div>

                        @endif

                    @csrf
                    @if(!empty($page))
                        {{  method_field('PUT') }}
                    @endif

                    <button type="submit" class="btn waves-effect waves-light btn-primary">Salvar</button>
                </form>
            </div>
        </div>

    </div>
</div>

@endsection


@section('extra-js')

    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'content', {
            filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    </script>

@endsection
