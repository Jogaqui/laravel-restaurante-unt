@extends('almacen.plantillaA')

@section('titulo', 'Editar registro de insumo')

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-warning text-white" style="text-align: center">
                    <h1 class="mb-0">
                        <i class="fas fa-edit"></i> Editar notificación
                    </h1>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('notifA.update', $notifA->idNoti)}}">
                        @method('put')
                        @csrf

                        <div class="form-group">
                            <label for="descripcion" class="control-label">Insumo involucrado (no es posible modificar):</label>
                            <select name="idInsumo" class="form-control" required disabled>
                                    <option value="">{{ $notifA->insumo->nombreIn }}</option>
                                    @foreach ($insumo as $insu)
                                        <option value="{{ $insu->idInsumo }}">{{ $insu->nombreIn }}</option>
                                    @endforeach
                                </select>
                        </div>

                        <div class="form-group">
                            <label for="descripcion" class="control-label">Modifique el mensaje:</label>
                            <input value="{{ $notifA->mensaje }}" class="form-control @error('mensaje') is-invalid @enderror" type="text" id="mensaje" name="mensaje" required />
                            <!-- Mensaje posible de error -->
                            @error('mensaje')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                   

                        <?php $fcha = date("Y-m-d");?>
                        <?php $hra = date("H:i");?>


                        <div class="form-group">
                            <label for="descripcion" class="control-label">Se notificó el día:</label>
                            <input value="{{ $notifA->fecha_creacion }}" class="form-control @error('fecha_creacion') is-invalid @enderror" type="date" id="fecha_creacion" name="fecha_creacion" required />
                            <!-- Mensaje posible de error -->
                            @error('fecha_creacion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="descripcion" class="control-label">A la hora:</label>
                            <input value="{{ $notifA->hora_creacion }}" class="form-control @error('hora_creacion') is-invalid @enderror"  type="time" id="hora_creacion" name="hora_creacion" required />
                            <!-- Mensaje posible de error -->
                            @error('hora_creacion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary mr-3"><i class="fas fa-save"></i> Actualizar</button>
                            <a href="{{route('notifA.cancelar')}}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
