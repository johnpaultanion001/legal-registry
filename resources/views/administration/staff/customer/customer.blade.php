@extends('layouts.admin1')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                        <div class="card-header p-1 mt-2 text-uppercase bg-secondary">
                            <h5 class="text-white font-weight-bold">
                                Customer Search
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label text-uppercase" >Select Customer <span class="text-danger">*</span></label>
                                        <select name="customer_dd" id="customer_dd" class="form-control select2" style="width: 100%">
                                            <option value="" disabled selected>SELECT CUSTOMER</option>
                                            @foreach ($senders as $sender)
                                                <option value="{{$sender->user->id}}">{{$sender->user->firstname}} {{$sender->user->lastname}}</option>
                                            @endforeach
                                        </select>
                                        <span class="invalid-feedback" role="alert">
                                            <strong id="error-customer_dd"></strong>
                                        </span>
                                        
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                </div>
            </div>
           
            <div class="col-lg-12">
                <div class="card">
                        <div class="card-header p-1 text-uppercase bg-secondary">
                            <button class = "btn btn-sm btn-primary" id="btn_customer_detail">
                                Customer Detail
                            </button>
                            <button class = "btn btn-sm" id="btn_beneficiaries">
                                Beneficiaries
                            </button>
                            <button class = "btn btn-sm" id="btn_transactions">
                                Transactions
                            </button>
                        </div>
                        <div id="customer_detail">
                            <div class="card-header p-1 text-uppercase bg-secondary">
                                <h5 class="text-white font-weight-bold">
                                    Customer Detail
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label text-uppercase" >CUSTOMER/USER ID:</label>
                                                <input type="text" name="user_id" id="user_id"  class="classic-input2 form-control font-weight-bold map-input" readonly>
                                            <span class="invalid-feedback" role="alert">
                                                <strong id="error-user_id"></strong>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="control-label text-uppercase" >SENDER'S NAME:</label>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <small>FIRST NAME</small>
                                                    <input type="text" name="sfirst_name" id="sfirst_name"  class="classic-input2 form-control font-weight-bold map-input" readonly>
                                                </div>
                                                <div class="col-sm-4">
                                                    <small>MIDDLE NAME</small>
                                                    <input type="text" name="smiddle_name" id="smiddle_name"  class="classic-input2 form-control font-weight-bold map-input" readonly>
                                                </div>
                                                <div class="col-sm-4">
                                                    <small>LAST NAME</small>
                                                    <input type="text" name="slast_name" id="slast_name"  class="classic-input2 form-control font-weight-bold map-input" readonly>
                                                </div>

                                            </div>
                                            
                                            <span class="invalid-feedback" role="alert">
                                                <strong id="error-name"></strong>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label text-uppercase" >Address:</label>
                                            <input type="text" name="saddress" id="saddress"  class="classic-input2 form-control font-weight-bold map-input" readonly>
                                            <span class="invalid-feedback" role="alert">
                                                <strong id="error-saddress"></strong>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label text-uppercase" >MOBILE NO.:</label>
                                            <input type="text" name="smobile_no" id="smobile_no"  class="classic-input2 form-control font-weight-bold map-input" readonly>
                                            <span class="invalid-feedback" role="alert">
                                                <strong id="error-smobile_no"></strong>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label text-uppercase" >GENDER:</label>
                                            <input type="text" name="sgender" id="sgender"  class="classic-input2 form-control font-weight-bold map-input" readonly>
                                            <span class="invalid-feedback" role="alert">
                                                <strong id="error-sgender"></strong>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label text-uppercase" >NATIONALITY:</label>
                                            <input type="text" name="snationality" id="snationality"  class="classic-input2 form-control font-weight-bold map-input" readonly>
                                            <span class="invalid-feedback" role="alert">
                                                <strong id="error-snationality"></strong>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="beneficiaries">
                            <div class="card-header p-1 text-uppercase bg-secondary">
                                <h5 class="text-white font-weight-bold">
                                    Beneficiary List
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table align-items-center table-flush datatable-country display text-uppercase" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Receiver's Name
                                                </th>
                                                <th>
                                                    Address
                                                </th>
                                                <th>
                                                    Mobile No.
                                                </th>
                                                <th>
                                                    Relationship
                                                </th>
                                                <th>
                                                    Payment Type
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody id="list_beneficairy">
                                          
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div id="transactions">
                            <div class="card-header p-1 text-uppercase bg-secondary">
                                <h5 class="text-white font-weight-bold">
                                    Transactions
                                </h5>
                            </div>
                            <div class="card-body">
                               <div id="table_transaction">

                               </div>
                            </div>
                        </div>
                        
                </div>
            </div>
          
           
            
        </div>
    </div>


 


