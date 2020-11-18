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

<!-- ##### Contact Area Start ##### -->
<section class="contact-area section-padding-100-0">
    <div class="container">
        <div class="row">

            <div class="col-12 col-lg-12">
                <div class="contact-content mb-100">
                    {!! $page->content !!}
                </div>
            </div>

        </div>
    </div>
</section>
<!-- ##### Contact Area End ##### -->

@endsection
