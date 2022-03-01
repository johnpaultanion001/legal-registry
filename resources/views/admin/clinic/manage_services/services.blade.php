@extends('layouts.admin1')
@section('content')
    
<div class="card">
   <div class="col-xl-12 mx-auto">
        <div class="card-header mt-3">
            <h3>
                Manage Services
            </h3>
            <button type="button" id="create_record" class="text-uppercase h6 btn btn-primary">
                <i class="fas fa-plus"></i> Add Record
            </button>
        </div>
        <div class="card">
                <div class="card-body" style="border: 1px #111">
                    <div class="table-responsive">
                        <table class="table  manage_services display" width="100%">
                            <thead class="text-uppercase thead-white">
                            <tr>
                                <th width="100">Action</th>
                                <th width="100">Name</th>
                                <th width="100">Description</th>
                                <th width="100">Created At</th>
                            </tr>
                            </thead>
                            <tbody class="text-uppercase font-weight-bold">
                                @foreach($services as $service)
                                <tr data-entry-id="{{ $service->id ?? '' }}">
                                    <td>
                                        <button type="button" name="edit" edit="{{  $service->id ?? '' }}" class="text-uppercase edit btn btn-info btn-sm"><i class="fas fa-edit"></i></button>
                                        <button type="button" name="remove" remove="{{  $service->id ?? '' }}" class="text-uppercase remove btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                    </td>
                                    <td>
                                        {{  $service->name ?? '' }} <br>
                                    </td>
                                    <td>
                                        {{  $service->description ?? '' }} <br>
                                    </td>
                                    <td>
                                        {{ $service->created_at->format('M j , Y h:i A') }}
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

<form method="post" id="myForm" class="form-horizontal ">
    @csrf
    <div class="modal" id="myModal" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
        
                <!-- Modal Header -->
                <div class="modal-header ">
                    <p class="modal-title  text-uppercase font-weight-bold">Service Form</p>
                    <button type="button" class="close " data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label text-uppercase  h6" >Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" id="name" class="form-control" />
                                <span class="invalid-feedback" role="alert">
                                    <strong id="error-name"></strong>
                                </span>
                            
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label text-uppercase  h6" >Description </label>
                                <textarea name="description" id="description" class="form-control"></textarea>
                                <span class="invalid-feedback" role="alert">
                                    <strong id="error-description"></strong>
                                </span>
                            
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="hidden_id" id="hidden_id"/>
                    <input type="hidden" name="action" id="action" value="Add" />
                </div>
                <!-- Modal footer -->
                <div class="modal-footer bg-white">
                    <button type="button" class="btn btn-white text-uppercase" data-dismiss="modal">Close</button>
                    <input type="submit" name="action_button" id="action_button" class="text-uppercase btn btn-primary" value="Sumbit" />
                </div>
        
            </div>
        </div>
    </div>
</form>

@endsection
@section('scripts')
<script>
$(function () {
    let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons);
    $.extend(true, $.fn.dataTable.defaults, {
        pageLength: 100,
        'columnDefs': [{ 'orderable': false, 'targets': 0 }],
    });

    $('.manage_services:not(.ajaxTable)').DataTable({ buttons: dtButtons });
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
    $($.fn.dataTable.tables(true)).DataTable()
        .columns.adjust();
    });
});

$('#myForm').on('submit', function(event){
    event.preventDefault();
    $('.form-control').removeClass('is-invalid')
    var action_url = "{{ route('admin.clinic.services_store') }}";
    var type = "POST";

    if($('#action').val() == 'Edit'){
        var id = $('#hidden_id').val();
        action_url = "/admin/clinic/services/" + id;
        type = "PUT";
    }

    $.ajax({
        url: action_url,
        method:type,
        data:$(this).serialize(),
        dataType:"json",
        beforeSend:function(){
            $('#create_record').attr('disabled', true);
        },
        success:function(data){
            $('#create_record').attr('disabled', false);

            if(data.errors){
                $.each(data.errors, function(key,value){
                   if(key == $('#'+key).attr('id')){
                        $('#'+key).addClass('is-invalid')
                        $('#error-'+key).text(value)
                    }
                })
            }
            if(data.success){
                $.confirm({
                    title: data.success,
                    content: "",
                    type: 'green',
                    buttons: {
                        confirm: {
                            text: '',
                            btnClass: 'btn-green',
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

$(document).on('click', '#create_record', function(){
    $('#myModal').modal('show');
    $('#myForm')[0].reset();
    $('.form-control').removeClass('is-invalid');
    $('#action').val('Add');
   
});

$(document).on('click', '.edit', function(){
    $('#myModal').modal('show');
    $('#myForm')[0].reset();
    $('.form-control').removeClass('is-invalid');
    var id = $(this).attr('edit');

    $.ajax({
        url :"/admin/clinic/services/"+id+"/edit",
        dataType:"json",
        beforeSend:function(){
            $("#action_button").attr("disabled", true);
        },
        success:function(data){
            $("#action_button").attr("disabled", false);

            $.each(data.result, function(key,value){
                if(key == $('#'+key).attr('id')){
                    $('#'+key).val(value)
                }
            })
            $('#hidden_id').val(id);
            $('#action').val('Edit');
        }
    })
});

$(document).on('click', '.remove', function(){
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
                      url:"/admin/clinic/services/"+id,
                      method:'DELETE',
                      data: {
                          _token: '{!! csrf_token() !!}',
                      },
                      dataType:"json",
                      beforeSend:function(){
                        $(".remove").attr("disabled", true);
                      },
                      success:function(data){
                        $(".remove").attr("disabled", false);
                        
                          if(data.success){
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