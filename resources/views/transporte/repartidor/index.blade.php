@extends('transporte.plantillaT')

@section('titulo', 'Repartidores')

@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h3 class="mb-4">LISTADO DE REPARTIDORES</h3>
            </div>
            <div class="col-md-4 text-md-right mb-3 mb-md-0">
                <!-- Botón Nuevo Repartidor -->
                <a href="{{ route('repartidor.create') }}" class="btn btn-warning"><i class="fas fa-user"></i> Nuevo Repartidor</a>
                <a href="{{ route('reporte.repartidoresT') }}" class="btn btn-primary ml-md-2 mt-3 mt-md-0">
                    <i class="fas fa-file-pdf"></i> Descargar PDF
                </a>
            </div>
        </div>

        <!-- Barra de búsqueda -->
        <div class="row mt-3">
            <div class="col-md-8">
                <form class="form-inline">
                    <div class="input-group">
                        <input type="search" class="form-control border-secondary" name="buscarpor" placeholder="Búsqueda por Nombres" value="{{ $buscar }}">
                        <div class="input-group-append">
                            <button class="btn btn-success" type="submit"><i class="fas fa-search"></i> Buscar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        @if (session('datos'))
            <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
                {{ session('datos') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <table class="table table-bordered mt-4">
            <thead class="thead-dark">
                <tr class="text-center">
                    <th scope="col">ID</th>
                    <th scope="col">DNI</th>
                    <th scope="col">Nombres</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">Email</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Sueldo</th>
                    <th scope="col">Vehiculo</th>
                    <th scope="col">Placa</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @if (count($repartidor) <= 0)
                    <tr>
                        <td colspan="10" align="center"> No hay Registros</td>
                    </tr>
                @else
                    @foreach ($repartidor as $itemrepartidor)
                        <tr class="text-center">
                            <td>{{ $itemrepartidor->idRepartidor }}</td>
                            <td>{{ $itemrepartidor->dni }}</td>
                            <td>{{ $itemrepartidor->nombres }}</td>
                            <td>{{ $itemrepartidor->direccion }}</td>
                            <td>{{ $itemrepartidor->email }}</td>
                            <td>{{ $itemrepartidor->telefono }}</td>
                            <td>S/. {{ $itemrepartidor->sueldo }}</td>
                            <td>{{ $itemrepartidor->vehiculo }}</td>
                            <td>{{ $itemrepartidor->placa }}</td>
                            <td>
                                <a href="{{ route('repartidor.edit', $itemrepartidor->idRepartidor) }}"
                                    class="btn btn-info btn-sm"><i class="fas fa-edit"></i> Editar</a>
                                <a href="{{ route('repartidor.confirmar', $itemrepartidor->idRepartidor) }}"
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
                @if ($repartidor->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link">&laquo;</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $repartidor->previousPageUrl() }}" rel="prev">&laquo;</a>
                    </li>
                @endif

                {{-- Renderizar enlaces a páginas individuales --}}
                @foreach ($repartidor->getUrlRange(1, $repartidor->lastPage()) as $page => $url)
                    @if ($page == $repartidor->currentPage())
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
                @if ($repartidor->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $repartidor->nextPageUrl() }}" rel="next">&raquo;</a>
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

