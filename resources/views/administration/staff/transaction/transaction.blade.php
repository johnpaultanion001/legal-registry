@extends('layouts.admin1')
@section('content')
    <div class="container">
        <div class="row">
        
            <div class="col-lg-12">
                <div class="card">
                        <div class="card-header p-1 mt-2  text-uppercase bg-secondary text-right">
                            <button class = "btn btn-sm btn-primary text-uppercase" id="btn_find_transaction">
                                Find Transaction
                            </button>
                            <button class = "btn btn-sm btn-primary text-uppercase" id="btn_transaction_summary_report">
                                Transaction Summary Report
                            </button>
                        </div>
                        <div class="card-header p-1 text-uppercase bg-secondary">
                            <h5 class="text-white font-weight-bold">
                                Select Destination Country to Send Transaction
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label text-uppercase" >Country <span class="text-danger">*</span></label>
                                        <select name="country_dd" id="country_dd" class="form-control select2" style="width: 100%">
                                            @foreach ($countries as $country)
                                                <option value="{{$country->id}}"> {{$country->country}}</option>
                                            @endforeach
                                        </select>
                                        <span class="invalid-feedback" role="alert">
                                            <strong id="error-country_dd"></strong>
                                        </span>
                                        
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label text-uppercase" >Method <span class="text-danger">*</span></label>
                                        <select name="method" id="method" class="form-control select2" style="width: 100%">
                                            <option value="JAPAN REMIT FINANCE CO.LTD.">JAPAN REMIT FINANCE CO.LTD.</option>
                                        </select>
                                        <span class="invalid-feedback" role="alert">
                                            <strong id="error-method"></strong>
                                        </span>
                                        
                                    </div>
                                </div>
                                <div class="col-sm-12 text-right">
                                    <button id="continue" class="btn btn-primary text-uppercase">Continue</button>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                        <div class="card-header p-1 text-uppercase bg-secondary">
                            <h5 class="text-white font-weight-bold">
                                REMITTER DETAIL
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label text-uppercase" >CHOOSE SENDER <span class="text-danger">*</span></label>
                                        <select name="sender_dd" id="sender_dd" class="form-control select2" style="width: 100%">
                                            <option value="" disabled selected>SELECT SENDER</option>
                                            @foreach ($senders as $sender)
                                                <option value="{{$sender->user->id}}">{{$sender->user->firstname}} {{$sender->user->lastname}}</option>
                                            @endforeach
                                        </select>
                                        <span class="invalid-feedback" role="alert">
                                            <strong id="error-sender_dd"></strong>
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
            </div>
            <div class="col-lg-12">
                <div class="card">
                        <div class="card-header p-1 text-uppercase bg-secondary">
                            <h5 class="text-white font-weight-bold">
                                BENEFICIARY DETAIL
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label text-uppercase" >CHOOSE BENEFICIARY<span class="text-danger">*</span></label>
                                        <select name="beneficiary_dd" id="beneficiary_dd" class="form-control select2" style="width: 100%">
                                            
                                            
                                        </select>
                                        <span class="invalid-feedback" role="alert">
                                            <strong id="error-beneficiary_dd"></strong>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-3 mt-3">
                                    <button id="edit_beneficiary" class="btn btn-info text-uppercase"><i class="fas fa-pen"></i></button>
                                    <button id="new_beneficiary" class="btn btn-primary text-uppercase"><i class="fas fa-plus"></i></button>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label text-uppercase" >RECEIVER'S NAME:</label>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <small>FIRST NAME</small>
                                                <input type="text" name="rfirst_name" id="rfirst_name"  class="classic-input2 form-control font-weight-bold map-input" readonly>
                                            </div>
                                            <div class="col-sm-4">
                                                <small>MIDDLE NAME</small>
                                                <input type="text" name="rmiddle_name" id="rmiddle_name"  class="classic-input2 form-control font-weight-bold map-input" readonly>
                                            </div>
                                            <div class="col-sm-4">
                                                <small>LAST NAME</small>
                                                <input type="text" name="rlast_name" id="rlast_name"  class="classic-input2 form-control font-weight-bold map-input" readonly>
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
                                        <input type="text" name="raddress" id="raddress"  class="classic-input2 form-control font-weight-bold map-input" readonly>
                                        <span class="invalid-feedback" role="alert">
                                            <strong id="error-raddress"></strong>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label text-uppercase" >MOBILE NO.:</label>
                                        <input type="text" name="rmobile_no" id="rmobile_no"  class="classic-input2 form-control font-weight-bold map-input" readonly>
                                        <span class="invalid-feedback" role="alert">
                                            <strong id="error-rmobile_no"></strong>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label text-uppercase" >PAYMENT MODE:</label>
                                        <input type="text" name="rpayment_mode" id="rpayment_mode"  class="classic-input2 form-control font-weight-bold map-input" readonly>
                                        <span class="invalid-feedback" role="alert">
                                            <strong id="error-rpayment_mode"></strong>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label text-uppercase" >PAYOUT PARTNER/BANK:</label>
                                        <input type="text" name="rbank" id="rbank"  class="classic-input2 form-control font-weight-bold map-input" readonly>
                                        <span class="invalid-feedback" role="alert">
                                            <strong id="error-rbank"></strong>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <div class="col-lg-12 text-right">
                    <button type="button" class="btn btn-danger text-uppercase">CANCEL</button>
                    <button type="button" class="btn btn-primary text-uppercase"  name="transaction_button" id="transaction_button">SUBMIT</button>
                   
            </div>
        </div>
    </div>

    <form method="post" id="transactionForm" class="form-horizontal">
        @csrf
        <div class="modal" id="transactionModal" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-lg modal-dialog-centered ">
                <div class="modal-content">
            
                    <!-- Modal Header -->
                    <div class="modal-header ">
                        <p class="modal-title-transaction  text-uppercase font-weight-bold">Modal Heading</p>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                        
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div id="transaction_form" class="row">
                            
                            <div class="col-sm-12">
                                <h6 class="text-dark font-weight-bold">How much money you want to send?</h6>
                                <hr class="my-2 bg-muted">
                            </div>
                            <br>
                            <div class="col-sm-12"> 
                                <div class="col-sm-8 mx-auto">
                                    <div class="form-group">
                                        <label class="control-label text-uppercase" >Send Amount<span class="text-danger">*</span> </label>
                                        <div class="input-group">
                                            <input type="number" name="send_amount" id="send_amount" step="any" placeholder="0.00" class="form-control">
                                            <div class="input-group-append">
                                                <span class="input-group-text font-weight-bold">JPY</span>
                                            </div>
                                            
                                        </div>
                                        
                                        <div id="error_send_amount" class="error_transaction text-danger"></div>
                                    </div>
                                </div>
                                
                            </div>    
                            <div class="col-sm-12"> 
                                <div class="col-sm-8 mx-auto">
                                    <div class="form-group">
                                        <label class="control-label text-uppercase" >Receive Amount</label>
                                        <div class="input-group">
                                            <input type="text" name="receive_amount" id="receive_amount"  placeholder="0.00" class="form-control" readonly>
                                        </div>
                                        <span class="invalid-feedback" role="alert">
                                            <strong id="error-receive_amount"></strong>
                                        </span>
                                    </div>
                                </div>
                            </div>  
                            <div class="col-sm-12"> 
                                <div class="col-sm-8 mx-auto">
                                    <div class="form-group">
                                        <label class="control-label text-uppercase" >Payment Mode</label>
                                        <input type="text" name="transaction_payment_mode" id="transaction_payment_mode" class="form-control" readonly>
                                        <span class="invalid-feedback" role="alert">
                                            <strong id="error-transaction_payment_mode"></strong>
                                        </span>
                                       
                                    </div>
                                </div>
                            </div>  
                            <div class="col-sm-12">
                                <h6 class="text-dark font-weight-bold">Other Information</h6>
                                <hr class="my-2 bg-muted">
                            </div>
                            <br>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label text-uppercase" >Purpose of Remit</label>
                                    <input type="text" name="transaction_purpose_of_remit" id="transaction_purpose_of_remit" class="form-control" readonly>
                                    <span class="invalid-feedback" role="alert">
                                        <strong id="error-transaction_purpose_of_remit"></strong>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label text-uppercase" >Source of Fund<span class="text-danger">*</span> </label>
                                    <select name="transaction_source_of_fund" id="transaction_source_of_fund" class="form-control select2" style="width: 100%">
                                        <option value="" disabled selected>Please Select</option>
                                        <option value="Business Income">Business Income</option>
                                        <option value="Capital Gain">Capital Gain</option>
                                        <option value="Capital Gain">Capital Gain</option>
                                        <option value="Family Income">Family Income</option>
                                        <option value="Gift">Gift</option>
                                        <option value="Loan">Loan</option>
                                        <option value="Savings">Savings</option>
                                        <option value="Others">Others</option>
                                    </select>
                                    
                                    <div id="error_transaction_source_of_fund" class="error_transaction text-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="card">
                                    
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item text-center font-weight-bold ">Transfer Summary</li>
                                        <li class="list-group-item text-center font-weight-bold ">1 JPY = <span id="exchange_transaction"></span> </li>
                                        <li class="list-group-item">
                                            <div class="row">
                                                <div class="col-6">
                                                        YOU SEND 
                                                    <div class="form-group">
                                                        <h5 class="text-primary" id="you_send">0.00</h5>
                                                    </div>
                                                </div>
                                                <div class="col-6 text-center mt-4">
                                                    JPY
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="row">
                                                <div class="col-6">
                                                        THEY GET
                                                    <div class="form-group">
                                                        <h5 class="text-primary" id="they_get">0.00</h5>
                                                    </div>
                                                </div>
                                                <div class="col-6 text-center mt-4 country_code">
                                                    
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <span>FEE</span> <br>
                                            <div class="row">
                                                <div class="col-6">
                                                    <span>Service Change</span>
                                                </div>
                                                <div class="col-6">
                                                            <div class="row">
                                                                <div class="col-7">
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control" readonly id="service_charge" value="0.00">
                                                                    </div>
                                                                </div>
                                                                <div class="col-5">
                                                                    JPY
                                                                </div>
                                                            </div>
                                                    </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                        <span>Total</span>
                                                </div>
                                                <div class="col-6">
                                                            <div class="row">
                                                                <div class="col-7">
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control" readonly id="total" value="0.00">
                                                                    </div>
                                                                </div>
                                                                <div class="col-5">
                                                                    JPY
                                                                </div>
                                                            </div>
                                                    </div>
                                            </div>
                                                
                                            

                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <input type="text" name="transaction_action" id="transaction_action" value="compute" />
                        <input type="text" name="transaction_country_id" id="transaction_country_id" />
                        <input type="text" name="transaction_sender_id" id="transaction_sender_id" />
                        <input type="text" name="transaction_beneficiary_id" id="transaction_beneficiary_id" />
                    </div>
            
                    <!-- Modal footer -->
                    <div class="modal-footer bg-white">
                        <button type="button" data-dismiss="modal" class="btn btn-white text-uppercase">Close</button>
                        <input type="submit" name="transaction_action_button" id="transaction_action_button" class="text-uppercase btn btn-primary" value="Compute" />
                    </div>
            
                </div>
            </div>
        </div>
    </form>
        
    <form method="post" id="beneficiaryForm" class="form-horizontal ">
        @csrf
        <div class="modal" id="beneficiaryModal" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-lg modal-dialog-centered ">
                <div class="modal-content">
            
                    <!-- Modal Header -->
                    <div class="modal-header ">
                        <p class="modal-title-beneficiary  text-uppercase font-weight-bold">Modal Heading</p>
                        <button type="button" class="close " data-dismiss="modal">&times;</button>
                    </div>

                        
                    <!-- Modal body -->
                    <div class="modal-body">
                    <div id="modalbody" class="modalbody row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label text-uppercase" >Receipt Country <span class="text-danger">*</span></label>
                                    <select name="receipt_country" id="receipt_country" class="form-control select2 form-control" style="width: 100%">
                                        <option value="" disabled selected>Please Select</option>
                                        @foreach ($countries as $country)
                                            <option value="{{$country->id}}"> {{$country->country}}</option>
                                        @endforeach
                                    </select>
                                    <span class="invalid-feedback" role="alert">
                                        <strong id="error-receipt_country"></strong>
                                    </span>
                                
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label text-uppercase" >Payment Mode <span class="text-danger">*</span> </label>
                                    <select name="payment_mode" id="payment_mode" class="form-control select2" style="width: 100%">
                                        <option value="" disabled selected>Please Select</option>
                                        <option value="Account Deposit">Account Deposit</option>
                                        <option value="Cash Pick Up">Cash Pick Up</option>
                                    </select>
                                    <span class="invalid-feedback" role="alert">
                                        <strong id="error-payment_mode"></strong>
                                    </span>
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="col-sm-12">
                                <h6 class="text-dark font-weight-bold">Payout Location Details</h6>
                                <hr class="my-2 bg-muted">
                            </div>
                            <br>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label text-uppercase" >Bank Name<span class="text-danger">*</span> </label>
                                    <select name="bank_name" id="bank_name" class="form-control select2" style="width: 100%">
                                        <option value="" disabled selected>Please Select</option>
                                        @foreach ($banks as $bank)
                                            <option value="{{$bank->id}}"> {{$bank->name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="invalid-feedback" role="alert">
                                        <strong id="error-bank_name"></strong>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label text-uppercase" >Account Number:<span class="text-danger">*</span> </label>
                                    <input type="number" name="account_number" id="account_number" class="form-control" />
                                    <span class="invalid-feedback" role="alert">
                                        <strong id="error-account_number"></strong>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <h6 class="text-dark font-weight-bold">Beneficiary Details</h6>
                                <hr class="my-2 bg-muted">
                            </div>
                            <br>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label text-uppercase" >Beneficiary First Name<span class="text-danger">*</span> </label>
                                    <input type="text" name="beneficiary_firstname" id="beneficiary_firstname" class="form-control" />
                                    <span class="invalid-feedback" role="alert">
                                        <strong id="error-beneficiary_firstname"></strong>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label text-uppercase" >Beneficiary Middle Name</label>
                                    <input type="text" name="beneficiary_middlename" id="beneficiary_middlename" class="form-control" />
                                    <span class="invalid-feedback" role="alert">
                                        <strong id="error-beneficiary_middlename"></strong>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label text-uppercase" >Beneficiary Last Name<span class="text-danger">*</span></label>
                                    <input type="text" name="beneficiary_lastname" id="beneficiary_lastname" class="form-control" />
                                    <span class="invalid-feedback" role="alert">
                                        <strong id="error-beneficiary_lastname"></strong>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label text-uppercase" >Mobile Number<span class="text-danger">*</span></label>
                                    <input type="number" name="beneficiary_mobile_number" id="beneficiary_mobile_number" class="form-control" />
                                    <span class="invalid-feedback" role="alert">
                                        <strong id="error-beneficiary_mobile_number"></strong>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <h6 class="text-dark font-weight-bold">Address Details</h6>
                                <hr class="my-2 bg-muted">
                            </div>
                            <br>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label text-uppercase" >Address<span class="text-danger">*</span></label>
                                    <input type="text" name="beneficiary_address" id="beneficiary_address" class="form-control" />
                                    <span class="invalid-feedback" role="alert">
                                        <strong id="error-beneficiary_address"></strong>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label text-uppercase" >Purpose of Remit<span class="text-danger">*</span> </label>
                                    <select name="purpose_of_remit" id="purpose_of_remit" class="form-control select2" style="width: 100%">
                                        <option value="" disabled selected>Please Select</option>
                                        <option value="Business">Business</option>
                                        <option value="Donation">Donation</option>
                                        <option value="Family Maintenance">Family Maintenance</option>
                                        <option value="Gift">Gift</option>
                                        <option value="Investment">Investment</option>
                                        <option value="Lending Money">Lending Money</option>
                                        <option value="Living Expenses">Living Expenses</option>
                                        <option value="Medical Expenses">Medical Expenses</option>
                                        <option value="Rental Payment">Rental Payment</option>
                                        <option value="Payment for Goods and Services">Payment for Goods and Services</option>
                                        <option value="Salary">Salary</option>
                                        <option value="Savings">Savings</option>
                                        <option value="Others">Others</option>

                                    
                                    </select>
                                    <span class="invalid-feedback" role="alert">
                                        <strong id="error-purpose_of_remit"></strong>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label text-uppercase" >Relation with Beneficiary<span class="text-danger">*</span> </label>
                                    <select name="relation_with_beneficiary" id="relation_with_beneficiary" class="form-control select2" style="width: 100%">
                                        <option value="" disabled selected>Please Select</option>
                                        <option value="Aunt">Aunt</option>
                                        <option value="Brother">Brother</option>
                                        <option value="Brother in Law">Brother in Law</option>
                                        <option value="Cousin">Cousin</option>
                                        <option value="Daughter">Daughter</option>
                                        <option value="Daughter in law">Daughter in law</option>
                                        <option value="Father">Father</option>
                                        <option value="Father in Law">Father in Law</option>
                                        <option value="Fiancée">Fiancée</option>
                                        <option value="Friend">Friend</option>
                                        <option value="Husband">Husband</option>
                                        <option value="Mother">Mother</option>
                                        <option value="Mother in Law">Mother in Law</option>
                                        <option value="Nephew">Nephew</option>
                                        <option value="Niece">Niece</option>
                                        <option value="Sister">Sister</option>
                                        <option value="Sister in Law">Sister in Law</option>
                                        <option value="Spouse">Spouse</option>
                                        <option value="Staff">Staff</option>
                                        <option value="Uncle">Uncle</option>
                                        <option value="Wife">Wife</option>
                                        <option value="Others">Others</option>
                                    </select>
                                    <span class="invalid-feedback" role="alert">
                                        <strong id="error-relation_with_beneficiary"></strong>
                                    </span>
                                </div>
                            </div>
                            
                        
                            
                            
                        </div>
                        <input type="hidden" name="beneficiary_user_id" id="beneficiary_user_id"/>
                        <input type="hidden" name="beneficiary_action" id="beneficiary_action" value="Add" />
                        <input type="hidden" name="beneficiary_hidden_id" id="beneficiary_hidden_id" />
                    </div>
            
                    <!-- Modal footer -->
                    <div class="modal-footer bg-white">
                        <button type="button" class="btn btn-white text-uppercase" data-dismiss="modal">Close</button>
                        <input type="submit" name="beneficiary_action_button" id="beneficiary_action_button" class="text-uppercase btn btn-primary" value="Save" />
                    </div>
            
                </div>
            </div>
        </div>
    </form>


    <div class="modal" id="transactionDetailModal" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-lg modal-dialog-centered ">
            <div class="modal-content">
        
                <!-- Modal Header -->
                <div class="modal-header ">
                    <p class="text-uppercase font-weight-bold">TRANSACTION DETAIL</p>
                    <button type="button" class="close " data-dismiss="modal">&times;</button>
                </div>

                    
                <!-- Modal body -->
                <div class="modal-body">
                    <div id="transaction_detail" class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label text-uppercase" >Transaction ID:</label>
                            <input type="text" name="transaction_id" id="transaction_id" readonly class="form-control"/>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <table class="table table-bordered table-striped">
                                <tbody>
                                    <tr>
                                        <th scope="row">Payout Partner:</th>
                                        <td id="lbl_payout_partner"></td>
                                        <th scope="row">Status:</th>
                                        <td class="btn btn-success btn-sm text-uppercase" id="lbl_status"></td>
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
                                    <tr>
                                        <th scope="row">Sender Name</th>
                                        <td id="lbl_sender_name"></td>
                                        <th scope="row">Beneficiary Name</th>
                                        <td id="lbl_beneficiary_name"></td>
                                    </tr>    
                                </tbody>
                        </table>
                    </div>
                   
                        
                    </div>

                    
                </div>
        
                <!-- Modal footer -->
                <div class="modal-footer bg-white">
                    <button type="button" id="transaction_cancel" class="btn btn-danger text-uppercase">CANCEL</button>
                    <input type="button" data-dismiss="modal" name="transaction_detail_action_button" id="transaction_detail_action_button" class="text-uppercase btn btn-primary" value="CLOSE" />
                </div>
        
            </div>
        </div>
    </div>
 





@endsection
@section('scripts')
<script>
$(document).ready(function () {
   $('#transaction_action').hide();
   $('#transaction_country_id').hide();
   $('#transaction_sender_id').hide();
   $('#transaction_beneficiary_id').hide();
   $('#edit_beneficiary').hide();
});

function beneficiary_dd(){
    var sender = $('#sender_dd').val();
    $.ajax({
        url: "/admin/transaction/beneficiary_dd", 
        type: "get",
        dataType: "json",
        data: {
            sender:sender,_token: '{!! csrf_token() !!}',
        },
        beforeSend: function() {
            $("#transaction_button").attr("disabled", true);
            $("#transaction_button").attr("value", "Loading..");
        },
        success: function(data){
            $("#transaction_button").attr("disabled", false);
            $("#transaction_button").attr("value", "Submit");

            var beneficiaries = '';
            beneficiaries += '<option value="" disabled selected>SELECT BENEFICIARY</option>';
            $.each(data.beneficiaries, function(key,value){
                beneficiaries += '<option value="'+value.id+'">'+value.beneficiary_firstname +' '+value.beneficiary_lastname+'</option>';
            });
            $('#beneficiary_dd').empty().append(beneficiaries);
        }	
    })
}

$('select[name="sender_dd"]').on("change", function(event){
    var sender = $(this).val();
    $.ajax({
        url: "/admin/transaction/sender", 
        type: "get",
        dataType:"json",
        data: {
            sender:sender,_token: '{!! csrf_token() !!}',
        },
        beforeSend: function() {
            $("#transaction_button").attr("disabled", true);
            $("#transaction_button").attr("value", "Loading..");
        },
        success: function(data){
            $("#transaction_button").attr("disabled", false);
            $("#transaction_button").attr("value", "Submit");
            $("#sfirst_name").val(data.first_name);
            $("#smiddle_name").val(data.middle_name);
            $("#slast_name").val(data.last_name);
            $("#saddress").val(data.address);
            $("#smobile_no").val(data.mobile_number);
            $("#sgender").val(data.gender);
            $("#snationality").val(data.nationality);
            beneficiary_dd();
        }	
    });
      
});

$('select[name="beneficiary_dd"]').on("change", function(event){
    var beneficiary = $(this).val();
    $.ajax({
        url: "/admin/transaction/beneficiary", 
        type: "get",
        dataType:"json",
        data: {
            beneficiary:beneficiary,_token: '{!! csrf_token() !!}',
        },
        beforeSend: function() {
            $("#transaction_button").attr("disabled", true);
            $("#transaction_button").attr("value", "Loading..");
        },
        success: function(data){
            $("#transaction_button").attr("disabled", false);
            $("#transaction_button").attr("value", "Submit");

            $("#rfirst_name").val(data.first_name);
            $("#rmiddle_name").val(data.middle_name);
            $("#rlast_name").val(data.last_name);
            $("#raddress").val(data.address);
            $("#rmobile_no").val(data.mobile_number);
            $("#rpayment_mode").val(data.payment_mode);
            $("#rbank").val(data.bank);
            $('#edit_beneficiary').show();

        }	
    });
      
});

$('#send_amount').on('keyup',function(){
    $('#transaction_action').val('compute');
    $("#transaction_action_button").attr("disabled", false);
    $("#transaction_action_button").attr("value", "Compute");
})

$(document).on('click', '#transaction_button', function(){
    var sender      = $('#sender_dd').val();
    var beneficiary = $('#beneficiary_dd').val();
    var country     = $('#country_dd').val();

    var _token =  $('input[name="_token"]').val();


    if(sender == null){
      $('#sender_dd').addClass('is-invalid');
      $('#error-sender_dd').text('Please select a list of senders');
      window.location.href = '/admin/transaction#sender_dd';


    }else if(beneficiary == null){
        $('#beneficiary_dd').addClass('is-invalid')
        $('#error-beneficiary_dd').text('Please select a list of beneficiaries')
        window.location.href = '/admin/transaction#beneficiary_dd';
    }
    else{
        $('#transactionModal').modal('show');
        $('.modal-title-transaction').text('Transaction Form');
        $('.form-control').removeClass('is-invalid')
        $('#transaction_country_id').val(country)
        $('#transaction_sender_id').val(sender)
        $('#transaction_beneficiary_id').val(beneficiary)
        $('#transaction_action').val('compute');
        $("#transaction_action_button").attr("disabled", false);
        $("#transaction_action_button").attr("value", "Compute");
        
        $.ajax({
            url:"{{ route('admin.transaction_staff.reviewpayment') }}",
            method:"GET",
            dataType: "json",
            data:{beneficiary:beneficiary, country:country, _token:_token},
            beforeSend: function() {
                
            },
            success:function(data){
                $('#transaction_payment_mode').val(data.payment_mode);
                $('#transaction_purpose_of_remit').val(data.purpose_of_remit);
                $('#exchange_transaction').text(data.exchange +' '+ data.exchange_code);
                $('.country_code').text(data.exchange_code);
            }
        });
       
    }
});

function transaction_details(){
    var transaction_id = $('#transaction_id').val();
    $.ajax({
        url: "/admin/transaction/transaction_details", 
        type: "get",
        dataType: "json",
        data: {
            transaction_id:transaction_id,_token: '{!! csrf_token() !!}',
        },
        beforeSend: function() {
            $("#transaction_detail_action_button").attr("disabled", true);
            $("#transaction_detail_action_button").attr("value", "LOADING...");
        },
        success: function(data){
            $("#transaction_detail_action_button").attr("disabled", false);
            $("#transaction_detail_action_button").attr("value", "CLOSE");

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
            $('#lbl_sender_name').text(data.sender_name);
            $('#lbl_beneficiary_name').text(data.beneficiary_name);
        }	
    })
}

$('#transactionForm').on('submit', function(event){
    event.preventDefault();
    $('.form-control').removeClass('is-invalid')
    var action_url = "{{ route('admin.transaction_staff.compute') }}";
    var type       =  "GET";

    if($('#transaction_action').val() == 'submit'){
        action_url = "{{ route('admin.transaction_staff.transaction_store') }}";
        type =  "POST";
    }

    $.ajax({
        url: action_url,
        method:type,
        data:$(this).serialize(),
        dataType:"json",
        beforeSend:function(){
            $("#transaction_action_button").attr("disabled", true);
            $("#transaction_action_button").attr("value", "Loading..");
        },
        success:function(data){
            if($('#transaction_action').val() == 'compute'){
                $("#transaction_action_button").attr("disabled", false);
                $("#transaction_action_button").attr("value", "Compute");
            }else{
                $("#transaction_action_button").attr("disabled", false);
                $("#transaction_action_button").attr("value", "Submit");
            }

            if(data.errors){
                $.each(data.errors, function(key,value){
                    if(key == $('#'+key).attr('id')){
                            
                            $('#error_'+key).html(value)
                        }
                    })
            }
            if(data.submit){
                $('.error_transaction').text('');
                $('#transaction_action').val(data.submit);
                $("#transaction_action_button").attr("disabled", false);
                $("#transaction_action_button").attr("value", "Submit");

                $('#receive_amount').val(data.receive);
                $('#they_get').text(data.receive);
                $('#you_send').text(data.send);
                $('#total').val(data.total);
                $('#service_charge').val(data.charge);
                
            }
            if(data.transaction){
                $('.error_transaction').text('');
                $('#success-alert').addClass('bg-success');
                $('#success-alert').html('<strong>' + data.transaction + '</strong>');
                $("#success-alert").fadeTo(5000, 500).slideUp(500, function(){
                    $("#success-alert").slideUp(500);
                });
                $('.form-control').removeClass('is-invalid');
                $('#transactionForm')[0].reset();
                $('#transactionModal').modal('hide');
                $('#transactionDetailModal').modal('show');
                $('#transaction_id').val(data.transaction_id);
                transaction_details();
            }
        }
    });
});

$(document).on('click', '#btn_find_transaction', function(){
    window.location.href = '/admin/find_transaction';
});

$(document).on('click', '#btn_transaction_summary_report', function(){
    window.location.href = '/admin/transaction_summary_report';
});

//BENEFICIARY
$(document).on('click', '#new_beneficiary', function(){
    var sender      = $('#sender_dd').val();
    if(sender == null){
      $('#sender_dd').addClass('is-invalid');
      $('#error-sender_dd').text('Please select a list of senders');
      window.location.href = '/admin/transaction#sender_dd';
    }else{
        $('#beneficiaryModal').modal('show');
        $('#beneficiaryForm')[0].reset();
        $('.form-control').removeClass('is-invalid')
        $('.modal-title-beneficiary').text('Add New Beneficiary');
        $('#beneficiary_action_button').val('Submit');
        $('#beneficiary_action').val('Add');
        $('#beneficiary_user_id').val(sender);
    }
});
$('#beneficiaryForm').on('submit', function(event){
    event.preventDefault();
    $('.form-control').removeClass('is-invalid')
    var action_url = "{{ route('admin.beneficiaries.store') }}";
    var type = "POST";

    if($('#beneficiary_action').val() == 'Edit'){
        var id = $('#beneficiary_hidden_id').val();
        action_url = "/admin/beneficiaries/" + id;
        type = "PUT";
    }

    $.ajax({
        url: action_url,
        method:type,
        data:$(this).serialize(),
        dataType:"json",
        beforeSend:function(){
            $("#beneficiary_action_button").attr("disabled", true);
            $("#beneficiary_action_button").attr("value", "Loading..");
        },
        success:function(data){
            if($('#beneficiary_action').val() == 'Edit'){
                    $("#beneficiary_action_button").attr("disabled", false);
                    $("#beneficiary_action_button").attr("value", "Update");
            }else{
                    $("#beneficiary_action_button").attr("disabled", false);
                    $("#beneficiary_action_button").attr("value", "Submit");
            }
            if(data.errors){
                $.each(data.errors, function(key,value){
                   if(key == $('#'+key).attr('id')){
                        $('#'+key).addClass('is-invalid')
                        $('#error-'+key).text(value)
                    }
                })
            }
            if(data.success){
                $('#success-alert').addClass('bg-primary');
                $('#success-alert').html('<strong>' + data.success + '</strong>');
                $("#success-alert").fadeTo(5000, 500).slideUp(500, function(){
                    $("#success-alert").slideUp(500);
                });
                $('.form-control').removeClass('is-invalid');
                $('#beneficiaryForm')[0].reset();
                $('#beneficiaryModal').modal('hide');
                beneficiary_dd();
            }
           
        }
    });
});
$(document).on('click', '#edit_beneficiary', function(){
    $('#beneficiaryModal').modal('show');
    $('.modal-title-beneficiary').text('Edit Beneficiary');
    $('#beneficiaryForm')[0].reset();
    $('.form-control').removeClass('is-invalid')
    $('#form_result').html('');
    var id = $('#beneficiary_dd').val();

    $.ajax({
        url :"/admin/beneficiaries/"+id+"/edit",
        dataType:"json",
        beforeSend:function(){
            $("#beneficiary_action_button").attr("disabled", true);
            $("#beneficiary_action_button").attr("value", "Loading..");
        },
        success:function(data){
            if($('#action').val() == 'Edit'){
                $("#beneficiary_action_button").attr("disabled", false);
                $("#beneficiary_action_button").attr("value", "Update");
            }else{
                $("#beneficiary_action_button").attr("disabled", false);
                $("#beneficiary_action_button").attr("value", "Submit");
            }
            $.each(data.result, function(key,value){
                if(key == $('#'+key).attr('id')){
                    $('#'+key).val(value)
                    if(key == 'mobile_number'){
                        $('#beneficiary_mobile_number').val(value)
                    }
                    if(key == 'address'){
                        $('#beneficiary_address').val(value)
                    }
                    if(key == 'receipt_country'){
                        $("#receipt_country").select2("trigger", "select", {
                            data: { id: value }
                        });
                    }
                    if(key == 'payment_mode'){
                        $("#payment_mode").select2("trigger", "select", {
                            data: { id: value }
                        });
                    }
                    if(key == 'bank_name'){
                        $("#bank_name").select2("trigger", "select", {
                            data: { id: value }
                        });
                    }
                    if(key == 'purpose_of_remit'){
                        $("#purpose_of_remit").select2("trigger", "select", {
                            data: { id: value }
                        });
                    }
                    if(key == 'relation_with_beneficiary'){
                        $("#relation_with_beneficiary").select2("trigger", "select", {
                            data: { id: value }
                        });
                    }

                }
            })
            $('#beneficiary_address').val(data.b_address);
            $('#beneficiary_mobile_number').val(data.b_cn);
            $('#beneficiary_hidden_id').val(id);
            $('#beneficiary_action_button').val('Update');
            $('#beneficiary_action').val('Edit');
        }
    })
});

$(document).on('click', '#lbl_status', function(event){
    var payment = $('#transaction_id').val();
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
                transaction_details();
            }
            
        }
    });
});

$(document).on('click', '#transaction_cancel', function(){
  var transaction_id = $('#transaction_id').val();
  $.confirm({
      title: 'Confirmation',
      content: 'You really want cancel this transaction?',
      type: 'red',
      buttons: {
          confirm: {
              text: 'confirm',
              btnClass: 'btn-blue',
              keys: ['enter', 'shift'],
              action: function(){
                  return $.ajax({
                      url:"/admin/transaction/transaction_cancel/"+transaction_id,
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