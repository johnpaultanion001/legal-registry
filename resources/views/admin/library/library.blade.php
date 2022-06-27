@extends('layouts.admin1')
@section('content')
<style>
    option {
        font-weight: bold;
        min-height: 2em;
        padding: 4px;
    }
</style>
<div class="card">
    <div class="card-header">
        <ul class="nav nav-tabs justify-content-center" role="tablist">
            @foreach($industries as $industry)
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admin/library_index/'.$industry->id) ? 'active1' : '' }}" href="/admin/library_index/{{$industry->id}}">
                        {{$industry->title}} 
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="col-xl-12 mx-auto">
        <div class="card-header text-center">
                <button class="btn btn-info text-uppercase" id="add_industry">ADD INDUSTRY</button>
                <button class="btn btn-success text-uppercase edit_industry text-right" edit_industry="{{$industry_id->id}}">EDIT INDUSTRY</button>
                <button class="btn btn-danger text-uppercase remove_industry text-right" remove_industry="{{$industry_id->id}}">REMOVE INDUSTRY</button>
        </div>
  
            <div class="card">
                <div class="card-body">
                    <div class="card">
                        <div class="card-header">
                            <ul class="nav nav-tabs justify-content-center" role="tablist">
                                @foreach($industry_id->toi_tota()->get() as $act)
                                    <li class="nav-item">
                                        <a class="nav-link act_menus {!! $loop->first ? 'active' : '' !!}" data-toggle="tab" href="#act{{$act->type_of_trade_act->id}}" role="tab" aria-selected="false">
                                            {{$act->type_of_trade_act->title}}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="card-body">
                            @foreach($industry_id->toi_tota()->get() as $act)
                                <div class="tab-content">
                                    <div class="tab-pane {!! $loop->first ? 'active' : '' !!}" id="act{{$act->type_of_trade_act->id}}" role="tabpanel">
                                        <a href="/assets/pdf/{{$act->type_of_trade_act->file}}" target="_black">
                                            <h4 class="text-center"> {{$act->type_of_trade_act->title}}</h4>
                                        </a>
                                        @foreach($act->type_of_trade_act->subtitle_of_laws()->get() as $subtitle)
                                            <h5 class="text-center">{!! $subtitle->title !!}</h5>
                                            <div class="list-group">
                                                <div  class="list-group-item list-group-item-action active">
                                                    Title
                                                </div>
                                                @foreach($subtitle->title_of_laws()->get() as $law)
                                                    <button type="button" class="list-group-item list-group-item-action">{{$law->title}}</button>
                                                @endforeach
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                        
                    
                        
                </div>
            </div>
       
    </div>
</div>

