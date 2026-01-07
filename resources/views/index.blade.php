@extends('include.front_header')
@section('main_content')
<section class="static-hero">
            <div class="hero-container">
                <div class="hero-inner">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class="col-xl-8 col-lg-6 col-12">
                                <div class="wpo-static-hero-inner">
                                    <div class="shape-1"><img src="{{ asset('website/assets/images/slider/shape.svg') }}" alt=""></div>
                                    <div data-swiper-parallax="300" class="slide-title">
                                        <h2>Avadh <span>&</span> Pankti</h2>
                                    </div>
                                    <div data-swiper-parallax="400" class="slide-text">
                                        <p>We Are Getting Married Aug 01, 2026</p>
                                    </div>
                                    <div class="wpo-wedding-date">
                                        <div class="clock-grids">
                                            <div id="clock"></div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="static-hero-right">
                <div class="static-hero-img">
                    <div class="static-hero-img-inner">
                        <img src="{{ asset('website/assets/images/slider/s1.png') }}" alt="">
                    </div>
                    <div class="static-hero-shape-1 floating-item"><img src="assets/images/slider/flower1.png" alt=""></div>
                    <div class="static-hero-shape-2 floating-item"><img src="assets/images/slider/flower2.png" alt=""></div>
                </div>
            </div>
</section>
<section class="couple-section section-padding" id="couple">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col col-lg-11">
                        <div class="couple-area clearfix">
                            <div class="couple-item bride">
                                <div class="row align-items-center">
                                    <div class="col-lg-4">
                                        <div class="couple-img">
                                            <img src="{{ asset('website/assets/images/couple/2.jpg') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="couple-text">
                                            <h3>Jenny Wilson</h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Urna orci auctor
                                                vitae nisl. Erat fringilla pellentesque amet tempus. Commodo mi vitae,
                                                sed sagittis blandit. Leo netus magna fusce ac turpis mauris maecenas
                                                non.</p>
                                            <div class="social">
                                                <ul>
                                                    <li><a href="#"><i class="ti-facebook"></i></a></li>
                                                    <li><a href="#"><i class="ti-twitter-alt"></i></a></li>
                                                    <li><a href="#"><i class="ti-instagram"></i></a></li>
                                                    <li><a href="#"><i class="ti-pinterest"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="couple-item groom">
                                <div class="row align-items-center">
                                    <div class="col-lg-7 order-lg-1 order-2">
                                        <div class="couple-text">
                                            <h3>Leslie Alexander</h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Urna orci auctor
                                                vitae nisl. Erat fringilla pellentesque amet tempus. Commodo mi vitae,
                                                sed sagittis blandit. Leo netus magna fusce ac turpis mauris maecenas
                                                non.</p>
                                            <div class="social">
                                                <ul>
                                                    <li><a href="#"><i class="ti-facebook"></i></a></li>
                                                    <li><a href="#"><i class="ti-twitter-alt"></i></a></li>
                                                    <li><a href="#"><i class="ti-instagram"></i></a></li>
                                                    <li><a href="#"><i class="ti-pinterest"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 order-lg-2 order-1">
                                        <div class="couple-img">
                                            <img src="{{ asset('website/assets/images/couple/3.jpg') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end container -->
            <div class="shape-1">
                <img src="assets/images/couple/shape-1.png" alt="">
            </div>
            <div class="shape-2">
                <img src="assets/images/couple/shape-2.png" alt="">
            </div>
