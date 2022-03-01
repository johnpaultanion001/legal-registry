@extends('layouts.admin1')
@section('content')
    
<div class="card">
    
   <div class="col-xl-12 mx-auto">
        <div class="card-header mt-3">
            <h3>
                Manage Doctors
            </h3>
            <button type="button" id="create_record" class="text-uppercase h6 btn btn-primary">
                <i class="fas fa-plus"></i> Add Record
            </button>
        </div>
        <div class="card">
                <div class="card-body" style="border: 1px #111">
                    <div class="table-responsive">
                        <table class="table  manage_appointments display" width="100%">
                            <thead class="text-uppercase thead-white">
                            <tr>
                                <th width="100">Action</th>
                                <th width="100">Name</th>
                                <th width="100">Contact Number</th>
                                <th width="100">Medical License</th>
                                <th width="100">Created At</th>
                            </tr>
                            </thead>
                            <tbody class="text-uppercase font-weight-bold">
                                @foreach($doctors as $doctor)
                                <tr data-entry-id="{{ $doctor->id ?? '' }}">
                                    <td>
                                        <button type="button" name="edit" edit="{{  $doctor->id ?? '' }}" class="text-uppercase edit btn btn-info btn-sm"><i class="fas fa-edit"></i></button>
                                        <button type="button" name="remove" remove="{{  $doctor->id ?? '' }}" class="text-uppercase remove btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                    </td>
                                    <td>
                                        {{  $doctor->name ?? '' }} <br>
                                    </td>
                                    <td>
                                        {{  $doctor->contact_number ?? '' }} <br>
                                    </td>
                                    <td>
                                        <a href="/assets/images/medical_license/{{$doctor->medical_license}}" target="_blank">
                                            <img style="vertical-align: bottom;"  height="100" width="100" src="{{URL::asset('/assets/images/medical_license/'.$doctor->medical_license)}}" />
                                        </a>
                                    </td>
                                    <td>
                                        {{ $doctor->created_at->format('M j , Y h:i A') }}
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

<form method="post" id="myForm" class="contact-form">
    @csrf
    <div class="modal fade" id="myModal" data-keyboard="false" data-backdrop="static">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-uppercase font-weight-bold">Doctor Form</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <i class="fas fa-times"></i>
            </button>
          </div>
          <div class="modal-body">

                <div class="form-group">
                    <label class="control-label text-uppercase  h6" >Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" id="name" class="form-control" />
                    <span class="invalid-feedback" role="alert">
                        <strong id="error-name"></strong>
                    </span>
                </div>
                <div class="form-group">
                    <label class="control-label text-uppercase  h6" >Contact Number <span class="text-danger">*</span></label>
                    <input type="number" name="contact_number" id="contact_number" class="form-control" />
                    <span class="invalid-feedback" role="alert">
                        <strong id="error-contact_number"></strong>
                    </span>
                </div>

                <div class="form-group">
                    <label for="medical_license_image" class="control-label text-uppercase  h6" >Upload(Medical License) <span class="text-danger">*</span></label>
                    <input type="file" name="medical_license_image" id="medical_license_image" class="form-control" accept="image/*" />
                    <span class="invalid-feedback" role="alert">
                        <strong id="error-medical_license_image"></strong>
                    </span>
                    <div class="current_img pt-4">
                        <div class="row">
                            <div class="col-6">
                            <br>
                            <br>
                            <br>
                                 <h6>Current Image:</h6>
                            </div>
                            <div class="col-6">
                                 <img style="vertical-align: bottom;" id="current_image"  height="100" width="100" src="" />
                            </div>
                        </div>
                    </div>
                </div>



                <input type="hidden" name="action" id="action" value="Add" />
                <input type="hidden" name="hidden_id" id="hidden_id" />
              
          </div>
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
        'columnDefs': [
                { 
                    'orderable': false
                    , 'targets': 3 
                },
                { 
                    'orderable': false
                    , 'targets': 0
                }
            ],
    });

    $('.manage_appointments:not(.ajaxTable)').DataTable({ buttons: dtButtons });
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
    $($.fn.dataTable.tables(true)).DataTable()
        .columns.adjust();
    });
});

$(document).on('click', '#create_record', function(){
    $('#myModal').modal('show');
    $('#myForm')[0].reset();
    $('.form-control').removeClass('is-invalid');
    $('#action').val('Add');
    $('.current_img').hide();
});


$('#myForm').on('submit', function(event){
    event.preventDefault();
    $('.form-control').removeClass('is-invalid')
    var action_url = "{{ route('admin.clinic.doctors_store') }}";
    var type = "POST";

    if($('#action').val() == 'Edit'){
        var id = $('#hidden_id').val();
        action_url = "/admin/clinic/doctors/" + id;
        type = "POST";
    }

    $.ajax({
        url: action_url,
        method:type,
        data:  new FormData(this),
        contentType: false,
        cache: false,
        processData: false,

        dataType:"json",
        beforeSend:function(){
            $("#action_button").attr("disabled", true);
        },
        success:function(data){
            $("#action_button").attr("disabled", false);

            if(data.errors){
                $.each(data.errors, function(key,value){
                    if(key == $('#'+key).attr('id')){
                        $('#'+key).addClass('is-invalid')
                        $('#error-'+key).text(value)
                    }
                    if(key == 'image'){
                        $('.image').addClass('is-invalid')
                        $('#error-image').text(value)
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

$(document).on('click', '.edit', function(){
    $('#myModal').modal('show');
    $('#myForm')[0].reset();
    $('.form-control').removeClass('is-invalid');
    $('.current_img').show();
    var id = $(this).attr('edit');
    $.ajax({
        url :"/admin/clinic/doctors/"+id+"/edit",
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
                if(key == 'medical_license'){
                    $('#current_image').attr("src", '/assets/images/medical_license/'  + value);
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
                      url:"/admin/clinic/doctors/"+id,
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