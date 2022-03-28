@extends('layouts.admin1')
@section('content')
<style>
    .form-control[readonly] {
        background-color: white;
        font-weight: bold;
        border: none;
    }
</style>
<div class="card">
    <div class="card-header">
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label text-uppercase  h6" >Select client <span class="text-danger">*</span></label>
                <select name="client_dd" id="client_dd" class="form-control select2">
                    <option value="">Select</option>
                    @foreach($clients as $client)
                        @if($client->user->isComplete == 1)
                            <option value="{{$client->user->client->user_id}}"
                            {{$client->user->client->user_id == $client1->user_id ? 'selected' : ''}}>
                                {{$client->user->client->name}}
                            </option>
                        @endif
                       
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="col-xl-12 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4 class="text-center font-weight-bold">
                    Client Info
                </h4>
            </div>
           
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered display" width="100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Contact Number</th>
                                    <th>Address</th>
                                    <th>Date Register</th>
                                    <th>Account Subscription</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="font-weight-bold">
                                        <input type="text" id="name" class="form-control input_client" value="{{$client1->name}}" readonly>
                                            <span class="text-danger">
                                                <strong id="error-name"></strong>
                                            </span>
                                    </td>
                                    <td class="font-weight-bold">
                                        <input type="email" id="email" class="form-control input_client" value="{{$client1->user->email}}" readonly>
                                        <span class="text-danger">
                                            <strong id="error-email"></strong>
                                        </span>
                                    </td>
                                    <td class="font-weight-bold">
                                        <input type="number" id="contact_number" class="form-control input_client" value="{{$client1->contact_number}}" readonly>
                                        <span class="text-danger">
                                            <strong id="error-contact_number"></strong>
                                        </span>
                                    </td>
                                    <td class="font-weight-bold">
                                        <input type="text" id="address" class="form-control input_client" value="{{$client1->address}}" readonly>
                                        <span class="text-danger">
                                            <strong id="error-address"></strong>
                                        </span>
                                    </td>
                                    <td class="font-weight-bold">
                                        {{ $client1->created_at->format('M j , Y h:i A') }}
                                    </td>
                                    <td class="font-weight-bold">
                                        <h6><span class="{{$client1->user->subscribe_at < Carbon\Carbon::now()->subDays(1) ? 'text-danger' : 'text-success'}}">
                                            {{\Carbon\Carbon::createFromFormat('Y-m-d',$client1->user->subscribe_at)->format('M j , Y')}}</span> 
                                            <br>
                                             Date Of Subscription</h6>
                                        
                                        <button class="font-weight-bold account_subscription btn {{$client1->user->subscribe_at < Carbon\Carbon::now()->subDays(1) ? 'btn-danger' : 'btn-success'}}">
                                            {{$client1->user->subscribe_at < Carbon\Carbon::now()->subDays(1) ? 'UNSUBSCRIBED' : 'SUBSCRIBED'}}
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                </div>
            </div>
            <div class="card-footer text-center">
                <button class="btn btn-primary" id="action_button" user_id="{{$client1->user_id}}">EDIT INFO</button> <br>
                <button class="btn btn-info" id="default_password_button" user_id="{{$client1->user_id}}">DEFAULT PASSWORD</button>
            </div>
           
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="text-center font-weight-bold">
                    Question Form 
                </h4>
                <div class="text-center">
                    <button class="btn btn-primary" id="clear_form" user_id="{{$client1->user_id}}">CLEAR FORM</button> 
                </div>
                
                <ul class="nav nav-tabs justify-content-center" role="tablist">
                    @foreach($client1->industries()->get() as $industry)
                        <li class="nav-item">
                            <a class="nav-link menu_indus {!! $loop->first ? 'active' : '' !!}" data-toggle="tab" href="#indus{{$industry->type_of_industry->id}}" role="tab" aria-selected="false">
                                {{$industry->type_of_industry->title}}
                            </a>
                        </li>
                    @endforeach
                </ul>
               
            </div>
            <div class="card-body">
                @foreach($client1->industries()->get() as $industry)
                    <div class="tab-content">
                        <div class="tab-pane tab_indus {!! $loop->first ? 'active' : '' !!}" id="indus{{$industry->type_of_industry->id}}" role="tabpanel">
                            <ul class="nav nav-tabs justify-content-center" role="tablist">
                                @foreach($industry->type_of_industry->toi_tota()->get() as $act)
                                    <li class="nav-item">
                                        <a class="nav-link menu_act {!! $loop->first ? 'active' : '' !!}" data-toggle="tab" href="#act{{$act->type_of_trade_act->id}}" role="tab" aria-selected="false">
                                            {{$act->type_of_trade_act->title}}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                            @foreach($industry->type_of_industry->toi_tota()->get() as $act)
                                <div class="tab-content">
                                    <div class="tab-pane tab_act {!! $loop->first ? 'active' : '' !!}" id="act{{$act->type_of_trade_act->id}}" role="tabpanel">
                                        <div class="card">
                                                <h4 class="text-uppercase text-info text-center">
                                                    <a href="" target="_black">
                                                        {{$act->type_of_trade_act->title}}
                                                    </a>
                                                </h4>
                                                @foreach($act->type_of_trade_act->subtitle_of_laws()->get() as $subtitle)
                                                    <h5 class="text-center">
                                                            {!! $subtitle->title !!}
                                                    </h5>
                                                    <div class="table-responsive">
                                                        <table class="table display table-bordered" width="100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th width="100">Title</th>
                                                                        <th width="100">Applicability</th>
                                                                        <th width="100">If Yes, which dept?</th>
                                                                        <th width="100">Compliance Status</th>
                                                                        <th width="100">Evidences seen / Remarks</th>
                                                                        <th width="100">Related Procedures / Documents / HIRA No.</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach($subtitle->title_of_laws as $law)
                                                                        <tr data-entry-id="">
                                                                            <td class="font-weight-bold">
                                                                                {{$law->title}}
                                                                            </td>
                                                                            <?php 
                                                                                $answers = \App\Models\QuestionForm::where('title_of_law_id', $law->id)
                                                                                                                    ->where('client_id', $client1->id)
                                                                                                                        ->get();
                                                                            ?>
                                                                            @forelse($answers as $answer)
                                                                                <td>
                                                                                    {{$answer->applicability ?? ''}}
                                                                                </td>
                                                                                <td>
                                                                                    {{$answer->iywd ?? ''}}
                                                                                </td>
                                                                                <td>
                                                                                    {{$answer->compliance_status ?? ''}}
                                                                                </td>
                                                                                <td>
                                                                                    {{$answer->remarks ?? ''}}
                                                                                    @if($answer->file_remarks != '')
                                                                                        <br>
                                                                                        <a href="/assets/file_remarks/{{$answer->file_remarks}}" target="_blank">{{$answer->file_remarks}}</a>
                                                                                    @endif
                                                                                </td>
                                                                                <td>
                                                                                    {{$answer->rpdhn ?? ''}}
                                                                                </td>
                                                                            @empty
                                                                                <td>
                                                                                   
                                                                                </td>
                                                                                <td>
                                                                                    
                                                                                </td>
                                                                                <td>
                                                                                   
                                                                                </td>
                                                                                <td>
                                                                                   
                                                                                </td>
                                                                                <td>
                                                                                    
                                                                                </td>
                                                                            @endforelse
                                                                        
                                                                    </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                    </div>
                                                @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach   
                        </div>
                    </div>
                    
                @endforeach
            </div>
           
        </div>
    </div>
