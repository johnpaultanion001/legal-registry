@extends('layouts.admin1')
@section('content')

    <div id="exchange_rates">
        <div class="col-lg-12">
            <div class="card">
                    <div class="card-header p-2">
                        <h4>
                            Accounts
                        </h4>
                            <button type="button" id="create_record" class="btn btn-primary btn-sm">New Account</button>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                        <table class="table align-items-center table-flush datatable-country display" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                    
                                        <th>
                                            
                                        </th>
                                        <th>
                                            Name
                                        </th>
                                        <th>
                                            Email/Username
                                        </th>
                                        <th>
                                            Mobile No
                                        </th>
                                        <th>
                                            Role
                                        </th>
                                        <th>
                                            Created At
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($accounts as $account)
                                        <tr>
                                            <td>
                                                <button type="button" edit="{{  $account->user->id ?? '' }}" class="edit btn btn-info btn-sm"><i class="fas fa-pen"></i></button>
                                                <button type="button" remove="{{  $account->user->id ?? '' }}" class="remove btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                            </td>
                                            <td>
                                                {{  $account->user->firstname ?? '' }} {{  $account->user->lastname ?? '' }}
                                            </td>
                                            <td>
                                                {{  $account->user->email ?? '' }}
                                            </td>
                                            <td>
                                                {{  $account->user->mobile_number ?? '' }}
                                            </td>
                                            <td>
                                                @if($account->role_id == 1)
                                                    ADMIN
                                                @elseif($account->role_id == 2)
                                                    STAFF
                                                @endif
                                            </td>
                                            <td>
                                                {{ $account->user->created_at->format('M j , Y h:i A') }}
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


<form method="post" id="accountsForm" class="form-horizontal ">
    @csrf
    <div class="modal" id="accountsModal" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-lg modal-dialog-centered ">
            <div class="modal-content">
        
                <!-- Modal Header -->
                <div class="modal-header ">
                    <p class="modal-title  text-uppercase font-weight-bold">Modal Heading</p>
                    <button type="button" class="close " data-dismiss="modal">&times;</button>
                </div>

                    
                <!-- Modal body -->
                <div class="modal-body">
                 <div id="modalbody" class="modalbody row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label text-uppercase" >First Name:<span class="text-danger">*</span> </label>
                                <input type="text" name="firstname" id="firstname" class="form-control" />
                                <span class="invalid-feedback" role="alert">
                                    <strong id="error-firstname"></strong>
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label text-uppercase" >Last Name:<span class="text-danger">*</span> </label>
                                <input type="text" name="lastname" id="lastname" class="form-control" />
                                <span class="invalid-feedback" role="alert">
                                    <strong id="error-lastname"></strong>
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label text-uppercase" >Email:<span class="text-danger">*</span> </label>
                                <input type="email" name="email" id="email" class="form-control" />
                                <span class="invalid-feedback" role="alert">
                                    <strong id="error-email"></strong>
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label text-uppercase" >Mobile Number:<span class="text-danger">*</span> </label>
                                <input type="text" name="mobile_number" id="mobile_number" class="form-control" />
                                <span class="invalid-feedback" role="alert">
                                    <strong id="error-mobile_number"></strong>
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label text-uppercase" >Role <span class="text-danger">*</span></label>
                                <select name="role" id="role" class="form-control select2" style="width: 100%">
                                    <option value="">...</option>
                                    <option value="1">ADMIN</option>
                                    <option value="2">STAFF</option>
                                </select>
                                <span class="invalid-feedback" role="alert">
                                    <strong id="error-role"></strong>
                                </span>
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label text-uppercase" >Password:<span class="text-danger">*</span> </label>
                                <input type="password" name="password" id="password" class="form-control" />
                                <span class="invalid-feedback" role="alert">
                                    <strong id="error-password"></strong>
                                </span>
                            </div>
                        </div>

                    </div>
                    <input type="hidden" name="action" id="action" value="Add" />
                    <input type="hidden" name="hidden_id" id="hidden_id" />
                </div>
        
                <!-- Modal footer -->
                <div class="modal-footer bg-white">
                    <button type="button" class="btn btn-white text-uppercase" data-dismiss="modal">Close</button>
                    <input type="submit" name="action_button" id="action_button" class="text-uppercase btn btn-primary" value="Save" />
                </div>
        
            </div>
        </div>
    </div>
</form>




@endsection
@section('scripts')
<script>

$(document).on('click', '#create_record', function(){
    $('#accountsModal').modal('show');
    $('#accountsForm')[0].reset();
    $('.form-control').removeClass('is-invalid')
    $('.modal-title').text('New Account');
    $('#action_button').val('Submit');
    $('#action').val('Add');
    $("#role").attr('disabled', false);
});

$('#accountsForm').on('submit', function(event){
    event.preventDefault();
    $('.form-control').removeClass('is-invalid')
    var action_url = "{{ route('admin.accounts.store') }}";
    var type = "POST";

    if($('#action').val() == 'Edit'){
        var id = $('#hidden_id').val();
        action_url = "/admin/accounts/" + id;
        type = "PUT";
    }

    $.ajax({
        url: action_url,
        method:type,
        data:$(this).serialize(),
        dataType:"json",
        beforeSend:function(){
            $("#action_button").attr("disabled", true);
            $("#action_button").attr("value", "Loading..");
        },
        success:function(data){
            $("#action_button").attr("disabled", false);
            $("#action_button").attr("value", "Submit");
            if(data.errors){
                $.each(data.errors, function(key,value){
                    if(key == $('#'+key).attr('id')){
                        $('#'+key).addClass('is-invalid')
                        $('#error-'+key).text(value)
                    }

                })
            }
            if(data.success){
                $('.form-control').removeClass('is-invalid')
                $('#accountsForm')[0].reset();
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
    });
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
                      url:"/admin/accounts/"+id,
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


$(document).on('click', '.edit', function(){
    $('#accountsModal').modal('show');
    $('.modal-title').text('Edit Account');
    $('#accountsForm')[0].reset();
    $('.form-control').removeClass('is-invalid')
    var id = $(this).attr('edit');

    $.ajax({
        url :"/admin/accounts/"+id+"/edit",
        dataType:"json",
        beforeSend:function(){
            $("#action_button").attr("disabled", true);
            $("#action_button").attr("value", "Loading..");
        },
        success:function(data){
            $("#action_button").attr("disabled", false);
            $("#action_button").attr("value", "Submit");
          
            $('#firstname').val(data.firstname);
            $('#lastname').val(data.lastname);
            $('#email').val(data.email);
            $('#mobile_number').val(data.mobile_number);
            $("#role").select2("trigger", "select", {
                        data: { id: data.role }
                    });
            $("#role").attr('disabled', true);
            $('#hidden_id').val(id);
            $('#action').val('Edit');
        }
    })
});


</script>
@endsection