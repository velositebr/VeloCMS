@extends('frontend.layout-default')

@section('title')
    {{ $page->menu }} - @if(!empty($contacts)){{ $contacts->sitename }}@endif
@endsection

@section('content')

<!-- ##### Breadcumb Area Start ##### -->
<section class="breadcumb-area bg-img bg-overlay"
    style="background-image: url(images/frontend/bg-img/bg-02.jpg);">
    <div class="bradcumbContent">
        <p>{{ $page->subtitle }}</p>
        <h2>{{ $page->title }}</h2>
    </div>
</section>
<!-- ##### Breadcumb Area End ##### -->

<!-- ##### Fotos Area Start ##### -->
<section class="events-area section-padding-100">
    <div class="container">
        <div class="row">

            {!! $page->code !!}

        </div>

    </div>
</section>
<!-- ##### Events Area End ##### -->

@endsection
