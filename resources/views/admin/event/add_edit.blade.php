@extends('include.header')
@section('content')
@php
    $is_groom = 2;
    if(is_null($event)) {
        $is_groom = session('groom_side');
    } else {
        $is_groom = $event->is_groom;
    }
@endphp
<div class="page-header">
    <div class="page-title">
        <h4>Event List</h4>
        <h6>(<span class='mandadory'>*</span>) indicates required field.</h6>
    </div>
</div>
<form action="{{ is_null($event) ? url('admin/events') : url('admin/events/'.$event->id) }}" method="POST" enctype="multipart/form-data" id="mainForm">
    @csrf
    @if(!is_null($event))
        <input type="hidden" name="_method" value="PUT" />
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{ is_null($event) ? "New" : "Edit" }} Event</h4>
                </div>
                <div class="card-body profile-body">
                    <div class="row">
                        <div class="col-lg-3 mb-3">
                            <label class="form-label">Event Name<span class="text-danger ms-1">*</span></label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ is_null($event) ? '' : $event->name }}" autofocus />
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label class="form-label">Event Date<span class="text-danger ms-1">*</span></label>
                            <input type="date" class="form-control" name="date" id="date" value="{{ is_null($event) ? '' : $event->date }}" />
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label class="form-label">Event Start Time<span class="text-danger ms-1">*</span></label>
                            <input type="time" class="form-control" name="start_time" id="start_time" value="{{ is_null($event) ? '' : $event->start_time }}" />
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label class="form-label">Event End Time<span class="text-danger ms-1">*</span></label>
                            <input type="time" class="form-control" name="end_time" id="end_time" value="{{ is_null($event) ? '' : $event->end_time }}" />
                        </div>
                        <div class="col-lg-9 mb-3">
                            <label class="form-label">Event Address<span class="text-danger ms-1">*</span></label>
                            <input type="text" class="form-control" name="address" id="address" value="{{ is_null($event) ? '' : $event->address }}" />
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label class="form-label">Event Venue</label>
                            <select class="select" name="venue_id" id="venue_id">
                                <option value="">Choose venue</option>
                                @foreach($venues as $venue)
                                    <option value="{{ $venue->id }}" {{ !is_null($event) && $event->venue_id == $venue->id ? 'selected' : '' }}>{{ $venue->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label class="form-label">Event Contact Person No.</label>
                            <input type="text" class="form-control" name="contact_no" id="contact_no" value="{{ is_null($event) ? '' : $event->contact_no }}" />
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label class="form-label">Event for</label>
                            <select class="select" name="is_groom" id="is_groom">
                                <option value="0" {{ $is_groom == 0 ? 'selected' : '' }}>Bride</option>
                                <option value="1" {{ $is_groom == 1 ? 'selected' : '' }}>Groom</option>
                                @if(is_null($event))
                                    <option value="2" {{ $is_groom == 2 ? 'selected' : '' }}>Both</option>
                                @endif
                            </select>
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label class="form-label">Status</label>
                            <select class="select" name="is_active" id="is_active">
                                <option value="1" {{ !is_null($event) && $event->is_active == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ !is_null($event) && $event->is_active == 0 ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="text-end mt-2">
                        <button type="submit" class="btn btn-primary">SUBMIT</button>
                        <a href="{{ url('admin/events') }}" class="btn btn-secondary" id="backBtn">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script>
	var page_title = "Event List";
    $(document).ready(function(){
        $("#mainForm").validate({
            rules:{
                name:{
                    required: true
                },
                date:{
                    required: true
                },
                start_time:{
                    required: true
                },
                end_time:{
                    required: true
                },
                address:{
                    required: true
                }
            },
            messages:{
                name:{
                    required: "<small class='text-danger'><b>Enter event name</b></small>"
                },
                date:{
                    required: "<small class='text-danger'><b>Choose event date</b></small>"
                },
                start_time:{
                    required: "<small class='text-danger'><b>Choose event start time</b></small>"
                },
                end_time:{
                    required: "<small class='text-danger'><b>Choose event end time</b></small>"
                },
                address:{
                    required: "<small class='text-danger'><b>Enter event address</b></small>"
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
    });
</script>
@endsection
