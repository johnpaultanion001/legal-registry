@extends('layouts.admin1')
@section('content')
<div class="section" style="background-image: url('../assets/images/bg11.jpg'); background-size: cover; background-position: top center; min-height: 750px;">
      <div class="container">
        <div class="row">
          <div class="card card-signup bg-primary">
          <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
              @csrf
              <div class="card-header text-center">
                @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                @endif
                <h3 class="card-title title-up text-white">Verify Your Email Address</h3>
              </div>
              
              <div class="card-body">
               
                
 
              </div>
              <div class="card-footer text-center">
                <button type="submit" style="color: #910000;" class="btn btn-neutral btn-round btn-lg">{{ __('click here to request another') }}</button>.
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