@extends('transporte.plantillaT')

@section('titulo', 'Clientes')

@section('contenido')

    <div class="container">
        <h3 class="mb-4">LISTADO CLIENTES PARA DELIVERY</h3>

        <!-- Botón Nuevo -->
        <div class="d-inline-block mb-3">
            <a href="{{ route('clienteT.create') }}" class="btn btn-warning"><i class="fas fa-plus"></i> Nuevo Cliente</a>
        </div>
        <!-- Botón Descargar PDF -->
        <div class="d-inline-block mb-3">
            <a href="{{ route('reporte.clientesT') }}" class="btn btn-primary">
                <i class="fas fa-file-pdf"></i> Descargar PDF
            </a>
        </div>
        <!-- Barra de búsqueda -->
        <form class="form-inline float-right mb-3" method="GET">
            <div class="input-group">
                <input name="buscarpor" class="form-control" type="search" placeholder="Búsqueda por Nombres"
                    value="{{ $buscarC }}">
                <div class="input-group-append">
                    <button class="btn btn-success" type="submit">Buscar</button>
                </div>
            </div>
        </form>

        @if (session('datos'))
            <div id="mensaje">
                <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
                    {{ session('datos') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @endif

        <table class="table table-striped table-hover">
            <thead class="thead-light">
                <tr class="text-center">
                    <th scope="col">ID</th>
                    <th scope="col">DNI</th>
                    <th scope="col">Nombres</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @if (count($clienteT) <= 0)
                    <tr>
                        <td colspan="7" class="text-center">No hay Registros</td>
                    </tr>
                @else
                    @foreach ($clienteT as $itemclienteT)
                        <tr class="text-center">
                            <td>{{ $itemclienteT->idCliente }}</td>
                            <td>{{ $itemclienteT->dni }}</td>
                            <td>{{ $itemclienteT->nombre }}</td>
                            <td>{{ $itemclienteT->direccion }}</td>
                            <td>{{ $itemclienteT->correo }}</td>
                            <td>{{ $itemclienteT->telefono }}</td>
                            <td>
                                <a href="{{ route('clienteT.edit', $itemclienteT->idCliente) }}"
                                    class="btn btn-info btn-sm"><i class="fas fa-edit"></i> Editar</a>
                                <a href="{{ route('clienteT.confirmar', $itemclienteT->idCliente) }}"
                                    class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Eliminar</a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            <ul class="pagination">
                {{-- Renderizar enlaces a páginas previas y siguientes --}}
                @if ($clienteT->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link">&laquo;</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $clienteT->previousPageUrl() }}" rel="prev">&laquo;</a>
                    </li>
                @endif

                {{-- Renderizar enlaces a páginas individuales --}}
                @foreach ($clienteT->getUrlRange(1, $clienteT->lastPage()) as $page => $url)
                    @if ($page == $clienteT->currentPage())
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
                @if ($clienteT->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $clienteT->nextPageUrl() }}" rel="next">&raquo;</a>
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
