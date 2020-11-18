@extends('frontend.layout-default')

@section('title')
    {{ $page->menu }} - @if(!empty($contacts)){{ $contacts->sitename }}@endif
@endsection

@section('content')

<!-- ##### Breadcumb Area Start ##### -->
<section class="breadcumb-area bg-img bg-overlay"
    style="background-image: url(images/frontend/bg-img/bg-01.jpg);">
    <div class="bradcumbContent">
        <p>{{ $page->subtitle }}</p>
        <h2>{{ $page->title }}</h2>
    </div>
</section>
<!-- ##### Breadcumb Area End ##### -->

<!-- ##### Contact Area Start ##### -->
<section class="contact-area section-padding-100-0">
    <div class="container">
        <div class="row">

            <div class="col-12 col-lg-4">
                <div class="contact-content mb-100">
                    <!-- Title -->
                    <div class="contact-title mb-50">
                        <h5>Dados de contato</h5>
                    </div>

                    @if(!empty($contacts->address))
                    <!-- Single Contact Info -->
                    <div class="single-contact-info d-flex align-items-center">
                        <div class="icon mr-30">
                            <span class="icon-placeholder"></span>
                        </div>
                        <p>
                            @if(!empty($contacts->address))
                                @if(!empty($contacts->address)){{ $contacts->address }},@endif @if(!empty($contacts->number))nº {{ $contacts->number }}@endif
                                <br/>
                            @endif
                            @if(!empty($contacts->complement))
                                @if(!empty($contacts->complement)){{ $contacts->complement }},@endif @if(!empty($contacts->neighborhood)){{ $contacts->neighborhood }}@endif
                                <br/>
                                @if(!empty($contacts->zipcode))CEP: {{ $contacts->zipcode }} -@endif @if(!empty($contacts->city)){{ $contacts->city }} /@endif @if(!empty($contacts->state)){{ $contacts->state }}@endif
                            @else
                                @if(!empty($contacts->neighborhood)){{ $contacts->neighborhood }},@endif @if(!empty($contacts->city)){{ $contacts->city }} /@endif @if(!empty($contacts->state)){{ $contacts->state }}@endif
                                <br/>
                                @if(!empty($contacts->zipcode))CEP: {{ $contacts->zipcode }}@endif
                            @endif
                        </p>
                    </div>
                    @endif

                    @if(!empty($contacts->cel_number))
                    <!-- Single Contact Info -->
                    <div class="single-contact-info d-flex align-items-center">
                        <div class="icon mr-30">
                            <span class="icon-smartphone"></span>
                        </div>
                        <p>
                            <a style="color: #5f5f5f; font-weight: normal;"
                                href="tel:+55{{
                                trim(
                                    str_replace(["(", ")", " ", "-"], '', $contacts->cel_number)
                                ) }}">
                                {{ $contacts->cel_number }}
                            </a>
                        </p>
                    </div>
                    @endif

                    @if(!empty($contacts->whatsapp))
                    <!-- Single Contact Info -->
                    <div class="single-contact-info d-flex align-items-center">
                        <div class="icon mr-30">
                            <span class="icon-chat"></span>
                        </div>
                        <p>
                            <a style="color: #5f5f5f; font-weight: normal;" target="_blank"
                                href="https://api.whatsapp.com/send?phone=55{{
                                trim(
                                    str_replace(["(", ")", " ", "-"], '', $contacts->whatsapp)
                                ) }}&text=Ol%C3%A1!%20Entro%20em%20contato%20atrav%C3%A9s%20do%20site%20oficial%20Lucas%20Akira%20e%20F%C3%A1bio!">
                                {{ $contacts->whatsapp }}
                            </a>
                        </p>
                    </div>
                    @endif

                    @if(!empty($contacts->email))
                    <!-- Single Contact Info -->
                    <div class="single-contact-info d-flex align-items-center">
                        <div class="icon mr-30">
                            <span class="icon-mail"></span>
                        </div>
                        <p>
                            <a style="color: #5f5f5f; font-weight: normal;"
                            href="mailto:{{ $contacts->email }}">{{ $contacts->email }}</a>
                        </p>
                    </div>
                    @endif

                    <!-- Contact Social Info -->
                    <div class="contact-social-info mt-50">
                        @if(!empty($contacts->facebook))
                        <a target="_blank" href="{{ $contacts->facebook }}" data-toggle="tooltip" data-placement="top" title="Facebook">
                            <i class="fa fa-facebook" aria-hidden="true"></i>
                        </a>
                        @endif
                        @if(!empty($contacts->instagram))
                        <a target="_blank" href="{{ $contacts->instagram }}" data-toggle="tooltip" data-placement="top" title="Instagram">
                            <i class="fa fa-instagram" aria-hidden="true"></i>
                        </a>
                        @endif
                        @if(!empty($contacts->youtube))
                        <a target="_blank" href="{{ $contacts->youtube }}" data-toggle="tooltip" data-placement="top" title="YouTube">
                            <i class="fa fa-youtube" aria-hidden="true"></i>
                        </a>
                        @endif
                        @if(!empty($contacts->spotify))
                        <a target="_blank" href="{{ $contacts->spotify }}" data-toggle="tooltip" data-placement="top" title="Spotify">
                            <i class="fa fa-spotify" aria-hidden="true"></i>
                        </a>
                        @endif
                    </div>

                </div>
            </div>

            <div class="col-12 col-lg-8">
                <!-- ##### Google Maps ##### -->
                <div class="mb-100">
                    <img src="images/frontend/layout/laef-contato.jpeg"/>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- ##### Contact Area End ##### -->


@endsection
