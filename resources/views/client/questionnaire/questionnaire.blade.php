@extends('layouts.admin1')
@section('content')
    
<div class="card">
    <div class="card-header bg-white">
        <ul class="nav nav-tabs justify-content-center" role="tablist">
            @foreach(auth()->user()->client->industries()->get() as $industry)
                <li class="nav-item ">
                    <a class="nav-link {{ request()->is('admin/client/questionnaire/'.$industry->type_of_industry->id) ? 'active' : '' }}" href="/admin/client/questionnaire/{{$industry->type_of_industry->id}}">
                        {{$industry->type_of_industry->title}}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    <hr>
   <div class="col-xl-12 mx-auto">
        @if($client_toi != null)
            <div class="card-body">
                    <div class="card-header mt-3">
                        <ul class="nav nav-tabs justify-content-center" role="tablist">
                            @foreach($client_toi->type_of_industry->toi_tota()->get() as $act)
                                <li class="nav-item">
                                    <a class="nav-link act_menus {!! $loop->first ? 'active' : '' !!}" data-toggle="tab" href="#act{{$act->type_of_trade_act->id}}" role="tab" aria-selected="false">
                                        {{$act->type_of_trade_act->title}}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        @foreach($client_toi->type_of_industry->toi_tota()->get() as $act)
                            <div class="tab-content">
                                <div class="tab-pane {!! $loop->first ? 'active' : '' !!}" id="act{{$act->type_of_trade_act->id}}" role="tabpanel">
                                    <div class="card">
                                            <h4 class="text-uppercase text-info text-center">
                                                <a href="/admin/client/legal_compliance_laws/{{$client_toi->type_of_industry_id}}" target="_black">
                                                    {{$act->type_of_trade_act->title}}
                                                </a>
                                                
                                            </h4>
                                            @foreach($act->type_of_trade_act->subtitle_of_laws()->get() as $subtitle)
                                            <h5 class="text-center">
                                                    {!! $subtitle->title !!}
                                            </h5>
                                            <div class="table-responsive">
                                                <table class="table table-bordered display" width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th width="100">Title</th>
                                                                <th width="100">Applicability</th>
                                                                <th width="100">If Yes, which dept?</th>
                                                                <th width="100">Compliance Status</th>
                                                                <th width="100">Evidences seen / Remarks</th>
                                                                <th width="100">Related Procedures / Documents / HIRA No.</th>
                                                                <th width="50"></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($subtitle->title_of_laws as $law)
                                                                <tr data-entry-id="">
                                                                    <td class="font-weight-bold">
                                                                        {{$law->title}}
                                                                    </td>
                                                                    @forelse($law->question_form_answers as $answer)
                                                                        <td>
                                                                            <select name="applicability{{$law->id}}" id="applicability{{$law->id}}" class="form-control">
                                                                                <option value="">Select</option>
                                                                                <option value="YES" {{$answer->applicability == 'YES' ? 'selected' : '' }}>YES</option>
                                                                                <option value="NO" {{$answer->applicability == 'NO' ? 'selected' : '' }}>NO</option>
                                                                                <option value="INFO_ONLY" {{$answer->applicability == 'INFO_ONLY' ? 'selected' : '' }}>INFO ONLY</option>
                                                                            </select>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" class="form-control" name="iywd{{$law->id}}" id="iywd{{$law->id}}" value="{{$answer->iywd ?? ''}}"/>
                                                                        </td>
                                                                        <td>
                                                                            <select name="compliance_status{{$law->id}}" id="compliance_status{{$law->id}}" class="form-control">
                                                                                <option value="">Select</option>
                                                                                <option value="YES" {{$answer->compliance_status == 'YES' ? 'selected' : '' }}>YES</option>
                                                                                <option value="NO" {{$answer->compliance_status == 'NO' ? 'selected' : '' }}>NO</option>
                                                                                <option value="INFO_ONLY" {{$answer->compliance_status == 'INFO_ONLY' ? 'selected' : '' }}>INFO ONLY</option>
                                                                            </select>
                                                                        </td>
                                                                        <td>
                                                                            <div class="input-group">
                                                                                <input type="text" class="form-control" name="remarks{{$law->id}}" id="remarks{{$law->id}}" value="{{$answer->remarks ?? ''}}"/>
                                                                                <div class="input-group-append">
                                                                                    <span class="input-group-text">
                                                                                        <i class="now-ui-icons arrows-1_cloud-upload-94 file_icon" file_id="{{$law->id}}" style="cursor: pointer; font-size: 1.4em; font-weight: bold;"></i>
                                                                                        <input type="file"  name="file_remarks{{$law->id}}" id="file_remarks{{$law->id}}" style="display:none"/>
                                                                                        
                                                                                    </span>
                                                                                </div>
                                                                               
                                                                            </div>
                                                                            @if($answer->file_remarks != '')
                                                                                <a href="/assets/file_remarks/{{$answer->file_remarks}}" target="_blank">{{$answer->file_remarks}}</a>
                                                                            @endif
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" class="form-control" name="rpdhn{{$law->id}}" id="rpdhn{{$law->id}}" value="{{$answer->rpdhn ?? ''}}"/>
                                                                        </td>
                                                                        <td>
                                                                            <button law_id="{{$law->id}}" class="btn btn-primary btn-sm save" id="save{{$law->id}}">Save</button>
                                                                        </td>
                                                                    @empty
                                                                        <td>
                                                                            <select class="form-control" name="applicability{{$law->id}}" id="applicability{{$law->id}}">
                                                                                <option value="">Select</option>
                                                                                <option value="YES">YES</option>
                                                                                <option value="NO">NO</option>
                                                                                <option value="INFO_ONLY">INFO ONLY</option>
                                                                            </select>
                                                                        </td>
                                                                        <td>
                                                                            <input class="form-control" type="text" name="iywd{{$law->id}}" id="iywd{{$law->id}}" value=""/>
                                                                        </td>
                                                                        <td>
                                                                            <select class="form-control" name="compliance_status{{$law->id}}" id="compliance_status{{$law->id}}">
                                                                                <option value="">Select</option>
                                                                                <option value="YES">YES</option>
                                                                                <option value="NO">NO</option>
                                                                                <option value="INFO_ONLY">INFO ONLY</option>
                                                                            </select>
                                                                        </td>
                                                                        <td>
                                                                            <div class="input-group">
                                                                                <input type="text" class="form-control" name="remarks{{$law->id}}" id="remarks{{$law->id}}" value=""/>
                                                                                <div class="input-group-append">
                                                                                    <span class="input-group-text">
                                                                                        <i class="now-ui-icons arrows-1_cloud-upload-94 file_icon" file_id="{{$law->id}}" style="cursor: pointer; font-size: 1.4em; font-weight: bold;"></i>
                                                                                        <input type="file"  name="file_remarks{{$law->id}}" id="file_remarks{{$law->id}}" style="display:none"/>
                                                                                    </span>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <input class="form-control" type="text" name="rpdhn{{$law->id}}" id="rpdhn{{$law->id}}" value=""/>
                                                                        </td>
                                                                        <td>
                                                                            <button law_id="{{$law->id}}" class="btn btn-primary btn-sm save" id="save{{$law->id}}">Save</button>
                                                                        </td>
                                                                    @endforelse
                                                                
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                            </div>
                                            @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
            </div>
        @else
            n/a
        @endif
        
    </div>
