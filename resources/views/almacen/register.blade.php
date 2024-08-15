@extends('layout.diseño1')

@section('content')
    <style>        
        body {
        background-image: url('img/personalAlm.jpg'); 
        background-repeat: no-repeat;
        background-size: cover;
        }
    </style>
    <form action="{{route('registerA')}}" method="POST" style="text-align: center">
        @csrf
        <h2>CREAR CUENTA</h2>
        @include('layout.mensaje')
        <div class="form-floating mb-3">
          <input type="text" placeholder="username" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          <label for="exampleInputEmail1" class="form-label">Username</label>
        </div>
        <div class="form-floating mb-3">
            <input type="email" placeholder="email" name="email" class="form-control" id="exampleInputPassword1">
            <label for="exampleInputPassword1" class="form-label">Email</label>
        </div>

        <select class="form-select"  name="rol" aria-label="Elige el rol">
            <option selected>Seleccione el rol del nuevo usuario</option>
            <option value="Personal de almacén">Personal de almacén</option>
            <option value="Proveedor">Proveedor</option>
            <option value="Gerente General">Gerente General</option>
            <br>
        </select> <br>

        <!-- <div class="form-floating mb-3">
            <input readonly onmousedown="return false"; type="text" name="rol" class="form-control" id="exampleInputPassword1" value="Personal de almacén">
            <label for="exampleInputPassword1" class="form-label">Rol</label>
        </div> -->
        <div class="form-floating mb-3">
          <input type="password" placeholder="password" name="password" class="form-control" id="exampleInputPassword1">
          <label for="exampleInputPassword1" class="form-label">Password</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" placeholder="password-confirmation" name="password_confirmation"  class="form-control" id="exampleInputPassword1">
            <label for="exampleInputPassword1" class="form-label">Password-confirmation</label>
        </div>
        <div style="align-content: center">
            <a href="{{route('almacen.login')}}">
                <button type="button" class="btn btn-success">
                    Iniciar sesion
                </button>
            </a>
            <button type="submit" class="btn btn-danger">Crear cuenta</button>
        </div>
    </form>
@endsection
    
