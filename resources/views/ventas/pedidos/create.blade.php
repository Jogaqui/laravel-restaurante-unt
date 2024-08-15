@extends('layout.plantilla')

@section('titulo', 'Crear Pedido')

@section('contenido')
    <div>
        <h1>Pedido Nuevo</h1>
        <form method="POST" action="{{ route('pedido.store') }}">
            @csrf
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label class="control-label">Cliente:</label>
                        <select name="idcliente" id="idcliente" class="form-control">
                            <option selected disabled>Elija un Cliente...</option>
                            @foreach ($cliente as $itemcliente)
                                <option value="{{ $itemcliente['idcliente'] }}">{{ $itemcliente['idcliente'] }} -
                                    {{ $itemcliente['nombres'] }}</option>
                            @endforeach
                            <option value="0"> -- NO REGISTRAR CLIENTE --</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Observaciones:</label>
                        <input class="form-control @error('observaciones') is-invalid @enderror" type="text"
                            placeholder="Ingrese Observaciones" id="observaciones" name="observaciones" maxlength="30" />
                        @error('observaciones')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="control-label">Medio de Pago:</label>
                        <select class="form-select @error('medioPago') is-invalid @enderror"
                            aria-label="Default select example" id="medioPago" name="medioPago">
                            <option selected disabled>ESCOGER UNO...</option>
                            <option value="Tarjeta">Tarjeta</option>
                            <option value="Efectivo">Efectivo</option>
                            <option value="Yape">Yape</option>
                            <option value="Paypal">Paypal</option>
                        </select>
                        @error('medioPago')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="control-label">Modalidad:</label>
                        <select class="form-select @error('modalidad') is-invalid @enderror"
                            aria-label="Default select example" id="modalidad" name="modalidad">
                            <option selected disabled>ESCOGER UNO...</option>
                            <option value="1">Local</option>
                            <option value="2">Delivery</option>
                        </select>
                        @error('modalidad')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="idproducto">Producto</label>
                        <select name="idproducto" id="idproducto" onchange="agregarProductos();">
                            <option value="">Seleccione un producto ...</option>
                            @foreach ($productos as $producto)
                                <option value="{{ $producto->idproducto }}">{{ $producto->descripcion }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="d-flex">
                        {{-- <button type="submit" class="btn btn-primary me-2" id="btnSubmit"><i class="fas fa-save"></i>
                            Grabar</button> --}}
                        <a href="{{ route('pedido.cancelar') }}" class="btn btn-danger"><i class="fas fa-ban"></i>
                            Cancelar</a>
                    </div>
                </div>
                <div class="col-8">
                    <div class="card">
                        <div class="row">
                            <div class="col-md-8 cart">
                                <div class="title">
                                    <div class="row">
                                        <div class="col">
                                            <h4><b>Carrito de compras</b></h4>
                                        </div>
                                        <div class="col align-self-center text-right text-muted">
                                            <span id="cantidadProductos_cart">0</span> items
                                        </div>
                                    </div>
                                </div>
                                <div id="productos-carrito"></div>
                            </div>
                            <div class="col-md-4 summary">
                                <div>
                                    <h5><b>Resumen</b></h5>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col" style="padding-left:0;">ITEMS <span
                                            id="cantidadProductos_resumen">0</span></div>
                                    <div class="col text-right">S/ <span id="precioProductos_resumen">0</span></div>
                                </div>
                                <p class="mt-3">Cupón de descuento</p>
                                <input id="code" placeholder="Enter your code">
                                <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                                    <div class="col">PRECIO TOTAL</div>
                                    <div class="col text-right">S/ <span id="precio_total">0</span></div>
                                </div>
                                <button class="btn">PAGAR</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('css')
    <style>
        body {
            background: #ddd;
            min-height: 100vh;
            vertical-align: middle;
            font-family: sans-serif;
            font-size: 0.8rem;
            font-weight: bold;
        }

        .title {
            margin-bottom: 5vh;
        }

        .card {
            margin: auto;
            max-width: 950px;
            width: 90%;
            box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            border-radius: 1rem;
            border: transparent;
        }

        @media(max-width:767px) {
            .card {
                margin: 3vh auto;
            }
        }

        .cart {
            background-color: #fff;
            padding: 4vh 5vh;
            border-bottom-left-radius: 1rem;
            border-top-left-radius: 1rem;
        }

        @media(max-width:767px) {
            .cart {
                padding: 4vh;
                border-bottom-left-radius: unset;
                border-top-right-radius: 1rem;
            }
        }

        .summary {
            background-color: #ddd;
            border-top-right-radius: 1rem;
            border-bottom-right-radius: 1rem;
            padding: 4vh;
            color: rgb(65, 65, 65);
        }

        @media(max-width:767px) {
            .summary {
                border-top-right-radius: unset;
                border-bottom-left-radius: 1rem;
            }
        }

        .summary .col-2 {
            padding: 0;
        }

        .summary .col-10 {
            padding: 0;
        }

        .row {
            margin: 0;
        }

        .title b {
            font-size: 1.5rem;
        }

        .main {
            margin: 0;
            padding: 2vh 0;
            width: 100%;
        }

        .col-2,
        .col {
            padding: 0 1vh;
        }

        a {
            padding: 0 1vh;
            text-decoration: none;
        }

        .close {
            margin-left: auto;
            font-size: 0.7rem;
        }

        img {
            width: 3.5rem;
        }

        .back-to-shop {
            margin-top: 4.5rem;
        }

        h5 {
            margin-top: 4vh;
        }

        hr {
            margin-top: 1.25rem;
        }

        form {
            padding: 2vh 0;
        }

        select {
            border: 1px solid rgba(0, 0, 0, 0.137);
            padding: 1.5vh 1vh;
            margin-bottom: 4vh;
            outline: none;
            width: 100%;
            background-color: rgb(247, 247, 247);
        }

        input {
            border: 1px solid rgba(0, 0, 0, 0.137);
            padding: 1vh;
            margin-bottom: 4vh;
            outline: none;
            width: 100%;
            background-color: rgb(247, 247, 247);
        }

        input:focus::-webkit-input-placeholder {
            color: transparent;
        }

        .btn {
            background-color: #000;
            border-color: #000;
            color: white;
            width: 100%;
            font-size: 0.7rem;
            margin-top: 4vh;
            padding: 1vh;
            border-radius: 0;
        }

        .btn:focus {
            box-shadow: none;
            outline: none;
            box-shadow: none;
            color: white;
            -webkit-box-shadow: none;
            -webkit-user-select: none;
            transition: none;
        }

        .btn:hover {
            color: white;
        }

        a {
            color: black;
        }

        a:hover {
            color: black;
            text-decoration: none;
        }

        #code {
            background-image: linear-gradient(to left, rgba(255, 255, 255, 0.253), rgba(255, 255, 255, 0.185)), url("https://img.icons8.com/small/16/000000/long-arrow-right.png");
            background-repeat: no-repeat;
            background-position-x: 95%;
            background-position-y: center;
        }
    </style>
