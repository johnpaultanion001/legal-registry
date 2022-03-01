@extends('layouts.admin1')
@section('content')

    <div id="exchange_rates">
        <div class="col-lg-12">
            <div class="card">
                    <div class="card-header p-2">
                        <h4>
                            Exchange Rate
                        </h4>

                        @can('admin_access')
                            <button type="button" id="create_record" class="btn btn-primary btn-sm">Add Record</button>
                        @endcan
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                        <table class="table align-items-center table-flush datatable-country display" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                    
                                        <th>
                                            Country
                                        </th>
                                        <th>
                                            Settlement
                                        </th>
                                        <th>
                                            Rate
                                        </th>
                                        <th>
                                            Updated At
                                        </th>
                                        <th>
                                            
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($countries as $country)
                                        <tr data-entry-id="{{ $country->id }}">
                                            <td>
                                                {{ $country->country ?? '' }}
                                            </td>
                                            <td>
                                                
                                                {{ $country->exchange ?? '' }} {{ $country->code ?? '' }}
                                            </td>
                                            <td>
                                                {{ $country->exchange ?? '' }}
                                            </td>
                                            <td>
                                                {{ $country->updated_at->format('M j , Y h:i A') }}
                                            </td>
                                            <td>
                                                <button type="button" edit="{{  $country->id ?? '' }}" class="edit_country btn btn-info btn-sm"><i class="fas fa-pen"></i></button>
                                                <button type="button" list="{{  $country->id ?? '' }}" class="list_records btn btn-primary btn-sm"><i class="fas fa-list"></i></button>
                                                @can('admin_access')
                                                    <button type="button" remove="{{  $country->id ?? '' }}" class="remove_country btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <div id="exchange_rates_records">
        <div class="col-lg-12">
            <div class="card">
                    <div class="card-header p-2">
                        <h4>
                            Exchange Rate Records
                        </h4>
                        <button type="button" id="exchange_rate" class="btn btn-primary btn-sm">Exchange Rate</button>
                    </div>

                    <div class="card-body">
                    <div id="exchange_rate_records">

                    </div>
                    </div>
            </div>
        </div>
    </div>
    


<form method="post" id="countryForm" class="form-horizontal ">
    @csrf
    <div class="modal" id="countryModal" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-lg modal-dialog-centered ">
            <div class="modal-content">
        
                <!-- Modal Header -->
                <div class="modal-header ">
                    <p class="modal-title  text-uppercase font-weight-bold">Modal Heading</p>
                    <button type="button" class="close " data-dismiss="modal">&times;</button>
                </div>

                    
                <!-- Modal body -->
                <div class="modal-body">
                 <div id="modalbody" class="modalbody row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label text-uppercase" >Country:<span class="text-danger">*</span> </label>
                                <input type="text" name="country" id="country" class="form-control" />
                                <span class="invalid-feedback" role="alert">
                                    <strong id="error-country"></strong>
                                </span>
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label text-uppercase" >CURRENCY<span class="text-danger">*</span> </label>
                                <input type="text" name="code" id="code" class="form-control" />
                                <span class="invalid-feedback" role="alert">
                                    <strong id="error-code"></strong>
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label text-uppercase" >Exchange<span class="text-danger">*</span> </label>
                                <input type="number" step="any" name="exchange" id="exchange" class="form-control" />
                                <span class="invalid-feedback" role="alert">
                                    <strong id="error-exchange"></strong>
                                </span>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="country_action" id="country_action" value="Add" />
                    <input type="hidden" name="country_hidden_id" id="country_hidden_id" />
                </div>
        
                <!-- Modal footer -->
                <div class="modal-footer bg-white">
                    <button type="button" class="btn btn-white text-uppercase" data-dismiss="modal">Close</button>
                    <input type="submit" name="country_action_button" id="country_action_button" class="text-uppercase btn btn-primary" value="Save" />
                </div>
        
            </div>
        </div>
    </div>
</form>




