<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Reporte de Registrados registrados para Delivery</title>
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
            table-layout: fixed;
            /* Fijar el ancho de las columnas */
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
            word-wrap: break-word;
            /* Romper palabras largas para ajustar contenido */
            font-size: 10px;
            /* Tamaño de letra más pequeño */
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        /* Ajustar el ancho de las celdas de Dirección y Correo */
        td:nth-child(4),
        td:nth-child(5) {
            width: 15%;
            /* Puedes ajustar el valor según tus necesidades */
        }
    </style>
</head>

<body>
    <h1>Reporte de Pedidos - Delivery</h1>
    <table>
        <thead>
            <tr>
                <th>ID Detalle Pedido</th>
                <th>ID Pedido</th>
                <th>Nombre del cliente</th>
                <th>Domicilio del cliente</th>
                <th>Repartidor</th>
                <th>fecha del Pedido</th>
                <th>Modo de Pago</th>
                <th>Total a pagar</th>
            </tr>
        </thead>
        <tbody>
            <!-- Suponemos que los datos provienen de una base de datos y están almacenados en $detalleT -->
            @php
                $pagosPorCliente = [];
            @endphp
            @foreach ($detalleT as $itemDetalleT)
                @php
                    $clienteNombre = $itemDetalleT->pedido->cliente->nombre;
                    $totalPagar = $itemDetalleT->totalPagar;
                    
                    if (!isset($pagosPorCliente[$clienteNombre])) {
                        $pagosPorCliente[$clienteNombre] = 0;
                    }
                    
                    $pagosPorCliente[$clienteNombre] += $totalPagar;
                @endphp
                <tr>
                    <td>{{ $itemDetalleT->idDetalleP }}</td>
                    <td>{{ $itemDetalleT->pedido->idPedido }}</td>
                    <td>{{ $itemDetalleT->pedido->cliente->nombre }}</td>
                    <td>{{ $itemDetalleT->pedido->cliente->direccion }}</td>
                    <td>{{ $itemDetalleT->Repartidor->nombres }}-{{ $itemDetalleT->Repartidor->telefono }} </td>
                    <td>{{ $itemDetalleT->fechaPedido }}</td>
                    <td>{{ $itemDetalleT->modoPago }}</td>
                    <td>{{ $itemDetalleT->totalPagar }}</td>
                </tr>
            @endforeach

            <!-- Mostrar el pago de cada cliente -->
            @foreach ($pagosPorCliente as $clienteNombre => $totalPago)
                <tr>
                    <td colspan="7" class="total">Total a pagar para {{ $clienteNombre }}:</td>
                    <td class="total">{{ $totalPago }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
