-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 13-04-2014 a las 21:06:48
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `conectrabajo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE IF NOT EXISTS `area` (
  `idArea` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT COMMENT 'Id Area',
  `nombreArea` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`idArea`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `candidato`
--

CREATE TABLE IF NOT EXISTS `candidato` (
  `idCandidato` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id Candidato',
  `nombreCandidato` varchar(25) COLLATE latin1_spanish_ci NOT NULL,
  `apellidosCandidato` varchar(35) COLLATE latin1_spanish_ci NOT NULL,
  `correoCandidato` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `celularCandidato` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `fijoCandidato` int(10) NOT NULL,
  `edadCandidato` int(11) NOT NULL,
  `sexoCandidato` varchar(1) COLLATE latin1_spanish_ci NOT NULL,
  `interesesCandidato` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `usuarioCandidato` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `passwordCandidato` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`idCandidato`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE IF NOT EXISTS `empresa` (
  `idEmpresa` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Identificador empresa',
  `nombreEmpresa` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `giroEmpresa` varchar(35) COLLATE latin1_spanish_ci NOT NULL,
  `usuarioEmpresa` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `passwordEmpresa` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`idEmpresa`),
  KEY `idEmpresa` (`idEmpresa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oferta`
--

CREATE TABLE IF NOT EXISTS `oferta` (
  `idOferta` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id Oferta',
  `idEmpresa` int(10) unsigned NOT NULL,
  `nombreOferta` varchar(60) COLLATE latin1_spanish_ci NOT NULL,
  `descripcionOferta` varchar(300) COLLATE latin1_spanish_ci NOT NULL,
  `horarioOferta` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `diasLaboralesOferta` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `tipoPlazaOferta` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `puestoOferta` varchar(25) COLLATE latin1_spanish_ci NOT NULL,
  `sueldoOferta` float NOT NULL,
  `latUbicacionOferta` float NOT NULL,
  `lonUbicacionOferta` float NOT NULL,
  `totalPlazasOferta` int(11) NOT NULL,
  `viajesOferta` tinyint(1) NOT NULL,
  `residenciaOferta` tinyint(1) NOT NULL,
  `fechaCreacionOferta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estatusOferta` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `idArea` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idOferta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seleccion`
--

CREATE TABLE IF NOT EXISTS `seleccion` (
  `idSeleccion` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id Seleccion',
  `idCandidato` int(10) unsigned NOT NULL,
  `idOferta` int(10) unsigned NOT NULL,
  `estatusSeleccion` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `fechaIniciaSeleccion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fechaTerminaSeleccion` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `idEmpresa` int(10) unsigned NOT NULL,
  `nombreOferta` varchar(60) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`idSeleccion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `idUsuario` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Identificador Usuario',
  `nombreUsuario` varchar(20) CHARACTER SET latin1 NOT NULL,
  `passwordUsuario` varchar(15) CHARACTER SET latin1 NOT NULL,
  `tipoUsuario` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
