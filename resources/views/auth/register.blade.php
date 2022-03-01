@extends('layouts.admin1')
@section('content')
<div class="section py-0">
      <div class="container-fluid h-200">
        <div class="row h-200">
          <div class="col-12 col-lg-5 col-md-6 my-auto">
            <div class="card p-3  d-block mx-auto" style="background: transparent; box-shadow: 0 0 0;">
              <div class="card-grey py-4">
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header text-center px-3 px-md-4 py-0">
                      <h3 class="card-title title-up  mt-4
                      ">Sign up</h3>
                      <p style="font-weight: 700; line-height: 1; font-size: 14px;"><b>Getting started is easy. Sign up now.</b></p>
                    </div>
                    
                    <div class="card-body px-4 px-md-5">
                      <div class="form-group">
                      <label class="control-label text-uppercase h6" >Name <span class="text-danger">*</span></label>
                        <input type="text" id="name" name="name" class="classic-input form-control font-weight-bold {{ $errors->has('name') ? ' is-invalid' : '' }}"  value="{{ old('name') }}" placeholder="Name" autofocus >
                        @if($errors->has('name'))
                        <div class="invalid-feedback ">
                            {{ $errors->first('name') }}
                        </div>
                        @endif
                      </div>
                      <div class="form-group">
                        <label class="control-label text-uppercase h6" >Contact Number <span class="text-danger">*</span></label>
                        <input type="number" id="contact_number" name="contact_number" class="classic-input form-control font-weight-bold {{ $errors->has('contact_number') ? ' is-invalid' : '' }}" value="{{ old('contact_number') }}" placeholder="Contact Number">
                        @if($errors->has('contact_number'))
                        <div class="invalid-feedback ">
                            {{ $errors->first('contact_number') }}
                        </div>
                        @endif
                      </div>
                      <div class="form-group">
                        <label class="control-label text-uppercase h6" >Address <span class="text-danger">*</span></label>
                        <input type="text" id="address" name="address" class="classic-input form-control font-weight-bold {{ $errors->has('address') ? ' is-invalid' : '' }}" value="{{ old('address') }}" placeholder="Address">
                        @if($errors->has('address'))
                        <div class="invalid-feedback ">
                            {{ $errors->first('address') }}
                        </div>
                        @endif
                      </div>
                      <div id="clinic_info">
                        <div class="form-group">
                          <label class="control-label text-uppercase h6" >Location(Latitude) <span class="text-danger">*</span></label>
                          <input type="text" id="lat" name="lat" class="classic-input form-control font-weight-bold {{ $errors->has('lat') ? ' is-invalid' : '' }}" value="{{ old('lat') }}" placeholder="Location(Latitude)">
                          @if($errors->has('lat'))
                          <div class="invalid-feedback ">
                              {{ $errors->first('lat') }}
                          </div>
                          @endif
                        </div>
                        <div class="form-group">
                          <label class="control-label text-uppercase h6" >Location(Longitude) <span class="text-danger">*</span></label>
                          <input type="text" id="lng" name="lng" class="classic-input form-control font-weight-bold {{ $errors->has('lng') ? ' is-invalid' : '' }}" value="{{ old('lng') }}" placeholder="Location(Longitude)">
                          @if($errors->has('lng'))
                          <div class="invalid-feedback ">
                              {{ $errors->first('lng') }}
                          </div>
                          @endif
                        </div>
                        <div class="form-group">
                          <label class="control-label text-uppercase h6" >Upload( Business Permit )<span class="text-danger">*</span></label>
                          <input type="file" id="business_permit" name="business_permit" accept="image/*" class="classic-input form-control font-weight-bold {{ $errors->has('business_permit') ? ' is-invalid' : '' }}">
                          @if($errors->has('business_permit'))
                          <div class="invalid-feedback ">
                              {{ $errors->first('business_permit') }}
                          </div>
                          @endif
                        </div>
                      </div>
                      
                      
                      <div class="form-group">
                        <label class="control-label text-uppercase h6" >Email <span class="text-danger">*</span></label>
                        <input type="email" id="email" name="email" class="classic-input form-control font-weight-bold {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" placeholder="Email" >
                        @if($errors->has('email'))
                        <div class="invalid-feedback ">
                            {{ $errors->first('email') }}
                        </div>
                        @endif
                      </div>
                      <div class="form-group">
                        <label class="control-label text-uppercase h6" >Password <span class="text-danger">*</span></label>
                        <input type="password" id="password" name="password" class="classic-input form-control font-weight-bold {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password">
                        <span toggle="#password-field" class="fa fa-fw fa-eye field_icon toggle-password" style="float: right; margin-right: 10px; margin-top: -25px; position: relative; z-index: 2;"></span>
                        
                        @if($errors->has('password'))
                        <div class="invalid-feedback ">
                            {{ $errors->first('password') }}
                        </div>
                        @endif
                      </div>
                      <div class="form-group">
                         <label class="control-label text-uppercase h6" >Confirm Password <span class="text-danger">*</span></label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="classic-input form-control font-weight-bold" placeholder="Confirm Password">
                        <span toggle="#confirm_password-field" class="fa fa-fw fa-eye field_icon toggle-confirm_password" style="float: right; margin-right: 10px; margin-top: -25px; position: relative; z-index: 2;"></span>

                      </div>

                      <input type="hidden" name="user_type" id="user_type" value="Client" />
                      <input type="submit" name="register" id="register" class="btn btn-main" value="Register" />
                      
                    </div>
                  </form>
                </div>
                <p class="text-center mt-3 text-dark" style="font-size: 15px; font-weight: 500;">Already have an account? <a href="/login"><button class="btn btn-sm btn-info" style="font-weight: 700">Login here</button></a></p>
                <p class="text-center mt-2 text-dark" style="font-size: 15px; font-weight: 500;">Register as a <span id="user_label">Clinic</span> ? <button class="btn btn-sm btn-info" id="register_type" style="font-weight: 700">Register here</button>
              </div>
          </div>
          <div class="d-none d-md-block col-md-6 col-lg-7" style="background-image: url('../assets/images/bg11.jpg'); background-size: cover; background-position: top center;">
            
          </div>
        </div>
        
      </div>
</div>


@endsection
@section('scripts')
<script>
$(function () {
  var params = new window.URLSearchParams(window.location.search);
  var user_type = params.get('user_type')
  if(user_type == 'Client'){
    $('#user_type').val('Client');
    $('#clinic_info').hide();
    $('#user_label').text('Clinic');
    
  }
  if(user_type == 'Clinic'){
    $('#user_type').val('Clinic');
    $('#clinic_info').show();
    $('#user_label').text('Client');
  }
  
});


$("body").on('click', '.toggle-password', function() {
    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $("#password");
    if (input.attr("type") === "password") {
    input.attr("type", "text");
    } else {
    input.attr("type", "password");
    }
});

$("body").on('click', '.toggle-confirm_password', function() {
    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $("#password_confirmation");
    if (input.attr("type") === "password") {
    input.attr("type", "text");
    } else {
    input.attr("type", "password");
    }
});

$(document).on('click', '#register_type', function(){
  var user_type = $('#user_type').val();
  if(user_type == 'Client'){
   $('#user_type').val('Clinic');
   window.location.href = '/register?user_type=Clinic';
  }
  if(user_type == 'Clinic'){
   $('#user_type').val('Client');
   window.location.href = '/register?user_type=Client';
  }

})


</script>
@endsection