</section>
<section class="wpo-video-section">
   	<h2 class="hidden">some</h2>
    <a href="https://www.youtube.com/embed/G-rzE-9zHj8" class="video-btn" data-type="iframe"><i class="fi flaticon-play"></i></a>
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
                            <div class="story-timeline-item s1">
                                <div class="row align-items-center">
                                    <div class="col col-lg-6 col-12">
                                        <div class="img-holder right-align-text wow fadeInLeftSlow" data-wow-duration="1500ms">
                                            <img src="{{ asset('website/assets/images/story/1.jpg') }}" alt class="img img-responsive">
                                        </div>
                                    </div>
                                    <div class="col col-lg-6 col-12">
                                        <div class="story-text left-align-text wow fadeInRightSlow" data-wow-duration="2000ms">
                                            <h3>First Time We Meet</h3>
                                            <span class="date">19 Jan 2018</span>
                                            <div class="line-shape">
                                                <div class="outer-ball">
                                                    <div class="inner-ball"></div>
                                                </div>
                                             </div>
                                            <p>Lorem ipsum dolor sit amet, constetur adicng elit. Ultricies nulla mi tempus mcorper for praesent. Ultricies interdum volutpat morbi nam ornare neque elit leo, diam. Malesuada enim ac amurna tempor vel duis.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="story-timeline-item">
                                <div class="row align-items-center">
                                    <div class="col col-lg-6 col-12 order-lg-1 order-2 text-holder left-text">
                                        <div class="story-text right-align-text wow fadeInLeftSlow" data-wow-duration="2000ms">
                                            <h3>Our First Date</h3>
                                            <span class="date">22 May 2021</span>
                                            <div class="line-shape s2">
                                                <div class="outer-ball">
                                                    <div class="inner-ball"></div>
                                                </div>
                                             </div>
                                            <p>Lorem ipsum dolor sit amet, constetur adicng elit. Ultricies nulla mi tempus mcorper for praesent. Ultricies interdum volutpat morbi nam ornare neque elit leo, diam. Malesuada enim ac amurna tempor vel duis.</p>
                                        </div>
                                    </div>
                                    <div class="col col-lg-6 col-12 order-lg-2 order-1">
                                        <div class="img-holder left-align-text">
                                            <img src="{{ asset('website/assets/images/story/2.jpg') }}" alt class="img img-responsive wow fadeInRightSlow" data-wow-duration="1500ms">
                                            <span class="heart">
                                                <i class="fi flaticon-dance"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="story-timeline-item">
                                <div class="row align-items-center">
                                    <div class="col col-lg-6 col-12">
                                        <div class="img-holder right-align-text left-site right-heart">
                                            <img src="{{ asset('website/assets/images/story/3.jpg') }}" alt class="img img-responsive wow fadeInLeftSlow" data-wow-duration="1500ms">
                                            <span class="heart">
                                                <i class="fi flaticon-dove"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col col-lg-6 col-12">
                                        <div class="story-text left-align-text wow fadeInRightSlow" data-wow-duration="2000ms">
                                            <h3>She Said Yes!</h3>
                                            <span class="date">15 June 2022</span>
                                            <div class="line-shape">
                                                <div class="outer-ball">
                                                    <div class="inner-ball"></div>
                                                </div>
                                             </div>
                                            <p>Lorem ipsum dolor sit amet, constetur adicng elit. Ultricies nulla mi tempus mcorper for praesent. Ultricies interdum volutpat morbi nam ornare neque elit leo, diam. Malesuada enim ac amurna tempor vel duis.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end row -->
            </div> <!-- end container -->
            <div class="shape-1">
                <div class="sticky-shape">
                    <img src="{{ asset('website/assets/images/rsvp/shape1.png') }}" alt="">
                </div>  
            </div>
            <div class="shape-2">
                <div class="sticky-shape">
                    <img src="{{ asset('website/assets/images/rsvp/shape2.png') }}" alt="">
                </div>
            </div>
</section>
<div class="wpo-cta-section">
    <div class="conatiner-fluid">
      	<div class="wpo-cta-item">
          	<h2>Lets Celebrate Your Love</h2>
            <a class="theme-btn-s2" href="rsvp.html">Join With Us</a>
        </div>
    </div>