<form method="post" id="myForm">
    @csrf
    <div class="modal fade" id="myModal" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title text-uppercase font-weight-bold">INDUSTRY FORM</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="fas fa-times"></i>
            </button>
            </div>
            <div class="modal-body row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label text-uppercase  h6" >title <span class="text-danger">*</span></label>
                        <input type="text" name="title_industry" id="title_industry" class="form-control" />
                        <span class="invalid-feedback" role="alert">
                            <strong id="error-title_industry"></strong>
                        </span>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label text-uppercase  h6" >Legal compliance law  <span class="text-danger">*</span>
                            <button type="button" id="btn_new_type_of_trade" class="btn btn-sm btn-info"><i class="fas fa-plus-circle"></i></button>
                            <button type="button" id="btn_edit_type_of_trade" class="btn btn-sm btn-success"><i class="fas fa-pen"></i></button>
                            <button type="button" id="btn_remove_type_of_trade" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                            
                        </label>
                        <div id="new_type_of_trade_act">
                            <textarea name="type_of_trade_act" id="type_of_trade_act"  class="form-control"></textarea>
                            <input type="file" name="file_type_of_trade_act" id="file_type_of_trade_act" class="mt-1"/>
                        </div> 
                        <select name="type_of_trade_act_dd" id="type_of_trade_act_dd" class="form-control">
                            <option value="">Select</option>
                        </select>
                        <span class="text-danger">
                            <strong id="error-type_of_trade_act"></strong>
                        </span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label text-uppercase  h6" >Subtitle of law <span class="text-danger">*</span>
                            <button type="button" id="btn_new_subtitle_of_law" class="btn btn-sm btn-info ml-2"><i class="fas fa-plus-circle"></i></button>
                            <button type="button" id="btn_edit_subtitle_of_law" class="btn btn-sm btn-success ml-2"><i class="fas fa-pen"></i></button>
                            <button type="button" id="btn_remove_subtitle_of_law" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                        </label>
                        <div id="new_subtitle_of_law">
                            <textarea name="subtitle_of_law" id="subtitle_of_law"  class="form-control"></textarea>
                        </div> 
                        <select name="subtitle_of_law_dd" id="subtitle_of_law_dd" class="form-control">
                            <option value="">Select</option>
                        </select>
                        <span class="text-danger">
                            <strong id="error-subtitle_of_law"></strong>
                        </span>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label text-uppercase  h6" >Title of law <span class="text-danger">*</span></label>
                        <div id="section_title_of_laws" style="height:200px; overflow-y: auto; overflow-x: hidden;">
                            <div class="parentContainer">
                                <div class="row childrenContainer">
                                    <div class="col-8">
                                        <input type="text"  name="title_of_law[]" id="title_of_law" class="form-control" required/>
                                    </div>
                                    <div class="col-4">
                                            <button type="button" name="addParent" id="addParent" class="addParent btn btn-primary">            
                                                <i class="fas fa-plus-circle"></i>        
                                            </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                
                <input type="hidden" name="action" id="action" value="Add" />
            </div>
            
            <div class="modal-footer bg-white">
                <button type="button" class="btn btn-white text-uppercase" data-dismiss="modal">Close</button>
                <input type="submit" name="action_button" id="action_button" class="text-uppercase btn btn-primary" value="Sumbit" />
            </div>
        
        </div>
    </div>
</form>

<form method="post" id="otherForm">
    @csrf
    <div class="modal fade" id="otherModal" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title text-uppercase font-weight-bold">Legal compliance law</h5>
            <button type="button" class="close otherModalClose">
                <i class="fas fa-times"></i>
            </button>
            </div>
            <div class="modal-body row">
                <div class="col-md-12" id="form_type_of_trade_act">
                    <div class="form-group">
                        <label class="control-label text-uppercase  h6" >Legal compliance law  <span class="text-danger">*</span></label>
                        <textarea name="type_of_trade_act" id="type_of_trade_act_other" class="form-control"></textarea>
                        <input type="file" name="file_type_of_trade_act" class="mt-1 form-control"/>
                        <span class="text-danger">
                            <strong id="error-type_of_trade_act_other"></strong>
                        </span>
                    </div>
                    <div class="form-group" id="section_existing_file">
                        <label class="control-label text-uppercase  h6" >Existing File:</label>
                        <div id="existing_file_type_of_trade_act" >

                        </div>
                    </div>
                </div>
                <div class="col-md-12" id="form_subtitile_of_law">
                    <div class="form-group">
                        <label class="control-label text-uppercase  h6" >Subtitle of law <span class="text-danger">*</span></label>
                        <textarea name="subtitle_of_law" id="subtitle_of_law_other" class="form-control"></textarea>
                        
                        <span class="text-danger">
                            <strong id="error-subtitle_of_law_other"></strong>
                        </span>
                    </div>
                </div>
               
                <input type="hidden" name="hidden_type_of_trade_act_id" id="hidden_type_of_trade_act_id"/>
                <input type="hidden" name="hidden_subtitle_of_law_id" id="hidden_subtitle_of_law_id"/>
                <input type="hidden" name="hidden_id_industry" id="hidden_id_industry"/>
                <input type="hidden" id="action_type"/>

            </div>
            
            <div class="modal-footer bg-white">
                <button type="button" class="btn btn-white text-uppercase otherModalClose">Close</button>
                <input type="submit" name="action_button_other" id="action_button_other" class="text-uppercase btn btn-primary" value="Sumbit" />
            </div>
        
        </div>
    </div>
