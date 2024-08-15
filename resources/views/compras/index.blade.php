@extends('compras.plantillaC')

@section('titulo', 'Compras')

@section('contenido')
    <div class="container">
        <h3 class="mb-4" style="text-align: center">LISTADO DE COMPRAS</h3>

        <!-- Botón Nuevo -->
        <div class="row">
            <!-- Botón Nuevo -->
            <div class="col-md-4 text-md-left mb-3 mb-md-0">
                <a href="{{ route('compras.register.show') }}" class="btn btn-warning"><i class="fas fa-user"></i> Nueva
                    Compra</a>
            </div>

            <!-- Búsqueda por descripción -->
            <div class="col-md-4 text-md-center mb-3 mb-md-0">
                <form class="form-inline" method="GET">
                    <div class="input-group">
                        <input name="buscarporD" class="form-control" type="search" placeholder="Búsqueda por nombre">
                        <div class="input-group-append">
                            <button class="btn btn-success" type="submit">Buscar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

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
                    <th scope="col">#</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Comprobante</th>
                    <th scope="col">Proveedor</th>
                    <th scope="col">Impuesto</th>
                    <th scope="col">Total</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @if (count($compras) <= 0)
                    <tr>
                        <td colspan="8" class="text-center">No hay registros</td>
                    </tr>
                @else
                    @foreach ($compras as $compra)
                        <tr class="text-center">
                            <td>{{ $compra->compra_id }}</td>
                            <td>{{ $compra->fecha }}</td>
                            <td>{{ $compra->serie_comprobante }}-{{ $compra->num_comprobante }}</td>
                            <td>{{ $compra->razon_social }}</td>
                            <td>{{ $compra->impuesto }}</td>
                            <td>{{ $compra->total }}</td>
                            <td>{{ $compra->estado }}</td>
                            <td>
                                <a href="{{ route('compras.show', $compra->compra_id) }}"
                                    class="btn btn-info btn-sm">Mostrar</a>
                                <a href="{{ route('reportes.compra', $compra->compra_id) }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-file-pdf"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            <ul class="pagination">
                {{-- Renderizar enlaces a páginas previas y siguientes --}}
                @if ($compras->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link">&laquo;</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $productoT->previousPageUrl() }}" rel="prev">&laquo;</a>
                    </li>
                @endif

                {{-- Renderizar enlaces a páginas individuales --}}
                @foreach ($compras->getUrlRange(1, $compras->lastPage()) as $page => $url)
                    @if ($page == $compras->currentPage())
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
                @if ($compras->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $compras->nextPageUrl() }}" rel="next">&raquo;</a>
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