</div>

@endsection
@section('scripts')
<script>
    $(".act_menus").on('click', function() {
        $(".tab-pane").removeClass("active");
    });

    $(document).on('click', '.save', function(){

        var id = $(this).attr('law_id');
        var applicability = $('#applicability'+id).val();
        var iywd = $('#iywd'+id).val();
        var compliance_status = $('#compliance_status'+id).val();
        var remarks = $('#remarks'+id).val();
        var rpdhn = $('#rpdhn'+id).val();
        var file_remarks = $("#file_remarks"+id).prop("files")[0]; 
        
        var form_data = new FormData(); 
                form_data.append("law_id", id);
                form_data.append("applicability", applicability);
                form_data.append("iywd", iywd);
                form_data.append("compliance_status", compliance_status);
                form_data.append("remarks", remarks);
                form_data.append("rpdhn", rpdhn);
                form_data.append("file_remarks", file_remarks);
                form_data.append("_token", '{{csrf_token()}}');
    
       $.ajax({
            url :"/admin/client/questionnaire",
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            method: "post",
            beforeSend:function(){
                $('.save').attr('disabled', true);
            },
            success:function(data){
                $('.save').attr('disabled', false);
                location.reload();
            }
      })
    });

    $(document).on('click', '.file_icon', function(){
        var id = $(this).attr('file_id');
        $('#file_remarks'+id).trigger('click');
       
    });

</script>
@endsection