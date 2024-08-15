@extends('almacen.plantillaA')

@section('titulo', 'Notificaciones')

@section('contenido')
    <div class="container">
        <h3 class="mb-4" style="text-align: center">LISTADO DE NOTIFICACIONES</h3>

        <!-- Botón Nuevo -->
        <div class="row">
            <!-- Botón Nuevo -->
            <div class="col-md-4 text-md-left mb-3 mb-md-0">
                <a href="{{ route('notifA.create') }}" class="btn btn-warning"><i class="fas fa-user"></i> Nueva notificación</a>
            </div>

            <!-- Búsqueda por descripción -->
            <div class="col-md-4 text-md-center mb-3 mb-md-0">
                <form class="form-inline" method="GET">
                    <div class="input-group">
                        <input name="buscarIn" class="form-control" type="search" placeholder="Escribe el mensaje" value="{{ $buscarIn }}">
                        <div class="input-group-append">
                            <button class="btn btn-success" type="submit">Buscar</button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Botón Descargar PDF -->
            <!-- <div class="col-md-4 text-md-right">
                <a href="" class="btn btn-primary">
                    <i class="fas fa-file-pdf"></i> Descargar PDF
                </a>
            </div> -->
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
                            <td>INSUMO</td>
                            <td>MENSAJE</td>
                            <td>FECHA EMISIÓN</td>
                            <td>HORA EMISIÓN</td>
                          
                            <td>
                                OPCIONES
                            </td>
                </tr>
            </thead>
            <tbody>
                @if (count($notif) <= 0)
                    <tr>
                        <td colspan="5" class="text-center">No hay registros</td>
                    </tr>
                @else
                    @foreach ($notif as $itemnotif)
                        <tr class="text-center">
                            <td>{{ $itemnotif->idNoti }}</td>
                            <td>{{ $itemnotif->insumo->nombreIn }}</td>
                            <td>{{ $itemnotif->mensaje }}</td>
                            <td>{{ $itemnotif->fecha_creacion }}</td>
                            <td>{{ $itemnotif->hora_creacion }}</td>
                        
                            <td>
                               
                                <a href="{{ route('notifA.confirmar', $itemnotif->idNoti) }}"
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
                @if ($notif->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link">&laquo;</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $notif->previousPageUrl() }}" rel="prev">&laquo;</a>
                    </li>
                @endif

                {{-- Renderizar enlaces a páginas individuales --}}
                @foreach ($notif->getUrlRange(1, $notif->lastPage()) as $page => $url)
                    @if ($page == $notif->currentPage())
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
                @if ($notif->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $notif->nextPageUrl() }}" rel="next">&raquo;</a>
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
