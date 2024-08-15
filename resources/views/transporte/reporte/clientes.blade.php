<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Reporte de Clientes registrados para Delivery</title>
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
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Reporte de Clientes - Delivery</h1>
    <table>
        <thead>
            <tr>
                <th>ID Cliente</th>
                <th>DNI</th>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <!-- Agrega aquí las columnas que desees mostrar en el reporte -->
            </tr>
        </thead>
        <tbody>
            <!-- Suponemos que los datos provienen de una base de datos y están almacenados en $clienteT -->
            @foreach ($clienteT as $cliente)
                <tr>
                    <td>{{ $cliente->idCliente }}</td>
                    <td>{{ $cliente->dni }}</td>
                    <td>{{ $cliente->nombre }}</td>
                    <td>{{ $cliente->direccion }}</td>
                    <td>{{ $cliente->correo }}</td>
                    <td>{{ $cliente->telefono }}</td>
                    <!-- Agrega aquí las celdas correspondientes a las columnas que desees mostrar en el reporte -->
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
