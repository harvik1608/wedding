@extends('include.front_header')
@section('main_content')
<section class="wpo-page-title">
    <div class="container">
        <div class="row">
            <div class="col col-xs-12">
                <div class="wpo-breadcumb-wrap">
                    <h2>Couple</h2>
                    <ol class="wpo-breadcumb-wrap">
                        <li><a href="index-2.html">Home</a></li>
                        <li>Couple</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="couple-section-s2 section-padding" id="couple">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col col-lg-11">
                        <div class="couple-area clearfix">
                            <div class="couple-item bride">
                                <div class="row align-items-center">
                                    <div class="col-lg-4">
                                        <div class="couple-img">
                                            <img src="{{ asset('uploads/settings/'.$bride_photo) }}" alt="">
                                            <div class="couple-shape">
                                                <img src="{{ asset('website/assets/images/couple/shape-3.png') }}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="couple-text">
                                            <h3>{{ $bride_name }}</h3>
                                            <p>{{ $about_bride }}</p>
                                            <div class="social">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="couple-item groom">
                                <div class="row align-items-center">
                                    <div class="col-lg-7 order-lg-1 order-2">
                                        <div class="couple-text">
                                            <h3>{{ $groom_name }}</h3>
                                            <p>{{ $about_groom }}</p>
                                            <div class="social">
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 order-lg-2 order-1">
                                        <div class="couple-img">
                                            <img src="{{ asset('uploads/settings/'.$groom_photo) }}" alt="">
                                            <div class="couple-shape">
                                                <img src="{{ asset('website/assets/images/couple/shape-4.png') }}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