</form>
@endsection
@section('scripts')
<script>
$(".act_menus").on('click', function() {
    $(".tab-pane").removeClass("active");
});
$(document).on('click', '.addParent', function () {
  var html = '';
  html += '<div class="parentContainer">';
    html += '<div class="row childrenContainer">';

        html += '<div class="col-8">';
        html += '<input type="text" name="title_of_law[]" id="title_of_law" class="form-control" required/>';
        html += '</div>';


        html += '<div class="col-4">';
            html += '<button type="button" class="btn btn-danger removeParent">';
                html += '<i class="fa fa-minus-circle" aria-hidden="true"></i>';
            html += '</button>';
        html += '</div>';
    html += '</div>';
  html += '</div>';

  $(this)
    .parent()
    .parent()
    .parent()
    .parent()
    .append(html);
    
});
$(document).on('click', '.removeParent', function () {
  $(this).closest('#inputFormRow').remove();
  $(this).parent().parent().parent().remove();
});

$("#add_industry").on('click', function() {
    $('#myModal').modal('show');
    $('#myForm')[0].reset();
    $('.form-control').removeClass('is-invalid');
    
    $('#new_type_of_trade_act').show();
    $('#new_subtitle_of_law').show();

    $('#type_of_trade_act_dd').hide();
    $('#subtitle_of_law_dd').hide();
    $('#btn_new_type_of_trade').hide();
    $('#btn_new_subtitle_of_law').hide();
    $('#btn_edit_type_of_trade').hide();
    $('#btn_edit_subtitle_of_law').hide();
    $('#btn_remove_type_of_trade').hide();
    $('#btn_remove_subtitle_of_law').hide();
    $('#action').val('Add');
    var title_of_laws = '';
    title_of_laws += '<div class="parentContainer">';
        title_of_laws += '<div class="row childrenContainer">';
            title_of_laws += '<div class="col-8">';
            title_of_laws += '<input type="text" name="title_of_law[]" id="title_of_law" class="form-control" required/>';
            title_of_laws += '</div>';
            title_of_laws += '<div class="col-4">';
                title_of_laws +=  '<button type="button" name="addParent" id="addParent" class="addParent btn btn-primary">';            
                    title_of_laws +=  '<i class="fas fa-plus-circle"></i>';     
                title_of_laws +=  '</button>';
            title_of_laws += '</div>';
        title_of_laws += '</div>';
    title_of_laws += '</div>';
    $('#section_title_of_laws').empty().append(title_of_laws);
});

var id_industry = null; 
$(".edit_industry").on('click', function() {
    $('#myModal').modal('show');
    $('#myForm')[0].reset();
    $('.form-control').removeClass('is-invalid');

    $('#new_type_of_trade_act').hide();
    $('#new_subtitle_of_law').hide();

    $('#type_of_trade_act_dd').show();
    $('#subtitle_of_law_dd').show();
    $('#btn_new_type_of_trade').show();
    $('#btn_new_subtitle_of_law').show();
    $('#btn_edit_type_of_trade').show();
    $('#btn_edit_subtitle_of_law').show();
    $('#btn_remove_type_of_trade').show();
    $('#btn_remove_subtitle_of_law').show();

    $('#action').val('Edit');
    id_industry = $(this).attr('edit_industry');
    $.ajax({
        url: "/admin/library/industry/edit", 
        type: "get",
        dataType:"json",
        data: {
            id_industry:id_industry,_token: '{!! csrf_token() !!}',
        },
        success: function(data){
            $('#title_industry').val(data.title_industry)
        },
    });
    var title_of_laws = '';
    title_of_laws += '<div class="parentContainer">';
        title_of_laws += '<div class="row childrenContainer">';
            title_of_laws += '<div class="col-8">';
            title_of_laws += '<input type="text" name="title_of_law[]" id="title_of_law" class="form-control" required/>';
            title_of_laws += '</div>';
            title_of_laws += '<div class="col-4">';
                title_of_laws +=  '<button type="button" name="addParent" id="addParent" class="addParent btn btn-primary">';            
                    title_of_laws +=  '<i class="fas fa-plus-circle"></i>';     
                title_of_laws +=  '</button>';
            title_of_laws += '</div>';
        title_of_laws += '</div>';
    title_of_laws += '</div>';
    $('#section_title_of_laws').empty().append(title_of_laws);
    type_of_trade_act_dd(id_industry);
});

