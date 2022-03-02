@extends('layouts.admin1')
@section('content')
<div class="section" style="background-image: url('../assets/images/bg11.jpg'); background-size: cover; background-position: top center; min-height: 750px;">
      <div class="container">
        <div class="row">
          <div class="card card-signup bg-primary">
          <form method="POST" action="{{ route('password.email') }}">
              @csrf
              <div class="card-header text-center">
                @if(session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <h3 class="card-title title-up text-white">Reset Password</h3>
              </div>
              
              <div class="card-body">
                <div class="form-group">
                    <label class="control-label text-white text-uppercase font-weight-bold" >Email:</label>
                    <input type="email" id="email" name="email" class="classic-input form-control font-weight-bold {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email" autofocus >
                      @if($errors->has('email'))
                        <div class="invalid-feedback text-white">
                            {{ $errors->first('email') }}
                        </div>
                      @endif
                   
                </div>
              </div>
              <div class="card-footer text-center">
                <input type="submit" name="login" id="login" class="btn btn-info btn-round btn-lg" value="Send Password Reset Link" />
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