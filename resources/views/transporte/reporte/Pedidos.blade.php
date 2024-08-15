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
    <h1>Reporte de Pedidos - Delivery</h1>
    <table>
        <thead>
            <tr>
                <th>ID Pedido</th>
                <th>Nombre Cliente</th>
                <th>Nombre del plato</th>
                <th>Cantidad</th>
            </tr>
        </thead>
        <tbody>
            <!-- Suponemos que los datos provienen de una base de datos y están almacenados en $repartidorT -->
            @foreach ($pedidoT as $itemPedidoT)
                    <tr>
                        <td>{{$itemPedidoT->idPedido}}</td>
                        <td>{{$itemPedidoT->cliente->nombre}}</td>
                        <td>{{$itemPedidoT->producto->descripcion}}</td>
                        <td>{{$itemPedidoT->cantidad}}</td>
                    </tr>
            @endforeach

            <tr>
                <td colspan="3" class="total">Total Pedidos:</td>
                <td class="total">{{$totalPedidos}}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>
