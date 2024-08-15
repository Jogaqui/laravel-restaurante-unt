<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\Personal_HomeController;
use App\Http\Controllers\Personal_LoginController;
use App\Http\Controllers\Personal_RegisterController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\DetalleController;
use App\Http\Controllers\MesaController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\Transporte_HomeController;
use App\Http\Controllers\Transporte_LoginController;
use App\Http\Controllers\Transporte_RegisterController;
use App\Http\Controllers\Almacen_LoginController;
use App\Http\Controllers\Almacen_HomeController;
use App\Http\Controllers\Almacen_InsumoController;
use App\Http\Controllers\Almacen_ProductoController;
use App\Http\Controllers\Almacen_RegisterController;
use App\Http\Controllers\Almacen_ReporteController;
use App\Http\Controllers\Compras\LoginController as ComprasLoginController;
use App\Http\Controllers\Compras_HomeController;
use App\Http\Controllers\Compras_LoginController;
use App\Http\Controllers\Compras_RegisterController;
use App\Http\Controllers\ComprasController;
use App\Http\Controllers\EntrevistaController;
use App\Http\Controllers\Marketing_HomeController;
use App\Http\Controllers\Marketing_LoginController;
use App\Http\Controllers\Marketing_RegisterController;
use App\Http\Controllers\MarketingController;
use App\Http\Controllers\Notificacion_InsController;
use App\Http\Controllers\Transporte_ClienteController;
use App\Http\Controllers\Transporte_DetallePedidoController;
use App\Http\Controllers\Transporte_LogoutController;
use App\Http\Controllers\Transporte_PedidoController;
use App\Http\Controllers\Transporte_ProductoController;
use App\Http\Controllers\Transporte_RepartidorController;
use App\Http\Controllers\Transporte_ReporteController;
use App\Models\Almacen_Insumo;
use App\Models\Transporte_DetallePedido;
use App\Http\Controllers\PostulanteController;

