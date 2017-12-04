-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-06-2017 a las 21:50:21
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `canaderural`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(60) NOT NULL,
  `Descripcion` varchar(60) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Valor` int(11) NOT NULL,
  `Tipo_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`ID`, `Nombre`, `Descripcion`, `Cantidad`, `Valor`, `Tipo_ID`) VALUES
(2, 'Tractor', 'tractor, usado , papeles al dia, unico dueño fono 55555555', 1, 10000, 1),
(3, 'Tractor Valmet', 'Nuevo , Automotora Gildemaister , fono 666666666', 1, 10000, 1),
(8, 'Tractor 2', 'tractor, usado , papeles al dia, unico dueño fono 55555555', 1, 10000, 1),
(9, 'Tractor Valmet 2', 'Nuevo , Automotora Gildemaister , fono 666666666', 1, 10000, 1),
(10, 'Tractor 3', 'tractor, usado , papeles al dia, unico dueño fono 55555555', 1, 10000, 1),
(11, 'Tractor Valmet 3', 'Nuevo , Automotora Gildemaister , fono 666666666', 1, 10000, 1),
(12, 'Tractor 4', 'tractor, usado , papeles al dia, unico dueño fono 55555555', 1, 10000, 1),
(13, 'Tractor Valmet 4', 'Nuevo , Automotora Gildemaister , fono 666666666', 1, 10000, 1),
(14, 'Tractor8030', 'Unico dueño , se encuentra en osorno , papeles al dia', 1, 10000, 1),
(15, 'TractorRoman', 'papeles al dia , unico dueño , fono 666666', 1, 10000, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`ID`, `Nombre`) VALUES
(3, 'Implementos'),
(1, 'Maquinaria'),
(4, 'Propiedad'),
(2, 'Remate');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(60) NOT NULL,
  `authkey` char(50) NOT NULL,
  `access_token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `username`, `password`, `authkey`, `access_token`) VALUES
(3, 'administrador', '$2y$13$nMkdfuoU9tJLIBxT.AM5sumlQ/Q7wLS9XLCuFhAkQH8.7rr7ODIMu', '001', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Nombre_UNIQUE` (`Nombre`),
  ADD KEY `fk_Producto_Tipo_idx` (`Tipo_ID`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Nombre_UNIQUE` (`Nombre`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `tipo`
--
ALTER TABLE `tipo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_Producto_Tipo` FOREIGN KEY (`Tipo_ID`) REFERENCES `tipo` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
