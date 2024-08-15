<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>

    <body>
        <div class="card">
            <!-- Main content -->
            <div class="card-body">
                <!-- title row -->
                <div class="row">
                    <div class="col-12">
                        <h4>
                            <i class="fa fa-globe"></i> RESTAURANT UNT
                            <small class="float-right">Fecha: {{ $date }}</small>
                        </h4>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- info row -->
                <div class="row invoice-info">
                    <div class="col-sm-4 invoice-col">
                        De
                        <address>
                            <strong>RESTAURANT UNT</strong><br>
                            13006, ABC<br>
                            Trujillo 13006<br>
                            Celular: +51 999999999<br>
                            Email: contacto@ferreteria.com
                        </address>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                        <b>Compra {{ $num_compra }}</b><br>
                        <br>
                        <b>Fecha de pago:</b> {{ Carbon\Carbon::parse($compra->fecha)->format('d/m/Y') }}<br>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- Table row -->
                <div class="row">
                    <div class="col-12 table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Cant.</th>
                                    <th>Mercadería</th>
                                    <th>Código</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($compra_details as $compra_detail)
                                    <tr>
                                        <td>{{ $compra_detail->quantity }}</td>
                                        <td>{{ $compra_detail->name }}</td>
                                        <td>{{ $compra_detail->id }}</td>
                                        <td>S/. {{ $compra_detail->totalprice }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <div class="row">
                    <!-- accepted payments column -->
                    <div class="col-6">

                    </div>
                    <!-- /.col -->
                    <div class="col-6">
                        <p class="lead">Monto Pagado
                            {{ Carbon\Carbon::parse($compra->fecha)->format('d/m/Y') }}</p>

                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th style="width:50%">Subtotal:</th>
                                    <td>S/. {{ $compra->subtotal }}</td>
                                </tr>
                                <tr>
                                    <th>IGV (18%)</th>
                                    <td>S/. {{ $compra->impuesto }}</td>
                                </tr>
                                <tr>
                                    <th>Envío:</th>
                                    <td>S/. 0</td>
                                </tr>
                                <tr>
                                    <th>Total:</th>
                                    <td>S/. {{ $compra->total }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
    </body>

</html>
