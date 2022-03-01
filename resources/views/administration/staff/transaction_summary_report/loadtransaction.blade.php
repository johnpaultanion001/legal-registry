<div class="card">
        <div class="card-header p-1">
                <h5>
                    Total Transaction : <span class="text-primary">{{$transactions->count()}}</span>
                </h5>
            
                <h6 class="text-uppercase">Filter By: <span id="title_filter">{{$title_filter}}</span> </h6>
                <div class="row">
                    <div class="col-md-2 mb-1">
                        <select class="select2 form-control dd_filter" filter="status">
                            <option value="" >Status</option>
                            <option value="0">Sending</option>
                            <option value="1">Ready For Pickup</option>
                            <option value="2">Claimed</option>
                        </select>
                    </div>
                    <div class="col-md-2 mb-1">
                        <select class="select2 form-control dd_filter" filter="payment">
                            <option value="">Payment</option>
                            <option value="1">Paid</option>
                            <option value="0">Unpaid</option>
                        </select>
                    </div>
                    <div class="col-md-2 mb-1">
                        <button data-toggle="modal" data-target="#modalfilter" class="text-uppercase btn btn-sm btn-primary mt-2">Transaction Date</button>
                    </div>
                </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table align-items-center table-flush datatable-transaction display" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>
                                ID
                            </th>
                            <th>
                                Reference #
                            </th>
                            <th>
                                DATE TIME
                            </th>
                            <th>
                                Sender's Name
                            </th>
                            <th>
                                RECIEVER'S NAME
                            </th>
                            <th>
                                TRANSFER AMOUNT
                            </th>
                            <th>
                                Receive Amount
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
                        @foreach($transactions as $transaction)
                            <tr data-entry-id="{{ $transaction->id }}">
                                <td>
                                    {{ $transaction->id ?? '' }}
                                </td>
                                <td>
                                    {{ $transaction->reference_number ?? '' }}
                                </td>
                                <td>
                                    {{ $transaction->created_at->format('M j , Y h:i A') }}
                                </td>
                                <td>
                                    {{ $transaction->user->firstname ?? '' }} {{ $transaction->user->lastname ?? '' }}
                                </td>
                                <td>
                                    {{ $transaction->beneficiary->beneficiary_firstname ?? '' }} {{ $transaction->beneficiary->beneficiary_lastname ?? '' }}
                                </td>
                                <td>
                                    {{  number_format($transaction->send_amount , 0, ',', ',') }} JPY
                                </td>
                                <td>
                                    {{  number_format($transaction->receive_amount , 0, ',', ',') }} {{$transaction->country->code ?? ''}}
                                </td>
                                <td>
                                    @if($transaction->status == 0)
                                        <button status="{{$transaction->id}}" class="transaction_status btn btn-sm btn-success">SENDING</button>
                                    @elseif($transaction->status == 1)
                                        <button status="{{$transaction->id}}" class="transaction_status btn btn-sm btn-warning">READY FOR PICKUP</button>
                                    @elseif($transaction->status == 2)
                                        <button status="{{$transaction->id}}" class="transaction_status btn btn-sm btn-primary">CLAIMED</button>
                                    @endif
                                </td>
                                <td>
                                    @if($transaction->isPaid == false)
                                        <button payment="{{$transaction->id}}" class="transaction_payment btn btn-danger btn-sm">UNPAID</button>
                                    @elseif($transaction->isPaid == true)
                                        <button payment="{{$transaction->id}}" class="transaction_payment btn btn-success btn-sm">PAID</button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
</div>

<script>
$(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
 
  $.extend(true, $.fn.dataTable.defaults, {
    pageLength: 100,
  });

  $('.datatable-transaction:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
    $('.select2').select2();
    
});
</script>
