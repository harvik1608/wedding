@extends('include.header')
@section('content')
@php
    $is_groom = 2;
    if(is_null($photo)) {
        $is_groom = session('groom_side');
    }
@endphp
<div class="page-header">
    <div class="page-title">
        <h4>Photo List</h4>
        <h6>(<span class='mandadory'>*</span>) indicates required field.</h6>
    </div>
</div>
<form action="{{ is_null($photo) ? url('admin/photos') : url('admin/photos/'.$photo->id) }}" method="POST" enctype="multipart/form-data" id="mainForm">
    @csrf
    @if(!is_null($photo))
        <input type="hidden" name="_method" value="PUT" />
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{ is_null($photo) ? "New" : "Edit" }} Photo</h4>
                </div>
                <div class="card-body profile-body">
                    <div class="row">
                        <div class="col-lg-12 mb-3">
                            <div class="file-drop mb-3 text-center">
                                <span class="avatar avatar-sm bg-primary text-white mb-2">
                                    <i class="ti ti-upload fs-16"></i>
                                </span>
                                <h6 class="mb-2"><small>(520x700)</small></h6>
                                <p class="fs-12 mb-0"></p>
                                <input type="file" name="avatar" id="avatar" required />
                                @if(!is_null($photo) && $photo->avatar != "")
                                    <img src="{{ asset('uploads/photo/'.$photo->avatar) }}" style="width: 100px;height: 100px;" class="img img-thumbnail img-responsive" />
                                    <input type="hidden" name="old_avatar" value="{{ $photo->avatar }}" />
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="text-end mt-2">
                        <button type="submit" class="btn btn-primary">SUBMIT</button>
                        <a href="{{ url('admin/photos') }}" class="btn btn-secondary" id="backBtn">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script>
	var page_title = "Photo List";
    $(document).ready(function(){
        $("#mainForm").submit(function(e){
            e.preventDefault();

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
        });
    });
</script>
@endsection
