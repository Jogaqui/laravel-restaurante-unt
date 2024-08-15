@extends('marketing.plantillaM')

@section('titulo', 'cupones')

@section('contenido')
    <div class="container">
        <h3 class="mb-4" style="text-align: center">LISTADO DE CUPONES</h3>

        <!-- Botón Nuevo -->
        <div class="row">
            <!-- Botón Nuevo -->
            <div class="col-md-4 text-md-left mb-3 mb-md-0">
                <a href="{{ route('marketing.create') }}" class="btn btn-warning"><i class="fas fa-user"></i> Nuevo
                    Cupon</a>
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
                    <th scope="col">Cupon</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @if (count($cupones) <= 0)
                    <tr>
                        <td colspan="4" class="text-center">No hay registros</td>
                    </tr>
                @else
                    @foreach ($cupones as $cupon)
                        <tr class="text-center">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $cupon->coupon_code }}</td>
                            <td>{{ $cupon->coupon_value }}</td>
                            <td>
                                <a href="#" class="btn btn-warning btn-sm">Mostrar</a>
                                <a href="{{ route('marketing.edit', $cupon->id) }}" class="btn btn-info btn-sm">Editar</a>
                                <form action="{{ route('marketing.destroy', $cupon->id) }}" method="POST"
                                    onsubmit="return confirm('¿Estás seguro de que quieres eliminar este cupón?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            <ul class="pagination">
                {{-- Renderizar enlaces a páginas previas y siguientes --}}
                @if ($cupones->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link">&laquo;</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $cupones->previousPageUrl() }}" rel="prev">&laquo;</a>
                    </li>
                @endif

                {{-- Renderizar enlaces a páginas individuales --}}
                @foreach ($cupones->getUrlRange(1, $cupones->lastPage()) as $page => $url)
                    @if ($page == $cupones->currentPage())
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
                @if ($cupones->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $cupones->nextPageUrl() }}" rel="next">&raquo;</a>
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
