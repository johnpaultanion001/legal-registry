@extends('layouts.admin1')
@section('content')

    <div id="exchange_rates">
        <div class="col-lg-12">
            <div class="card">
                    <div class="card-header p-2">
                        <h4>
                            Branch Bank Settings
                        </h4>
                        <button type="button" id="create_record" class="btn btn-primary btn-sm">Add Record</button>

                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                        <table class="table align-items-center table-flush datatable-country display" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>
                                            Name
                                        </th>
                                        <th>
                                            Display Name
                                        </th>
                                        <th>
                                            Full Addresss
                                        </th>
                                        <th>
                                            Province
                                        </th>
                                        <th>
                                            City
                                        </th>
                                        <th>
                                            Latitude
                                        </th>
                                        <th>
                                            Longitude
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                        <th>
                                            
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($banks as $bank)
                                            <tr data-entry-id="{{ $bank->id }}">
                                                <td>
                                                    {{ $bank->name ?? '' }}
                                                </td>
                                                <td>
                                                    {{ $bank->display_name ?? '' }}
                                                </td>
                                                <td>
                                                    {{ $bank->address ?? '' }}
                                                </td>
                                                <td>
                                                    {{ $bank->province->province_description ?? '' }}
                                                </td>
                                                <td>
                                                    {{ $bank->city->city_municipality_description ?? '' }}
                                                </td>
                                                <td>
                                                    {{ $bank->lat ?? '' }}
                                                </td>
                                                <td>
                                                    {{ $bank->lng ?? '' }}
                                                </td>
                                                <td>
                                                    {{ $bank->status ?? '' }}
                                                </td>
                                                <td>
                                                    <button type="button" edit="{{  $bank->id ?? '' }}" class="edit btn btn-info btn-sm"><i class="fas fa-pen"></i></button>
                                                    <button type="button" remove="{{  $bank->id ?? '' }}" class="remove btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                                   
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

<form method="post" id="bankForm" class="form-horizontal ">
    @csrf
    <div class="modal" id="bankModal" data-keyboard="false" data-backdrop="static">
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
                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label text-uppercase" >NAME<span class="text-danger">*</span> </label>
                                <input type="text" name="name" id="name" class="form-control" />
                                <span class="invalid-feedback" role="alert">
                                    <strong id="error-name"></strong>
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label text-uppercase" >DISPLAY NAME<span class="text-danger">*</span> </label>
                                <input type="text" name="display_name" id="display_name" class="form-control" />
                                <span class="invalid-feedback" role="alert">
                                    <strong id="error-display_name"></strong>
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label text-uppercase" >ADDRESS<span class="text-danger">*</span> </label>
                                <input type="text" name="address" id="address" class="form-control" />
                                <span class="invalid-feedback" role="alert">
                                    <strong id="error-address"></strong>
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label text-uppercase" >Status<span class="text-danger">*</span> </label>
                                <select name="status" id="status" class="classic-input2 form-control select2" style="width: 100%">
                                    <option value="" disabled selected>Status</option>
                                        <option value="BANK">BANK</option>
                                        <option value="CASH_AGENT">CASH_AGENT</option>
                                        
                                </select>
                                <span class="invalid-feedback" role="alert">
                                    <strong id="error-status"></strong>
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label text-uppercase" >Province<span class="text-danger">*</span> </label>
                                <select name="province" id="province" class="classic-input2 form-control select2" style="width: 100%">
                                    <option value="" disabled selected>Province</option>
                                    @foreach ($provincies as $province)
                                        <option value="{{$province->province_code}}">{{$province->province_description}}</option>
                                    @endforeach
                                </select>
                                <span class="invalid-feedback" role="alert">
                                    <strong id="error-province"></strong>
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label text-uppercase" >City<span class="text-danger">*</span> </label>
                                <select name="city" id="city" class="classic-input2 form-control select2" style="width: 100%">
                                    <option value="" disabled selected>City</option>
                                    @foreach ($cities as $city)
                                        <option value="{{$city->city_municipality_code}}">{{$city->city_municipality_description}}</option>
                                    @endforeach
                                </select>
                                <span class="invalid-feedback" role="alert">
                                    <strong id="error-city"></strong>
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label text-uppercase" >Latitude<span class="text-danger">*</span> </label>
                                <input type="number" step="any" name="lat" id="lat" class="form-control" />
                                <span class="invalid-feedback" role="alert">
                                    <strong id="error-lat"></strong>
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label text-uppercase" >Longitude<span class="text-danger">*</span> </label>
                                <input type="number" step="any" name="lng" id="lng" class="form-control" />
                                <span class="invalid-feedback" role="alert">
                                    <strong id="error-lng"></strong>
                                </span>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="bank_action" id="bank_action" value="Add" />
                    <input type="hidden" name="bank_hidden_id" id="bank_hidden_id" />
                </div>
        
                <!-- Modal footer -->
                <div class="modal-footer bg-white">
                    <button type="button" class="btn btn-white text-uppercase" data-dismiss="modal">Close</button>
                    <input type="submit" name="bank_action_button" id="bank_action_button" class="text-uppercase btn btn-primary" value="Save" />
                </div>
        
            </div>
        </div>
    </div>
