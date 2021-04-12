@extends('templates.maincontainer')

@section('content')

 <div class="box pl-3 pt-3 col-7">
        <div class="box-body">
            <h2 class="page-header">
                <i class="fa fa-list"></i> Detalles de Unidad de Medida<b></b>
            </h2>
            <form method="post" action="{{url('app/measureunits/'.$measureunit->id.'/edit/process')}}">
                {{csrf_field()}}


                <div class="form-group">
                    <label for="exampleInputEmail1">Nombre </label>
                    <input required type="text" class="form-control" name="name" value="{{$measureunit->name}}">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Descripión</label>
                    <input type="text" class="form-control" name="description"  value="{{$measureunit->description}}">
                </div>


                <button type="submit" class="btn btn-danger "><i class="fa fa-check"></i>Editar Unidad de Medida</button>
                <div class="row">
                    <div class="col-xs-12 pl-3 pt-3"><a  href="{{ url('/') }}/app/measureunits/{{$measureunit->id}}/delete" class="btn btn-warning"><i class="fa fa-edit"></i>Eliminar Unidad de Medida</a></div>
                </div>
            </form>

        </div>

    </div>



@stop