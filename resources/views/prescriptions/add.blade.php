@extends('templates.maincontainer')
<style>
    #Ingredientes select, #Ingredientes input{
        display: block;
        height: 38px;
        width: 100%;
        background: rgba(255,255,255,0);
        color:white;
        outline: none;
        border-top:2px solid rgb(39, 39, 39);
        border-left:2px solid rgb(39, 39, 39);
        border-bottom:2px solid grey;
        border-right:2px solid grey;

    }
    #Ingredientes select option{
        color:white!important;
        background: rgba(50,50,50,1);
    }    
    #Ingredientes td{
        padding:    0px;
        margin:     0px;
    }
    .unidad{
        text-align: center;
        vertical-align: middle!important;
    }
</style>
@section('content')
    <div class="container pt-3" id="app">        
        <h1>
            <i class="material-icons">add_box</i> Agregar Receta a <span value="{{ $product->id }}">{{ $product->name }}</span>
        </h1>
        <form method="post" action="{{url('products/'.$product->id.'/prescriptions/add/process')}}" id="form">
            {{csrf_field()}}
            <div class="form-group">
                <input required type="text" class="form-control" placeholder="Descripción" name="description" value="">
            </div>
            <table class="table table-sm table-dark ">
                <thead>
                    <tr>
                        <th>
                            Ingrediente
                        </th>
                        <th>
                            Cant.
                        </th>
                        <th>
                            Unid.
                        </th>
                        <th width="1">
                            Eliminar
                        </th>
                    </tr> 
                </thead>
                <tbody id="Ingredientes">

                </tbody>
            </table>
            <a onclick="AgregarItem()" class="btn btn-info">
                Agregar Ingrediente
            </a>
            <button type="submit" class="btn btn-danger"><i class="fa fa-check"></i>Guardar</button>
        </form>
    </div>
    <script>
        var Ingredientes = document.getElementById('Ingredientes');
        var items = {!! json_encode($items) !!};
        var measureunits = {!! json_encode($measureunits) !!};
        


        function AgregarItem(){
            var newtr = document.createElement('tr');
            
            var newtd = document.createElement('td');
            var newselect = document.createElement('select');
            newselect.classList.add('item');
            newselect.onchange = function(){
                var itemselect=Array.from(document.getElementsByClassName('item'));
                var unidades = document.getElementsByClassName('unidad');
                var index = itemselect.indexOf(this);
                var item = items.find(e => e.id==this.value);
                var unidad = measureunits.find(e => e.id == item.measureunit_id);
                unidades[index].innerHTML=unidad.name;
            }            
            var newoption = document.createElement('option');
            newoption.value = null;
            newoption.text = 'Seleccione Ingediente';
            newselect.appendChild(newoption);

            items.forEach(item => {
                newoption = document.createElement('option');
                newoption.value = item.id;
                newoption.text = item.name;
                newselect.appendChild(newoption);
            });
            newtd.appendChild(newselect);
            newtr.appendChild(newtd);

            //--------------//
            newtd = document.createElement('td');
            var newnumber = document.createElement('input');
            newnumber.type='number';
            newtd.appendChild(newnumber);
            newtr.appendChild(newtd);
            //--------------//
            newtd = document.createElement('td');
            newtd.innerHTML='unidad';
            newtd.classList.add('unidad');
            newtr.appendChild(newtd);
            //--------------//
            newtd = document.createElement('td');
            
            var newbutton = document.createElement('a');
            newbutton.classList.add('btn');
            newbutton.classList.add('btn-danger');
            newbutton.classList.add('eliminar');
            newbutton.classList.add('material-icons');
            newbutton.innerHTML='close';

            newbutton.onclick = function(){
                var eliminarselect=Array.from(document.getElementsByClassName('eliminar'));
                var index = eliminarselect.indexOf(this);
                var fila = Ingredientes.children[index];
                fila.style.display = 'none'                
                //.remove();
            }

            var newhidden = document.createElement('input');
            newhidden.type='hidden';
            newhidden.name='id[]';
            newhidden.classList.add('id');
            newhidden.value=0;
            newtd.appendChild(newhidden);

            newtd.appendChild(newbutton);
            newtr.appendChild(newtd);
            Ingredientes.appendChild(newtr);
        }
    </script>
 @stop