@extends('layout.diseño1')

@section('content')
    <form action="{{route('register2')}}" method="POST">
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
        <div class="form-floating mb-3">
            <input readonly onmousedown="return false"; type="text" name="rol" class="form-control" id="exampleInputPassword1" value="mozo">
            <label for="exampleInputPassword1" class="form-label">Rol</label>
        </div>
        <div class="form-floating mb-3">
          <input type="password" placeholder="password" name="password" class="form-control" id="exampleInputPassword1">
          <label for="exampleInputPassword1" class="form-label">Password</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" placeholder="password-confirmation" name="password_confirmation"  class="form-control" id="exampleInputPassword1">
            <label for="exampleInputPassword1" class="form-label">Password-confirmation</label>
        </div>
        <div class="mb-3">
            <a href="{{route('ventas.login')}}">Iniciar Sesion</a>
        </div>
        <button type="submit" class="btn btn-primary">Crear cuenta</button>
    </form>
@endsection
    
