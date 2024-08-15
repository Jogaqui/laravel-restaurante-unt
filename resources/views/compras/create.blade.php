@extends('compras.plantillaC')

@section('titulo', '.:: Restaurant ::.')

@section('contenido')
    <div class="container">
        <div class="d-flex justify-content-center mb-4">
            <h1 class="card-title" style="font-size: 35px">Registrar compras</h1>
        </div>
        <form action="{{ route('compras.register') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-5">
                    <div class="card">
                        <div class="card-header">Datos</div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-8"></div>
                                    <div class="col-4">
                                        <label for="fecha">Fecha</label>
                                        <input type="date" class="form-control" name="fecha">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="fecha">Comprabante</label>
                                <div class="row">
                                    <div class="col-4">
                                        <select name="tipo_comprobante" class="form-control">
                                            <option value="">Seleccione ...</option>
                                            <option value="Boleta">Boleta</option>
                                            <option value="Factura">Factura</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <input type="text" class="form-control" name="serie_comprobante"
                                            placeholder="serie: FF01 F001">
                                    </div>
                                    <div class="col-4">
                                        <input type="text" class="form-control" name="num_comprobante"
                                            placeholder="número: 001">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="supplier">Proveedor</label>
                                <select name="idpersona" class="form-control" required>
                                    <option value="">Seleccione ...</option>
                                    @foreach ($proveedores as $proveedor)
                                        <option value="{{ $proveedor->id }}">{{ $proveedor->razon_social }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="products">Agregar Insumos</label>
                                <select name="idarticulo" id="select-idarticulo" class="form-control"
                                    onchange="addProductOrder();">
                                    <option value="">Insumo nuevo</option>
                                    @foreach ($insumos as $insumo)
                                        <option
                                            value="{{ $insumo->idInsumo }}_{{ $insumo->nombreIn }}_{{ $insumo->precioIn }}">
                                            {{ $insumo->nombreIn }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-7">
                    <div class="card">
                        <div class="card-header">Insumos</div>
                        <div class="card-body">
                            <table id="product_detail" class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center">Nombre</th>
                                        <th class="text-center">Precio</th>
                                        <th class="text-center">Cantidad</th>
                                        <th class="text-center"></th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-outline-success btn-round"
                                id="btnSubmit">Registrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/product_add.js') }}"></script>
@endsection
