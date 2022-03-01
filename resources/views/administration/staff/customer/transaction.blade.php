<div class="table-responsive">
    <table class="table align-items-center table-flush datatable-country display text-uppercase" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>
                    Customer/User ID
                </th>
                <th>
                    Reciever's Name
                </th>
                <th>
                    Payout Location
                </th>
                <th>
                    Date Time
                </th>
                <th>
                    Transfer Amount
                </th>
                <th>
                    Receive Amount
                </th>
                <th>
                    Status
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $transaction)
                <tr>
                    <td>
                        {{$transaction->user_id ?? ''}}
                    </td>
                    <td>
                        {{$transaction->beneficiary->beneficiary_firstname ?? ''}} {{$transaction->beneficiary->beneficiary_lastname ?? ''}}
                    </td>
                    <td>
                        {{$transaction->beneficiary->bank->name ?? ''}} <br> ({{$transaction->beneficiary->bank->address ?? ''}})
                    </td>
                    <td>
                        {{ $transaction->created_at->format('M j , Y h:i A') }}
                    </td>
                    <td>
                        {{ number_format($transaction->send_amount , 0, '.', ',')}} JPY
                    </td>
                    <td>
                        {{ number_format($transaction->receive_amount , 0, '.', ',')}} {{$transaction->country->code ?? ''}}
                    </td>
                    <td>
                        @if($transaction->isPaid == false)
                                UNPAID
                        @elseif($transaction->isPaid == true)
                                PAID
                        @endif
                    </td>
                    
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>
                    TOTAL:
                </th>
                <th>
                   
                </th>
                <th>
                    
                </th>
                <th>
                   
                </th>
                <th>
                    {{ number_format($transactions->sum('send_amount') , 0, '.', ',')}} JPY
                </th>
                <th>
                    {{ number_format($transactions->sum('receive_amount') , 0, '.', ',')}}
                </th>
                <th>
                   
                </th>
            </tr>
        </tfoot>
    </table>
</div>