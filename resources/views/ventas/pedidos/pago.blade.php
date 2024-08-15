@extends('layout.plantilla')

@section('titulo','Boleta')

@section('contenido')
<div>
    <h1>Boleta</h1>

    <form method="POST" action="{{route('pedido.update2',$pedido->idpedido,$pedido->cliente->idcliente)}}">
        @method('put')
        @csrf
        <div class="form-group">
            <label class="control-label">Id-Pedido:</label>
            <input class="form-control @error('idpedido') is-invalid @enderror" type="text" id="idpedido" name="idpedido" value="{{$pedido->idpedido}}" disabled/>
        </div>
        <div class="form-group">
            <label class="control-label">Cliente:</label>
            <input class="form-control @error('idcliente') is-invalid @enderror" type="text" id="idcliente" name="idcliente" value="{{$pedido->cliente['nombres']}}" {{$pedido->cliente->idcliente == $pedido->idcliente ? 'selected':''}}  disabled/>
        </div>
        <div class="form-group">
            <label class="control-label">DNI:</label>
            <input class="form-control @error('idcliente') is-invalid @enderror" type="text" id="idcliente" name="idcliente" value="{{$pedido->cliente['dni']}}" {{$pedido->cliente->idcliente == $pedido->idcliente ? 'selected':''}}  disabled/>
        </div>
        <?php
        date_default_timezone_set('America/Lima');
        ?>
        <div class="form-group">
            <label class="control-label">Fecha y Hora:</label>
            <?=date('d/m/Y g:ia');?>
        </div>
        <div class="form-group">
            <label class="control-label">Metodo de Pago:</label>
            <input class="form-control @error('medioPago') is-invalid @enderror" type="text" id="medioPago" name="medioPago" value="{{$pedido->medioPago}}" disabled/>
        </div>
        <table class="table">
            <thead>
              <tr class="text-center">
                <th scope="col">ID Producto</th>
                <th scope="col">Nombre</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Precio/Unidad</th>
                <th scope="col">Monto</th>
              </tr>
            </thead>
            <tbody>
                @if (count($detalle)<=0)
                  <tr>
                      <td colspan="4"> No hay Registros</td>
                  </tr>
                @else
        
                @foreach ($detalle as $itemDetalle)
                <tr class="text-center">
                  <td>{{$itemDetalle->producto->idproducto}}</td>
                  <td>{{$itemDetalle->producto->descripcion}}</td>
                  <td>{{$itemDetalle->cantidad}}</td>
                  <td>s/. {{$itemDetalle->producto->precio}}</td>   
                  <td>S/. {{$itemDetalle->producto->precio*$itemDetalle->cantidad}}.00</td>   
                </tr>
                @endforeach
              @endif
            </tbody>
          </table>

          <div class="row">
            <div class="col">
                <a href="{{route('pdfdownload',$pedido->idpedido)}}" class="btn btn-outline-success">Imprimir</a>
                <a href="{{route('pedido.index')}}" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Volver</a>
            </div>
          </div>
    </form>
</div>
@endsection