</div>


<form method="post" id="myForm">
    @csrf
    <div class="modal fade" id="myModal" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title text-uppercase font-weight-bold">Date of Subscription</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="fas fa-times"></i>
            </button>
            </div>
            <div class="modal-body row">
                <div class="col-md-12" id="form_subtitile_of_law">
                    <div class="form-group">
                        <label class="control-label text-uppercase  h6" >Date of Subscription<span class="text-danger">*</span></label>
                        <input type="date" name="date_of_subscription" id="date_of_subscription" class="form-control" value="{{$client1->user->subscribe_at}}" />
                        
                        <span class="text-danger">
                            <strong id="error-date_of_subscription"></strong>
                        </span>
                    </div>
                </div>
               
                <input type="hidden" name="user_id_subs" id="user_id_subs" value="{{$client1->user->id}}"/>
               
            </div>
            
            <div class="modal-footer bg-white">
                <button type="button" class="btn btn-white text-uppercase" data-dismiss="modal">Close</button>
                <input type="submit" name="action_button_subscription" id="action_button_subscription" class="text-uppercase btn btn-primary" value="Sumbit" />
            </div>
        
        </div>
    </div>
</form>


@endsection
@section('scripts')
<script>

$(".menu_indus").on('click', function() {
    $(".tab_indus").removeClass("active");
});

$(".menu_act").on('click', function() {
    $(".tab_act").removeClass("active");
});

$(document).on('click', '.account_subscription', function(event){
    $('#myModal').modal('show');
    $('#myForm')[0].reset();
    $('.form-control').removeClass('is-invalid');
});

