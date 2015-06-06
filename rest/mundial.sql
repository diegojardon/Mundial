-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 02-06-2014 a las 02:56:42
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `mundial`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partido`
--

CREATE TABLE IF NOT EXISTS `partido` (
  `idPartido` int(11) NOT NULL AUTO_INCREMENT,
  `localPartido` varchar(25) COLLATE latin1_spanish_ci NOT NULL,
  `visitantePartido` varchar(25) COLLATE latin1_spanish_ci NOT NULL,
  `fechaPartido` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `marcadorPartido` varchar(8) COLLATE latin1_spanish_ci NOT NULL,
  `resultadoPartido` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idPartido`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=65 ;

--
-- Volcado de datos para la tabla `partido`
--

INSERT INTO `partido` (`idPartido`, `localPartido`, `visitantePartido`, `fechaPartido`, `marcadorPartido`, `resultadoPartido`) VALUES
(1, 'Brasil', 'Croacia', '2014-06-12 20:00:00', '', 0),
(2, 'Chile', 'Australia', '2014-06-13 21:00:00', '', 0),
(3, 'Mexico', 'Camerun', '2014-06-13 16:00:00', '', 0),
(4, 'Espana', 'Holanda', '2014-06-13 19:00:00', '', 0),
(5, 'Bosnia-Herzegovina', 'Iran', '2014-06-25 16:00:00', '', 0),
(6, 'Argelia', 'Rusia', '2014-06-26 20:00:00', '', 0),
(7, 'Colombia', 'Grecia', '2014-06-14 16:00:00', '', 0),
(8, 'Uruguay', 'Costa Rica', '2014-06-14 19:00:00', '', 0),
(9, 'Inglaterra', 'Italia', '2014-06-14 22:00:00', '', 0),
(10, 'Suiza', 'Ecuador', '2014-06-15 16:00:00', '', 0),
(11, 'Francia', 'Honduras', '2014-06-15 19:00:00', '', 0),
(12, 'Argentina', 'Bosnia-Herzegovina', '2014-06-15 22:00:00', '', 0),
(13, 'Iran', 'Nigeria', '2014-06-16 19:00:00', '', 0),
(14, 'Alemania', 'Portugal', '2014-06-16 16:00:00', '', 0),
(15, 'Ghana', 'Estados Unidos', '2014-06-16 22:00:00', '', 0),
(16, 'Belgica', 'Argelia', '2014-06-17 16:00:00', '', 0),
(17, 'Rusia', 'Corea del Sur', '2014-06-17 22:00:00', '', 0),
(18, 'Brasil', 'Mexico', '2014-06-17 19:00:00', '', 0),
(19, 'Camerun', 'Croacia', '2014-06-18 22:00:00', '', 0),
(20, 'Australia', 'Holanda', '2014-06-18 16:00:00', '', 0),
(21, 'Espana', 'Chile', '2014-06-18 19:00:00', '', 0),
(22, 'Colombia', 'Costa de Marfil', '2014-06-19 16:00:00', '', 0),
(23, 'Japon', 'Grecia', '2014-06-19 22:00:00', '', 0),
(24, 'Uruguay', 'Inglaterra', '2014-06-19 19:00:00', '', 0),
(25, 'Italia', 'Costa Rica', '2014-06-20 16:00:00', '', 0),
(26, 'Suiza', 'Francia', '2014-06-20 19:00:00', '', 0),
(27, 'Honduras', 'Ecuador', '2014-06-20 22:00:00', '', 0),
(28, 'Argentina', 'Iran', '2014-06-21 16:00:00', '', 0),
(29, 'Nigeria', 'Bosnia-Herzegovina', '2014-06-21 22:00:00', '', 0),
(30, 'Alemania', 'Ghana', '2014-06-21 19:00:00', '', 0),
(31, 'Estados Unidos', 'Portugal', '2014-06-22 22:00:00', '', 0),
(32, 'Belgica', 'Rusia', '2014-06-22 16:00:00', '', 0),
(33, 'Corea del Sur', 'Argelia', '2014-06-22 19:00:00', '', 0),
(34, 'Corea del Sur', 'Belgica', '2014-06-26 20:00:00', '', 0),
(35, 'Costa de Marfil', 'Japon', '2014-06-15 01:00:00', '', 0),
(36, 'Portugal', 'Ghana', '2014-06-26 16:00:00', '', 0),
(37, 'Camerun', 'Brasil', '2014-06-23 20:00:00', '', 0),
(38, 'Croacia', 'Mexico', '2014-06-23 20:00:00', '', 0),
(39, 'Australia', 'Espana', '2014-06-23 16:00:00', '', 0),
(40, 'Holanda', 'Chile', '2014-06-23 16:00:00', '', 0),
(41, 'Japon', 'Colombia', '2014-06-24 20:00:00', '', 0),
(42, 'Grecia', 'Costa de Marfil', '2014-06-24 20:00:00', '', 0),
(43, 'Italia', 'Uruguay', '2014-06-24 16:00:00', '', 0),
(44, 'Costa Rica', 'Inglaterra', '2014-06-24 16:00:00', '', 0),
(45, 'Honduras', 'Suiza', '2014-06-25 20:00:00', '', 0),
(46, 'Ecuador', 'Francia', '2014-06-25 20:00:00', '', 0),
(47, 'Nigeria', 'Argentina', '2014-06-25 16:00:00', '', 0),
(48, 'Estados Unidos', 'Alemania', '2014-06-26 16:00:00', '', 0),
(49, '1A', '2B', '2014-06-28 18:00:00', '', 0),
(50, '1C', '2D', '2014-06-28 22:00:00', '', 0),
(51, '1B', '2A', '2014-06-29 18:00:00', '', 0),
(52, '1D', '2C', '2014-06-29 22:00:00', '', 0),
(53, '1E', '2F', '2014-06-30 18:00:00', '', 0),
(54, '1G', '2H', '2014-06-30 22:00:00', '', 0),
(55, '1F', '2E', '2014-07-01 18:00:00', '', 0),
(56, '1H', '2G', '2014-07-01 22:00:00', '', 0),
(57, 'G49', 'G50', '2014-07-04 22:00:00', '', 0),
(58, 'G53', 'G54', '2014-07-04 18:00:00', '', 0),
(59, 'G51', 'G52', '2014-07-05 22:00:00', '', 0),
(60, 'G55', 'G56', '2014-07-05 18:00:00', '', 0),
(61, 'G57', 'G58', '2014-07-08 22:00:00', '', 0),
(62, 'G59', 'G60', '2014-07-09 22:00:00', '', 0),
(63, 'P61', 'P62', '2014-07-12 22:00:00', '', 0),
(64, 'G61', 'G62', '2014-07-13 21:00:00', '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quiniela`
--

CREATE TABLE IF NOT EXISTS `quiniela` (
  `idQuiniela` int(11) NOT NULL AUTO_INCREMENT,
  `resultadoQuiniela` tinyint(4) NOT NULL DEFAULT '0',
  `idUsuario` int(11) NOT NULL,
  `idPartido` int(11) NOT NULL,
  PRIMARY KEY (`idQuiniela`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=385 ;

--
-- Volcado de datos para la tabla `quiniela`
--

INSERT INTO `quiniela` (`idQuiniela`, `resultadoQuiniela`, `idUsuario`, `idPartido`) VALUES
(193, 1, 1, 1),
(194, 0, 1, 2),
(195, 3, 1, 3),
(196, 1, 1, 4),
(197, 0, 1, 5),
(198, 0, 1, 6),
(199, 0, 1, 7),
(200, 0, 1, 8),
(201, 0, 1, 9),
(202, 0, 1, 10),
(203, 0, 1, 11),
(204, 0, 1, 12),
(205, 0, 1, 13),
(206, 0, 1, 14),
(207, 0, 1, 15),
(208, 0, 1, 16),
(209, 0, 1, 17),
(210, 0, 1, 18),
(211, 0, 1, 19),
(212, 1, 1, 20),
(213, 0, 1, 21),
(214, 0, 1, 22),
(215, 0, 1, 23),
(216, 0, 1, 24),
(217, 0, 1, 25),
(218, 0, 1, 26),
(219, 0, 1, 27),
(220, 0, 1, 28),
(221, 0, 1, 29),
(222, 0, 1, 30),
(223, 0, 1, 31),
(224, 0, 1, 32),
(225, 0, 1, 33),
(226, 0, 1, 34),
(227, 0, 1, 35),
(228, 0, 1, 36),
(229, 0, 1, 37),
(230, 0, 1, 38),
(231, 0, 1, 39),
(232, 0, 1, 40),
(233, 0, 1, 41),
(234, 0, 1, 42),
(235, 0, 1, 43),
(236, 0, 1, 44),
(237, 0, 1, 45),
(238, 0, 1, 46),
(239, 0, 1, 47),
(240, 0, 1, 48),
(241, 0, 1, 49),
(242, 0, 1, 50),
(243, 0, 1, 51),
(244, 0, 1, 52),
(245, 0, 1, 53),
(246, 0, 1, 54),
(247, 0, 1, 55),
(248, 0, 1, 56),
(249, 0, 1, 57),
(250, 0, 1, 58),
(251, 0, 1, 59),
(252, 0, 1, 60),
(253, 0, 1, 61),
(254, 0, 1, 62),
(255, 0, 1, 63),
(256, 0, 1, 64),
(257, 0, 2, 1),
(258, 0, 2, 2),
(259, 0, 2, 3),
(260, 0, 2, 4),
(261, 0, 2, 5),
(262, 0, 2, 6),
(263, 0, 2, 7),
(264, 0, 2, 8),
(265, 0, 2, 9),
(266, 0, 2, 10),
(267, 0, 2, 11),
(268, 0, 2, 12),
(269, 0, 2, 13),
(270, 0, 2, 14),
(271, 0, 2, 15),
(272, 0, 2, 16),
(273, 0, 2, 17),
(274, 0, 2, 18),
(275, 0, 2, 19),
(276, 0, 2, 20),
(277, 0, 2, 21),
(278, 0, 2, 22),
(279, 0, 2, 23),
(280, 0, 2, 24),
(281, 0, 2, 25),
(282, 0, 2, 26),
(283, 0, 2, 27),
(284, 0, 2, 28),
(285, 0, 2, 29),
(286, 0, 2, 30),
(287, 0, 2, 31),
(288, 0, 2, 32),
(289, 0, 2, 33),
(290, 0, 2, 34),
(291, 0, 2, 35),
(292, 0, 2, 36),
(293, 0, 2, 37),
(294, 0, 2, 38),
(295, 0, 2, 39),
(296, 0, 2, 40),
(297, 0, 2, 41),
(298, 0, 2, 42),
(299, 0, 2, 43),
(300, 0, 2, 44),
(301, 0, 2, 45),
(302, 0, 2, 46),
(303, 0, 2, 47),
(304, 0, 2, 48),
(305, 0, 2, 49),
(306, 0, 2, 50),
(307, 0, 2, 51),
(308, 0, 2, 52),
(309, 0, 2, 53),
(310, 0, 2, 54),
(311, 0, 2, 55),
(312, 0, 2, 56),
(313, 0, 2, 57),
(314, 0, 2, 58),
(315, 0, 2, 59),
(316, 0, 2, 60),
(317, 0, 2, 61),
(318, 0, 2, 62),
(319, 0, 2, 63),
(320, 0, 2, 64),
(321, 0, 4, 1),
(322, 0, 4, 2),
(323, 0, 4, 3),
(324, 0, 4, 4),
(325, 0, 4, 5),
(326, 0, 4, 6),
(327, 0, 4, 7),
(328, 0, 4, 8),
(329, 0, 4, 9),
(330, 0, 4, 10),
(331, 0, 4, 11),
(332, 0, 4, 12),
(333, 0, 4, 13),
(334, 0, 4, 14),
(335, 0, 4, 15),
(336, 0, 4, 16),
(337, 0, 4, 17),
(338, 0, 4, 18),
(339, 0, 4, 19),
(340, 0, 4, 20),
(341, 0, 4, 21),
(342, 0, 4, 22),
(343, 0, 4, 23),
(344, 0, 4, 24),
(345, 0, 4, 25),
(346, 0, 4, 26),
(347, 0, 4, 27),
(348, 0, 4, 28),
(349, 0, 4, 29),
(350, 0, 4, 30),
(351, 0, 4, 31),
(352, 0, 4, 32),
(353, 0, 4, 33),
(354, 0, 4, 34),
(355, 0, 4, 35),
(356, 0, 4, 36),
(357, 0, 4, 37),
(358, 0, 4, 38),
(359, 0, 4, 39),
(360, 0, 4, 40),
(361, 0, 4, 41),
(362, 0, 4, 42),
(363, 0, 4, 43),
(364, 0, 4, 44),
(365, 0, 4, 45),
(366, 0, 4, 46),
(367, 0, 4, 47),
(368, 0, 4, 48),
(369, 0, 4, 49),
(370, 0, 4, 50),
(371, 0, 4, 51),
(372, 0, 4, 52),
(373, 0, 4, 53),
(374, 0, 4, 54),
(375, 0, 4, 55),
(376, 0, 4, 56),
(377, 0, 4, 57),
(378, 0, 4, 58),
(379, 0, 4, 59),
(380, 0, 4, 60),
(381, 0, 4, 61),
(382, 0, 4, 62),
(383, 0, 4, 63),
(384, 0, 4, 64);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuarioUsuario` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `passwordUsuario` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `nombreUsuario` varchar(40) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `usuarioUsuario`, `passwordUsuario`, `nombreUsuario`) VALUES
(1, 'diego', 'diego123', 'Diego Jardon'),
(2, 'test', 'test', 'test'),
(4, 'prueba', 'prueba', 'prueba');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
