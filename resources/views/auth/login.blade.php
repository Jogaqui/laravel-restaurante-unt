@extends('layout.diseño1')

@section('content')
    <form action="{{route('login2')}}" method="POST">
        @csrf
        <div align="center">
            <img src="img/restaurant.png" width="220cm" alt="#">
        </div>
        <h2 align="center" style="margin: 20px">RESTAURANT "U.N.T."</h2>
        <h5 align="center" style="margin: 20px; color:#ffc44c">Subsistema de Ventas</h5>
        @include('layout.mensaje')
        <div class="mb-3" align="center">
            <label for="exampleInputEmail1" class="form-label">USUARIO</label>
            <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">Ingrese su Usuario correspondiente.</div>
        </div>
        <div class="mb-3" align="center">
            <label for="exampleInputPassword1" class="form-label">CONTRASEÑA</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3" align="center">
            <a href="{{route('register')}}">Crear cuenta</a>
        </div>
        <div  align="center">
            <button type="submit" class="btn btn-dark">Iniciar Sesión</button>  
            <a class="btn btn-warning" href="{{route('landing')}}">Retornar</a>
        </div>
        
    </form>
@endsection
   
