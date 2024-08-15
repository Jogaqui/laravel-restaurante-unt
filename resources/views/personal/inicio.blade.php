@extends('personal.plantillaT')

@section('titulo', '.:: Restaurant ::.')

@section('contenido')
<div class="container">
    <div class="d-flex justify-content-center mb-4">
        <h1 class="card-title" style="font-size: 35px">Bienvenido al Subsistema de Personal</h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <img src="/img/pedido.jpg" alt="Imagen Llamativa" class="img-fluid mb-4">
        </div>
    </div>
    @if (session('datos')) 
<div id="mensaje">
 @if (session('datos')) 
 <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
 {{ session('datos') }}
 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
 <span aria-hidden="true">&times;</span>
 </button>
 </div> 
 @endif 
  @endif
 </div> 


    <div class="row mt-5">
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-body">
                    <i class="fas fa-truck fa-4x mb-4" style="color: #ffc44c;"></i>
                    <h5 class="card-title">Gestionar Entrevistas</h5>
                    <p class="card-text">Administre los entrevistas y sus fechas.</p>
                    <a href="{{ route('entrevista.index') }}" class="btn btn-primary">Ver Entrevistas</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-body">
                    <i class="fas fa-utensils fa-4x mb-4" style="color: #ffc44c;"></i>
                    <h5 class="card-title">Gestión información de Postulantes</h5>
                    <p class="card-text">Administre la informacion de los postulantes.</p>
                    <br>
                    <a href="{{ route('personal.index') }}" class="btn btn-primary">Ver Postulantes</a>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('script')
 <script>
 setTimeout(function(){
 document.querySelector('#mensaje').remove();
 },2000);
 </script>
@endsection