@extends('layouts.forms')

@section('title')
    Cadastre-se - Área Restrita
@endsection

@section('content')

<div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative"
style="background:url({{ asset('images/backend/auth-bg.jpg') }}) no-repeat center center; background-size: cover;">
    <div class="auth-box row">
        <div class="col-lg-7 col-md-5 modal-bg-img" style="background-image: url({{ asset('images/backend/form-image.jpg') }});">
        </div>
        <div class="col-lg-5 col-md-7 bg-white">
            <div class="p-3">
                <div class="text-center">
                    <img src="images/backend/logo.png" alt="Logo">
                </div>
                <h2 class="mt-3 text-center">Cadastre-se</h2>
                <p class="text-center">Preencha seus dados para se cadastrar.</p>
                <form class="mt-4" method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="text-dark" for="name">Nome</label>
                                <input class="form-control @error('name') is-invalid @enderror"
                                    id="name" type="text"
                                    name="name" value="{{ old('name') }}"
                                    required autocomplete="name" autofocus
                                    placeholder="digite seu nome">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="text-dark" for="email">E-mail</label>
                                <input class="form-control @error('email') is-invalid @enderror"
                                    id="email" type="email"
                                    name="email" value="{{ old('email') }}"
                                    required autocomplete="email"
                                    placeholder="digite seu e-mail">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="text-dark" for="password">Senha</label>

                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    name="password"
                                    required autocomplete="new-password"
                                    placeholder="digite a sua senha">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="text-dark" for="password-confirm">Confirme a senha</label>

                                <input id="password-confirm" type="password"
                                    class="form-control"
                                    name="password_confirmation"
                                    required autocomplete="new-password"
                                    placeholder="digite a sua senha novamente">
                            </div>

                        </div>
                        <div class="col-lg-12 text-center">
                            <button type="submit" class="btn btn-block btn-dark">Cadastrar</button>
                        </div>

                        <div class="col-lg-12 text-center mt-3">
                            Já possui conta?<br>
                            <a href="/login" class="btn btn-link">Acessar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
