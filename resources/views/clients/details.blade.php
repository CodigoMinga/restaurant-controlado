@extends('templates.maincontainer')

@section('content')
    <div class="container pt-3">
        <h1>
            <i class="material-icons">library_books</i>Detalles del Cliente
        </h1>
        <form method="post" action="{{url('app/clients/'.$client->id.'/edit/process')}}">
            {{csrf_field()}}               
            @if(count(Auth::user()->companies)>1)
            <div class="form-group">
                <label for="company_id">Restoran:</label>
                <select name="company_id" id="company_id" class="form-control">
                    @foreach(Auth::user()->companies as $company)
                    <option value="{{ $company->id }}">{{$company->name}}</option>
                    @endforeach
                </select>
            </div>
            @else
            <input type="hidden" name="company_id" value="{{Auth::user()->companies[0]->id}}">
            @endif
            <div class="form-group">
                <label>Nombre Cliente</label>
                <input required type="text" class="form-control" name="name" value="{{$client->name}}">
            </div>
            <div class="form-group">
                <label>Dirección</label>
                <input type="text" class="form-control" name="address"  value="{{$client->address}}">
            </div>
            <div class="form-group">
                <label>Teléfono</label>
                <input type="text" class="form-control" name="phone"  value="{{$client->phone}}">
            </div>
            <div class="form-group">
                <label for="region_id">Region:</label>
                <select name="region_id" id="region_id" class="form-control">

                </select>
            </div>
            <div class="form-group">
                <label for="commune_id">Comuna:</label>
                <select name="commune_id" id="commune_id" class="form-control">

                </select>
            </div>

            <button type="submit" class="btn btn-success ">
                <i class="material-icons">done</i>
                Editar Cliente
            </button>
            <a  href="{{ url('/') }}/app/clients/{{$client->id}}/delete" class="btn btn-danger">
                <i class="material-icons">clear</i>
                Eliminar Cliente
            </a>
        </form>

    </div>
    <script>
        //PASO ELEMENTOS DE HTML A VARIABLES
        var region = document.getElementById('region_id');
        var comuna = document.getElementById('commune_id');
        
        //DESDE EL CONTROLADOS TOMO LAS COLECCIONES DE REGIONES Y COMUNAS Y LAS PASO A VARIABLES
        var region_list = {!! json_encode($regions->toArray()) !!};
        var comuna_list = {!! json_encode($communes->toArray()) !!};

        //LLAMO FUNCION REGIONLOAD()
        regionLoad();
        //ASINGNO UN VALOR BASE AL SELECTOR DE REGION
        region.value = 7;
        //UNA VEZ SELECCIONADO EL VALOR BASE DE REGION CARGO LAS COMUNAS
        comunaLoad();

        //FINCION REGIONLOAD
        function regionLoad() {
            //POR CADA REGION
            region_list.forEach(el => {
                //CREO UNA OPCION
                var newoption = document.createElement('option');
                //ASIGNO UN VALOR A LA OPCION
                newoption.value = el.id;
                //ASIGNO UN TEXTO A LA OPCION
                newoption.text = el.name;
                //AGREGO LA OPCION AL SELECTOR REGION
                region.appendChild(newoption);
            });
        }

        //AL SELECTOR REGION CUANDO CAMBIE (ONCHANGE) USO LA FUNCION COMUNALOAD
        region.onchange = comunaLoad;

        //FUNCION COMUNALOAD
        function comunaLoad() {
            //TOMO EL VALOR (region->id) DEL SELECTOR DE REGIONES 
            var value = region.value;
            //ELIMINO TODAS LAS OPCIONES EN CASO DE CAMBIAR
            comuna.innerHTML = '';
            //POR CADA COMUNA(TODAS) EJECUTO LA SIGUENTE FUNCION
            comuna_list.forEach(el => {
                //SI EL region_id ES IGUAL AL VALOR DEL SELECTOR DE COMUNA AGREGO LA COMUNA AL SLECTOR DE COMUNA
                if (el.region_id == value) {
                    //CREO UNA OPCION
                    var newoption = document.createElement('option');
                    //A LA OPCION LE DOI UN VALOR (commune->id)
                    newoption.value = el.id;
                    //A LA OPCION LE DOI UN TEXTO (commune->name)
                    newoption.text = el.name;
                    //AGREGO LA OPCION AL SELECTOR DE COMUNAS
                    comuna.appendChild(newoption);
                }
            });
        }
    </script>
@stop