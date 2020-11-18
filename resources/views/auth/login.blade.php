@extends('layouts.forms')

@section('title')
    Login - Área Restrita
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
                <h2 class="mt-3 text-center">Área Restrita</h2>
                <p class="text-center">Faça seu login para acessar as informações restritas.</p>
                <form class="mt-4" method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="text-dark" for="email">E-mail</label>
                                <input class="form-control @error('email') is-invalid @enderror"
                                    id="email" type="email"
                                    name="email" value="{{ old('email') }}"
                                    required autocomplete="email" autofocus
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
                                    required autocomplete="current-password"
                                    placeholder="digite a sua senha">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12 text-center">
                            <button type="submit" class="btn btn-block btn-dark">Acessar</button>
                        </div>
                        <div class="col-lg-12 text-center">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link text-danger" href="{{ route('password.request') }}">
                                    Esqueceu sua senha?
                                </a>
                            @endif
                        </div>
                        <div class="col-lg-12 text-center mt-3">
                            Ainda não possui conta?<br>
                            <a href="/register" class="btn btn-link">Cadastre-se</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
