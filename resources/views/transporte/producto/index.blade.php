@extends('transporte.plantillaT')

@section('titulo', 'Productos')

@section('contenido')
    <div class="container">
        <h3 class="mb-4" style="text-align: center">LISTADO DE PRODUCTOS</h3>

        <!-- Botón Nuevo -->
        <div class="row">
            <!-- Botón Nuevo -->
            <div class="col-md-4 text-md-left mb-3 mb-md-0">
                <a href="{{ route('productoT.create') }}" class="btn btn-warning"><i class="fas fa-user"></i> Nuevo Producto</a>
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

            {{-- <!-- Botón Descargar PDF -->
            <div class="col-md-4 text-md-right">
                <a href="{{ route('reporte.productosT') }}" class="btn btn-primary">
                    <i class="fas fa-file-pdf"></i> Descargar PDF
                </a>
            </div> --}}
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
                @if (count($productoT) <= 0)
                    <tr>
                        <td colspan="5" class="text-center">No hay registros</td>
                    </tr>
                @else
                    @foreach ($productoT as $itemproductoT)
                        <tr class="text-center">
                            <td>{{ $itemproductoT->idProducto }}</td>
                            <td>{{ $itemproductoT->descripcion }}</td>
                            <td>{{ $itemproductoT->precio }}</td>
                            <td>{{ $itemproductoT->stock }}</td>
                            <td>
                                <a href="{{ route('productoT.edit', $itemproductoT->idProducto) }}"
                                    class="btn btn-info btn-sm"><i class="fas fa-edit"></i>Editar</a>
                                <a href="{{ route('productoT.confirmar', $itemproductoT->idProducto) }}"
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
                @if ($productoT->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link">&laquo;</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $productoT->previousPageUrl() }}" rel="prev">&laquo;</a>
                    </li>
                @endif

                {{-- Renderizar enlaces a páginas individuales --}}
                @foreach ($productoT->getUrlRange(1, $productoT->lastPage()) as $page => $url)
                    @if ($page == $productoT->currentPage())
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
                @if ($productoT->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $productoT->nextPageUrl() }}" rel="next">&raquo;</a>
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
