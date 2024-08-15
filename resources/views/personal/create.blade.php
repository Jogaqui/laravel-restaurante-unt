@extends('personal.plantillaT')

@section('titulo', '.:: Restaurant ::.')

@section('contenido')

<div class="container">
 <h1>Registro Nuevo</h1>
 <form method="POST" action="{{route('personal.store')}}">

 @csrf
 <div class="form-group">
 <label for="">Nombre</label>
 <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre">
 @error('nombre')
 <span class="invalid-feedback" role="alert">
 <strong>{{ $message}}</strong>
 </span>
 @enderror

 @csrf
 <div class="form-group">
 <label for="">Edad</label>
 <input type="text" class="form-control @error('edad') is-invalid @enderror" id="edad" name="edad">
 @error('edad')
 <span class="invalid-feedback" role="alert">
 <strong>{{ $message}}</strong>
 </span>
 @enderror

 @csrf
 <div class="form-group">
 <label for="">DNI</label>
 <input type="text" class="form-control @error('dni') is-invalid @enderror" id="dni" name="dni">
 @error('dni')
 <span class="invalid-feedback" role="alert">
 <strong>{{ $message}}</strong>
 </span>
 @enderror


 @csrf
 <div class="form-group">
 <label for="">puntaje</label>
 <input type="text" class="form-control @error('puntaje') is-invalid @enderror" id="puntaje" name="puntaje">
 @error('puntaje')
 <span class="invalid-feedback" role="alert">
 <strong>{{ $message}}</strong>
 </span>
 @enderror

 
 </div> 

 <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Grabar</button>
 <a href="{{ route('cancelar')}}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</button></a>
 </form>
 </div>

@endsection