</form>



@endsection
@section('scripts')
<script>


$(document).on('click', '.edit', function(){
    $('#bankModal').modal('show');
    $('.modal-title').text('Edit Record');
    $('#bankForm')[0].reset();
    $('.form-control').removeClass('is-invalid');
    $('#bank_action').val('Edit');
    var id = $(this).attr('edit');

    $.ajax({
        url :"/admin/branch_bank_setting/"+id+"/edit",
        dataType:"json",
        beforeSend:function(){
            $("#bank_action_button").attr("disabled", true);
            $("#bank_action_button").attr("value", "Loading..");
        },
        success:function(data){
            $('#loading-containermodal').hide();
            $('.modalbody').show();
            if($('#bank_action').val() == 'Edit'){
                $("#bank_action_button").attr("disabled", false);
                $("#bank_action_button").attr("value", "Update");
            }else{
                $("#bank_action_button").attr("disabled", false);
                $("#bank_action_button").attr("value", "Submit");
            }
            $.each(data.result, function(key,value){
                if(key == $('#'+key).attr('id')){
                    $('#'+key).val(value)
                }
                if(key == 'status'){
                    $("#status").select2("trigger", "select", {
                        data: { id: value }
                    });
                }
                if(key == 'province_code'){
                    $("#province").select2("trigger", "select", {
                        data: { id: value }
                    });
                }
                if(key == 'city_municipality_code'){
                    $("#city").select2("trigger", "select", {
                        data: { id: value }
                    });
                }
            })
            
            $('#bank_hidden_id').val(id);
            $('#bank_action_button').val('Update');
            
        }
    })
});

$(document).on('click', '#create_record', function(){
    $('#bankModal').modal('show');
    $('#bankForm')[0].reset();
    $('.form-control').removeClass('is-invalid')
    $('.modal-title').text('Add Record');
    $('#bank_action_button').val('Submit');
    $('#bank_action').val('Add');
});

$('#bankForm').on('submit', function(event){
    event.preventDefault();
    $('.form-control').removeClass('is-invalid')
    var action_url = "{{ route('admin.branch_bank_setting.store') }}";
    var type = "POST";

    if($('#bank_action').val() == 'Edit'){
        var id = $('#bank_hidden_id').val();
        action_url = "/admin/branch_bank_setting/" + id;
        type = "PUT";
    }

    $.ajax({
        url: action_url,
        method:type,
        data:$(this).serialize(),
        dataType:"json",
        beforeSend:function(){
            $("#bank_action_button").attr("disabled", true);
            $("#bank_action_button").attr("value", "Loading..");
        },
        success:function(data){
            $("#bank_action_button").attr("disabled", false);
            $("#bank_action_button").attr("value", "Submit");
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
                $('#bankForm')[0].reset();
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

$(document).on('click', '.remove', function(){
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
                      url:"/admin/branch_bank_setting/"+id,
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

$('select[name="province"]').on("change", function(event){
    var province = $(this).val();
    var action = $('#bank_action').val();
        if(action == 'Add'){
            $.ajax({
            url: "{{ route('branch_locator.province') }}",
            type: "get",
            dataType: "json",
            data: {
                province:province, status:status ,_token: '{!! csrf_token() !!}',
            },
            beforeSend: function() {
                $('#province').addClass('is-invalid');
                $('#error-province').text('LOADING...');
            },
            success: function(data){
                $('#province').removeClass('is-invalid');
                var cities = '';
                cities += '<option value="" disabled selected>City</option>';
                $.each(data.cities, function(key,value){
                    cities += '<option value="'+value.city_municipality_code+'">'+value.city_municipality_description+'</option>';
                });
                $('#city').empty().append(cities);

            }	
        })
    }
   
});





</script>
@endsection