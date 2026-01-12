@extends('include.front_header')
@section('main_content')
<section class="wpo-page-title">
    <div class="container">
        <div class="row">
            <div class="col col-xs-12">
                <div class="wpo-breadcumb-wrap">
                    <h2>Bridesmaids & Groomsmen</h2>
                    <ol class="wpo-breadcumb-wrap">
                        <li><a href="index-2.html">Home</a></li>
                        <li>Bridesmaids & Groomsmen</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="wpo-team-section section-padding">
            <div class="container">
                <div class="row">
                    <div class="wpo-section-title">
                        <div class="section-title-icon">
                            <i class="fi flaticon-dove"></i>
                        </div>
                        <h2>Groomsmen</h2>
                    </div>
                </div>
                <div class="wpo-team-wrap">
                    <div class="row">
                        @if(!$groom_hosts->isEmpty())
                            @foreach($groom_hosts as $key => $val)
                                <div class="col col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="wpo-team-item">
                                        <div class="wpo-team-img">
                                            <div class="wpo-team-img-inner">
                                                <img src="{{ asset('uploads/host/'.$val->avatar) }}" alt="">
                                            </div>
                                            <div class="shape-1"><img src="{{ asset('website/assets/images/team/shape1.jpg') }}" alt=""></div>
                                            <div class="shape-2"><img src="{{ asset('website/assets/images/team/shape2.jpg') }}" alt=""></div>
                                        </div>
                                        <div class="wpo-team-text">
                                            <h3><a href="javascript:;">{{ $val->name }}</a></h3>
                                            <span>{{ $val->relation }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="wpo-section-title">
                        <div class="section-title-icon">
                            <i class="fi flaticon-dove"></i>
                        </div>
                        <h2>Bridesmaids</h2>
                    </div>
                </div>
                <div class="wpo-team-wrap">
                    <div class="row">
                        @if(!$bride_hosts->isEmpty())
                            @foreach($bride_hosts as $key => $val)
                                <div class="col col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="wpo-team-item">
                                        <div class="wpo-team-img">
                                            <div class="wpo-team-img-inner">
                                                <img src="{{ asset('uploads/host/'.$val->avatar) }}" alt="">
                                            </div>
                                            <div class="shape-1"><img src="{{ asset('website/assets/images/team/shape1.jpg') }}" alt=""></div>
                                            <div class="shape-2"><img src="{{ asset('website/assets/images/team/shape2.jpg') }}" alt=""></div>
                                        </div>
                                        <div class="wpo-team-text">
                                            <h3><a href="javascript:;">{{ $val->name }}</a></h3>
                                            <span>{{ $val->relation }}</span>
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
