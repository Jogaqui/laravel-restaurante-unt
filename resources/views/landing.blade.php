<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{asset('img/icon.png')}}">
    <title>.:: RESTAURANT "U.N.T." ::.</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">

</head>
<body>

        <nav class="navbar navbar-expand-md navbar-dark" id="barra" style=" background-color:black;">
            <div class="container-fluid">
              <a class="navbar-brand" href="index.html">
                  <img src="img/logo.png" alt="" srcset="" class="img-fluid" style="width: 80px;">
              </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="color: black;">
                  <li class="nav-item" style="margin-right: 10px">
                    <a class="nav-link active" aria-current="page" style="font-size: 22px" href="{{route('landing')}}">Home</a>
                  </li>
                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true" style="font-size: 22px; color:white" >Sistemas del Restaurante</a>

                    <div class="dropdown-menu">
                       <a class="dropdown-item" href="{{route('ventas.login')}}">Subsistema de Ventas</a>
                       <div class="dropdown-divider"></div>
                       <a class="dropdown-item" href="{{route('almacen.login')}}">Subsistema de Almacén</a>
                       <div class="dropdown-divider"></div>
                       <a class="dropdown-item" href="{{route('transporte.login')}}">Subsistema de Transporte y Distribución</a>
                       <div class="dropdown-divider"></div>
                       <a class="dropdown-item" href="{{ route('compras.login') }}">Subsistema de Compras</a>
                    
                   </div>
                  </li>
                </ul>
                <form class="d-flex">
                  <input class="form-control me-2" type="search" placeholder="Ingrese búsqueda..." aria-label="Search">
                  <button class="btn btn-outline-light" type="submit">Buscar</button>
                </form>
              </div>
            </div>
          </nav>

          <!-- Carrusel -->
          <section >
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner" align="center" style="">
                  <div class="carousel-item active">
                    <img src="img/1.jpg" class="d-block w-100 img-fluid" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="img/2.jpg" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="img/3.jpg" class="d-block w-100" alt="...">
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
          </section>

    <footer class="main-footer" id="piedepagina1" align="center" style="height: 60px; background-color:#ffc44c; padding-top:15px">
        <div style="">
          <p>®Copyright Derechos Reservados 2022 - RESTAURANT "U.N.T."</p>
        </div>
    </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>