$("#btn_new_type_of_trade").on('click', function() {
    $('#otherModal').modal('show');
    $('#otherForm')[0].reset();
    $('.form-control').removeClass('is-invalid');
    $('#form_type_of_trade_act').show();
    $('#form_subtitile_of_law').hide();
    $('#error-type_of_trade_act_other').text(null);
    $('#hidden_id_industry').val(id_industry);
    $('#section_existing_file').hide();
    $('#action_type').val('type_of_trade_add');
});

$("#btn_edit_type_of_trade").on('click', function() {
    if($('#type_of_trade_act_dd').val() != ''){
        $('#otherModal').modal('show');
        $('#otherForm')[0].reset();
        $('#form_type_of_trade_act').show();
        $('#form_subtitile_of_law').hide();
        $('#error-type_of_trade_act_other').text(null);
        $('#hidden_id_industry').val(id_industry);
        $('#action_type').val('type_of_trade_edit')
        $('#section_existing_file').show();
        $.ajax({
            url :"/admin/library/type_of_trade/"+ $('#type_of_trade_act_dd').val(),
            dataType:"json",
            beforeSend:function(){
            },
            success:function(data){
                $.each(data.result, function(key,value){
                    if(key == 'title'){
                        $('#type_of_trade_act_other').val(value)
                    }
                    if(key == 'file'){
                        $('#existing_file_type_of_trade_act').html('<a target="_blank" href="/assets/pdf/'+value+'">'+value+'</a>');
                    }
                })
                $('#hidden_type_of_trade_act_id').val($('#type_of_trade_act_dd').val());
            }
        })
    }else{
        $('#error-type_of_trade_act').text('Legal compliance law dropdown field is required.');
    }
});

$("#btn_remove_type_of_trade").on('click', function() {
    if($('#type_of_trade_act_dd').val() != ''){
        $.confirm({
            title: 'Confirmation',
            content: 'You really want to remove this record?',
            type: 'red',
            buttons: {
                confirm: {
                    text: 'confirm',
                    btnClass: 'btn-blue',
                    action: function(){
                        return $.ajax({
                            url:"/admin/library/type_of_trade_update/"+ $('#type_of_trade_act_dd').val(),
                            method:'DELETE',
                            data: {
                                _token: '{!! csrf_token() !!}',
                            },
                            dataType:"json",
                            beforeSend:function(){
                                
                            },
                            success:function(data){
                                if(data.success){
                                    $('#error-type_of_trade_act_other').text(null)
                                    type_of_trade_act_dd(id_industry);
                                }
                            }
                        })
                    }
                },
                cancel:  {
                    text: 'cancel',
                    btnClass: 'btn-red',
                }
            }
        });
    }else{
        $('#error-type_of_trade_act').text('Legal compliance law dropdown field is required.');
    }
});

$("#btn_remove_subtitle_of_law").on('click', function() {
    if($('#subtitle_of_law_dd').val() != ''){
        $.confirm({
            title: 'Confirmation',
            content: 'You really want to remove this record?',
            type: 'red',
            buttons: {
                confirm: {
                    text: 'confirm',
                    btnClass: 'btn-blue',
                    action: function(){
                        return $.ajax({
                            url:"/admin/library/subtitle_of_law/"+ $('#subtitle_of_law_dd').val(),
                            method:'DELETE',
                            data: {
                                _token: '{!! csrf_token() !!}',
                            },
                            dataType:"json",
                            beforeSend:function(){
                                
                            },
                            success:function(data){
                                if(data.success){
                                    $('#error-subtitle_of_law').text(null)
                                    subtitle_of_law_dd($('#type_of_trade_act_dd').val());
                                }
                            }
                        })
                    }
                },
                cancel:  {
                    text: 'cancel',
                    btnClass: 'btn-red',
                }
            }
        });
    }else{
        $('#error-subtitle_of_law').text('The subtitle of law dropdown field is required.');
    }
});







