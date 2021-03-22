@extends('templates.maincontainer')

@section('content')

 <div class="box pl-3 pt-3 col-7">
        <div class="box-body">
            <h2 class="page-header">
                <i class="fa fa-list"></i> Detalles de Insumos<b></b>
            </h2>
            <form method="post" action="{{url('app/items/'.$item->id.'/edit/process')}}">
                {{csrf_field()}}


                <div class="form-group">
                    <label for="exampleInputEmail1">Nombre </label>
                    <input required type="text" class="form-control" name="name" value="{{$item->name}}">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Descripión</label>
                    <input required type="text" class="form-control" name="description"  value="{{$item->description}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Stock</label>
                    <input required type="decimal" class="form-control" name="stock"  value="{{$item->stock}}">
                </div>


                <label for="measureunit_id">Unidad de Media:</label>
        <select name="measureunit_id" id="measureunit_id">
            @forelse($measureunits as $measureunit)
            <option value="{{ $measureunit->id }}">{{ $measureunit->name }}</option>
            @empty
            <li>Aun no hay unidades de medida</li>
            @endforelse
        </select>

                <br>
                <button type="submit" class="btn btn-danger "><i class="fa fa-check"></i>Editar Insumo</button>
                <div class="row">
                    <div class="col-xs-12 pl-3 pt-3"><a  href="{{ url('/') }}/app/items/{{$item->id}}/delete" class="btn btn-warning"><i class="fa fa-edit"></i>Eliminar Insumo</a></div>
                </div>
            </form>

        </div>

    </div>



@stop