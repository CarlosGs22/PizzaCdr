-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 10-05-2021 a las 20:27:18
-- Versión del servidor: 5.7.33-log-cll-lve
-- Versión de PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `uniceqed_ma2`
--
CREATE DATABASE IF NOT EXISTS `uniceqed_ma2` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci;
USE `uniceqed_ma2`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `antecedente`
--

CREATE TABLE `antecedente` (
  `idantecedente` int(11) UNSIGNED NOT NULL,
  `idindiprim` int(11) UNSIGNED NOT NULL,
  `idindisec` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `antecedente`
--

INSERT INTO `antecedente` (`idantecedente`, `idindiprim`, `idindisec`) VALUES
(1, 97, 21),
(2, 97, 22),
(3, 97, 30),
(4, 97, 102),
(5, 97, 103),
(6, 98, 21),
(7, 98, 22),
(8, 98, 30),
(9, 98, 102),
(10, 98, 103),
(12, 99, 105),
(13, 100, 133),
(14, 101, 99),
(15, 101, 100),
(16, 101, 105),
(17, 104, 130),
(18, 105, 40),
(19, 106, 7),
(20, 106, 8),
(21, 106, 9),
(22, 106, 10),
(23, 106, 11),
(24, 106, 12),
(25, 106, 104),
(26, 106, 130),
(27, 106, 133),
(28, 107, 7),
(29, 107, 8),
(30, 107, 9),
(31, 107, 10),
(32, 107, 11),
(33, 107, 12),
(34, 107, 130),
(35, 107, 133),
(36, 108, 7),
(37, 108, 8),
(38, 108, 9),
(39, 108, 10),
(40, 108, 11),
(41, 108, 12),
(42, 108, 111),
(43, 108, 133),
(44, 109, 7),
(45, 109, 8),
(46, 109, 9),
(47, 109, 10),
(48, 109, 11),
(49, 109, 12),
(50, 109, 111),
(51, 109, 133),
(52, 110, 106),
(53, 110, 107),
(54, 111, 26),
(55, 112, 21),
(56, 112, 53),
(57, 113, 112),
(58, 113, 114),
(59, 113, 127),
(60, 114, 129),
(61, 119, 97),
(62, 119, 139),
(63, 119, 68),
(64, 120, 97),
(65, 120, 120),
(66, 120, 139),
(67, 120, 68),
(68, 120, 89),
(69, 120, 90),
(70, 121, 123),
(71, 121, 131),
(72, 122, 123),
(73, 122, 131),
(74, 124, 123),
(75, 125, 123),
(76, 126, 123),
(77, 127, 21),
(78, 127, 24),
(79, 128, 99),
(80, 129, 140),
(81, 130, 7),
(82, 130, 8),
(83, 130, 9),
(84, 130, 10),
(85, 130, 11),
(86, 130, 12),
(87, 130, 112),
(88, 130, 113),
(89, 130, 133),
(90, 131, 101),
(91, 131, 106),
(92, 131, 107),
(93, 131, 108),
(94, 131, 109),
(95, 131, 110),
(96, 131, 112),
(97, 131, 113),
(98, 132, 139),
(99, 132, 140),
(100, 132, 131),
(101, 134, 120),
(102, 138, 7),
(103, 138, 8),
(104, 138, 9),
(105, 138, 10),
(106, 138, 11),
(107, 138, 12),
(108, 138, 112),
(109, 138, 113),
(110, 138, 133),
(111, 139, 120),
(112, 139, 119),
(113, 139, 141),
(114, 139, 82),
(115, 139, 84),
(116, 139, 85),
(117, 140, 21),
(118, 140, 22),
(119, 140, 24),
(120, 18, 26),
(121, 18, 29),
(122, 18, 30),
(123, 18, 31),
(124, 18, 32),
(125, 18, 43),
(126, 21, 15),
(127, 22, 15),
(128, 24, 40),
(129, 25, 40),
(130, 27, 61),
(131, 27, 63),
(132, 28, 61),
(133, 28, 63),
(134, 29, 32),
(135, 29, 67),
(136, 29, 80),
(137, 29, 81),
(138, 30, 31),
(139, 31, 111),
(140, 31, 115),
(141, 31, 116),
(142, 31, 117),
(143, 31, 118),
(144, 31, 21),
(145, 31, 22),
(146, 31, 30),
(147, 31, 43),
(148, 53, 129),
(149, 55, 68),
(150, 55, 70),
(151, 55, 77),
(152, 55, 82),
(153, 55, 96),
(154, 56, 69),
(155, 57, 55),
(156, 58, 27),
(157, 58, 28),
(158, 59, 60),
(159, 59, 62),
(160, 61, 119),
(161, 61, 56),
(162, 61, 57),
(163, 61, 58),
(164, 61, 59),
(165, 61, 60),
(166, 61, 62),
(167, 61, 63),
(168, 61, 72),
(169, 61, 80),
(170, 61, 81),
(171, 61, 33),
(172, 62, 59),
(173, 62, 133),
(174, 63, 119),
(175, 63, 33),
(176, 63, 64),
(177, 63, 83),
(178, 64, 119),
(179, 64, 33),
(180, 65, 101),
(181, 65, 133),
(182, 66, 65),
(183, 66, 119),
(185, 68, 119),
(186, 68, 120),
(187, 68, 141),
(188, 68, 82),
(189, 69, 82),
(190, 70, 70),
(191, 72, 82),
(192, 73, 74),
(193, 73, 75),
(194, 74, 72),
(195, 75, 115),
(196, 75, 116),
(197, 75, 117),
(198, 75, 118),
(199, 78, 79),
(200, 79, 62),
(201, 83, 33),
(202, 87, 86),
(203, 88, 86),
(204, 89, 97),
(205, 89, 98),
(206, 90, 97),
(207, 90, 98),
(208, 90, 89),
(209, 92, 120),
(210, 93, 82),
(211, 94, 121),
(212, 96, 95),
(213, 34, 132),
(214, 35, 141),
(216, 37, 100),
(217, 37, 35),
(218, 38, 82),
(219, 38, 41),
(220, 39, 82),
(221, 40, 39),
(222, 41, 39),
(223, 42, 99),
(224, 43, 141),
(225, 43, 44),
(226, 43, 48),
(227, 43, 49),
(228, 44, 141),
(229, 45, 123),
(230, 46, 123),
(231, 47, 119),
(232, 47, 120),
(233, 47, 141),
(234, 47, 84),
(235, 47, 85),
(236, 48, 123),
(237, 49, 123),
(238, 50, 123),
(239, 50, 45),
(240, 50, 46),
(241, 51, 50),
(242, 52, 50),
(243, 2, 111),
(244, 3, 118),
(245, 4, 141),
(246, 4, 6),
(247, 5, 118),
(248, 6, 118),
(249, 6, 34),
(250, 6, 35),
(251, 10, 13),
(252, 13, 10),
(253, 14, 13),
(254, 15, 22),
(255, 15, 21),
(256, 16, 21),
(257, 16, 22),
(258, 17, 105),
(259, 23, 135),
(260, 66, 66),
(261, 70, 71),
(262, 36, 35),
(263, 3, 116),
(264, 6, 116),
(265, 5, 116);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE `area` (
  `idarea` int(11) NOT NULL,
  `area` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `valor` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`idarea`, `area`, `valor`) VALUES
(1, 'Formación Integral', 10),
(2, 'Desarrollo humano', 15),
(3, 'Desarrollo académico', 25),
(4, 'Desarrollo organizacional', 15),
(5, 'Desarrollo tecnológico', 20),
(6, 'Desarrollo social', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consecuente`
--

CREATE TABLE `consecuente` (
  `idconsecuente` int(11) UNSIGNED NOT NULL,
  `idindiprim` int(11) UNSIGNED NOT NULL,
  `idindisec` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `consecuente`
--

INSERT INTO `consecuente` (`idconsecuente`, `idindiprim`, `idindisec`) VALUES
(1, 97, 119),
(2, 97, 89),
(3, 97, 90),
(4, 98, 120),
(5, 98, 89),
(6, 98, 90),
(7, 99, 101),
(8, 99, 128),
(9, 99, 35),
(10, 100, 101),
(11, 101, 131),
(12, 102, 97),
(13, 102, 98),
(16, 103, 97),
(17, 103, 98),
(18, 104, 106),
(19, 105, 17),
(20, 105, 99),
(21, 105, 101),
(22, 106, 131),
(23, 106, 110),
(24, 107, 131),
(25, 107, 110),
(26, 108, 131),
(27, 109, 131),
(28, 110, 131),
(29, 111, 29),
(30, 111, 30),
(31, 111, 31),
(32, 111, 31),
(33, 111, 108),
(34, 111, 109),
(35, 111, 130),
(36, 111, 138),
(37, 111, 2),
(38, 112, 113),
(39, 112, 130),
(40, 112, 131),
(41, 113, 130),
(42, 113, 131),
(43, 114, 113),
(44, 115, 31),
(45, 115, 75),
(46, 116, 31),
(47, 116, 75),
(48, 116, 3),
(49, 116, 5),
(50, 116, 6),
(51, 117, 31),
(52, 117, 75),
(53, 118, 31),
(54, 118, 75),
(55, 118, 3),
(56, 118, 5),
(57, 118, 6),
(58, 119, 54),
(59, 119, 61),
(60, 119, 63),
(61, 119, 64),
(62, 119, 65),
(63, 119, 66),
(64, 120, 54),
(65, 120, 73),
(66, 120, 92),
(67, 120, 134),
(68, 127, 113),
(69, 128, 131),
(70, 129, 104),
(71, 129, 53),
(72, 130, 106),
(73, 130, 107),
(74, 132, 131),
(75, 132, 34),
(76, 133, 104),
(77, 133, 106),
(78, 133, 107),
(79, 133, 108),
(80, 133, 109),
(81, 133, 114),
(82, 133, 130),
(83, 133, 138),
(84, 134, 121),
(85, 134, 122),
(86, 138, 106),
(87, 138, 107),
(88, 139, 132),
(89, 140, 129),
(90, 140, 132),
(91, 21, 15),
(92, 21, 16),
(93, 21, 31),
(94, 21, 97),
(95, 21, 98),
(96, 21, 112),
(97, 21, 127),
(98, 21, 140),
(99, 22, 15),
(100, 22, 16),
(101, 22, 31),
(102, 22, 97),
(103, 22, 98),
(104, 24, 127),
(105, 24, 129),
(106, 24, 140),
(107, 27, 18),
(108, 27, 19),
(109, 28, 18),
(110, 28, 19),
(111, 29, 18),
(112, 30, 18),
(113, 30, 31),
(114, 30, 31),
(115, 30, 97),
(116, 30, 98),
(117, 31, 18),
(118, 32, 18),
(119, 32, 29),
(120, 53, 112),
(121, 55, 57),
(122, 56, 61),
(123, 57, 61),
(124, 58, 59),
(125, 59, 61),
(127, 62, 60),
(128, 62, 61),
(129, 62, 79),
(130, 63, 62),
(131, 63, 63),
(132, 63, 26),
(133, 64, 63),
(134, 65, 66),
(135, 66, 123),
(136, 66, 131),
(137, 67, 29),
(138, 68, 55),
(139, 69, 56),
(140, 70, 55),
(141, 71, 70),
(142, 72, 61),
(143, 73, 19),
(144, 74, 74),
(145, 75, 73),
(146, 76, 19),
(147, 78, 61),
(148, 79, 78),
(149, 80, 29),
(150, 81, 29),
(151, 83, 63),
(152, 84, 139),
(153, 84, 47),
(154, 85, 139),
(155, 85, 47),
(156, 87, 86),
(157, 89, 90),
(158, 90, 120),
(159, 90, 121),
(160, 91, 96),
(161, 92, 96),
(162, 93, 96),
(163, 94, 95),
(164, 94, 96),
(165, 95, 96),
(166, 96, 55),
(167, 33, 61),
(168, 33, 63),
(169, 33, 64),
(170, 33, 66),
(171, 33, 33),
(172, 34, 6),
(173, 35, 141),
(174, 35, 5),
(175, 35, 6),
(176, 35, 37),
(177, 36, 37),
(178, 38, 99),
(179, 39, 38),
(180, 39, 40),
(181, 39, 42),
(182, 41, 38),
(183, 42, 131),
(184, 43, 18),
(185, 43, 20),
(186, 43, 31),
(187, 44, 43),
(188, 45, 50),
(189, 46, 50),
(190, 47, 132),
(191, 48, 123),
(192, 48, 43),
(193, 49, 43),
(194, 50, 51),
(195, 1, 54),
(196, 1, 73),
(197, 2, 131),
(198, 6, 4),
(199, 7, 106),
(200, 7, 107),
(201, 7, 108),
(202, 7, 109),
(203, 7, 130),
(204, 7, 138),
(205, 7, 54),
(206, 2, 106),
(207, 2, 107),
(208, 2, 108),
(209, 2, 109),
(210, 2, 130),
(211, 2, 138),
(212, 2, 54),
(213, 3, 106),
(214, 3, 107),
(215, 3, 108),
(216, 3, 109),
(217, 3, 130),
(218, 3, 138),
(219, 3, 54),
(220, 8, 98),
(221, 8, 106),
(222, 8, 107),
(223, 8, 108),
(224, 8, 109),
(225, 8, 130),
(226, 8, 138),
(227, 8, 54),
(228, 9, 106),
(229, 9, 107),
(230, 9, 108),
(231, 9, 109),
(232, 9, 130),
(233, 9, 138),
(234, 9, 54),
(235, 10, 13),
(236, 10, 106),
(237, 10, 107),
(238, 10, 108),
(239, 10, 109),
(240, 10, 130),
(241, 10, 138),
(242, 10, 54),
(243, 11, 106),
(244, 11, 107),
(245, 11, 108),
(246, 11, 109),
(247, 11, 130),
(248, 11, 138),
(249, 11, 54),
(250, 12, 106),
(251, 12, 107),
(252, 12, 108),
(253, 12, 109),
(254, 12, 130),
(255, 12, 138),
(256, 12, 54),
(257, 13, 14),
(258, 15, 123),
(259, 16, 123),
(260, 17, 123),
(261, 60, 59);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `iddepartamento` int(11) NOT NULL,
  `departamento` varchar(255) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`iddepartamento`, `departamento`, `estado`) VALUES
(1, 'IDIOMAS', 1),
(2, 'CALIDAD ACADÉMICA', 1),
(3, 'DIRECCIÓN ACADÉMICA', 1),
(4, 'LÍDER DE ACADEMIA', 1),
(5, 'FORMACIÓN INTEGRAL', 1),
(6, 'GESTIÓN DE CALIDAD Y PLANEACIÓN CURRICULAR', 1),
(7, 'GESTIÓN DE SERVICIOS ESCOLARES', 1),
(8, 'TITULACIONES', 1),
(9, 'CAPTACIÓN', 1),
(10, 'CAPITAL HUMANO', 1),
(11, 'JURÍDICO', 1),
(12, 'LABORATORIOS', 1),
(13, 'ASISTENTE DE RECTORÍA', 1),
(14, 'TESORERÍA', 1),
(15, 'FINANZAS', 1),
(16, 'CAJA', 1),
(17, 'CAMPUS VIRTUAL', 1),
(18, 'INFRAESTRUCTURA', 1),
(19, 'TI', 1),
(20, 'DIRECCIÓN DE CONTRALORÍA', 1),
(21, 'EDUCACIÓN CONTINUA', 1),
(22, 'VINCULACIÓN', 1),
(23, 'CONTROL ESCOLAR', 1),
(24, 'INVESTIGACIÓN', 1),
(25, 'FORMACIÓN CULTURAL Y DEPORTIVA', 1),
(26, 'SERVICIO MÉDICO', 1),
(27, 'BIBLIOTECA', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `indicador`
--

CREATE TABLE `indicador` (
  `idindicador` int(11) UNSIGNED NOT NULL,
  `codigo` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `indicador` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `formula` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `periodicidad` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `cuando` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `unidad_medida` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1',
  `tipo` int(11) NOT NULL DEFAULT '1',
  `idarea` int(11) NOT NULL,
  `idniveles` int(11) NOT NULL,
  `iddepartamento` int(11) NOT NULL,
  `cve_fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cve_usuario` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `indicador`
--

INSERT INTO `indicador` (`idindicador`, `codigo`, `indicador`, `formula`, `periodicidad`, `cuando`, `unidad_medida`, `estado`, `tipo`, `idarea`, `idniveles`, `iddepartamento`, `cve_fecha`, `cve_usuario`) VALUES
(1, 'DT01', 'PROYECTOS DE DESARRLLO TECNOLÓGICO CON OTRAS INSTITUCIONES (POSGRADO)', 'PENDIENTE ', 'Anual', '1era semana de Diciembre', 'Número de proyectos por proyecto', 1, 1, 5, 4, 21, '2021-04-06 21:52:00', 9),
(2, 'DT02', '% DE PROFESORES QUE IMPLEMENTAN ALGUNA ACTIVIDAD DE INNOVACIÓN EDUCATIVA EN EL AULA', 'NÚMERO DE PROYECTOS ', 'Anual', 'Finales de año ', 'Número de actividades ', 1, 1, 5, 3, 24, '2021-04-01 16:37:08', 9),
(3, 'DT03', 'PROYECTOS DE INVESTIGACIÓN POR LICENCIATURA', 'NÚMERO DE PROYECTOS ', 'Anual', 'Finales de año ', 'Número de proyectos ', 1, 1, 5, 2, 24, '2021-04-01 16:37:41', 9),
(4, 'DT04', 'PROYECTOS CON AVAL CONACYT', 'NÚMERO DE PROYECTOS ', 'Anual', 'Finales de año ', 'Número de proyectos', 1, 1, 5, 1, 24, '2021-04-02 18:12:50', 9),
(5, 'DT05', 'ARTÍCULOS AL AÑO', 'Número de proyectos ', 'Anual', 'Finales de año ', 'Número de artículos', 1, 1, 5, 1, 24, '2021-04-01 16:38:12', 9),
(6, 'DT06', 'PROYECTOS DE DESARROLLO TECNOLÓGICO CON OTRAS INSTITUCIONES (LICENCIATURA)', 'PENDIENTE ', 'Anual', 'Diciembre', 'PENDIENTE', 1, 1, 5, 2, 22, '2021-04-01 16:38:26', 9),
(7, 'FI01', 'NÚMERO DE EVENTOS CULTURALES EN LOS QUE PARTICIPAN LOS ALUMNOS', 'NÚMERO DE EVENTOS CULTURALES EN LOS QUE PARTICIPAN LOS ALUMNOS / META DEFINIDA ', 'Anual', 'A fin de año', 'Número de eventos ', 1, 1, 1, 4, 25, '2021-03-30 15:31:16', 9),
(8, 'FI02', 'NÚMERO DE PARTICIPANTES A LOS EVENTOS CULTURAL', 'NÚMERO DE PARTICIPANTES A LOS EVENTOS CULTURALES/META ', 'Anual', 'A fin de año', 'Número de alumnos   ', 1, 1, 1, 4, 25, '2021-03-30 15:32:45', 9),
(9, 'FI03', 'NÚMERO DE PARTICIPANTES A LOS EVENTOS DEPORTIVOS', 'NÚMERO DE PARTICIPANTES A LOS EVENTOS DEPORTIVOS/META ', 'Anual', 'A fin de año', 'Número de alumnos ', 1, 1, 1, 4, 25, '2021-03-30 15:33:39', 9),
(10, 'FI04', 'NÚMERO DE EVENTOS DEPORTIVOS EN LOS QUE PARTICIPAN LOS ALUMNOS', 'NÚMERO DE EVENTOS DEPORTIVOS EN LOS QUE PARTICIPAN LOS ALUMNOS/META ', 'Anual', 'A fin de año', 'Número de eventos ', 1, 1, 1, 4, 25, '2021-03-30 15:34:39', 9),
(11, 'FI05', 'ALUMNOS INSCRITOS A TALLERES DE FORMACIÓN CULTURAL', 'ALUMNOS INSCRITOS A TALLERES DE FORMACIÓN CULTURAL /MATRÍCULA CORRESPONDIENTE', 'Cuatrimestral', 'Al término del periodo', 'Número de Pasaportes Sellados ', 1, 2, 1, 4, 25, '2021-03-30 15:35:56', 9),
(12, 'FI06', 'EFICIENCIA DE TERMINACIÓN DEL PROGRAMA DE FORMACIÓN CULTURAL ', 'EFICIENCIA DE TERMINACIÓN DEL PROGRAMA DE FORMACIÓN CULTURAL/ MATRÍCULA CORRESPONDIENTE ', 'Cuatrimestral', 'Al término del periodo', '%  Pasaportes Sellados ', 1, 1, 1, 4, 25, '2021-03-30 15:37:47', 9),
(13, 'FI07', 'ALUMNOS INSCRITOS A TALLERES DE FORMACIÓN DEPORTIVA', 'ALUMNOS INSCRITOS A TALLERES DE FORMACIÓN DEPORTIVA/ META/ MATRÍCULA CORRESPONDIENTE ', 'Cuatrimestral', 'Al término del periodo', 'Número de Pasaportes Sellados ', 1, 2, 1, 4, 25, '2021-03-30 15:55:46', 9),
(14, 'FI08', 'EFICIENCIA DE TERMINACIÓN DEL PROGRAMA DE FORMACIÓN DEPORTIVA ', 'EFICIENCIA DE TERMINACIÓN DEL PROGRAMA DE FORMACIÓN DEPORTIVA/ MATRÍCULA CORRESPONDIENTE ', 'Cuatrimestral', 'Al término del periodo', '% de Pasaportes Sellados ', 1, 1, 1, 1, 25, '2021-03-30 15:59:28', 9),
(15, 'FI09', '% PROGRAMA DE SALUD REALIZADOS', '(NÚMERO DE PROGRAMAS DE SALUD REALIZADOS / NÚMERO DE PROGRAMAS PROGRAMADOS) * 100', 'Anual', 'Al término del periodo', 'Porcentaje', 1, 1, 1, 2, 26, '2021-03-30 16:00:44', 9),
(16, 'FI10', '% CAMPAÑAS DE SALUD REALIZADAS', '(NÚMERO DE CAMPAÑAS DE SALUD REALIZADAS / NÚMERO DE CAMPAÑAS PROGRAMADAS) * 100', 'Anual', 'Al término del periodo', 'Porcentaje', 1, 1, 1, 2, 26, '2021-03-30 16:01:44', 9),
(17, 'FI11', '% CERTIFICADOS MÉDICOS A ALUMNOS', '(NÚMERO DE CERTIFICADOS MÉDICOS /NÚMERO TOTAL DE ALUMNOS ACTIVOS) * 100', 'Anual', 'Al término del periodo', 'Porcentaje', 1, 1, 1, 2, 26, '2021-03-30 16:02:43', 9),
(18, 'DH01', 'CALIFICACIÓN DE ENCUESTA DE CLIMA ORGANIZACIONAL', 'PROMEDIO MAYOR AL 85 % DE OPTIMIZACION ', 'Anual', 'EN EL MES DE ABRIL', '% DE SATISFACCION ', 1, 2, 2, 1, 10, '2021-03-30 16:22:33', 9),
(19, 'DH02', 'SATISFACCIÓN DEL CLIENTE INTERNO', 'PROMEDIO DE SATISFACCIÓN', 'Semestral', 'ULTIMA SEMANA DE CADA SEMESTRE (AÑO NATURAL)', '# DE SERVICIOS BRINDADOS ', 1, 2, 2, 1, 10, '2021-03-30 16:23:22', 9),
(20, 'DH03', 'SATISFACCIÓN DEL CLIENTE EXTERNO', 'PROMEDIO DE SATISFACCIÓN', 'Cuatrimestral', 'ULTIMA SEMANA DE CADA CUATRIMESTRE ', '# DE SERVICIOS BRINDADOS ', 1, 2, 2, 1, 10, '2021-03-30 16:24:14', 9),
(21, 'DH04', 'EXPEDIENTES ELECTRONICOS Y FISICOS  DE DOCENTES', 'CON BASE AL CHECK LIST / CERO DESVIACIONES ', 'Cuatrimestral', '15 DIAS POSTERIORES A HABER INICIADO EL CUATRIMESTRE ', '# DE CONTRATACIONES', 1, 1, 2, 3, 10, '2021-03-30 16:25:15', 9),
(22, 'DH05', 'EXPEDIENTES ELECTRONICOS Y FISICOS  DE ADMINISTRATIVOS ', 'CON BASE AL CHECK LIST / CERO DESVIACIONES ', 'Semestral', 'ULTIMA SEMANA DE CADA SEMESTRE (AÑO NATURAL)', '# DE CONTRATACIONES', 1, 1, 2, 3, 10, '2021-03-30 16:26:01', 9),
(23, 'DH06', 'ARCHIVO MUERTO ', 'CLASIFICACION / ORDEN / DEPURACION ', 'Semestral', 'ULTIMA SEMANA DE CADA SEMESTRE (AÑO NATURAL)', '# DE HALLAZGOS ', 1, 1, 2, 3, 10, '2021-03-30 16:26:53', 9),
(24, 'DH07', 'CONTRATACION DOCETE', '# DE CONTRATADOS CON BASE AL # DE REQUISISIONES  EMITIDAS POR EL AREA ACADEMICA', 'Cuatrimestral', 'SEGUNDA SEMANA DE  INICIO DE CADA CUATRIMESTRE', '# DE REQUISICIONES ', 1, 1, 2, 3, 10, '2021-03-30 16:27:50', 9),
(25, 'DH08', 'CONTRATACIÓN DE ADMINISTRATIVOS', '# DE CONTRATADOS CON BASE AL # DE REQUISISIONES  EMITIDAS POR LOS RESPONSABLES DE CADA AREA.', 'Anual', 'PRIMERAS DOS SEMANAS  AL INICIAR EL AÑO NATURAL', '# DE REQUISICIONES ', 1, 1, 2, 1, 10, '2021-03-30 16:28:42', 9),
(26, 'DH09', 'PLAN DE CAPACITACIÓN', 'CON BASE AL NUMERO DE CAPACITACIONES PROGRAMADAS EN EL AÑO ', 'Anual', 'AL FINALIZAR EL AÑO', 'Gasto Vs Presupuesto', 1, 1, 2, 4, 10, '2021-03-30 16:29:39', 9),
(27, 'DH10', 'PROCESO DE NÓMINA QUINCENAL', 'CERO DESVIACIONES', 'Quincenal', 'AL CONCLUIR PROCESO QUINCENAL ', '# DE RECLAMACIONES', 1, 1, 2, 3, 10, '2021-03-30 16:30:35', 9),
(28, 'DH11', 'PROCESO DE NÓMINA MENSUAL ', 'CERO DESVIACIONES', 'Mensual', 'AL CONCLUIR PROCESO MENSUAL ', '# DE RECLAMACIONES', 1, 2, 2, 3, 10, '2021-03-30 16:31:21', 9),
(29, 'DH12', '% CUMPLIMIENTO DE ACUERDOS DE MEJORA', '(# ACUERDOS DE SEGUIMIENTO DE MEJORA CUMPLIDOS / # ACUERDOS DE SEGUIMIENTO DE MEJORA REQUERIDOS) * 100', 'Cuatrimestral', 'primera quincena posterior al periodo', 'PORCENTAJE', 1, 1, 2, 3, 6, '2021-03-30 16:32:26', 9),
(30, 'DH13', 'PROGRAMA DE SEGURIDAD UNIVERSITARIA (SIMULACROS)', 'REAL/PROGRAMADO', 'Cuatrimestral', 'Segunda quincena de cada cuatro meses', 'PORCENTAJE', 1, 1, 2, 3, 11, '2021-03-30 16:33:23', 9),
(31, 'DH14', 'PROGRAMA DE CERTIFICACIONES DEL CENTRO DE TRABAJO', 'REAL/PROGRAMADO', 'Semestral', 'Primer semana de cada semestre', 'PORCENTAJE', 1, 1, 2, 3, 11, '2021-03-30 16:34:18', 9),
(32, 'DH15', '% DE ÁREAS AUDITADAS PARA PREVENSIÓN DE RIESGO', '% DE ÁREAS AUDITADAS PARA PREVENSIÓN DE RIESGO', 'Bimestral', 'Primer semana de cada bimestre ', 'PORCENTAJE', 1, 1, 2, 3, 11, '2021-03-30 16:35:11', 9),
(33, 'DS01', 'NÚMERO DE OFERTA DE EDUCACIÓN CONTÍNUA', 'OFERTA DE EDUCACIÓN CONTINUA/ META ', 'Anual', 'Primera semana de Diciembre', 'Número de programas', 1, 2, 6, 4, 21, '2021-03-30 16:55:17', 9),
(34, 'DS02', 'MOVILIDAD DE LOS ESTUDIANTES', 'ALUMNOS EN MOVILIDAD/ MATRICULA TOTAL ', 'Anual', 'Diciembre', 'Número de alumnos en programas de movilidad', 1, 1, 6, 2, 21, '2021-03-30 16:57:59', 9),
(35, 'DS03', 'PROGRAMA DE EMPRENDIMIENTO', 'REALIZACIÓN ', 'Anual', 'Diciembre', 'Número de proyectos de emprendimiento', 1, 1, 6, 3, 21, '2021-03-30 16:59:05', 9),
(36, 'DS04', 'PARTICIPACIÓN EN EVENTOS DE EMPRENDIMIENTO', 'PARTICIPANTES/ EVENTOS DE EMPRENDIMIENTO ', 'Anual', 'Diciembre', 'Número de eventos', 1, 1, 6, 3, 21, '2021-03-30 16:59:53', 9),
(37, 'DS05', 'FERIA DE EMPREDEDORES', 'REALIZACIÓN ', 'Anual', 'Octubre', 'Número de participantes (visitantes y proyectos)', 1, 1, 6, 1, 21, '2021-03-30 17:01:08', 9),
(38, 'DS06', 'COSTO DEL ALUMNO', 'ALUMNOS CAPTADOS/PRESUPUESTO EJERCIDO ', 'Anual', 'Octubre', 'Reporte de resultados de campaña', 1, 2, 6, 3, 9, '2021-03-30 17:05:16', 9),
(39, 'DS07', 'IMPACTO EN LOS ALUMNOS EN LOS DIFERENTES CANALES DE COMUNICACIÓN INSTITUCIONAL', 'ALUMNOS CAPTADOS/MEDIO DE DIFUSIÓN ', 'Anual', 'Octubre', 'Reporte de inscritos ', 1, 1, 6, 3, 9, '2021-03-30 17:18:27', 9),
(40, 'DS08', 'CUMPLIMIENTO DE OBJETIVOS (GRUPOS APERTURADOS)', 'GRUPOS APERTURADOS/ META ESTABLECIDA ', 'Anual', 'Octubre', 'Número de grupos', 1, 2, 6, 1, 9, '2021-03-30 17:19:26', 9),
(41, 'DS09', 'DISEÑO CORPORATIVO', 'PRESENTACIÓN Y APROBACIÓN ', 'Anual', 'Dependiendo el momento del cambio de campaña ', 'Presentación y autorización de campaña ', 1, 1, 6, 2, 9, '2021-03-30 17:20:22', 9),
(42, 'DS10', 'GESTIÓN DE BECAS', 'NÚMERO DE ALUMNOS INSCRITOS Y REINSCRITOS /NÚMERO DE BECAS', 'Cuatrimestral', 'Un mes antes del término del cuatrimestre/ semestre', 'Número de alumnos inscritos y reinscritos /Número de becas', 1, 1, 6, 2, 23, '2021-03-30 17:21:19', 9),
(43, 'DS11', 'PROGRAMA DE RESPONSABILIDAD SOCIAL', 'REALIZACIÓN ', 'Anual', 'Noviembre', 'Índice de impacto', 1, 1, 6, 2, 22, '2021-03-30 17:22:40', 9),
(44, 'DS12', 'PROGRAMA DE DESARROLLO PROFESIONAL CON IMPACTO SOCIAL', 'REALIZACIÓN ', 'Semestral', '2da semana de Enero y Agosto', 'Número de alumnos   ', 1, 1, 6, 2, 22, '2021-03-30 17:23:40', 9),
(45, 'DS13', 'BOLSA DE TRABAJO (ALUMNOS)', 'ALUMNOS REGISTRADOS EN LA PLATAFORMA/ MATRÍCULA CORRESPONDIENTE ', 'Bimestral', 'Semestral', 'Número de alumnos', 1, 2, 6, 2, 22, '2021-03-30 17:24:37', 9),
(46, 'DS14', 'BOLSA DE TRABAJO (VACANTES)', 'VACANTES OFERTADAS/ LICENCIATURA ', 'Anual', 'Diciembre', 'Número de vacantes', 1, 2, 6, 2, 22, '2021-03-30 17:25:40', 9),
(47, 'DS15', 'CONVENIOS REALIZADOS', 'CONVENIOS /META ESTABLECIDA', 'Quincenal', '2da semana del mes', 'Número de empresa, institución, etc.', 1, 1, 6, 2, 22, '2021-03-30 17:26:47', 9),
(48, 'DS16', ' ALUMNOS EN SERVICIO SOCIAL Y PRÁCTICAS PROFESIONALES', 'ALUMNOS EN SERVICIO SOCIAL Y PRÁCTICAS PROFESIONALES /MATRÍCULA CORRESPONDIENTE ', 'Cuatrimestral', 'Cada final de Cuatrimestre', '% alumnos con carta aceptación ', 1, 2, 6, 2, 22, '2021-03-30 17:27:42', 9),
(49, 'DS17', 'ALUMNOS QUE TERMINARON SERVICIO SOCIAL Y PRÁCTICAS PROFESIONALES', ' ALUMNOS QUE TERMINARON SERVICIO SOCIAL Y PRÁCTICAS PROFESIONALES /MATRICULA CORRESPONDIENTE ', 'Cuatrimestral', 'Cada final de Cuatrimestre', '%alumnos con carta de terminación', 1, 2, 6, 2, 22, '2021-03-30 17:28:32', 9),
(50, 'DS18', '% DE ALUMNOS INTEGRADOS AL CAMPO LABORAL CORRESPONDIENTE', 'ALUMNOS INTEGRADOS AL CAMPO LABORAL CORRESPONDIENTE/ EGRESADOS ', 'Anual', '1era semana de Diciembre', '% de  alumnos', 1, 2, 6, 1, 22, '2021-03-30 17:29:29', 9),
(51, 'DS19', 'ENCUESTA DE SATISFACCIÓN A EMPRESAS CON ALUMNOS EGRESADOS', 'SATISFACCIÓN ALCANZADA /META ESTABLECIDA ', 'Cuatrimestral', 'Al finalizar cada cuatrimestre o Semestre (enfermería)', '% de encuestas realizadas', 1, 1, 6, 1, 22, '2021-03-30 17:30:15', 9),
(52, 'DS20', 'ESTUDIO DE EGRESADOS ', 'REPORTE DE ESTUDIO ', 'Anual', 'Diciembre', 'Reporte', 1, 1, 6, 1, 22, '2021-03-30 17:31:07', 9),
(53, 'DO01', 'REPORTE DE INCIDENCIAS', 'NÚMERO DE SINIESTROS', 'Anual', 'Último día del mes de diciembre', 'Número de incidencias por año de clase de laboratorio (Reporte)', 1, 1, 4, 3, 12, '2021-03-30 17:41:17', 9),
(54, 'DO02', 'SATISFACCIÓN EN EL SERVICIO TOTAL ', 'PROMEDIO DE SATISFACCIÓN', 'Anual', 'Al término del periodo', 'Reporte', 1, 1, 4, 1, 13, '2021-03-30 17:42:33', 9),
(55, 'DO03', '# DE INVENTARIOS TERMINADOS', '# DE INVENTARIOS TERMINADOS', 'Mensual', 'Se realizara cada mes por la entra y salida de material.', '#De inventarios realizados/los adquiridos en compras', 1, 1, 4, 3, 14, '2021-03-30 17:43:22', 9),
(56, 'DO04', '% AHORRO / PRODUCTIVIDAD vs cotizaciones originales.', '$PRES-$GTO.TOTAL/PRES*100', 'Semestral', 'ENERO/ AGOSTO', '% DE AHORRO', 1, 1, 4, 3, 14, '2021-03-30 17:44:08', 9),
(57, 'DO05', '% DESVIACIONES VS INVENTARIO DE ACTIVO FIJO.', 'INV.FIJO-DESV./INV.FIJO * 100', 'Semestral', 'ENRO/AGOSTO', '%DESVIACION', 1, 1, 4, 3, 14, '2021-03-30 19:54:52', 9),
(58, 'DO06', '% DESVIACIÓN EN CONTROL PAGOS.', '(CTA.X PAGAR)(10%)', 'Mensual', 'Todos los meses con el Estado de Resultados', '%DESVIACION', 1, 1, 4, 3, 14, '2021-03-30 17:47:56', 9),
(59, 'DO07', '# CONCILIACIONES CUENTAS BANCARIAS REALIZADAS.', '#EDO.CTA.BANCO-#REPORTE CAJA', 'Mensual', 'Se realiza en todos los meses con el Edo de Cuentas de Bancos con el reporte de Caja', '# de conciliaciones', 1, 1, 4, 3, 14, '2021-03-30 17:48:48', 9),
(60, 'DO08', '$ DESVIACIONES EN ARQUEOS DE CAJA.', '$REG.CAJA-$CAJA', 'Mensual', 'Se realiza con los arqueos de caja mensualmente', '≤ 100', 1, 1, 4, 3, 14, '2021-03-30 17:49:37', 9),
(61, 'DO09', 'REPORTE MENSUAL PARA RECTORIA INGRESOS/ EGRESOS ', 'REAL/PRESUPUESTO', 'Mensual', '2da semana del mes siguiente', '$', 1, 1, 4, 1, 15, '2021-03-30 17:50:52', 9),
(62, 'DO10', 'DEUDORES', 'MONTO DE DEUDA/PRESUPUESTO', 'Mensual', '1er día de cada mes', '$ por alumno y concepto de adeudo', 1, 2, 4, 3, 16, '2021-03-30 17:51:43', 9),
(63, 'DO11', 'INGRESOS', 'INGRESOS REALES/PRESUPUESTO', 'Diario', 'Todos los días antes de las 12 del día de lunes a viernes', '$', 1, 2, 4, 3, 16, '2021-03-30 17:52:26', 9),
(64, 'DO12', 'VENTA DE KITS', 'REAL/PRESUPUESTO', 'Mensual', '1er día de cada mes', '$', 1, 1, 4, 3, 16, '2021-03-30 17:53:13', 9),
(65, 'DO13', '# DE ESPACIOS VIRTUALES', 'ESPACIOS VIRTUALES / ESPACIOS TOTALES', 'Cuatrimestral', 'Enero  y Agosto de  cada año', 'Número de Espacios virtuales creados anualmente', 1, 1, 4, 3, 17, '2021-03-30 17:54:00', 9),
(66, 'DO14', '# DE ALUMNOS ACTIVOS', 'ALUMNOS ACTIVOS EN CAMPUS VIRTUAL/MATRICULA TOTAL', 'Cuatrimestral', 'Enero  y Agosto de  cada año', 'Incremento de alumnos nuevos', 1, 1, 4, 3, 17, '2021-03-30 17:54:52', 9),
(67, 'DO15', '# DE OBSERVACIÓN DE AUDITORÍA INTERNA RECIBIDA Y CERRADA', '#', 'Mensual', 'Reportes solicitados y atendido', '# Auditorias', 1, 1, 4, 3, 18, '2021-03-30 17:55:52', 9),
(68, 'DO16', '% DE CUMPLIMIENTO DEL PLAN ANUAL DE MANTENIMIENTO DE LA INFRAESTRUCTURA', '%', 'Mensual', 'Solicitudes atendidas', '100%', 1, 1, 4, 3, 18, '2021-03-30 17:56:49', 9),
(69, 'DO17', '# DE PROYECTOS DE AHORRO POR COLABORADOR Y ÁREA', '#', 'Mensual', 'Reportes solicitados y atendido', '# Ordenes de Servicio', 1, 1, 4, 3, 18, '2021-03-30 17:57:44', 9),
(70, 'DO18', 'CONTROL DE INVENTARIO (LABORATORIOS)', 'NÚMERO DE MATERIAL Y EQUIPO', 'Mensual', 'Mensual y semestral primer día del mes', 'Variación en dinero absoluto de diferencias', 1, 1, 4, 3, 18, '2021-03-30 17:58:50', 9),
(71, 'DO19', 'REPORTE DE INCIDENCIAS (LABORATORIOS)', 'NÚMERO DE SINIESTROS', 'Anual', 'Último día del mes de diciembre', 'Número de incidencias por año de clase de laboratorios', 1, 1, 4, 4, 18, '2021-03-30 17:59:41', 9),
(72, 'DO20', 'EFICIENCIA PRESUPUESTAL', 'GASTO/PRESUPUESTO', 'Anual', 'En el mes de Octubre', 'PORCENTAJE', 1, 1, 4, 3, 19, '2021-03-30 18:00:30', 9),
(73, 'DO21', 'CALIFICACIÓN DE SATISFACCIÓN EN EL TOTAL DE SERVICIOS ', 'PORCENTAJE EXPRESADO EN LOS SERVICIOS ATENDIDOS/100% DE LOS SERVICIOS SOLICITADOS', 'Mensual', 'A finales del ultimo mes', 'PORCENTAJE', 1, 1, 4, 3, 19, '2021-03-30 18:01:27', 9),
(74, 'DO22', 'REALIZACIÓN DE MANTENIMIENTO A EQUIPO DE COMPUTO DE LA UNIVERSIDAD', 'NUMERO DE EQUIPOS CON MANTENIMIENTO EFECTUADO/EQUIPOS PLANEADOS PARA DARLE MANTENIMIENTO', 'Cuatrimestral', 'Semana Vacacional de Alumnos', 'PORCENTAJE', 1, 1, 4, 3, 19, '2021-03-30 18:02:17', 9),
(75, 'DO23', 'APOYO EN SEGUIMIENTO TECNOLOGICO EN PROYECTOS DE LIDERES DE ACADEMIA Y ADMINISTRATIVOS', 'PROYECTOS ATENDIDOS / PROYECTOS REALIZADOS', 'Anual', 'En el mes de Octubre', 'PORCENTAJE', 1, 1, 4, 3, 19, '2021-03-30 18:03:06', 9),
(76, 'DO24', 'SATISFACCIÓN DEL SERVICIO DEL PROVEEDOR DE COMIDA', 'CERO DESVIACIONES', 'Semestral', 'A TRAVES DE ENCUESTA A LOS CLIENTES INTERNOS ', '# DE SERVICIOS DE COMIDA ', 1, 1, 4, 3, 10, '2021-03-30 18:03:56', 9),
(77, 'DO25', 'CONTROL DE INVENTARIO', 'NÚMERO DE MATERIAL Y EQUIPO', 'Mensual', 'Mensual y semestral primer día del mes', 'Variación en dinero absoluto de diferencias', 1, 1, 4, 3, 12, '2021-03-30 18:04:45', 9),
(78, 'DO26', 'EFICIENCIA ECONÓMICA EGRESOS/INGRESOS ', '\"EGRESOS/INGRESOS 90%≤ \"', 'Mensual', 'Se realiza dentro de los 10 dias naturales de cada mes', 'PORCENTAJE', 1, 1, 4, 3, 20, '2021-03-30 18:11:06', 9),
(79, 'DO27', 'CONTROL DE PASIVOS', '\"PASIVO/GASTO 35%≤ \"', 'Anual', 'Se realiza en la Declaración Anual', 'PORCENTAJE', 1, 1, 4, 3, 20, '2021-03-30 18:12:03', 9),
(80, 'DO28', '% DE HALLAZGOS DETECTADOS EN LA AUDITORÍA DE PREVENSIÓN DE RIESGO CONTROL INTERNO', 'HALLAZGOS/SCI 95%', 'Mensual', 'Se realizan al azar y sin previo aviso en  las diferentes areas que tienen flujos en presupuesto', 'PORCENTAJE', 1, 1, 4, 3, 20, '2021-03-30 18:12:48', 9),
(81, 'DO29', '% DE HALLAZGOS DETECTADOS EN LA AUDITORÍA DE PREVENSIÓN DE RIESGO  CONTABLES', 'HALLAZGOS/SCI 95%', 'Anual', 'Se debe realizar por recomendación antes de la junta de accionistas', 'PORCENTAJE', 1, 1, 4, 3, 20, '2021-03-30 18:13:49', 9),
(82, 'DO30', 'PARTIDA PRESUPUESTAL', 'DEFINICIÓN DE PRESUPUESTO', 'Anual', '1 mes antes del inicio de periodo sep-ago', '$', 1, 1, 4, 4, 15, '2021-03-30 18:14:37', 9),
(83, 'DO31', 'INGRESOS POR SERVICIOS ADICIONALES', 'REGISTRO', 'Mensual', '2da semana del mes siguiente', '$', 1, 1, 4, 3, 15, '2021-03-30 18:15:22', 9),
(84, 'DO32', '% DE CONTRATOS, CONVENIOS Y DOCUMENTOS SIMILARES EN TIEMPO Y FORMA', '% DE CONTRATOS, CONVENIOS Y DOCUMENTOS SIMILARES EN TIEMPO Y FORMA', 'Diario', 'Semanalmente', 'PORCENTAJE', 1, 1, 4, 3, 11, '2021-03-30 18:16:08', 9),
(85, 'DO33', 'TIEMPO DE RESPUESTA DE LA REVISIÓN DE CONTRATOS, CONVENIOS Y DOCUMENTOS SIMILARES', 'DIAS PARA ELABORAR EL DOCUMENTO*', 'Semanal', 'Cada tercer día', 'PORCENTAJE', 1, 1, 4, 3, 11, '2021-03-30 18:17:03', 9),
(86, 'DO34', 'CUMPLIMIENTO DE AUDITORÍAS DE ACUERDO AL PLAN ', '#  DE AUDITORÍAS ', 'Cuatrimestral', 'Primera quincena posterior al periodo', 'Número de auditorías ', 1, 1, 4, 1, 21, '2021-03-30 18:17:52', 9),
(87, 'DO35', '% CUMPLIMIENTO DE ACUERDOS DE SEGUIMIENTO CORRECTIVO', '(# ACUERDOS DE SEGUIMIENTO CORRECTIVO CUMPLIDOS / # ACUERDOS DE SEGUIMIENTO CORRECTIVO REQUERIDOS) * 100', 'Cuatrimestral', 'primera quincena posterior al periodo', 'PORCENTAJE', 1, 1, 4, 1, 6, '2021-03-30 18:18:48', 9),
(88, 'DO36', '% CUMPLIMIENTO DE AUDITORIAS DE GESTIÓN DE CALIDAD', '(# AUDITORIAS EJECUTADAS / # AUDITORIAS PROGRAMADAS) * 100', 'Cuatrimestral', 'primera quincena posterior al periodo', 'PORCENTAJE', 1, 1, 4, 1, 6, '2021-03-30 18:20:06', 9),
(89, 'DO37', '% CUMPLIMIENTO DE AUDITORIAS DE NORMATIVIDAD S.E.P.', '(# AUDITORIAS EJECUTADAS / # AUDITORIAS PROGRAMADAS) * 100', 'Cuatrimestral', 'primera quincena posterior al periodo', 'PORCENTAJE', 1, 1, 4, 1, 6, '2021-03-30 18:20:49', 9),
(90, 'DO38', '% CUMPLIMIENTO DE ACUERDOS DE SEGUIMIENTO CORRECTIVO DE NORMATIVIDAD S.E.P.', '(# ACUERDOS DE SEGUIMIENTO CORRECTIVO CUMPLIDOS / # ACUERDOS DE SEGUIMIENTO CORRECTIVO REQUERIDOS) * 100', 'Cuatrimestral', 'primera quincena posterior al periodo', 'PORCENTAJE', 1, 1, 4, 1, 6, '2021-03-30 18:21:31', 9),
(91, 'DO39', '% LIBROS DONADOS CON CARTA DE AGRADECIMIENTO ENTREGADA Y FIRMADA DE RECIBIDO', '#DE CARTAS ENTREGADAS / # DE LIBROS DONADOS', 'Mensual', 'A fin de mes', 'PORCENTAJE', 1, 1, 4, 3, 27, '2021-03-30 18:23:57', 9),
(92, 'DO40', '% LIBROS EN EXISTENCIA VS ESTABLECIDOS EN RVOE´S', '# DE LIBROS EN BIBLIOTECA EN EL CATALOGO DEL ANEXO 3 / # DE LIBROS SOBRE RVOE´S', 'Anual', 'A fin de año', 'PORCENTAJE', 1, 1, 4, 3, 27, '2021-03-30 18:24:40', 9),
(93, 'DO41', '% LIBROS COMPRADOS AUTORIZADOS', '# DE LIBROS COMPRADOS / # DE LIBROS AUTORIZADOS', 'Mensual', 'A fin de mes', 'PORCENTAJE', 1, 1, 4, 3, 27, '2021-03-30 18:25:32', 9),
(94, 'DO42', '% LIBROS DONADOS POR ALUMNOS EN PROCESO DE TITULACIÓN', '# DE LIBROS DONADOS / # DE ALUMNOS EN PROCESO DE TITULACIÓN', 'Mensual', 'A fin de mes', 'PORCENTAJE', 1, 1, 4, 3, 27, '2021-03-30 18:26:20', 9),
(95, 'DO43', '% RECUPERACIÓN DE LIBROS PRESTADOS', '# DE LIBROS PRESTADOS AL USUARIO / # DE LIBROS ENTREGADOS POR EL USUARIO', 'Semanal', 'Al termino de la semana', 'Número de libros', 1, 1, 4, 3, 27, '2021-03-30 18:27:01', 9),
(96, 'DO44', '% DESVIACIÓN DE MATERIAL BIBLIOGRÁFICO VS INVENTARIO', '# DE MATERIAL ACTUAL / # DE MATERIAL EN INVENTARIO', 'Semestral', '3ra semana del mes de junio y diciembre', '% de libros', 1, 1, 4, 3, 27, '2021-03-30 18:27:45', 9),
(97, 'DA01', '% TRÁMITES INGRESADOS DE R.V.O.E. DE PROGRAMAS DE NUEVA OFERTA EDUCATIVA DE ACUERDO AL PLAN', '(# TRÁMITES INGRESADOS DE R.V.O.E. / # TRÁMITES PROGRAMADOS) * 100', 'Anual', 'primera semana de cada año calendario', 'PORCENTAJE', 1, 1, 3, 3, 6, '2021-03-30 19:01:02', 9),
(98, 'DA02', '% TRÁMITES INGRESADOS DE ACTUALIZACIONES A S.E.P. DE ACUERDO AL PLAN', '(# TRÁMITES INGRESADOS DE ACTUALIZACIONES / # TRÁMITES PROGRAMADOS) * 100', 'Anual', 'primera semana de cada año calendario', 'PORCENTAJE', 1, 1, 3, 3, 6, '2021-03-30 19:01:51', 9),
(99, 'DA03', 'ALUMNOS INSCRITOS A NUEVO INGRESO', 'ALUMNOS DE NUEVO INGRESO/ META ESTABLECIDA ', 'Anual', 'Octubre', 'Número de inscritos', 1, 2, 3, 1, 9, '2021-03-30 19:02:33', 9),
(100, 'DA04', 'NÚMERO DE REINGRESOS DADOS DE ALTA EN TIEMPO EN PLATAFORMA ACADEMIC', 'NÚMERO DE SOLICITUDES DE REINGRESOS / NÚMERO DE ALTAS EN ACADEMIC ', 'Cuatrimestral', 'Dos semanas después del inicio del cuatrimestre', 'Número de reingresos del periodo anterior/Número de reingresos del periodo actual', 1, 1, 3, 3, 7, '2021-03-30 19:03:28', 9),
(101, 'DA05', 'PORCENTAJE DE ALTAS ADÉMICAMENTE EN TIEMPO EN PLATAFORMA ACADEMIC ', 'NÚMERO DE ASIGNATURAS / NÚMERO DE ALUMNOS DE ALUMNOS INSCRITOS Y REINSCRITOS ', 'Cuatrimestral', 'Dos semanas después del término del cuatrimestre', '% de alumnos reinscritos% / % de alumnos reinscritos', 1, 1, 3, 3, 7, '2021-03-30 19:04:11', 9),
(102, 'DA06', 'FORMATO 4 SEP', 'NÚMERO DE F4 INGRESADO A LA SEP', 'Cuatrimestral', 'Un mes después del inicio de clases', 'Número de F4 ingresado a la SEP', 1, 1, 3, 3, 7, '2021-03-30 19:05:14', 9),
(103, 'DA07', 'FORMATO 4 SEP', 'NÚMERO DE F4 INGRESADO A LA SEP', 'Semestral', 'Un mes después del inicio de clases', 'Número de F4 ingresado a la SEP', 1, 1, 3, 3, 7, '2021-03-30 19:05:59', 9),
(104, 'DA08', 'ALTA DE CALIFICACIONES EN TIEMPO EN PLATAFORMA ACADEMIC ', 'NÚMERO DE ASIGNATURAS / NÚMERO DE CALIFICACIONES ', 'Mensual', 'Una semana después del cierre de captura por parcial', 'Porcentaje de historiales académicos/ Porcentaje de historiales académicos realizados ', 1, 1, 3, 3, 7, '2021-03-30 19:06:40', 9),
(105, 'DA09', 'NÚMERO DE EXPEDIENTES COMPLETOS DE ALUMNOS DE NUEVO INGRESO ', 'NÚMERO DE ALUMNOS DE NUEVO INGRESO / NÚMERO DE EXPEDIENTES DE ALUMNOS DE NUEVO INGRESO', 'Bimestral', 'Segundo y cuarto mes de inicio de clases', 'Número de alumnos de nuevo ingreso / Porcentaje de expedientes completos de alumnos de nuevo ingreso', 1, 1, 3, 3, 7, '2021-03-30 19:07:24', 9),
(106, 'DA10', 'REPORTE DE ALUMNOS APROBADOS DURANTE UN PERIODO ESCOLAR CUATRIMESTRAL ', 'NÚMERO DE ALUMNOS APROBADOS EN EL PERIODO ACTUAL/NÚMERO ALUMNOS INSCRITOS EN EL PERIODO ACTUAL ', 'Mensual', 'Quince días después del término de periodo de regularización', 'Número de reporte ', 1, 2, 3, 3, 7, '2021-03-30 19:35:38', 9),
(107, 'DA11', 'REPORTE DE ALUMNOS APROBADOS DURANTE UN PERIODO ESCOLAR SEMESTRAL ', 'NÚMERO DE ALUMNOS APROBADOS EN EL PERIODO ACTUAL/NÚMERO ALUMNOS INSCRITOS EN EL PERIODO ACTUAL ', 'Mensual', 'Quince días después del término de periodo de regularización', 'Número de reporte ', 1, 1, 3, 3, 7, '2021-03-30 19:08:57', 9),
(108, 'DA12', 'REPORTE DE BAJAS CUATRIMESTRAL', 'NÚMERO DE ALUMNOS INSCRITOS Y REINSCRITOS / NÚMERO DE BAJAS', 'Cuatrimestral', 'Dos semanas después del término del cuatrimestre', 'Número de reporte ', 1, 2, 3, 4, 7, '2021-03-30 19:35:51', 9),
(109, 'DA13', 'REPORTE DE BAJAS SEMESTRAL ', 'NÚMERO DE ALUMNOS INSCRITOS Y REINSCRITOS / NÚMERO DE BAJAS', 'Semestral', 'Dos semanas después del término del cuatrimestre', 'Número de reporte ', 1, 1, 3, 3, 7, '2021-03-30 19:10:38', 9),
(110, 'DA14', 'TUTORIAS Y ASESORÍAS', 'NÚMERO DE ALUMNOS ATENDIDOS/NÚMERO DE ALUMNOS INSCRITOS Y REINSCRITOS DEL 1 AL 4 PERIODO MODALIDAD ESCOLARIZADA ', 'Cuatrimestral', 'Al finalizar el cuatrimestre', '% de alumnos ', 1, 2, 3, 3, 5, '2021-03-30 19:11:27', 9),
(111, 'DA15', '% DOCENTES TUTORES CAPACITADOS', 'NÚMERO DE TUTORES CAPACITADOS/NÚMERO DE TUTORES', 'Anual', 'Al finalizar el año ', 'Número de tutores', 1, 1, 3, 4, 5, '2021-03-30 19:12:31', 9),
(112, 'DA16', 'REPORTE DE EVALUACIÓN DOCENTE', 'PROMEDIO GENERAL OBTENIDO EN LA EVALUACIÓN', 'Cuatrimestral', 'Al finalizar el cuatrimestre', 'Promedio', 1, 2, 3, 3, 2, '2021-03-30 19:13:25', 9),
(113, 'DA17', 'REPORTE DE CAPACITACIÓN DOCENTE', 'NÚMERO DE DOCENTES CAPACITADOS / NÚMERO DE DOCENTES DEL PERIODO ', 'Anual', 'Septiembre ', 'PORCENTAJE', 1, 1, 3, 3, 2, '2021-03-30 19:14:07', 9),
(114, 'DA18', 'REPORTE DE EVALUACIÓN DE LA PLANEACIÓN DE LA ASIGNATURA', 'NÚMERO DE PLANEACIONES / NÚMERO DE ASIGNATURAS', 'Cuatrimestral', 'Al finalizar el cuatrimestre', 'PORCENTAJE', 1, 1, 3, 3, 2, '2021-03-30 19:14:46', 9),
(115, 'DA19', '% PROFESORES CON NIVEL ACADÉMICO DE LICENCIATURA', 'NÚMERO DE PROFESORES CON LICENCIATURA/NÚMERO TOTAL DE PROFESORES ', 'Cuatrimestral', 'Al iniciar el cuatrimestre', 'PORCENTAJE', 1, 2, 3, 4, 2, '2021-03-30 19:15:29', 9),
(116, 'DA20', '% PROFESORES CON NIVEL ACADÉMICO DE MAESTRÍA', 'NÚMERO DE PROFESORES CON MAESTRÍA/NÚMERO TOTAL DE PROFESORES ', 'Cuatrimestral', 'Al iniciar el cuatrimestre', 'PORCENTAJE', 1, 2, 3, 4, 2, '2021-03-30 19:16:07', 9),
(117, 'DA21', '% PROFESORES CON NIVEL ACADÉMICO DE ESPECIALIDAD', 'NÚMERO DE PROFESORES CON ESPECIALIDAD /NÚMERO TOTAL DE PROFESORES ', 'Cuatrimestral', 'Al iniciar el cuatrimestre', 'PORCENTAJE', 1, 2, 3, 4, 2, '2021-03-30 19:16:53', 9),
(118, 'DA22', '% PROFESORES CON NIVEL ACADÉMICO DE DOCTORADO', 'NÚMERO DE PROFESORES CON DOCTORADO /NÚMERO TOTAL DE PROFESORES ', 'Cuatrimestral', 'Al iniciar el cuatrimestre', 'PORCENTAJE', 1, 2, 3, 4, 2, '2021-03-30 19:17:35', 9),
(119, 'DA23', 'NUEVOS PROGRAMAS EDUCATIVOS ', 'NÚMERO DE NUEVOS PROGRAMAS ACADÉMICOS /NÚMERO DE PROGRAMAS ACADÉMICOS', 'Anual', 'Cada 5 años', 'Número de nuevos programas ', 1, 1, 3, 4, 3, '2021-03-30 19:18:21', 9),
(120, 'DA24', 'PROGRAMAS EDUCATIVOS ACTUALIZADOS', 'NÚMERO PROGRAMAS ACADÉMICOS ACTUALIZADOS /NÚMERO DE PROGRAMAS ACADÉMICOS', 'Anual', 'Cada 5 años', 'Número programas académicos', 1, 1, 3, 4, 3, '2021-03-30 19:19:08', 9),
(121, 'DA26', '% INDICE DE TITULACIÓN', 'NO. DE ALUMNOS TITULADOS / NO. DE ALUMNOS EGRESADOS', 'Cuatrimestral', 'Al final del cuatrimestre ', 'PORCENTAJE', 1, 1, 3, 1, 8, '2021-03-30 19:20:05', 9),
(122, 'DA27', '% EFICIENCIA TITULACIÓN ', 'TOTAL DE ALUMNOS TITULADOS/TOTAL DE ALUMNOS EN F4 PRIMER CUATRIMESTRE', 'Anual', 'Al final de la carrera', '% Número de alumnos titulados ', 1, 1, 3, 1, 8, '2021-03-30 19:20:55', 9),
(123, 'DA28', '% EFICIENCIA TERMINAL  ', 'TOTAL DE ALUMNOS EGRESADOS /TOTAL DE ALUMNOS EN F4 DEL PRIMER PERIODO', 'Anual', 'Al final de la carrera', '% Número de alumnos egresados ', 1, 1, 3, 1, 8, '2021-03-30 19:21:41', 9),
(124, 'DA29', 'CERTIFICADOS VALIDADOS', 'NO. DE CERTIFICADOS ENVIADOS A SEP / NO. DE CERTIFICADOS VALIDADOS POR SEP', 'Cuatrimestral', 'Al final del cuatrimestre o semestre', 'PORCENTAJE', 1, 1, 3, 1, 8, '2021-03-30 19:22:22', 9),
(125, 'DA30', 'TITULOS VALIDADOS ', 'NO. DE TITULOS ENVIADOS A SEP / NO. DE TITULOS VALIDADOS POR SEP', 'Bimestral', 'dos meses a partir de cada ceremonia de titulación', 'PORCENTAJE', 1, 1, 3, 1, 8, '2021-03-30 19:23:09', 9),
(126, 'DA31', 'PROTOCOLOS DE CEREMONIA DE TITULACIÓN', 'NO. DE ALUMNOS TITULADOS / NO. DE CEREMONIAS DE TITULACIÓN', 'Mensual', 'Al concluir la titulación', 'PORCENTAJE', 1, 1, 3, 1, 8, '2021-03-30 19:23:52', 9),
(127, 'DA32', 'INDUCCIÓN ACADÉMICA AL DOCENTE', 'NÚMERO DE DOCENTES DEL PERIODO / NÚMERO DE DOCENTES CON INDUCCIÓN ', 'Cuatrimestral', 'Antes de iniciar el cuatrimestre ', '% Docentes ', 1, 1, 3, 3, 4, '2021-03-30 19:24:41', 9),
(128, 'DA33', 'ALUMNOS CON INDUCCIÓN ACADÉMICA', 'NÚMERO DE ALUMNOS DEL PERIODO / NÚMERO DE ALUMNOS CON INDUCCIÓN ', 'Cuatrimestral', 'Antes de iniciar el cuatrimestre ', '% Alumnos ', 1, 1, 3, 3, 4, '2021-03-30 19:25:46', 9),
(129, 'DA34', 'CLASES PROGRAMADAS VS CLASES DADAS', 'NÚMERO DE CLASES PROGRAMAS/NÚMERO DE CLASES DADAS', 'Cuatrimestral', 'Al iniciar y finalizar el cuatrimestre', '% de clases ', 1, 1, 3, 3, 4, '2021-03-30 19:26:33', 9),
(130, 'DA35', 'ÍNDICE DE APROBACIÓN POR PERIODO LECTIVO ', 'NO. ALUMNOS APROBADOS / TOTAL DE ALUMNOS DE LA ACADEMIA DURANTE EL PERIODO LECTIVO ', 'Cuatrimestral', 'Al finalizar el cuatrimestre', 'Número Alumnos ', 1, 2, 3, 3, 4, '2021-03-30 19:27:17', 9),
(131, 'DA36', 'INDICE DE RETENCIÓN ', 'NÚMERO DE REINSCRITOS / TOTAL DE ALUMNOS ', 'Cuatrimestral', 'Al finalizar el cuatrimestre', 'Número Alumnos ', 1, 2, 3, 2, 5, '2021-03-30 19:28:06', 9),
(132, 'DA37', 'ACTIVIDADES EXTRACURRICULARES (TÓPICO SELECTOS, EVENTOS Y SALIDAS ACADÉMICAS, REUNIONES DE EGRESADOS) ', '#ACTIVIDADES EXTRA CURRICULARES', 'Cuatrimestral', 'Al finalizar el año', 'Número de eventos', 1, 2, 3, 2, 4, '2021-03-30 19:28:50', 9),
(133, 'DA38', 'PORTAFOLIO DE EVIDENCIAS DE APRENDIZAJE', 'NÚMERO DE PORTAFOLIO ENTREGADOS/NÚMERO DE MATERIAS ', 'Cuatrimestral', 'Al finalizar el cuatrimestre', 'Número de Asignaturas ', 1, 1, 3, 4, 4, '2021-03-30 19:29:44', 9),
(134, 'DA39', 'ACTUALIZACIÓN DE PROGRAMAS PARA TITULACIÓN ', 'N. DE PROGRAMAS PARA TITULACIÓN ACTUALIZADOS/N. DE PROGRAMAS DE TITULACIÓN ', 'Anual', 'Al final el año', 'Número de programas para Titulación', 1, 1, 3, 3, 4, '2021-03-30 19:30:23', 9),
(135, 'DA40', 'INDICE DE TITULACIÓN', 'NO. DE ALUMNOS TITULADOS EN PROGRAMAS DE TITULACIÓN CREADOS POR EL LÍDER /NO. DE EGRESADOS ', 'Anual', 'Al final del cuatrimestre ', '% Número de alumnos titulados ', 1, 1, 3, 2, 4, '2021-03-30 19:31:19', 9),
(136, 'DA41', 'EFICIENCIA TITULACIÓN ', 'TOTAL DE ALUMNOS TITULADOS / TOTAL DE ALUMNOS REPORTADO EN F4 EN EL PRIMER PERIODO', 'Anual', 'Al final de la carrera', '% Número de alumnos titulados ', 1, 1, 3, 1, 4, '2021-03-30 19:32:02', 9),
(137, 'DA42', 'EFICIENCIA TERMINAL  ', 'TOTAL DE ALUMNOS EGRESADOS / TOTAL DE ALUMNOS REPORTADO EN F4 EN EL PRIMER PERIODO', 'Anual', 'Al final de la carrera', '% Número de alumnos egresados ', 1, 2, 3, 1, 4, '2021-03-30 19:32:46', 9),
(138, 'DA43', 'ÍNDICE DE APROBACIÓN ANUAL ', 'NO. ALUMNOS APROBADOS / TOTAL DE ALUMNOS DE LA ACADEMIA ANUALMENTE ', 'Anual', 'Anualmente', 'Número Alumnos ', 1, 2, 3, 3, 4, '2021-03-30 19:33:34', 9),
(139, 'DA44', 'CONVENIOS DE COLABORACIÓN ', 'NO. DE CONVENIOS ', 'Anual', 'Al final el año', 'Número de Convenios', 1, 1, 3, 2, 4, '2021-03-30 19:34:21', 9),
(140, 'DA45', '% HORAS FRENTE A GRUPO ', 'NO. DE HORAS FRENTE A GRUPO / NO. DE HORAS LABORALES A LA SEMANA', 'Cuatrimestral', 'Durante el cuatrimestre', 'Número de horas frente a grupo', 1, 2, 3, 2, 4, '2021-03-30 19:35:06', 9),
(141, 'DA25', 'PROGRAMAS EDUCATIVOS ACREDITADOS ', 'PROGRAMAS EDUCATIVOS ACREDITADOS / PROGRAMAS EDUCATIVOS TOTALES ', 'Anual', 'Después de la planeación estratégica ', 'Número de programas ', 1, 1, 3, 1, 3, '2021-03-30 19:50:52', 9),
(142, '00', 'SISTÉMICO', 'SISTÉMICO', 'Diario', 'Diario', 'PORCENTAJE', 1, 2, 4, 1, 13, '2021-04-21 15:09:04', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `indicador_usuario`
--

CREATE TABLE `indicador_usuario` (
  `id_indicador_usuario` int(11) UNSIGNED NOT NULL,
  `id_indicador` int(11) UNSIGNED NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informe`
--

CREATE TABLE `informe` (
  `idinforme` int(5) UNSIGNED NOT NULL,
  `titulo` varchar(250) NOT NULL,
  `url` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu_web`
--

CREATE TABLE `menu_web` (
  `id_menu_web` int(11) NOT NULL,
  `nombre_web` varchar(25) NOT NULL,
  `icono` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mes`
--

CREATE TABLE `mes` (
  `id` int(11) NOT NULL,
  `mes` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mes`
--

INSERT INTO `mes` (`id`, `mes`) VALUES
(1, 'Enero'),
(2, 'Febrero'),
(3, 'Marzo'),
(4, 'Abril'),
(5, 'Mayo'),
(6, 'Junio'),
(7, 'Julio'),
(8, 'Agosto'),
(9, 'Septiembre'),
(10, 'Octubre'),
(11, 'Noviembre'),
(12, 'Diciembre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `meta_anual`
--

CREATE TABLE `meta_anual` (
  `id` int(11) NOT NULL,
  `anio` varchar(200) NOT NULL,
  `planeado` varchar(200) NOT NULL,
  `alcanzado` varchar(200) NOT NULL,
  `estado` tinyint(4) NOT NULL,
  `id_indicador` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `meta_anual`
--

INSERT INTO `meta_anual` (`id`, `anio`, `planeado`, `alcanzado`, `estado`, `id_indicador`) VALUES
(1, '2021', '100', '100', 1, 80);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `meta_general`
--

CREATE TABLE `meta_general` (
  `id` int(11) NOT NULL,
  `anio` varchar(200) NOT NULL,
  `planeado` int(200) NOT NULL,
  `alcanzado` int(200) NOT NULL,
  `estado` tinytext,
  `id_indicador` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `meta_general`
--

INSERT INTO `meta_general` (`id`, `anio`, `planeado`, `alcanzado`, `estado`, `id_indicador`) VALUES
(1, '2021', 100, 100, '1', 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `meta_mensual`
--

CREATE TABLE `meta_mensual` (
  `id` int(11) NOT NULL,
  `anio` int(11) NOT NULL,
  `mes` int(11) NOT NULL,
  `planeado` decimal(5,1) NOT NULL,
  `alcanzado` decimal(5,1) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `id_indicador` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `meta_mensual`
--

INSERT INTO `meta_mensual` (`id`, `anio`, `mes`, `planeado`, `alcanzado`, `estado`, `id_indicador`) VALUES
(1, 2021, 1, 20.0, 100.0, 0, 4),
(2, 2021, 4, 100.0, 100.0, 1, 1),
(3, 2021, 4, 100.0, 10.0, 1, 2),
(4, 2021, 4, 100.0, 20.0, 1, 3),
(6, 2021, 4, 100.0, 10.0, 1, 4),
(8, 2021, 4, 100.0, 40.0, 1, 5),
(10, 2021, 4, 100.0, 50.0, 1, 6),
(12, 2021, 4, 100.0, 100.0, 1, 7),
(14, 2021, 4, 100.0, 60.0, 1, 8),
(16, 2021, 4, 100.0, 70.0, 1, 9),
(18, 2021, 4, 100.0, 80.0, 1, 10),
(19, 2021, 4, 100.0, 90.0, 1, 12),
(20, 2021, 4, 100.0, 0.0, 1, 15),
(21, 2021, 4, 100.0, 20.0, 1, 16),
(22, 2021, 4, 100.0, 30.0, 1, 17),
(23, 2021, 4, 100.0, 40.0, 1, 21),
(24, 2021, 4, 100.0, 40.0, 1, 22),
(25, 2021, 4, 100.0, 50.0, 1, 23),
(26, 2021, 4, 100.0, 60.0, 1, 24),
(27, 2021, 4, 100.0, 70.0, 1, 25),
(28, 2021, 4, 100.0, 80.0, 1, 26),
(29, 2021, 4, 100.0, 90.0, 1, 27),
(30, 2021, 4, 100.0, 100.0, 1, 29),
(31, 2021, 4, 100.0, 100.0, 1, 30),
(32, 2021, 4, 100.0, 100.0, 1, 31),
(33, 2021, 4, 100.0, 100.0, 1, 32),
(34, 2021, 4, 100.0, 100.0, 1, 34),
(35, 2021, 4, 100.0, 100.0, 1, 35),
(36, 2021, 4, 100.0, 100.0, 1, 36),
(37, 2021, 4, 100.0, 100.0, 1, 37),
(38, 2021, 4, 100.0, 50.0, 1, 39),
(39, 2021, 4, 100.0, 100.0, 1, 41),
(40, 2021, 4, 100.0, 50.0, 1, 42),
(41, 2021, 4, 100.0, 50.0, 1, 43),
(42, 2021, 4, 100.0, 50.0, 1, 44),
(43, 2021, 4, 100.0, 100.0, 1, 47),
(44, 2021, 4, 100.0, 100.0, 1, 51),
(45, 2021, 4, 100.0, 100.0, 1, 52),
(46, 2021, 4, 100.0, 100.0, 1, 53),
(47, 2021, 4, 100.0, 100.0, 1, 54),
(48, 2021, 4, 100.0, 100.0, 1, 55),
(49, 2021, 4, 100.0, 50.0, 1, 56),
(50, 2021, 4, 100.0, 100.0, 1, 57),
(51, 2021, 4, 100.0, 100.0, 1, 58),
(52, 2021, 4, 100.0, 100.0, 1, 59),
(53, 2021, 4, 100.0, 50.0, 1, 60),
(54, 2021, 4, 100.0, 50.0, 1, 61),
(55, 2021, 4, 100.0, 100.0, 1, 64),
(57, 2021, 4, 100.0, 100.0, 1, 65),
(58, 2021, 4, 100.0, 100.0, 1, 66),
(59, 2021, 4, 100.0, 100.0, 1, 67),
(60, 2021, 4, 100.0, 100.0, 1, 68),
(61, 2021, 4, 100.0, 100.0, 1, 69),
(62, 2021, 4, 100.0, 100.0, 1, 70),
(63, 2021, 4, 100.0, 100.0, 1, 71),
(64, 2021, 4, 100.0, 100.0, 1, 72),
(65, 2021, 4, 100.0, 100.0, 1, 73),
(66, 2021, 4, 100.0, 100.0, 1, 74),
(67, 2021, 4, 100.0, 100.0, 1, 75),
(68, 2021, 4, 100.0, 100.0, 1, 76),
(69, 2021, 4, 100.0, 100.0, 1, 77),
(70, 2021, 4, 100.0, 100.0, 1, 78),
(71, 2021, 4, 100.0, 100.0, 1, 79),
(72, 2021, 4, 100.0, 100.0, 1, 81),
(74, 2021, 4, 100.0, 100.0, 1, 82),
(75, 2021, 4, 100.0, 50.0, 1, 83),
(76, 2021, 4, 100.0, 50.0, 1, 84),
(77, 2021, 4, 100.0, 50.0, 1, 85),
(78, 2021, 4, 100.0, 100.0, 1, 86),
(79, 2021, 4, 100.0, 100.0, 1, 87),
(80, 2021, 4, 100.0, 50.0, 1, 88),
(81, 2021, 4, 100.0, 50.0, 1, 89),
(82, 2021, 4, 100.0, 100.0, 1, 90),
(83, 2021, 4, 100.0, 100.0, 1, 91),
(84, 2021, 4, 100.0, 100.0, 1, 92),
(85, 2021, 4, 100.0, 100.0, 1, 93),
(86, 2021, 4, 100.0, 100.0, 1, 94),
(87, 2021, 4, 100.0, 100.0, 1, 95),
(88, 2021, 4, 100.0, 100.0, 1, 96),
(89, 2021, 4, 100.0, 100.0, 1, 97),
(90, 2021, 4, 100.0, 100.0, 1, 98),
(91, 2021, 4, 100.0, 50.0, 1, 100),
(92, 2021, 4, 100.0, 50.0, 1, 101),
(93, 2021, 4, 100.0, 100.0, 1, 102),
(94, 2021, 4, 100.0, 100.0, 1, 103),
(95, 2021, 4, 100.0, 100.0, 1, 104),
(97, 2021, 4, 100.0, 100.0, 1, 105),
(98, 2021, 4, 100.0, 100.0, 1, 107),
(99, 2021, 4, 100.0, 50.0, 1, 109),
(100, 2021, 4, 100.0, 50.0, 1, 111),
(101, 2021, 4, 100.0, 50.0, 1, 113),
(102, 2021, 4, 100.0, 100.0, 1, 114),
(103, 2021, 4, 100.0, 50.0, 1, 119),
(104, 2021, 4, 100.0, 50.0, 1, 120),
(105, 2021, 4, 100.0, 100.0, 1, 121),
(106, 2021, 4, 100.0, 100.0, 1, 122),
(108, 2021, 4, 100.0, 100.0, 1, 123),
(109, 2021, 4, 100.0, 100.0, 1, 124),
(111, 2021, 4, 100.0, 50.0, 1, 125),
(112, 2021, 4, 100.0, 100.0, 1, 126),
(113, 2021, 4, 100.0, 100.0, 1, 127),
(114, 2021, 4, 100.0, 100.0, 1, 128),
(115, 2021, 4, 100.0, 100.0, 1, 129),
(116, 2021, 4, 100.0, 100.0, 1, 133),
(117, 2021, 4, 100.0, 100.0, 1, 134),
(118, 2021, 4, 100.0, 100.0, 1, 135),
(119, 2021, 4, 100.0, 100.0, 1, 136),
(120, 2021, 4, 100.0, 100.0, 1, 139),
(121, 2021, 4, 100.0, 100.0, 1, 141),
(122, 2021, 4, 100.0, 50.0, 1, 11),
(123, 2021, 4, 100.0, 50.0, 1, 13),
(124, 2021, 4, 100.0, 50.0, 1, 18),
(125, 2021, 4, 100.0, 50.0, 1, 19),
(126, 2021, 4, 100.0, 50.0, 1, 20),
(127, 2021, 4, 100.0, 100.0, 1, 28),
(128, 2021, 4, 100.0, 100.0, 1, 33),
(129, 2021, 4, 100.0, 100.0, 1, 38),
(130, 2021, 4, 100.0, 50.0, 1, 40),
(131, 2021, 4, 100.0, 50.0, 1, 45),
(132, 2021, 4, 100.0, 100.0, 1, 46),
(133, 2021, 4, 100.0, 100.0, 1, 48),
(134, 2021, 4, 100.0, 100.0, 1, 49),
(135, 2021, 4, 100.0, 100.0, 1, 50),
(136, 2021, 4, 100.0, 100.0, 1, 62),
(137, 2021, 4, 100.0, 100.0, 0, 63),
(138, 2021, 4, 100.0, 100.0, 1, 99),
(140, 2021, 4, 100.0, 100.0, 1, 106),
(141, 2021, 5, 100.0, 100.0, 0, 63),
(143, 2021, 4, 100.0, 100.0, 1, 108),
(144, 2021, 4, 100.0, 100.0, 0, 110),
(145, 2021, 4, 100.0, 50.0, 1, 112),
(146, 2021, 4, 100.0, 50.0, 1, 115),
(147, 2021, 4, 100.0, 50.0, 1, 117),
(148, 2021, 4, 100.0, 50.0, 1, 118),
(149, 2021, 4, 100.0, 50.0, 0, 130),
(150, 2021, 4, 100.0, 50.0, 1, 131),
(151, 2021, 4, 100.0, 50.0, 1, 132),
(152, 2021, 4, 100.0, 50.0, 1, 137),
(153, 2021, 4, 100.0, 50.0, 1, 138),
(154, 2021, 4, 100.0, 50.0, 1, 140),
(155, 2021, 7, 20.0, 60.0, 1, 110),
(156, 2021, 5, 100.0, 0.0, 0, 2),
(157, 2021, 4, 100.0, 45.5, 1, 142);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `niveles`
--

CREATE TABLE `niveles` (
  `idniveles` int(11) NOT NULL,
  `niveles` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `niveles`
--

INSERT INTO `niveles` (`idniveles`, `niveles`, `estado`) VALUES
(1, 'Resultados', 1),
(2, 'Comunidad', 1),
(3, 'Sistemas y procesos', 1),
(4, 'Aprendizaje', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso_menu`
--

CREATE TABLE `permiso_menu` (
  `idpermiso` int(11) NOT NULL,
  `idusuario` int(11) UNSIGNED NOT NULL,
  `idsubmenu` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `permiso_menu`
--

INSERT INTO `permiso_menu` (`idpermiso`, `idusuario`, `idsubmenu`) VALUES
(247, 9, 9),
(255, 9, 1),
(257, 9, 3),
(258, 9, 7),
(259, 9, 4),
(260, 9, 8),
(262, 9, 5),
(263, 9, 6),
(267, 9, 2),
(288, 9, 11),
(289, 11, 8),
(290, 11, 7),
(292, 10, 2),
(296, 10, 11),
(298, 10, 4),
(299, 12, 2),
(300, 12, 11),
(301, 12, 4),
(302, 13, 4),
(303, 13, 11),
(304, 13, 2),
(305, 9, 12),
(306, 13, 9),
(307, 13, 6),
(308, 1, 1),
(309, 10, 1),
(310, 11, 1),
(311, 12, 1),
(312, 13, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `procesos_tabla_indicadores_1`
--

CREATE TABLE `procesos_tabla_indicadores_1` (
  `LE` varchar(2) CHARACTER SET utf8 DEFAULT NULL,
  `ID` int(11) DEFAULT NULL,
  `REA` varchar(42) CHARACTER SET utf8 DEFAULT NULL,
  `INDICADOR` varchar(102) CHARACTER SET utf8 DEFAULT NULL,
  `F_RMULA` varchar(103) CHARACTER SET utf8 DEFAULT NULL,
  `CRITERIO_BSC` varchar(19) CHARACTER SET utf8 DEFAULT NULL,
  `Periodicidad` varchar(13) CHARACTER SET utf8 DEFAULT NULL,
  `Cu_ndo` varchar(96) CHARACTER SET utf8 DEFAULT NULL,
  `Unidad_de_Medida` varchar(86) CHARACTER SET utf8 DEFAULT NULL,
  `META_2021` varchar(65) CHARACTER SET utf8 DEFAULT NULL,
  `META_2022` varchar(48) CHARACTER SET utf8 DEFAULT NULL,
  `META_2023` varchar(48) CHARACTER SET utf8 DEFAULT NULL,
  `META_2030` varchar(49) CHARACTER SET utf8 DEFAULT NULL,
  `ANTECEDENTES` int(11) DEFAULT NULL,
  `CONSECUENTES` int(11) DEFAULT NULL,
  `INVOLUCRADOS` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `procesos_tabla_indicadores_1`
--

INSERT INTO `procesos_tabla_indicadores_1` (`LE`, `ID`, `REA`, `INDICADOR`, `F_RMULA`, `CRITERIO_BSC`, `Periodicidad`, `Cu_ndo`, `Unidad_de_Medida`, `META_2021`, `META_2022`, `META_2023`, `META_2030`, `ANTECEDENTES`, `CONSECUENTES`, `INVOLUCRADOS`) VALUES
('DA', 11, 'IDIOMAS ', NULL, NULL, 'AP', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('DA', 12, 'IDIOMAS ', NULL, NULL, 'AP', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('DA', 13, 'IDIOMAS ', NULL, NULL, 'AP', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('DA', 14, 'IDIOMAS ', NULL, NULL, 'AP', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('DA', 23, 'CALIDAD ACADÉMICA', '% PROFESORES CON NIVEL ACADÉMICO DE LICENCIATURA', 'Número de profesores/numero de profesores con licenciatura ', 'AP', 'Cuatrimestral', 'Al iniciar y finalizar el cuatrimestre', 'Número de docentes ', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('DA', 24, 'CALIDAD ACADÉMICA', '% PROFESORES CON NIVEL ACADÉMICO DE MAESTRÍA', 'Número de profesores/numero de profesores con maestría', 'AP', 'Cuatrimestral', 'Al iniciar y finalizar el cuatrimestre', 'Número de docentes ', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('DA', 25, 'CALIDAD ACADÉMICA', '% PROFESORES CON NIVEL ACADÉMICO DE DOCTORADO', 'Número de profesores/numero de profesores con doctorado', 'AP', 'Cuatrimestral', 'Al iniciar y finalizar el cuatrimestre', 'Número de docentes ', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('DA', 26, 'CALIDAD ACADÉMICA', '# DE PROGRAMAS EDUCATIVOS ACTUALIZADOS VS # DE PROGRAMAS UNICEQ', 'Número programas académicos/número de programas académicos actualizados', 'AP', 'Anual', 'Cada 5 años', 'Número programas académicos', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('DA', 40, 'LÍDER DE ACADEMIA', 'PORTAFOLIO DE EVIDENCIAS DE APRENDIZAJE', 'Número de portafolio eentregados/Número de materias ', 'AP', 'Cuatrimestral', 'Al finalizar el cuatrimestre', 'Número de Asiganturas ', '0.8', '0.9', '1', NULL, NULL, NULL, NULL),
('DA', 17, 'TUTORES', '% DOCENTES CAPACITADOS EN EL PROGRAMA DE TUTORÍAS', 'Número de tutores/Número de tutores capacitados', 'AP ', 'Anual', 'Al finalizar el año ', 'Número de tutores', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('DA', 37, 'LÍDER DE ACADEMIA', 'INDICE DE RETENCIÓN ', 'Número de bajas / Total de alumnos ', 'CO', 'Cuatrimestral', 'Al finalizar el cuatrimestre', 'Número Alumnos ', '0.1', '0.1', '0.1', NULL, NULL, NULL, NULL),
('DA', 38, 'LÍDER DE ACADEMIA', 'ACTIVIDADES EXTRACURRICULARES (TÓPICO SELECTOS, EVENTOS Y SALIDAS ACADÉMICAS, REUNIONES DE EGRESADOS) ', '#ACTIVIDADES EXTRA CURRICULARES', 'CO', 'Cuatrimestral', 'Al finalizar el año', 'Número de eventos', '4', '0.05', '0.06', NULL, NULL, NULL, NULL),
('DA', 39, 'LÍDER DE ACADEMIA', 'REUNIÓN DOCENTE DURANTE EL PERIODO LECTIVO ', 'Número de reuniones/Número de periodos léctivos ', 'CO', 'Cuatrimestral', 'Al inicio y a mediados del cuatrimestre ', 'Número de reuniones ', '0.03', '0.03', '0.03', NULL, NULL, NULL, NULL),
('DA', 45, 'LÍDER DE ACADEMIA', 'INDICE DE TITULACIÓN', 'No. de alumnos titulados en programas de titulación creados por ellíder /No. de egresados ', 'CO', 'Anual', 'Al final del cuatrimestre ', '% Número de alumnos titulados ', '0.55', '0.6', '0.65', NULL, NULL, NULL, NULL),
('DA', 49, 'LÍDER DE ACADEMIA', '% HORAS FRENTE A GRUPO ', 'No. de horas laborales a la semana/No. de horas frente a grupo ', 'CO', 'Cuatrimestral', 'Al finalizar el cuatrimestre', 'Número de horas frente a grupo', '0.1', '0.12', '0.15', NULL, NULL, NULL, NULL),
('DA', 1, 'GESTIÓN DE CALIDAD Y PLANEACIÓN CURRICULAR', '# PROGRAMAS DE NUEVA OFERTA EDUCATIVA NGRESADOS A S.E.P. PARA R.V.O.E. DE ACUERDO A PLAN', 'NUEVOA OFERTA EDUCATIVA ACREDITADA / SOLICITADA', 'PROCESOS Y SISTEMAS', 'Anual', 'primera semana de cada año calendario', '# PROGRAMAS EDUCATIVOS', '5', '5', '5', NULL, NULL, NULL, NULL),
('DA', 2, 'GESTIÓN DE CALIDAD Y PLANEACIÓN CURRICULAR', '# ACTUALIZACIONES INGRESADOS A S.E.P. PARA R.V.O.E. DE ACUERDO A PLAN', 'ACTUALIZACIÓN DE PLANES ACREDITADA / SOLICITADA', 'PROCESOS Y SISTEMAS', 'Anual', 'primera semana de cada año calendario', '# PROGRAMAS EDUCATIVOS', '5', '5', '5', NULL, NULL, NULL, NULL),
('DA', 4, 'CONTROL ESCOLAR', 'NÚMERO DE REINGRESOS', 'Número de reingresos del periodo anterior/Número de reingresos del periodo actual', 'PS', 'Cuatrimestral', 'Dos semanas después del inicio del cuatrimestre', 'Número de reingresos del periodo anterior/Número de reingresos del periodo actual', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('DA', 5, 'CONTROL ESCOLAR', 'PORCENTAJE DE ALUMNOS INSCRITOS Y REINSCRITOS ADÉMICAMENTE', '% de alumnos reinscritos% / % de alumnos reinscritos', 'PS', 'Cuatrimestral', 'Dos semanas después del término del cuatrimestre', '% de alumnos reinscritos% / % de alumnos reinscritos', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('DA', 6, 'CONTROL ESCOLAR', 'FORMATO 4 SEP', 'Número de F4 ingresado a la SEP', 'PS', 'Cuatrimestral', 'Un mes después del inicio de clases', 'Número de F4 ingresado a la SEP', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('DA', 7, 'CONTROL ESCOLAR', 'EFICIENCIA EN HISTÓRICOS DE CALIFICACIONES', 'Número de historiales académicos/ Número de historiales académicos realizados ', 'PS', 'Mensual', 'Una semana después del cierre de captura por parcial', 'Número de historiales académicos/ Número de historiales académicos realizados ', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('DA', 8, 'CONTROL ESCOLAR', 'NÚMERO DE EXPEDIENTES COMPLETOS', 'Número de alumnos de nuevo ingreso / Número de expedientes de alumnos de nuevo ingreso', 'PS', 'Bimestral', 'Segundo y cuarto mes de inicio de clases', 'Número de alumnos de nuevo ingreso / Número de expedientes de alumnos de nuevo ingreso', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('DA', 9, 'CONTROL ESCOLAR', 'ÍNDICE DE APROBACIÓN/ REPROBACIÓN', 'Número de alumnos totales/ Número de alumnos reprobados', 'PS', 'Cuatrimestral', 'Quince días después del término de periodo de regularización', 'Número de alumnos totales/ Número de alumnos reprobados', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('DA', 10, 'CONTROL ESCOLAR', 'ÍNDICE DE DESERCIÓN', 'Número de alumnos inscritos y reinscritos / Número de bajas', 'PS', 'Cuatrimestral', 'Dos semanas después del término del cuatrimestre', 'Número de alumnos inscritos y reinscritos / Número de bajas', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('DA', 15, 'TUTORES', 'TUTORIAS Y ASESORÍAS', 'Número de alumnos inscritos y reinscritos del 1 al 4 periodo/Número de alumnos atendidos ', 'PS', 'Cuatrimestral', 'Al finalizar el cuatrimestre', 'Número de alumnos ', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('DA', 16, 'TUTORES', '% CUMPLIMIENTO DE PROGRAMA DE TUTORÍAS', 'Número de alumnos Número de alumnos atendidos ', 'PS', 'Cuatrimestral', 'Al finalizar el cuatrimestre', 'Número de alumnos ', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('DA', 18, 'CALIDAD ACADÉMICA', 'ACREDITACIÓN EDUCATIVA', 'Número programas académicos/número de programas académicos acreditados', 'PS', 'Anual', 'Cada 5 años', 'Número programas académicos', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('DA', 19, 'CALIDAD ACADÉMICA', 'PORCENTAJE DE DESEMPEÑO ', 'PROMEDIO DE DESEMPEÑO/PROMEDIO META', 'PS', NULL, 'Al término del periodo', 'Reporte', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('DA', 33, 'LÍDER DE ACADEMIA', 'INDUCCIÓN ACADÉMICA AL DOCENTE', 'Número de docentes del periodo / número de docentes con inducción ', 'PS', 'Cuatrimestral', 'Antes de iniciar el cuatrimestre ', 'Número de Docentes ', '1', '1', '1', NULL, NULL, NULL, NULL),
('DA', 34, 'LÍDER DE ACADEMIA', 'ALUMNOS CON INDUCCIÓN ACADÉMICA', 'Número de alumnos del periodo / número de alumnos con inducción ', 'PS', 'Cuatrimestral', 'Antes de iniciar el cuatrimestre ', 'Número Alumnos ', '1', '1', '1', NULL, NULL, NULL, NULL),
('DA', 35, 'LÍDER DE ACADEMIA', 'CLASES PROGRAMADAS VS CLASES DADAS', 'Número de clases programas/número de clases dadas', 'PS', 'Cuatrimestral', 'Al iniciar y finalizar el cuatrimestre', 'Número de clases ', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('DA', 36, 'LÍDER DE ACADEMIA', '% ALUMNOS REPROBADOS ', 'No. alumnos reprobados/total de alumnos de la academia ', 'PS', 'Cuatrimestral', 'Al finalizar el cuatrimestre', 'Número Alumnos ', '0.2', '0.16', '0.15', NULL, NULL, NULL, NULL),
('DA', 41, 'LÍDER DE ACADEMIA', 'ESTANDARIZAR EL CONTENIDO DEL PORTAFOLIO DE APRENDIZAJE', 'No. de portafolio estandarizados / No. de portafolio entregados ', 'PS', 'Cuatrimestral', 'Al finalizar el cuatrimestre', 'Número de Portafolios de Evidencias ', '0.8', '0.9', '1', NULL, NULL, NULL, NULL),
('DA', 42, 'LÍDER DE ACADEMIA', 'ENTREGA CON PLANEACIÓN DE ASIGNATURA', 'Número de clases/', 'PS', 'Cuatrimestral', 'Al finalizar el cuatrimestre', 'Número de planeaciones de asignatura', '0.8', '0.9', '1', NULL, NULL, NULL, NULL),
('DA', 43, 'LÍDER DE ACADEMIA', 'CUMPLIMIENTO DEL CONTENIDO DE LA PLANEACIÓN DE ASIGNATURA ', 'No. de clases con entrega de planeción de asignatura/ No. de la planeación de asignatura estandarizado ', 'PS', 'Cuatrimestral', 'Al finalizar el cuatrimestre', 'Número de planeaciones de asignatura', '0.7', '0.8', '0.9', NULL, NULL, NULL, NULL),
('DA', 20, 'CALIDAD ACADÉMICA', 'REPORTE DE EVALUACIÓN DOCENTE', 'Número de docentes del periodo / número de docentes evaluados ', 'RE', 'Cuatrimestral', 'Al finalizar el cuatrimestre', 'Número de docentes ', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('DA', 21, 'CALIDAD ACADÉMICA', 'REPORTE DE CAPACITACIÓN DOCENTE', 'Número de docentes del periodo / número de docentes caopacitados ', 'RE', 'Anual', 'Al finalizar el año', 'Número de docentes ', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('DA', 22, 'CALIDAD ACADÉMICA', 'REPORTE DE EVALUACIÓN DE LA PLANEACIÓN DE LA ASIGNATURA', 'Número de asignaturas/número de  planeaciones de asigantura', 'RE', 'Cuatrimestral', 'Al iniciar y finalizar el cuatrimestre', 'Número de asignaturas', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('DA', 27, 'TITULACIONES', '% INDICE DE TITULACIÓN', 'No. de alumnos titulados /No. de egresados ', 'RE', 'Cuatrimestral', 'Al final del cuatrimestre ', '% Número de alumnos titulados ', '0.55', '0.6', '0.65', NULL, NULL, NULL, NULL),
('DA', 28, 'TITULACIONES', '% EFICIENCIA TITULACIÓN ', 'Total de alumnos titulados/total de alumnos en F4 primer cuatrimestre', 'RE', 'Anual', 'Al final de la carrera', '% Número de alumnos titulados ', '0.55', '0.6', '0.65', NULL, NULL, NULL, NULL),
('DA', 29, 'TITULACIONES', '% EFICIENCIA TERMINAL  ', 'Total de alumnos egresados /total de alumnos en F4 del primer periodo', 'RE', 'Anual', 'Al final de la carrera', '% Número de alumnos egresados ', '0.55', '0.6', '0.65', NULL, NULL, NULL, NULL),
('DA', 30, 'TITULACIONES', 'CERTIFICADOS VALIDADOS', '% de Certificados enviados a SEP/ % de Certificados validos  por SEP ', 'RE', 'Cuatrimestral', 'Al final del cuatrimestre ', 'Número de certifcados ', '0.98', '0.99', '1', NULL, NULL, NULL, NULL),
('DA', 31, 'TITULACIONES', 'TITULOS VALIDADOS ', '% de Títulos enviados a SEP/ % de Titulos validos  por SEP ', 'RE', 'Bimestral', 'dos meses apartir de cada ceremonia de titulación', 'Número de titulados ', '0.98', '0.99', '1', NULL, NULL, NULL, NULL),
('DA', 32, 'TITULACIONES', 'PROTOCOLOS DE CEREMONIA DE TITULACIÓN', '% de alumnos titulados/% de ceremonias de titulación ', 'RE', 'Mensual', 'Al concluir la titulación', '% de Ceremonias de Titulación', '0.9', '0.95', '1', NULL, NULL, NULL, NULL),
('DA', 44, 'LÍDER DE ACADEMIA', 'CREACIÓN DE PROGRAMAS PARA TITULACIÓN ', 'N. de programas para titulación/N. de programas actualizados ', 'RE', 'Anual', 'Al final el año', 'Número de programas para Titulación', '1', '1', '1', NULL, NULL, NULL, NULL),
('DA', 46, 'LÍDER DE ACADEMIA', 'EFICIENCIA TITULACIÓN ', 'Total de alumnos titulados/total de alumnos en F4', 'RE', 'Anual', 'Al final de la carrera', '% Número de alumnos titulados ', '0.55', '0.6', '0.65', NULL, NULL, NULL, NULL),
('DA', 47, 'LÍDER DE ACADEMIA', 'EFICIENCIA TERMINAL  ', 'Total de alumnos egresados /total de alumnos en F4 del primer periodo', 'RE', 'Anual', 'Al final de la carrera', '% Número de alumnos egresados ', '0.55', '0.6', '0.65', NULL, NULL, NULL, NULL),
('DA', 48, 'LÍDER DE ACADEMIA', 'CONVENIOS DE COLABORACIÓN ', 'No. de convenios ', 'RE', 'Anual', 'Al final el año', 'Número de Convenios', '3', '3', '3', NULL, NULL, NULL, NULL),
('DA', 3, 'CAPTACIÓN', 'ALUMNOS INSCRITOS A NUEVO INGRESO', 'ALUMNOS DE NUEVO INGRESO/META ESTABLECIDA', 'RE ', 'Anual', 'Octubre', 'Número de inscritos', '400 alumnos inscritos', '500 alumnos inscritos', '600 alumnos inscritos', '650 alumnos inscritos ', NULL, NULL, NULL),
('DH', 9, 'CAPITAL HUMANO', 'PLAN DE CAPACITACIÓN', '# SESIONES DE CAPACITACIÓN', 'AP', 'Semestral', 'AL TERMINO DE CADA CAPACITACION ', 'Gasto Vs Presupuesto', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('DH', 12, 'CALIDAD ACADÉMICA', 'PROGRAMA DE CAPACITACIÓN Y DESARROLLO DOCENTE', 'Número de docentes del periodo / número de docentes caopacitados ', 'AP', 'Anual', 'Al finalizar el año', 'Número de docentes ', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('DH', 4, 'CAPITAL HUMANO', 'EXPEDIENTES ELECTRONICOS Y FISICOS  DE DOCENTES', 'CON BASE AL CHECK LIST / CERO DESVIACIONES ', 'PS', 'Cuatrimestral', '15 DIAS POSTERIORES A HABER INICIADO EL CUATRIMESTRE ', '# DE CONTRATACIONES', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('DH', 5, 'CAPITAL HUMANO', 'EXPEDIENTES ELECTRONICOS Y FISICOS  DE ADMINISTRATIVOS ', 'CON BASE AL CHECK LIST / CERO DESVIACIONES ', 'PS', 'Semestral', 'ULTIMA SEMANA DE CADA SEMESTRE (AÑO NATURAL)', '# DE CONTRATACIONES', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('DH', 6, 'CAPITAL HUMANO', 'ARCHIVO MUERTO ', 'CLASIFICACION / ORDEN / DEPURACION ', 'PS', 'Semestral', 'ULTIMA SEMANA DE CADA SEMESTRE (AÑO NATURAL)', '# DE HALLAZGOS ', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('DH', 14, 'JURÍDICO', 'PROGRAMA DE SEGURIDAD UNIVERSITARIA (SIMULACROS)', 'REAL/PROGRAMADO', 'PS', 'Cuatrimestral', 'Segunda quincena de cada cuatro meses', '%', '1', '1', '1', '1', NULL, NULL, NULL),
('DH', 15, 'JURÍDICO', 'PROGRAMA DE CERTIFICACIONES DEL CENTRO DE TRABAJO', 'REAL/PROGRAMADO', 'PS', 'Semestral', 'Primer semana de cada semestre', '%', '0.5', '0.7', '0.9', '1', NULL, NULL, NULL),
('DH', 1, 'CAPITAL HUMANO', 'CALIFICACIÓN DE ENCUESTA DE CLIMA ORGANIZACIONAL', 'PROMEDIO MAYOR AL 85 % DE OPTIMIZACION ', 'RE', 'Anual', 'EN EL MES DE ABRIL', '% DE SATISFACCION ', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('DH', 2, 'CAPITAL HUMANO', 'SATISFACCIÓN DEL CLIENTE INTERNO', 'PROMEDIO DE SATISFACCIÓN', 'RE', 'Semestral', 'ULTIMA SEMANA DE CADA SEMESTRE (AÑO NATURAL)', '# DE SERVICIOS BRINDADOS ', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('DH', 3, 'CAPITAL HUMANO', 'SATISFACCIÓN DEL CLIENTE EXTERNO', 'PROMEDIO DE SATISFACCIÓN', 'RE', 'Semestral', 'ULTIMA SEMANA DE CADA SEMESTRE (AÑO NATURAL)', '# DE SERVICIOS BRINDADOS ', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('DH', 7, 'CAPITAL HUMANO', 'CONTRATACION DOCETE', '# DE CONTRATADOS EN BASE AL # DE REQUISISIONES  EMITIDAS POR EL AREA ACADEMICA', 'RE', 'Cuatrimestral', 'PRIMER SEMANA DE CADA CUATRIMESTRE', '# DE REQUISICIONES ', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('DH', 8, 'CAPITAL HUMANO', 'CONTRATACIÓN DE ADMINISTRATIVOS', '# DE CONTRATADOS EN BASE AL # DE REQUISISIONES  EMITIDAS ADMINISTRATIVAMENTE', 'RE', 'Anual', 'PRIMER SEMANA POSTERIOR A LA CONTRATACION ', '# DE REQUISICIONES ', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('DH', 10, 'CAPITAL HUMANO', 'PROCESO DE NÓMINA QUINCENAL', 'CERO DESVIACIONES', 'RE', 'Quincenal', 'AL CONCLUIR PROCESO QUINCENAL ', '# DE RECLAMACIONES', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('DH', 11, 'CAPITAL HUMANO', 'PROCESO DE NÓMINA MENSUAL ', 'CERO DESVIACIONES', 'RE', 'Mensual', 'AL CONCLUIR PROCESO MENSUAL ', '# DE RECLAMACIONES', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('DH', 13, 'GESTIÓN DE CALIDAD Y PLANEACIÓN CURRICULAR', 'Cumplimiento de los acuerdos de seguimiento de mejora', '# AUDITORÍAS', 'RESULTADOS', 'Cuatrimestral', 'primera quincena posterior al periodo', '# ACUERDOS', '0.8', '0.9', '1', NULL, NULL, NULL, NULL),
('DH', 16, 'JURÍDICO', '% DE ÁREAS AUDITADAS PARA PREVENSIÓN DE RIESGO', '% DE ÁREAS AUDITADAS PARA PREVENSIÓN DE RIESGO', 'RE', 'Bimestral', 'Primer semana de cada bimestre ', '%', '1', '1', '1', '1', NULL, NULL, NULL),
('DO', 1, 'LABORATORIOS', 'REPORTE DE INCIDENCIAS', 'Número de siniestros', 'PS', 'Anual', 'Último día del mes de diciembre', 'Número de incidencias por año de clase de laboratorios', '1-30', '1-25', '1-20', '2020-10-01 00:00:00', NULL, NULL, NULL),
('DO', 2, 'ASISTENTE DE RECTORÍA', 'SATISFACCIÓN EN EL SERVICIO TOTAL ', NULL, 'PS', NULL, 'Al término del periodo', 'Reporte', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('DO', 7, 'TESORERÍA', '# DE INVENTARIOS TERMINADOS', '# DE INVENTARIOS TERMINADOS', 'PS', 'Mensual', 'Se realizara cada mes por la entra y salida de material.', '%', '0.9', '0.95', '0.95', '0.95', NULL, NULL, NULL),
('DO', 8, 'TESORERÍA', '# DÍAS DE ENTREGA DE MATERIAL A LOS DEPARTAMENTOS', '# DÍAS DE ENTREGA DE MATERIAL A LOS DEPARTAMENTOS', 'PS', 'Mensual', 'Dentro de la primera quincena del mes ', '%', '0.9', '0.95', '0.95', '95', NULL, NULL, NULL),
('DO', NULL, 'TESORERÍA', 'INGRESOS (Papelería)', 'INGRESOS REALES/PRESUPUESTO', 'PS', 'Cuatrimestral', 'Semana Vacacional de Alumnos', 'Reporte se servicio y evidencias', '0.9', '0.93', '0.97', '0.99', NULL, NULL, NULL),
('DO', 11, 'FINANZAS', 'REPORTE MENSUAL PARA RECTORIA INGRESOS/ EGRESOS ', 'REAL/PRESUPUESTO', 'PS', 'Mensual', '2da semana del mes siguiente', 'S', 'reporte', 'reporte', 'reporte', 'reporte', NULL, NULL, NULL),
('DO', 12, 'CAJA', 'DEUDORES', 'MONTO DE DEUDA/PRESUPUESTO', 'PS', 'Mensual', '1er día de cada mes', '$ por alumno y concepto de adeudo', '15% del presupuesto de ingresos', '12% del presupuesto de ingresos', '10% del presupuesto de ingresos', '5% del presupuesto de ingresos', NULL, NULL, NULL),
('DO', 13, 'CAJA', 'INGRESOS', 'INGRESOS REALES/PRESUPUESTO', 'PS', 'Diario', 'Todos los días antes de las 12 del día de lunes a viernes', '$', 'reporte', 'reporte', 'reporte', 'reporte', NULL, NULL, NULL),
('DO', 14, 'CAJA', 'VENTA DE KITS', 'REAL/PRESUPUESTO', 'PS', 'Mensual', '1er día de cada mes', '$', 'reporte', 'reporte', 'reporte', 'reporte', NULL, NULL, NULL),
('DO', 18, 'CAMPUS VIRTUAL', '# DE UNIDADES VIRTUALES', 'UNIDADES VIRTUALES/UNIDADES TOTALES', 'PS', 'Cuatrimestral', 'Inicio y mediados de año', 'Número de Unidades creadas y ocupadas anualmente', '2 UV nuevas más UV Actualizadas a utilizar en el presente periodo', NULL, NULL, NULL, NULL, NULL, NULL),
('DO', 19, 'CAMPUS VIRTUAL', '# DE ALUMNOS ACTIVOS', 'ALUMNOS ACTIVOS EN CAMPUS VIRTUAL/MATRICULA TOTAL', 'PS', 'Cuatrimestral', 'Inicio y mediados de año', 'Incremento de alumnos nuevos', '100-700', NULL, NULL, NULL, NULL, NULL, NULL),
('DO', 22, 'INFRAESTRUCTURA', '# DE OBSERVACIÓN DE AUDITORÍA INTERNA RECIBIDA Y CERRADA', '#', 'PS', 'Mensual', 'Reportes solicitadosy atendido', '# Auditorias', 'REPORTE', 'REPORTE', 'REPORTE', 'REPORTE', NULL, NULL, NULL),
('DO', 23, 'INFRAESTRUCTURA', '% DE CUMPLIMIENTO DEL PLAN ANUAL DE MANTENIMIENTO DE LA INFRAESTRUCTURA', '%', 'PS', 'Mensual', 'Solicitudes atendidas', '1', '0.9', '0.9', '0.9', '0.9', NULL, NULL, NULL),
('DO', 24, 'INFRAESTRUCTURA', '# DE PROYECTOS DE AHORRO POR COLABORADOR Y ÁREA', '#', 'PS', 'Mensual', 'Reportes solicitadosy atendido', '# Ordenes de Servicio', 'REPORTE', 'REPORTE', 'REPORTE', 'REPORTE', NULL, NULL, NULL),
('DO', NULL, 'INFRAESTRUCTURA', 'CONTROL DE INVENTARIO (Laboratorios)', 'Número de material y equipo', 'PS', 'Mensual', 'Mensual y semestral primer día del mes', 'Variación en dinero absoluto de diferencias', '0.8', '0.85', '0.9', '0.9', NULL, NULL, NULL),
('DO', NULL, 'INFRAESTRUCTURA', 'REPORTE DE INCIDENCIAS (Laboratorios)', 'Número de siniestros', 'PS', 'Anual', 'Último día del mes de diciembre', 'Número de incidencias por año de clase de laboratorios', '1-30', '1-25', '1-20', '2020-10-01 00:00:00', NULL, NULL, NULL),
('DO', 25, 'TI', 'EFICIENCIA PRESUPUESTAL', 'REAL/PRESUPUESTADO', 'PS', 'Anual', 'En el mes de Octubre', 'Gasto Vs Presupuesto', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('DO', 26, 'TI', 'CALIFICACIÓN DE SATISFACCIÓN EN EL TOTAL DE SERVICIOS ', 'SERVICIOS ATENTIDAS/SERVICIOS SOLICITADOS ', 'PS', 'Bimestral', 'A finales del ultimo mes', '# Ordenes de Servicio', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('DO', 27, 'TI', 'ALOJAMIENTO DE SERVIDORES/MANTENIMIENTO CUATRIMESTRAL DE LOS EQUIPOS DE USO ACADEMICO', 'ALOJAMIENTO DE SERVIDORES/MANTENIMIENTO CUATRIMESTRAL DE LOS EQUIPOS DE USO ACADEMICO', 'PS', 'Cuatrimestral', 'Semana Vacacional de Alumnos', 'Reporte se servicio y evidencias', '90', '93', '97', '99', NULL, NULL, NULL),
('DO', 28, 'TI', 'PROYECTOS DESARROLLADOS POR LOS DOCENTES/MANTENIMIENTO EQUIPO ADMINISTRATIVO ', 'PROYECTOS DESARROLLADOS POR LOS DOCENTES/MANTENIMIENTO EQUIPO ADMINISTRATIVO ', 'PS', 'Semestral', 'Periodo Vacacional de enfermeria', 'Reporte se servicio y evidencias', '90', '93', '97', '99', NULL, NULL, NULL),
('DO', 29, 'CAPITAL HUMANO', 'SATISFACCIÓN DEL SERVICIO CON EL CLIENTE INTERNO', '#', 'PS', 'Mensual', 'Encuesta', '# hallazgo', 'encuesta', 'encuesta', 'encuesta', 'encuesta', NULL, NULL, NULL),
('DO', 30, 'CAPITAL HUMANO', 'SATISFACCIÓN DEL SERVICIO COMO PROVEEDOR', '#', 'PS', 'Mensual', 'Encuesta', '# de servicios ', 'reporte', 'reporte', 'reporte', 'reporte', NULL, NULL, NULL),
('DO', 31, 'LABORATORIOS', 'CONTROL DE INVENTARIO', 'Número de material y equipo', 'PS', 'Mensual', 'Mensual y semestral primer día del mes', 'Variación en dinero absoluto de diferencias', 'Pendiente', 'Pendiente', 'Pendiente', 'Pendiente', NULL, NULL, NULL),
('DO', 3, 'DIRECCIÓN DE CONTRALORÍA', 'EFICIENCIA ECONÓMICA EGRESOS/INGRESOS ', 'EGRESOS/INGRESOS 90%≤\r\n', 'RE', 'Mensual', 'Se realiza dentro de los 10 dias naturales de cada mes', '%', '0.9', '0.9', '0.9', '0.9', NULL, NULL, NULL),
('DO', 4, 'DIRECCIÓN DE CONTRALORÍA', 'CONTROL DE PASIVOS', 'PASIVO/GASTO 35%≤\r\n', 'RE', 'Anual', 'Se realiza en la Declaracion Anual', '%', '0.35', '0.35', '0.35', '0.35', NULL, NULL, NULL),
('DO', 5, 'DIRECCIÓN DE CONTRALORÍA', '% DE HALLAZGOS DETECTADOS EN LA AUDITORÍA DE PREVENSIÓN DE RIESGO CONTROL INTERNO', 'HALLAZGOS/SCI 95%', 'RE', 'Mensual', 'Se realizan al azar y sin previo aviso en  las diferentes areas que tienen flujos en presupuesto', '%', '0.95', '0.95', '0.95', '0.95', NULL, NULL, NULL),
('DO', 6, 'DIRECCIÓN DE CONTRALORÍA', '% DE HALLAZGOS DETECTADOS EN LA AUDITORÍA DE PREVENSIÓN DE RIESGO  CONTABLES', 'HALLAZGOS/SCI 95%', 'RE', 'Anual', 'Se debe realizar por recomendacion antes de la junta de accionistas', '%', '0.95', '0.95', '0.95', '0.95', NULL, NULL, NULL),
('DO', 9, 'FINANZAS', 'PARTIDA PRESUPUESTAL', 'DEFINICIÓN DE PRESUPUESTO', 'RE', 'Anual', '1 mes antes del inicio de periodo sep-ago', '$', 'reporte', 'reporte', 'reporte', 'reporte', NULL, NULL, NULL),
('DO', 10, 'FINANZAS', 'INGRESOS POR SERVICIOS ADICIONALES', 'REGISTRO', 'RE', 'Mensual', '2da semana del mes siguiente', '$', 'reporte', 'reporte', 'reporte', 'reporte', NULL, NULL, NULL),
('DO', 15, 'JURÍDICO', '% DE CONTRATOS, CONVENIOS Y DOCUMENTOS SIMILARES EN TIEMPO Y FORMA', '% DE CONTRATOS, CONVENIOS Y DOCUMENTOS SIMILARES EN TIEMPO Y FORMA', 'RE', 'Diario', 'Semanalmente', '%', '1', '1', '1', '1', NULL, NULL, NULL),
('DO', 16, 'JURÍDICO', 'TIEMPO DE RESPUESTA DE LA REVISIÓN DE CONTRATOS, CONVENIOS Y DOCUMENTOS SIMILARES', 'DIAS PARA ELABORAR EL DOCUMENTO*', 'RE', 'Semanal', 'Cada tercer dia', '%', '1', '1', '1', '1', NULL, NULL, NULL),
('DO', 17, 'EDUCACIÓN CONTINUA', 'Cumplimiento de auditorías de acuerdo al plan', '# AUDITORÍAS', 'RE', 'Cuatrimestral', 'primera quincena posterior al periodo', '# AUDITORÍAS', '3', '3', '3', NULL, NULL, NULL, NULL),
('DO', 18, 'GESTIÓN DE CALIDAD Y PLANEACIÓN CURRICULAR', 'Cumplimiento de las metas', '# HALLAZGOS', 'RESULTADOS', 'Anual', 'primera semana de cada año calendario', 'PORCENTAJE DE EFICIENCIA', '0.8', '0.9', '1', NULL, NULL, NULL, NULL),
('DO', 19, 'GESTIÓN DE CALIDAD Y PLANEACIÓN CURRICULAR', 'Cumplimiento de los acuerdos de seguimiento correctivos', '# HALLAZGOS', 'RESULTADOS', 'Cuatrimestral', 'primera quincena posterior al periodo', '# ACUERDOS', '0.9', '0.95', '1', NULL, NULL, NULL, NULL),
('DO', 20, 'GESTIÓN DE CALIDAD Y PLANEACIÓN CURRICULAR', 'Cumplimiento de auditorías de acuerdo al plan', '# AUDITORÍAS REALIDAS / PROGRAMADAS', 'RESULTADOS', 'Cuatrimestral', 'primera quincena posterior al periodo', '# AUDITORÍAS', '3', '3', '3', NULL, NULL, NULL, NULL),
('DO', 21, 'GESTIÓN DE CALIDAD Y PLANEACIÓN CURRICULAR', 'Cumplimiento del plan de capacitación de normatiividad S.E.P. y de Mejora Continua', '# SESIONES DE CAPACITACIÓN', 'RESULTADOS', 'Cuatrimestral', 'primera quincena posterior al periodo', '# SESIONES DE CAPACITACIÓN', '3', '3', '3', NULL, NULL, NULL, NULL),
(NULL, NULL, 'GESTIÓN DE CALIDAD Y PLANEACIÓN CURRICULAR', 'Encuestas de satisfacción del Cliente', 'PROMEDIO DE SATISFACCIÓN', 'RESULTADOS', 'Cuatrimestral', 'primera quincena posterior al periodo', NULL, '3', '3', '3', NULL, NULL, NULL, NULL),
('DS', 1, 'EDUCACIÓN CONTINUA', 'NÙMERO DE OFERTA DE EDUCACIÓN CONTÍNUA', 'OFERTA DE EDUCACIÓN CONTÍNUA/META', 'AP', 'Anual', '1era semana de Diciembre', 'Nº de programas', '10', '12', '14', '20', NULL, NULL, NULL),
('DS', 2, 'EDUCACIÓN CONTINUA', 'MOVILIDAD DE LOS ESTUDIANTES', 'ALUMNOS EN MOVILIDAD/MATRICULA TOTAL', 'CO', 'Anual', 'Diciembre', 'Nº de alumnos en programas de movilidad', '0', '1', '5', '1 por carrera', NULL, NULL, NULL),
('DS', 12, 'VINCULACIÓN', 'PROGRAMA DE DESARROLLO PROFESIONAL CON IMPACTO SOCIAL', 'REALIZACIÓN', 'CO', 'Semestral', '2da semana de Enero y Agosto', 'Nº de alumnos', 'Pendiente', NULL, NULL, NULL, NULL, NULL, NULL),
('DS', 14, 'VINCULACIÓN', 'BOLSA DE TRABAJO (VACANTES)', 'VACANTES OFERTADAS/LICENCIATURA', 'CO', 'Anual', 'Diciembre', 'Vacates', '2 ofertas de empleo por carrera', '4 ofertas de empleo por carrera', '6 ofertas de empleo por carrera', '10 ofertas de empleo por carrera', NULL, NULL, NULL),
('DS', 15, 'VINCULACIÓN', 'CONVENIOS REALIZADOS', 'CONVENIOS /META ESTABLECIDA', 'CO', 'Quincenal', '2da semana del mes', 'No. de empresa, institución,etc.', '5', '10', '15', '20', NULL, NULL, NULL),
('DS', 16, 'VINCULACIÓN', '# ALUMNOS EN SERVICIO SOCIAL Y PRÁCTICAS PROFESIONALES', '# ALUMNOS EN SERVICIO SOCIAL Y PRÁCTICAS PROFESIONALES', 'CO', 'Cuatrimestral', 'Cada final de Cuatrimestre', '% de encuestas realizadas', '50% del total de alumnos en ùltimos cuatrimestre', '50% del total de alumnos en ùltimos cuatrimestre', '80% del total de alumnos en ùltimos cuatrimestre', '100% del total de alumnos en ùltimos cuatrimestre', NULL, NULL, NULL),
('DS', 17, 'VINCULACIÓN', '# ALUMNOS QUE TERMINARON SERVICIO SOCIAL Y PRÁCTICAS PROFESIONALES', '# ALUMNOS QUE TERMINARON SERVICIO SOCIAL Y PRÁCTICAS PROFESIONALES/MATRICULA CORRESPONDIENTE', 'CO', 'Cuatrimestral', 'Cada final de Cuatrimestre', '% de encuestas realizadas', '60% del total de alumnos que iniciaron', '70% del total de alumnos que iniciaron', '80% del total de alumnos que iniciaron', '100% del total de alumnos que iniciaron', NULL, NULL, NULL),
('DS', 11, 'VINCULACIÓN', 'PROGRAMA DE RESPONSABILIDAD SOCIAL', 'REALIZACIÓN', 'CO ', 'Anual', 'Noviembre', 'Indice de impacto', 'Reporte', 'Reporte', 'Reporte', 'Reporte', NULL, NULL, NULL),
('DS', 13, 'VINCULACIÓN', 'BOLSA DE TRABAJO (ALUMNOS)', 'ALUMNOS REGISTRADOS EN LA PLATAFORMA/MATRÍCULA CORRESPONDIENTE', 'CO ', 'Bimestral', 'Semestral', 'No. de alumnos', 'Alumnos registrados en el portal de empleo', 'Alumnos registrados en el portal de empleo', 'Alumnos registrados en el portal de empleo', 'Alumnos registrados en el portal de empleo', NULL, NULL, NULL),
('DS', 3, 'EDUCACIÓN CONTINUA', 'PROGRAMA DE EMPRENDIMIENTO', 'REALIZACIÓN', 'PS', 'Anual', 'Diciembre', 'Nº de proyectos de emprendimiento', '0', '1', '2', '3', NULL, NULL, NULL),
('DS', 7, 'CAPTACIÓN', 'IMPACTO EN LOS ALUMNOS EN LOS DIFERENTES CANALES DE COMUNICACIÓN INSTITUCIONAL', 'ALUMNOS CAPTADOS/MEDIO DE DIFUSIÓN', 'PS', 'Anual', 'Octubre', 'Reporte de inscritos ', 'Reporte', 'Reporte', 'Reporte', 'Reporte', NULL, NULL, NULL),
('DS', 10, 'CONTROL ESCOLAR', 'GESTIÓN DE BECAS', 'Número de alumnos inscritos y reinscritos /Número de becas', 'PS', 'Cuatrimestral', 'Un mes antes del término del cuatrimestre/ semestre', 'Número de alumnos inscritos y reinscritos /Número de becas', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('DS', 5, 'EDUCACIÓN CONTINUA', 'FERIA DE EMPREDEDORES', 'REALIZACIÓN', 'RE', 'Anual', 'Octubre', 'Nº de participantes (visitantes y proyectos)', '0', '5% de la matricula', '10% de la matricula ', '15% de la matricula', NULL, NULL, NULL),
('DS', 6, 'CAPTACIÓN', 'COSTO DEL ALUMNO', 'ALUMNOS CAPTADOS/PRESUPUESTO EJERCIDO', 'RE', 'Anual', 'Octubre', 'Reporte de resultados de campaña', 'Reporte', 'Reporte', 'Reporte', 'Reporte', NULL, NULL, NULL),
('DS', 8, 'CAPTACIÓN', 'CUMPLIMIENTO DE OBJETIVOS (GRUPOS APERTURADOS)', 'GRUPOS APERTURADOS/META ESTABLECIDA', 'RE', 'Anual', 'Octubre', 'Número de grupos', '15 grupos', '20 grupos', '22 grupos', '23 grupos', NULL, NULL, NULL),
('DS', 9, 'CAPTACIÓN', 'DISEÑO CORPORATIVO', 'APROBACION/PRESENTANCIÓN', 'RE', 'Anual', 'Dependiendo el momento del cambio de campaña ', 'Presentación y autorización de campaña ', 'Presentación', 'Presentación', 'Presentación', 'Presentación', NULL, NULL, NULL),
('DS', 18, 'VINCULACIÓN', '% DE ALUMNOS INTEGRADOS AL CAMPO LABORAL CORRESPONDIENTE', 'ALUMNOS INTEGRADOS AL CAMPO LABORAL CORRESPONDIENTE/EGRESADOS', 'RE', 'Anual', '1era semana de Diciembre', 'No. de alumnos', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('DS', 19, 'VINCULACIÓN', 'ENCUESTA DE SATISFACCIÓN A EMPRESAS CON ALUMNOS EGRESADOS', 'SATISFACCIÓN ALCANZADA/META ESTABLECIDA', 'RE', 'Cuatrimestral', 'Al finalizar cada cuatrimestre o Semestre (enfermería)', '% de encuestas realizadas', '5% de las empresas', '10% de las empresas', '20% de las empresas', '50% de las empresas', NULL, NULL, NULL),
('DS', 20, 'VINCULACIÓN', 'ESTUDIO DE EGRESADOS ', 'REPORTE DE ESTUDIO ', 'RE', 'Anual', 'Diciembre', 'Reporte', 'Pendiente', 'Pendiente', 'Pendiente', 'Reporte', NULL, NULL, NULL),
('DS', 4, 'EDUCACIÓN CONTINUA', 'PARTICIPACIÓN EN EVENTOS DE EMPRENDIMIENTO', 'PARTICIPANTES/EVENTOS DE EMPRENDIMIENTO', 'PS', 'Anual', 'Diciembre', 'Nº de eventos', '0', '1', '2', '3', NULL, NULL, NULL),
('DT', 1, 'EDUCACIÓN CONTINUA', 'PROYECTOS DE DESARRLLO TECNOLÓGICO CON OTRAS INSTITUCIONES (POSGRADO)', 'PENDIENTE', 'AP', 'Anual', '1era semana de Diciembre', 'Nº de proyectos por proyecto', 'Pendiente', 'Pendiente', 'Pendiente', 'Pendiente', NULL, NULL, NULL),
('DT', 3, 'INVESTIGACIÓN', 'PROYECTOS DE INVESTIGACIÓN POR LICENCIATURA', 'Número de proyectos ', 'CO', 'Anual', 'Finales de año ', 'Número de proyectos ', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('DT', 6, 'VINCULACIÓN', 'PROYECTOS DE DESARROLLO TECNOLÓGICO CON OTRAS INSTITUCIONES (LICENCIATURA)', 'PENDIENTE', 'CO', 'Anual', 'Diciembre', 'PENDIENTE', 'Pendiente', 'Pendiente', 'Pendiente', 'Pendiente', NULL, NULL, NULL),
('DT', 2, 'INVESTIGACIÓN', '% DE PROFESORES QUE IMPLEMENTAN ALGUNA ACTIVIDAD DE INNOVACIÓN EDUCATIVA EN EL AULA', 'Número de proyectos ', 'PS', 'Anual', 'Finales de año ', 'Número de actividades ', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('DT', 4, 'INVESTIGACIÓN', 'PROYECTOS CON AVAL CONACYT', 'Número de proyectos ', 'RE', 'Anual', 'Finales de año ', 'Número de proyectos ', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('DT', 5, 'INVESTIGACIÓN', 'ARTÍCULOS AL AÑO', 'Número de proyectos ', 'RE', 'Anual', 'Finales de año ', 'Número de artículos', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('FI', 1, 'FORMACIÓN CULTURAL Y DEPORTIVA', 'NÚMERO DE EVENTOS CULTURALES EN LOS QUE PARTICIPAN LOS ALUMNOS', 'NÚMERO DE EVENTOS CULTURALES EN LOS QUE PARTICIPAN LOS ALUMNOS/META DEFINIDA', 'AP', 'Anual', 'A fin de año', '% de alumnos por matricula', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('FI', 2, 'FORMACIÓN CULTURAL Y DEPORTIVA', 'NUMERO DE PARTICIPANTES A LOS EVENTOS CULTURALES', 'NUMERO DE PARTICIPANTES A LOS EVENTOS CULTURALES/META', 'AP', 'Anual', 'A fin de año', '% de alumnos por matricula', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('FI', 3, 'FORMACIÓN CULTURAL Y DEPORTIVA', 'NUMERO DE PARTICIPANTES A LOS EVENTOS DEPORTIVOS', 'NUMERO DE PARTICIPANTES A LOS EVENTOS DEPORTIVOS/META', 'AP', 'Anual', 'A fin de año', '% de alumnos por matricula', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('FI', 4, 'FORMACIÓN CULTURAL Y DEPORTIVA', 'NÚMERO DE EVENTOS DEPORTIVOS EN LOS QUE PARTICIPAN LOS ALUMNOS', 'NÚMERO DE EVENTOS DEPORTIVOS EN LOS QUE PARTICIPAN LOS ALUMNOS/META', 'AP', 'Anual', 'A fin de año', '% de alumnos por matricula', '3', '5', '8', '10', NULL, NULL, NULL),
('FI', 5, 'FORMACIÓN CULTURAL Y DEPORTIVA', 'ALUMNOS INSCRITOS A TALLERES DE FORMACIÓN CULTURAL', 'ALUMNOS INSCRITOS A TALLERES DE FORMACIÓN CULTURAL/MATRICULA CORRESPONDIENTE ', 'AP', NULL, 'Al término del periodo', 'Número de Pasaportes Sellados ', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('FI', 6, 'FORMACIÓN CULTURAL Y DEPORTIVA', 'EFICIENCIA DE TERMINACIÓN DEL PROGRAMA DE FORMACIÓN CULTURAL ', 'EFICIENCIA DE TERMINACIÓN DEL PROGRAMA DE FORMACIÓN CULTURAL / MATRICULA CORRESPONDIENTE', 'AP', NULL, 'Al término del periodo', 'Número de Pasaportes Sellados ', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('FI', 9, 'SERVICIO MÉDICO', 'CONSULTAS', NULL, 'CO', NULL, 'Al término del periodo', 'Reporte', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('FI', 10, 'SERVICIO MÉDICO', 'DIAGNÓSTICO', NULL, 'CO', NULL, 'Al término del periodo', 'Reporte', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('FI', 11, 'SERVICIO MÉDICO', 'BOTIQUÍN', NULL, 'CO', NULL, 'Al término del periodo', 'Reporte', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('FI', 12, 'SERVICIO MÉDICO', 'PROGRAMA DE SALUD', NULL, 'CO', NULL, 'Al término del periodo', 'Reporte', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('FI', 13, 'SERVICIO MÉDICO', 'CAMPAÑAS DE SALUD', NULL, 'CO', NULL, 'Al término del periodo', 'Reporte', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('FI', 14, 'SERVICIO MÉDICO', 'CERTIFICADOS MÉDICOS', NULL, 'CO', NULL, 'Al término del periodo', 'Reporte', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('FI', 15, 'SERVICIO MÉDICO', 'JUSTIFICANTES MÉDICOS', NULL, 'CO', NULL, 'Al término del periodo', 'Reporte', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('FI', 7, 'FORMACIÓN CULTURAL Y DEPORTIVA', 'ALUMNOS INSCRITOS A TALLERES DE FORMACIÓN DEPORTIVA', 'ALUMNOS INSCRITOS A TALLERES DE FORMACIÓN DEPORTIVA/ META/MATRICULA CORRESPONDIENTE ', 'RE', NULL, 'Al término del periodo', 'Número de Pasaportes Sellados ', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('FI', 8, 'FORMACIÓN CULTURAL Y DEPORTIVA', 'EFICIENCIA DE TERMINACIÓN DEL PROGRAMA DE FORMACIÓN DEPORTIVA ', 'EFICIENCIA DE TERMINACIÓN DEL PROGRAMA DE FORMACIÓN DEPORTIVA /MATRICULA CORRESPONDIENTE ', 'RE', NULL, 'Al término del periodo', 'Número de Pasaportes Sellados ', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `submenu_web`
--

CREATE TABLE `submenu_web` (
  `id_submenu_web` int(11) UNSIGNED NOT NULL,
  `nombre_submenu_web` varchar(50) NOT NULL DEFAULT '',
  `url_submenu_web` varchar(45) NOT NULL,
  `icono_submenu_web` varchar(50) DEFAULT NULL,
  `tipo` tinyint(4) NOT NULL DEFAULT '1',
  `tipo_menu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `submenu_web`
--

INSERT INTO `submenu_web` (`id_submenu_web`, `nombre_submenu_web`, `url_submenu_web`, `icono_submenu_web`, `tipo`, `tipo_menu`) VALUES
(1, 'Inicio admin', 'admin/inicio', 'ti-home menu-icon', 1, 'admin'),
(2, 'Indicadores', 'admin/indicadores', 'ti-shield menu-icon', 1, 'admin'),
(3, 'Lineas estratégicas', 'admin/lineasEstrategicas', 'ti-palette menu-icon', 1, 'admin'),
(4, 'Niveles BSC', 'admin/nivelesBsc', 'ti-layout-list-post menu-icon', 1, 'admin'),
(5, 'Departamentos', 'admin/departamentos', 'ti-view-list-alt menu-icon', 1, 'admin'),
(6, 'Usuarios', 'admin/usuarios', 'ti-user menu-icon', 1, 'admin'),
(7, 'Cubo', 'consulta', 'ti-stats-up menu-icon', 1, 'publico'),
(8, 'Textos introductorios', 'inicio', 'ti-text menu-icon', 1, 'publico'),
(9, 'Permisos', 'admin/permisos', 'ti-lock menu-icon', 1, 'admin'),
(11, 'Metas', 'admin/consultaMetas', 'ti-lock menu-icon', 0, 'admin'),
(12, 'Gráfica conexiones', 'admin/grafica', 'ti-bar-chart-alt menu-icon', 1, 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellido_paterno` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellido_materno` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `imagen` text COLLATE utf8_spanish_ci NOT NULL,
  `usuario` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `contrasenia` text COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `iddepartamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre`, `apellido_paterno`, `apellido_materno`, `imagen`, `usuario`, `contrasenia`, `estado`, `iddepartamento`) VALUES
(1, 'José', 'Madero', 'viscaino', 'png-transparent-profile-logo-computer-icons-user-user-blue-heroes-logo-thumbnail.png', 'pepe', '$2y$10$wm/7BMypHXHF/C2hlhL1.OsnMt6ODaDbAZCAFytx7f8ItsJVuEpCG', 1, 1),
(9, 'Administrador', 'Administrador', 'juas', 'png-transparent-profile-logo-computer-icons-user-user-blue-heroes-logo-thumbnail.png', 'angi', '$2y$10$JDHL3cYPowXewoaa5Briy.EIqu0DXNkOUosBtruGQh2.a1RtDSdeS', 1, 1),
(10, 'Dirección', 'Académica', 'UNICEQ', '', 'diracad', '$2y$10$o8CtigUzbah8MlusdRttLOWZy74cL7LZR4P53O2A1FEltl9SgzthC', 1, 1),
(11, 'Carlos A.', 'Olvera ', 'Hernández', '', 'carlosal', '$2y$10$W/N8ebcqKZ9Bk/q6exepH.h74q5U4JQvaziwIe8092IiT7.OWWJBG', 1, 1),
(12, 'Caja', 'Caja', 'UNICEQ', '', 'caja', '$2y$10$yRLrsNzoSsZbu4V1zkv8A.2YUjsRkgFZcHpLJcE/jRVfImdTpcX2K', 1, 4),
(13, 'Campus', 'Virtual', 'UNICEQ', '', 'campus', '$2y$10$xhLWWcncBIeeKhfmF578VeePRQFar2OzlsY7X9gKefVaKj3htozim', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_indicador`
--

CREATE TABLE `usuario_indicador` (
  `id_usuario_indicador` int(11) NOT NULL,
  `idindicador` int(11) UNSIGNED NOT NULL,
  `idusuario` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario_indicador`
--

INSERT INTO `usuario_indicador` (`id_usuario_indicador`, `idindicador`, `idusuario`) VALUES
(125, 1, 9),
(126, 2, 9),
(127, 3, 9),
(128, 4, 9),
(129, 5, 9),
(130, 6, 9),
(131, 7, 9),
(132, 8, 9),
(133, 9, 9),
(134, 10, 9),
(135, 11, 9),
(136, 12, 9),
(137, 13, 9),
(138, 14, 9),
(139, 15, 9),
(140, 16, 9),
(141, 17, 9),
(46, 18, 9),
(47, 19, 9),
(48, 20, 9),
(49, 21, 9),
(50, 22, 9),
(51, 23, 9),
(52, 24, 9),
(53, 25, 9),
(54, 26, 9),
(55, 27, 9),
(56, 28, 9),
(57, 29, 9),
(58, 30, 9),
(59, 31, 9),
(60, 32, 9),
(105, 33, 9),
(106, 34, 9),
(107, 35, 9),
(108, 36, 9),
(109, 37, 9),
(110, 38, 9),
(111, 39, 9),
(112, 40, 9),
(113, 41, 9),
(114, 42, 9),
(115, 43, 9),
(116, 44, 9),
(117, 45, 9),
(118, 46, 9),
(119, 47, 9),
(120, 48, 9),
(121, 49, 9),
(122, 50, 9),
(123, 51, 9),
(124, 52, 9),
(61, 53, 9),
(62, 54, 9),
(63, 55, 9),
(64, 56, 9),
(65, 57, 9),
(66, 58, 9),
(67, 59, 9),
(68, 60, 9),
(69, 61, 9),
(70, 62, 9),
(71, 63, 9),
(72, 64, 9),
(73, 65, 9),
(74, 66, 9),
(75, 67, 9),
(76, 68, 9),
(77, 69, 9),
(78, 70, 9),
(79, 71, 9),
(80, 72, 9),
(81, 73, 9),
(82, 74, 9),
(83, 75, 9),
(84, 76, 9),
(85, 77, 9),
(86, 78, 9),
(87, 79, 9),
(88, 80, 9),
(89, 81, 9),
(90, 82, 9),
(91, 83, 9),
(92, 84, 9),
(93, 85, 9),
(94, 86, 9),
(95, 87, 9),
(96, 88, 9),
(97, 89, 9),
(98, 90, 9),
(99, 91, 9),
(100, 92, 9),
(101, 93, 9),
(102, 94, 9),
(103, 95, 9),
(104, 96, 9),
(1, 97, 9),
(2, 98, 9),
(3, 99, 9),
(4, 100, 9),
(5, 101, 9),
(6, 102, 9),
(7, 103, 9),
(8, 104, 9),
(9, 105, 9),
(10, 106, 9),
(11, 107, 9),
(12, 108, 9),
(13, 109, 9),
(14, 110, 9),
(15, 111, 9),
(16, 112, 9),
(17, 113, 9),
(18, 114, 9),
(19, 115, 9),
(20, 116, 9),
(21, 117, 9),
(22, 118, 9),
(23, 119, 9),
(24, 120, 9),
(26, 121, 9),
(27, 122, 9),
(28, 123, 9),
(29, 124, 9),
(30, 125, 9),
(31, 126, 9),
(32, 127, 9),
(33, 128, 9),
(34, 129, 9),
(35, 130, 9),
(36, 131, 9),
(37, 132, 9),
(38, 133, 9),
(39, 134, 9),
(40, 135, 9),
(41, 136, 9),
(42, 137, 9),
(43, 138, 9),
(44, 139, 9),
(45, 140, 9),
(25, 141, 9),
(142, 142, 9);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `antecedente`
--
ALTER TABLE `antecedente`
  ADD PRIMARY KEY (`idantecedente`);

--
-- Indices de la tabla `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`idarea`);

--
-- Indices de la tabla `consecuente`
--
ALTER TABLE `consecuente`
  ADD PRIMARY KEY (`idconsecuente`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`iddepartamento`);

--
-- Indices de la tabla `indicador`
--
ALTER TABLE `indicador`
  ADD PRIMARY KEY (`idindicador`),
  ADD UNIQUE KEY `codigo_UNIQUE` (`codigo`);

--
-- Indices de la tabla `indicador_usuario`
--
ALTER TABLE `indicador_usuario`
  ADD PRIMARY KEY (`id_indicador_usuario`);

--
-- Indices de la tabla `informe`
--
ALTER TABLE `informe`
  ADD PRIMARY KEY (`idinforme`);

--
-- Indices de la tabla `menu_web`
--
ALTER TABLE `menu_web`
  ADD PRIMARY KEY (`id_menu_web`),
  ADD UNIQUE KEY `descripcion_UNIQUE` (`nombre_web`);

--
-- Indices de la tabla `mes`
--
ALTER TABLE `mes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `meta_anual`
--
ALTER TABLE `meta_anual`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `meta_general`
--
ALTER TABLE `meta_general`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `meta_mensual`
--
ALTER TABLE `meta_mensual`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `anio` (`anio`,`mes`,`id_indicador`);

--
-- Indices de la tabla `niveles`
--
ALTER TABLE `niveles`
  ADD PRIMARY KEY (`idniveles`);

--
-- Indices de la tabla `permiso_menu`
--
ALTER TABLE `permiso_menu`
  ADD PRIMARY KEY (`idpermiso`);

--
-- Indices de la tabla `submenu_web`
--
ALTER TABLE `submenu_web`
  ADD PRIMARY KEY (`id_submenu_web`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- Indices de la tabla `usuario_indicador`
--
ALTER TABLE `usuario_indicador`
  ADD PRIMARY KEY (`id_usuario_indicador`),
  ADD UNIQUE KEY `pk` (`idindicador`,`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `antecedente`
--
ALTER TABLE `antecedente`
  MODIFY `idantecedente` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=267;

--
-- AUTO_INCREMENT de la tabla `area`
--
ALTER TABLE `area`
  MODIFY `idarea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `consecuente`
--
ALTER TABLE `consecuente`
  MODIFY `idconsecuente` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=262;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `iddepartamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `indicador`
--
ALTER TABLE `indicador`
  MODIFY `idindicador` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT de la tabla `indicador_usuario`
--
ALTER TABLE `indicador_usuario`
  MODIFY `id_indicador_usuario` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `informe`
--
ALTER TABLE `informe`
  MODIFY `idinforme` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `menu_web`
--
ALTER TABLE `menu_web`
  MODIFY `id_menu_web` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mes`
--
ALTER TABLE `mes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `meta_anual`
--
ALTER TABLE `meta_anual`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `meta_general`
--
ALTER TABLE `meta_general`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `meta_mensual`
--
ALTER TABLE `meta_mensual`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT de la tabla `niveles`
--
ALTER TABLE `niveles`
  MODIFY `idniveles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `permiso_menu`
--
ALTER TABLE `permiso_menu`
  MODIFY `idpermiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=313;

--
-- AUTO_INCREMENT de la tabla `submenu_web`
--
ALTER TABLE `submenu_web`
  MODIFY `id_submenu_web` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `usuario_indicador`
--
ALTER TABLE `usuario_indicador`
  MODIFY `id_usuario_indicador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
