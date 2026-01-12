@extends('include.front_header')
@section('main_content')
<style>
    .contact-validation-active input {
        margin-bottom: 10px !important;
    }
    .contact-validation-active small {
        color: #FF0000;
    }
</style>
<section class="wpo-page-title">
    <div class="container">
        <div class="row">
            <div class="col col-xs-12">
                <div class="wpo-breadcumb-wrap">
                    <h2>RSVP</h2>
                    <ol class="wpo-breadcumb-wrap">
                        <li><a href="index-2.html">Home</a></li>
                        <li>RSVP</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="wpo-contact-section section-padding pt-200" id="RSVP">
    <div class="container">
        <div class="wpo-contact-section-wrapper">
            <div class="wpo-contact-form-area">
                <div class="wpo-section-title">
                    <div class="section-title-icon">
                        <i class="fi flaticon-dove"></i>
                    </div>
                    <h2>Are You Attending?</h2>
                </div>
                <form method="POST" action="{{ route('submit.rsvp') }}" class="contact-validation-active" id="inquiry-form">
                    @csrf
                    <div>
                        <input type="text" class="form-control" name="guest_name" id="guest_name" placeholder="Your name" required />
                        <small class="error" id="guest_name_error"></small>
                    </div>
                    <div>
                        <input type="text" class="form-control" name="spouse_name" id="spouse_name" placeholder="Your spouse name" required />
                        <small class="error" id="spouse_name_error"></small>
                    </div>
                    <div>
                        <input type="number" class="form-control" name="guest_number" id="guest_number" placeholder="Your mobile no." required />
                        <small class="error" id="guest_number_error"></small>
                    </div>
                    <div>
                        <div class="row">
                            <div class="col-lg-4">
                                <label>Child (1-5)</label>
                                <input type="number" class="form-control" name="total_child" id="total_child" value="0" min="0" />  
                            </div>
                            <div class="col-lg-4">
                                <label>Child (5-16)</label>
                                <input type="number" class="form-control" name="total_young" id="total_young" value="0" min="0" />  
                            </div>
                            <div class="col-lg-4">
                                <label>Adult</label>
                                <input type="number" class="form-control" name="total_adult" id="total_adult" value="0" min="0" />  
                            </div>
                        </div>
                    </div>
                    <div>
                        <select name="group_id" id="group_id" class="form-control" required>
                            <option value="">Group</option>
                            @if($groups)
                                @foreach($groups as $group)
                                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                                @endforeach
                            @endif
                        </select>
                        <small class="error" id="group_id_error"></small>
                    </div>
                    <div>
                        <select name="is_accommodation" id="is_accommodation" class="form-control" required>
                            <option value="">Accommodation</option>
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                        <small class="error" id="is_accommodation_error"></small>
                    </div>
                    <div>
                        <select name="is_groom" id="is_groom" class="form-control" required>
                            <option value="">Are you from?</option>
                            <option value="1">Groom</option>
                            <option value="0">Bride</option>
                        </select>
                        <small class="error" id="rsvp_status_error"></small>
                    </div>
                    <div class="radio-buttons">
                        @if($events)
                            <div class="row">
                                <p>
                                    @foreach($events as $event)
                                        <div class="col-lg-12">
                                            <input type="checkbox" name="invitation[]" value="{{ $event->id }}" id="event-{{ $event->id }}" />
                                            <label for="event-{{ $event->id }}">{{ $event->name }}</label>
                                        </div>
                                    @endforeach
                                </p>
                            </div>
                        @endif
                        <small class="error" id="invitation_error"></small>
                    </div>
                    <div class="radio-buttons">
                        <p>
                            <input type="radio" id="attend" name="rsvp_status" value="1" checked>
                            <label for="attend">Yes, I will be there</label>
                        </p>
                        <p>
                            <input type="radio" id="not" name="rsvp_status" value="0">
                            <label for="not">Sorry, I can’t come</label>
                        </p>
                    </div>
                    <div class="submit-area">
                        <button type="submit" class="theme-btn-s3">Send An Inquiry</button>
                        <div id="c-loader">
                            <i class="ti-reload"></i>
                        </div>
                    </div>
                    <div class="clearfix error-handling-messages">
                        <div id="success">Thank you</div>
                        <div id="error"> Error occurred while sending email. Please try again later.</div>
                    </div>
                </form>
                <div class="border-style"></div>
            </div>
            <div class="vector-1">
                <img src="{{ asset('website/assets/images/rsvp/flower1.png') }}" alt="" />
            </div>
            <div class="vector-2">
                <img src="{{ asset('website/assets/images/rsvp/flower2.png') }}" alt="" />
            </div>
        </div>
    </div>
    <div class="shape-1">
        <img src="{{ asset('website/assets/images/rsvp/shape1.png') }}" alt="" />
    </div>
    <div class="shape-2">
        <img src="{{ asset('website/assets/images/rsvp/shape2.png') }}" alt="" />
    </div>
</section>
@endsection
