@extends('layouts.admin1')
@section('content')
<?php 
  $type_of_industries = App\Models\TypeOfIndustry::orderBy('title','asc')->get();
?>
<div class="section py-0">
      <div class="container-fluid h-100">
        <div class="row h-100">
          <div class="col-12 col-lg-5 col-md-6 my-auto">
            <div class="card p-3  d-block mx-auto" style="background: transparent; box-shadow: 0 0 0;">
              <div class="card-grey py-4">
                <form method="POST" enctype="multipart/form-data" id="myForm">
                    @csrf
                    <div class="card-header text-center px-3 px-md-4 py-0">
                      <h3 class="card-title title-up  mt-4
                      ">Account Information</h3>
                    </div>
                    
                    <div class="card-body px-4 px-md-5">
                      <div class="form-group">
                        <label class="control-label text-uppercase h6" >Email <span class="text-danger">*</span></label>
                        <input type="text" class="form-control classic-input" value="{{Auth()->user()->email}}" readonly />
                      </div>
                      <div class="form-group">
                        <label class="control-label text-uppercase h6" >Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" class="form-control classic-input" value="{{Auth()->user()->client->name ?? ''}}" autofocus/>
                        <span class="invalid-feedback" role="alert">
                            <strong id="error-name"></strong>
                        </span>
                      </div>
                      <div class="form-group">
                        <label class="control-label text-uppercase h6" >Contact Number <span class="text-danger">*</span></label>
                        <input type="number" name="contact_number" id="contact_number" value="{{Auth()->user()->client->contact_number ?? ''}}" class="form-control classic-input" />
                        <span class="invalid-feedback" role="alert">
                            <strong id="error-contact_number"></strong>
                        </span>
                      </div>
                      <div class="form-group">
                        <label class="control-label text-uppercase h6" >Address <span class="text-danger">*</span></label>
                        <input type="text" name="address" id="address" value="{{Auth()->user()->client->address ?? ''}}" class="form-control classic-input" />
                        <span class="invalid-feedback" role="alert">
                            <strong id="error-address"></strong>
                        </span>
                      </div>
                      <div class="form-group">
                      <label class="control-label text-uppercase h6" >Type of Industry <span class="text-danger">*</span></label>
                        <br>
                        <span class="text-danger" role="alert">
                            <strong id="error-type_of_industry"></strong>
                        </span>
                        @foreach($type_of_industries as $industry)
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="{{$industry->id}}"
                           name="type_of_industry[]" id="{{$industry->title}}{{$industry->id}}"
                            @if($industry->client_industries()->count() > 0)
                              checked
                            @endif>
                          <label class="control-label text-uppercase h6" for="{{$industry->title}}{{$industry->id}}">
                            {{$industry->title}}
                          </label>
                          <br>
                          @foreach($industry->toi_tota()->get() as $act)
                            <label class="control-label text-uppercase" for="{{$industry->title}}{{$industry->id}}">
                                {{$act->type_of_trade_act->title}} 
                            </label> <br>
                          @endforeach
                        </div>
                       @endforeach
                        
                       
                      </div>
                      <input type="submit" class="btn btn-main" id="action_button" name="action_button" value="Submit" />
                      
                    </div>
                  </form>
                </div>
               
              </div>
          </div>
          <div class="d-none d-md-block col-md-6 col-lg-7" style="background-image: url('../../assets/images/bg11.png'); background-size: cover; background-position: top center; opacity: 0.7;">
          
          </div>
        </div>
        
      </div>
</div>


@endsection
@section('scripts')
<script>
$('#myForm').on('submit', function(event){
    event.preventDefault();
    $('.form-control').removeClass('is-invalid')

    var action_url = "/admin/client/account";
    var type = "POST";

    $.ajax({
        url: action_url,
        method:type,
        data:$(this).serialize(),
        dataType:"json",
        beforeSend:function(){
            $("#action_button").attr("disabled", true);
        },
        success:function(data){
            $("#action_button").attr("disabled", false);
          
            if(data.errors){
                $.each(data.errors, function(key,value){
                    if(key == $('#'+key).attr('id')){
                        $('#'+key).addClass('is-invalid')
                        $('#error-'+key).text(value)
                    }
                })
            }
            if(data.no_selected){
              $('#error-type_of_industry').text(data.no_selected);
            }
            if(data.success){
                  $.confirm({
                      title: 'Confirmation',
                      content: data.success,
                      type: 'green',
                      buttons: {
                          confirm: {
                              text: 'confirm',
                              btnClass: 'btn-blue',
                              keys: ['enter', 'shift'],
                              action: function(){
                                location.reload();
                                window.location.href = '/admin/client/questionnaire'
                              }
                          },
                      }
                  });
            }
            
           
        }
    });
});


</script>
@endsection