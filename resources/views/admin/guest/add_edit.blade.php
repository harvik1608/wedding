@extends('include.header')
@section('content')
@php
    $is_groom = 2;
    if(is_null($guest)) {
        $is_groom = session('groom_side');
    } else {
        $is_groom = $guest->is_groom;
    }
@endphp
<div class="page-header">
    <div class="page-title">
        <h4>Guest List</h4>
        <h6>(<span class='mandadory'>*</span>) indicates required field.</h6>
    </div>
</div>
<form action="{{ is_null($guest) ? url('admin/guests') : url('admin/guests/'.$guest->id) }}" method="POST" enctype="multipart/form-data" id="mainForm">
    @csrf
    @if(!is_null($guest))
        <input type="hidden" name="_method" value="PUT" />
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{ is_null($guest) ? "New" : "Edit" }} Guest</h4>
                </div>
                <div class="card-body profile-body">
                    <div class="row">
                        <div class="col-lg-4 mb-3">
                            <label class="form-label">Guest Name<span class="text-danger ms-1">*</span></label>
                            <input type="text" class="form-control" name="guest_name" id="guest_name" value="{{ is_null($guest) ? '' : $guest->guest_name }}" autofocus />
                        </div>
                        <div class="col-lg-4 mb-3">
                            <label class="form-label">Spouse Name</label>
                            <input type="text" class="form-control" name="spouse_name" id="spouse_name" value="{{ is_null($guest) ? '' : $guest->spouse_name }}" />
                        </div>
                        <div class="col-lg-4 mb-3">
                            <label class="form-label">Guest Mobile No.<span class="text-danger ms-1">*</span></label>
                            <input type="text" class="form-control" name="guest_number" id="guest_number" value="{{ is_null($guest) ? '' : $guest->guest_number }}" />
                        </div>
                        <div class="col-lg-4 mb-3">
                            <label class="form-label">Child (1-5)</label>
                            <input type="text" class="form-control" name="total_child" id="total_child" value="{{ is_null($guest) ? 0 : $guest->total_child }}" />
                        </div>
                        <div class="col-lg-4 mb-3">
                            <label class="form-label">Child (5-16)</label>
                            <input type="text" class="form-control" name="total_young" id="total_young" value="{{ is_null($guest) ? 0 : $guest->total_young }}" />
                        </div>
                        <div class="col-lg-4 mb-3">
                            <label class="form-label">Adult</label>
                            <input type="text" class="form-control" name="total_adult" id="total_adult" value="{{ is_null($guest) ? 0 : $guest->total_adult }}" />
                        </div>
                        <div class="col-lg-4 mb-3">
                            <label class="form-label">Group</label>
                            <select class="select" name="group_id" id="group_id">
                                <option value="">Choose group</option>
                                @foreach($groups as $group)
                                    <option value="{{ $group->id }}" {{ !is_null($guest) && $guest->group_id == $group->id ? 'selected' : '' }}>{{ $group->name }}</option>
                                @endforeach
                            </select>
                            <label id="group_id-error" class="error" for="group_id"></label>
                        </div>
                        <div class="col-lg-4 mb-3">
                            <label class="form-label">Accommodation</label>
                            <select class="select" name="is_accommodation" id="is_accommodation">
                                <option value="0" {{ !is_null($guest) && $guest->is_accommodation == 0 ? 'selected' : '' }}>No</option>
                                <option value="1" {{ !is_null($guest) && $guest->is_accommodation == 1 ? 'selected' : '' }}>Yes</option>
                            </select>
                        </div>
                        <div class="col-lg-2 mb-3">
                            <label class="form-label">Venue</label>
                            <select class="select" name="venue_id" id="venue_id" disabled>
                                <option value="">Choose venue</option>
                                @foreach($venues as $venue)
                                    <option value="{{ $venue->id }}" {{ !is_null($guest) && $guest->venue_id == $venue->id ? 'selected' : '' }}>{{ $venue->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-2 mb-3">
                            <label class="form-label">Room No.</label>
                            <input type="text" class="form-control" name="room_no" id="room_no" value="{{ is_null($guest) ? '' : $guest->room_no }}" disabled />
                        </div>
                        <div class="col-lg-4 mb-3">
                            <label class="form-label">RSVP Status</label>
                            <select class="select" name="rsvp_status" id="rsvp_status">
                                <option value="0" {{ !is_null($guest) && $guest->rsvp_status == 0 ? 'selected' : '' }}>Not Confirmed</option>
                                <option value="1" {{ !is_null($guest) && $guest->rsvp_status == 1 ? 'selected' : '' }}>Confirmed</option>
                            </select>
                        </div>
                        <div class="col-lg-4 mb-3">
                            <label class="form-label">Guest Side</label>
                            <select class="select" name="is_groom" id="is_groom">
                                <option value="0" {{ $is_groom == 0 ? 'selected' : '' }}>Bride</option>
                                <option value="1" {{ $is_groom == 1 ? 'selected' : '' }}>Groom</option>
                            </select>
                        </div>
                        <div class="col-lg-4 mb-3">
                            <label class="form-label">Status</label>
                            <select class="select" name="is_active" id="is_active">
                                <option value="1" {{ !is_null($guest) && $guest->is_active == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ !is_null($guest) && $guest->is_active == 0 ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                        <div class="col-lg-12 mb-3">
                            <label class="form-label">Invitation</label>
                            @if(!$events->isEmpty())
                                @foreach($events as $event)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="invitation[]" value="{{ $event->id }}" id="event-{{ $event->id }}" {{ in_array($event->id, $invited_guests) ? 'checked' : '' }} />
                                        <label class="form-check-label" for="event-{{ $event->id }}">{{ $event->name }}</label>
                                    </div>  
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="text-end mt-2">
                        <button type="submit" class="btn btn-primary">SUBMIT</button>
                        <a href="{{ url('admin/guests') }}" class="btn btn-secondary" id="backBtn">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script>
	var page_title = "Guest List";
    $(document).ready(function(){
        check_accommodation();
        $("#mainForm").validate({
            rules:{
                guest_name:{
                    required: true
                },
                guest_number:{
                    required: true
                },
                group_id:{
                    required: true
                }
            },
            messages:{
                guest_name:{
                    required: "<small class='text-danger'><b>Enter guest name</b></small>"
                },
                guest_number:{
                    required: "<small class='text-danger'><b>Enter guest mobile no.</b></small>"
                },
                group_id:{
                    required: "<small class='text-danger'><b>Choose group</b></small>"
                }
            }
        });
        $("#mainForm").submit(function(e){
            e.preventDefault();

            if($("#mainForm").valid()) {
                $.ajax({
                    url: $("#mainForm").attr("action"),
                    type: $("#mainForm").attr("method"),
                    data: $(this).serialize(),
                    beforeSend:function(xhr){
                        xhr.setRequestHeader("csrf-token", $("input[name=_csrf]").val());
                        $("#mainForm button[type=submit]").html('<div class="spinner-border spinner-border-sm text-secondary" role="status"><span class="visually-hidden">Loading...</span></div>').attr("disabled",true);
                    },
                    success:function(response){
                        if(response.success) {
                            show_toast("Success!",response.message,"success");
                            setTimeout(function(){
                                window.location.href = $("#backBtn").attr("href");
                            },3000);
                        }
                    },
                    error: function(xhr, status, error) {
                        $("#mainForm button[type=submit]").html("SUBMIT").attr("disabled",false);
                        if (xhr.status === 400) {
                            const res = xhr.responseJSON;
                            show_toast("Oops!",res.message,"error");
                        } else {
                            show_toast("Oops!","Something went wrong","error");
                        }
                    }
                });
            }
        });
        $("#is_accommodation").change(function(){
            check_accommodation();
        });
    });
    function check_accommodation()
    {
        var is_accommodation = $("#is_accommodation").val();
        if(parseInt(is_accommodation) == 0) {
            $("#venue_id,#room_no").attr("disabled",true);
        } else {
            $("#venue_id,#room_no").attr("disabled",false);
        }
    }
</script>
@endsection
