@extends('include.front_header')
@section('main_content')
<section class="wpo-page-title">
    <div class="container">
        <div class="row">
            <div class="col col-xs-12">
                <div class="wpo-breadcumb-wrap">
                    <h2>Gallery</h2>
                    <ol class="wpo-breadcumb-wrap">
                        <li><a href="index-2.html">Home</a></li>
                        <li>Gallery</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="wpo-portfolio-section section-padding" id="gallery">
    <div class="container">
        <div class="row">
            <div class="wpo-section-title">
                <div class="section-title-icon">
                    <i class="fi flaticon-dove"></i>
                </div>
                <h2>Sweet Captured Moments</h2>
            </div>
        </div>
        <div class="sortable-gallery">
            <div class="gallery-filters"></div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="portfolio-grids gallery-container clearfix">
                            @if(!$photos->isEmpty())
                                @foreach($photos as $key => $val)
                                    <div class="grid">
                                        <div class="img-holder">
                                            <a href="{{ asset('uploads/photo/'.$val->avatar) }}" class="fancybox" data-fancybox-group="gall-1">
                                                <img src="{{ asset('uploads/photo/'.$val->avatar) }}" alt class="img img-responsive">
                                                <div class="hover-content">
                                                    <i class="ti-plus"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
        </div>
    </div>
</section>
@endsection
