@extends('layouts.admin1')
@section('content')

<div class="section" style="background-image: url('{{ asset('/assets/images/bg11.jpg') }}'); background-size: cover; background-position: top center; min-height: 750px;">
      <div class="container">
        <div class="row">
          <div class="card card-signup bg-primary">
          <form method="POST" action="{{ route('password.request') }}">
              @csrf
              <div class="card-header text-center">
                <h3 class="card-title title-up text-white">Reset Password</h3>
              </div>
              
              <div class="card-body text-white">
                <div class="form-group">
                    <input name="token" value="{{ $token }}" type="hidden">
                    <label class="control-label text-uppercase font-weight-bold" >Email:</label>
                    <input type="email" id="email" name="email" class="form-control classic-input font-weight-bold {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ $email ?? old('email') }}" >
                    @if($errors->has('email'))
                        <div class="invalid-feedback text-white">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label class="control-label text-uppercase font-weight-bold" >Password:</label>
                      <input type="password" id="password" name="password" class="form-control classic-input font-weight-bold {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password">
                      @if($errors->has('password'))
                          <div class="invalid-feedback text-white">
                              {{ $errors->first('password') }}
                          </div>
                      @endif
                </div>

                <div class="form-group">
                  <label class="control-label text-uppercase font-weight-bold" >Password Confirimation:</label>
                    <input type="password" id="password-confirm" name="password_confirmation" class="classic-input form-control font-weight-bold" placeholder="Password">
                
                </div>
              </div>
              <div class="card-footer text-center">
                <input type="submit" name="login" id="login" class="btn btn-info btn-round btn-lg" value="Reset Password" />
              </div>
              
            </form>
          </div>
        </div>
        
      </div>
</div>


@endsection
@section('scripts')
<script>



</script>
@endsection