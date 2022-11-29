@extends('templates.maincontainer')

@section('content')
    <div class="container pt-3">
        <h1>
            <i class="material-icons">library_books</i>Detalles de la Compañia
        </h1>
        <form method="post" action="{{url('companys/store')}}">
            {{csrf_field()}}
            <input type="hidden" name="id" value="{{$company->id}}">
            <div class="form-group">
                <label>Nombre Compañia</label>
                <input type="text" class="form-control" name="name" value="{{$company->name}}" required>
            </div>
            <div class="form-group">
                <label>Rut</label>
                <input type="text" class="form-control" name="rut"  value="{{$company->rut}}">
            </div>
            <div class="form-group">
                <label>Razon Social</label>
                <input type="text" class="form-control" name="razon_social"  value="{{$company->razon_social}}">
            </div>
            <div class="form-group">
                <label>Giro</label>
                <input type="text" class="form-control" name="giro"  value="{{$company->giro}}">
            </div>
            <div class="form-row">
                <div class="form-group col-12 col-sm-6 mb-2">
                    <label class="mb-1">Región</label>
                    <select class="custom-select" name="region_id" id="region_select">
                        @foreach ($regions as $region)
                            <option value="{{$region->id}}"
                                @if($company->commune_id)
                                {{$company->commune->region_id == $region->id ? 'selected':''}}
                                @endif
                            >{{$region->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-12 col-sm-6 mb-2">
                    <label class="mb-1">Comuna</label>
                    <select class="custom-select" name="commune_id" id="commune_select">
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label>Dirección</label>
                <input type="text" class="form-control" name="direccion"  value="{{$company->direccion}}">
            </div>
            <div class="form-group">
                <label>Factura</label>
                <input type="text" class="form-control" name="api_key_openfactura"  value="{{$company->api_key_openfactura}}">
            </div>
            <button type="submit" class="btn btn-success ">
                <i class="material-icons">done</i>
                Editar Compañia
            </button>
            <a  href="{{ url('/') }}/app/companys/{{$company->id}}/delete" class="btn btn-danger">
                <i class="material-icons">clear</i>
                Eliminar Compañia
            </a>
        </form>
    </div>

    <script>
        var commune_id = {!! $company->commune_id !!};
        var communes = {!! json_encode($communes->toArray()) !!};
        region_select.onchange = comunaLoad;

        function comunaLoad() {
            var value = region_select.value;
            commune_select.innerHTML = '';
            communes.forEach(el => {
                if (el.region_id == value) {
                    var newoption = document.createElement('option');
                    newoption.value = el.id;
                    newoption.text = el.name;
                    if(commune_id==el.id){
                        newoption.selected = true;
                    }
                    commune_select.appendChild(newoption);
                }
            });
        }
        
        $(document).ready(function() {
            comunaLoad();
        });
    </script>
@stop