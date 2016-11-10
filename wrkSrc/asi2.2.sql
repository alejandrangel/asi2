-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-10-2016 a las 08:55:19
-- Versión del servidor: 5.6.26
-- Versión de PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `asi2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad`
--

CREATE TABLE IF NOT EXISTS `actividad` (
  `id_actividad` int(11) NOT NULL,
  `actividad` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `actividad`
--

INSERT INTO `actividad` (`id_actividad`, `actividad`) VALUES
(1, 'Recoleccion de Basusa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad_planificada`
--

CREATE TABLE IF NOT EXISTS `actividad_planificada` (
  `id_actividad_planificacion` int(11) NOT NULL,
  `tipo` enum('U','P') DEFAULT NULL COMMENT 'U=> Unica\nP=> Periodica',
  `fecha_inicio` date DEFAULT NULL,
  `fecha_final` date DEFAULT NULL,
  `periodicidad` varchar(2) DEFAULT NULL,
  `dias` varchar(15) DEFAULT NULL,
  `id_plan` int(11) DEFAULT NULL,
  `id_ruta` int(11) DEFAULT NULL,
  `actividad` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `actividad_planificada`
--

INSERT INTO `actividad_planificada` (`id_actividad_planificacion`, `tipo`, `fecha_inicio`, `fecha_final`, `periodicidad`, `dias`, `id_plan`, `id_ruta`, `actividad`) VALUES
(2, 'U', '0000-00-00', '0000-00-00', '', NULL, 18, 1, 1),
(3, 'P', '0000-00-00', '0000-00-00', '', NULL, 18, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `automor_equipo`
--

CREATE TABLE IF NOT EXISTS `automor_equipo` (
  `id_automor` int(11) NOT NULL,
  `id_equipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `automotor`
--

CREATE TABLE IF NOT EXISTS `automotor` (
  `id_automotor` int(11) NOT NULL,
  `placa` varchar(45) DEFAULT NULL,
  `modelo` int(11) DEFAULT NULL,
  `anio` int(11) DEFAULT NULL,
  `capacidad` varchar(45) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `chasis` varchar(45) DEFAULT NULL,
  `color` int(11) DEFAULT NULL,
  `numero_motor` varchar(45) DEFAULT NULL,
  `combustible` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `automotor_historial`
--

CREATE TABLE IF NOT EXISTS `automotor_historial` (
  `id_automotor_historial` int(11) NOT NULL,
  `automotor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE IF NOT EXISTS `cargo` (
  `id_cargo` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `activo` char(1) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`id_cargo`, `descripcion`, `activo`) VALUES
(1, 'Supervisor', '1'),
(2, 'ADMINISTRADOR', 'A'),
(3, 'desc', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogo_tabla`
--

CREATE TABLE IF NOT EXISTS `catalogo_tabla` (
  `id_catalogo_tabla` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `catalogo_tabla`
--

INSERT INTO `catalogo_tabla` (`id_catalogo_tabla`, `nombre`) VALUES
(1, 'solicitud'),
(2, 'orden'),
(3, 'plan');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colonia`
--

CREATE TABLE IF NOT EXISTS `colonia` (
  `id_colonia` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `id_distrito` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `colonia`
--

INSERT INTO `colonia` (`id_colonia`, `nombre`, `id_distrito`) VALUES
(1, 'Residencial Acovit', 1),
(2, 'Residencial Girasoles', 1),
(3, 'Reparto El Quequeisque', 1),
(4, 'Colonia Quezaltepec', 1),
(5, 'Residencial Alpes Suizos 1', 1),
(6, 'Residencial Alpes Suizos 2', 1),
(7, 'Residencial Europa', 1),
(8, 'Lotificación Monteverde', 1),
(9, 'Colonia Nuevo Amanecer', 1),
(10, 'Colonia Don Bosco', 1),
(11, 'Colonia Las Delicias', 1),
(12, 'Residencial Pinares de Suiza', 1),
(13, 'Comunidad Guadalupe 1 y 2', 1),
(14, 'Cantón Victoria', 1),
(15, 'Casa Comunal Col. San Antonio', 2),
(16, 'Boulevard El Hipodromo y Final 6a Avenida Norte', 2),
(17, 'Colonia San Antonio', 2),
(18, 'Bosques de Santa Teresa', 3),
(19, 'Finca de Asturias Norte', 3),
(20, 'Finca de Asturias Sur', 3),
(21, 'Joyas de la Montaña', 3),
(22, 'La Montaña 1', 3),
(23, 'La Montaña 2', 3),
(24, 'Paso Fresco', 3),
(25, 'Jardines de La Sabana 1, 2 y 3', 3),
(26, 'Jardines de Merliot', 3),
(27, 'Jardines del Volcán 1, 2, 3 y 4', 3),
(28, 'Comunidad El Rosal', 3),
(29, 'Residencial Maya', 3),
(30, 'Jardines de la Libertad', 3),
(31, 'Jardines de Merliot.', 3),
(32, 'Comunidad El Trébol', 3),
(33, 'Residencial Miraflores', 3),
(34, 'Residencial Británica', 3),
(35, 'Cantón Álvarez', 3),
(36, 'Cantón El Progreso', 3),
(37, '6° Calle', 4),
(38, '10 ° Calle', 4),
(39, '14 ° Calle', 4),
(40, '12 ° Calle', 4),
(41, 'Comunidad María Victoria', 4),
(42, 'Residencial El Paraíso', 4),
(43, 'Residencial Las Colinas 1', 4),
(44, 'Residencial Cima del Paraíso', 4),
(45, 'Comunidad El Paraíso', 4),
(46, 'Comunidad San Martin', 4),
(47, 'Urbanización Alemania', 4),
(48, 'Colonia Residencial El Paraíso', 4),
(49, 'Residencial Las Gardenias', 4),
(50, 'Comunidad El Carmencito', 4),
(51, 'Comunidad Nueva Esperanza', 4),
(52, 'Residencial Altos de Utila 1', 4),
(53, 'Residencial Altos de Utila 2', 4),
(54, 'Residencial Altos de Utila 3', 4),
(55, 'Residencial Bethania', 4),
(56, 'Residencial Las Piletas', 4),
(57, 'Residencial Utila Place', 4),
(58, 'Quinta Residencial Las Piletas', 4),
(59, 'Urbanización Villa Bosque', 4),
(60, 'Urbanización Palmira', 4),
(61, 'Parque Residencial Primavera 1 y 2', 4),
(62, 'Colonia San José del Pino', 4),
(63, 'Comunidad San Rafael', 4),
(64, 'Comunidad Fátima', 4),
(65, 'Comunidad La Cruz del Refugio', 4),
(66, 'Residencial Alturas De Tenerife', 4),
(67, 'Los Arrecifes', 4),
(68, '8° Calle', 4),
(69, '4° Calle', 4),
(70, '3° Calle Entre 16° Y 7° Av.', 4),
(71, '1° Calle Entre 16° Y 7° Av.', 4),
(72, '6° Calle.', 4),
(73, 'Calle Daniel Hernández', 4),
(74, '2° Calle', 4),
(75, 'Calle José Ciriaco López', 4),
(76, '7° Calle (Entre 2° Y 4° Av.)', 4),
(77, '5° Calle (Entre 2° Y 4° Av.)', 4),
(78, '9° Calle Entre 2° Y 4° Av.)', 4),
(79, 'Cantón Ayagualo', 5),
(80, 'Cantón Las Granadillas', 5),
(81, 'Cantón El Triunfo', 5),
(82, 'Cantón El Limón', 5),
(83, 'Cantón El Matazano', 5),
(84, 'Cantón Sacazil', 5),
(85, 'Cantón Los Pajales', 5),
(86, 'Comunidad Santa Marta', 5),
(87, 'Comunidad Altos del Matazano', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `color`
--

CREATE TABLE IF NOT EXISTS `color` (
  `id_color` int(11) NOT NULL,
  `color` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `color`
--

INSERT INTO `color` (`id_color`, `color`) VALUES
(3, 'rrrr');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `combustible`
--

CREATE TABLE IF NOT EXISTS `combustible` (
  `id_combustible` int(11) NOT NULL,
  `combustible` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dia_asueto`
--

CREATE TABLE IF NOT EXISTS `dia_asueto` (
  `id_dia_asueto` int(11) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `id_plan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distrito`
--

CREATE TABLE IF NOT EXISTS `distrito` (
  `id_distrito` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `distrito`
--

INSERT INTO `distrito` (`id_distrito`, `nombre`) VALUES
(1, 'Distrito 1'),
(2, 'Distrito 2'),
(3, 'Distrito 3'),
(4, 'Distrito 4'),
(5, 'Distrito 5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE IF NOT EXISTS `empleado` (
  `id_empleado` int(11) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `direccion` varchar(500) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `celular` varchar(10) DEFAULT NULL,
  `fnacimiento` datetime NOT NULL,
  `cargo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id_empleado`, `nombres`, `apellidos`, `direccion`, `telefono`, `celular`, `fnacimiento`, `cargo`) VALUES
(1, 'Edgar', 'Pascacio', 'Res. Villas de Suiza, Senda Zurich 9-B', '22284367', '73181822', '2016-10-01 00:00:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrega`
--

CREATE TABLE IF NOT EXISTS `entrega` (
  `id_entrega` int(11) NOT NULL,
  `tonelada` varchar(45) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `id_orden_trabajo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE IF NOT EXISTS `equipo` (
  `id_equipo` int(11) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `estado` enum('A','I') DEFAULT 'A',
  `fecha_creacion` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`id_equipo`, `descripcion`, `estado`, `fecha_creacion`) VALUES
(1, 'Equipo de Trabajo 1', 'A', '2016-01-01 00:00:00'),
(2, 'Equipo de trabajo', 'A', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE IF NOT EXISTS `estado` (
  `id_estado` int(11) NOT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `id_tabla` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id_estado`, `estado`, `descripcion`, `id_tabla`) VALUES
(1, 'Registrado', 'Registrado', 2),
(2, 'Aprobado', 'Aprobado', 2),
(3, 'Rechazada', 'Rechazada', 2),
(4, 'Registrada', 'Registrada', 1),
(5, 'Denegada', 'Denegada', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fuente`
--

CREATE TABLE IF NOT EXISTS `fuente` (
  `id_fuente` int(11) NOT NULL,
  `fuente` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `fuente`
--

INSERT INTO `fuente` (`id_fuente`, `fuente`) VALUES
(1, 'Pagina Web');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `herramienta`
--

CREATE TABLE IF NOT EXISTS `herramienta` (
  `id_herramienta` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `activo` char(1) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `herramienta`
--

INSERT INTO `herramienta` (`id_herramienta`, `descripcion`, `activo`) VALUES
(1, 'de', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log_usuario`
--

CREATE TABLE IF NOT EXISTS `log_usuario` (
  `id_log` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `accion` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `log_usuario`
--

INSERT INTO `log_usuario` (`id_log`, `usuario`, `fecha`, `accion`) VALUES
(1, 2, '2016-09-20 00:58:58', 'Entro al sistema'),
(2, 2, '2016-09-20 01:02:36', 'Salio del sistema'),
(3, 2, '2016-09-20 01:04:22', 'Entro al sistema'),
(4, 2, '2016-09-24 14:24:55', 'Entro al sistema'),
(5, 2, '2016-09-24 14:36:05', 'Salio del sistema'),
(6, 2, '2016-09-24 14:36:16', 'Entro al sistema'),
(7, 2, '2016-09-29 23:12:58', 'Entro al sistema'),
(8, 2, '2016-09-30 23:16:46', 'Entro al sistema'),
(9, 2, '2016-10-01 14:27:13', 'Entro al sistema'),
(10, 2, '2016-10-01 21:40:25', 'Salio del sistema'),
(11, 2, '2016-10-01 21:40:31', 'Entro al sistema'),
(12, 2, '2016-10-01 22:18:10', 'Entro al sistema'),
(13, 2, '2016-10-02 15:00:10', 'Entro al sistema'),
(14, 2, '2016-10-02 15:15:54', 'Entro al sistema'),
(15, 2, '2016-10-02 15:21:26', 'Entro al sistema'),
(16, 2, '2016-10-02 15:24:04', 'Entro al sistema'),
(17, 2, '2016-10-02 15:59:20', 'Salio del sistema'),
(18, 2, '2016-10-02 15:59:32', 'Entro al sistema'),
(19, 2, '2016-10-02 16:05:13', 'Salio del sistema'),
(20, 2, '2016-10-02 16:06:20', 'Salio del sistema'),
(21, 2, '2016-10-02 16:14:01', 'Entro al sistema'),
(22, 2, '2016-10-10 20:05:08', 'Entro al sistema'),
(23, 2, '2016-10-12 19:51:09', 'Entro al sistema'),
(24, 2, '2016-10-13 20:40:48', 'Entro al sistema'),
(25, 2, '2016-10-15 15:00:03', 'Entro al sistema'),
(26, 2, '2016-10-15 15:02:52', 'Salio del sistema'),
(27, 2, '2016-10-15 15:03:39', 'Entro al sistema'),
(28, 2, '2016-10-15 15:24:27', 'Salio del sistema'),
(29, 3, '2016-10-15 15:24:34', 'Entro al sistema'),
(30, 3, '2016-10-15 15:25:08', 'Salio del sistema'),
(31, 2, '2016-10-15 15:25:17', 'Entro al sistema'),
(32, 2, '2016-10-15 15:25:26', 'Salio del sistema'),
(33, 2, '2016-10-17 20:58:47', 'Entro al sistema'),
(34, 2, '2016-10-19 00:10:07', 'Entro al sistema'),
(35, 2, '2016-10-19 00:41:20', 'Salio del sistema'),
(36, 2, '2016-10-21 00:08:11', 'Entro al sistema'),
(37, 2, '2016-10-21 01:09:06', 'Salio del sistema'),
(38, 2, '2016-10-21 21:21:07', 'Entro al sistema'),
(39, 2, '2016-10-21 22:01:15', 'Salio del sistema'),
(40, 2, '2016-10-21 22:01:27', 'Entro al sistema'),
(41, 2, '2016-10-21 23:00:34', 'Salio del sistema'),
(42, 2, '2016-10-21 23:00:52', 'Entro al sistema'),
(43, 2, '2016-10-22 00:54:22', 'Salio del sistema');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE IF NOT EXISTS `marca` (
  `id_marca` int(11) NOT NULL,
  `marca` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id_menu` int(11) NOT NULL,
  `label` varchar(45) NOT NULL,
  `url` varchar(500) NOT NULL,
  `id_parent` int(11) DEFAULT NULL,
  `id_rol` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`id_menu`, `label`, `url`, `id_parent`, `id_rol`) VALUES
(1, 'Procesos', '#', NULL, 1),
(2, 'Mantenimientos', '#', NULL, 1),
(3, 'Administracion', '#', NULL, 1),
(4, 'Solicitud', '/solicitud', 1, 1),
(5, 'Planificación', '/plan', 1, 1),
(6, 'Orden de Trabajo', '/orden', 1, 1),
(7, 'Entrega', '/entrega', 1, 1),
(8, 'Equipo', '/equipo', 2, 1),
(9, 'Herramientas', '/herramienta', 2, 1),
(10, 'Vehiculos', '/vehiculo', 2, 1),
(11, 'Usuario', '/usuario', 3, 1),
(12, 'Rol', '/rol', 3, 1),
(13, 'Empleado', '/empleado', 2, 1),
(14, 'Solicitud', '/solicitud', NULL, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelo`
--

CREATE TABLE IF NOT EXISTS `modelo` (
  `id_modelo` int(11) NOT NULL,
  `modelo` varchar(45) DEFAULT NULL,
  `marca` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_actividad`
--

CREATE TABLE IF NOT EXISTS `orden_actividad` (
  `id_orden_actividad` int(11) NOT NULL,
  `id_orden` int(11) DEFAULT NULL,
  `id_actividad` int(11) DEFAULT NULL,
  `dias` enum('LU','MA','MI','JU','VI','SA','DO') DEFAULT NULL,
  `fecha_inicio` varchar(45) DEFAULT NULL,
  `fecha_final` varchar(45) DEFAULT NULL,
  `periodicidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_automotor`
--

CREATE TABLE IF NOT EXISTS `orden_automotor` (
  `id_orden_automotor` int(11) NOT NULL,
  `km_inicial` varchar(45) DEFAULT NULL,
  `km_final` varchar(45) DEFAULT NULL,
  `codigo_vale` varchar(45) DEFAULT '-',
  `monto` decimal(18,2) DEFAULT '0.00',
  `id_orden` int(11) DEFAULT NULL,
  `id_automotor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_empleado`
--

CREATE TABLE IF NOT EXISTS `orden_empleado` (
  `id_empleado` int(11) NOT NULL,
  `id_orden` int(11) NOT NULL,
  `observaciones` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_herramienta`
--

CREATE TABLE IF NOT EXISTS `orden_herramienta` (
  `id_orden_herramienta` int(11) NOT NULL,
  `id_orden` int(11) DEFAULT NULL,
  `id_herramienta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_trabajo`
--

CREATE TABLE IF NOT EXISTS `orden_trabajo` (
  `id_orden_trabajo` int(11) NOT NULL,
  `orden_trabajo` varchar(45) DEFAULT NULL,
  `tipo` enum('E','P') DEFAULT NULL,
  `id_estado` int(11) DEFAULT NULL,
  `fecha_inicio` datetime DEFAULT NULL,
  `fecha_final` datetime DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `solicitud` int(11) DEFAULT NULL,
  `actividad` int(11) DEFAULT NULL,
  `actividad_planificacion` int(11) DEFAULT NULL,
  `hora_inicio` time(6) DEFAULT NULL,
  `hora_final` time(6) DEFAULT NULL,
  `id_equipo` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `orden_trabajo`
--

INSERT INTO `orden_trabajo` (`id_orden_trabajo`, `orden_trabajo`, `tipo`, `id_estado`, `fecha_inicio`, `fecha_final`, `descripcion`, `solicitud`, `actividad`, `actividad_planificacion`, `hora_inicio`, `hora_final`, `id_equipo`) VALUES
(12, 'Pedro Sanchez 016108', 'E', 1, '2016-10-02 00:00:00', '2016-10-02 00:00:00', 'hola', 8, NULL, NULL, '23:59:59.000000', '23:59:59.000000', 1),
(13, 'Pedro Sanchez 016108', 'E', 1, '2016-10-02 00:00:00', '2016-10-02 00:00:00', 'hola', 8, NULL, NULL, '23:59:59.000000', '23:59:59.000000', 1),
(14, 'Pedro Sanchez 016109', 'E', 1, '2016-10-02 00:00:00', '2016-10-02 00:00:00', 'hola', 9, NULL, NULL, '23:59:59.000000', '23:59:59.000000', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE IF NOT EXISTS `personal` (
  `id_equipo` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `estado` enum('A') DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plan`
--

CREATE TABLE IF NOT EXISTS `plan` (
  `id_plan` int(11) NOT NULL,
  `fecha_inicia` date NOT NULL,
  `fecha_final` date NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `estado` enum('R','A','C') DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `plan`
--

INSERT INTO `plan` (`id_plan`, `fecha_inicia`, `fecha_final`, `descripcion`, `estado`) VALUES
(18, '0000-00-00', '0000-00-00', 'xxxxxxxxxxxxxxxxxx', 'R'),
(19, '0000-00-00', '0000-00-00', 'La descripcion aca', 'R');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE IF NOT EXISTS `rol` (
  `id_rol` int(11) NOT NULL,
  `rol` varchar(45) NOT NULL,
  `activo` char(1) NOT NULL DEFAULT 'A' COMMENT '		'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `rol`, `activo`) VALUES
(1, 'ADMINISTRADOR', '1'),
(2, 'SUPERVISOR', '1'),
(3, 'OPERADOR', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ruta`
--

CREATE TABLE IF NOT EXISTS `ruta` (
  `id_ruta` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ruta`
--

INSERT INTO `ruta` (`id_ruta`, `nombre`) VALUES
(1, 'Ruta Zona Itca'),
(2, 'Ruta Zona Estadio'),
(3, 'El Cafetalon'),
(4, 'Las Delicias');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ruta_colonia`
--

CREATE TABLE IF NOT EXISTS `ruta_colonia` (
  `id_ruta_colonia` int(11) NOT NULL,
  `id_ruta` int(11) NOT NULL,
  `id_colonia` int(11) NOT NULL,
  `orden` smallint(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ruta_colonia`
--

INSERT INTO `ruta_colonia` (`id_ruta_colonia`, `id_ruta`, `id_colonia`, `orden`) VALUES
(1, 1, 4, 1),
(2, 1, 3, 2),
(3, 1, 5, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE IF NOT EXISTS `solicitud` (
  `id_solicitud` int(11) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `direccion` tinytext,
  `observacion` tinytext,
  `id_estado` int(11) NOT NULL,
  `id_fuente` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `referencia` varchar(45) DEFAULT NULL,
  `id_ruta` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `solicitud`
--

INSERT INTO `solicitud` (`id_solicitud`, `fecha`, `telefono`, `email`, `nombre`, `direccion`, `observacion`, `id_estado`, `id_fuente`, `id_usuario`, `referencia`, `id_ruta`) VALUES
(8, '2016-10-02 00:00:00', '61425952', 'pedro822@hotmail.com', 'Pedro Sanchez', 'Colonia las Delicias', 'Recoleccion de desechos solidos', 1, 1, 1, '016108', 4),
(9, '2016-10-02 00:00:00', '61425952', 'pedro822@hotmail.com', 'Pedro Sanchez', 'Las delicias', 'Recoleccion de desechos solidos', 1, 1, 1, '016109', 4),
(10, '2016-10-15 00:00:00', '3232323', 'alex087309@gmail.com', 'Nombre de prueba', 'd', 'd', 1, 1, 1, '161010', 4),
(11, '2016-10-15 00:00:00', '2', 'alex087309@gmail.com', 'aaaaaa', 'a', 'a', 1, 1, 1, '161011', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE IF NOT EXISTS `tipo` (
  `id_tipo` int(11) NOT NULL,
  `tipo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` enum('A','B') DEFAULT 'A',
  `id_empleado` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `clave`, `fecha_creacion`, `estado`, `id_empleado`) VALUES
(2, 'supervisor1', 'fe01ce2a7fbac8fafaed7c982a04e229', '2016-01-01 00:00:00', 'A', 1),
(3, 'operador', 'fe01ce2a7fbac8fafaed7c982a04e229', '2016-01-01 00:00:00', 'A', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_rol`
--

CREATE TABLE IF NOT EXISTS `usuario_rol` (
  `id_rol` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario_rol`
--

INSERT INTO `usuario_rol` (`id_rol`, `id_usuario`) VALUES
(1, 2),
(3, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD PRIMARY KEY (`id_actividad`);

--
-- Indices de la tabla `actividad_planificada`
--
ALTER TABLE `actividad_planificada`
  ADD PRIMARY KEY (`id_actividad_planificacion`),
  ADD KEY `id_actividad_fk_idx` (`actividad`),
  ADD KEY `id_plan_fk_idx` (`id_plan`),
  ADD KEY `fk_actividad_planificada_ruta_idx` (`id_ruta`);

--
-- Indices de la tabla `automor_equipo`
--
ALTER TABLE `automor_equipo`
  ADD PRIMARY KEY (`id_automor`,`id_equipo`),
  ADD KEY `id_equipo_idx` (`id_equipo`);

--
-- Indices de la tabla `automotor`
--
ALTER TABLE `automotor`
  ADD PRIMARY KEY (`id_automotor`),
  ADD KEY `id_modelo_fk_idx` (`modelo`),
  ADD KEY `id_tipo_fk_idx` (`tipo`),
  ADD KEY `id_estado_fk_idx` (`estado`),
  ADD KEY `id_color_fk_idx` (`color`),
  ADD KEY `id_combustible_fk_idx` (`combustible`);

--
-- Indices de la tabla `automotor_historial`
--
ALTER TABLE `automotor_historial`
  ADD PRIMARY KEY (`id_automotor_historial`),
  ADD KEY `automotor_idx` (`automotor`);

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id_cargo`);

--
-- Indices de la tabla `catalogo_tabla`
--
ALTER TABLE `catalogo_tabla`
  ADD PRIMARY KEY (`id_catalogo_tabla`);

--
-- Indices de la tabla `colonia`
--
ALTER TABLE `colonia`
  ADD PRIMARY KEY (`id_colonia`),
  ADD UNIQUE KEY `nombre_UNIQUE` (`nombre`),
  ADD KEY `fk_colonia_distrito1_idx` (`id_distrito`);

--
-- Indices de la tabla `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id_color`);

--
-- Indices de la tabla `combustible`
--
ALTER TABLE `combustible`
  ADD PRIMARY KEY (`id_combustible`);

--
-- Indices de la tabla `dia_asueto`
--
ALTER TABLE `dia_asueto`
  ADD PRIMARY KEY (`id_dia_asueto`),
  ADD KEY `id_plan_idx` (`id_plan`);

--
-- Indices de la tabla `distrito`
--
ALTER TABLE `distrito`
  ADD PRIMARY KEY (`id_distrito`),
  ADD UNIQUE KEY `nombre_UNIQUE` (`nombre`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id_empleado`),
  ADD KEY `id_cargo_fk_idx` (`cargo`);

--
-- Indices de la tabla `entrega`
--
ALTER TABLE `entrega`
  ADD PRIMARY KEY (`id_entrega`),
  ADD KEY `entrega_orden_trabajo_fk_idx` (`id_orden_trabajo`);

--
-- Indices de la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD PRIMARY KEY (`id_equipo`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`),
  ADD KEY `id_tabla_idx` (`id_tabla`);

--
-- Indices de la tabla `fuente`
--
ALTER TABLE `fuente`
  ADD PRIMARY KEY (`id_fuente`);

--
-- Indices de la tabla `herramienta`
--
ALTER TABLE `herramienta`
  ADD PRIMARY KEY (`id_herramienta`);

--
-- Indices de la tabla `log_usuario`
--
ALTER TABLE `log_usuario`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `id_usuario_fk_idx` (`usuario`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `rol_menu_fk_idx` (`id_rol`),
  ADD KEY `menu_menu_fk_idx` (`id_parent`);

--
-- Indices de la tabla `modelo`
--
ALTER TABLE `modelo`
  ADD PRIMARY KEY (`id_modelo`),
  ADD KEY `id_marca_fk_idx` (`marca`);

--
-- Indices de la tabla `orden_actividad`
--
ALTER TABLE `orden_actividad`
  ADD PRIMARY KEY (`id_orden_actividad`),
  ADD KEY `id_orden_idx` (`id_orden`),
  ADD KEY `id_actividad_idx` (`id_actividad`);

--
-- Indices de la tabla `orden_automotor`
--
ALTER TABLE `orden_automotor`
  ADD PRIMARY KEY (`id_orden_automotor`),
  ADD KEY `id_orden_fk_idx` (`id_orden`),
  ADD KEY `id_automotor_fk_idx` (`id_automotor`);

--
-- Indices de la tabla `orden_empleado`
--
ALTER TABLE `orden_empleado`
  ADD PRIMARY KEY (`id_empleado`,`id_orden`),
  ADD KEY `id_orden_fk_idx` (`id_orden`),
  ADD KEY `id_empleado_fk_idx` (`id_empleado`);

--
-- Indices de la tabla `orden_herramienta`
--
ALTER TABLE `orden_herramienta`
  ADD PRIMARY KEY (`id_orden_herramienta`),
  ADD KEY `orde_herramienta_orden_fk_idx` (`id_orden`),
  ADD KEY `orde_herramienta_herramienta_fk_idx` (`id_herramienta`);

--
-- Indices de la tabla `orden_trabajo`
--
ALTER TABLE `orden_trabajo`
  ADD PRIMARY KEY (`id_orden_trabajo`),
  ADD KEY `ord_trabajo_equipo_fk_idx` (`id_equipo`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`id_equipo`,`id_empleado`),
  ADD KEY `equipo_personal_fk_idx` (`id_empleado`);

--
-- Indices de la tabla `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`id_plan`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `ruta`
--
ALTER TABLE `ruta`
  ADD PRIMARY KEY (`id_ruta`);

--
-- Indices de la tabla `ruta_colonia`
--
ALTER TABLE `ruta_colonia`
  ADD PRIMARY KEY (`id_ruta_colonia`),
  ADD KEY `ruta_colonia_ruta_fk_idx` (`id_ruta`),
  ADD KEY `ruta_colonia_colonia_idx` (`id_colonia`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`id_solicitud`),
  ADD KEY `solicitud_estado_fk_idx` (`id_estado`),
  ADD KEY `solicitud_fuente_fk_idx` (`id_fuente`),
  ADD KEY `solicitud_ruta_fk_idx` (`id_ruta`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `nombre_UNIQUE` (`nombre`),
  ADD KEY `fk_usuario_empleado1_idx` (`id_empleado`);

--
-- Indices de la tabla `usuario_rol`
--
ALTER TABLE `usuario_rol`
  ADD PRIMARY KEY (`id_rol`,`id_usuario`),
  ADD KEY `id_usuario_rol_usuario_fk_idx` (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividad_planificada`
--
ALTER TABLE `actividad_planificada`
  MODIFY `id_actividad_planificacion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `colonia`
--
ALTER TABLE `colonia`
  MODIFY `id_colonia` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=88;
--
-- AUTO_INCREMENT de la tabla `distrito`
--
ALTER TABLE `distrito`
  MODIFY `id_distrito` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `equipo`
--
ALTER TABLE `equipo`
  MODIFY `id_equipo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `log_usuario`
--
ALTER TABLE `log_usuario`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT de la tabla `orden_trabajo`
--
ALTER TABLE `orden_trabajo`
  MODIFY `id_orden_trabajo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `plan`
--
ALTER TABLE `plan`
  MODIFY `id_plan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  MODIFY `id_solicitud` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividad_planificada`
--
ALTER TABLE `actividad_planificada`
  ADD CONSTRAINT `fk_actividad_planificada_ruta` FOREIGN KEY (`id_ruta`) REFERENCES `ruta` (`id_ruta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_actividad_fk` FOREIGN KEY (`actividad`) REFERENCES `actividad` (`id_actividad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_plan_fk` FOREIGN KEY (`id_plan`) REFERENCES `plan` (`id_plan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `automor_equipo`
--
ALTER TABLE `automor_equipo`
  ADD CONSTRAINT `id_automotor` FOREIGN KEY (`id_automor`) REFERENCES `automotor` (`id_automotor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_equipo` FOREIGN KEY (`id_equipo`) REFERENCES `equipo` (`id_equipo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `automotor`
--
ALTER TABLE `automotor`
  ADD CONSTRAINT `id_color_fk` FOREIGN KEY (`color`) REFERENCES `color` (`id_color`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_combustible_fk` FOREIGN KEY (`combustible`) REFERENCES `combustible` (`id_combustible`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_estado_fk` FOREIGN KEY (`estado`) REFERENCES `estado` (`id_estado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_modelo_fk` FOREIGN KEY (`modelo`) REFERENCES `modelo` (`id_modelo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_tipo_fk` FOREIGN KEY (`tipo`) REFERENCES `tipo` (`id_tipo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `automotor_historial`
--
ALTER TABLE `automotor_historial`
  ADD CONSTRAINT `automotor` FOREIGN KEY (`automotor`) REFERENCES `automotor` (`id_automotor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `colonia`
--
ALTER TABLE `colonia`
  ADD CONSTRAINT `fk_colonia_distrito1` FOREIGN KEY (`id_distrito`) REFERENCES `distrito` (`id_distrito`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `dia_asueto`
--
ALTER TABLE `dia_asueto`
  ADD CONSTRAINT `plan_dia_asueto_fk` FOREIGN KEY (`id_plan`) REFERENCES `plan` (`id_plan`);

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `id_cargo_fk` FOREIGN KEY (`cargo`) REFERENCES `cargo` (`id_cargo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `entrega`
--
ALTER TABLE `entrega`
  ADD CONSTRAINT `entrega_orden_trabajo_fk` FOREIGN KEY (`id_orden_trabajo`) REFERENCES `orden_trabajo` (`id_orden_trabajo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `estado`
--
ALTER TABLE `estado`
  ADD CONSTRAINT `id_tabla` FOREIGN KEY (`id_tabla`) REFERENCES `catalogo_tabla` (`id_catalogo_tabla`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `log_usuario`
--
ALTER TABLE `log_usuario`
  ADD CONSTRAINT `id_usuario_fk` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_menu_fk` FOREIGN KEY (`id_parent`) REFERENCES `menu` (`id_menu`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `rol_menu_fk` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `modelo`
--
ALTER TABLE `modelo`
  ADD CONSTRAINT `id_marca_fk` FOREIGN KEY (`marca`) REFERENCES `marca` (`id_marca`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `orden_actividad`
--
ALTER TABLE `orden_actividad`
  ADD CONSTRAINT `id_actividad` FOREIGN KEY (`id_actividad`) REFERENCES `actividad` (`id_actividad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_orden` FOREIGN KEY (`id_orden`) REFERENCES `orden_trabajo` (`id_orden_trabajo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `orden_automotor`
--
ALTER TABLE `orden_automotor`
  ADD CONSTRAINT `id_automotor_fk` FOREIGN KEY (`id_automotor`) REFERENCES `automotor` (`id_automotor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_orden_fk` FOREIGN KEY (`id_orden`) REFERENCES `orden_trabajo` (`id_orden_trabajo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `orden_empleado`
--
ALTER TABLE `orden_empleado`
  ADD CONSTRAINT `ord_empleado_empleado_fk` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_empleado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ord_empleado_orden_fk` FOREIGN KEY (`id_orden`) REFERENCES `orden_trabajo` (`id_orden_trabajo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `orden_herramienta`
--
ALTER TABLE `orden_herramienta`
  ADD CONSTRAINT `orde_herramienta_herramienta_fk` FOREIGN KEY (`id_herramienta`) REFERENCES `herramienta` (`id_herramienta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `orde_herramienta_orden_fk` FOREIGN KEY (`id_orden`) REFERENCES `orden_trabajo` (`id_orden_trabajo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `orden_trabajo`
--
ALTER TABLE `orden_trabajo`
  ADD CONSTRAINT `ord_trabajo_equipo_fk` FOREIGN KEY (`id_equipo`) REFERENCES `equipo` (`id_equipo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `personal`
--
ALTER TABLE `personal`
  ADD CONSTRAINT `equipo_personal_fk` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_empleado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `personal_equipo_fk` FOREIGN KEY (`id_equipo`) REFERENCES `equipo` (`id_equipo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ruta_colonia`
--
ALTER TABLE `ruta_colonia`
  ADD CONSTRAINT `ruta_colonia_colonia` FOREIGN KEY (`id_colonia`) REFERENCES `colonia` (`id_colonia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ruta_colonia_ruta_fk` FOREIGN KEY (`id_ruta`) REFERENCES `ruta` (`id_ruta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD CONSTRAINT `solicitud_estado_fk` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `solicitud_fuente_fk` FOREIGN KEY (`id_fuente`) REFERENCES `fuente` (`id_fuente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `solicitud_ruta_fk` FOREIGN KEY (`id_ruta`) REFERENCES `ruta` (`id_ruta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_empleado1` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_empleado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario_rol`
--
ALTER TABLE `usuario_rol`
  ADD CONSTRAINT `id_usuario_rol_rol_fk` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_usuario_rol_usuario_fk` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
