@extends('layout.plantilla')

@section('titulo','.:: Restaurant ::.')

@section('contenido')
<div align="center" class="" style="margin: 40px;">
    <br>
    <img src="{{asset('/img/restaurant.png')}}" width="150px" alt="" align="center">
</div>
<div align="center">
    <i>El placer de comer bien...</i>
</div>
<div align="center" style="margin-top: 50px">
    @if(auth()->user()->rol == 'administrador')
        <a href="{{route('mesa.create')}}" class="btn btn-lg btn-warning"><i class="fas fa-plus"></i> Registrar Mesa</a>
    @endif
    @if(auth()->user()->rol != 'cocinero')
        <a href="{{route('mesas')}}" class="btn btn-lg btn-primary"><i class="fas fa-eye"></i> Ver Mesas</a>
    @endif
    
</div>
@endsection