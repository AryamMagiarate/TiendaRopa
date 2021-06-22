-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-06-2021 a las 03:58:02
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `potrero_backend`
--
CREATE DATABASE IF NOT EXISTS `potrero_backend` DEFAULT CHARACTER SET armscii8 COLLATE armscii8_general_ci;
USE `potrero_backend`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

DROP TABLE IF EXISTS `carrito`;
CREATE TABLE `carrito` (
  `idcarrito` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `id-ropa` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- Truncar tablas antes de insertar `carrito`
--

TRUNCATE TABLE `carrito`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historico_compras`
--

DROP TABLE IF EXISTS `historico_compras`;
CREATE TABLE `historico_compras` (
  `idhistorico` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `idusuario` int(11) NOT NULL,
  `monto_total` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- Truncar tablas antes de insertar `historico_compras`
--

TRUNCATE TABLE `historico_compras`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ropa`
--

DROP TABLE IF EXISTS `ropa`;
CREATE TABLE `ropa` (
  `id-ropa` int(11) NOT NULL,
  `tipo-prenda` varchar(45) NOT NULL,
  `marca` varchar(45) NOT NULL,
  `talle` varchar(10) NOT NULL,
  `precio` decimal(10,0) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `direccionImagen` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- Truncar tablas antes de insertar `ropa`
--

TRUNCATE TABLE `ropa`;
--
-- Volcado de datos para la tabla `ropa`
--

INSERT INTO `ropa` (`id-ropa`, `tipo-prenda`, `marca`, `talle`, `precio`, `descripcion`, `direccionImagen`) VALUES
(1, 'buzo', 'nike', 's', '9000', 'Buzo con capucha y bolsillos canguro Nike Sportswear Heritage, hecho con una suave tela de tejido Fleece semicepillada.', 'buz1.jpg'),
(2, 'buzo', 'nike', 'm', '9000', 'Buzo con capucha y bolsillos canguro Nike Sportswear Heritage, hecho con una suave tela de tejido Fleece semicepillada.', 'buz1.jpg'),
(3, 'buzo', 'nike', 'l', '9000', 'Buzo con capucha y bolsillos canguro Nike Sportswear Heritage, hecho con una suave tela de tejido Fleece semicepillada.', 'buz1.jpg'),
(4, 'buzo', 'nike', 'xl', '9000', 'Buzo con capucha y bolsillos canguro Nike Sportswear Heritage, hecho con una suave tela de tejido Fleece semicepillada.', 'buz1.jpg'),
(5, 'buzo', 'nike', 'xxl', '9000', 'Buzo con capucha y bolsillos canguro Nike Sportswear Heritage, hecho con una suave tela de tejido Fleece semicepillada.', 'buz1.jpg'),
(6, 'buzo', 'nike', 's', '9000', 'Buzo con capucha para mujer Nike Sportwear Heritage Fleece. Confeccionado en algodon frisado.', 'buz2.jpg'),
(7, 'buzo', 'nike', 'm', '9000', 'Buzo con capucha para mujer Nike Sportwear Heritage Fleece. Confeccionado en algodon frisado.', 'buz2.jpg'),
(8, 'buzo', 'nike', 'l', '9000', 'Buzo con capucha para mujer Nike Sportwear Heritage Fleece. Confeccionado en algodon frisado.', 'buz2.jpg'),
(9, 'buzo', 'nike', 'xl', '9000', 'Buzo con capucha para mujer Nike Sportwear Heritage Fleece. Confeccionado en algodon frisado.', 'buz2.jpg'),
(10, 'buzo', 'nike', 'xxl', '9000', 'Buzo con capucha para mujer Nike Sportwear Heritage Fleece. Confeccionado en algodon frisado.', 'buz2.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `password` varchar(25) NOT NULL,
  `email` varchar(70) NOT NULL,
  `rol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- Truncar tablas antes de insertar `usuarios`
--

TRUNCATE TABLE `usuarios`;
--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `nombre`, `apellido`, `password`, `email`, `rol`) VALUES
(1, 'mayra', 'magiarate', 'administrador', 'aryamdelsolar@gmail.com', 'administrador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`idcarrito`);

--
-- Indices de la tabla `historico_compras`
--
ALTER TABLE `historico_compras`
  ADD PRIMARY KEY (`idhistorico`);

--
-- Indices de la tabla `ropa`
--
ALTER TABLE `ropa`
  ADD PRIMARY KEY (`id-ropa`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `idcarrito` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `historico_compras`
--
ALTER TABLE `historico_compras`
  MODIFY `idhistorico` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ropa`
--
ALTER TABLE `ropa`
  MODIFY `id-ropa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