$('#myForm').on('submit', function(event){
    event.preventDefault();
    $('.form-control').removeClass('is-invalid')
    
    $.ajax({
        url: "/admin/manage_client/"+$('#user_id_subs').val()+"/subscription",
        method: "PUT",
        data: $(this).serialize(),
        dataType:"json",
        beforeSend:function(){
            $('#action_button_subscription').attr('disabled', true);
        },
        success:function(data){
            $('#action_button_subscription').attr('disabled', false);
            if(data.errors){
                $.each(data.errors, function(key,value){
                    if(key == $('#'+key).attr('id')){
                        $('#'+key).addClass('is-invalid')
                        $('#error-'+key).text(value)
                    }
                })
            }
            if(data.success){
                $.confirm({
                    title: data.success,
                    content: "",
                    type: 'green',
                    buttons: {
                        confirm: {
                            text: '',
                            btnClass: 'btn-green',
                            keys: ['enter', 'shift'],
                            action: function(){
                                location.reload();
                            }
                        },
                    }
                });
            }
        }
    });
});

$('#client_dd').on("change", function(event){
    var user_id = $(this).val();
    window.location.href = '/admin/manage_client/'+user_id;
});

var isUpdate = false;
$("#action_button").on('click', function() {
    var user_id = $(this).attr('user_id');
    if(isUpdate == false){
        isUpdate = true;
        $('#action_button').text('UPDATE INFO');
        $("#action_button").removeClass("btn-primary");
        $("#action_button").addClass("btn-success");
        $(".input_client").attr('readonly', false);
        $("#name").focus();

    } else {
        $('#action_button').text('EDIT INFO');
        $("#action_button").removeClass("btn-success");
        $("#action_button").addClass("btn-primary");
        $(".input_client").attr('readonly', true);
        isUpdate = false;
        var form_data = new FormData(); 
                form_data.append("name", $('#name').val());
                form_data.append("email", $('#email').val());
                form_data.append("contact_number", $('#contact_number').val());
                form_data.append("address", $('#address').val());
                form_data.append("_token", '{{csrf_token()}}');

        console.log(form_data)
        $.ajax({
        url: "/admin/manage_client/"+user_id+"/update",
        method:'post',
        data: form_data,
        cache: false,
        contentType: false,
        processData: false,
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
                        isUpdate = true;
                        $('#action_button').text('UPDATE INFO');
                        $("#action_button").removeClass("btn-primary");
                        $("#action_button").addClass("btn-success");
                        $(".input_client").attr('readonly', false);
                        $("#"+key).focus();
                    }
                })
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
                                }
                            },
                            
                        }
                    });
            }
        }
    });

    }
});

$(document).on('click', '#default_password_button', function(){
  var user_id = $(this).attr('user_id');
  $.confirm({
      title: 'Confirmation',
      content: 'Are you sure?',
      type: 'blue',
      buttons: {
          confirm: {
              text: 'confirm',
              btnClass: 'btn-blue',
              keys: ['enter', 'shift'],
              action: function(){
                  return $.ajax({
                      url:"/admin/manage_client/"+user_id+"/dpass",
                      method:'PUT',
                      data: {
                          _token: '{!! csrf_token() !!}',
                      },
                      dataType:"json",
                      beforeSend:function(){
                       
                      },
                      success:function(data){
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
                                          }
                                      },
                                      
                                  }
                              });
                          }
                      }
                  })
              }
          },
          cancel:  {
              text: 'cancel',
              btnClass: 'btn-red',
              keys: ['enter', 'shift'],
          }
      }
  });

});

$(document).on('click', '#clear_form', function(){
  var user_id = $(this).attr('user_id');
  $.confirm({
      title: 'Confirmation',
      content: 'Are you sure?',
      type: 'red',
      buttons: {
          confirm: {
              text: 'confirm',
              btnClass: 'btn-blue',
              keys: ['enter', 'shift'],
              action: function(){
                  return $.ajax({
                      url:"/admin/manage_client/"+user_id+"/clear_form",
                      method:'delete',
                      data: {
                          _token: '{!! csrf_token() !!}',
                      },
                      dataType:"json",
                      beforeSend:function(){
                       
                      },
                      success:function(data){
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
                                          }
                                      },
                                      
                                  }
                              });
                          }
                      }
                  })
              }
          },
          cancel:  {
              text: 'cancel',
              btnClass: 'btn-red',
              keys: ['enter', 'shift'],
          }
      }
  });

});


</script>
@endsection