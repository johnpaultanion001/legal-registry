@extends('layouts.admin1')
@section('content')
    
<div class="card">
    <div class="card-header bg-white">
        <ul class="nav nav-tabs justify-content-center" role="tablist">
            @foreach(auth()->user()->client->industries()->get() as $industry)
                <li class="nav-item ">
                    <a class="nav-link {{ request()->is('admin/client/legal_compliance_laws/'.$industry->type_of_industry->id) ? 'active' : '' }}" href="/admin/client/legal_compliance_laws/{{$industry->type_of_industry->id}}">
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
                                        <div class="row justify-content-center">
                                            <iframe src="/assets/pdf/{{$act->type_of_trade_act->file}}#zoom=135" width="100%" height="900">
                                            </iframe>
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
</script>
@endsection