@extends('include.front_header')
@section('main_content')
<section class="static-hero-s4">
            <div class="hero-container">
                <div class="hero-inner">
                    <div class="container">
                        <div class="coming-soon-section">
                            <div class="coming-soon-wrap">
                                <div class="coming-soon-item">
                                    <div class="coming-soon-text">
                                        <h2>Sign In</h2>
                                        <p>Enter your mobile no. to check.</p>
                                    </div>
                                </div>
                                <div class="coming-soon-item">
                                    <!-- start wpo-wedding-date -->
                                    <div class="wpo-wedding-date">
                                        <h2 class="hidden">some</h2>
                                        <div class="clock-grids">
                                            <div id="clock"></div>
                                        </div>
                                    </div>
                                    <!-- end wpo-wedding-date -->
                                </div>
                                <div class="coming-soon-item">
                                    <div class="wpo-coming-contact">
                                        <form method="post" class="contact-validation-active" id="signInForm" action="{{ route('submit-signin') }}">
                                            @csrf
                                            <div class="row justify-content-center">
                                                <div class="col-lg-6 col-sm-6 col-12">
                                                    <input type="number" class="form-control" name="phone" id="phone" placeholder="Your mobile no." required />
                                                    @if(session()->has('guest_error'))
                                                        <small>Guest Number: {{ session('guest_error') }}</small>
                                                    @endif
                                                </div>
                                                <div class="col-lg-3 col-sm-4 col-6">
                                                    <div class="submit-area">
                                                        <button type="submit">Check</button>
                                                        <div id="loader">
                                                            <i class="ti-reload"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clearfix error-handling-messages">
                                                <div id="success">Thank you</div>
                                                <div id="error"> Error occurred while sending email. Please try again
                                                    later. </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="shape-1"><img src="assets/images/slider/flower1.png" alt=""></div>
                                <div class="shape-2"><img src="assets/images/slider/flower2.png" alt=""></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
