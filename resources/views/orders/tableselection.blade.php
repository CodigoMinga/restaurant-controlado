@extends('templates.maincontainer')
<style>
    .nav-pills{

    }

</style>
@section('content')
    <div class="d-flex flex-column h-100">
        <div class="p-3 pl-4">
            <h1><i class="material-icons">layers</i> Selectores</h1>
        </div>
        <ul class="nav nav-pills mb-3 pl-4 pr-4 justify-content-around" id="pills-tab" role="tablist">
            @foreach ($tabletypes as $tabletype)
                @if(count($tabletype->tables)>0)
                <li class="nav-item" role="presentation">
                    <a class="my-tab {{ $loop->index==0 ? 'active' : '' }}" data-toggle="pill" href="#pills-{{$tabletype->id}}" role="tab"  aria-selected="{{ $loop->index==0 ? 'true' : 'false' }}">
                        <img src="{{url('/img/icons/'.$tabletype->name.'.svg')}}" width="30" style="margin-right:8px">
                        {{$tabletype->name}}
                    </a>
                </li>
                @endif
            @endforeach
        </ul>
        <div class="tab-content scrollselection pl-4 pr-4" id="pills-tabContent">            
            @foreach ($tabletypes as $tabletype)
                @if(count($tabletype->tables)>0)
                <div class="tab-pane fade {{ $loop->index==0 ? 'show active' : '' }}" id="pills-{{$tabletype->id}}" role="tabpanel" aria-labelledby="pills-{{$tabletype->id}}-tab">
                    <div class="w-100 d-flex justify-content-around flex-wrap">
                        @foreach ($tabletype->tables as $table)
                            <a class="mesa" href="{{url('/')}}/tables/{{$table->id}}/orders">
                                <img src="{{url('/img/icons/'.$tabletype->name.'.svg')}}">
                                <div>{{$table->name}}</div>
                                @if($table->hasOrder())
                                    <span class="material-icons ocupada">receipt_long</span>
                                @endif
                            </a>
                        @endforeach
                    </div>
                </div>
                @endif
            @endforeach
        </div>
    </div>
@stop