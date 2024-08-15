@extends('transporte.plantillaT')

@section('titulo', 'Crear Pedido')

@section('contenido')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <h1 class="mb-4">Pedido Nuevo</h1>
                <form method="POST" action="{{ route('detalleT.store') }}" class="mb-4">
                    @csrf
                    <div class="form-group">
                        <label for="idPedido" class="control-label">ID PEDIDO:</label>
                        <select name="idPedido" id="idPedido" class="form-control">
                            <option selected disabled>Elija un Pedido...</option>
                            @foreach ($pedidosConClientes as $pedido)
                                <option value="{{ $pedido['idPedido'] }}">
                                    {{ $pedido['idPedido'] }} - {{ $pedido->cliente->nombre }} -
                                    {{ $pedido->cliente->direccion }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="idRepartidor" class="control-label">Repartidor:</label>
                        <select name="idRepartidor" id="idRepartidor" class="form-control">
                            <option selected disabled>Elija un Repartidor...</option>
                            @foreach ($repartidorT as $itemrepartidorT)
                                <option value="{{ $itemrepartidorT['idRepartidor'] }}">
                                    {{ $itemrepartidorT['idRepartidor'] }} - {{ $itemrepartidorT['nombres'] }} -
                                    {{ $itemrepartidorT['placa'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="fechaPedido" class="control-label">Fecha de Pedido:</label>
                        <input class="form-control @error('fechaPedido') is-invalid @enderror" type="date" id="fechaPedido"
                            name="fechaPedido" />
                        @error('fechaPedido')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="modoPago" class="control-label">Modo de Pago:</label>
                        <select class="form-control @error('modoPago') is-invalid @enderror" id="modoPago" name="modoPago"
                            required>
                            <option value="">Seleccionar modo de pago</option>
                            <option value="Transferencia">Transferencia</option>
                            <option value="PLIN">PLIN</option>
                            <option value="YAPE">YAPE</option>
                            <option value="EFECTIVO">EFECTIVO</option>
                            <!-- Agrega aquí más opciones según tus necesidades -->
                        </select>
                        @error('modoPago')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Grabar</button>
                        <a href="{{ route('detalleT.cancelar') }}" class="btn btn-danger"><i class="fas fa-ban"></i>
                            Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
