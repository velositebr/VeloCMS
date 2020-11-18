@extends('layouts.app')

@section('title')
    Páginas - Área Restrita
@endsection

@section('breadcrumb')

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 align-self-center">
                <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Páginas</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="/" class="text-muted">Painel</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Páginas</li>
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
                <div class="table-responsive">
                    <table id="default_table" class="table table-striped table-bordered no-wrap">
                        <thead>
                            <tr>
                                <th class="col-5">Título</th>
                                <th class="col-5">Última atualização</th>
                                <th class="col-2">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pages as $page)
                                <tr>
                                    <td class="col-5">{{ $page['menu'] }}</td>
                                    <td class="col-5">{{ date_format($page->updated_at, 'd/m/Y') . ' às ' . date_format($page->updated_at, 'H:i:s') }}</td>
                                    <td class="col-2 text-center">
                                        @can('edit-pages')
                                        <a href="{{ route('backend.pages.edit', $page['id']) }}" class="float-left" data-toggle="tooltip" title="Editar">
                                            <button type="button" class="btn btn-warning mr-2 mb-lg-0 mb-2" style="font-size: 0.8rem;">
                                                <span><i data-feather="edit" class="svg-icon"></i></span>
                                            </button>
                                        </a>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="col-5">Título</th>
                                <th class="col-5">Última atualização</th>
                                <th class="col-2">Ações</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
