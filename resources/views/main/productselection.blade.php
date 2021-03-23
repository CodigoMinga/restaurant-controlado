@extends('templates.maincontainer')

@section('info')
    <div>
        <h6>{{$table->name}}</h6>
        <h6>{{$order ? $order->Total : 0}}</h6>
    </div>    
@endsection

@section('content')
    <div class="d-flex flex-column h-100">
        <div class="p-4">
            <h1><i class="material-icons">bookmarks</i> Categorias</h1>
        </div>
        <div class="d-flex flex-row justify-content-around flex-wrap p-4" id="categoria-container">
            @foreach ($producttypes as $producttype)
                <div class="categoria">
                    {{$producttype->name}}
                </div>
            @endforeach
        </div>
        <div class="d-flex flex-row justify-content-between p-4 flex-wrap">
            <h1><i class="material-icons">fastfood</i> Productos</h1>
            <div class="cm-form-icon">
                <input type="text">
                <i class="material-icons">search</i>
            </div>
        </div>
        <div class="d-flex flex-row justify-content-around flex-wrap p-4" id="producto-container">
            @foreach ($producttypes as $producttype)
                @foreach ($producttype->product as $product)
                <div class="producto" obj="{{$product}}">
                    <div class="informacion">
                        <div class="nombre">{{$product->name}}</div>
                        <div class="precio">${{$product->price}}</div>
                    </div>
                    <img src="{{url('/img/sushi.jpg')}}" alt="">
                </div>
                @endforeach
            @endforeach
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="protuct-modal" tabindex="-1" data-backdrop="static" aria-labelledby="ModalLabel" aria-hidden="true" aria-labelledby="staticBackdropLabel">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark">
            <form id="productattach-form" method="POST" action="{{url('/')}}/productattach">
                {{csrf_field()}}
                <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">...</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name='table_id' value={{$table->id}}>
                    <input type="hidden" name='product_id' value=0 id="product_id">
                    <input type="hidden" name='product_name' value='' id="product_name">
                    <input type="number" min=1 name='quantity' required>
                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-success" id="a-orden">Agregar</button>
                <button type="submit" class="btn btn-primary" id="continuar">Agregar y Continuar</button>
                </div>
            </form>
        </div>
        </div>
    </div>
    <script>
        var productattachForm = document.getElementById('productattach-form');
        $(document).ready(function(){
            $('.producto').click(function(){
                var product = JSON.parse($(this).attr( "obj" ));
                $('#ModalLabel').html(product.name);
                $('#product_id').val(product.id);
                $('#product_name').val(product.name);
                $('#protuct-modal').modal('show');
            });

            $('#productattach-form').on('submit', function(e){
                e.preventDefault();
                var formData = new FormData(productattachForm);
                var activate = document.activeElement.id;
                $.ajax({
                    url: "{{url('/')}}/productattach",
                    type: "POST",
                    data: formData,
                    processData: false,  // tell jQuery not to process the data
                    contentType: false   // tell jQuery not to set contentType
                }).done(function( data ) {
                    console.log(data);
                    if(typeof(data)=='object'){
                        if(data.id){
                            if(activate=="a-orden"){
                                window.location.href = "{{url('/')}}/orderdetails/" + data.id;
                            }else{
                                $('#toast-agregar .toast-body').eq(0).html(formData.get('product_name'));
                                $('#toast-agregar').toast('show');
                            }
                        }
                        $('#protuct-modal').modal('hide');
                    }else{
                        alert(data);
                    }
                }).fail(function() {
                    alert( "error al recibir respuesta del servidor" );
                });
            });
        });
    </script>
@stop