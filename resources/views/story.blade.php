@extends('include.front_header')
@section('main_content')
<section class="wpo-page-title">
    <div class="container">
        <div class="row">
            <div class="col col-xs-12">
                <div class="wpo-breadcumb-wrap">
                    <h2>Story</h2>
                    <ol class="wpo-breadcumb-wrap">
                        <li><a href="index-2.html">Home</a></li>
                        <li>Story</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="story-section section-padding" id="story">
    <div class="container">
        <div class="row">
            <div class="wpo-section-title">
                <div class="section-title-icon">
                    <i class="fi flaticon-dove"></i>
                </div>
                <h2>Our Sweet Story</h2>
            </div>
        </div>
        <div class="row">
            <div class="col col-xs-12">
                <div class="story-timeline">
                    <div class="row">
                        <div class="col offset-lg-6 col-lg-6 col-12 text-holder">
                            <span class="heart">
                                <i class="fi flaticon-balloon"></i>
                            </span>
                        </div>
                    </div>
                    @if(!$stories->isEmpty())
                        @foreach($stories as $key => $val)
                            @if($key%2 == 0)
                                <div class="story-timeline-item">
                                    <div class="row align-items-center">
                                        <div class="col col-lg-6 col-12 order-lg-1 order-2 text-holder left-text">
                                            <div class="story-text right-align-text wow fadeInLeftSlow"
                                                data-wow-duration="2000ms">
                                                <h3>{{ $val->title }}</h3>
                                                <span class="date">{{ date('d M, Y',strtotime($val->date)) }}</span>
                                                <div class="line-shape s2">
                                                    <div class="outer-ball">
                                                        <div class="inner-ball"></div>
                                                    </div>
                                                </div>
                                                <p>{{ $val->description }}</p>
                                            </div>
                                        </div>
                                        <div class="col col-lg-6 col-12 order-lg-2 order-1">
                                            <div class="img-holder left-align-text">
                                                <img src="{{ asset('uploads/story/'.$val->avatar) }}" alt class="img img-responsive wow fadeInRightSlow" data-wow-duration="1500ms">
                                                <span class="heart">
                                                    <i class="fi flaticon-dance"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="story-timeline-item s1">
                                    <div class="row align-items-center">
                                        <div class="col col-lg-6 col-12">
                                            <div class="img-holder right-align-text wow fadeInLeftSlow"
                                                data-wow-duration="1500ms">
                                                <img src="{{ asset('uploads/story/'.$val->avatar) }}" alt class="img img-responsive">
                                            </div>
                                        </div>
                                        <div class="col col-lg-6 col-12">
                                            <div class="story-text left-align-text wow fadeInRightSlow" data-wow-duration="2000ms">
                                                <h3>{{ $val->title }}</h3>
                                                <span class="date">{{ date('d M, Y',strtotime($val->date)) }}</span>
                                                <div class="line-shape">
                                                    <div class="outer-ball">
                                                        <div class="inner-ball"></div>
                                                    </div>
                                                </div>
                                                <p>{{ $val->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
