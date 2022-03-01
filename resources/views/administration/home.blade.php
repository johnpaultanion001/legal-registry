@extends('layouts.admin1')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <hr class="my-2 bg-danger">
                <div class="row">
                    <div class="col-6">
                        <h3>Administration</h3>
                    </div>
                  
                  
                </div>
               
            </div>
          
          

        </div>
    </div>

    <div class="col-lg-12">
        <div class="card">
                <div class="card-header p-1">
                    <h4>
                        All Transaction Report
                    </h4>
                    <h6>
                        Total Transaction : <span class="text-primary">{{$histories->count()}}</span>
                    </h6>
                    
                        <h6 class="text-uppercase">Filter By: </h6>
                        <div class="row">
                            <div class="col-md-2 mb-1">
                                <select name="status" id="status" class="select2 form-control">
                                    <option value="" >Status</option>
                                    <option value="Sending">Sending</option>
                                    <option value="Ready For Pickup">Ready For Pickup</option>
                                    <option value="Claimed">Claimed</option>
                                </select>
                            </div>
                            <div class="col-md-2 mb-1">
                                <select name="payment" id="payment" class="select2 form-control">
                                    <option value="" >Payment</option>
                                    <option value="Fully">Fully Paid</option>
                                    <option value="Un">Unpaid</option>
                                </select>
                            </div>
                        </div>
                        
                
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table align-items-center table-flush datatable-country display" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>
                                        S N
                                    </th>
                                    <th>
                                        Date
                                    </th>
                                    <th>
                                        Reference #
                                    </th>
                                    <th>
                                        User
                                    </th>
                                    <th>
                                        country
                                    </th>
                                    <th>
                                        Receive Amount
                                    </th>
                                    <th>
                                        Send Amount
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                    <th>
                                        Payment
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($histories as $key => $country)
                                    <tr data-entry-id="{{ $country->id }}">
                                        <td>
                                            {{ $country->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $country->created_at->format('F d,Y h:i A') }}
                                        </td>
                                        <td>
                                            {{ $country->reference_number ?? '' }}
                                        </td>
                                        <td>
                                            {{ $country->user->firstname ?? '' }} {{ $country->user->lastname ?? '' }}
                                        </td>
                                        <td>
                                            {{ $country->country->country_firstname ?? '' }} {{ $country->country->country_lastname ?? '' }}
                                        </td>
                                        <td>
                                            {{  number_format($country->receive_amount , 0, ',', ',') }}
                                            <hr class="my-1 bg-muted">
                                            {{ $country->country->bank->bank_name ?? '' }}

                                        </td>
                                        <td>
                                            {{  number_format($country->send_amount , 0, ',', ',') }}
                                            <hr class="my-1 bg-muted">
                                            {{ $country->transaction_payment_mode ?? '' }}
                                        </td>
                                        <td>
                                            @if($country->status == 0)
                                                <button status="{{$country->id}}" class="transaction_status btn btn-sm btn-success">Sending</button>
                                            @elseif($country->status == 1)
                                                <button status="{{$country->id}}" class="transaction_status btn btn-sm btn-warning">Ready For Pickup</button>
                                            @elseif($country->status == 2)
                                                <button status="{{$country->id}}" class="transaction_status btn btn-sm btn-primary">Claimed</button>
                                            @endif
                                        </td>
                                        <td>
                                            @if($country->isPaid == false)
                                                <button payment="{{$country->id}}" class="transaction_payment btn btn-danger btn-sm">UNPAID</button>
                                            @elseif($country->isPaid == true)
                                                <button payment="{{$country->id}}" class="transaction_payment btn btn-success btn-sm">FULLY PAID</button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>
        

    <div class="col-lg-12">
        <div class="card">
                <div class="card-header p-2">
                    <h4>
                        Country Receipt
                    </h4>
                    <h6>
                        Total Countries: <span class="text-primary">{{$countries->count()}}</span>
                    </h6>
                    <button type="button" id="create_record" class="btn btn-primary btn-sm">Add Country</button>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table align-items-center table-flush datatable-country display" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>
                                        Action
                                    </th>
                                    <th>
                                        Country
                                    </th>
                                    <th>
                                        Code
                                    </th>
                                    <th>
                                        Exchange
                                    </th>
                                    <th>
                                        Created At
                                    </th>
                                    <th>
                                        Updated At
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($countries as $country)
                                    <tr data-entry-id="{{ $country->id }}">
                                        <td>
                                            <button type="button" edit="{{  $country->id ?? '' }}" class="edit_country btn btn-info btn-sm">Edit</button>
                                            <button type="button" remove="{{  $country->id ?? '' }}" class="remove_country btn btn-danger btn-sm">Remove</button>
                                        </td>
                                        
                                        <td>
                                            {{ $country->country }}
                                        </td>
                                        <td>
                                            {{ $country->code }}
                                        </td>
                                        <td>
                                            {{ $country->exchange }}
                                        </td>
                                        <td>
                                            {{ $country->created_at->format('F d,Y h:i A') }}
                                        </td>
                                        <td>
                                            {{ $country->updated_at->format('F d,Y h:i A') }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="card">
                <div class="card-header p-2">
                    <h4>
                        Banks List
                    </h4>
                    <h6>
                        Total Banks: <span class="text-primary">{{$banks->count()}}</span>
                    </h6>
                    <button type="button" status="bank" class="create_bank btn btn-primary btn-sm">Add Bank</button>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table align-items-center table-flush datatable-country display" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>
                                        Action
                                    </th>
                                    <th>
                                        Bank Name
                                    </th>
                                    <th>
                                        Province
                                    </th>
                                    <th>
                                        City
                                    </th>
                                    <th>
                                        Full Address
                                    </th>
                                    <th>
                                        Created At
                                    </th>
                                    <th>
                                        Updated At
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($banks as $bank)
                                    <tr data-entry-id="{{ $bank->id }}">
                                        <td>
                                            <button type="button" edit="{{  $bank->id ?? '' }}" class="edit_record btn btn-info btn-sm">Edit</button>
                                            <button type="button" remove="{{  $bank->id ?? '' }}" class="remove_record btn btn-danger btn-sm">Remove</button>
                                        </td>
                                        
                                        <td>
                                            {{ $bank->bank_name }}
                                        </td>
                                        <td>
                                            {{ $bank->province->province_description }}
                                        </td>
                                        <td>
                                            {{ $bank->city->city_municipality_description }}
                                        </td>
                                        <td>
                                            {{ $bank->address }}
                                        </td>
                                        <td>
                                            {{ $bank->created_at->format('F d,Y h:i A') }}
                                        </td>
                                        <td>
                                            {{ $bank->updated_at->format('F d,Y h:i A') }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="card">
                <div class="card-header p-2">
                    <h4>
                        Branchs List
                    </h4>
                    <h6>
                        Total Branchs: <span class="text-primary">{{$branchs->count()}}</span>
                    </h6>
                    <button type="button" status="branch" class="create_bank btn btn-primary btn-sm">Add Branch</button>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table align-items-center table-flush datatable-country display" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>
                                        Action
                                    </th>
                                    <th>
                                        Branch Name
                                    </th>
                                    <th>
                                        Province
                                    </th>
                                    <th>
                                        City
                                    </th>
                                    <th>
                                        Full Address
                                    </th>
                                    <th>
                                        Created At
                                    </th>
                                    <th>
                                        Updated At
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($branchs as $bank)
                                    <tr data-entry-id="{{ $bank->id }}">
                                        <td>
                                            <button type="button" edit="{{  $bank->id ?? '' }}" class="edit_record btn btn-info btn-sm">Edit</button>
                                            <button type="button" remove="{{  $bank->id ?? '' }}" class="remove_record btn btn-danger btn-sm">Remove</button>
                                        </td>
                                        
                                        <td>
                                            {{ $bank->bank_name }}
                                        </td>
                                        <td>
                                            {{ $bank->province->province_description }}
                                        </td>
                                        <td>
                                            {{ $bank->city->city_municipality_description }}
                                        </td>
                                        <td>
                                            {{ $bank->address }}
                                        </td>
                                        <td>
                                            {{ $bank->created_at->format('F d,Y h:i A') }}
                                        </td>
                                        <td>
                                            {{ $bank->updated_at->format('F d,Y h:i A') }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
                                <label class="control-label text-uppercase" >CODE<span class="text-danger">*</span> </label>
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

<form method="post" id="recordForm" class="form-horizontal ">
    @csrf
    <div class="modal" id="recordModal" data-keyboard="false" data-backdrop="static">
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
                                <label class="control-label text-uppercase" >Name:<span class="text-danger">*</span> </label>
                                <input type="text" name="bank_name" id="bank_name" class="form-control" />
                                <span class="invalid-feedback" role="alert">
                                    <strong id="error-bank_name"></strong>
                                </span>
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label text-uppercase" >Province:<span class="text-danger">*</span> </label>
                                <select name="province_code" id="province_code" class="classic-input2 form-control select2" style="width: 100%">
                                    <option value="" disabled selected>Province</option>
                                    @foreach ($provincies as $province)
                                        <option value="{{$province->province_code}}">{{$province->province_description}}</option>
                                    @endforeach
                                </select>
                                <span class="invalid-feedback" role="alert">
                                    <strong id="error-province_code"></strong>
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label text-uppercase" >City:<span class="text-danger">*</span> </label>
                                <select name="city_municipality_code" id="city_municipality_code" class="classic-input2 form-control select2" style="width: 100%">
                                    <option value="" disabled selected>City</option>
                                        @foreach ($cities as $city)
                                            <option value="{{$city->city_municipality_code}}">{{$city->city_municipality_description}}</option>
                                        @endforeach

                                </select>
                                <span class="invalid-feedback" role="alert">
                                    <strong id="error-city_municipality_code"></strong>
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label text-uppercase" >Full Address:<span class="text-danger">*</span></label>
                                <input type="text" name="address" id="address"  class="classic-input2 form-control font-weight-bold map-input" placeholder="Search a address here">
                                <span class="invalid-feedback" role="alert">
                                    <strong id="error-address"></strong>
                                </span>

                                <input type="hidden" name="latitude" id="address-latitude" />
                                <input type="hidden" name="longitude" id="address-longitude"/>
                                <div id="address-map"></div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="record_action" id="record_action" value="Add" />
                    <input type="hidden" name="record_hidden_id" id="record_hidden_id" />
                    <input type="hidden"   name="record_status" id="record_status" />
                </div>
        
                <!-- Modal footer -->
                <div class="modal-footer bg-white">
                    <button type="button" class="btn btn-white text-uppercase" data-dismiss="modal">Close</button>
                    <input type="submit" name="record_action_button" id="record_action_button" class="text-uppercase btn btn-primary" value="Save" />
                </div>
        
            </div>
        </div>
    </div>
</form>


@endsection
@section('scripts')
<script src="/js/mapInput.js"></script>
<!-- <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize&language=en&region=GB" async defer></script> -->
<script type='text/javascript' src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDRuaXzf2jNaX7t6im3kt7vR9aKksgkhmg&libraries=places&callback=initialize&language=en&region=GB" async defer></script>


<script>
$(function () {

    let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

    $.extend(true, $.fn.dataTable.defaults, {
    pageLength: 100,
    });

   var table = $('.datatable-country:not(.ajaxTable)').DataTable({ buttons: dtButtons });
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });

    $('#status').on('change', function () {
        table.columns(7).search( this.value ).draw();
    });
    $('#payment').on('change', function () {
        table.columns(8).search( this.value ).draw();
    });

});


$(document).on('click', '.transaction_status', function(event){
    var transaction = $(this).attr('status');
    var _token =  $('input[name="_token"]').val();

    $.ajax({
        url:"{{ route('admin.transation.status') }}",
        method:"PUT",
        dataType: "json",
        data:{transaction:transaction, _token:_token},
        beforeSend: function() {
            
        },
        success:function(data){
            if(data.success){
                location.reload();
            }
            
        }
    });
});

$(document).on('click', '.transaction_payment', function(event){
    var payment = $(this).attr('payment');
    var _token =  $('input[name="_token"]').val();

    $.ajax({
        url:"{{ route('admin.transation.payment') }}",
        method:"PUT",
        dataType: "json",
        data:{payment:payment, _token:_token},
        beforeSend: function() {
            
        },
        success:function(data){
            if(data.success){
                location.reload();
            }
            
        }
    });
});

$(document).on('click', '.edit_country', function(){
    $('#countryModal').modal('show');
    $('.modal-title').text('Edit Country');
    $('#countryForm')[0].reset();
    $('.form-control').removeClass('is-invalid')
    var id = $(this).attr('edit');

    $.ajax({
        url :"/admin/countries/"+id+"/edit",
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
    $('.modal-title').text('Add Country');
    $('#country_action_button').val('Submit');
    $('#country_action').val('Add');
});

$('#countryForm').on('submit', function(event){
    event.preventDefault();
    $('.form-control').removeClass('is-invalid')
    var action_url = "{{ route('admin.countries.store') }}";
    var type = "POST";

    if($('#country_action').val() == 'Edit'){
        var id = $('#country_hidden_id').val();
        action_url = "/admin/countries/" + id;
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
                      url:"/admin/countries/"+id,
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

$(document).on('click', '.create_bank', function(){
    $('#recordModal').modal('show');
    $('#recordForm')[0].reset();
    $('.form-control').removeClass('is-invalid')
    $('.modal-title').text('Add Record');
    $('#record_action_button').val('Submit');
    $('#record_action').val('Add');
    var status = $(this).attr('status');
    if(status == 'bank'){
        $('#record_status').val('BANK');
    }else if(status == 'branch'){
        $('#record_status').val('BRANCH');
    }

    

});

$(document).on('click', '.edit_record', function(){
    $('#recordModal').modal('show');
    $('.modal-title').text('Edit Record');
    $('#recordForm')[0].reset();
    $('.form-control').removeClass('is-invalid')
    var id = $(this).attr('edit');

    $.ajax({
        url :"/admin/banks/"+id+"/edit",
        dataType:"json",
        beforeSend:function(){
            $("#record_action_button").attr("disabled", true);
            $("#record_action_button").attr("value", "Loading..");
        },
        success:function(data){
            $('#loading-containermodal').hide();
            $('.modalbody').show();
            if($('#record_action').val() == 'Edit'){
                $("#record_action_button").attr("disabled", false);
                $("#record_action_button").attr("value", "Update");
            }else{
                $("#record_action_button").attr("disabled", false);
                $("#record_action_button").attr("value", "Submit");
            }
            $.each(data.result, function(key,value){
                if(key == $('#'+key).attr('id')){
                    $('#'+key).val(value)
                }
                if(key == 'province_code'){
                    $("#province_code").select2("trigger", "select", {
                        data: { id: value }
                    });
                }
                if(key == 'city_municipality_code'){
                    $("#city_municipality_code").select2("trigger", "select", {
                        data: { id: value }
                    });
                }
            })
            
            
            $('#record_hidden_id').val(id);
            $('#record_action_button').val('Update');
            $('#record_action').val('Edit');
        }
    })
});

$('#recordForm').on('submit', function(event){
    event.preventDefault();
    $('.form-control').removeClass('is-invalid')
    var action_url = "{{ route('admin.banks.store') }}";
    var type = "POST";

    if($('#record_action').val() == 'Edit'){
        var id = $('#record_hidden_id').val();
        action_url = "/admin/banks/" + id;
        type = "PUT";
    }

    $.ajax({
        url: action_url,
        method:type,
        data:$(this).serialize(),
        dataType:"json",
        beforeSend:function(){
            $("#record_action_button").attr("disabled", true);
            $("#record_action_button").attr("value", "Loading..");
        },
        success:function(data){
            $("#record_action_button").attr("disabled", false);
            $("#record_action_button").attr("value", "Submit");
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
                $('#recordForm')[0].reset();
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

$(document).on('click', '.remove_record', function(){
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
                      url:"/admin/banks/"+id,
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


</script>
@endsection