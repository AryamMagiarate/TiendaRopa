-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-06-2021 a las 22:43:39
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `potrero_backend`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `idcarrito` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `id-ropa` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `estadoCompra` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`idcarrito`, `idusuario`, `id-ropa`, `cantidad`, `fecha`, `estadoCompra`) VALUES
(1, 2, 1, 2, '2021-06-23 01:28:42', 'pausado'),
(2, 2, 4, 4, '2021-06-23 01:34:13', 'pausado'),
(4, 2, 9, 2, '2021-06-23 05:26:07', 'pausado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historico_compras`
--

CREATE TABLE `historico_compras` (
  `idhistorico` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `idusuario` int(11) NOT NULL,
  `monto_total` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ropa`
--

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
(10, 'buzo', 'nike', 'xxl', '9000', 'Buzo con capucha para mujer Nike Sportwear Heritage Fleece. Confeccionado en algodon frisado.', 'buz2.jpg'),
(11, 'buzo', 'nike', 's', '9200', 'La sudadera con capucha Nike SB Icon te permite representar a tu marca favorita con comodidad acogedora, gracias a un llamativo logotipo Nike SB.   Color: Negro Material: algodon', 'buz3.jpg'),
(12, 'buzo', 'nike', 'm', '9200', 'La sudadera con capucha Nike SB Icon te permite representar a tu marca favorita con comodidad acogedora, gracias a un llamativo logotipo Nike SB.   Color: Negro Material: algodon', 'buz3.jpg'),
(13, 'buzo', 'nike', 'l', '9200', 'La sudadera con capucha Nike SB Icon te permite representar a tu marca favorita con comodidad acogedora, gracias a un llamativo logotipo Nike SB.   Color: Negro Material: algodon', 'buz3.jpg'),
(14, 'buzo', 'nike', 'xl', '9200', 'La sudadera con capucha Nike SB Icon te permite representar a tu marca favorita con comodidad acogedora, gracias a un llamativo logotipo Nike SB.   Color: Negro Material: algodon', 'buz3.jpg'),
(15, 'buzo', 'nike', 'xxl', '9200', 'La sudadera con capucha Nike SB Icon te permite representar a tu marca favorita con comodidad acogedora, gracias a un llamativo logotipo Nike SB.   Color: Negro Material: algodon', 'buz3.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `password` varchar(25) NOT NULL,
  `email` varchar(70) NOT NULL,
  `rol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `nombre`, `apellido`, `password`, `email`, `rol`) VALUES
(1, 'mayra', 'magiarate', 'administrador', 'aryamdelsolar@gmail.com', 'administrador'),
(2, 'Fernando Antonio', 'Borovsak', 'fernando', 'ferchus@gmail.com', 'cliente');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`idcarrito`),
  ADD KEY `id-ropa_idx` (`id-ropa`);

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
  MODIFY `idcarrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `historico_compras`
--
ALTER TABLE `historico_compras`
  MODIFY `idhistorico` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ropa`
--
ALTER TABLE `ropa`
  MODIFY `id-ropa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `id-ropa` FOREIGN KEY (`id-ropa`) REFERENCES `ropa` (`id-ropa`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
