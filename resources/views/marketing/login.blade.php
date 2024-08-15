@extends('layout.diseño1')

@section('content')
    <style>
        body {
        background-image: url('img/almacenlog.png');
        background-repeat: no-repeat;
        background-size: cover;
        }
    </style>

    <form action="{{route('marketing.login')}}" method="POST" >
        @csrf
        <div align="center">
            <img src="img/image1.png" width="220cm" alt="#">
        </div>
        <h2 align="center" style="margin: 20px; color:black">RESTAURANT "U.N.T."</h2>
        <h5 align="center" style="margin: 20px; color:#008768">Subsistema de Marketing</h5>
        @include('layout.mensaje')
        <div class="mb-3" align="center">
            <h3>
                <label for="exampleInputEmail1" class="form-label" style="color: white">USUARIO</label>
            </h3>

            <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3" align="center">
            <h3>
                <label for="exampleInputPassword1" class="form-label"style="color: white">CONTRASEÑA</label>
            </h3>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3" align="center">
            <a href="{{route('marketing.register.show')}}">
                <button type="button" class="btn btn-success">
                    Crear cuenta
                </button>
            </a>
        </div>
        <div  align="center">
            <button type="submit" class="btn btn-dark">Iniciar Sesión</button>
            <a class="btn btn-warning" href="{{route('landing')}}">Retornar</a>
        </div>

    </form>
@endsection