$("#btn_new_subtitle_of_law").on('click', function() {
    if($('#type_of_trade_act_dd').val() != ''){
        $('#otherModal').modal('show');
        $('#otherForm')[0].reset();
        $('.form-control').removeClass('is-invalid');
        $('#form_type_of_trade_act').hide();
        $('#form_subtitile_of_law').show();
        $('#error-subtitle_of_law_other').text(null);
        $('#hidden_subtitle_of_law_id').val(null);
        $('#action_type').val('subtitle_of_law');
    }else{
        $('#error-type_of_trade_act').text('Legal compliance law dropdown field is required.');
    }
});

$("#btn_edit_subtitle_of_law").on('click', function() {
    if($('#subtitle_of_law_dd').val() != ''){
        $('#otherModal').modal('show');
        $('#otherForm')[0].reset();
        $('#form_type_of_trade_act').hide();
        $('#form_subtitile_of_law').show();
        $('#error-type_of_trade_act_other').text(null);
        $('#hidden_id_industry').val(id_industry);
        $('#action_type').val('subtitle_of_law');
        $.ajax({
            url :"/admin/library/subtitle_of_law/"+ $('#subtitle_of_law_dd').val(),
            dataType:"json",
            beforeSend:function(){
            },
            success:function(data){
                $.each(data.result, function(key,value){
                    if(key == 'title'){
                        $('#subtitle_of_law_other').val(value)
                    }
                })
                $('#hidden_subtitle_of_law_id').val($('#subtitle_of_law_dd').val());
            }
        })
    }else{
        $('#error-subtitle_of_law').text('The subtitle of law dropdown field is required.');
    }
});


$('#otherForm').on('submit', function(event){
    event.preventDefault();
    $('.form-control').removeClass('is-invalid')
    var action_url = "{{ route('admin.library.type_of_trade') }}";
    var type = "POST";

    if($('#action_type').val() == 'type_of_trade_edit'){
        action_url = "/admin/library/type_of_trade_update/" + $('#type_of_trade_act_dd').val();
        type = "POST";
    }
    if($('#action_type').val() == 'subtitle_of_law'){
        action_url = "/admin/library/subtitle_of_law/" + $('#type_of_trade_act_dd').val();
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
            $('#action_button_other').attr('disabled', true);
        },
        success:function(data){
            $('#action_button_other').attr('disabled', false);
            if(data.errors){
                $.each(data.errors, function(key,value){
                    if(key == 'file_type_of_trade_act'){
                        $('#error-type_of_trade_act_other').text(value)
                    }
                    if(key == 'type_of_trade_act'){
                        $('#error-type_of_trade_act_other').text(value)
                    }
                    if(key == 'subtitle_of_law'){
                        $('#error-subtitle_of_law_other').text(value)
                    }
                })
            }
            if(data.success){
                $('#otherModal').modal('hide');
                $('#otherForm')[0].reset();
                $('#error-type_of_trade_act_other').text(null)
                type_of_trade_act_dd(id_industry);
                subtitle_of_law_dd($('#type_of_trade_act_dd').val());
            }
        }
    });
});



function type_of_trade_act_dd(id_industry){
    $.ajax({
        url: "/admin/library/type_of_trade_act_dd", 
        type: "get",
        dataType:"json",
        data: {
            id_industry:id_industry,_token: '{!! csrf_token() !!}',
        },
        beforeSend: function() {
            $('#type_of_trade_act_dd').attr('disabled', true);
        },
        success: function(data){
            $('#type_of_trade_act_dd').attr('disabled', false);

            var type_of_trades = '';

            type_of_trades += '<option value="">Select</option>';
            $.each(data.type_of_trades, function(key,value){
                type_of_trades += '<option value="'+value.id+'">'+value.title+'</option>';
            });
            $('#type_of_trade_act_dd').empty().append(type_of_trades);
        },
    });
}

var id_type_of_trade = null; 

$('#type_of_trade_act_dd').on("change", function(event){
    id_type_of_trade = $(this).val();
    subtitle_of_law_dd(id_type_of_trade);
});

