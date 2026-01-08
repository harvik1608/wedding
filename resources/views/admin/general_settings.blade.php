@extends('include.header')
@section('content')
<div class="page-header">
    <div class="page-title">
        <h4>General Info</h4>
        <h6>(<span class='mandadory'>*</span>) indicates required field.</h6>
    </div>
</div>
<form action="{{ route('admin.submit.general.settings') }}" method="POST" enctype="multipart/form-data" id="mainForm">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>General Info</h4>
                </div>
                <div class="card-body profile-body">
                    <div class="row">
                        <div class="col-lg-4 mb-3">
                            <label class="form-label">Groom Name<span class="text-danger ms-1">*</span></label>
                            <input type="text" class="form-control" name="groom_name" id="groom_name" value="{{ isset($groom_name) ? $groom_name : '' }}" />
                        </div>
                        <div class="col-lg-4 mb-3">
                            <label class="form-label">Bride Name<span class="text-danger ms-1">*</span></label>
                            <input type="text" class="form-control" name="bride_name" id="bride_name" value="{{ isset($bride_name) ? $bride_name : '' }}" />
                        </div>
                        <div class="col-lg-4 mb-3">
                            <label class="form-label">Wedding Date<span class="text-danger ms-1">*</span></label>
                            <input type="date" class="form-control" name="wedding_date" id="wedding_date" value="{{ isset($wedding_date) ? $wedding_date : '' }}" />
                        </div>
                        <div class="col-lg-12 mb-3">
                            <h2>Couple Photo</h2>
                            <div class="file-drop mb-3 text-center">
                                <span class="avatar avatar-sm bg-primary text-white mb-2">
                                    <i class="ti ti-upload fs-16"></i>
                                </span>
                                <h6 class="mb-2"><small>(560X741)</small></h6>
                                <p class="fs-12 mb-0"></p>
                                <input type="file" name="couple_photo" id="couple_photo">
                                @if(isset($couple_photo) && $couple_photo != "")
                                    <img src="{{ asset('uploads/settings/'.$couple_photo) }}" style="width: 100px;height: 100px;" class="img img-thumbnail img-responsive" />
                                    <input type="hidden" name="old_couple_photo" value="{{ isset($couple_photo) ? $couple_photo : '' }}" />
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-12 mb-3">
                            <label class="form-label">Wedding Video<span class="text-danger ms-1">*</span></label>
                            <input type="text" class="form-control" name="wedding_video" id="wedding_video" value="{{ isset($wedding_video) ? $wedding_video : '' }}" />
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label class="form-label">About Groom<span class="text-danger ms-1">*</span></label>
                            <textarea class="form-control" name="about_groom" id="about_groom">{{ isset($about_groom) ? $about_groom : '' }}</textarea>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label class="form-label">About Bride<span class="text-danger ms-1">*</span></label>
                            <textarea class="form-control" name="about_bride" id="about_bride">{{ isset($about_bride) ? $about_bride : '' }}</textarea>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <h2>Groom Photo</h2>
                            <div class="file-drop mb-3 text-center">
                                <span class="avatar avatar-sm bg-primary text-white mb-2">
                                    <i class="ti ti-upload fs-16"></i>
                                </span>
                                <h6 class="mb-2"><small>(336x336)</small></h6>
                                <p class="fs-12 mb-0"></p>
                                <input type="file" name="groom_photo" id="groom_photo">
                                @if(isset($groom_photo) && $groom_photo != "")
                                    <img src="{{ asset('uploads/settings/'.$groom_photo) }}" style="width: 100px;height: 100px;" class="img img-thumbnail img-responsive" />
                                    <input type="hidden" name="old_groom_photo" value="{{ isset($groom_photo) ? $groom_photo : '' }}" />
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <h2>Bride Photo</h2>
                            <div class="file-drop mb-3 text-center">
                                <span class="avatar avatar-sm bg-primary text-white mb-2">
                                    <i class="ti ti-upload fs-16"></i>
                                </span>
                                <h6 class="mb-2"><small>(336x336)</small></h6>
                                <p class="fs-12 mb-0"></p>
                                <input type="file" name="bride_photo" id="bride_photo">
                                @if(isset($bride_photo) && $bride_photo != "")
                                    <img src="{{ asset('uploads/settings/'.$bride_photo) }}" style="width: 100px;height: 100px;" class="img img-thumbnail img-responsive" />
                                    <input type="hidden" name="old_bride_photo" value="{{ isset($bride_photo) ? $bride_photo : '' }}" />
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-12 mb-3">
                            <h2>Banner Photo</h2>
                            <div class="file-drop mb-3 text-center">
                                <span class="avatar avatar-sm bg-primary text-white mb-2">
                                    <i class="ti ti-upload fs-16"></i>
                                </span>
                                <h6 class="mb-2"><small>(1920x1307)</small></h6>
                                <p class="fs-12 mb-0"></p>
                                <input type="file" name="banner_photo" id="banner_photo">
                                @if(isset($banner_photo) && $banner_photo != "")
                                    <img src="{{ asset('uploads/settings/'.$banner_photo) }}" style="width: 100px;height: 100px;" class="img img-thumbnail img-responsive" />
                                    <input type="hidden" name="old_banner_photo" value="{{ isset($banner_photo) ? $banner_photo : '' }}" />
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label class="form-label">Contact Email<span class="text-danger ms-1">*</span></label>
                            <input type="text" class="form-control" name="contact_email" id="contact_email" value="{{ isset($contact_email) ? $contact_email : '' }}" />
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label class="form-label">Contact Phone<span class="text-danger ms-1">*</span></label>
                            <input type="text" class="form-control" name="contact_phone" id="contact_phone" value="{{ isset($contact_phone) ? $contact_phone : '' }}" />
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label class="form-label">Contact Address<span class="text-danger ms-1">*</span></label>
                            <input type="text" class="form-control" name="contact_address" id="contact_address" value="{{ isset($contact_address) ? $contact_address : '' }}" />
                        </div>
                    </div>
                    <div class="text-end mt-2">
                        <button type="submit" class="btn btn-primary">SUBMIT</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script>
	var page_title = "General Info";
    $(document).ready(function(){
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
                                window.location.reload();
                            },3000);
                        } else {
                            show_toast("Oops!",response.message,"error");
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