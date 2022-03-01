@extends('layouts.admin1')
@section('content')
    <div class="container">
        <div class="row">
        
            <div class="col-lg-12">
                <div class="card">
                        <div class="card-header p-1 mt-2 text-uppercase bg-secondary">
                            <h5 class="text-white font-weight-bold">
                                Find Transaction
                            </h5>
                        </div>
                        <div class="card-body">
                            <form method="post" id="findTransactionForm" class="form-horizontal">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6 mx-auto">
                                        <div class="form-group">
                                            <label class="control-label text-uppercase" >Transaction ID <span class="text-danger">*</span></label>
                                            <input type="text" name="find_transaction" id="find_transaction" class="form-control" autofocus>
                                            <span class="invalid-feedback" role="alert">
                                                <strong id="error-find_transaction"></strong>
                                            </span>
                                        </div>
                                        <button type="submit" id="btn_find_transaction" class="btn btn-primary text-uppercase">Find Transaction</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                        <div class="card-header p-1 text-uppercase bg-secondary">
                            <h5 class="text-white font-weight-bold" id="lbl_transaction_id">
                               Transaction ID: 
                            </h5>
                        </div>
                        <div class="card-body">
                           <table class="table table-bordered table-striped">
                                <tbody>
                                        <h6>
                                            Transaction Details
                                        </h6>
                                        <tr>
                                            <th scope="row">Payout Partner:</th>
                                            <td id="lbl_payout_partner"></td>
                                            <th scope="row">Status:</th>
                                            <td id="lbl_status"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Transaction Type:</th>
                                            <td id="lbl_transaction_type"></td>
                                            <th scope="row">Date Time:</th>
                                            <td id="lbl_date_time"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Approved By:</th>
                                            <td id="lbl_approved_by"></td>
                                            <th scope="row">Collected Amount:</th>
                                            <td id="lbl_collected_amount"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Service Charge:</th>
                                            <td id="lbl_service_charge"></td>
                                            <th scope="row">Transfer Amount:</th>
                                            <td id="lbl_transfer_amount"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Exchange Rate:</th>
                                            <td id="lbl_exchange_rate"></td>
                                            <th scope="row">Receive Amount:</th>
                                            <td id="lbl_receive_amount"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Deposit Type</th>
                                            <td id="lbl_deposit_type"></td>
                                            <th scope="row">Reference Number</th>
                                            <td id="lbl_reference_number"></td>
                                        </tr>
                                       
                                        
                                </tbody>
                            </table>
                            <table class="table table-bordered table-striped">
                                <tbody>
                                        <h6>
                                            Sender Information
                                        </h6>
                                        <tr>
                                            <th scope="row">Sender's Name:</th>
                                            <td id="lbl_sender_name"></td>
                                            <th scope="row">Customer/User ID:</th>
                                            <td id="lbl_user_id"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Address:</th>
                                            <td id="lbl_address"></td>
                                            <th scope="row">Mobile No.:</th>
                                            <td id="lbl_mobile_number"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Gender:</th>
                                            <td id="lbl_gender"></td>
                                            <th scope="row">Nationality:</th>
                                            <td id="lbl_nationality"></td>
                                        </tr>
                                        
                                </tbody>
                            </table>
                            <table class="table table-bordered table-striped">
                                <tbody>
                                        <h6>
                                            Receiver Information
                                        </h6>
                                        <tr>
                                            <th scope="row">Receiver's Name:</th>
                                            <td id="lbl_reciver_name"></td>
                                            <th scope="row">Address:</th>
                                            <td id="lbl_raddress"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Mobile No.:</th>
                                            <td id="lbl_rmobile_number"></td>
                                            <th scope="row">Paymet Mode:</th>
                                            <td id="lbl_payment_mode"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Country:</th>
                                            <td id="lbl_country"></td>
                                            <th scope="row">Payout Partner/Bank:</th>
                                            <td id="lbl_bank"></td>
                                        </tr>
                                        
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
           
        </div>
    </div>


@endsection
@section('scripts')
<script>
$('#findTransactionForm').on('submit', function(event){
    event.preventDefault();
    var transaction_id = $('#find_transaction').val();
    if(transaction_id == ''){
        $('#find_transaction').addClass('is-invalid');
        $('#error-find_transaction').text('Invalid Transaction ID');
    }else{
        $.ajax({
            url: "/admin/find_transaction/transaction", 
            type: "get",
            dataType:"json",
            data: {
                transaction_id:transaction_id,_token: '{!! csrf_token() !!}',
            },
            beforeSend: function() {
                $('#find_transaction').addClass('is-invalid');
                $('#error-find_transaction').text('LOADING...');
                $("#btn_find_transaction").attr("disabled", true);
                $("#btn_find_transaction").text("LOADING...");
            },
            success: function(data){
                $('#find_transaction').removeClass('is-invalid');
                $("#btn_find_transaction").attr("disabled", false);
                $("#btn_find_transaction").text("Find Transaction");

                if(data.invalid){
                    $('#find_transaction').addClass('is-invalid');
                    $('#error-find_transaction').text(data.invalid);
                }
                $('#lbl_transaction_id').text('Transaction ID: ' + data.transaction_id);
                $('#lbl_payout_partner').text(data.payout_partner);
                $('#lbl_status').text(data.status);
                $('#lbl_transaction_type').text(data.transaction_type);
                $('#lbl_date_time').text(data.date_time);
                $('#lbl_approved_by').text(data.approved_by);
                $('#lbl_collected_amount').text(data.collected_amount);
                $('#lbl_service_charge').text(data.service_charge);
                $('#lbl_transfer_amount').text(data.transfer_amount);
                $('#lbl_exchange_rate').text(data.exchange_rate);
                $('#lbl_receive_amount').text(data.receive_amount);
                $('#lbl_deposit_type').text(data.deposit_type);
                $('#lbl_reference_number').text(data.reference_number);
                //sender
                $('#lbl_sender_name').text(data.first_name +' '+ data.last_name)
                $('#lbl_user_id').text(data.user_id);
                $('#lbl_address').text(data.address);
                $('#lbl_mobile_number').text(data.mobile_number);
                $('#lbl_gender').text(data.gender);
                $('#lbl_nationality').text(data.nationality);

                //reciver
                $('#lbl_reciver_name').text(data.rfirst_name +' '+ data.rlast_name);
                $('#lbl_raddress').text(data.raddress);
                $('#lbl_rmobile_number').text(data.rmobile_number);
                $('#lbl_payment_mode').text(data.rpayment_mode);
                $('#lbl_bank').text(data.rbank);
                $('#lbl_country').text(data.country);
            }	
        });
    }

});

</script>
@endsection