@endsection
@section('scripts')
<script>
$(function () {
    $("#exchange_rates_records").hide();
    $("#exchange_rates").show();
});

$(document).on('click', '.edit_country', function(){
    $('#countryModal').modal('show');
    $('.modal-title').text('Edit Exchange Rate');
    $('#countryForm')[0].reset();
    $('.form-control').removeClass('is-invalid')
    var id = $(this).attr('edit');

    $.ajax({
        url :"/admin/exchange_rate/"+id+"/edit",
        dataType:"json",
        beforeSend:function(){
            $("#country_action_button").attr("disabled", true);
            $("#country_action_button").attr("value", "Loading..");
        },
        success:function(data){
            $('#loading-containermodal').hide();
            $('.modalbody').show();
            if($('#country_action').val() == 'Edit'){
                $("#country_action_button").attr("disabled", false);
                $("#country_action_button").attr("value", "Update");
            }else{
                $("#country_action_button").attr("disabled", false);
                $("#country_action_button").attr("value", "Submit");
            }
            $.each(data.result, function(key,value){
                if(key == $('#'+key).attr('id')){
                    $('#'+key).val(value)
                }
            })
            
            $('#country_hidden_id').val(id);
            $('#country_action_button').val('Update');
            $('#country_action').val('Edit');
        }
    })
});

$(document).on('click', '#create_record', function(){
    $('#countryModal').modal('show');
    $('#countryForm')[0].reset();
    $('.form-control').removeClass('is-invalid')
    $('.modal-title').text('Add Exchange Rate');
    $('#country_action_button').val('Submit');
    $('#country_action').val('Add');
});

$('#countryForm').on('submit', function(event){
    event.preventDefault();
    $('.form-control').removeClass('is-invalid')
    var action_url = "{{ route('admin.exchange_rate.store') }}";
    var type = "POST";

    if($('#country_action').val() == 'Edit'){
        var id = $('#country_hidden_id').val();
        action_url = "/admin/exchange_rate/" + id;
        type = "PUT";
    }

    $.ajax({
        url: action_url,
        method:type,
        data:$(this).serialize(),
        dataType:"json",
        beforeSend:function(){
            $("#country_action_button").attr("disabled", true);
            $("#country_action_button").attr("value", "Loading..");
        },
        success:function(data){
            $("#country_action_button").attr("disabled", false);
            $("#country_action_button").attr("value", "Submit");
            if(data.errors){
                $.each(data.errors, function(key,value){
                    if(key == $('#'+key).attr('id')){
                        $('#'+key).addClass('is-invalid')
                        $('#error-'+key).text(value)
                    }
                })
            }
            if(data.success){
                $('.form-control').removeClass('is-invalid')
                $('#countryForm')[0].reset();
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
});

$(document).on('click', '.remove_country', function(){
  var id = $(this).attr('remove');
  $.confirm({
      title: 'Confirmation',
      content: 'You really want to remove this record?',
      type: 'red',
      buttons: {
          confirm: {
              text: 'confirm',
              btnClass: 'btn-blue',
              keys: ['enter', 'shift'],
              action: function(){
                  return $.ajax({
                      url:"/admin/exchange_rate/"+id,
                      method:'DELETE',
                      data: {
                          _token: '{!! csrf_token() !!}',
                      },
                      dataType:"json",
                      beforeSend:function(){
                           
                      },
                      success:function(data){
                          if(data.success){
                            location.reload();
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

$(document).on('click', '.list_records', function(){
  var id = $(this).attr('list');
  $.ajax({
        url: "/admin/exchange_rate/exchange_rate_records/exchange_rate_records", 
        type: "get",
        dataType: "HTMl",
        data: {
            id:id,_token: '{!! csrf_token() !!}',
        },
        success: function(response){
            $("#exchange_rates").hide();
            $("#exchange_rates_records").show();
            $("#exchange_rate_records").html(response);
            
        }	
    })

});

$(document).on('click', '#exchange_rate', function(){
    $("#exchange_rates_records").hide();
    $("#exchange_rates").show();
});






</script>
@endsection