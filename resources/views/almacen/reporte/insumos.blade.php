<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Reporte de insumos</title>
    <style>
        /* Estilos CSS para el reporte */
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed; /* Fijar el ancho de las columnas */
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
            word-wrap: break-word; /* Romper palabras largas para ajustar contenido */
            font-size: 10px; /* Tamaño de letra más pequeño */
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        /* Ajustar el ancho de las celdas de Dirección y Correo */
        td:nth-child(4), td:nth-child(5) {
            width: 15%; /* Puedes ajustar el valor según tus necesidades */
        }
    </style>
</head>
<body>

<?php
// Función para obtener la fecha y hora actual
function obtenerFechaHoraActual() {
    // Configurar la zona horaria a la deseada
    date_default_timezone_set('America/New_York');
    
    // Obtener la fecha y hora actual
    $fechaHora = date('Y-m-d H:i:s');
    
    return $fechaHora;
}

// Llamar a la función
$fechaHoraActual = obtenerFechaHoraActual();
?>
    <div>
        <col style="color: blue;"> <h1>Inventario de Insumos</h1> </col>
    </div>
   
    <br>
    <br>
    <h4>{{ auth()->user()->rol }}: {{ auth()->user()->name ?? auth()->user()->username }}</h4>
    
    <h5>Fecha y hora de reporte: <?php echo $fechaHoraActual; ?></h5>
    <table>
        <thead>
            <tr>
            <td>ID</td>
                            <td>NOMBRE</td>
                            <td>DESCRIPCION</td>
                            <td>ADQUISICIÓN</td>
                            <td>CADUCIDAD</td>
                            <td>LOTE</td>
                            <td>STOCK</td>
            </tr>
        </thead>
        <tbody>
            <!-- Suponemos que los datos provienen de una base de datos y están almacenados en $repartidorT -->
            @foreach ($insumoA as $iteminsumoAlm)
                        <tr class="text-center">
                            <td>{{ $iteminsumoAlm->idInsumo }}</td>
                            <td>{{ $iteminsumoAlm->nombreIn }}</td>
                            <td>{{ $iteminsumoAlm->descripcionIn }}</td>
                            <td>{{ $iteminsumoAlm->fechaAdquisicion }}</td>
                            <td>{{ $iteminsumoAlm->fechaCaducidad }}</td>
                            <td>{{ $iteminsumoAlm->lote }}</td>
                            <td>{{ $iteminsumoAlm->stockIn }}</td>
                           
                        </tr>
                    @endforeach

         
        </tbody>
    </table>
</body>
</html>
