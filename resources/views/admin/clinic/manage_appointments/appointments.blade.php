@extends('layouts.admin1')
@section('content')
    
<div class="card">
    
   <div class="col-xl-12 mx-auto">
        <div class="card-header mt-3">
            <h3>
                Manage Appointments
            </h3>
           
        </div>
        <div class="card">
                <div class="card-body" style="border: 1px #111">
                    <div class="table-responsive">
                        <table class="table  manage_appointments display" width="100%">
                            <thead class="text-uppercase thead-white">
                            <tr>
                                <th width="100">Status</th>
                                <th width="100">Client Name</th>
                                <th width="100">Note</th>
                                <th width="100">Service</th>
                                <th width="100">Doctor</th>
                                <th width="100">Date/Time</th>
                                <th width="100">Created At</th>
                                
                            </tr>
                            </thead>
                            <tbody class="text-uppercase font-weight-bold">
                                @foreach($appointments as $appointment)
                                <tr data-entry-id="{{ $pricetype->id ?? '' }}">
                                    <td>
                                        <button type="button" name="status" status="{{  $appointment->id ?? '' }}" 
                                          class="text-uppercase status btn btn-sm 
                                          @if($appointment->status == 'PENDING')
                                            btn-warning
                                          @elseif($appointment->status == 'APPROVED')
                                            btn-primary
                                          @elseif($appointment->status == 'COMPLETED')
                                            btn-success
                                          @elseif($appointment->status == 'CANCELED')
                                            btn-danger
                                          @endif">
                                            {{  $appointment->status ?? '' }}
                                        </button>
                                    </td>
                                    <td>
                                        {{  $appointment->user->client->name ?? '' }} <br>
                                        <h6><a href="" data-toggle="collapse" data-target="#client{{$appointment->id}}" class="accordion-toggle">View Client details</a></h6>
                                    </td>
                                    
                                    <td>
                                        {{  $appointment->note ?? '' }}
                                    </td>
                                    <td>
                                        {{  $appointment->service->name ?? '' }}
                                    </td>
                                    <td>
                                        {{  $appointment->doctor->name ?? '' }}
                                    </td>
                                    <td>
                                        {{\Carbon\Carbon::createFromFormat('Y-m-d',$appointment->date)->format('M j , Y')}} /{{\Carbon\Carbon::createFromFormat('H:i',$appointment->time)->format('h:i A')}}
                                    </td>
                                    <td>
                                        {{ $appointment->created_at->format('M j , Y h:i A') }}
                                    </td>
                                  
                               </tr>
                                <tr id="client{{$appointment->id}}" class="accordian-body collapse">
                                 
                                        <td>

                                        </td>
                                        <td> Name: <br> {{  $appointment->user->client->name ?? '' }}</td>
                                        <td>Address: <br> {{  $appointment->user->client->address ?? '' }}</td>
                                        <td>Contact Number: <br> {{  $appointment->user->client->contact_number ?? '' }}</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                  
                                </tr>
                                @endforeach
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
$(function () {
    let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons);
    $.extend(true, $.fn.dataTable.defaults, {
        pageLength: 100,
        'columnDefs': [{ 'orderable': false, 'targets': 0 }],
    });

    $('.manage_appointments:not(.ajaxTable)').DataTable({ buttons: dtButtons });
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
    $($.fn.dataTable.tables(true)).DataTable()
        .columns.adjust();
    });
});

$(document).on('click', '.status', function(){
    var id = $(this).attr('status');

    $.ajax({
        url :"/admin/clinic/change_status/appointments",
        dataType:"json",
        data: {id:id,_token:'{!! csrf_token() !!}'},
        beforeSend:function(){
            $(".status").attr("disabled", true);
        },
        success:function(data){
           if(data.success){
               location.reload();
           }
        }
    })
});

</script>
@endsection