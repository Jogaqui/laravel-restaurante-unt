-- -- phpMyAdmin SQL Dump
-- -- version 5.2.1
-- -- https://www.phpmyadmin.net/
-- --
-- -- Servidor: 127.0.0.1
-- -- Tiempo de generación: 25-07-2023 a las 21:09:18
-- -- Versión del servidor: 10.4.28-MariaDB
-- -- Versión de PHP: 8.0.28

-- --
-- -- Base de datos: `bdprueba`
-- --

drop database if exists bdprueba;
create database bdprueba;
use bdprueba;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `dni` char(8) NOT NULL,
  `idadministrador` int(11) NOT NULL,
  `cargo` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idcliente` int(11) NOT NULL,
  `dni` char(8) DEFAULT NULL,
  `nombres` varchar(40) DEFAULT NULL,
  `direccion` varchar(40) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `telefono` varchar(12) DEFAULT NULL,
  `estado` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientedelivery`
--

CREATE TABLE `clientedelivery` (
  `idCliente` int(11) NOT NULL,
  `dni` char(8) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `direccion` varchar(40) NOT NULL,
  `correo` varchar(40) NOT NULL,
  `telefono` int(9) NOT NULL,
  `estado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cocinero`
--

CREATE TABLE `cocinero` (
  `dni` char(8) NOT NULL,
  `idcocinero` int(11) NOT NULL,
  `cargo` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallepedido`
--

CREATE TABLE `detallepedido` (
  `idDetalleP` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idPedido` int(11) NOT NULL,
  `idRepartidor` int(11) NULL,
  `fechaPedido` date NOT NULL,
  `modoPago` varchar(30) NOT NULL,
  `totalPagar` float NOT NULL,
  `estado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedido`
--

CREATE TABLE `detalle_pedido` (
  `idpedido` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `importe` float DEFAULT NULL

);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insumo`
--

CREATE TABLE `insumo` (
  `idInsumo` int(11) NOT NULL,
  `nombreIn` varchar(40) DEFAULT NULL,
  `descripcionIn` varchar(40) DEFAULT NULL,
  `fechaAdquisicion` date DEFAULT NULL,
  `fechaCaducidad` date DEFAULT NULL,
  `lote` varchar(10) DEFAULT NULL,
  `stockIn` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesa`
--

CREATE TABLE `mesa` (
  `idmesa` int(11) NOT NULL,
  `idpedido` int(11) DEFAULT NULL,
  `disponibilidad` tinyint(4) DEFAULT NULL,
  `estado` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mesa`
--

INSERT INTO `mesa` (`idmesa`, `idpedido`, `disponibilidad`, `estado`) VALUES
(1, NULL, 1, 1),
(2, NULL, 1, 1),
(3, NULL, 1, 1),
(4, NULL, 1, 1),
(5, NULL, 1, 1),
(6, NULL, 1, 1),
(7, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mozo`
--

CREATE TABLE `mozo` (
  `dni` char(8) NOT NULL,
  `idmozo` int(11) NOT NULL,
  `tipoContrato` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `idpedido` int(11) NOT NULL,
  `idcliente` int(11) DEFAULT NULL,
  `montoTotal` decimal(8,2) DEFAULT NULL,
  `observaciones` varchar(30) DEFAULT NULL,
  `situacion` tinyint(4) DEFAULT NULL,
  `medioPago` varchar(20) DEFAULT NULL,
  `modalidad` tinyint(4) DEFAULT NULL,
  `estado` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidodelivery`
--

CREATE TABLE `pedidodelivery` (
  `idPedido` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `estado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `postulante`
--

CREATE TABLE `postulante` (
  `id` int(11) NOT NULL,
  `dni` varchar(20) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `edad` int(11) NOT NULL,
  `puntaje` decimal(5,2) NOT NULL,
  `estado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `postulante`
--

INSERT INTO `postulante` (`id`, `dni`, `nombre`, `edad`, `puntaje`, `estado`) VALUES
(1, '12345678', 'Juan Perez', 25, 80.00, '1'),
(2, '98765432', 'Maria Gomez', 30, 95.00, '1'),
(3, '45678901', 'Pedro Sanchez', 22, 70.00, '0'),
(4, '56789012', 'Ana Rodriguez', 28, 85.00, '1'),
(5, '23456789', 'Luis Ramirez', 26, 78.00, '0');




-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idproducto` int(11) NOT NULL,
  `descripcion` varchar(40) DEFAULT NULL,
  `precio` decimal(8,2) DEFAULT NULL,
  `estado` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productodelivery`
--

CREATE TABLE `productodelivery` (
  `idProducto` int(11) NOT NULL,
  `descripcion` varchar(30) NOT NULL,
  `precio` float NOT NULL,
  `stock` int(11) NOT NULL,
  `estado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `repartidor`
--

CREATE TABLE `repartidor` (
  `idRepartidor` int(11) NOT NULL,
  `dni` char(8) DEFAULT NULL,
  `nombres` varchar(40) DEFAULT NULL,
  `direccion` varchar(40) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `telefono` varchar(12) DEFAULT NULL,
  `sueldo` float DEFAULT NULL,
  `vehiculo` varchar(30) NOT NULL,
  `placa` varchar(10) NOT NULL,
  `estado` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(20) AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(255) DEFAULT NULL,
  `rol` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `rol`, `email`, `username`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, 'administrador', 'admin@gmail.com', 'admin@gmail.com', NULL, '$2y$10$5JwAmYcai5.HexVY617/ROKC62pbeV/nweNMQr7Sop2pouA6f1ghm', NULL, '2023-07-25 13:45:37', '2023-07-25 13:45:37'),
(2, NULL, 'Personal de almacén', 'pjuan@gmail.com', 'juan perez', NULL, '$2y$10$iJ.B09QCP.lIwkGw/DyeYe5efxZOM.7aNPFqU2NM.7gsh787QiID2', NULL, '2024-01-31 20:48:52', '2024-01-31 20:48:52');
INSERT INTO `users` (`id`, `name`, `rol`, `email`, `username`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, NULL, 'administrador', 'pfernanda@gmail.com', 'Fernanda Pastor', NULL, '$2y$10$Wwm4gTeYup34v/0W4Q67gOrvLjx8FFn8mVAPx1X0oyKosl5rgQ9/W', NULL, '2024-02-21 20:22:10', '2024-02-21 20:22:10');

-- --------------------------------------------------------
--
-- Volcado de datos para la tabla `insumo`
--

INSERT INTO `insumo` (`idInsumo`, `nombreIn`, `descripcionIn`, `fechaAdquisicion`, `fechaCaducidad`, `lote`, `stockIn`, `estado`) VALUES
(1, 'Cebolla Cola', 'Platillos criollos', '2024-01-31', '2024-02-07', '2', 110, 1),
(2, 'PapasAndinas', 'huayro', '2024-01-31', '2024-02-07', '2', 200, 1),
(3, 'Maracuya', 'Bebidas', '2024-02-02', '2024-02-09', '2', 200, 1),
(4, 'Tomate Grande', 'Para ensaladas', '2024-02-02', '2024-02-06', '4', 350, 1),
(5, 'Pollo Perla', '3.5kg c/pollo', '2024-02-02', '2024-02-05', '5', 100, 1),
(6, 'Carne Cerdo', 'Chuletas medianas', '2024-02-09', '2024-02-16', '6', 180, 1),
(7, 'Carne Res', 'Parrillas noche', '2024-02-03', '2024-02-08', '7', 205, 1),
(8, 'Escabeche', 'Para platillos criollos', '2024-01-30', '2024-02-07', '7', 2, 1),
(9, 'Cebolla china', 'Criollos y ensaladas', '2024-02-01', '2024-02-04', '7', 80, 1),
(10, 'Pepinillo', 'Ensaladas', '2024-01-29', '2024-02-03', '7', 38, 1);
--
-- Estructura de tabla para la tabla `usuario`
--

INSERT INTO `productodelivery` (`idProducto`, `descripcion`, `precio`, `stock`, `estado`) VALUES
(1, 'Cabrito', 28, 45, 1),
(2, 'Caldo Entrada', 20, 45, 1);

CREATE TABLE `usuario` (
  `dni` char(8) NOT NULL,
  `pword` varchar(40) NOT NULL,
  `nombres` varchar(40) DEFAULT NULL,
  `fechaNacimiento` date DEFAULT NULL,
  `sexo` char(1) DEFAULT NULL,
  `fechaContrato` date DEFAULT NULL,
  `sueldo` decimal(8,2) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `telefono` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--


--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`dni`);


--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);
--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idcliente`);

--
-- Indices de la tabla `clientedelivery`
--
ALTER TABLE `clientedelivery`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indices de la tabla `cocinero`
--
ALTER TABLE `cocinero`
  ADD PRIMARY KEY (`dni`);

--
-- Indices de la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  ADD PRIMARY KEY (`idDetalleP`),
  ADD KEY `idRepartidor` (`idRepartidor`),
  ADD KEY `idPedido` (`idPedido`),
  ADD KEY `idCliente` (`idCliente`);

--
-- Indices de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD PRIMARY KEY (`idpedido`,`idproducto`),
  ADD KEY `R_8` (`idproducto`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `insumo`
--
ALTER TABLE `insumo`
  ADD PRIMARY KEY (`idInsumo`);


CREATE TABLE notificaciones_insumo (
    idNoti INT AUTO_INCREMENT PRIMARY KEY,
    insumo_id INT (11) not null,
    mensaje VARCHAR(100) NOT NULL,
    fecha_creacion date not null,
    hora_creacion varchar (15) not null,
    estado int not null,
    FOREIGN KEY (insumo_id) REFERENCES insumo(idInsumo)
);

--
-- Indices de la tabla `mesa`
--
ALTER TABLE `mesa`
  ADD PRIMARY KEY (`idmesa`),
  ADD KEY `R_19` (`idpedido`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mozo`
--
ALTER TABLE `mozo`
  ADD PRIMARY KEY (`dni`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`idpedido`),
  ADD KEY `R_10` (`idcliente`);

--
-- Indices de la tabla `pedidodelivery`
--
ALTER TABLE `pedidodelivery`
  ADD PRIMARY KEY (`idPedido`),
  ADD KEY `idCliente` (`idCliente`),
  ADD KEY `idProducto` (`idProducto`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `postulante`
--
ALTER TABLE `postulante`
  ADD PRIMARY KEY (`id`);



CREATE TABLE `entrevista` (
  `identrevista` int(11) NOT NULL,
  `observaciones` varchar(40) not NULL,
  `fecha` varchar(40) not NULL,
  `hora` varchar(40) not NULL,
  `idpersonal` int(11) not NULL,
  `estado` tinyint(4) not NULL,
  FOREIGN KEY (idpersonal) REFERENCES postulante(id),
  primary key (identrevista)
);


INSERT INTO `entrevista` (`identrevista`, `observaciones`, `fecha`, `hora`, `idpersonal`, `estado`) VALUES
(1, 'EXCELENTE', '2024-08-07','8:00' , 1, '1'),
(2, 'FALLÓ TEST PSICOLOGICO', '2024-09-10', '12:20', 2, '1'),
(3, 'Modetrado', '2024-11-12','9:00' ,3 , '0'),
(4, 'EXCELENTE', '2024-10-10','9:00' , 4, '1');


--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idproducto`);

--
-- Indices de la tabla `productodelivery`
--
ALTER TABLE `productodelivery`
  ADD PRIMARY KEY (`idProducto`);

--
-- Indices de la tabla `repartidor`
--
ALTER TABLE `repartidor`
  ADD PRIMARY KEY (`idRepartidor`);



--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`dni`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clientedelivery`
--
ALTER TABLE `clientedelivery`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  MODIFY `idDetalleP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `insumo`
--
ALTER TABLE `insumo`
  MODIFY `idInsumo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mesa`
--
ALTER TABLE `mesa`
  MODIFY `idmesa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `idpedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedidodelivery`
--
ALTER TABLE `pedidodelivery`
  MODIFY `idPedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `postulante`
--
ALTER TABLE `postulante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idproducto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productodelivery`
--
ALTER TABLE `productodelivery`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `repartidor`
--
ALTER TABLE `repartidor`
  MODIFY `idRepartidor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `administrador_ibfk_1` FOREIGN KEY (`dni`) REFERENCES `usuario` (`dni`) ON DELETE CASCADE;

--
-- Filtros para la tabla `cocinero`
--
ALTER TABLE `cocinero`
  ADD CONSTRAINT `cocinero_ibfk_1` FOREIGN KEY (`dni`) REFERENCES `usuario` (`dni`) ON DELETE CASCADE;

--
-- Filtros para la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  ADD CONSTRAINT `detallepedido_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `clientedelivery` (`idCliente`),
  ADD CONSTRAINT `detallepedido_ibfk_2` FOREIGN KEY (`idPedido`) REFERENCES `pedidodelivery` (`idPedido`),
  ADD CONSTRAINT `detallepedido_ibfk_3` FOREIGN KEY (`idRepartidor`) REFERENCES `repartidor` (`idRepartidor`);

--
-- Filtros para la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD CONSTRAINT `R_7` FOREIGN KEY (`idpedido`) REFERENCES `pedido` (`idpedido`),
  ADD CONSTRAINT `R_8` FOREIGN KEY (`idproducto`) REFERENCES `producto` (`idproducto`);

--
-- Filtros para la tabla `mesa`
--
ALTER TABLE `mesa`
  ADD CONSTRAINT `R_19` FOREIGN KEY (`idpedido`) REFERENCES `pedido` (`idpedido`);

--
-- Filtros para la tabla `mozo`
--
ALTER TABLE `mozo`
  ADD CONSTRAINT `mozo_ibfk_1` FOREIGN KEY (`dni`) REFERENCES `usuario` (`dni`) ON DELETE CASCADE;

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `R_10` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`idcliente`);

--
-- Filtros para la tabla `pedidodelivery`
--
ALTER TABLE `pedidodelivery`
  ADD CONSTRAINT `pedidodelivery_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `clientedelivery` (`idCliente`),
  ADD CONSTRAINT `pedidodelivery_ibfk_2` FOREIGN KEY (`idProducto`) REFERENCES `productodelivery` (`idProducto`);
COMMIT;

--
-- compras
--

create table proveedores(
    id int not null AUTO_INCREMENT,
    razon_social varchar(100) not null,
    representante varchar(100) not null,
    tipo_documento varchar(20) null,
    num_documento varchar(20) null,
    direccion varchar(70) null,
    telefono varchar(20) null,
    email varchar(50) null,
    primary key(id)
);

INSERT INTO `proveedores` (`id`, `razon_social`, `representante`, `tipo_documento`, `num_documento`, `direccion`, `telefono`, `email`) VALUES (NULL, 'ZeroGroups SAC', 'zero', 'RUC', '20029182123', 'abc 123', '123123123', 'zero@zerogroups.com');
INSERT INTO `proveedores` (`id`, `razon_social`, `representante`, `tipo_documento`, `num_documento`, `direccion`, `telefono`, `email`) VALUES (NULL, 'ZeroGroups SAC', 'zero', 'RUC', '20029182124', 'abc 123', '123123123', 'uno@zerogroups.com');
INSERT INTO `proveedores` (`id`, `razon_social`, `representante`, `tipo_documento`, `num_documento`, `direccion`, `telefono`, `email`) VALUES (NULL, 'ZeroGroups SAC', 'zero', 'RUC', '20029182125', 'abc 123', '123123123', 'dos@zerogroups.com');
INSERT INTO `proveedores` (`id`, `razon_social`, `representante`, `tipo_documento`, `num_documento`, `direccion`, `telefono`, `email`) VALUES (NULL, 'ZeroGroups SAC', 'zero', 'RUC', '20029182126', 'abc 123', '123123123', 'tres@zerogroups.com');

CREATE TABLE compras(
    id int not null AUTO_INCREMENT,
    proveedor_id int not null,
    user_id bigint(20) UNSIGNED not null,
    tipo_comprobante varchar(20) not null,
    serie_comprobante varchar(7) null,
    num_comprobante varchar (10) not null,
    fecha datetime not null,
    impuesto decimal (11,2) not null,
    total decimal (11,2) not null,
    estado varchar(20) not null,
    primary key(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE detalle_compra(
    id int not null AUTO_INCREMENT,
    compra_id int not null,
    producto_id int not null,
    cantidad int not null,
    precio decimal(11,2) not null,
    estado char(1) null,
    primary key(id),
    FOREIGN KEY (compra_id) REFERENCES compras(id) ON DELETE CASCADE,
    FOREIGN KEY (producto_id) REFERENCES producto(idproducto)
);

CREATE TABLE IF NOT EXISTS coupones (
  id int(11) NOT NULL AUTO_INCREMENT,
  coupon_code varchar(255) NOT NULL,
  coupon_value int(11) NOT NULL,
  primary key(id)
);

--
-- Volcado de datos para la tabla `coupon_detail`
--

INSERT INTO `coupones` (`id`, `coupon_code`, `coupon_value`) VALUES
(1, 'GET10', 10),
(2, 'GET20', 20),
(3, 'GET30', 30),
(4, 'GET40', 40),
(5, 'GET50', 50);
