@extends('almacen.plantillaA')

@section('titulo', 'Insumos')

@section('contenido')
    <div class="container">
        <h3 class="mb-4" style="text-align: center">LISTADO DE INSUMOS</h3>

        <!-- Botón Nuevo -->
        <div class="row">
            <!-- Botón Nuevo -->
            <div class="col-md-4 text-md-left mb-3 mb-md-0">
                <a href="{{ route('insumoA.create') }}" class="btn btn-warning"><i class="fas fa-user"></i> Nuevo Insumo</a>
            </div>

            <!-- Búsqueda por descripción -->
            <div class="col-md-4 text-md-center mb-3 mb-md-0">
                <form class="form-inline" method="GET">
                    <div class="input-group">
                        <input name="buscarIn" class="form-control" type="search" placeholder="Búsqueda por nombre" value="{{ $buscarIn }}">
                        <div class="input-group-append">
                            <button class="btn btn-success" type="submit">Buscar</button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Botón Descargar PDF -->
            <div class="col-md-4 text-md-right">
                <a href="{{ route('reporte.InsumosA') }}" class="btn btn-primary">
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
                            <td>ID</td>
                            <td>NOMBRE</td>
                            <td>DESCRIPCION</td>
                            <td>ADQUISICIÓN</td>
                            <td>CADUCIDAD</td>
                            <td>LOTE</td>
                            <td>STOCK</td>
                            <td>
                                OPCIONES
                            </td>
                </tr>
            </thead>
            <tbody>
                @if (count($insumoAlm) <= 0)
                    <tr>
                        <td colspan="5" class="text-center">No hay registros</td>
                    </tr>
                @else
                    @foreach ($insumoAlm as $iteminsumoAlm)
                        <tr class="text-center">
                            <td>{{ $iteminsumoAlm->idInsumo }}</td>
                            <td>{{ $iteminsumoAlm->nombreIn }}</td>
                            <td>{{ $iteminsumoAlm->descripcionIn }}</td>
                            <td>{{ $iteminsumoAlm->fechaAdquisicion }}</td>
                            <td>{{ $iteminsumoAlm->fechaCaducidad }}</td>
                            <td>{{ $iteminsumoAlm->lote }}</td>
                            <td>{{ $iteminsumoAlm->stockIn }}</td>
                            <td>
                                <a href="{{ route('insumoA.edit', $iteminsumoAlm->idInsumo) }}"
                                    class="btn btn-info btn-sm"><i class="fas fa-edit"></i>Editar</a>
                                <a href="{{ route('insumoA.confirmar', $iteminsumoAlm->idInsumo) }}"
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
                @if ($insumoAlm->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link">&laquo;</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $insumoAlm->previousPageUrl() }}" rel="prev">&laquo;</a>
                    </li>
                @endif

                {{-- Renderizar enlaces a páginas individuales --}}
                @foreach ($insumoAlm->getUrlRange(1, $insumoAlm->lastPage()) as $page => $url)
                    @if ($page == $insumoAlm->currentPage())
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
                @if ($insumoAlm->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $insumoAlm->nextPageUrl() }}" rel="next">&raquo;</a>
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
