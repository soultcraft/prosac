-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-12-2017 a las 20:03:31
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prosac_sa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `det_pro`
--

CREATE TABLE `det_pro` (
  `c_de` int(11) NOT NULL,
  `pre_de` float DEFAULT NULL,
  `preu_de` float DEFAULT NULL,
  `uni_de` float DEFAULT NULL,
  `PRODUCTO_c_pro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `c_pro` int(11) NOT NULL,
  `nom_pro` varchar(45) DEFAULT NULL,
  `ti_pro` varchar(45) DEFAULT NULL,
  `can_pro` int(11) DEFAULT NULL,
  `desc_pro` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `c_usu` int(11) NOT NULL,
  `usu_usu` varchar(20) NOT NULL,
  `pas_usu` varchar(20) NOT NULL,
  `nom_usu` varchar(45) DEFAULT NULL,
  `ape_usu` varchar(45) DEFAULT NULL,
  `dni_usu` varchar(8) DEFAULT NULL,
  `direc_usu` varchar(45) DEFAULT NULL,
  `ncel_usu` int(11) DEFAULT NULL,
  `mail_usu` varchar(45) DEFAULT NULL,
  `ti_usu` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`c_usu`, `usu_usu`, `pas_usu`, `nom_usu`, `ape_usu`, `dni_usu`, `direc_usu`, `ncel_usu`, `mail_usu`, `ti_usu`) VALUES
(10001, 'admin', '123456', 'Steven', 'Ayala', '72021000', NULL, NULL, NULL, 'Administrador'),
(10002, 'juanalv', '159753', 'Juan', 'Alvarado', '70481400', 'Cono sur', 952884455, 'juan@gmail.com', NULL),
(10003, 'carloscha', '123456', 'Carlos', 'Chacolli', '48155900', 'Alto del alianza', 952488844, 'Carlos@gmail.com', NULL),
(10004, 'aldairm', '123456', 'Aldair', 'Mendoza', '00481559', 'Cono sur', 952118844, 'aldair@gmail.com', NULL),
(10005, 'daniev', '123456', 'Daniel', 'Veliz', '70490000', 'Ciudad perdida', 950114455, 'daniel@gmail.com', NULL),
(10006, 'angelog', '123456', 'Angelo', 'Godoy', '70481155', 'Cono sur', 950448844, 'angelo@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `c_ve` int(11) NOT NULL,
  `can_ve` int(11) DEFAULT NULL,
  `to_ve` float DEFAULT NULL,
  `fech_ve` date DEFAULT NULL,
  `USUARIO_c_usu` int(11) NOT NULL,
  `PRODUCTO_c_pro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `det_pro`
--
ALTER TABLE `det_pro`
  ADD PRIMARY KEY (`c_de`),
  ADD KEY `fk_DET_PRO_PRODUCTO_idx` (`PRODUCTO_c_pro`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`c_pro`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`c_usu`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`c_ve`),
  ADD KEY `fk_VENTA_USUARIO1_idx` (`USUARIO_c_usu`),
  ADD KEY `fk_VENTA_PRODUCTO1_idx` (`PRODUCTO_c_pro`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `det_pro`
--
ALTER TABLE `det_pro`
  MODIFY `c_de` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `c_usu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10007;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `c_ve` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `det_pro`
--
ALTER TABLE `det_pro`
  ADD CONSTRAINT `fk_DET_PRO_PRODUCTO` FOREIGN KEY (`PRODUCTO_c_pro`) REFERENCES `producto` (`c_pro`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `fk_VENTA_PRODUCTO1` FOREIGN KEY (`PRODUCTO_c_pro`) REFERENCES `producto` (`c_pro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_VENTA_USUARIO1` FOREIGN KEY (`USUARIO_c_usu`) REFERENCES `usuario` (`c_usu`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