function subtitle_of_law_dd(id_type_of_trade){
    $.ajax({
        url: "/admin/library/subtitle_of_law_dd", 
        type: "get",
        dataType:"json",
        data: {
            id_type_of_trade:id_type_of_trade,_token: '{!! csrf_token() !!}',
        },
        beforeSend: function() {
        },
        success: function(data){

            var subtitle_of_laws = '';

            subtitle_of_laws += '<option value="">Select</option>';
            $.each(data.subtitle_of_laws, function(key,value){
                subtitle_of_laws += '<option value="'+value.id+'">'+value.title+'</option>';
            });
            $('#subtitle_of_law_dd').empty().append(subtitle_of_laws);
        },
    });
}

$('#subtitle_of_law_dd').on("change", function(event){
    $.ajax({
        url: "/admin/library/title_of_laws", 
        type: "get",
        dataType:"json",
        data: {
            id_type_of_trade:id_type_of_trade,id_subtitle:$(this).val(),_token: '{!! csrf_token() !!}',
        },
        beforeSend: function() {
            
        },
        success: function(data){
            
            if(data.title_of_laws){
                var title_of_laws = '';
                $.each(data.title_of_laws, function(key,value){
                    title_of_laws += '<div class="parentContainer">';
                        title_of_laws += '<div class="row childrenContainer">';
                            title_of_laws += '<div class="col-8">';
                            title_of_laws += '<input type="text" name="title_of_law[]" id="title_of_law" class="form-control" value="'+value.title+'" required/>';
                            title_of_laws += '</div>';
                            title_of_laws += '<div class="col-4">';
                                if (key === 0) {
                                    title_of_laws +=  '<button type="button" name="addParent" id="addParent" class="addParent btn btn-primary">';            
                                        title_of_laws +=  '<i class="fas fa-plus-circle"></i>';     
                                    title_of_laws +=  '</button>';
                                }else{
                                    title_of_laws += '<button type="button" class="btn btn-danger removeParent">';
                                        title_of_laws += '<i class="fa fa-minus-circle" aria-hidden="true"></i>';
                                    title_of_laws += '</button>';
                                }
                            title_of_laws += '</div>';
                        title_of_laws += '</div>';
                    title_of_laws += '</div>';
                });
                $('#section_title_of_laws').empty().append(title_of_laws);
            }
        },
    });
});

$('#myForm').on('submit', function(event){
    event.preventDefault();
    $('.form-control').removeClass('is-invalid')
    var action_url = "{{ route('admin.library.store_industry') }}";
    var type = "POST";

    if($('#action').val() == 'Edit'){
        action_url = "/admin/library/industry/" + id_industry;
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
                    if(key == 'file_type_of_trade_act'){
                        $('#error-type_of_trade_act').text(value)
                    }
                    if(key == 'type_of_trade_act'){
                        $('#error-type_of_trade_act').text(value)
                    }
                    if(key == 'subtitle_of_law'){
                        $('#error-subtitle_of_law').text(value)
                    }
                    if(key == 'type_of_trade_act_dd'){
                        $('#error-type_of_trade_act').text(value)
                    }
                    if(key == 'subtitle_of_law_dd'){
                        $('#error-subtitle_of_law').text(value)
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

$(".otherModalClose").click(function(){
    $('#otherModal').modal('hide');
});

$(document).on('click', '.remove_industry', function(){
  var id = $(this).attr('remove_industry');
  $.confirm({
      title: 'Confirmation',
      content: 'You really want to remove this record?',
      type: 'red',
      buttons: {
          confirm: {
              text: 'confirm',
              btnClass: 'btn-blue',
              action: function(){
                  return $.ajax({
                      url:"/admin/library/"+id,
                      method:'DELETE',
                      data: {
                          _token: '{!! csrf_token() !!}',
                      },
                      dataType:"json",
                      beforeSend:function(){
                           
                      },
                      success:function(data){
                          if(data.success){
                            window.location.href = '/admin/library_index'
                          }
                      }
                  })
              }
          },
          cancel:  {
              text: 'cancel',
              btnClass: 'btn-red',
          }
      }
  });

});
</script>
@endsection