@extends('frontend.layout-home')

@section('title')
    @if(!empty($contacts)){{ $contacts->sitename }}@endif
@endsection

@section('content')

<!-- ##### Hero Area Start ##### -->
<section class="hero-area">
    <div class="hero-slides owl-carousel">

        @foreach($banners as $banner)
        <!-- Single Hero Slide -->
        <div class="single-hero-slide d-flex align-items-center justify-content-center">
            <!-- Slide Img -->
            <div class="slide-img bg-img" style="background-image: url({{ asset($banner->image) }});"></div>
            <!-- Slide Content -->
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="hero-slides-content text-center">
                            <h6 data-animation="fadeInUp" data-delay="100ms">{{ $banner->subtitle }}</h6>
                            <h2 data-animation="fadeInUp" data-delay="300ms">{{ $banner->title }}<span>{{ $banner->title }}</span></h2>
                            <a data-animation="fadeInUp" data-delay="500ms"
                                href="{{ $banner->link }}" target="_blank"
                                class="btn oneMusic-btn mt-50">{{ $banner->calltoaction }}<i class="fa fa-angle-double-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

</section>
<!-- ##### Hero Area End ##### -->

<!-- ##### Latest Albums Area Start ##### -->
<section class="latest-albums-area section-padding-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading style-2">
                    <p>Conheça a nossa discografia</p>
                    <h2>Álbuns</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">

            @foreach($albums as $album)
            <div class="col-12 col-sm-6 col-md-4 col-lg-2 text-center">
                <div class="single-album-area wow fadeInUp" data-wow-delay="200ms" style="visibility: visible; animation-delay: 200ms; animation-name: fadeInUp;">
                    <div class="album-thumb">
                        <a @if(!empty($album->link)) href="{{ $album->link }}" target="_blank" @endif>
                        @if($album->image)
                            <img src="{{ asset($album->image) }}" alt="{{ $album->title }}">
                        @else
                            <img src="{{ asset('images/albums/albums-image.jpg') }}" alt="{{ $album->title }}">
                        @endif
                        </a>
                    </div>
                    <div class="album-info">
                        <a @if(!empty($album->link)) href="{{ $album->link }}" target="_blank" @endif>
                            <h5>{{ $album->title }}</h5>
                        </a>
                        <p>{{ $album->year }} - {{ $album->type }}</p>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
<!-- ##### Latest Albums Area End ##### -->

<!-- ##### Featured Artist Area Start ##### -->
<section class="featured-artist-area section-padding-100 bg-img bg-overlay bg-fixed" style="background-image: url(images/frontend/backgrounds/background01.jpg);">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-12 col-md-5 col-lg-4">
                <div class="featured-artist-thumb">
                    <img src="images/frontend/layout/coracao-durao.jpg" alt="">
                </div>
            </div>
            <div class="col-12 col-md-7 col-lg-8">
                <div class="featured-artist-content">
                    <!-- Section Heading -->
                    <div class="section-heading white text-left mb-30">
                        <p>{{ $page->subtitle }}</p>
                        <h2>{{ $page->title }}</h2>
                    </div>
                    {!! $page->content !!}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Featured Artist Area End ##### -->

@endsection
