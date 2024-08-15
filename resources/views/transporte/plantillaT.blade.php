<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('img/icon.png') }}">
    <title>@yield('titulo')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color: #ffc44c">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('homeT') }}" class="nav-link">Home</a>
                </li>
            </ul>
            <!-- En tu archivo de la plantilla (por ejemplo, resources/views/transporte/plantillaT.blade.php) -->
            <ul class="navbar-nav ml-auto">
                <!-- Otros elementos de la barra de navegación -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('mostrarDA') }}">Dashboard</a>
                </li>
            </ul>


            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>


                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logoutT') }}" role="button">
                        <i class="fas fa-door-open"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('homeT') }}" class="brand-link">
                <img src="{{ asset('img/mesa.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">RESTAURANT "U.N.T."</span>


            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="{{ route('homeT') }}" class="d-block"
                            style="text-transform: uppercase;">{{ auth()->user()->rol }}:
                            {{ auth()->user()->name ?? auth()->user()->username }}</a>
                    </div>
                </div>

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        @if (auth()->user()->rol == 'administrador')
                            <!--REPARTIDORES -->
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-motorcycle"></i>
                                    <p>
                                        REPARTIDOR
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('repartidor.index') }}" class="nav-link">
                                            <i class="fas fa-list nav-icon"></i> <!-- Icono de lista -->
                                            <p>Ver Listado</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('repartidor.create') }}" class="nav-link">
                                            <i class="fas fa-user-plus nav-icon"></i>
                                            <!-- Icono de usuario con signo + -->
                                            <p>Registrar Repartidor</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        CLIENTE
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('clienteT.index') }}" class="nav-link">
                                            <i class="fas fa-list nav-icon"></i> <!-- Icono de lista -->
                                            <p>Ver Listado</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('clienteT.create') }}" class="nav-link">
                                            <i class="fas fa-user-plus nav-icon"></i>
                                            <!-- Icono de usuario con signo + -->
                                            <p>Registrar Cliente</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-utensils"></i>
                                    <p>
                                        PRODUCTO
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('productoT.index') }}" class="nav-link">
                                            <i class="fas fa-list nav-icon"></i> <!-- Icono de lista -->
                                            <p>Ver Listado</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('productoT.create') }}" class="nav-link">
                                            <i class="fas fa-plus nav-icon"></i> <!-- Icono de signo + -->
                                            <p>Registrar Producto</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-shopping-cart"></i>
                                    <p>
                                        PEDIDO
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('pedidoT.index') }}" class="nav-link">
                                            <i class="fas fa-list nav-icon"></i> <!-- Icono de lista -->
                                            <p>Ver Listado</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('pedidoT.create') }}" class="nav-link">
                                            <i class="fas fa-plus nav-icon"></i> <!-- Icono de signo + -->
                                            <p>Registrar Pedido</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-clipboard-list"></i>
                                    <p>
                                        DETALLE PEDIDO
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('detalleT.create') }}" class="nav-link">
                                            <i class="fas fa-plus nav-icon"></i> <!-- Icono de signo + -->
                                            <p>Registrar detalles</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('detalleT.index') }}" class="nav-link">
                                            <i class="fas fa-list nav-icon"></i> <!-- Icono de lista -->
                                            <p>Ver listado</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                        @if (auth()->user()->rol == 'repartidor')
                        @endif

                        @if (auth()->user()->rol == 'cliente')
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-shopping-cart"></i>
                                    <p>
                                        PEDIDO
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('pedidoT.create') }}" class="nav-link">
                                            <i class="fas fa-plus nav-icon"></i> <!-- Icono de signo + -->
                                            <p>Registrar Pedido</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                        <!-- Cerrar sesión -->
                        <li class="nav-item">
                            <a href="{{ route('logoutT') }}" class="nav-link">
                                <i class="nav-icon fas fa-door-open"></i>
                                <p>Cerrar Sesión</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->

                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">

                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                @yield('contenido')
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <footer class="main-footer" align="center" style="height: 60px; background-color:#ffc44c">
            <div>
                <p>®Copyright Derechos Reservados 2023 - Restaurante</p>
            </div>
        </footer>
    </div>
    <!-- ./wrapper -->


    <!-- jQuery -->
    <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->

    <!-- Script javascript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
    @yield('script')

</body>

</html>
