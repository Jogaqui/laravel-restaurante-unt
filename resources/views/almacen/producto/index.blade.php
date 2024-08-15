@extends('almacen.plantillaA')

@section('titulo', 'Productos')

@section('contenido')
    <div class="container">
        <h3 class="mb-4" style="text-align: center">LISTADO DE PRODUCTOS</h3>

        <!-- Botón Nuevo -->
        <div class="row">
            <!-- Botón Nuevo -->
            <div class="col-md-4 text-md-left mb-3 mb-md-0">
                <a href="{{ route('productoA.create') }}" class="btn btn-warning"><i class="fas fa-user"></i> Nuevo Producto</a>
            </div>

            <!-- Búsqueda por descripción -->
            <div class="col-md-4 text-md-center mb-3 mb-md-0">
                <form class="form-inline" method="GET">
                    <div class="input-group">
                        <input name="buscarporD" class="form-control" type="search" placeholder="Búsqueda por descripción" value="{{ $buscarPr }}">
                        <div class="input-group-append">
                            <button class="btn btn-success" type="submit">Buscar</button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Botón Descargar PDF -->
            <div class="col-md-4 text-md-right">
                <a href="{{route ('reporte.ProductosA')}}" class="btn btn-primary">
                    <i class="fas fa-file-pdf"></i> Descargar PDF
                </a>
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
                    <th scope="col">ID</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Precio (S/.)</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @if (count($productoA) <= 0)
                    <tr>
                        <td colspan="5" class="text-center">No hay registros</td>
                    </tr>
                @else
                    @foreach ($productoA as $itemproductoA)
                        <tr class="text-center">
                            <td>{{ $itemproductoA->idProducto }}</td>
                            <td>{{ $itemproductoA->descripcion }}</td>
                            <td>{{ $itemproductoA->precio }}</td>
                            <td>{{ $itemproductoA->stock }}</td>
                            <td>
                                <a href="{{ route('productoA.vreducirInsumo', $itemproductoA->idProducto) }}"
                                    class="btn btn-warning btn-sm"><i class="fas fa-green"></i>Insumos</a>
                                <a href="{{ route('productoA.edit', $itemproductoA->idProducto) }}"
                                    class="btn btn-info btn-sm"><i class="fas fa-edit"></i>Editar</a>
                                <a href="{{ route('productoA.confirmar', $itemproductoA->idProducto) }}"
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
                @if ($productoA->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link">&laquo;</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $productoT->previousPageUrl() }}" rel="prev">&laquo;</a>
                    </li>
                @endif

                {{-- Renderizar enlaces a páginas individuales --}}
                @foreach ($productoA->getUrlRange(1, $productoA->lastPage()) as $page => $url)
                    @if ($page == $productoA->currentPage())
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
                @if ($productoA->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $productoA->nextPageUrl() }}" rel="next">&raquo;</a>
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
