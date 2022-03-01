@extends('layouts.admin1')
@section('content')
<div class="col-lg-12">
    <h4 id="title_report">
        Transaction Report
    </h4>
    <div id="load_transactions">

    </div>
</div>

<div class="modal fade" id="modalfilter" tabindex="-1" role="dialog" data-backdrop="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content modal ">
      <!-- Modal Header -->
      <div class="modal-header ">
        <p class="modal-title  text-uppercase font-weight-bold">Filter Date</p>
        <button type="button" class="close " data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
               <div class="form-group">
                    <label class="control-label" >From: </label>
                    <input type="date" name="fbd_from_date" id="fbd_from_date"  class="form-control" />
                </div>
                <div class="form-group">
                    <label class="control-label" >To: </label>
                    <input type="date"  name="fbd_to_date" id="fbd_to_date"  class="form-control" />
                </div>
        </div>
        <div class="col text-right">
          <button filter="fbd"  type="button" class="btn btn-default filter">Submit</button>
        </div>
            
      </div>
    </div>
  </div>
</div>



@endsection
@section('scripts')
<script>
$(function () {
    return load();
});

function load(){
    $.ajax({
        url: "/admin/transaction_summary_report/load", 
        type: "get",
        dataType: "HTMl",
        beforeSend: function() {
            $('#title_report').text('LOADING...');
        },
        success: function(response){
            $('#title_report').text('Transaction Report');
            $("#load_transactions").html(response);
        }
        	
    })
}

 //Filter
 $(document).on('click', '.filter', function(){
    var filter = $(this).attr('filter');
    var from = $('#fbd_from_date').val();
    var to = $('#fbd_to_date').val();

    $.ajax({
        url:  "/admin/transaction_summary_report/filter", 
        type: "get",
        data: {filter:filter,from:from,to:to, _token: '{!! csrf_token() !!}'},
        dataType: "HTMl",
        beforeSend: function() {
            $('#title_report').text('LOADING...');
        },
        success: function(response){
            $('#title_report').text('Transaction Report');
            $("#load_transactions").html(response);
        }	
    })
});

$(document).on('change', '.dd_filter', function(){
    var value = $(this).val();
    var filter = $(this).attr('filter');
    $.ajax({
        url: "/admin/transaction_summary_report/filter", 
        type: "get",
        data: {filter:filter,value:value, _token: '{!! csrf_token() !!}'},
        dataType: "HTMl",
        beforeSend: function() {
            $('#title_report').text('LOADING...');
        },
        success: function(response){
            $('#title_report').text('Transaction Report');
            $("#load_transactions").html(response);
        }	
    })
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
                return load();
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
                return load();
            }
            
        }
    });
});

</script>
@endsection