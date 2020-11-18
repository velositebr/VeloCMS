@extends('layouts.app')

@section('title')
    Editar {{ $user->name }} - Área Restrita
@endsection

@section('breadcrumb')

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Editar {{ $user->name }}</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="/" class="text-muted">Painel</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Editar usuário</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="col-5 align-self-center">
                <div class="customize-input float-right">
                    <a href="{{ route('backend.users.index') }}"
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
                        <h4 class="card-title">Formulário de edição</h4>

                        <div class="row">
                            <div class="col-12 col-md-6">
                                <form action="{{ route('backend.users.update', $user) }}" method="POST" enctype="multipart/form-data">
                                    <div class="form-body">
                                        <label>Nome</label>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input id="name" type="text" class="form-control
                                                        @error('name') is-invalid @enderror"
                                                        name="name" value="{{ $user->name }}"
                                                        required autofocus
                                                        placeholder="digite seu nome">

                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <label>E-mail</label>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input id="email" type="email" class="form-control
                                                        @error('email') is-invalid @enderror"
                                                        name="email" value="{{ $user->email }}"
                                                        required autocomplete="email"
                                                        placeholder="digite seu e-mail">

                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <label>Senha</label>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input id="password" type="password" class="form-control
                                                        @error('password') is-invalid @enderror"
                                                        name="password" value=""
                                                        autocomplete="new-password"
                                                        placeholder="digite a senha">

                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <label>Confirme a senha</label>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input id="password-confirm" type="password" class="form-control"
                                                        name="password_confirmation" value=""
                                                        autocomplete="new-password"
                                                        placeholder="digite a senha novamente">
                                                </div>
                                            </div>
                                        </div>

                                        <label>Foto</label>
                                        <div class="input-group mb-3">
                                            <div class="custom-file">
                                                <input type="file" name="avatar" class="custom-file-input" id="inputGroupFile01">
                                                <label class="custom-file-label" for="inputGroupFile01">Selecionar arquivo</label>
                                            </div>
                                        </div>

                                        <label>Grupos</label>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    @foreach($roles as $role)
                                                        <div class="form-check form-check-inline">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox"  class="custom-control-input"
                                                                    name="roles[]" value="{{ $role->id }}"
                                                                    id="customCheck{{ $role->id }}"
                                                                    @if($user->roles->pluck('id')->contains($role->id)) checked
                                                                    @endif>
                                                                <label class="custom-control-label"
                                                                    for="customCheck{{ $role->id }}">
                                                                    {{ $role->name }}
                                                                </label>
                                                                </div>
                                                        </div>
                                                    @endforeach

                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    @csrf
                                    {{  method_field('PUT') }}

                                    <button type="submit" class="btn waves-effect waves-light btn-primary">Atualizar</button>
                                </form>

                            </div>
                            <div class="col-12 col-md-6 mt-md-0 mt-4">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <img class="rounded-circle" style="max-width: 250px; max-height: 250px;" width="100%"
                                        src="{{ asset($user->avatar) }}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
