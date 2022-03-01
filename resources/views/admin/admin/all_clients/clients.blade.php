@extends('layouts.admin1')
@section('content')
    
<div class="card">
    
   <div class="col-xl-12 mx-auto">
        <div class="card-header mt-3">
            <h3>
                Manage Clients
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
                                <th width="100">Created At</th>
                                
                            </tr>
                            </thead>
                            <tbody class="text-uppercase font-weight-bold">
                                @foreach($clients as $client)
                                <tr data-entry-id="{{ $client->id ?? '' }}">
                                    <td>
                                        <button type="button" name="edit" edit="{{  $client->id ?? '' }}" class="text-uppercase edit btn btn-info btn-sm"><i class="fas fa-edit"></i></button>
                                        <button type="button" name="remove" remove="{{  $client->id ?? '' }}" class="text-uppercase remove btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                       
                                    </td>
                                    <td>
                                        {{  $client->name ?? '' }}
                                    </td>
                                    <td>
                                        {{  $client->address ?? '' }}
                                    </td>
                                    <td>
                                        {{  $client->contact_number ?? '' }}
                                    </td>
                                    <td>
                                        {{ $client->created_at->format('M j , Y h:i A') }}
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



</script>
@endsection