@extends('templates.maincontainer')

@section('content')

 <div class="pl-3 pt-3 ">
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
                
                <div class="form-group has-feedback">
                 <input required type="decimal" class="form-control" placeholder="Advertencia" name="warning" value="{{$item->warning}}">
                   <span class="fa fa-id-card form-control-feedback"></span>
                </div> 

                 <div class="form-group has-feedback">
                    <input required type="decimal" class="form-control" placeholder="Alerta" name="alert" value="{{$item->alert}}">
                    <span class="fa fa-id-card form-control-feedback"></span>
              </div> 

                <label for="measureunit_id">Unidad de Media:</label>
        <select class="form-select" name="measureunit_id" id="measureunit_id">
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