@extends('templates.maincontainer')

@section('content')
    <div class="d-flex flex-column h-100">
        <div class="p-3 pl-4">
            <h1><i class="material-icons">layers</i> Selectores</h1>
        </div>
        <div class="scrollselection p-4">
            @foreach ($tables as $table)
                <div class="mesa">
                    @if($table->ordertype_id==1)
                    <img src="{{url('/img/icons/mesa.svg')}}" alt="">   
                    @elseif($table->ordertype_id==2)
                    <img src="{{url('/img/icons/delivery.svg')}}" alt="">                    
                    @else
                    <img src="{{url('/img/icons/store.svg')}}" alt="">   
                    @endif
                    <span>{{$table->name}}</span>
                </div>
            @endforeach
        </div>
    </div>
@stop