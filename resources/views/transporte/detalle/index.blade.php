@extends('transporte.plantillaT')

@section('titulo', 'Detalle Pedidos')

@section('contenido')
    <div class="container">
        <h3 class="mb-4">LISTADO DE DETALLE DE PEDIDOS POR DELIVERY</h3>

        @if (auth()->user()->rol == 'administrador')
            <div class="d-inline-block mb-3">
                <a href="{{ route('detalleT.create') }}" class="btn btn-warning"><i class="fas fa-plus"></i> Nuevo Registro</a>
            </div>
            <!-- Botón Descargar PDF -->
            <div class="d-inline-block mb-3">
                <a href="{{ route('reporte.pedidosDetalleT') }}" class="btn btn-primary">
                    <i class="fas fa-file-pdf"></i> Descargar PDF
                </a>
            </div>
        @endif
        <!-- Búsqueda por ID -->
        <form class="form-inline my-2 float-right" method="GET">
            <div class="input-group">
                <input name="buscarporDet" class="form-control" type="search" placeholder="Búsqueda por ID"
                    value="{{ $buscarporDet }}">
                <div class="input-group-append">
                    <button class="btn btn-success" type="submit">Buscar</button>
                </div>
            </div>
        </form>

        @if (session('datos'))
            <div class="alert alert-warning alert-dismissible fade show mt-4" role="alert">
                {{ session('datos') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <table class="table table-bordered table-hover mt-4">
            <thead class="thead-light">
                <tr class="text-center">
                    <th scope="col">ID Detalle Pedido</th>
                    <th scope="col">ID Pedido</th>
                    <th scope="col">Nombre del cliente</th>
                    <th scope="col">Domicilio del cliente</th>
                    <th scope="col">Repartidor</th>
                    <th scope="col">fecha del Pedido</th>
                    <th scope="col">Modo de Pago</th>
                    <th scope="col">Total a pagar</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @if (count($detalleT) <= 0)
                    <tr>
                        <td colspan="4" class="text-center">No hay registros</td>
                    </tr>
                @else
                    @foreach ($detalleT as $itemDetalleT)
                        <tr class="text-center">
                            <td>{{ $itemDetalleT->idDetalleP }}</td>
                            <td>{{ $itemDetalleT->pedido->idPedido }}</td>
                            <td>{{ $itemDetalleT->pedido->cliente->nombre }}</td>
                            <td>{{ $itemDetalleT->pedido->cliente->direccion }}</td>
                            <td>{{ $itemDetalleT->repartidor->nombres }}-{{ $itemDetalleT->repartidor->telefono }} </td>
                            <td>{{ $itemDetalleT->fechaPedido }}</td>
                            <td>{{ $itemDetalleT->modoPago }}</td>
                            <td>
                                @php
                                    $precioProducto = $itemDetalleT->pedido->producto->precio;
                                    $cantidadProducto = $itemDetalleT->pedido->cantidad;
                                    $totalPagar = $precioProducto * $cantidadProducto;
                                @endphp
                                {{ $totalPagar }}
                            </td>

                            <td>
                                <a href="{{ route('detalleT.edit', $itemDetalleT->idDetalleP) }}"
                                    class="btn btn-info btn-sm"><i class="fas fa-edit"></i>Editar</a>
                                <a href="{{ route('detalleT.confirmar', $itemDetalleT->idDetalleP) }}"
                                    class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>Eliminar</a>
                            </td>
                        </tr>
                    @endforeach

                @endif
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            <ul class="pagination">
                {{-- Renderizar enlaces a páginas previas y siguientes --}}
                @if ($detalleT->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link">&laquo;</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $detalleT->previousPageUrl() }}" rel="prev">&laquo;</a>
                    </li>
                @endif

                {{-- Renderizar enlaces a páginas individuales --}}
                @foreach ($detalleT->getUrlRange(1, $detalleT->lastPage()) as $page => $url)
                    @if ($page == $detalleT->currentPage())
                        <li class="page-item active" aria-current="page">
                            <span class="page-link">{{ $page }}</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach

                {{-- Renderizar enlaces a páginas previas y siguientes --}}
                @if ($detalleT->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $detalleT->nextPageUrl() }}" rel="next">&raquo;</a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <span class="page-link">&raquo;</span>
                    </li>
                @endif
            </ul>
        </div>

    </div>
@endsection

@section('script')
    <script>
        setTimeout(function() {
            document.querySelector('#mensaje').remove();
        }, 2000);
    </script>
@endsection
