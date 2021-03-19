@extends('templates.maincontainer')

@section('content')

 <div class="box pl-3 pt-3 col-7">
        <div class="box-body">
            <h2 class="page-header">
                <i class="fa fa-list"></i> Detalles del Categoria<b></b>
            </h2>
            <form method="post" action="{{url('app/producttypes/'.$producttype->id.'/edit/process')}}">
                {{csrf_field()}}


                <div class="form-group">
                    <label for="exampleInputEmail1">Nombre </label>
                    <input required type="text" class="form-control" name="name" value="{{$producttype->name}}">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Descripión</label>
                    <input type="text" class="form-control" name="description"  value="{{$producttype->description}}">
                </div>


                <button type="submit" class="btn btn-danger "><i class="fa fa-check"></i>Editar Categoria</button>
                <div class="row">
                    <div class="col-xs-12 pl-3 pt-3"><a  href="{{ url('/') }}/app/producttypes/{{$producttype->id}}/delete" class="btn btn-warning"><i class="fa fa-edit"></i>Eliminar Categoria</a></div>
                </div>
            </form>

        </div>

    </div>



@stop