@endsection
@section('scripts')
<script>
$(function () {
    $('#customer_detail').show();
    $('#beneficiaries').hide();
    $('#transactions').hide();
});

$(document).on('click', '#btn_customer_detail', function(){

    $('#btn_customer_detail').addClass('btn-primary');
    $('#btn_beneficiaries').removeClass('btn-primary');
    $('#btn_transactions').removeClass('btn-primary');
    $('#customer_detail').show();
    $('#beneficiaries').hide();
    $('#transactions').hide();

});

// Beneficiary List
function listbeneficiaries(){
    var customer = $('#customer_dd').val();
    $.ajax({
        url: "/admin/customer/beneficiaries", 
        type: "get",
        dataType:"json",
        data: {
            customer:customer,_token: '{!! csrf_token() !!}',
        },
        beforeSend: function() {
            $('#customer_dd').addClass('is-invalid');
            $('#error-customer_dd').text('LOADING...');
        },
        success: function(data){
            $('#customer_dd').removeClass('is-invalid');

            var beneficiaries = '';
            $.each(data.beneficiaries, function(key,value){
                beneficiaries += '<tr>';
                beneficiaries += '<td>'+value.beneficiary_firstname+ ' ' +value.beneficiary_lastname+'</td>'
                beneficiaries += '<td>'+value.address+'</td>'
                beneficiaries += '<td>'+value.mobile_number+'</td>'
                beneficiaries += '<td>'+value.relation_with_beneficiary+'</td>'
                beneficiaries += '<td>'+value.payment_mode+'</td>'       
                beneficiaries += '</tr>';
            });
            $('#list_beneficairy').empty().append(beneficiaries);

        }	
    });
}

// Transaction List
function listTransactions(){
    var customer = $('#customer_dd').val();
    $.ajax({
        url: "/admin/customer/transactions", 
        type: "get",
        dataType: "HTMl",
        data: {
            customer:customer,_token: '{!! csrf_token() !!}',
        },
       success: function(response){
            $("#table_transaction").html(response);
        }	
    })
}

$(document).on('click', '#btn_beneficiaries', function(){
    var customer = $('#customer_dd').val();
    
    if(customer == null){
      $('#customer_dd').addClass('is-invalid');
      $('#error-customer_dd').text('Please select a customer');
    }else{
        $('#customer_dd').removeClass('is-invalid');
        $('#btn_customer_detail').removeClass('btn-primary');
        $('#btn_beneficiaries').addClass('btn-primary');
        $('#btn_transactions').removeClass('btn-primary');
        $('#customer_detail').hide();
        $('#beneficiaries').show();
        $('#transactions').hide();
        listbeneficiaries();
    }
});

$(document).on('click', '#btn_transactions', function(){
    var customer = $('#customer_dd').val();
    
    if(customer == null){
      $('#customer_dd').addClass('is-invalid');
      $('#error-customer_dd').text('Please select a customer');
    }else{
        $('#customer_dd').removeClass('is-invalid');
        $('#btn_customer_detail').removeClass('btn-primary');
        $('#btn_beneficiaries').removeClass('btn-primary');
        $('#btn_transactions').addClass('btn-primary');
        $('#customer_detail').hide();
        $('#beneficiaries').hide();
        $('#transactions').show();
        listTransactions();
    }
    

});

$('select[name="customer_dd"]').on("change", function(event){
    var customer = $(this).val();
    $.ajax({
        url: "/admin/customer/customer_detail", 
        type: "get",
        dataType:"json",
        data: {
            customer:customer,_token: '{!! csrf_token() !!}',
        },
        beforeSend: function() {
            $('#customer_dd').addClass('is-invalid');
            $('#error-customer_dd').text('LOADING...');
        },
        success: function(data){
            $('#customer_dd').removeClass('is-invalid');
            $('#user_id').val(customer);
            $("#sfirst_name").val(data.first_name);
            $("#smiddle_name").val(data.middle_name);
            $("#slast_name").val(data.last_name);
            $("#saddress").val(data.address);
            $("#smobile_no").val(data.mobile_number);
            $("#sgender").val(data.gender);
            $("#snationality").val(data.nationality);
            listbeneficiaries();
            listTransactions();
        }	
    });
      
});

</script>
@endsection