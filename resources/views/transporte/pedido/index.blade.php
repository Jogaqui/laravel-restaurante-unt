@extends('transporte.plantillaT')

@section('titulo', 'Pedidos')

@section('contenido')
    <div class="container">
        <h3 class="mb-4">LISTADO DE PEDIDOS POR DELIVERY</h3>


        @if (auth()->user()->rol == 'administrador')
            <div class="d-inline-block mb-3">
                <a href="{{ route('pedidoT.create') }}" class="btn btn-warning"><i class="fas fa-plus"></i> Nuevo Pedido</a>
            </div>
            <!-- Botón Descargar PDF -->
            <div class="d-inline-block mb-3">
                <a href="{{ route('reporte.pedidosT') }}" class="btn btn-primary">
                    <i class="fas fa-file-pdf"></i> Descargar PDF
                </a>
            </div>
        @endif

        <!-- Búsqueda por ID -->
        <form class="form-inline my-2 float-right" method="GET">
            <div class="input-group">
                <input name="buscarporDe" class="form-control" type="search" placeholder="Búsqueda por ID"
                    value="{{ $buscarporDe }}">
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
                    <th scope="col">ID Pedido</th>
                    <th scope="col">Nombre Cliente</th>
                    <th scope="col">Nombre del producto</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @if (count($pedidoT) <= 0)
                    <tr>
                        <td colspan="4" class="text-center">No hay registros</td>
                    </tr>
                @else
                    @foreach ($pedidoT as $itemPedidoT)
                        <tr class="text-center">
                            <td>{{ $itemPedidoT->idPedido }}</td>
                            <td>{{ $itemPedidoT->cliente->nombre }}</td>
                            <td>{{ $itemPedidoT->producto->descripcion }}</td>
                            <td>{{ $itemPedidoT->cantidad }}</td>
                            <td>
                                <a href="{{ route('pedidoT.edit', $itemPedidoT->idPedido) }}" class="btn btn-info btn-sm"><i
                                        class="fas fa-edit"></i>Editar</a>
                                <a href="{{ route('pedidoT.confirmar', $itemPedidoT->idPedido) }}"
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
                @if ($pedidoT->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link">&laquo;</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $pedidoT->previousPageUrl() }}" rel="prev">&laquo;</a>
                    </li>
                @endif

                {{-- Renderizar enlaces a páginas individuales --}}
                @foreach ($pedidoT->getUrlRange(1, $pedidoT->lastPage()) as $page => $url)
                    @if ($page == $pedidoT->currentPage())
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
                @if ($pedidoT->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $pedidoT->nextPageUrl() }}" rel="next">&raquo;</a>
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
