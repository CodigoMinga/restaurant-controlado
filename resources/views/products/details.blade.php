@extends('templates.maincontainer')

@section('content')

    <div class="box pl-3 pt-3">
        <div class="box-body">
            <h2 class="page-header">
                <i class="fa fa-list"></i> Detalles del Producto<b></b>
            </h2>
            <form method="post" action="{{url('app/products/'.$product->id.'/edit/process')}}">
                {{csrf_field()}}


                <div class="form-group">
                    <label for="exampleInputEmail1">Nombre Producto</label>
                    <input required type="text" class="form-control" name="name" value="{{$product->name}}">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Descripción</label>
                    <input type="text" class="form-control" name="description"  value="{{$product->description}}">
                </div>


                <button type="submit" class="btn btn-danger "><i class="fa fa-check"></i>Editar Producto</button>
                <div class="row">
                    <div class="col-xs-12 pl-3 pt-3"><a  href="{{ url('/') }}/app/products/{{$product->id}}/delete" class="btn btn-warning"><i class="fa fa-edit"></i>Eliminar Producto</a></div>
                </div>
            </form>

        </div>

    </div>



@stop