@extends('layouts.app')

@section('title')
    Álbuns - Área Restrita
@endsection

@section('breadcrumb')

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Álbuns</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('backend.dashboard.index') }}" class="text-muted">Painel</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Álbuns</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="col-5 align-self-center">
                <div class="customize-input float-right">
                    <a href="{{ route('backend.albums.create') }}"
                        class="btn waves-effect waves-light btn-primary">
                        <span><i data-feather="plus-circle" class="svg-icon"></i></span>
                        Adicionar
                    </a>
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
                @if(!empty($albums))
                    <div class="table-responsive">
                        <table id="default_table" class="table table-striped table-bordered no-wrap">
                            <thead>
                                <tr>
                                    <th class="col-1">ID</th>
                                    <th class="col-5">Título</th>
                                    <th class="col-2">Ano</th>
                                    <th class="col-2">Tipo</th>
                                    <th class="col-2">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($albums as $album)
                                    <tr>
                                        <td class="col-1">{{ $album->id }}</td>
                                        <td class="col-2">{{ $album->title }}</td>
                                        <td class="col-2">{{ $album->year }}</td>
                                        <td class="col-2">{{ $album->type }}</td>
                                        <td class="col-2">
                                            @can('edit-albums')
                                            <a href="{{ route('backend.albums.edit', $album->id) }}" class="float-left" data-toggle="tooltip" title="Editar">
                                                <button type="button" class="btn btn-warning mr-2 mb-lg-0 mb-2" style="font-size: 0.8rem;">
                                                    <span><i data-feather="edit" class="svg-icon"></i></span>
                                                </button>
                                            </a>
                                            @endcan
                                            @can('delete-albums')
                                            <form action="{{ route('backend.albums.destroy', $album) }}" method="POST" class="float-left" data-toggle="tooltip" title="Excluir">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger" style="font-size: 0.8rem;">
                                                    <span><i data-feather="trash-2" class="svg-icon"></i></span>
                                                </button>
                                            </form>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="col-1">ID</th>
                                    <th class="col-5">Título</th>
                                    <th class="col-2">Ano</th>
                                    <th class="col-2">Tipo</th>
                                    <th class="col-2">Ações</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                @else
                    Não existem álbuns cadastrados.
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
