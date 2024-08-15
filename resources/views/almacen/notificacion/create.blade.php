@extends('almacen.plantillaA')

@section('titulo', 'Registrar insumo')

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card bg-light shadow">
                <div class="card-body">
                    <h1 class="text-center mb-4">Nueva notificación:</h1>
                    <form method="POST" action="{{route('notifA.store')}}">
                        @csrf

                        <div class="form-group">
                            <label for="descripcion" class="control-label">Seleccione el insumo:</label>
                            <select name="idInsumo" class="form-control" required>
                                    <option value="">Seleccione el insumo</option>
                                    @foreach ($insumos as $insumo)

                                    @php
                                        $etiquetaCritico = ($insumo->stockIn <=2) ? 'style="color: red;"' : '';
                                        $etiquetaModerado = ($insumo->stockIn >2 && $insumo->stockIn < 40) ? 'style="color: orange;"' : '';

                                    @endphp
                                        <option value="{{ $insumo->idInsumo }}" {!! $etiquetaCritico !!} {!! $etiquetaModerado !!}>{{ $insumo->nombreIn}}</option>
                                    @endforeach
                                </select>
                        </div>

                        <div class="form-group">
                            <label for="descripcion" class="control-label">Se enviará el stock actual del insumo, escriba un mensaje adicional:</label>
                            <input class="form-control @error('mensaje') is-invalid @enderror" type="text" id="mensaje" name="mensaje" required />
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
                            <input class="form-control @error('fecha_creacion') is-invalid @enderror" value="<?php echo $fcha;?>" type="date" id="fecha_creacion" name="fecha_creacion" required />
                            <!-- Mensaje posible de error -->
                            @error('fecha_creacion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="descripcion" class="control-label">A la hora:</label>
                            <input class="form-control @error('hora_creacion') is-invalid @enderror" value="<?php echo $hra;?>" type="time" id="hora_creacion" name="hora_creacion" required />
                            <!-- Mensaje posible de error -->
                            @error('hora_creacion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>

                  

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary mr-2"><i class="fas fa-save"></i> Grabar</button>
                            <a href="{{route('notifA.cancelar')}}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
