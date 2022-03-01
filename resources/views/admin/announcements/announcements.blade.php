@extends('layouts.admin1')
@section('content')
    
<div class="card">
    
   <div class="col-xl-12 mx-auto">
        <div class="card-header mt-3">
            <h3>
                ANNOUNCEMENTS
            </h3>
           
        </div>
        <div class="card">
        @can('admin_access')
            <button type="button" id="create_record"class="text-uppercase btn btn-info">Add Record</button>
        @endcan
        <br>
            <div class="container p-2">
                @foreach($announcements as $announcement)
                    <div class="card">
                        <div class="row">
                            @if($announcement->image != '')
                                <div class="col-sm">
                                    <img class="d-block"  height="100%" width="100%" src="{{URL::asset('/assets/images/announcements/'.$announcement->image)}}" alt="">
                                </div>
                            @endif
                            <div class="col-sm p-2">
                                @can('admin_access')
                                    <h6 class="text-dark float-right mr-2" style="font-weight: 600; font-size: 15px;"><i class="fas fa-arrow-right"></i> {{$announcement->for}}</h6>
                                @endcan
                                <h6 class="text-dark float-right mr-2" style="font-weight: 600; font-size: 15px;"><i class="fas fa-calendar"></i>  {{$announcement->created_at->format('M j , Y h:i A') }}</h6>

                                <div class="card-body">
                                    <h4 style="font-weight: bold;">{{$announcement->title}}</h4>
                                    <p class="text-dark" style="font-weight: 500;">{{$announcement->description}}</p>
                                <br>
                            
                                    <a href="{{$announcement->link_website ?? '/admin/announcements'}}" target="_blank" class="btn btn-primary text-uppercase">Read More</a>
                                    <br>
                                    @can('admin_access')
                                        <button type="button" name="edit" edit="{{  $announcement->id ?? '' }}" class="text-uppercase edit btn btn-info"><i class="fas fa-edit"></i></button>
                                        <button type="button" name="remove" remove="{{  $announcement->id ?? '' }}" class="text-uppercase remove btn btn-danger"><i class="fas fa-trash"></i></button>
                                    @endcan
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                
                
            </div>

            <br>
            <br>
   
        </div>
   </div>
       
   
</div>

<form method="post" id="myForm" class="contact-form">
    @csrf
    <div class="modal fade" id="myModal" data-keyboard="false" data-backdrop="static">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-uppercase font-weight-bold">Announcement Form</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <i class="fas fa-times"></i>
            </button>
          </div>
          <div class="modal-body">

                <div class="form-group">
                    <label class="control-label text-uppercase  h6" >title <span class="text-danger">*</span></label>
                    <input type="text" name="title" id="title" class="form-control" />
                    <span class="invalid-feedback" role="alert">
                        <strong id="error-title"></strong>
                    </span>
                </div>
                <div class="form-group">
                    <label class="control-label text-uppercase  h6" >Description <span class="text-danger">*</span></label>
                    <textarea class="form-control" rows="8" name="description" id="description"></textarea>
                    <span class="invalid-feedback" role="alert">
                        <strong id="error-description"></strong>
                    </span>
                </div>
                <div class="form-group">
                    <label class="control-label text-uppercase  h6" >Link a Website</label>
                    <input type="text" name="link_website" id="link_website" class="form-control" />
                    <span class="invalid-feedback" role="alert">
                        <strong id="error-link_website"></strong>
                    </span>
                </div>
                <div class="form-group">
                    <label class="control-label text-uppercase  h6" >For <span class="text-danger">*</span></label>
                    <select name="for" id="for" class="classic-input2 form-control select2" style="width: 100%">
                        <option value="ALL">ALL</option>
                        <option value="CLINIC">CLINIC</option>
                        <option value="CLIENT">CLIENT</option>
                    </select>
                    <span class="invalid-feedback" role="alert">
                        <strong id="error-for"></strong>
                    </span>
                </div>
               

                <div class="form-group">
                    <label for="announcement_image" class="control-label text-uppercase  h6" >Upload(Image) </label>
                    <input type="file" name="announcement_image" id="announcement_image" class="form-control" accept="image/*" />
                    <span class="invalid-feedback" role="alert">
                        <strong id="error-announcement_image"></strong>
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
    var action_url = "{{ route('admin.announcements.store') }}";
    var type = "POST";

    if($('#action').val() == 'Edit'){
        var id = $('#hidden_id').val();
        action_url = "/admin/announcements/" + id;
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
        url :"/admin/announcements/"+id+"/edit",
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
                if(key == 'image'){
                    $('#current_image').attr("src", '/assets/images/announcements/'  + value);
                }
                if(key == 'for'){
                    $("#for").select2("trigger", "select", {
                            data: { id: value }
                        });
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
                      url:"/admin/announcements/"+id,
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