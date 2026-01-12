@extends('include.front_header')
@section('main_content')
<section class="wpo-page-title">
    <div class="container">
        <div class="row">
            <div class="col col-xs-12">
                <div class="wpo-breadcumb-wrap">
                    <h2>When & Where</h2>
                    <ol class="wpo-breadcumb-wrap">
                        <li><a href="index-2.html">Home</a></li>
                        <li>Event</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="wpo-event-section-s2 section-padding">
    <div class="container">
        <div class="row">
            <div class="wpo-section-title">
                <div class="section-title-icon">
                    <i class="fi flaticon-dove"></i>
                </div>
                <h2>When & Where</h2>
            </div>
        </div>
        <div class="wpo-event-wrap">
            <div class="row">
                @if(!$events->isEmpty())
                    @foreach($events as $event)
                        <div class="col col-lg-4 col-md-6 col-12">
                            <div class="wpo-event-item">
                                <div class="wpo-event-text">
                                    <h2>{{ $event->name }}</h2>
                                    <ul>
                                        <li>Monday, {{ date('d M, Y',strtotime($event->date)) }} <br>{{ date('h:i A',strtotime($event->start_time)) }} – {{ date('h:i A',strtotime($event->end_time)) }}</li>
                                        <li>{{ $event->address }}</li>
                                        <li><a href="tel: {{ $event->contact_no }}">{{ $event->contact_no }}</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
