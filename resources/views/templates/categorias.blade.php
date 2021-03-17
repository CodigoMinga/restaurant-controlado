@extends('templates.maincontainer')

@section('content')
    <div class="d-flex flex-column h-100">
        <div class="p-4">
            <h1><i class="material-icons">bookmarks</i> Categorias</h1>
        </div>
        <div class="d-flex flex-row justify-content-around flex-wrap p-4" id="categoria-container">
            @for ($i = 0; $i < 50; $i++)
            <div class="categoria">
                Categoria {{$i}}
            </div>
            @endfor
        </div>
        <div class="d-flex flex-row justify-content-between p-4 flex-wrap">
            <h1><i class="material-icons">fastfood</i> Productos</h1>
            <div class="cm-form-icon">
                <input type="text">
                <i class="material-icons">search</i>
            </div>
        </div>
        <div class="d-flex flex-row justify-content-around flex-wrap p-4" id="producto-container">
            @for ($i = 0; $i < 50; $i++)
            <div class="producto">
                <div class="informacion">
                    <div class="nombre">Producto {{$i}}</div>
                    <div class="precio">$5.000</div>
                </div>
                <img src="{{url('/img/sushi.jpg')}}" alt="">
            </div>
            @endfor
        </div>
    </div>
@stop