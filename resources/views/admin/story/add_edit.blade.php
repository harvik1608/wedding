@extends('include.header')
@section('content')
@php
    $is_groom = 2;
    if(is_null($story)) {
        $is_groom = session('groom_side');
    } else {
        $is_groom = $story->is_groom;
    }
@endphp
<div class="page-header">
    <div class="page-title">
        <h4>Story List</h4>
        <h6>(<span class='mandadory'>*</span>) indicates required field.</h6>
    </div>
</div>
<form action="{{ is_null($story) ? url('admin/stories') : url('admin/stories/'.$story->id) }}" method="POST" enctype="multipart/form-data" id="mainForm">
    @csrf
    @if(!is_null($story))
        <input type="hidden" name="_method" value="PUT" />
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{ is_null($story) ? "New" : "Edit" }} Story</h4>
                </div>
                <div class="card-body profile-body">
                    <div class="row">
                        <div class="col-lg-12 mb-3">
                            <label class="form-label">Title<span class="text-danger ms-1">*</span></label>
                            <input type="text" class="form-control" name="title" id="title" value="{{ is_null($story) ? '' : $story->title }}" autofocus />
                        </div>
                        <div class="col-lg-12 mb-3">
                            <label class="form-label">Description<span class="text-danger ms-1">*</span></label>
                            <textarea class="form-control" name="description" id="description">{{ is_null($story) ? '' : $story->description }}</textarea>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label class="form-label">Date<span class="text-danger ms-1">*</span></label>
                            <input type="date" class="form-control" name="date" id="date" value="{{ is_null($story) ? '' : $story->date }}" />
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label class="form-label">Status</label>
                            <select class="select" name="is_active" id="is_active">
                                <option value="1" {{ !is_null($story) && $story->is_active == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ !is_null($story) && $story->is_active == 0 ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                        <div class="col-lg-12 mb-3">
                            <div class="file-drop mb-3 text-center">
                                <span class="avatar avatar-sm bg-primary text-white mb-2">
                                    <i class="ti ti-upload fs-16"></i>
                                </span>
                                <h6 class="mb-2"><small>(510X600)</small></h6>
                                <p class="fs-12 mb-0"></p>
                                <input type="file" name="avatar" id="avatar">
                                @if(!is_null($story) && $story->avatar != "")
                                    <img src="{{ asset('uploads/story/'.$story->avatar) }}" style="width: 100px;height: 100px;" class="img img-thumbnail img-responsive" />
                                    <input type="hidden" name="old_avatar" value="{{ $story->avatar }}" />
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="text-end mt-2">
                        <button type="submit" class="btn btn-primary">SUBMIT</button>
                        <a href="{{ url('admin/stories') }}" class="btn btn-secondary" id="backBtn">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script>
	var page_title = "Story List";
    $(document).ready(function(){
        check_accommodation();
        $("#mainForm").validate({
            rules:{
                title:{
                    required: true
                },
                description:{
                    required: true
                },
                date:{
                    required: true
                }
            },
            messages:{
                title:{
                    required: "<small class='text-danger'><b>Enter story title</b></small>"
                },
                description:{
                    required: "<small class='text-danger'><b>Enter description</b></small>"
                },
                date:{
                    required: "<small class='text-danger'><b>Choose date</b></small>"
                }
            }
        });
        $("#mainForm").submit(function(e){
            e.preventDefault();

            if($("#mainForm").valid()) {
                $.ajax({
                    url: $("#mainForm").attr("action"),
                    type: $("#mainForm").attr("method"),
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    cache: false,
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
