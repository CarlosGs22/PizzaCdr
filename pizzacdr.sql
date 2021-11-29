-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-11-2021 a las 22:51:21
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pizzacdr`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `categoria` varchar(30) CHARACTER SET latin1 NOT NULL,
  `imagen` text NOT NULL,
  `status` int(11) NOT NULL,
  `cve_fecha` datetime DEFAULT current_timestamp(),
  `cve_usuario` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clasificacion`
--

CREATE TABLE `clasificacion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nombres` varchar(255) NOT NULL,
  `apellido_paterno` varchar(255) NOT NULL,
  `apellido_materno` varchar(255) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `cve_usuario` tinyint(4) NOT NULL,
  `cve_fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `total` decimal(6,2) NOT NULL,
  `id_metodo_pago` varchar(30) CHARACTER SET latin1 NOT NULL,
  `cve_fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `cve_usuario` smallint(6) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `id_sucursal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_compra`
--

CREATE TABLE `detalle_compra` (
  `id` int(11) NOT NULL,
  `cantidad` int(6) NOT NULL,
  `precio` decimal(6,2) NOT NULL,
  `subtotal` decimal(6,2) NOT NULL,
  `id_compra` int(11) NOT NULL,
  `id_articulo_ingrediente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `id` int(11) NOT NULL,
  `cantidad` int(6) NOT NULL,
  `precio` decimal(6,2) NOT NULL,
  `subtotal` decimal(6,2) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion`
--

CREATE TABLE `direccion` (
  `id` int(11) NOT NULL,
  `calle` varchar(65) CHARACTER SET latin1 NOT NULL,
  `numero` varchar(65) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `colonia` varchar(65) CHARACTER SET latin1 NOT NULL,
  `codigo_postal` varchar(65) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `estatus` int(11) NOT NULL,
  `fecha_creacion` timestamp NULL DEFAULT current_timestamp(),
  `id_cliente` int(11) NOT NULL,
  `id_localidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especiales`
--

CREATE TABLE `especiales` (
  `id` int(11) NOT NULL,
  `img1` text NOT NULL,
  `img2` text NOT NULL,
  `img3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id` int(11) NOT NULL,
  `clave` varchar(2) NOT NULL COMMENT 'Cve_Ent - Clave de la entidad',
  `nombre` varchar(40) NOT NULL COMMENT 'Nom_Ent  - Nombre de la entidad',
  `abrev` varchar(10) NOT NULL COMMENT 'Nom_Abr - Nombre abreviado de la entidad',
  `activo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Tabla de Estados de la República Mexicana';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE `imagen` (
  `id` int(11) NOT NULL,
  `imagen` text NOT NULL,
  `status` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cve_fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `cve_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingrediente`
--

CREATE TABLE `ingrediente` (
  `id` int(11) NOT NULL,
  `ingrediente` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `cve_fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `cve_usuario` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha_actualizacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_ingrediente_producto` int(11) NOT NULL,
  `id_sucursal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidad`
--

CREATE TABLE `localidad` (
  `id` int(11) NOT NULL,
  `municipio_id` int(11) NOT NULL COMMENT 'Relación con municipios.id',
  `clave` varchar(4) NOT NULL COMMENT 'Cve_Loc – Clave de la localidad',
  `nombre` varchar(100) NOT NULL COMMENT 'Nom_Loc – Nombre de la localidad',
  `mapa` int(10) NOT NULL COMMENT 'Mapa - Identificador del INEGI',
  `ambito` varchar(1) NOT NULL COMMENT 'Ámbito - Clasificación',
  `latitud` varchar(20) NOT NULL COMMENT 'Latitud – Latitud en formato DMS',
  `longitud` varchar(20) NOT NULL COMMENT 'Longitud – Longitud en formato DMS',
  `lat` decimal(10,7) NOT NULL COMMENT 'Lat_Decimal - Latitud en formato DD',
  `lng` decimal(10,7) NOT NULL COMMENT 'Lon_Decimal - Longitud en formato DD',
  `altitud` varchar(15) NOT NULL COMMENT 'Altitud – Altitud',
  `carta` varchar(10) NOT NULL COMMENT 'Cve_Carta - Clave de carta topográfica',
  `poblacion` int(11) NOT NULL COMMENT 'Pob_Total – Población Total',
  `masculino` int(11) NOT NULL COMMENT 'Pob_Masculina – Población Masculina',
  `femenino` int(11) NOT NULL COMMENT 'Pob_Femenina – Población Femenina',
  `viviendas` int(11) NOT NULL COMMENT 'Total De Viviendas Habitadas',
  `activo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Tabla de Localidades de la Republica Mexicana';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `masa`
--

CREATE TABLE `masa` (
  `id` int(11) NOT NULL,
  `masa` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu_ingredientes`
--

CREATE TABLE `menu_ingredientes` (
  `id` int(11) NOT NULL,
  `id_ingrediente` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `cve_fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `cve_usuario` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodo_pago`
--

CREATE TABLE `metodo_pago` (
  `id` int(11) NOT NULL,
  `metodo` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE `municipio` (
  `id` int(11) NOT NULL,
  `estado_id` int(11) NOT NULL COMMENT 'Relación con estados.id',
  `clave` varchar(3) NOT NULL COMMENT 'Cve_Mun – Clave del municipio',
  `nombre` varchar(100) NOT NULL COMMENT 'Nom_Mun – Nombre del municipio',
  `activo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Tabla de Municipios de la Republica Mexicana';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso_menu`
--

CREATE TABLE `permiso_menu` (
  `idpermiso` int(11) NOT NULL,
  `visible` tinyint(4) NOT NULL DEFAULT 1,
  `id_usuario` int(11) UNSIGNED NOT NULL,
  `id_submenu` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) CHARACTER SET utf8 NOT NULL,
  `descripcion` varchar(255) CHARACTER SET utf8 NOT NULL,
  `precio` double(7,2) NOT NULL,
  `total` varchar(2) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `id_masa` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `id_clasificacion` int(11) NOT NULL,
  `id_tamanio` int(11) DEFAULT NULL,
  `id_sucursal` int(11) NOT NULL DEFAULT 1,
  `cve_fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `cve_usuario` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `razon_social` varchar(255) DEFAULT NULL,
  `telefono` varchar(25) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `cve_fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `cve_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `submenu_web`
--

CREATE TABLE `submenu_web` (
  `id` int(11) UNSIGNED NOT NULL,
  `nombre_submenu_web` varchar(50) NOT NULL DEFAULT '',
  `url_submenu_web` varchar(45) NOT NULL,
  `icono_submenu_web` varchar(50) DEFAULT NULL,
  `tipo` tinyint(4) NOT NULL DEFAULT 1,
  `tipo_menu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

CREATE TABLE `sucursal` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `imagen` text DEFAULT NULL,
  `telefono` varchar(255) NOT NULL,
  `calle` varchar(10) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `colonia` varchar(255) NOT NULL,
  `cp` varchar(10) NOT NULL,
  `status` tinyint(11) NOT NULL,
  `cve_usuario` tinyint(4) NOT NULL,
  `cve_fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `id_localidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal_localidad`
--

CREATE TABLE `sucursal_localidad` (
  `id` int(11) NOT NULL,
  `precio` decimal(7,2) NOT NULL,
  `id_sucursal` int(11) NOT NULL,
  `id_localidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tamanio`
--

CREATE TABLE `tamanio` (
  `id` int(11) NOT NULL,
  `tamanio` varchar(255) NOT NULL,
  `imagen` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `cve_fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `cve_usuario` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tamanio_ingrediente`
--

CREATE TABLE `tamanio_ingrediente` (
  `id` int(11) NOT NULL,
  `id_ingrediente` int(11) NOT NULL,
  `id_tipo_tamanio` int(11) NOT NULL,
  `porcion` decimal(7,2) NOT NULL,
  `cve_fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `cve_usuario` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `id` int(11) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `cve_fecha` datetime NOT NULL,
  `cve_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_tamanio`
--

CREATE TABLE `tipo_tamanio` (
  `id` int(11) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `id_tamanio` int(11) NOT NULL,
  `precio` double NOT NULL,
  `cve_fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `cve_usuario` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id` int(11) NOT NULL,
  `tipo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad`
--

CREATE TABLE `unidad` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `cve_fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `cve_usuario` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombres` varchar(255) NOT NULL,
  `apellido_paterno` varchar(255) NOT NULL,
  `apellido_materno` varchar(255) NOT NULL,
  `tipo` varchar(65) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuario` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contrasenia` varchar(65) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen` varchar(65) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `cve_fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `cve_usuario` tinyint(4) NOT NULL,
  `id_sucursal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `total` decimal(6,2) NOT NULL,
  `metodo_pago` varchar(30) CHARACTER SET latin1 NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_direccion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cateU` (`categoria`);

--
-- Indices de la tabla `clasificacion`
--
ALTER TABLE `clasificacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk12` (`id_venta`),
  ADD KEY `fk13` (`id_producto`);

--
-- Indices de la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `fK7` (`id_cliente`) USING BTREE,
  ADD KEY `fk_direccion_localidad1_idx` (`id_localidad`) USING BTREE;

--
-- Indices de la tabla `especiales`
--
ALTER TABLE `especiales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ingrediente`
--
ALTER TABLE `ingrediente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `index_imven` (`id_ingrediente_producto`,`id_sucursal`);

--
-- Indices de la tabla `localidad`
--
ALTER TABLE `localidad`
  ADD PRIMARY KEY (`id`),
  ADD KEY `municipio_id` (`municipio_id`);

--
-- Indices de la tabla `masa`
--
ALTER TABLE `masa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `menu_ingredientes`
--
ALTER TABLE `menu_ingredientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `metodo_pago`
--
ALTER TABLE `metodo_pago`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estado_id` (`estado_id`);

--
-- Indices de la tabla `permiso_menu`
--
ALTER TABLE `permiso_menu`
  ADD PRIMARY KEY (`idpermiso`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_masa` (`id_masa`,`id_categoria`,`id_menu`,`id_tamanio`,`id_clasificacion`) USING BTREE;

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `submenu_web`
--
ALTER TABLE `submenu_web`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sucursal_localidad`
--
ALTER TABLE `sucursal_localidad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `unidad`
--
ALTER TABLE `unidad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usua_sucu` (`usuario`,`id_sucursal`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clasificacion`
--
ALTER TABLE `clasificacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `imagen`
--
ALTER TABLE `imagen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ingrediente`
--
ALTER TABLE `ingrediente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `localidad`
--
ALTER TABLE `localidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `masa`
--
ALTER TABLE `masa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `menu_ingredientes`
--
ALTER TABLE `menu_ingredientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `metodo_pago`
--
ALTER TABLE `metodo_pago`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `municipio`
--
ALTER TABLE `municipio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `permiso_menu`
--
ALTER TABLE `permiso_menu`
  MODIFY `idpermiso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `submenu_web`
--
ALTER TABLE `submenu_web`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sucursal_localidad`
--
ALTER TABLE `sucursal_localidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `unidad`
--
ALTER TABLE `unidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
