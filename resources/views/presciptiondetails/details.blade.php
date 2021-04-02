@extends('templates.maincontainer')

@section('content')
    <div class="container pt-3">
        <h1>
            <i class="material-icons">library_books</i>Detalles de Receta
        </h1>
        <form method="post" action="{{url('app/prescription/.'$prescription->id'./prescriptiondetails/'.$prescriptiondetail->id.'/edit/process')}}">
            {{csrf_field()}}

        
            <div class="form-group">
                <label>Catidad de Insumo</label>
                <input required type="decimal" class="form-control" name="quantity" value="{{$prescriptiondetail->quantity}}">
            </div>
            
            <button type="submit" class="btn btn-success ">
                <i class="material-icons">done</i>
                Editar detalle de Receta
            </button>
            <a  href="{{ url('/') }}/app/prescriptions/{{$prescription->id}}/delete" class="btn btn-danger">
                <i class="material-icons">clear</i>
                Eliminar Detalle de Receta
            </a>
            <a  href="{{ url('/') }}/app/prescriptions/{{$prescription->id}}/delete" class="btn btn-danger">
                <i class="material-icons">clear</i>
                Agregar Detalle de Receta
            </a>
            
        </form>

    </div>

    
@stop