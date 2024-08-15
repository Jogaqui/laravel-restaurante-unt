
<div>
    <h1>Restaurant</h1>
    <h1>U.N.T</h1>
    <h1>Boleta</h1>
    <form method="POST" action="{{route('pedido.update2',$pedido->idpedido,$pedido->cliente->idcliente)}}">
        @method('put')
        @csrf
        <div class="form-group">
            <label class="control-label">Id-Pedido:</label>
            <label class="control-label">{{$pedido->idpedido}}</label>
        </div>
        <br>
        <div class="form-group">
            <label class="control-label">Cliente:</label>
            <label class="control-label">{{$pedido->cliente['nombres']}}</label>
        </div>
        <br>
        <div class="form-group">
            <label class="control-label">DNI:</label>
            <label class="control-label">{{$pedido->cliente['dni']}}</label>
        </div>
        <?php
        date_default_timezone_set('America/Lima');
        ?>
        <br>
        <div class="form-group">
            <label class="control-label">Fecha y Hora:</label>
            <?=date('d/m/Y g:ia');?>
        </div>
        <br>
        <div class="form-group">
            <label class="control-label">Metodo de Pago:</label>
            <label class="control-label">{{$pedido->medioPago}}</label>
        </div>
        <br>
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
            <br>
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
    </form>
</div>