@endsection

@section('script')
    <script>
        var index = 0;
        var idarticulos = [];
        var nombres = [];
        var precios = [];
        let cantidadProductos = 0;
        let precioProductos = 0;
        let validProduct = [];

        $('#btnSubmit').attr("disabled", true);

        function agregarProductos() {
            productoId = $('#idproducto').val();
            evaluar();
            $.get(`/api/productos/${productoId}`, function(data) {
                if (validProduct.includes(data.idproducto)) {
                    alert('¡El producto ya está seleccionado!');
                } else {
                    const fila = `
                    <div class="row border-top border-bottom" id="filaz${data.idproducto}">
                        <div class="row main align-items-center">
                            <div class="col-2"></div>
                            <div class="col">
                                <input type="hidden" name="idproductos[]" value="${data.idproducto}">
                                <div class="row">${data.descripcion}</div>
                            </div>
                            <div class="col">
                                <div class="d-flex align-items-center" style="margin-top: 30px;">
                                    <input type="number" name="cantidadproductos[]"
                                        id="cantidad-${data.idproducto}"
                                        class="form-control text-center" value="1"
                                        onchange="actualizarPrecioTotal();"
                                    >
                                </div>
                            </div>
                            <input type="hidden" name="preciosproductos[]" value="${data.precio}" id="precio-${data.idproducto}">
                            <div class="col">S/ <span id="precio-span-${data.idproducto}">${data.precio}</span> <button type="button" class="close" onclick="quitars(${data.idproducto}, ${data.precio})">&#10005;</button></div>
                        </div>
                    </div>
                `;
                    $('#productos-carrito').append(fila);
                    $('#cantidadProductos_cart').text(++cantidadProductos);
                    $('#cantidadProductos_resumen').text(cantidadProductos);


                    validProduct.push(data.idproducto);
                    updateTotals();
                    console.log(validProduct);
                }
            });
        }

        function actualizarPrecioTotal() {
            updateTotals();
        }

        function quitars(productoId) {
            $('#filaz' + productoId).remove();
            index--;

            $('#cantidadProductos_cart').text(--cantidadProductos);
            $('#cantidadProductos_resumen').text(cantidadProductos);
            console.log(validProduct);
            const indexToRemove = validProduct.indexOf(productoId);
            if (indexToRemove !== -1) {
                validProduct.splice(indexToRemove, 1);
            }
            console.log(validProduct);

            updateTotals();

            if (index == 0)
                $('#btnSubmit').attr("disabled", true);
            else
                $('#btnSubmit').attr("disabled", false);
        }

        function evaluar() {
            index++;
            if (index > 0)
                $('#btnSubmit').attr("disabled", false);
            else
                $('#btnSubmit').attr("disabled", true);
        }

        function updateTotals() {
            let subtotal = 0;

            $('input[name="cantidadproductos[]"]').each(function() {
                let quantity = Number($(this).val());
                let price = Number($(this).closest('.row').find('input[name="preciosproductos[]"]').val());
                let total = (quantity * price);
                subtotal += total;
            });

            $('#precioProductos_resumen').text(subtotal);
            $('#precio_total').text(subtotal);
        }
    </script>
@endsection
