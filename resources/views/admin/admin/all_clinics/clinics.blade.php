@extends('layouts.admin1')
@section('content')
    
<div class="card">
    
   <div class="col-xl-12 mx-auto">
        <div class="card-header mt-3">
            <h3>
                Manage Clinics
            </h3>
           
        </div>
        <div class="card">
                <div class="card-body" style="border: 1px #111">
                    <div class="table-responsive">
                        <table class="table  table_records display" width="100%">
                            <thead class="text-uppercase thead-white">
                            <tr>
                                <th width="100">Actions</th>
                                <th width="100">Name</th>
                                <th width="100">Address</th>
                                <th width="100">Contact Number</th>
                                <th width="100">BUSINESS PERMIT</th>
                                <th width="100">Latitude</th>
                                <th width="100">Longitude</th>
                                <th width="100">Services</th>
                                <th width="100">Doctors</th>
                                <th width="100">Created At</th>
                                
                            </tr>
                            </thead>
                            <tbody class="text-uppercase font-weight-bold">
                                @foreach($clinics as $clinic)
                                <tr data-entry-id="{{ $clinic->id ?? '' }}">
                                    <td>
                                        <button type="button" name="status" status="{{  $clinic->id ?? '' }}" 
                                          class="text-uppercase status btn btn-sm 
                                          @if($clinic->user->isApproved == 0)
                                            btn-warning
                                          @elseif($clinic->user->isApproved == 1)
                                            btn-success
                                          @endif">
                                          @if($clinic->user->isApproved == 0)
                                            PENDING
                                          @elseif($clinic->user->isApproved == 1)
                                            APPROVED
                                          @endif
                                        </button>
                                    </td>
                                    <td>
                                        {{  $clinic->name ?? '' }}
                                    </td>
                                    <td>
                                        {{  $clinic->address ?? '' }}
                                    </td>
                                    <td>
                                        {{  $clinic->contact_number ?? '' }}
                                    </td>
                                    <td>
                                        <a href="/assets/images/business_permit/{{$clinic->business_permit}}" target="_blank">
                                            <img style="vertical-align: bottom;"  height="100" width="100" src="{{URL::asset('/assets/images/business_permit/'.$clinic->business_permit)}}" />
                                        </a>
                                    </td>
                                    <td>
                                        {{  $clinic->lat ?? '' }}
                                    </td>
                                    <td>
                                        {{  $clinic->lng ?? '' }}
                                    </td>
                                    <td>
                                        @foreach($clinic->services()->get() as $service)
                                            <span class="badge badge-primary">{{$service->name}}</span> <br>
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach($clinic->doctors()->get() as $doctor)
                                            <span class="badge badge-primary">{{$doctor->name}}</span> <br>
                                        @endforeach
                                    </td>
                                    <td>
                                        {{ $clinic->created_at->format('M j , Y h:i A') }}
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

@endsection
@section('scripts')
<script>
$(function () {
    let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons);
    $.extend(true, $.fn.dataTable.defaults, {
        pageLength: 100,
        'columnDefs': [{ 'orderable': false, 'targets': 0 }],
    });

    $('.table_records:not(.ajaxTable)').DataTable({ buttons: dtButtons });
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
    $($.fn.dataTable.tables(true)).DataTable()
        .columns.adjust();
    });
});

$(document).on('click', '.status', function(){
    var clinic_id = $(this).attr('status');

    $.ajax({
        url :"/admin/clinics/approved",
        dataType:"json",
        data: {clinic_id:clinic_id,_token:'{!! csrf_token() !!}'},
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