</div>
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
                                <div class="grid">
                                    <div class="img-holder">
                                        <a href="{{ asset('website/assets/images/portfolio/1.jpg') }}" class="fancybox"
                                            data-fancybox-group="gall-1">
                                            <img src="{{ asset('website/assets/images/portfolio/1.jpg') }}" alt class="img img-responsive">
                                            <div class="hover-content">
                                                <i class="ti-plus"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="grid">
                                    <div class="img-holder">
                                        <a href="{{ asset('website/assets/images/portfolio/2.jpg') }}" class="fancybox"
                                            data-fancybox-group="gall-1">
                                            <img src="{{ asset('website/assets/images/portfolio/2.jpg') }}" alt class="img img-responsive">
                                            <div class="hover-content">
                                                <i class="ti-plus"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="grid">
                                    <div class="img-holder">
                                        <a href="{{ asset('website/assets/images/portfolio/3.jpg') }}" class="fancybox"
                                            data-fancybox-group="gall-1">
                                            <img src="{{ asset('website/assets/images/portfolio/3.jpg') }}" alt class="img img-responsive">
                                            <div class="hover-content">
                                                <i class="ti-plus"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="grid">
                                    <div class="img-holder">
                                        <a href="{{ asset('website/assets/images/portfolio/5.jpg') }}" class="fancybox"
                                            data-fancybox-group="gall-1">
                                            <img src="{{ asset('website/assets/images/portfolio/5.jpg') }}" alt class="img img-responsive">
                                            <div class="hover-content">
                                                <i class="ti-plus"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="grid">
                                    <div class="img-holder">
                                        <a href="{{ asset('website/assets/images/portfolio/4.jpg') }}" class="fancybox"
                                            data-fancybox-group="gall-1">
                                            <img src="{{ asset('website/assets/images/portfolio/4.jpg') }}" alt class="img img-responsive">
                                            <div class="hover-content">
                                                <i class="ti-plus"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="grid">
                                    <div class="img-holder">
                                        <a href="{{ asset('website/assets/images/portfolio/6.jpg') }}" class="fancybox"
                                            data-fancybox-group="gall-1">
                                            <img src="{{ asset('website/assets/images/portfolio/6.jpg') }}" alt class="img img-responsive">
                                            <div class="hover-content">
                                                <i class="ti-plus"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end container -->
        </section>
        <section class="wpo-contact-section section-padding" id="RSVP">
            <div class="container">
                <div class="wpo-contact-section-wrapper">
                    <div class="wpo-contact-form-area">
                        <div class="wpo-section-title">
                            <div class="section-title-icon">
                                <i class="fi flaticon-dove"></i>
                            </div>
                            <h2>Are You Attending?</h2>
                        </div>
                        <form method="post" class="contact-validation-active" id="contact-form-main">
                            <div>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                            </div>
                            <div>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                            </div>
                            <div class="radio-buttons">
                                <p>
                                    <input type="radio" id="attend" name="radio-group" checked>
                                    <label for="attend">Yes, I will be there</label>
                                </p>
                                <p>
                                    <input type="radio" id="not" name="radio-group">
                                    <label for="not">Sorry, I can’t come</label>
                                </p>
                            </div>
                            <div>
                                <select name="guest" class="form-control">
                                    <option disabled="disabled" selected>Number Of Guests</option>
                                    <option>01</option>
                                    <option>02</option>
                                    <option>03</option>
                                    <option>04</option>
                                    <option>05</option>
                                </select>
                            </div>
                            <div>
                                <input type="text" class="form-control" name="what" id="what"
                                    placeholder="What Will You Be Attending">
                            </div>
                            <div>
                                <select name="meal" class="form-control last">
                                    <option disabled="disabled" selected>Meal Preferences</option>
                                    <option>Chicken Soup</option>
                                    <option>Motton Kabab</option>
                                    <option>Chicken BBQ</option>
                                    <option>Mix Salad</option>
                                    <option>Beef Ribs </option>
                                </select>
                            </div>
                            <div class="submit-area">
                                <button type="submit" class="theme-btn-s3">Send An Inquiry</button>
                                <div id="c-loader">
                                    <i class="ti-reload"></i>
                                </div>
                            </div>
                            <div class="clearfix error-handling-messages">
                                <div id="success">Thank you</div>
                                <div id="error"> Error occurred while sending email. Please try again later.
                                </div>
                            </div>
                        </form>
                        <div class="border-style"></div>
                    </div>
                    <div class="vector-1">
                        <img src="{{ asset('website/assets/images/rsvp/flower1.png') }}" alt="">
                    </div>
                    <div class="vector-2">
                        <img src="{{ asset('website/assets/images/rsvp/flower2.png') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="shape-1">
                <img src="{{ asset('website/assets/images/rsvp/shape1.png') }}" alt="">
            </div>
            <div class="shape-2">
                <img src="{{ asset('website/assets/images/rsvp/shape2.png') }}" alt="">
            </div>
        </section>
        <section class="wpo-team-section">
            <div class="container">
                <div class="row">
                    <div class="wpo-section-title">
                        <div class="section-title-icon">
                            <i class="fi flaticon-dove"></i>
                        </div>
                        <h2>Bridesmaids & Groomsmen</h2>
                    </div>
                </div>
                <div class="wpo-team-wrap">
                    <div class="row">
                        <div class="col col-lg-4 col-md-6 col-sm-12 col-12">
                            <div class="wpo-team-item">
                                <div class="wpo-team-img">
                                    <div class="wpo-team-img-inner">
                                        <img src="{{ asset('website/assets/images/team/img-1.jpg') }}" alt="">
                                    </div>
                                    <div class="shape-1"><img src="{{ asset('website/assets/images/team/shape1.jpg') }}" alt=""></div>
                                    <div class="shape-2"><img src="{{ asset('website/assets/images/team/shape2.jpg') }}" alt=""></div>
                                </div>
                                <div class="wpo-team-text">
                                    <h3><a href="groom-bride.html">Leslie Alexander</a></h3>
                                    <span>Brides Brother</span>
                                </div>
                            </div>
                        </div>
                        <div class="col col-lg-4 col-md-6 col-sm-12 col-12">
                            <div class="wpo-team-item">
                                <div class="wpo-team-img">
                                    <div class="wpo-team-img-inner">
                                        <img src="{{ asset('website/assets/images/team/img-2.jpg') }}" alt="">
                                    </div>
                                    <div class="shape-1"><img src="{{ asset('website/assets/images/team/shape1.jpg') }}" alt=""></div>
                                    <div class="shape-2"><img src="{{ asset('website/assets/images/team/shape2.jpg') }}" alt=""></div>
                                </div>
                                <div class="wpo-team-text">
                                    <h3><a href="groom-bride.html">Jenny Wilson</a></h3>
                                    <span>Brides Sister</span>
                                </div>
                            </div>
                        </div>
                        <div class="col col-lg-4 col-md-6 col-sm-12 col-12">
                            <div class="wpo-team-item">
                                <div class="wpo-team-img">
                                    <div class="wpo-team-img-inner">
                                        <img src="{{ asset('website/assets/images/team/img-3.jpg') }}" alt="">
                                    </div>
                                    <div class="shape-1"><img src="{{ asset('website/assets/images/team/shape1.jpg') }}" alt=""></div>
                                    <div class="shape-2"><img src="{{ asset('website/assets/images/team/shape2.jpg') }}" alt=""></div>
                                </div>
                                <div class="wpo-team-text">
                                    <h3><a href="groom-bride.html">Robert Fox</a></h3>
                                    <span>Brides Brother</span>
                                </div>
                            </div>
                        </div>
                        <div class="col col-lg-4 col-md-6 col-sm-12 col-12">
                            <div class="wpo-team-item">
                                <div class="wpo-team-img">
                                    <div class="wpo-team-img-inner">
                                        <img src="{{ asset('website/assets/images/team/img-4.jpg') }}" alt="">
                                    </div>
                                    <div class="shape-1"><img src="{{ asset('website/assets/images/team/shape1.jpg') }}" alt=""></div>
                                    <div class="shape-2"><img src="{{ asset('website/assets/images/team/shape2.jpg') }}" alt=""></div>
                                </div>
                                <div class="wpo-team-text">
                                    <h3><a href="groom-bride.html">Jerome Bell</a></h3>
                                    <span>Groom’s Sister</span>
                                </div>
                            </div>
                        </div>
                        <div class="col col-lg-4 col-md-6 col-sm-12 col-12">
                            <div class="wpo-team-item">
                                <div class="wpo-team-img">
                                    <div class="wpo-team-img-inner">
                                        <img src="{{ asset('website/assets/images/team/img-5.jpg') }}" alt="">
                                    </div>
                                    <div class="shape-1"><img src="{{ asset('website/assets/images/team/shape1.jpg') }}" alt=""></div>
                                    <div class="shape-2"><img src="{{ asset('website/assets/images/team/shape2.jpg') }}" alt=""></div>
                                </div>
                                <div class="wpo-team-text">
                                    <h3><a href="groom-bride.html">Esther Howard</a></h3>
                                    <span>Groom’s Brother</span>
                                </div>
                            </div>
                        </div>
                        <div class="col col-lg-4 col-md-6 col-sm-12 col-12">
                            <div class="wpo-team-item">
                                <div class="wpo-team-img">
                                    <div class="wpo-team-img-inner">
                                        <img src="{{ asset('website/assets/images/team/img-6.jpg') }}" alt="">
                                    </div>
                                    <div class="shape-1"><img src="{{ asset('website/assets/images/team/shape1.jpg') }}" alt=""></div>
                                    <div class="shape-2"><img src="{{ asset('website/assets/images/team/shape2.jpg') }}" alt=""></div>
                                </div>
                                <div class="wpo-team-text">
                                    <h3><a href="groom-bride.html">Bessie Cooper</a></h3>
                                    <span>Brides Maid</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- end container -->
        </section>
@endsection
