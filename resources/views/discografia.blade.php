@extends('frontend.layout-default')

@section('title')
    Discografia - Lucas Akira e Fábio
@endsection

@section('content')

<!-- ##### Breadcumb Area Start ##### -->
<section class="breadcumb-area bg-img bg-overlay"
    style="background-image: url(images/frontend/bg-img/bg-01.jpg);">
    <div class="bradcumbContent">
        <p>Confira nossos álbuns</p>
        <h2>Discografia</h2>
    </div>
</section>
<!-- ##### Breadcumb Area End ##### -->

<!-- ##### Album Catagory Area Start ##### -->
<section class="album-catagory section-padding-100-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="browse-by-catagories catagory-menu d-flex flex-wrap align-items-center mb-70">
                    <a href="#" data-filter="*">Todos</a>
                    <a href="#" data-filter=".2011">2011</a>
                    <a href="#" data-filter=".2013">2013</a>
                    <a href="#" data-filter=".2015">2015</a>
                    <a href="#" data-filter=".2017">2017</a>
                    <a href="#" data-filter=".2018">2018</a>
                    <a href="#" data-filter=".2019">2019</a>

                </div>
            </div>
        </div>

        <div class="row oneMusic-albums">

            <!-- Single Album -->
            <div class="col-12 col-sm-4 col-md-3 col-lg-2 single-album-item 2011">
                <div class="single-album">
                    <img src="images/frontend/albuns/segredo.jpg" alt="">
                    <div class="album-info">
                        <a href="#">
                            <h5>Segredo - Álbum</h5>
                        </a>
                        <p>2011</p>
                    </div>
                </div>
            </div>

            <!-- Single Album -->
            <div class="col-12 col-sm-4 col-md-3 col-lg-2 single-album-item 2013">
                <div class="single-album">
                    <img src="images/frontend/albuns/a-fera.jpg" alt="">
                    <div class="album-info">
                        <a href="#">
                            <h5>A Fera - Álbum</h5>
                        </a>
                        <p>2013</p>
                    </div>
                </div>
            </div>

            <!-- Single Album -->
            <div class="col-12 col-sm-4 col-md-3 col-lg-2 single-album-item 2015">
                <div class="single-album">
                    <img src="images/frontend/albuns/e-agora.jpg" alt="">
                    <div class="album-info">
                        <a href="#">
                            <h5>E agora - Single</h5>
                        </a>
                        <p>2015</p>
                    </div>
                </div>
            </div>

            <!-- Single Album -->
            <div class="col-12 col-sm-4 col-md-3 col-lg-2 single-album-item 2017">
                <div class="single-album">
                    <img src="images/frontend/albuns/deu-ruim.jpg" alt="">
                    <div class="album-info">
                        <a href="#">
                            <h5>Deu Ruim - Single</h5>
                        </a>
                        <p>2017</p>
                    </div>
                </div>
            </div>

            <!-- Single Album -->
            <div class="col-12 col-sm-4 col-md-3 col-lg-2 single-album-item 2018">
                <div class="single-album">
                    <img src="images/frontend/albuns/oposto.jpg" alt="">
                    <div class="album-info">
                        <a href="#">
                            <h5>Oposto - Single</h5>
                        </a>
                        <p>2018</p>
                    </div>
                </div>
            </div>

            <!-- Single Album -->
            <div class="col-12 col-sm-4 col-md-3 col-lg-2 single-album-item 2018">
                <div class="single-album">
                    <img src="images/frontend/albuns/exagera.jpg" alt="">
                    <div class="album-info">
                        <a href="#">
                            <h5>Exagera - Single</h5>
                        </a>
                        <p>2018</p>
                    </div>
                </div>
            </div>

            <!-- Single Album -->
            <div class="col-12 col-sm-4 col-md-3 col-lg-2 single-album-item 2019">
                <div class="single-album">
                    <img src="images/frontend/albuns/ao-vivo.jpg" alt="">
                    <div class="album-info">
                        <a href="#">
                            <h5>Ao Vivo - Álbum</h5>
                        </a>
                        <p>2019</p>
                    </div>
                </div>
            </div>


        </div>
    </div>
</section>
<!-- ##### Album Category Area End ##### -->

@endsection
