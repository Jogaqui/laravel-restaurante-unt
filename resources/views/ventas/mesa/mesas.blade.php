@extends('layout.plantilla')

@section('titulo','Mesas')

@section('contenido')

<h3>VER MESAS</h3>

<!-- Botón Nuevo -->
<div class="">
<div class="card-body row centros">
    @if(session('datos'))
    <div id="mensaje">
        <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
            {{session('datos')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
  @endif
  <br>
          @if (count($mesas)<=0)
              <p>No hay Registros</p>
          @else
          @foreach ($mesas as $itemMesa)
          <div class="card centros" style="width: 18rem;">
              <a href="{{route('pedido.create2',$itemMesa->idmesa)}}"><center><img src="img/mesa.png" style="width:5cm; height: 5cm;" class="card-img-top" alt="#"></a></center>
              <div class="card-body centros">
                  <h5 class="card-title">Mesa {{$itemMesa->idmesa}}</h5>
                  <p class="card-text">
                      @if ($itemMesa->disponibilidad=="0")
                          <button style="width:20px; height: 20px; border-radius: 10px; font-family: Roboto, sans-serif; font-weight:bold; background-color: rgb(255, 47, 47)"></button>
                      @else
                          <button style="width:20px; height: 20px; border-radius: 10px; font-family: Roboto, sans-serif; font-weight:bold; background-color: rgb(47, 255, 78)"></button>
                      @endif
                  </p>
              </div>
          </div>
          </tr>
          @endforeach
        @endif
</div>  

    </tbody>
  </table>
  {{$mesas->links()}}
</div>


@endsection

@section('script')
  <script>
     setTimeout(function(){
        document.querySelector('#mensaje').remove();
     }, 2000);
  </script>
@endsection

<style>
    div.centros{
        display: flex;
        margin-left:auto;
        margin-right:auto;
        margin-top:auto;
        justify-content: center;
        gap: 0.5cm; 
    }
</style>