//*********************************** VENTAS **********************************************
Route::get('/register', [RegisterController::class, 'show'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register2');
Route::get('/login', [LoginController::class, 'show'])->name('ventas.login');
Route::get('/', [HomeController::class, 'landing'])->name('landing');
Route::post('/login2', [LoginController::class, 'login'])->name('login2');
Route::get('home', [HomeController::class, 'index'])->name('home');
Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');



/* Categoria */
Route::resource('categoria', CategoriaController::class);

Route::get('cancelar', function () {
    return redirect()->route('categoria.index')->with('datos', 'Acción Cancelada ..!');
})->name('cancelar');

Route::get('categoria/{id}/confirmar', [CategoriaController::class, 'confirmar'])->name('categoria.confirmar');



/* Producto */
Route::resource('producto', ProductoController::class);
Route::get('cancelar1', function () {
    return redirect()->route('producto.index')->with('datos', 'Acción Cancelada ..!');
})->name('producto.cancelar');
Route::get('producto/{id}/confirmar', [ProductoController::class, 'confirmar'])->name('producto.confirmar');


/* Cliente */
Route::resource('cliente', ClienteController::class);
Route::get('cancelar2', function () {
    return redirect()->route('cliente.index')->with('datos', 'Acción Cancelada ..!');
})->name('cliente.cancelar');
Route::get('cliente/{id}/confirmar', [ClienteController::class, 'confirmar'])->name('cliente.confirmar');

/* Mesa */
Route::resource('mesa', MesaController::class);
Route::get('/mesas', [MesaController::class, 'mesas'])->name('mesas');
Route::get('cancelar3', function () {
    return redirect()->route('mesa.index')->with('datos', 'Acción Cancelada ..!');
})->name('mesa.cancelar');
Route::get('/mesalimpiar/{id}', [MesaController::class, 'limpiar'])->name('mesa.limpiar');
Route::get('mesa/{id}/confirmar', [MesaController::class, 'confirmar'])->name('mesa.confirmar');

/* Pedido */
Route::resource('pedido', PedidoController::class);
Route::get('cancelar4', function () {
    return redirect()->route('pedido.index')->with('datos', 'Acción Cancelada ..!');
})->name('pedido.cancelar');
Route::get('pedido/{id}/confirmar', [PedidoController::class, 'confirmar'])->name('pedido.confirmar');
Route::get('pedido/{id}/create2', [PedidoController::class, 'create2'])->name('pedido.create2');
Route::get('pedido/{id}/pago', [PedidoController::class, 'editpago'])->name('pedido.pago');

Route::get('pedido/{id}/actualizar', [PedidoController::class, 'actualizarpedido'])->name('pedido.actualizar');

Route::put('pedido/store2/{id}', [PedidoController::class, 'store2'])->name('pedido.store2');
Route::put('pedido/update2/{id}', [PedidoController::class, 'update2'])->name('pedido.update2');

/* Detalle */

Route::resource('detalle', DetalleController::class);
Route::get('detalle/lista/{id}', [DetalleController::class, 'lista'])->name('detalle.lista');
//Route::post('detalle/store2',[DetalleController::class,'store2'])->name('detalle.store2');
//Route::get('detalle/create2/{id}',[DetalleController::class,'create2'])->name('detalle.create2');



Route::get('cancelar5', function () {
    return redirect()->route('pedido.index')->with('datos', 'Acción Cancelada ..!');
})->name('detalle.cancelar');
Route::get('pedido/{id}/detalle/confirmar', [DetalleController::class, 'confirmar'])->name('detalle.confirmar');
Route::post('cliente/storemodel', [ClienteController::class, 'storemodel'])->name('cliente.storemodel');

Route::get('/pdf/{id}', [PDFController::class, 'generatePDF'])->name('pdfdownload');
/*--------------------------PERSONAL-------------------------*/
Route::get('/registerPer', [Personal_RegisterController::class, 'show'])->name('personal.register');
Route::post('/registerPer', [Personal_RegisterController::class, 'register'])->name('registerPer');
Route::get('/loginPer', [Personal_LoginController::class, 'show'])->name('personal.login');
Route::get('/', [Personal_HomeController::class, 'landing'])->name('landing');
Route::post('/loginPer', [Personal_LoginController::class, 'login'])->name('loginPer');
Route::get('homePer', [Personal_HomeController::class, 'index'])->name('homePer');
Route::resource('personal', PostulanteController::class);

Route::get('/personal/create', [PostulanteController::class, 'create'])->name('personal.create');
Route::post('/personal', [PostulanteController::class, 'store'])->name('personal.store');
Route::get('cancelar', function () {
    return redirect()->route('personal.index')->with('datos', 'Acción Cancelada ..!');
})->name('cancelar');

Route::resource('entrevista', EntrevistaController::class);

/*---------------------------TRANSPORTE Y DISTRIBUCION-------------------------*/

Route::get('/registerTr', [Transporte_RegisterController::class, 'show'])->name('transporte.register');
Route::post('/registerT', [Transporte_RegisterController::class, 'register'])->name('registerT');
Route::get('/loginTr', [Transporte_LoginController::class, 'show'])->name('transporte.login');
Route::get('/', [Transporte_HomeController::class, 'landing'])->name('landing');
Route::post('/loginT', [Transporte_LoginController::class, 'login'])->name('loginT');
Route::get('homeT', [Transporte_HomeController::class, 'index'])->name('homeT');
Route::get('/logout', [Transporte_LogoutController::class, 'logout'])->name('logoutT');
//REPARTIDOR
Route::resource('repartidor', Transporte_RepartidorController::class);
Route::get('cancelarR', function () {
    return redirect()->route('repartidor.index')->with('datos', 'Acción Cancelada ..!');
})->name('repartidor.cancelar');
Route::get('repartidor/{id}/confirmar', [Transporte_RepartidorController::class, 'confirmar'])->name('repartidor.confirmar');

//CLIENTE
Route::resource('clienteT', Transporte_ClienteController::class);
Route::get('cancelarC', function () {
    return redirect()->route('clienteT.index')->with('datos', 'Acción Cancelada ..!');
})->name('clienteT.cancelar');
Route::get('clienteT/{id}/confirmar', [Transporte_ClienteController::class, 'confirmar'])->name('clienteT.confirmar');

//PRODUCTO
Route::resource('productoT', Transporte_ProductoController::class);
Route::get('cancelarP', function () {
    return redirect()->route('productoT.index')->with('datos', 'Acción Cancelada ..!');
})->name('productoT.cancelar');
Route::get('productoT/{id}/confirmar', [Transporte_ProductoController::class, 'confirmar'])->name('productoT.confirmar');

//PEDIDO
Route::resource('pedidoT', Transporte_PedidoController::class);
Route::get('cancelarPe', function () {
    return redirect()->route('pedidoT.index')->with('datos', 'Acción Cancelada ..!');
})->name('pedidoT.cancelar');
Route::get('pedidoT/{id}/confirmar', [Transporte_PedidoController::class, 'confirmar'])->name('pedidoT.confirmar');

//DETALLE PEDIDO
Route::resource('detalleT', Transporte_DetallePedidoController::class);
Route::get('cancelarDeP', function () {
    return redirect()->route('detalleT.index')->with('datos', 'Acción Cancelada ..!');
})->name('detalleT.cancelar');
Route::get('detalleT/{id}/confirmar', [Transporte_DetallePedidoController::class, 'confirmar'])->name('detalleT.confirmar');

//REPORTE
Route::get('/reporte-clientes', [Transporte_ReporteController::class, 'generarReportePDFCliente'])->name('reporte.clientesT');
Route::get('/reporte-Repartidores', [Transporte_ReporteController::class, 'generarReportePDFRepartidor'])->name('reporte.repartidoresT');
// Route::get('/reporte-Productos', [Transporte_ReporteController::class, 'generarReportePDFProducto'])->name('reporte.productosT');
Route::get('/reporte-Pedidos', [Transporte_ReporteController::class, 'generarReportePDFPedido'])->name('reporte.pedidosT');
Route::get('/reporte-Pedidos-Enviados', [Transporte_ReporteController::class, 'generarReportePDFPedidoDetalle'])->name('reporte.pedidosDetalleT');
Route::get('/dashboard', [Transporte_PedidoController::class, 'dashboard'])->name('mostrarDA');

//-----------------------------ALMACEN-----------------------------------------
Route::get('/loginAlm', [Almacen_LoginController::class, 'show'])->name('almacen.login');
Route::post('/loginA', [Almacen_LoginController::class, 'login'])->name('loginA');
Route::get('homeA', [Almacen_HomeController::class, 'index'])->name('homeA');
Route::get('/registerAlm', [Almacen_RegisterController::class, 'show'])->name('almacen.register');
Route::post('/registerA', [Almacen_RegisterController::class, 'register'])->name('registerA');

Route::resource('insumoA', Almacen_InsumoController::class);
Route::get('cancelarI', function () {
    return redirect()->route('insumoA.index')->with('datos', 'Acción Cancelada ..!');
})->name('insumoA.cancelar');
Route::get('insumoA/{id}/confirmar', [Almacen_InsumoController::class, 'confirmar'])->name('insumoA.confirmar');

Route::resource('productoA', Almacen_ProductoController::class);
Route::get('cancelarPA', function () {
    return redirect()->route('productoA.index')->with('datos', 'Acción Cancelada ..!');
})->name('productoA.cancelar');
Route::get('productoA/{id}/confirmar', [Almacen_ProductoController::class, 'confirmar'])->name('productoA.confirmar');
Route::get('/reporte-insumos', [Almacen_ReporteController::class, 'generarReportePDFInsumo'])->name('reporte.InsumosA');
Route::get('/reporte-Productos', [Almacen_ReporteController::class, 'generarReportePDFProducto'])->name('reporte.ProductosA');

Route::get('productoA/{id}/insumos', [Almacen_ProductoController::class, 'VistaReducirStock'])->name('productoA.vreducirInsumo');
Route::post('reducirIn/{id}/', [Almacen_ProductoController::class, 'reducirInsumo'])->name('productoA.reducirInsumo');

Route::resource('notifA', Notificacion_InsController::class);
Route::get('cancelarNot', function () {
    return redirect()->route('homeA')->with('datos', 'Acción Cancelada ..!');
})->name('notifA.cancelar');
Route::get('notifA/{id}/confirmar', [Notificacion_InsController::class, 'confirmar'])->name('notifA.confirmar');

/*--------------------------- COMPRAS -------------------------*/
Route::get('registro-compras', [Compras_RegisterController::class, 'show'])->name('compras.registro.show');
Route::post('registro-compras', [Compras_RegisterController::class, 'register'])->name('compras.registro');
Route::get('login-compras', [Compras_LoginController::class, 'show'])->name('compras.login.show');
Route::post('login-compras', [Compras_LoginController::class, 'login'])->name('compras.login');
Route::get('home-compras', [Compras_HomeController::class, 'index'])->name('compras.home');
Route::get('register-compras', [ComprasController::class, 'create'])->name('compras.register.show');
Route::post('register-compras', [ComprasController::class, 'store'])->name('compras.register');
Route::post('register-compras', [ComprasController::class, 'store'])->name('compras.register');
Route::get('/reporte-compras/{id}', [ComprasController::class, 'generarReportePDFCompra'])->name('reportes.compra');
Route::get('/compras-reportes', [ComprasController::class, 'reportes'])->name('compras.reporte');
Route::resource('compras', ComprasController::class);

Route::get('notificaciones-lista', [Notificacion_InsController::class, 'listaN'])->name('compras.notificaciones.lista');
Route::get('cancelarNoti', function () {
    return redirect()->route('compras.home')->with('datos', 'Acción Cancelada ..!');
})->name('notifC.cancelar');
Route::get('notifC/{id}/confirmar', [Notificacion_InsController::class, 'confirmar2'])->name('notifC.confirmar');

Route::post('/notifDestroy/{id}', [Notificacion_InsController::class, 'destroy2'])->name('notifC.destroy2');
/*--------------------------- MARKTING -------------------------*/
Route::get('registro-marketing', [Marketing_RegisterController::class, 'show'])->name('marketing.register.show');
Route::post('registro-marketing', [Marketing_RegisterController::class, 'register'])->name('marketing.register');
Route::get('login-marketing', [Marketing_LoginController::class, 'show'])->name('marketing.login.show');
Route::post('login-marketing', [Marketing_LoginController::class, 'login'])->name('marketing.login');
Route::get('home-marketing', [Marketing_HomeController::class, 'index'])->name('marketing.home');
Route::resource('marketing', MarketingController::class);
