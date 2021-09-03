-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-08-2018 a las 21:15:45
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.0.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbhottur`
--
CREATE DATABASE IF NOT EXISTS `dbhottur` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `dbhottur`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bienes`
--

CREATE TABLE `bienes` (
  `IdBienes` int(11) NOT NULL,
  `NombreBienes` varchar(45) COLLATE utf8_bin NOT NULL,
  `ValorBienes` decimal(25,0) NOT NULL,
  `ObservacionBienes` varchar(200) COLLATE utf8_bin NOT NULL,
  `EstadoBienes` varchar(15) COLLATE utf8_bin NOT NULL,
  `CantidadBienes` int(11) NOT NULL,
  `IdTipoBienes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `bienes`
--

INSERT INTO `bienes` (`IdBienes`, `NombreBienes`, `ValorBienes`, `ObservacionBienes`, `EstadoBienes`, `CantidadBienes`, `IdTipoBienes`) VALUES
(1, 'SABANAS PERSAS', '1200000', 'NINGUNA', 'BUENO', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caja`
--

CREATE TABLE `caja` (
  `IdCaja` int(11) NOT NULL,
  `ValorBaseCaja` decimal(25,0) NOT NULL,
  `ValorActualCaja` decimal(25,0) NOT NULL,
  `FechaCaja` date NOT NULL,
  `HoraAperturaCaja` time NOT NULL,
  `HoraCierreCaja` time NOT NULL,
  `ObservacionesCaja` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `IdUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `caja`
--

INSERT INTO `caja` (`IdCaja`, `ValorBaseCaja`, `ValorActualCaja`, `FechaCaja`, `HoraAperturaCaja`, `HoraCierreCaja`, `ObservacionesCaja`, `IdUsuario`) VALUES
(1, '1345000', '0', '2018-06-21', '09:16:58', '11:53:01', 'OK', 1),
(2, '1345000', '0', '2018-06-21', '09:17:54', '00:00:00', 'ninguna', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `IdCiudad` int(11) NOT NULL,
  `NombreCiudad` varchar(50) COLLATE utf8_bin NOT NULL,
  `IdDepartamento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`IdCiudad`, `NombreCiudad`, `IdDepartamento`) VALUES
(1, 'LETICIA', 1),
(2, 'MEDELLÍN', 2),
(3, 'ARAUCA', 3),
(4, 'BARRANQUILLA', 4),
(5, 'CARTAGENA', 5),
(6, 'TUNJA', 6),
(7, 'MANIZALES', 7),
(8, 'FLORENCIA', 8),
(9, 'YOPAL', 9),
(10, 'POPAYÁN', 10),
(11, 'VALLEDUPAR', 11),
(12, 'QUIBDÓ', 12),
(13, 'MONTERÍA', 13),
(14, 'SANTA FE DE BOGOTÁ', 14),
(15, 'PUERTO INÍRIDA', 15),
(16, 'SAN JOSÉ DEL GUAVIARE', 16),
(17, 'NEIVA', 17),
(18, 'RIOHACHA', 18),
(19, 'SANTA MARTA', 19),
(20, 'VILLAVICENCIO', 20),
(21, 'PASTO', 21),
(22, 'CÚCUTA', 22),
(23, 'MOCOA', 23),
(24, 'ARMENIA', 24),
(25, 'PEREIRA', 25),
(26, 'SAN ANDRÉS', 26),
(27, 'BUCARAMANGA', 27),
(28, 'SINCELEJO', 28),
(29, 'IBAGUÉ', 29),
(30, 'CALI', 30),
(31, 'MITÚ', 31),
(32, 'PUERTO CARREÑO', 32);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `IdCliente` int(11) NOT NULL,
  `NitCliente` varchar(20) COLLATE utf8_bin NOT NULL,
  `TipoDocumentoCliente` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `NombreCliente` varchar(45) COLLATE utf8_bin NOT NULL,
  `ApellidoCliente` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `DireccionCliente` varchar(100) COLLATE utf8_bin NOT NULL,
  `Telefono1Cliente` varchar(20) COLLATE utf8_bin NOT NULL,
  `Telefono2Cliente` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `CorreoCliente` varchar(120) COLLATE utf8_bin NOT NULL,
  `ObservacionesCliente` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `PreferenciasCliente` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `ComisionCliente` double DEFAULT NULL,
  `NumeroCuentaCliente` varchar(60) COLLATE utf8_bin DEFAULT NULL,
  `ActividadEconomicaCliente` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `ValorCreditoCliente` decimal(25,0) DEFAULT NULL,
  `NacionalidadCliente` varchar(30) COLLATE utf8_bin NOT NULL,
  `ContactoCliente` varchar(60) COLLATE utf8_bin DEFAULT NULL,
  `CodigoMagicoCliente` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `DescuentoCliente` double DEFAULT NULL,
  `IdCiudad` int(11) DEFAULT NULL,
  `IdClienteTipo` int(11) DEFAULT NULL,
  `IdPersonaTipo` int(11) DEFAULT NULL,
  `IdContribuyenteTipo` int(11) DEFAULT NULL,
  `IdConvenio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`IdCliente`, `NitCliente`, `TipoDocumentoCliente`, `NombreCliente`, `ApellidoCliente`, `DireccionCliente`, `Telefono1Cliente`, `Telefono2Cliente`, `CorreoCliente`, `ObservacionesCliente`, `PreferenciasCliente`, `ComisionCliente`, `NumeroCuentaCliente`, `ActividadEconomicaCliente`, `ValorCreditoCliente`, `NacionalidadCliente`, `ContactoCliente`, `CodigoMagicoCliente`, `DescuentoCliente`, `IdCiudad`, `IdClienteTipo`, `IdPersonaTipo`, `IdContribuyenteTipo`, `IdConvenio`) VALUES
(1, '90358478', 'CEDULA DE CIUDADANIA', 'MANUEL', 'PÃ©REZ', '', '6724898', NULL, 'MANUELPEREZ@HOTMAIL.COM', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(2, '123456789', '', 'PROLECHE SA.', '', 'CLL 40 B #12- 21 JORDAN', '66234234', '63241241', 'PROLECHE@GMAIL.COM', 'NINGUNA', 'NINGUNA', 0, '00000000', 'NINGUNA', '0', 'COLOMBIANO', NULL, '121212', NULL, 20, 2, 2, 2, NULL),
(3, '897587254', '', 'EL SOL', '', 'CR 7 #187 - 29', '311587214', '311587214', 'ELSOL@GMAIL,COM', 'NINGUNA', 'NINGUNA', 0, '1212121', 'NINGUNA', '0', 'COLOMBIANO', NULL, '0000', NULL, 14, 3, 0, 1, NULL),
(4, '1121961159', 'CEDULA DE CIUDADANIA', 'ANDREA', 'NOGAL', 'AV 40 VIA ACACIAS', '3212190121', '5213121', 'ANDREANG@HOTMAIL.COM', NULL, 'NINGUNA', NULL, '', 'ING', NULL, 'COLOMBIANO', NULL, '', NULL, 20, 1, 1, 1, NULL),
(8, '1234554321', 'CEDULA DE CIUDADANIA', 'ANA MARIA', 'CARRILLO', 'CLL 4 # 12 A - 10', '3213213', '3123321', 'ANAMARIACARRILO@GMAIL.COM', NULL, 'N/A', NULL, '', 'DOCENTE', NULL, 'COLOMBIANO', NULL, '', NULL, 20, 1, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientetipo`
--

CREATE TABLE `clientetipo` (
  `IdClienteTipo` int(11) NOT NULL,
  `NombreClienteTipo` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `clientetipo`
--

INSERT INTO `clientetipo` (`IdClienteTipo`, `NombreClienteTipo`) VALUES
(1, 'PARTICULAR'),
(2, 'CORPORATIVO'),
(3, 'AGENCIA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comprobanteegreso`
--

CREATE TABLE `comprobanteegreso` (
  `IdComprobanteEgreso` int(11) NOT NULL,
  `FechaComprobanteEgreso` datetime NOT NULL,
  `ConceptoComprobanteEgreso` varchar(150) COLLATE utf8_bin NOT NULL,
  `ValorComprobanteEgreso` decimal(25,0) NOT NULL,
  `ValorLetrasComprobanteEgreso` varchar(200) COLLATE utf8_bin NOT NULL,
  `IdCaja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consumos`
--

CREATE TABLE `consumos` (
  `IdConsumos` int(11) NOT NULL,
  `TipoConsumos` varchar(20) COLLATE utf8_bin NOT NULL,
  `ValorConsumos` decimal(25,0) NOT NULL,
  `CantidadConsumos` int(11) NOT NULL,
  `EstadoConsumos` varchar(40) COLLATE utf8_bin NOT NULL,
  `IdFacturaExterna` int(11) DEFAULT NULL,
  `IdFolio` int(11) DEFAULT NULL,
  `IdCotizacion` int(11) DEFAULT NULL,
  `IdServicios` int(11) DEFAULT NULL,
  `IdBienes` int(11) DEFAULT NULL,
  `IdProductos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `consumos`
--

INSERT INTO `consumos` (`IdConsumos`, `TipoConsumos`, `ValorConsumos`, `CantidadConsumos`, `EstadoConsumos`, `IdFacturaExterna`, `IdFolio`, `IdCotizacion`, `IdServicios`, `IdBienes`, `IdProductos`) VALUES
(1, 'NULL', '3000', 1, 'NO CANCELADO', NULL, 2, NULL, NULL, NULL, 16),
(2, 'NULL', '35000', 1, 'NO CANCELADO', NULL, 2, NULL, NULL, NULL, 15),
(3, 'NULL', '6722', 2, 'NO CANCELADO', NULL, 10, NULL, NULL, NULL, 8),
(4, 'NULL', '10000', 1, 'NO CANCELADO', NULL, 10, NULL, NULL, NULL, 17),
(5, 'NULL', '12000', 1, 'NO CANCELADO', NULL, 10, NULL, NULL, NULL, 18),
(6, 'NULL', '3361', 1, 'CANCELADO', 2, 3, NULL, NULL, NULL, 8),
(7, 'NULL', '1680', 1, 'CANCELADO', 2, 3, NULL, NULL, NULL, 11),
(8, 'NULL', '3361', 1, 'CANCELADO', 2, 3, NULL, NULL, NULL, 7),
(9, 'NULL', '3781', 1, 'CANCELADO', 2, 3, NULL, NULL, NULL, 6),
(10, 'NULL', '10000', 1, 'CANCELADO', 2, 3, NULL, NULL, NULL, 17),
(11, 'NULL', '12000', 1, 'CANCELADO', 2, 3, NULL, NULL, NULL, 18),
(12, 'NULL', '12000', 1, 'CANCELADO', 6, 1, NULL, NULL, NULL, 18),
(13, 'NULL', '4500', 1, 'CANCELADO', 6, 1, NULL, 1, NULL, NULL),
(14, 'NULL', '67227', 1, 'CANCELADO', 6, 1, NULL, 2, NULL, NULL),
(15, 'NULL', '3361', 1, 'CANCELADO', 6, 1, NULL, NULL, NULL, 8),
(16, 'NULL', '67227', 1, 'CANCELADO', 6, 1, NULL, 2, NULL, NULL),
(17, 'NULL', '2521', 1, 'CANCELADO', 6, 1, NULL, NULL, NULL, 14),
(18, 'NULL', '10000', 1, 'CANCELADO', 6, 1, NULL, NULL, NULL, 17),
(19, 'NULL', '10000', 1, 'CANCELADO', 6, 1, NULL, NULL, NULL, 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contribuyentetipo`
--

CREATE TABLE `contribuyentetipo` (
  `IdContribuyenteTipo` int(11) NOT NULL,
  `NombreContribuyenteTipo` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `contribuyentetipo`
--

INSERT INTO `contribuyentetipo` (`IdContribuyenteTipo`, `NombreContribuyenteTipo`) VALUES
(1, 'COMUN'),
(2, 'SIMPLIFICADO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `convenio`
--

CREATE TABLE `convenio` (
  `IdConvenio` int(11) NOT NULL,
  `CodigoConvenio` varchar(20) COLLATE utf8_bin NOT NULL,
  `EstadoConvenio` varchar(25) COLLATE utf8_bin NOT NULL,
  `NombreConvenio` varchar(50) COLLATE utf8_bin NOT NULL,
  `FormaPagoConvenio` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `InicioFechaConvenio` date NOT NULL,
  `FinFechaConvenio` date NOT NULL,
  `PenalizacionConvenio` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizacion`
--

CREATE TABLE `cotizacion` (
  `IdCotizacion` int(11) NOT NULL,
  `DatosClienteCotizacion` varchar(500) COLLATE utf8_bin NOT NULL,
  `TipoHabitacionCotizacion` varchar(45) COLLATE utf8_bin NOT NULL,
  `FechaCotizacion` datetime NOT NULL,
  `FechaInicioCotizacion` datetime NOT NULL,
  `FechaSalidaCotizacion` datetime NOT NULL,
  `PlazoCotizacion` int(11) NOT NULL,
  `ObservacionesCotizacion` varchar(250) COLLATE utf8_bin NOT NULL,
  `ValorCotizacion` decimal(25,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datosempresa`
--

CREATE TABLE `datosempresa` (
  `IdDatosEmpresa` int(11) NOT NULL,
  `NitDatosEmpresa` varchar(20) COLLATE utf8_bin NOT NULL,
  `NombreDatosEmpresa` varchar(50) COLLATE utf8_bin NOT NULL,
  `TelefonoDatosEmpresa` varchar(20) COLLATE utf8_bin NOT NULL,
  `CorreoDatosEmpresa` varchar(70) COLLATE utf8_bin NOT NULL,
  `DireccionDatosEmpresa` varchar(80) COLLATE utf8_bin NOT NULL,
  `LogoDatosEmpresa` text COLLATE utf8_bin,
  `WebDatosEmpresa` varchar(200) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `datosempresa`
--

INSERT INTO `datosempresa` (`IdDatosEmpresa`, `NitDatosEmpresa`, `NombreDatosEmpresa`, `TelefonoDatosEmpresa`, `CorreoDatosEmpresa`, `DireccionDatosEmpresa`, `LogoDatosEmpresa`, `WebDatosEmpresa`) VALUES
(1, '1111111', 'SENA', '1234', 'SENA@SENA.CO', 'KM 1 VIA ACACIAS', '2018-07-1204-06-5027544985_171140533528822_3723841281707009980_n.png', 'WWW.SENA.EDU.CO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `IdDepartamento` int(11) NOT NULL,
  `NombreDepartamento` varchar(60) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`IdDepartamento`, `NombreDepartamento`) VALUES
(1, 'AMAZONAS'),
(2, 'ANTIOQUIA'),
(3, 'ARAUCA'),
(4, 'ATLANTICO'),
(5, 'BOLIVAR'),
(6, 'BOYACA'),
(7, 'CALDAS'),
(8, 'CAQUETA'),
(9, 'CASANARE'),
(10, 'CAUCA'),
(11, 'CESAR'),
(12, 'CHOCO'),
(13, 'CORDOBA'),
(14, 'CUNDINAMARCA'),
(15, 'GUAINIA'),
(16, 'GUAVIARE'),
(17, 'HUILA'),
(18, 'LA GUAJIRA'),
(19, 'MAGDALENA'),
(20, 'META'),
(21, 'NARI?O'),
(22, 'NORTE DE SANTANDER'),
(23, 'PUTUMAYO'),
(24, 'QUINDIO'),
(25, 'RISARALDA'),
(26, 'SAN ANDRES Y PROVIDENCIA'),
(27, 'SANTANDER'),
(28, 'SUCRE'),
(29, 'TOLIMA'),
(30, 'VALLE DEL CAUCA'),
(31, 'VAUPES'),
(32, 'VICHADA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturaexterna`
--

CREATE TABLE `facturaexterna` (
  `IdFacturaExterna` int(11) NOT NULL,
  `FechaFacturaExterna` datetime NOT NULL,
  `IvaFacturaExterna` decimal(10,0) NOT NULL,
  `SubTotalFacturaExterna` decimal(10,0) NOT NULL,
  `ValorTotalFacturaExterna` decimal(25,0) NOT NULL,
  `ValorLetrasFacturaExterna` varchar(500) COLLATE utf8_bin NOT NULL,
  `IdFolios` varchar(250) COLLATE utf8_bin NOT NULL,
  `ValorCreditoFacturaExterna` decimal(11,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `facturaexterna`
--

INSERT INTO `facturaexterna` (`IdFacturaExterna`, `FechaFacturaExterna`, `IvaFacturaExterna`, `SubTotalFacturaExterna`, `ValorTotalFacturaExterna`, `ValorLetrasFacturaExterna`, `IdFolios`, `ValorCreditoFacturaExterna`) VALUES
(1, '2018-08-23 00:00:00', '4073', '34183', '38256', 'TREINTA Y OCHO MIL DOSCIENTOS CINCUENTA Y SEIS  ', '[3]', '0'),
(2, '2018-08-23 00:00:00', '19805', '142483', '162288', 'CIENTO SESENTA Y DOS MIL DOSCIENTOS OCHENTA Y OCHO  ', '[[3]][3]', '0'),
(3, '2018-08-23 00:00:00', '70794', '423600', '494394', 'CUATROCIENTOS NOVENTA Y CUATRO MIL TRESCIENTOS NOVENTA Y CUATRO  ', '[[[9]][4]][7]', '0'),
(4, '2018-08-23 00:00:00', '70794', '423600', '494394', 'CUATROCIENTOS NOVENTA Y CUATRO MIL TRESCIENTOS NOVENTA Y CUATRO  ', '[[[9]][4]][7]', '0'),
(5, '2018-08-23 00:00:00', '30077', '176836', '206913', 'DOSCIENTOS SEIS MIL NOVECIENTOS TRECE  ', '[1]', '0'),
(6, '2018-08-23 00:00:00', '37943', '235236', '273179', 'DOSCIENTOS SETENTA Y TRES MIL CIENTO SETENTA Y NUEVE  ', '[[1]][1]', '0'),
(7, '2018-08-24 00:00:00', '18769', '136521', '155290', 'CIENTO CINCUENTA Y CINCO MIL DOSCIENTOS NOVENTA  ', '0', '100000'),
(8, '2018-08-24 00:00:00', '15086', '87900', '102986', 'CIENTO DOS MIL NOVECIENTOS OCHENTA Y SEIS  ', '0', '50000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `folio`
--

CREATE TABLE `folio` (
  `IdFolio` int(11) NOT NULL,
  `FechaFolio` datetime NOT NULL,
  `EstadoFolio` varchar(30) COLLATE utf8_bin NOT NULL,
  `ResponsableOcupacionFolio` varchar(70) COLLATE utf8_bin NOT NULL,
  `TipoFolio` varchar(30) COLLATE utf8_bin NOT NULL,
  `ValorEstadiaFolio` decimal(25,0) NOT NULL,
  `IdMovimientoHabitacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `folio`
--

INSERT INTO `folio` (`IdFolio`, `FechaFolio`, `EstadoFolio`, `ResponsableOcupacionFolio`, `TipoFolio`, `ValorEstadiaFolio`, `IdMovimientoHabitacion`) VALUES
(1, '2018-08-22 13:19:22', 'FINALIZADO', 'Margarita  Ortiz ', 'TITULAR', '41400', 4),
(2, '2018-08-22 14:05:35', 'FINALIZADO', 'ANDREA NOGAL', 'TITULAR', '41400', 6),
(3, '2018-08-23 11:35:45', 'FINALIZADO', 'ROSA MARIA ACIEN ZURUTA', 'TITULAR', '124200', 7),
(4, '2018-08-23 11:45:27', 'FINALIZADO', 'SUSANA AMAT MENA', 'TITULAR', '124200', 9),
(7, '2018-08-23 11:49:09', 'FINALIZADO', 'NATALIA BENAYAS PEREZ', 'TITULAR', '124200', 11),
(9, '2018-08-23 11:53:04', 'FINALIZADO', 'MARIA DEL MAR CACERES CONTRERAS', 'TITULAR', '124200', 13),
(10, '2018-08-23 12:23:53', 'FINALIZADO', 'ANA MARIA CARRILLO', 'TITULAR', '82800', 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitacion`
--

CREATE TABLE `habitacion` (
  `IdHabitacion` int(11) NOT NULL,
  `NombreHabitacion` varchar(20) COLLATE utf8_bin NOT NULL,
  `EstadoHabitacion` varchar(20) COLLATE utf8_bin NOT NULL,
  `ObservacionesHabitacion` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `IdHabitacionTipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `habitacion`
--

INSERT INTO `habitacion` (`IdHabitacion`, `NombreHabitacion`, `EstadoHabitacion`, `ObservacionesHabitacion`, `IdHabitacionTipo`) VALUES
(1, '100', 'DISPONIBLE', 'OK', 1),
(2, '101', 'DISPONIBLE', 'OK', 1),
(3, '102', 'DISPONIBLE', 'OK', 1),
(4, '103', 'DISPONIBLE', 'OK', 1),
(5, '104', 'DISPONIBLE', 'OK', 1),
(6, '105', 'MANTENIMIENTO', 'OK', 3),
(7, '106', 'DISPONIBLE', 'OK', 3),
(8, '107', 'DISPONIBLE', 'OK', 2),
(9, '108', 'DISPONIBLE', 'OK', 2),
(10, '109', 'DISPONIBLE', 'OK', 2),
(11, '110', 'DISPONIBLE', 'OK', 2),
(12, '111', 'DISPONIBLE', 'OK', 2),
(13, '112', 'DISPONIBLE', 'OK', 3),
(14, '113', 'DISPONIBLE', 'OK', 3),
(15, '114', 'DISPONIBLE', 'OK', 3),
(16, '115', 'DISPONIBLE', 'OK', 3),
(17, '116', 'DISPONIBLE', 'OK', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitaciontipo`
--

CREATE TABLE `habitaciontipo` (
  `IdHabitacionTipo` int(11) NOT NULL,
  `NombreHabitacionTipo` varchar(30) COLLATE utf8_bin NOT NULL,
  `FechaCreacionHabitacionTipo` date NOT NULL,
  `CantidadPaxHabitacionTipo` int(11) NOT NULL,
  `ValorPaxHabitacionTipo` decimal(25,0) NOT NULL,
  `ValorAdicionalHabitacionTipo` decimal(25,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `habitaciontipo`
--

INSERT INTO `habitaciontipo` (`IdHabitacionTipo`, `NombreHabitacionTipo`, `FechaCreacionHabitacionTipo`, `CantidadPaxHabitacionTipo`, `ValorPaxHabitacionTipo`, `ValorAdicionalHabitacionTipo`) VALUES
(1, 'ESTANDAR', '2018-06-12', 3, '45000', '45000'),
(2, 'ESTANDAR ESPECIAL', '2018-06-12', 3, '60000', '45000'),
(3, 'JUNIOR SUITE', '2018-06-12', 3, '75000', '45000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historialcaja`
--

CREATE TABLE `historialcaja` (
  `IdHistorialCaja` int(11) NOT NULL,
  `ValorBaseCaja` decimal(25,0) NOT NULL,
  `ValorActualHistorialCaja` decimal(25,0) NOT NULL,
  `FechaHistorialCaja` date NOT NULL,
  `HoraHistorialCaja` time NOT NULL,
  `ObservacionesHistorialCaja` varchar(200) COLLATE utf8_bin NOT NULL,
  `IdCaja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historialcomprobanteingreso`
--

CREATE TABLE `historialcomprobanteingreso` (
  `IdHistorialComprobanteIngreso` int(11) NOT NULL,
  `FechaHistorialComprobanteIngreso` datetime NOT NULL,
  `IdComprobanteIngreso` int(11) NOT NULL,
  `FechaComprobanteIngreso` datetime NOT NULL,
  `NombreComprobanteIngreso` varchar(50) COLLATE utf8_bin NOT NULL,
  `ValorComprobanteIngreso` decimal(25,0) NOT NULL,
  `CedulaComprobanteIngreso` varchar(20) COLLATE utf8_bin NOT NULL,
  `FormaPagoComprobaanteIngreso` varchar(45) COLLATE utf8_bin NOT NULL,
  `ConceptoComprobanteIngreso` varchar(200) COLLATE utf8_bin NOT NULL,
  `ValorLetrasComprobanteIngreso` varchar(200) COLLATE utf8_bin NOT NULL,
  `IdMovimiento` int(11) NOT NULL,
  `IdHabitacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `historialcomprobanteingreso`
--

INSERT INTO `historialcomprobanteingreso` (`IdHistorialComprobanteIngreso`, `FechaHistorialComprobanteIngreso`, `IdComprobanteIngreso`, `FechaComprobanteIngreso`, `NombreComprobanteIngreso`, `ValorComprobanteIngreso`, `CedulaComprobanteIngreso`, `FormaPagoComprobaanteIngreso`, `ConceptoComprobanteIngreso`, `ValorLetrasComprobanteIngreso`, `IdMovimiento`, `IdHabitacion`) VALUES
(1, '2018-08-22 20:36:40', 0, '0000-00-00 00:00:00', 'MANUEL', '300000', '90358478 ', 'EFECTIVO', 'ABONO DE OBSERVACIÃ’N 3 HAB', 'TRESCIENTOS MIL ', 1, 0),
(2, '2018-08-23 19:14:04', 0, '0000-00-00 00:00:00', 'ANA MARIA', '199800', '1234554321', 'EFECTIVO', 'ABONO ALOJAMIENTO', 'CIENTO NOVENTA Y NUEVE MIL OCHOCIENTOS  ', 12, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historialprocesousuario`
--

CREATE TABLE `historialprocesousuario` (
  `IdHistorialProcesoUsuario` int(11) NOT NULL,
  `IdProcesoRealizado` varchar(50) COLLATE utf8_bin NOT NULL,
  `NombreProceso` varchar(50) COLLATE utf8_bin NOT NULL,
  `FechaProceso` datetime NOT NULL,
  `FechadelIngreso` datetime NOT NULL,
  `IdUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historialtipohabitacion`
--

CREATE TABLE `historialtipohabitacion` (
  `IdHistorialTipoHabitacion` int(11) NOT NULL,
  `NombreTipoHabitacion` varchar(25) COLLATE utf8_bin NOT NULL,
  `CantidadMaximaPaxHistorialTipoHabitacion` int(11) NOT NULL,
  `ValorPaxHistorialTipoHabitacion` decimal(25,0) NOT NULL,
  `ValorAdicionalHistorialTipoHabitacion` decimal(25,0) NOT NULL,
  `FechaActualizacionHistorialTipoHabitacion` date NOT NULL,
  `IdHabitacionTipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `huesped`
--

CREATE TABLE `huesped` (
  `IdHuesped` int(11) NOT NULL,
  `NumeroDocumentoHuesped` varchar(25) COLLATE utf8_bin NOT NULL,
  `NombreHuesped` varchar(45) COLLATE utf8_bin NOT NULL,
  `ApellidoHuesped` varchar(50) COLLATE utf8_bin NOT NULL,
  `TelefonoHuesped` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `NacionalidadHuesped` varchar(45) COLLATE utf8_bin NOT NULL,
  `TipoSangreHuesped` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `TipoDocumentoHuesped` varchar(20) COLLATE utf8_bin NOT NULL,
  `DireccionHuesped` varchar(70) COLLATE utf8_bin DEFAULT NULL,
  `EstadoOcupacionHuesped` varchar(45) COLLATE utf8_bin NOT NULL,
  `FechaNacimientoHuesped` date DEFAULT NULL,
  `TipoHuesped` varchar(25) COLLATE utf8_bin NOT NULL,
  `ProfesionHuesped` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `SeguroHuesped` decimal(25,0) DEFAULT NULL,
  `FechaEntradaHuesped` datetime NOT NULL,
  `FechaSalidaHuesped` datetime DEFAULT NULL,
  `IdMovimientoHabitacion` int(11) DEFAULT NULL,
  `IdCiudad` int(11) DEFAULT NULL,
  `ObservacionesHuesped` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `huesped`
--

INSERT INTO `huesped` (`IdHuesped`, `NumeroDocumentoHuesped`, `NombreHuesped`, `ApellidoHuesped`, `TelefonoHuesped`, `NacionalidadHuesped`, `TipoSangreHuesped`, `TipoDocumentoHuesped`, `DireccionHuesped`, `EstadoOcupacionHuesped`, `FechaNacimientoHuesped`, `TipoHuesped`, `ProfesionHuesped`, `SeguroHuesped`, `FechaEntradaHuesped`, `FechaSalidaHuesped`, `IdMovimientoHabitacion`, `IdCiudad`, `ObservacionesHuesped`) VALUES
(1, '1121961213', 'MARGARITA ', 'ORTIZ ', NULL, 'COLOMBIANO', NULL, 'CEDULA DE CIUDADANIA', NULL, 'FINALIZADO', '1996-02-14', 'ADULTO', NULL, '8500', '2018-08-22 13:19:23', '2018-08-23 13:00:00', 4, NULL, 'ninguna'),
(2, '1121961159', 'ANDREA', 'NOGAL', NULL, 'COLOMBIANO', NULL, 'CEDULA DE CIUDADANIA', NULL, 'ACTIVO', '1993-08-25', 'ADULTO', NULL, '8500', '2018-08-22 14:05:35', '2018-08-23 13:00:00', 6, NULL, 'NINGUNA'),
(4, '12345678910', 'JUAN CARLOS', 'CARRILLO', NULL, 'COLOMBIANO', NULL, 'CEDULA DE CIUDADANIA', NULL, 'FINALIZADO', '1984-01-02', 'ADICIONAL', NULL, '8500', '2018-08-23 08:57:28', NULL, 4, NULL, 'NINGUNA'),
(5, '53712051', 'ROSA MARIA', 'ACIEN ZURUTA', NULL, 'COLOMBIANO', NULL, 'CEDULA DE CIUDADANIA', NULL, 'FINALIZADO', '1996-08-23', 'ADULTO', NULL, '8500', '2018-08-23 11:35:45', '2018-08-24 13:00:00', 7, NULL, 'N/A'),
(6, '75098488S', 'DANIEL', 'TAMARGO', NULL, 'COLOMBIANO', NULL, 'CEDULA DE CIUDADANIA', NULL, 'FINALIZADO', '1993-03-02', 'ADULTO', NULL, '8500', '2018-08-23 11:35:45', '2018-08-24 13:00:00', 7, NULL, 'N/A'),
(7, '45295530', 'JOSE', 'BECERRA', NULL, 'COLOMBIANO', NULL, 'CEDULA DE CIUDADANIA', NULL, 'FINALIZADO', '1993-03-01', 'ADULTO', NULL, '8500', '2018-08-23 11:35:45', '2018-08-24 13:00:00', 7, NULL, 'N/A'),
(8, '78035832', 'SUSANA', 'AMAT MENA', NULL, 'COLOMBIANO', NULL, 'CEDULA DE CIUDADANIA', NULL, 'FINALIZADO', '1980-08-23', 'ADULTO', NULL, '0', '2018-08-23 11:45:32', '2018-08-24 13:00:00', 9, NULL, 'N/A'),
(9, '78035130', 'IRENE ', 'AMATE GARRIDO', NULL, 'COLOMBIANO', NULL, 'CEDULA DE CIUDADANIA', NULL, 'FINALIZADO', '1980-08-23', 'ADULTO', NULL, '8500', '2018-08-23 11:45:32', '2018-08-24 13:00:00', 9, NULL, 'N/A'),
(10, '75238658', 'MAGDALENA', 'APARICIO GARCIA', NULL, 'COLOMBIANO', NULL, 'CEDULA DE CIUDADANIA', NULL, 'FINALIZADO', '1980-08-23', 'ADULTO', NULL, '8500', '2018-08-23 11:45:32', '2018-08-24 13:00:00', 9, NULL, 'N/A'),
(11, '75258403', 'NATALIA', 'BENAYAS PEREZ', NULL, 'COLOMBIANO', NULL, 'CEDULA DE CIUDADANIA', NULL, 'FINALIZADO', '1994-08-19', 'ADULTO', NULL, '0', '2018-08-23 11:49:09', '2018-08-24 13:00:00', 11, NULL, 'N/A'),
(12, '75243008', 'FRANCISCO CESAR', 'BERNABE CASANOVA', NULL, 'COLOMBIANO', NULL, 'CEDULA DE CIUDADANIA', NULL, 'FINALIZADO', '1994-08-19', 'ADULTO', NULL, '8500', '2018-08-23 11:49:09', '2018-08-24 13:00:00', 11, NULL, 'N/A'),
(13, '75257344', 'ENCARNACION', 'BERNAL RUIZ', NULL, 'COLOMBIANO', NULL, 'CEDULA DE CIUDADANIA', NULL, 'FINALIZADO', '1994-08-19', 'ADULTO', NULL, '8500', '2018-08-23 11:49:09', '2018-08-24 13:00:00', 11, NULL, 'N/A'),
(14, '75260267', 'MARIA DEL MAR', 'CACERES CONTRERAS', NULL, 'COLOMBIANO', NULL, 'CEDULA DE CIUDADANIA', NULL, 'FINALIZADO', '1985-08-24', 'ADULTO', NULL, '0', '2018-08-23 11:53:05', '2018-08-24 13:00:00', 13, NULL, 'N/A'),
(15, '53712815', 'MARIA BELEN ', 'CAMPOS VIQUE', NULL, 'COLOMBIANO', NULL, 'CEDULA DE CIUDADANIA', NULL, 'FINALIZADO', '1985-08-30', 'ADULTO', NULL, '8500', '2018-08-23 11:53:05', '2018-08-24 13:00:00', 13, NULL, 'N/A'),
(16, '75231918', 'MONICA', 'CARREÃ‘O NAVARRO', NULL, 'COLOMBIANO', NULL, 'CEDULA DE CIUDADANIA', NULL, 'FINALIZADO', '1985-08-29', 'ADULTO', NULL, '8500', '2018-08-23 11:53:05', '2018-08-24 13:00:00', 13, NULL, 'N/A'),
(17, '1234554321', 'ANA MARIA', 'CARRILLO', NULL, 'COLOMBIANO', NULL, 'CEDULA DE CIUDADANIA', NULL, 'ACTIVO', '1986-02-26', 'ADULTO', NULL, '8500', '2018-08-23 12:23:53', '2018-08-24 13:00:00', 14, NULL, 'n/a'),
(18, '1234561234', 'CARLOS CAMILO', 'PEREA', NULL, 'COLOMBIANO', NULL, 'CEDULA DE CIUDADANIA', NULL, 'ACTIVO', '1983-03-03', 'ADULTO', NULL, '8500', '2018-08-23 12:23:53', '2018-08-24 13:00:00', 14, NULL, 'n/a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingresocomprobante`
--

CREATE TABLE `ingresocomprobante` (
  `IdIngresoComprobante` int(11) NOT NULL,
  `FechaIngresoComprobante` datetime NOT NULL,
  `NombreClienteIngresoComprobante` varchar(70) COLLATE utf8_bin NOT NULL,
  `CedulaIngresoComprobante` varchar(20) COLLATE utf8_bin NOT NULL,
  `ValorIngresoComprobante` decimal(25,0) NOT NULL,
  `FormaPagoIngresoComprobante` varchar(20) COLLATE utf8_bin NOT NULL,
  `ConceptoIngresoComprobante` varchar(200) COLLATE utf8_bin NOT NULL,
  `ValorLetrasIngresoComprobante` varchar(120) COLLATE utf8_bin NOT NULL,
  `IdHabitacion` int(11) NOT NULL,
  `IdMovimiento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `ingresocomprobante`
--

INSERT INTO `ingresocomprobante` (`IdIngresoComprobante`, `FechaIngresoComprobante`, `NombreClienteIngresoComprobante`, `CedulaIngresoComprobante`, `ValorIngresoComprobante`, `FormaPagoIngresoComprobante`, `ConceptoIngresoComprobante`, `ValorLetrasIngresoComprobante`, `IdHabitacion`, `IdMovimiento`) VALUES
(1, '2018-08-22 20:36:40', 'MANUEL', '90358478 ', '300000', 'EFECTIVO', 'ABONO DE OBSERVACIÃ’N 3 HAB', 'TRESCIENTOS MIL ', 0, 1),
(2, '2018-08-23 19:14:04', 'ANA MARIA', '1234554321', '199800', 'EFECTIVO', 'ABONO ALOJAMIENTO', 'CIENTO NOVENTA Y NUEVE MIL OCHOCIENTOS  ', 0, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `iva`
--

CREATE TABLE `iva` (
  `IdIva` int(11) NOT NULL,
  `NombreIva` varchar(50) COLLATE utf8_bin NOT NULL,
  `PorcentajeIva` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `iva`
--

INSERT INTO `iva` (`IdIva`, `NombreIva`, `PorcentajeIva`) VALUES
(1, 'IVA', 19),
(2, 'CONSUMO', 8),
(3, 'CONSUMO 1', 12),
(4, 'CONSUMO 2', 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimiento`
--

CREATE TABLE `movimiento` (
  `IdMovimiento` int(11) NOT NULL,
  `TipoMovimiento` varchar(30) COLLATE utf8_bin NOT NULL,
  `EstadoMovimiento` varchar(15) COLLATE utf8_bin NOT NULL,
  `AbonoMovimiento` decimal(25,0) DEFAULT NULL,
  `FechaMovimiento` datetime NOT NULL,
  `FechaEntradaMovimiento` datetime NOT NULL,
  `FechaSalidaMovimiento` datetime NOT NULL,
  `ObservacionesMovimiento` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `MotivoViajeMovimiento` varchar(50) COLLATE utf8_bin NOT NULL,
  `TipoTransporteMovimiento` varchar(45) COLLATE utf8_bin NOT NULL,
  `GrupoMovimiento` varchar(5) COLLATE utf8_bin NOT NULL,
  `ComisionSiNoMovimiento` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  `CantidadAdultosGeneralMovimiento` int(11) DEFAULT NULL,
  `CantidadNinosGeneralMovimiento` int(11) DEFAULT NULL,
  `ValorTotalMovimiento` decimal(25,0) NOT NULL,
  `IdTarifa` int(11) NOT NULL,
  `IdCliente` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `movimiento`
--

INSERT INTO `movimiento` (`IdMovimiento`, `TipoMovimiento`, `EstadoMovimiento`, `AbonoMovimiento`, `FechaMovimiento`, `FechaEntradaMovimiento`, `FechaSalidaMovimiento`, `ObservacionesMovimiento`, `MotivoViajeMovimiento`, `TipoTransporteMovimiento`, `GrupoMovimiento`, `ComisionSiNoMovimiento`, `CantidadAdultosGeneralMovimiento`, `CantidadNinosGeneralMovimiento`, `ValorTotalMovimiento`, `IdTarifa`, `IdCliente`, `IdUsuario`) VALUES
(1, 'RESERVA GARANTIZADA', 'CANCELADO', '300000', '2018-08-22 00:00:00', '2018-08-24 13:00:00', '2018-08-26 13:00:00', 'NINGUNA', 'TURISMO', 'TERRESTRE', 'TRUE', 'FALSE', 6, 0, '599400', 3, 1, 1),
(2, 'CHECK IN', 'FINALIZADO', '0', '2018-08-22 13:19:22', '2018-08-22 13:00:00', '2018-08-25 13:00:00', 'ninguna', 'TRABAJO', 'TERRESTRE', '', NULL, 1, 0, '199800', 1, 2, 1),
(3, 'RESERVA NO GARANTIZADA', 'ACTIVO', '0', '2018-08-22 00:00:00', '2018-08-30 13:00:00', '2018-08-31 13:00:00', 'NINGUNA', 'ESTUDIO', 'TERRESTRE', 'FALSE', 'FALSE', 1, 0, '49950', 1, 4, 1),
(4, 'CHECK IN', 'FINALIZADO', '0', '2018-08-22 14:05:35', '2018-08-30 13:00:00', '2018-08-31 13:00:00', 'NINGUNA', 'ESTUDIO', 'AEREO', '', NULL, 1, 0, '49950', 1, 4, 1),
(5, 'CHECK IN', 'FINALIZADO', '0', '2018-08-23 11:35:44', '2018-08-23 11:00:00', '2018-08-25 11:00:00', 'VIENEN POR PARTE DE LA AGENCIA', 'TURISMO', 'TERRESTRE', '', NULL, 3, 0, '499500', 1, 3, 1),
(6, 'CHECK IN', 'ACTIVO', '0', '2018-08-23 11:45:27', '2018-08-23 11:00:00', '2018-08-25 11:00:00', 'N/A', 'TURISMO', 'TERRESTRE', '', NULL, 3, 0, '499500', 1, 3, 1),
(7, 'CHECK IN', 'FINALIZADO', '0', '2018-08-23 11:45:32', '2018-08-23 11:00:00', '2018-08-25 11:00:00', 'N/A', 'TURISMO', 'TERRESTRE', '', NULL, 3, 0, '499500', 1, 3, 1),
(8, 'CHECK IN', 'ACTIVO', '0', '2018-08-23 11:49:04', '2018-08-23 11:00:00', '2018-08-25 11:00:00', 'VIENE POR AGENCIA', 'TURISMO', 'TERRESTRE', '', NULL, 3, 0, '499500', 1, 3, 1),
(9, 'CHECK IN', 'FINALIZADO', '0', '2018-08-23 11:49:09', '2018-08-23 11:00:00', '2018-08-25 11:00:00', 'VIENE POR AGENCIA', 'TURISMO', 'TERRESTRE', '', NULL, 3, 0, '499500', 1, 3, 1),
(10, 'CHECK IN', 'ACTIVO', '0', '2018-08-23 11:53:01', '2018-08-23 11:00:00', '2018-08-25 11:00:00', 'VIENEN POR AGENCIA', 'TURISMO', 'TERRESTRE', '', NULL, 3, 0, '499500', 1, 3, 1),
(11, 'CHECK IN', 'FINALIZADO', '0', '2018-08-23 11:53:04', '2018-08-23 11:00:00', '2018-08-25 11:00:00', 'VIENEN POR AGENCIA', 'TURISMO', 'TERRESTRE', '', NULL, 3, 0, '499500', 1, 3, 1),
(12, 'CHECK IN', 'FINALIZADO', '199800', '2018-08-23 00:00:00', '2018-08-23 12:00:00', '2018-08-25 12:00:00', 'N/A', 'ESTUDIO', 'AEREO', 'FALSE', 'FALSE', 2, 0, '199800', 1, 8, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientohabitacion`
--

CREATE TABLE `movimientohabitacion` (
  `IdMovimientoHabitacion` int(11) NOT NULL,
  `FechaEntradaMovimientoHabitacion` datetime NOT NULL,
  `FechaSalidaMovimientoHabitacion` datetime DEFAULT NULL,
  `ObservacionesMovimientoHabitacion` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `ValorPenalizacionMovimientoHabitacion` decimal(25,0) DEFAULT NULL,
  `EstadoPenalizacionMovimientoHabitacion` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `CantidadAdultosMovimientoHabitacion` int(11) DEFAULT NULL,
  `CantidadNinosMovimientoHabitacion` int(11) DEFAULT NULL,
  `EstadoMovimientoHabitacion` varchar(50) COLLATE utf8_bin NOT NULL,
  `TipoMovimientoHabitacion` varchar(50) COLLATE utf8_bin NOT NULL,
  `NitResponsableMovimientoHabitacion` varchar(20) COLLATE utf8_bin NOT NULL,
  `NombreResponsableMovimientoHabitacion` varchar(35) COLLATE utf8_bin NOT NULL,
  `ApellidoResponsableMovimientoHabitacion` varchar(50) COLLATE utf8_bin NOT NULL,
  `IdMovimiento` int(11) NOT NULL,
  `IdHabitacion` int(11) NOT NULL,
  `IdDesayuno` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `movimientohabitacion`
--

INSERT INTO `movimientohabitacion` (`IdMovimientoHabitacion`, `FechaEntradaMovimientoHabitacion`, `FechaSalidaMovimientoHabitacion`, `ObservacionesMovimientoHabitacion`, `ValorPenalizacionMovimientoHabitacion`, `EstadoPenalizacionMovimientoHabitacion`, `CantidadAdultosMovimientoHabitacion`, `CantidadNinosMovimientoHabitacion`, `EstadoMovimientoHabitacion`, `TipoMovimientoHabitacion`, `NitResponsableMovimientoHabitacion`, `NombreResponsableMovimientoHabitacion`, `ApellidoResponsableMovimientoHabitacion`, `IdMovimiento`, `IdHabitacion`, `IdDesayuno`) VALUES
(1, '2018-08-24 13:00:00', '0000-00-00 00:00:00', 'NINGUNA', '0', 'INACTIVO', 2, 0, 'ACTIVO', 'RESERVA GARANTIZADA', '90358478', 'MANUEL', 'PÃ©REZ', 1, 1, NULL),
(2, '2018-08-24 13:00:00', '0000-00-00 00:00:00', 'NINGUNA', '0', 'INACTIVO', 2, 0, 'CANCELADO', 'RESERVA GARANTIZADA', '90358478', 'MANUEL', 'PÃ©REZ', 1, 2, NULL),
(3, '2018-08-24 13:00:00', '0000-00-00 00:00:00', 'NINGUNA', '0', 'INACTIVO', 2, 0, 'ACTIVO', 'RESERVA GARANTIZADA', '90358478', 'MANUEL', 'PÃ©REZ', 1, 3, NULL),
(4, '2018-08-22 13:00:00', '2018-08-23 13:00:00', 'NINGUNA SE HACE CAMBIO DE HABITACIÃ³N', '0', 'INACTIVO', 1, 0, 'FINALIZADO', 'CHECK IN', '1121961213', 'Margarita ', 'Ortiz ', 2, 11, NULL),
(5, '2018-08-30 13:00:00', '0000-00-00 00:00:00', 'NINGUNA', '0', 'INACTIVO', 1, 0, 'ACTIVO', 'RESERVA NO GARANTIZADA', '1121961159', 'ANDREA', 'NOGAL', 3, 3, NULL),
(6, '2018-08-30 13:00:00', '2018-08-31 13:00:00', 'NINGUNA ACTUALIZO ', '0', 'INACTIVO', 1, 0, 'FINALIZADO', 'CHECK IN', '1121961159', 'ANDREA', 'NOGAL', 4, 3, NULL),
(7, '2018-08-23 11:00:00', '2018-08-24 13:00:00', 'N/A', '0', 'INACTIVO', 3, 0, 'FINALIZADO', 'CHECK IN', '53712051', 'ROSA MARIA', 'ACIEN ZURUTA', 5, 15, NULL),
(8, '2018-08-23 11:00:00', '2018-08-24 13:00:00', 'N/A', '0', 'INACTIVO', 3, 0, 'ACTIVO', 'CHECK IN', '78035832', 'SUSANA', 'AMAT MENA', 6, 16, NULL),
(9, '2018-08-23 11:00:00', '2018-08-24 13:00:00', 'N/A', '0', 'INACTIVO', 3, 0, 'FINALIZADO', 'CHECK IN', '78035832', 'SUSANA', 'AMAT MENA', 7, 16, NULL),
(10, '2018-08-23 11:00:00', '2018-08-24 13:00:00', 'N/A', '0', 'INACTIVO', 3, 0, 'ACTIVO', 'CHECK IN', '75258403', 'NATALIA', 'BENAYAS PEREZ', 8, 17, NULL),
(11, '2018-08-23 11:00:00', '2018-08-24 13:00:00', 'N/A', '0', 'INACTIVO', 3, 0, 'FINALIZADO', 'CHECK IN', '75258403', 'NATALIA', 'BENAYAS PEREZ', 9, 17, NULL),
(12, '2018-08-23 11:00:00', '2018-08-24 13:00:00', 'N/A', '0', 'INACTIVO', 3, 0, 'ACTIVO', 'CHECK IN', '75260267', 'MARIA DEL MAR', 'CACERES CONTRERAS', 10, 13, NULL),
(13, '2018-08-23 11:00:00', '2018-08-24 13:00:00', 'N/A', '0', 'INACTIVO', 3, 0, 'FINALIZADO', 'CHECK IN', '75260267', 'MARIA DEL MAR', 'CACERES CONTRERAS', 11, 13, NULL),
(14, '2018-08-23 12:23:53', '2018-08-24 13:00:00', 'N/A', '0', 'INACTIVO', 2, 0, 'FINALIZADO', 'CHECK IN', '1234554321', 'ANA MARIA', 'CARRILLO', 12, 2, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parametros`
--

CREATE TABLE `parametros` (
  `IdParametros` int(11) NOT NULL,
  `HoraCheckInParametros` time DEFAULT NULL,
  `HoraCheckOutParametros` time DEFAULT NULL,
  `LimiteEdadParametros` tinyint(4) DEFAULT NULL,
  `PorcentajePenalizacionParametros` double DEFAULT NULL,
  `FechaVencimientoFacturaParametros` int(11) DEFAULT NULL,
  `PorcentajeDescuentoNinosParametros` double DEFAULT NULL,
  `ValorSeguroParametros` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `parametros`
--

INSERT INTO `parametros` (`IdParametros`, `HoraCheckInParametros`, `HoraCheckOutParametros`, `LimiteEdadParametros`, `PorcentajePenalizacionParametros`, `FechaVencimientoFacturaParametros`, `PorcentajeDescuentoNinosParametros`, `ValorSeguroParametros`) VALUES
(1, '15:00:00', '13:00:00', 5, 5, 12, 5, '8500');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personatipo`
--

CREATE TABLE `personatipo` (
  `IdPersonaTipo` int(11) NOT NULL,
  `NombrePersonaTipo` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `personatipo`
--

INSERT INTO `personatipo` (`IdPersonaTipo`, `NombrePersonaTipo`) VALUES
(1, 'NATURAL'),
(2, 'JURIDICA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `IdProductos` int(11) NOT NULL,
  `NombreProductos` varchar(50) COLLATE utf8_bin NOT NULL,
  `ValorProductos` decimal(25,0) NOT NULL,
  `ObservacionesProductos` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `CantidadProductos` int(11) NOT NULL,
  `MedidaProductos` varchar(20) COLLATE utf8_bin NOT NULL,
  `MarcaProductos` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `DescripcionProductos` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `IdProductoTipo` int(11) NOT NULL,
  `IdProveedores` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`IdProductos`, `NombreProductos`, `ValorProductos`, `ObservacionesProductos`, `CantidadProductos`, `MedidaProductos`, `MarcaProductos`, `DescripcionProductos`, `IdProductoTipo`, `IdProveedores`) VALUES
(6, 'GATORADE', '3781', 'NINGUNA', 34, 'ml', 'GATORADE', 'BOTELLEA 500ML', 4, 6),
(7, 'COCACOLA', '3361', 'NINGUNA', 29, 'ml', 'COCACOLA SAS', 'BOTELLEA 350ML', 4, 6),
(8, 'COLOMBIANA', '3361', '', 26, 'ML', 'POSTOBON SAS', 'BOTELLEA 350ML', 4, 6),
(9, 'SNICKERS', '4201', '', 20, 'ML', 'SNICKERS SAS', 'CHOCOLATE EN BARRA DE MANI Y AREQUIPE', 4, 6),
(10, 'JET', '2100', '', 20, 'ML', 'CHOCOLATESJET', 'CHOCOLATE EN BARRA', 4, 6),
(11, 'MINICHIPS', '1680', 'NINGUNA', 19, 'ml', 'NOEL', 'BOSLA DE GALLETAS CON CHIP DE CHOCOLATE DE 30G', 4, 6),
(12, 'AGUILA', '4201', '', 20, 'MG', 'BAVARIA', 'BOTELLA DE GASEOSA EN LATA DE 350ML', 4, 6),
(13, 'SALCHICA', '4201', '', 20, 'G', 'ZENU', 'BOLSA DE SALCHIHAS X3 UNIDADES DE 40G', 4, 6),
(14, 'AGUA CIELO', '2521', '', 19, 'ML', 'AJEGROUP', 'BOTELLA 350ML ', 4, 6),
(15, 'MEDIA AGUARDIENTE LLANERO ', '35000', 'NINGUNA', 11, 'ml', 'LLANEROS SAS', 'MEDIA BOTELLA', 4, 6),
(16, 'CEPILLO ', '3000', 'NINGUNA', 14, 'ml', 'COLGATE', 'CEPILLO CERDA SUAVE', 4, 7),
(17, 'AMARILLO A LA MONCEÃ±OR', '10000', 'N/A', 16, 'U', 'N/A', 'PESCADO SUDADO', 3, 7),
(18, 'CHURRASCO EN SALSA', '12000', 'N/A', 17, 'U', 'N/A', 'CARNE SUDADA', 3, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productotipo`
--

CREATE TABLE `productotipo` (
  `IdProductoTipo` int(11) NOT NULL,
  `NombreProductoTipo` varchar(50) COLLATE utf8_bin NOT NULL,
  `ObservacionesProductoTipo` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `ImpuestoProductoTipo` double NOT NULL,
  `CentroContableProductoTipo` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `CuentaContableProductoTipo` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `ConceptoContableProductoTipo` varchar(50) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `productotipo`
--

INSERT INTO `productotipo` (`IdProductoTipo`, `NombreProductoTipo`, `ObservacionesProductoTipo`, `ImpuestoProductoTipo`, `CentroContableProductoTipo`, `CuentaContableProductoTipo`, `ConceptoContableProductoTipo`) VALUES
(2, 'BAR', 'NINGUNA', 8, 'ASD', 'ASD', 'ASD'),
(3, 'RESTAURANTE', 'ninguno', 8, 'RESTAURANTE', 'RESTAURANTE', 'OK'),
(4, 'MINI BAR', 'NINGUNA', 19, 'ABC', 'ABC', 'ABC');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `IdProveedores` int(11) NOT NULL,
  `NitProveedores` varchar(30) COLLATE utf8_bin NOT NULL,
  `NombreProveedores` varchar(150) COLLATE utf8_bin NOT NULL,
  `TelefonoProveedores` varchar(20) COLLATE utf8_bin NOT NULL,
  `DireccionProveedores` varchar(70) COLLATE utf8_bin NOT NULL,
  `CorreoProveedores` varchar(70) COLLATE utf8_bin NOT NULL,
  `CelularProveedores` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`IdProveedores`, `NitProveedores`, `NombreProveedores`, `TelefonoProveedores`, `DireccionProveedores`, `CorreoProveedores`, `CelularProveedores`) VALUES
(6, '213131', 'COL LICOR', '662613', 'CLL 21 #12- 12', 'COLLICOR@GMAIL.COM', '311231231'),
(7, '123445', 'HOTEL', '3213213', 'CLL AA', 'HOTEL@GMAIL.COM', '3114555'),
(8, '1122144029', 'BRAYAN CORTES', '3107930171', 'CRR 45 A NUMERO NO SEE', 'BRADHFY', '2523535356');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `IdServicios` int(11) NOT NULL,
  `NombreServicios` varchar(50) COLLATE utf8_bin NOT NULL,
  `ImpuestoServicios` double NOT NULL,
  `ValorServicios` decimal(25,0) NOT NULL,
  `ObservacionesServicios` varchar(120) COLLATE utf8_bin DEFAULT NULL,
  `DescripcionServicios` varchar(120) COLLATE utf8_bin DEFAULT NULL,
  `IdServicioTipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`IdServicios`, `NombreServicios`, `ImpuestoServicios`, `ValorServicios`, `ObservacionesServicios`, `DescripcionServicios`, `IdServicioTipo`) VALUES
(1, 'CAMISA', 19, '4500', 'NINGUNA', 'NINGUNA', 1),
(2, 'MASAJE CAMPANARIO', 19, '67227', 'NINGUNA', 'MASAJE DE RELAJACION', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `serviciotipo`
--

CREATE TABLE `serviciotipo` (
  `IdServicioTipo` int(11) NOT NULL,
  `NombreServicioTipo` varchar(50) NOT NULL,
  `ObservicioServicioTipo` varchar(200) NOT NULL,
  `ImpuestoServicioTipo` double NOT NULL,
  `CentroContableServicioTipo` varchar(50) NOT NULL,
  `CuentaContableServicioTipo` varchar(50) NOT NULL,
  `ConceptoContableServicioTipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `serviciotipo`
--

INSERT INTO `serviciotipo` (`IdServicioTipo`, `NombreServicioTipo`, `ObservicioServicioTipo`, `ImpuestoServicioTipo`, `CentroContableServicioTipo`, `CuentaContableServicioTipo`, `ConceptoContableServicioTipo`) VALUES
(1, 'LAVANDERIA', 'ninguna', 19, '1231', '231', '2131'),
(2, 'SPA', 'ninguna', 19, '90', '90', '90');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarifa`
--

CREATE TABLE `tarifa` (
  `IdTarifa` int(11) NOT NULL,
  `NombreTarifa` varchar(50) COLLATE utf8_bin NOT NULL,
  `PorcentajeTarifa` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `tarifa`
--

INSERT INTO `tarifa` (`IdTarifa`, `NombreTarifa`, `PorcentajeTarifa`) VALUES
(1, 'RACK', 8),
(2, 'CORPORATIVA', 12),
(3, 'COMERCIAL', 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipobienes`
--

CREATE TABLE `tipobienes` (
  `IdTipoBienes` int(11) NOT NULL,
  `NombreTipoBienes` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transferenciacomporbanteingreso`
--

CREATE TABLE `transferenciacomporbanteingreso` (
  `IdTransferencia` int(11) NOT NULL,
  `IdMovimientoReceptorTransferencia` int(11) NOT NULL,
  `ValorTransferencia` decimal(25,0) NOT NULL,
  `FechaTransferencia` datetime NOT NULL,
  `IdMovimiento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `IdUsuario` int(11) NOT NULL,
  `RolUsuario` varchar(20) COLLATE utf8_bin NOT NULL,
  `NombreUsuario` varchar(50) COLLATE utf8_bin NOT NULL,
  `ApellidoUsuario` varchar(50) COLLATE utf8_bin NOT NULL,
  `TelefonoUsuario` varchar(50) COLLATE utf8_bin NOT NULL,
  `CorreoUsuario` varchar(50) COLLATE utf8_bin NOT NULL,
  `ContrasenaUsuario` varchar(50) COLLATE utf8_bin NOT NULL,
  `IdDatosEmpresa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`IdUsuario`, `RolUsuario`, `NombreUsuario`, `ApellidoUsuario`, `TelefonoUsuario`, `CorreoUsuario`, `ContrasenaUsuario`, `IdDatosEmpresa`) VALUES
(1, 'ADMINISTRADOR', 'SEBASTIAN', 'TORRES', '13123', 'JSTORRES649@MISENA.EDU.CO', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1),
(2, 'ADMINISTRADOR', 'Brahyan', 'Marquez', '3219037734', 'BRAYANSMA93@GMAIL.COM', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1),
(3, 'ADMINISTRADOR', 'JOSÃ‰ LUIS', 'CASTELLANOS RODRIGUEZ', '12345', 'JLCASTELLANOS18@MISENA.EDU.CO', '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL),
(4, 'RECEPCIONISTA', 'PRUEBA', 'DOS', '313131313', 'J.L.RODRIGUEZ9584@GMAIL.COM', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1),
(5, 'ADMINISTRADOR', 'LEYDY ', 'SILVA GARZON', '321314223', 'LRSILVA2@MISENA.EDU.CO', 'ad094d6660111eca076ea782cde2c1770d2d9c9a', 1),
(6, 'RECEPCIONISTA', 'BRIYITH DANIELA', 'PULGARIN BONILLA', '3224119483', 'DANIELA788508@GMAIL.COM', '4d86ed7b5ba0565b4168d03f359c8ea3beb0893e', 1),
(7, 'RECEPCIONISTA', 'CRISTHIAN CAMILO', 'CASTANEDA PEREZ', '3114004404', 'CCCASTANEDA54@MISENA.EDU.CO', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculocliente`
--

CREATE TABLE `vehiculocliente` (
  `IdVehiculoCliente` int(11) NOT NULL,
  `PlacaVehiculoCliente` varchar(10) COLLATE utf8_bin NOT NULL,
  `DescripcionVehiculoCliente` varchar(120) COLLATE utf8_bin DEFAULT NULL,
  `FechaInicialVehiculoCliente` datetime NOT NULL,
  `FechaFinalVehiculoCliente` datetime NOT NULL,
  `IdCliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bienes`
--
ALTER TABLE `bienes`
  ADD PRIMARY KEY (`IdBienes`),
  ADD KEY `IdTipoBienes` (`IdTipoBienes`);

--
-- Indices de la tabla `caja`
--
ALTER TABLE `caja`
  ADD PRIMARY KEY (`IdCaja`),
  ADD KEY `IdUsuario` (`IdUsuario`);

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`IdCiudad`),
  ADD KEY `IdDepartamento` (`IdDepartamento`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`IdCliente`),
  ADD KEY `IdConvenio` (`IdConvenio`),
  ADD KEY `IdContribuyenteTipo` (`IdContribuyenteTipo`),
  ADD KEY `IdPersonaTipo` (`IdPersonaTipo`),
  ADD KEY `IdClienteTipo` (`IdClienteTipo`),
  ADD KEY `IdCiudad` (`IdCiudad`);

--
-- Indices de la tabla `clientetipo`
--
ALTER TABLE `clientetipo`
  ADD PRIMARY KEY (`IdClienteTipo`);

--
-- Indices de la tabla `comprobanteegreso`
--
ALTER TABLE `comprobanteegreso`
  ADD PRIMARY KEY (`IdComprobanteEgreso`),
  ADD KEY `IdCaja` (`IdCaja`);

--
-- Indices de la tabla `consumos`
--
ALTER TABLE `consumos`
  ADD PRIMARY KEY (`IdConsumos`),
  ADD KEY `IdProductors` (`IdProductos`),
  ADD KEY `IdBienes` (`IdBienes`),
  ADD KEY `IdServicios` (`IdServicios`),
  ADD KEY `IdCotizacion` (`IdCotizacion`),
  ADD KEY `IdFolio` (`IdFolio`),
  ADD KEY `IdFacturaExterna` (`IdFacturaExterna`);

--
-- Indices de la tabla `contribuyentetipo`
--
ALTER TABLE `contribuyentetipo`
  ADD PRIMARY KEY (`IdContribuyenteTipo`);

--
-- Indices de la tabla `convenio`
--
ALTER TABLE `convenio`
  ADD PRIMARY KEY (`IdConvenio`);

--
-- Indices de la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
  ADD PRIMARY KEY (`IdCotizacion`);

--
-- Indices de la tabla `datosempresa`
--
ALTER TABLE `datosempresa`
  ADD PRIMARY KEY (`IdDatosEmpresa`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`IdDepartamento`);

--
-- Indices de la tabla `facturaexterna`
--
ALTER TABLE `facturaexterna`
  ADD PRIMARY KEY (`IdFacturaExterna`);

--
-- Indices de la tabla `folio`
--
ALTER TABLE `folio`
  ADD PRIMARY KEY (`IdFolio`),
  ADD KEY `IdMovimientoHabitacion` (`IdMovimientoHabitacion`);

--
-- Indices de la tabla `habitacion`
--
ALTER TABLE `habitacion`
  ADD PRIMARY KEY (`IdHabitacion`),
  ADD KEY `IdTipoHabitacion` (`IdHabitacionTipo`);

--
-- Indices de la tabla `habitaciontipo`
--
ALTER TABLE `habitaciontipo`
  ADD PRIMARY KEY (`IdHabitacionTipo`);

--
-- Indices de la tabla `historialcaja`
--
ALTER TABLE `historialcaja`
  ADD PRIMARY KEY (`IdHistorialCaja`),
  ADD KEY `IdCaja` (`IdCaja`);

--
-- Indices de la tabla `historialcomprobanteingreso`
--
ALTER TABLE `historialcomprobanteingreso`
  ADD PRIMARY KEY (`IdHistorialComprobanteIngreso`);

--
-- Indices de la tabla `historialprocesousuario`
--
ALTER TABLE `historialprocesousuario`
  ADD PRIMARY KEY (`IdHistorialProcesoUsuario`),
  ADD KEY `IdUsuario` (`IdUsuario`);

--
-- Indices de la tabla `historialtipohabitacion`
--
ALTER TABLE `historialtipohabitacion`
  ADD PRIMARY KEY (`IdHistorialTipoHabitacion`),
  ADD KEY `IdTipoHabitacion` (`IdHabitacionTipo`);

--
-- Indices de la tabla `huesped`
--
ALTER TABLE `huesped`
  ADD PRIMARY KEY (`IdHuesped`),
  ADD KEY `IdCiudad` (`IdCiudad`),
  ADD KEY `IdMovimientoHabitacion` (`IdMovimientoHabitacion`);

--
-- Indices de la tabla `ingresocomprobante`
--
ALTER TABLE `ingresocomprobante`
  ADD PRIMARY KEY (`IdIngresoComprobante`),
  ADD KEY `IdMovimiento` (`IdMovimiento`);

--
-- Indices de la tabla `iva`
--
ALTER TABLE `iva`
  ADD PRIMARY KEY (`IdIva`);

--
-- Indices de la tabla `movimiento`
--
ALTER TABLE `movimiento`
  ADD PRIMARY KEY (`IdMovimiento`),
  ADD KEY `IdUsuario` (`IdUsuario`),
  ADD KEY `IdCliente` (`IdCliente`),
  ADD KEY `IdTarifa` (`IdTarifa`);

--
-- Indices de la tabla `movimientohabitacion`
--
ALTER TABLE `movimientohabitacion`
  ADD PRIMARY KEY (`IdMovimientoHabitacion`),
  ADD KEY `IdMovimiento` (`IdMovimiento`),
  ADD KEY `IdHabitacion` (`IdHabitacion`);

--
-- Indices de la tabla `parametros`
--
ALTER TABLE `parametros`
  ADD PRIMARY KEY (`IdParametros`);

--
-- Indices de la tabla `personatipo`
--
ALTER TABLE `personatipo`
  ADD PRIMARY KEY (`IdPersonaTipo`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`IdProductos`),
  ADD KEY `IdProveedores` (`IdProveedores`),
  ADD KEY `IdProductoTipo` (`IdProductoTipo`);

--
-- Indices de la tabla `productotipo`
--
ALTER TABLE `productotipo`
  ADD PRIMARY KEY (`IdProductoTipo`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`IdProveedores`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`IdServicios`);

--
-- Indices de la tabla `serviciotipo`
--
ALTER TABLE `serviciotipo`
  ADD PRIMARY KEY (`IdServicioTipo`);

--
-- Indices de la tabla `tarifa`
--
ALTER TABLE `tarifa`
  ADD PRIMARY KEY (`IdTarifa`);

--
-- Indices de la tabla `tipobienes`
--
ALTER TABLE `tipobienes`
  ADD PRIMARY KEY (`IdTipoBienes`);

--
-- Indices de la tabla `transferenciacomporbanteingreso`
--
ALTER TABLE `transferenciacomporbanteingreso`
  ADD PRIMARY KEY (`IdTransferencia`),
  ADD KEY `IdMovimiento` (`IdMovimiento`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`IdUsuario`),
  ADD KEY `IdDatosEmpresa` (`IdDatosEmpresa`);

--
-- Indices de la tabla `vehiculocliente`
--
ALTER TABLE `vehiculocliente`
  ADD PRIMARY KEY (`IdVehiculoCliente`),
  ADD KEY `IdCliente` (`IdCliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bienes`
--
ALTER TABLE `bienes`
  MODIFY `IdBienes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `caja`
--
ALTER TABLE `caja`
  MODIFY `IdCaja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `IdCiudad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `IdCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `clientetipo`
--
ALTER TABLE `clientetipo`
  MODIFY `IdClienteTipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `comprobanteegreso`
--
ALTER TABLE `comprobanteegreso`
  MODIFY `IdComprobanteEgreso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `consumos`
--
ALTER TABLE `consumos`
  MODIFY `IdConsumos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `contribuyentetipo`
--
ALTER TABLE `contribuyentetipo`
  MODIFY `IdContribuyenteTipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `convenio`
--
ALTER TABLE `convenio`
  MODIFY `IdConvenio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
  MODIFY `IdCotizacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `datosempresa`
--
ALTER TABLE `datosempresa`
  MODIFY `IdDatosEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `IdDepartamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `facturaexterna`
--
ALTER TABLE `facturaexterna`
  MODIFY `IdFacturaExterna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `folio`
--
ALTER TABLE `folio`
  MODIFY `IdFolio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `habitacion`
--
ALTER TABLE `habitacion`
  MODIFY `IdHabitacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `habitaciontipo`
--
ALTER TABLE `habitaciontipo`
  MODIFY `IdHabitacionTipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `historialcaja`
--
ALTER TABLE `historialcaja`
  MODIFY `IdHistorialCaja` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `historialcomprobanteingreso`
--
ALTER TABLE `historialcomprobanteingreso`
  MODIFY `IdHistorialComprobanteIngreso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `historialprocesousuario`
--
ALTER TABLE `historialprocesousuario`
  MODIFY `IdHistorialProcesoUsuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `historialtipohabitacion`
--
ALTER TABLE `historialtipohabitacion`
  MODIFY `IdHistorialTipoHabitacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `huesped`
--
ALTER TABLE `huesped`
  MODIFY `IdHuesped` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `ingresocomprobante`
--
ALTER TABLE `ingresocomprobante`
  MODIFY `IdIngresoComprobante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `iva`
--
ALTER TABLE `iva`
  MODIFY `IdIva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `movimiento`
--
ALTER TABLE `movimiento`
  MODIFY `IdMovimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `movimientohabitacion`
--
ALTER TABLE `movimientohabitacion`
  MODIFY `IdMovimientoHabitacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `parametros`
--
ALTER TABLE `parametros`
  MODIFY `IdParametros` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `personatipo`
--
ALTER TABLE `personatipo`
  MODIFY `IdPersonaTipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `IdProductos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `productotipo`
--
ALTER TABLE `productotipo`
  MODIFY `IdProductoTipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `IdProveedores` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `IdServicios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `serviciotipo`
--
ALTER TABLE `serviciotipo`
  MODIFY `IdServicioTipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tarifa`
--
ALTER TABLE `tarifa`
  MODIFY `IdTarifa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipobienes`
--
ALTER TABLE `tipobienes`
  MODIFY `IdTipoBienes` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `transferenciacomporbanteingreso`
--
ALTER TABLE `transferenciacomporbanteingreso`
  MODIFY `IdTransferencia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `vehiculocliente`
--
ALTER TABLE `vehiculocliente`
  MODIFY `IdVehiculoCliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `caja`
--
ALTER TABLE `caja`
  ADD CONSTRAINT `caja_ibfk_1` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`IdUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
