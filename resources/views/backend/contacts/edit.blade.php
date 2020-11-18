@extends('layouts.app')

@section('title')
    Contatos - Área Restrita
@endsection

@section('breadcrumb')

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 align-self-center">
                <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Contatos</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="/" class="text-muted">Painel</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Contatos

                            </li>
                        </ol>
                    </nav>
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
                <form action="@if(!empty($contacts)){{ route('backend.contacts.update', $contacts) }}@else{{ route('backend.contacts.store') }}@endif" method="POST">
                    <div class="form-body">
                        @if(!empty($contacts))
                            <input name="id" value="{{ $contacts->id }}" type="hidden"/>
                        @endif
                        <h4 class="card-title">Dados da empresa</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Título do Site</label>
                                    <input id="sitename" type="text" class="form-control"
                                    name="sitename" required autofocus
                                    value="@if(!empty($contacts)){{ $contacts->sitename }}@endif"
                                    placeholder="digite o nome do site">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nome Fantasia</label>
                                    <input id="trade_name" type="text" class="form-control"
                                    name="trade_name"
                                    value="@if(!empty($contacts)){{ $contacts->trade_name }}@endif"
                                    placeholder="digite o nome fantasia">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Razão Social</label>
                                    <input id="legal_name" type="text" class="form-control"
                                    name="legal_name"
                                    value="@if(!empty($contacts)){{ $contacts->sitename }}@endif"
                                    placeholder="digite a razão social">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>CNPJ</label>
                                    <input id="cnpj" type="text" class="form-control"
                                    name="cnpj"
                                    value="@if(!empty($contacts)){{ $contacts->cnpj }}@endif"
                                    placeholder="digite o CNPJ">
                                </div>
                            </div>
                        </div>
                        <h4 class="card-title">Dados de contato</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input id="email" type="text" class="form-control"
                                    name="email" required
                                    value="@if(!empty($contacts)){{ $contacts->email }}@endif"
                                    placeholder="digite o email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Telefone</label>
                                    <input id="phone_number" type="text" class="form-control"
                                    name="phone_number"
                                    value="@if(!empty($contacts)){{ $contacts->phone_number }}@endif"
                                    placeholder="digite o telefone">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Celular</label>
                                    <input id="cel_number" type="text" class="form-control"
                                    name="cel_number"
                                    value="@if(!empty($contacts)){{ $contacts->cel_number }}@endif"
                                    placeholder="digite o celular">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>WhatsApp</label>
                                    <input id="whatsapp" type="text" class="form-control"
                                    name="whatsapp"
                                    value="@if(!empty($contacts)){{ $contacts->whatsapp }}@endif"
                                    placeholder="digite o whatsapp">
                                </div>
                            </div>
                        </div>
                        <h4 class="card-title">Dados de localização</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Endereço</label>
                                    <input id="address" type="text" class="form-control"
                                    name="address"
                                    value="@if(!empty($contacts)){{ $contacts->address }}@endif"
                                    placeholder="digite o endereço">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Número</label>
                                    <input id="number" type="text" class="form-control"
                                    name="number"
                                    value="@if(!empty($contacts)){{ $contacts->number }}@endif"
                                    placeholder="digite o número">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Complemento</label>
                                    <input id="complement" type="text" class="form-control"
                                    name="complement"
                                    value="@if(!empty($contacts)){{ $contacts->complement }}@endif"
                                    placeholder="digite o complemento">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Bairro</label>
                                    <input id="neighborhood" type="text" class="form-control"
                                    name="neighborhood"
                                    value="@if(!empty($contacts)){{ $contacts->neighborhood }}@endif"
                                    placeholder="digite o bairro">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>CEP</label>
                                    <input id="zipcode" type="text" class="form-control"
                                    name="zipcode"
                                    value="@if(!empty($contacts)){{ $contacts->zipcode }}@endif"
                                    placeholder="digite o CEP">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Cidade</label>
                                    <input id="city" type="text" class="form-control"
                                    name="city"
                                    value="@if(!empty($contacts)){{ $contacts->city }}@endif"
                                    placeholder="digite a cidade">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Estado</label>
                                    <input id="state" type="text" class="form-control"
                                    name="state"
                                    value="@if(!empty($contacts)){{ $contacts->state }}@endif"
                                    placeholder="digite o estado">
                                </div>
                            </div>
                        </div>
                        <h4 class="card-title">Redes Sociais</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Facebook</label>
                                    <input id="facebook" type="url" class="form-control"
                                    name="facebook"
                                    value="@if(!empty($contacts)){{ $contacts->facebook }}@endif"
                                    placeholder="insira o link do Facebook">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Instagram</label>
                                    <input id="instagram" type="url" class="form-control"
                                    name="instagram"
                                    value="@if(!empty($contacts)){{ $contacts->instagram }}@endif"
                                    placeholder="insira o link do Instagram">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Youtube</label>
                                    <input id="youtube" type="url" class="form-control"
                                    name="youtube"
                                    value="@if(!empty($contacts)){{ $contacts->youtube }}@endif"
                                    placeholder="insira o link do Youtube">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Spotify</label>
                                    <input id="spotify" type="url" class="form-control"
                                    name="spotify"
                                    value="@if(!empty($contacts)){{ $contacts->spotify }}@endif"
                                    placeholder="insira o link do Spotify">
                                </div>
                            </div>
                        </div>

                    </div>

                    @csrf
                    @if(!empty($contacts))
                        {{  method_field('PUT') }}
                    @endif

                    <button type="submit" class="btn waves-effect waves-light btn-primary">Salvar</button>
                </form>
            </div>
        </div>

    </div>
</div>

@endsection
