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

    <style>
                .cuadrito-color {
                    width: 50px;
                    height: 10px;
                    display: inline-block;
                    margin-left: 10px; /* Ajusta el espacio entre el stock y el cuadrito */

                    
        }
                .insumo-line {
            display: flex;
            align-items: center;
            justify-content: center; /* Centra el contenido horizontalmente */
            margin-bottom: 10px; /* Ajusta según sea necesario */
        }

        .insumo-nombre,
    .stock-alert{
        flex: 1; /* Hace que cada elemento ocupe el mismo espacio en la fila */
    }
        
        .cuadrito-rojo {
            background-color: red;
        
        }

        .cuadrito-amarillo {
            background-color: orange;
        }

        .cuadrito-verde {
            background-color: green;
        }
      
      

    </style>
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
                    <a href="{{ route('homeA') }}" class="nav-link">Inicio</a>
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
                        <a href="" class="d-block"
                            >{{ auth()->user()->rol }}: <br>
                            {{ auth()->user()->name ?? auth()->user()->username }}</a>
                    </div>
                </div>


                <!-- Sidebar Menu -->
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
                        <!-- Mesas -->
                        @if (auth()->user()->rol == 'Personal de almacén')
                            <!--REPARTIDORES -->
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-box"></i>
                                    <p>
                                        Insumos
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('insumoA.index') }}" class="nav-link">
                                            <i class="fas fa-list nav-icon"></i> <!-- Icono de lista -->
                                            <p>Ver Listado</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('insumoA.create') }}" class="nav-link">
                                            <i class="fas fa-user-plus nav-icon"></i>
                                            <!-- Icono de usuario con signo + -->
                                            <p>Registrar insumo</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-utensils"></i>
                                    <p>
                                        Productos
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('productoA.index') }}" class="nav-link">
                                            <i class="fas fa-list nav-icon"></i> <!-- Icono de lista -->
                                            <p>Ver Listado</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('productoA.create') }}" class="nav-link">
                                            <i class="fas fa-user-plus nav-icon"></i>
                                            <!-- Icono de usuario con signo + -->
                                            <p>Registrar lote de productos</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-check"></i>
                                    <p>
                                        Notificaciones
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('notifA.index') }}" class="nav-link">
                                            <i class="fas fa-list nav-icon"></i> <!-- Icono de lista -->
                                            <p>Ver Lista</p>
                                        </a>
                                    </li>
                                   
                                </ul>
                            </li>

                        @endif


                        @if (auth()->user()->rol == 'Proveedor')
                        <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-box"></i>
                                    <p>
                                        Insumos
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('insumoA.index') }}" class="nav-link">
                                            <i class="fas fa-list nav-icon"></i> <!-- Icono de lista -->
                                            <p>Ver Pedidos</p>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                        @endif

                        <!-- Cerrar sesión -->
                        <!-- <li class="nav-item">
                            <a href="{{ route('logoutT') }}" class="nav-link">
                                <i class="nav-icon fas fa-door-open"></i>
                                <p>Cerrar Sesión</p>
                            </a>
                        </li> -->
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

    <script>
        $(document).ready (function(){
                $('#myModal').modal ('show')

                function analizarStock(stock) {
            if (stock <= 2) {
                return 'rojo';
            } else if (stock <= 40) {
                return 'amarillo';
            } else {
                return 'verde';
            }
        }


        function actualizarEstados() {
            $('.cuadrito-color').remove();
            $('.stock-alert').each(function() {
                var stock = parseInt($(this).text(), 10);
                var color = analizarStock(stock);

                // Agregar clase de color al elemento que muestra el stock
                $(this).addClass('stock-' + color);

                // Agregar cuadrito de color al lado del elemento
                var cuadritoColor = $('<div class="cuadrito-color"></div>');
                cuadritoColor.addClass('cuadrito-' + color);
                $(this).after(cuadritoColor);
            });
        }
          // Llama a la función para actualizar los estados al hacer clic en el botón
          $('#botonAbrirModal').on('click', function() {
            // Llama a la función para actualizar los estados antes de mostrar el modal
            actualizarEstados();

            // Muestra el modal al hacer clic en el botón
            $('#myModal').modal('show');
        });

        // Llama a la función para actualizar los estados al cargar la vista
        actualizarEstados();

       
        });
    </script>
    @yield('script')

</body>

</html>
