-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 31-03-2022 a las 16:32:37
-- Versión del servidor: 5.7.33
-- Versión de PHP: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `neptunoex`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `idcategoria` int(11) NOT NULL,
  `nombrecategoria` varchar(100) NOT NULL,
  `descripcion` mediumtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idcategoria`, `nombrecategoria`, `descripcion`) VALUES
(1, 'Bebidas', 'Gaseosas, café, té, cervezas y maltas'),
(2, 'Condimentos', 'Salsas dulces y picantes, delicias, comida para untar y aderezos'),
(3, 'Repostería', 'Postres, dulces y pan dulce'),
(4, 'Lácteos', 'Quesos'),
(5, 'Granos/Cereales', 'Pan, galletas, pasta y cereales'),
(6, 'Carnes', 'Carnes preparadas'),
(7, 'Frutas/Verduras', 'Frutas secas y queso de soja'),
(8, 'Pescado/Marisco', 'Pescados, mariscos y algas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compañiasdeenvios`
--

CREATE TABLE `compañiasdeenvios` (
  `idCompañiaEnvios` int(11) NOT NULL,
  `nombreCompañia` varchar(40) NOT NULL,
  `telefono` varchar(24) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `compañiasdeenvios`
--

INSERT INTO `compañiasdeenvios` (`idCompañiaEnvios`, `nombreCompañia`, `telefono`) VALUES
(1, 'Speedy Express', '(503) 555-9831'),
(2, 'United Package', '(503) 555-3199'),
(3, 'Federal Shipping', '(503) 555-9931');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallesdepedidos`
--

CREATE TABLE `detallesdepedidos` (
  `idpedido` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `preciounidad` decimal(18,0) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `descuento` decimal(18,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detallesdepedidos`
--

INSERT INTO `detallesdepedidos` (`idpedido`, `idproducto`, `preciounidad`, `cantidad`, `descuento`) VALUES
(10250, 50, '17', 15, '0'),
(10253, 31, '10', 20, '0'),
(10253, 39, '14', 42, '0'),
(10253, 49, '16', 40, '0'),
(10254, 22, '19', 21, '0'),
(10254, 24, '4', 15, '0'),
(10254, 43, '8', 21, '0'),
(10257, 27, '35', 25, '0'),
(10257, 35, '10', 15, '0'),
(10257, 39, '14', 6, '0'),
(10258, 2, '15', 50, '0'),
(10258, 5, '17', 65, '0'),
(10258, 32, '26', 6, '0'),
(10259, 21, '8', 10, '0'),
(10259, 37, '21', 1, '0'),
(10263, 16, '14', 60, '0'),
(10263, 24, '4', 28, '0'),
(10263, 30, '21', 60, '0'),
(10263, 44, '8', 36, '0'),
(10264, 2, '15', 35, '0'),
(10264, 41, '8', 25, '0'),
(10265, 17, '31', 30, '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `idpedido` int(11) NOT NULL,
  `idcliente` bigint(20) UNSIGNED NOT NULL,
  `fechapedido` date DEFAULT NULL,
  `fechaentrega` date DEFAULT NULL,
  `fechaenvio` date DEFAULT NULL,
  `formaenvio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`idpedido`, `idcliente`, `fechapedido`, `fechaentrega`, `fechaenvio`, `formaenvio`) VALUES
(10250, 2, '2022-02-02', '2022-09-05', '2022-09-07', 2),
(10253, 2, '2022-02-10', '2022-02-24', '2022-02-24', 2),
(10254, 2, '2022-02-11', '2022-09-02', '2022-09-23', 2),
(10257, 3, '2022-02-16', '2022-09-13', '2022-09-22', 3),
(10258, 3, '2022-03-17', '2022-09-14', '2022-09-23', 1),
(10259, 3, '2022-03-18', '2022-09-15', '2022-09-25', 3),
(10263, 4, '2022-02-23', '2022-09-20', '2022-09-30', 3),
(10264, 4, '2022-02-24', '2022-09-21', '2022-09-30', 3),
(10265, 4, '2022-02-25', '2022-09-22', '2022-09-22', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idproducto` int(11) NOT NULL,
  `nombreproducto` varchar(40) DEFAULT NULL,
  `idproveedor` int(11) DEFAULT NULL,
  `idcategoria` int(11) DEFAULT NULL,
  `cantidadPorUnidad` varchar(20) DEFAULT NULL,
  `precio` decimal(18,0) DEFAULT NULL,
  `stock` smallint(6) DEFAULT NULL,
  `descuento` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idproducto`, `nombreproducto`, `idproveedor`, `idcategoria`, `cantidadPorUnidad`, `precio`, `stock`, `descuento`) VALUES
(1, 'Té Dharamsala', 1, 1, '10 cajas x 20 bolsas', '18', 39, ''),
(2, 'Cerveza tibetana Barley', 1, 1, '24 - bot. 12 l', '19', 17, ''),
(3, 'Sirope de regaliz', 1, 2, '12 - bot. 550 ml', '10', 13, ''),
(4, 'Especias Cajun del chef Anton', 2, 2, '48 - frascos 6 l', '22', 53, ''),
(5, 'Mezcla Gumbo del chef Anton', 2, 2, '36 cajas', '21', 0, ''),
(6, 'Mermelada de grosellas de la abuela', 3, 2, '12 - frascos 8 l', '25', 120, ''),
(7, 'Peras secas orgánicas del tío Bob', 3, 7, '12 - paq. 1 kg', '30', 15, ''),
(8, 'Salsa de arándanos Northwoods', 3, 2, '12 - frascos 12 l', '40', 6, ''),
(9, 'Buey Mishi Kobe', 4, 6, '18 - paq. 500 g', '97', 29, ''),
(10, 'Pez espada', 4, 8, '12 - frascos 200 ml', '31', 31, ''),
(11, 'Queso Cabrales', 5, 4, 'paq. 1 kg', '21', 22, ''),
(12, 'Queso Manchego La Pastora', 5, 4, '10 - paq. 500 g', '38', 86, ''),
(13, 'Algas Konbu', 6, 8, 'caja 2 kg', '6', 24, ''),
(14, 'Cuajada de judías', 6, 7, '40 - paq. 100 g', '23', 35, ''),
(15, 'Salsa de soja baja en sodio', 6, 2, '24 - bot. 250 ml', '16', 23, ''),
(16, 'Postre de merengue Pavlova', 7, 3, '32 - cajas 500 g', '17', 29, ''),
(17, 'Cordero Alice Springs', 7, 6, '20 - latas 1 kg', '39', 0, ''),
(18, 'Langostinos tigre Carnarvon', 7, 8, 'paq. 16 kg', '63', 42, ''),
(19, 'Pastas de té de chocolate', 8, 3, '10 cajas x 12 piezas', '9', 25, ''),
(20, 'Mermelada de Sir Rodneys', 8, 3, '30 cajas regalo', '81', 40, ''),
(21, 'Bollos de Sir Rodneys', 8, 3, '24 paq. x 4 piezas', '10', 3, ''),
(22, 'Pan de centeno crujiente estilo Gustafs', 9, 5, '24 - paq. 500 g', '21', 104, ''),
(23, 'Pan fino', 9, 5, '12 - paq. 250 g', '9', 61, ''),
(24, 'Refresco Guaraná Fantástica', 10, 1, '12 - latas 355 ml', '5', 20, ''),
(25, 'Crema de chocolate y nueces NuNuCa', 11, 3, '20 - vasos  450 g', '14', 76, ''),
(26, 'Ositos de goma Gumbär', 11, 3, '100 - bolsas 250 g', '31', 15, ''),
(27, 'Chocolate Schoggi', 11, 3, '100 - piezas 100 g', '44', 49, ''),
(28, 'Col fermentada Rössle', 12, 7, '25 - latas 825 g', '46', 26, ''),
(29, 'Salchicha Thüringer', 12, 6, '50 bolsas x 30 salch', '124', 0, ''),
(30, 'Arenque blanco del noroeste', 13, 8, '10 - vasos 200 g', '26', 10, ''),
(31, 'Queso gorgonzola Telino', 14, 4, '12 - paq. 100 g', '13', 0, ''),
(32, 'Queso Mascarpone Fabioli', 14, 4, '24 - paq. 200 g', '32', 9, ''),
(33, 'Queso de cabra', 15, 4, '500 g', '3', 112, ''),
(34, 'Cerveza Sasquatch', 16, 1, '24 - bot. 12 l', '14', 111, ''),
(35, 'Cerveza negra Steeleye', 16, 1, '24 - bot. 12 l', '18', 20, ''),
(36, 'Escabeche de arenque', 17, 8, '24 - frascos 250 g', '19', 112, ''),
(37, 'Salmón ahumado Gravad', 17, 8, '12 - paq. 500 g', '26', 11, ''),
(38, 'Vino Côte de Blaye', 18, 1, '12 - bot. 75 cl', '264', 17, ''),
(39, 'Licor verde Chartreuse', 18, 1, '750 cc por bot.', '18', 69, ''),
(40, 'Carne de cangrejo de Boston', 19, 8, '24 - latas 4 l', '18', 123, ''),
(41, 'Crema de almejas estilo Nueva Inglaterra', 19, 8, '12 - latas 12 l', '10', 85, ''),
(42, 'Tallarines de Singapur', 20, 5, '32 - 1 kg paq.', '14', 26, ''),
(43, 'Café de Malasia', 20, 1, '16 - latas 500 g', '46', 17, ''),
(44, 'Azúcar negra Malacca', 20, 2, '20 - bolsas 2 kg', '19', 27, ''),
(45, 'Arenque ahumado', 21, 8, 'paq. 1k', '10', 5, ''),
(46, 'Arenque salado', 21, 8, '4 - vasos 450 g', '12', 95, ''),
(47, 'Galletas Zaanse', 22, 3, '10 - cajas 4 l', '10', 36, ''),
(48, 'Chocolate holandés', 22, 3, '10 paq.', '13', 15, ''),
(49, 'Regaliz', 23, 3, '24 - paq. 50 g', '20', 10, ''),
(50, 'Chocolate blanco', 23, 3, '12 - barras 100 g', '16', 65, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `idProveedor` int(11) NOT NULL,
  `nombreCompañia` varchar(40) NOT NULL,
  `nombrecontacto` varchar(30) DEFAULT NULL,
  `cargocontacto` varchar(30) DEFAULT NULL,
  `direccion` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`idProveedor`, `nombreCompañia`, `nombrecontacto`, `cargocontacto`, `direccion`) VALUES
(1, 'Exotic Liquids', 'Charlotte Cooper', 'Gerente de compras', '49 Gilbert St.'),
(2, 'New Orleans Cajun Delights', 'Shelley Burke', 'Administrador de pedidos', 'P.O. Box 78934'),
(3, 'Grandma Kellys Homestead', 'Regina Murphy', 'Representante de ventas', '707 Oxford Rd.'),
(4, 'Tokyo Traders', 'Yoshi Nagase', 'Gerente de marketing', '9-8 SekimaiMusashino-shi'),
(5, 'Cooperativa de Quesos Las Cabras', 'Antonio del Valle Saavedra ', 'Administrador de exportaciones', 'Calle del Rosal 4'),
(6, 'Mayumis', 'Mayumi Ohno', 'Representante de marketing', '92 SetsukoChuo-ku'),
(7, 'Pavlova, Ltd.', 'Ian Devling', 'Gerente de marketing', '74 Rose St.Moonie Ponds'),
(8, 'Specialty Biscuits, Ltd.', 'Peter Wilson', 'Representante de ventas', '29 Kings Way'),
(9, 'PB Knäckebröd AB', 'Lars Peterson', 'Agente de ventas', 'Kaloadagatan 13'),
(10, 'Refrescos Americanas LTDA', 'Carlos Diaz', 'Gerente de marketing', 'Av. das Americanas 12.890'),
(11, 'Heli Süßwaren GmbH & Co. KG', 'Petra Winkler', 'Gerente de ventas', 'Tiergartenstraße 5'),
(12, 'Plutzer Lebensmittelgroßmärkte AG', 'Martin Bein', 'Ger. marketing internacional', 'Bogenallee 51'),
(13, 'Nord-Ost-Fisch Handelsgesellschaft mbH', 'Sven Petersen', 'Coordinador de mercados', 'Frahmredder 112a'),
(14, 'Formaggi Fortini s.r.l.', 'Elio Rossi', 'Representante de ventas', 'Viale Dante, 75'),
(15, 'Norske Meierier', 'Beate Vileid', 'Gerente de marketing', 'Hatlevegen 5'),
(16, 'Bigfoot Breweries', 'Cheryl Saylor', 'Repr. de cuentas regional', '3400 - 8th AvenueSuite 210'),
(17, 'Svensk Sjöföda AB', 'Michael Björn', 'Representante de ventas', 'Brovallavägen 231'),
(18, 'Aux joyeux ecclésiastiques', 'Guylène Nodier', 'Gerente de ventas', '203, Rue des Francs-Bourgeois'),
(19, 'New England Seafood Cannery', 'Robb Merchant', 'Agente de cuentas al por mayor', 'Order Processing Dept.2100 Paul Revere Blvd.'),
(20, 'Leka Trading', 'Chandra Leka', 'Propietario', '471 Serangoon Loop, Suite #402'),
(21, 'Lyngbysild', 'Niels Petersen', 'Gerente de ventas', 'LyngbysildFiskebakken 10'),
(22, 'Zaanse Snoepfabriek', 'Dirk Luchte', 'Gerente de contabilidad', 'VerkoopRijnweg 22'),
(23, 'Karkki Oy', 'Anne Heikkonen', 'Gerente de producción', 'Valtakatu 12'),
(24, 'Gday, Mate', 'Wendy Mackenzie', 'Representante de ventas', '170 Prince Edward ParadeHunters Hill'),
(25, 'Ma Maison', 'Jean-Guy Lauzon', 'Gerente de marketing', '2960 Rue St. Laurent, Montréal'),
(26, 'Pasta Buttini s.r.l.', 'Giovanni Giudici', 'Administrador de pedidos', 'Via dei Gelsomini, 153'),
(27, 'Escargots Nouveaux', 'Marie Delamare', 'Gerente de ventas', '22, rue H. Voiron'),
(28, 'Gai pâturage', 'Eliane Noz', 'Representante de ventas', 'Bat. B3, rue des Alpes'),
(29, 'Forêts dérables', 'Chantal Goulet', 'Gerente de contabilidad', '148 rue Chasseur');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `direccion`, `created_at`) VALUES
(1, 'Admin', 'admin@admin.com', 'admin', 'Avda. de la Constitución 2222', '2022-03-27'),
(2, 'Talia Gibson', 'talia@example.org', 'talia', 'Av. dos Lusíadas, 23', '2022-02-27'),
(3, 'Matias Gorzany', 'matias@example.org', 'matias', '67, rue des Cinquante Otages', '2022-01-27'),
(4, 'Myra Rohan', 'myra@example.org', 'myra', 'Catedral 27', '2021-07-27'),
(5, 'Connie Miller', 'connie@example.org', 'connie', 'C/ Moralzarzal, 86', '2022-02-20');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idcategoria`);

--
-- Indices de la tabla `compañiasdeenvios`
--
ALTER TABLE `compañiasdeenvios`
  ADD PRIMARY KEY (`idCompañiaEnvios`);

--
-- Indices de la tabla `detallesdepedidos`
--
ALTER TABLE `detallesdepedidos`
  ADD PRIMARY KEY (`idpedido`,`idproducto`),
  ADD KEY `idproducto` (`idproducto`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`idpedido`),
  ADD KEY `cliente_fk_5` (`idcliente`),
  ADD KEY `formaenvio_fk_5` (`formaenvio`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idproducto`),
  ADD KEY `idcategoria` (`idcategoria`),
  ADD KEY `fk_3` (`idproveedor`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`idProveedor`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detallesdepedidos`
--
ALTER TABLE `detallesdepedidos`
  ADD CONSTRAINT `detallesdepedidos_ibfk_1` FOREIGN KEY (`idproducto`) REFERENCES `productos` (`idproducto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `detallesdepedidos_ibfk_2` FOREIGN KEY (`idpedido`) REFERENCES `pedidos` (`idpedido`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `cliente_fk_5` FOREIGN KEY (`idcliente`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `formaenvio_fk_5` FOREIGN KEY (`formaenvio`) REFERENCES `compañiasdeenvios` (`idCompañiaEnvios`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_3` FOREIGN KEY (`idproveedor`) REFERENCES `proveedores` (`idProveedor`),
  ADD CONSTRAINT `fk_7` FOREIGN KEY (`idcategoria`) REFERENCES `categorias` (`idcategoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
