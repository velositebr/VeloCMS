@extends('frontend.layout-default')

@section('title')
    {{ $page->menu }} - @if(!empty($contacts)){{ $contacts->sitename }}@endif
@endsection

@section('content')

<!-- ##### Breadcumb Area Start ##### -->
<section class="breadcumb-area bg-img bg-overlay"
    style="background-image: url(images/frontend/bg-img/bg-03.jpg);">
    <div class="bradcumbContent">
        <p>{{ $page->subtitle }}</p>
        <h2>{{ $page->title }}</h2>
    </div>
</section>
<!-- ##### Breadcumb Area End ##### -->

<!-- ##### Events Area Start ##### -->
<section class="events-area section-padding-100">
    <div class="container">
        <div class="row">
            @if(!empty($events))
                @foreach($events as $event)
                <!-- Single Event Area -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-event-area mb-30">
                        <div class="event-thumbnail">
                            @if(!empty($event->image))
                                <img src="{{ asset($event->image) }}" alt="{{ $event->place }}">
                            @else
                                <img src="{{ asset('images/events/events-image.jpg') }}" alt="{{ $event->place }}">
                            @endif
                        </div>
                        <div class="event-text">
                            <h4>{{ $event->place }}</h4>
                            <div class="event-meta-data">
                                <a class="event-place">{{ $event->city }} - {{ $event->state }}</a>
                                <a class="event-date">{{ date('d/m/Y', strtotime($event->date)) }}</a>
                            </div>
                            @if(!empty($event->link))
                                <a target="_blank" href="{{ $event->link }}" class="btn see-more-btn">Saiba mais</a>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <div class="section-heading style-2">
                    <p>Não existem banners cadastrados.</p>
                </div>
            @endif

        </div>

    </div>
</section>
<!-- ##### Events Area End ##### -->

@endsection
