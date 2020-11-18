@extends('frontend.layout-default')

@section('title')
    Vídeos - Lucas Akira e Fábio
@endsection

@section('content')

<!-- ##### Breadcumb Area Start ##### -->
<section class="breadcumb-area bg-img bg-overlay"
    style="background-image: url(images/frontend/bg-img/bg-01.jpg);">
    <div class="bradcumbContent">
        <p>Confira nossos últimos</p>
        <h2>Vídeos</h2>
    </div>
</section>
<!-- ##### Breadcumb Area End ##### -->

<!-- ##### Contact Area Start ##### -->
<section class="videos-area section-padding-100-100">
    <div class="container">
        <div class="row">

            <div class="col-12 col-lg-6">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/Yb46bHkyuYM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>

            <div class="col-12 col-lg-6">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/dqRxLpG95hY" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>

        </div>
    </div>
</section>
<!-- ##### Contact Area End ##### -->


@endsection
