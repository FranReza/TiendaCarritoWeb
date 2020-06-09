-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-06-2020 a las 18:47:59
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_electronic`
--
CREATE DATABASE IF NOT EXISTS `db_electronic` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_electronic`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineas_pedido`
--

DROP TABLE IF EXISTS `lineas_pedido`;
CREATE TABLE `lineas_pedido` (
  `id` int(5) NOT NULL,
  `pedido_id` int(5) NOT NULL,
  `producto_id` int(5) NOT NULL,
  `unidades` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
CREATE TABLE `pedidos` (
  `id` int(5) NOT NULL,
  `usuario_id` int(5) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `costo` varchar(30) NOT NULL,
  `cantidad` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `usuario_id`, `nombre`, `costo`, `cantidad`) VALUES
(11, 1, 'Television Samsung', '29000', 1);

--
-- Disparadores `pedidos`
--
DROP TRIGGER IF EXISTS `restar`;
DELIMITER $$
CREATE TRIGGER `restar` AFTER INSERT ON `pedidos` FOR EACH ROW UPDATE productos SET productos.stock = productos.stock - 1 WHERE productos.name = new.nombre
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE `productos` (
  `id` int(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` varchar(30) NOT NULL,
  `stock` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `name`, `image`, `description`, `price`, `stock`) VALUES
(1, 'Huawei LTE 2019 Azul', 'https://resources.claroshop.com/medios-plazavip/mkt/5c92609770ebc_claro-shop_y62019_madrid_dual_azul-jpg.jpg', ' Mediatek MT6761, Quad-core: 4 x 2.0 GHz Pantalla dewdrop de 6.09” Cámara frontal de 8MP con flash 32 GB', '2919', 30),
(2, 'Television Samsung', 'https://images.samsung.com/is/image/samsung/mx-full-hd-j5290-un43j5290afxzx-frontblack-163761465?$PD_GALLERY_L_JPG$', 'Television samsung super genial a buen precio ideal para toda la familia y amigos! disfruta de los mejores canales en alta definicion aprovecha ya!', '29000', 29),
(3, 'Multifuncional HP Smart Tank 515', 'https://assets.sams.com.mx/image/upload/f_auto,q_auto:eco,w_350,c_scale,dpr_auto/mx/images/product-images/img_medium/980017478m.jpg', 'Imprime, escanea y copia sin ningún problema con el Multifuncional HP Smart Tank 515. Esta impresora de tanque de tinta, te ofrece una gran calidad de impresión garantizada.', '3409', 30),
(14, 'Xiaomi Redmi Note 9', 'https://http2.mlstatic.com/xiaomi-redmi-note-9-global-4gb-128gb-48mpx-garantia-12m-eu-D_NQ_NP_912657-MLM41858012848_052020-F.webp', 'SHIZI TRADING - TIENDA VIRTUAL\r\n> Celular Libre Xiaomi Redmi Note 9 Global 128GB 4 RAM <\r\nCARGADOR EUROPEO\r\n', '5169', 29),
(16, 'iPhone 6s 32 GB Gris espacial 2 GB RAM', 'https://http2.mlstatic.com/D_NQ_NP_662847-MLA31272842442_062019-O.webp', 'El espacio que necesitas\r\nCon su memoria interna de 32 GB descarga tus aplicaciones favoritas y guarda todas las fotos y videos que quieras.', '4799', 30),
(17, 'Estuche Microsoft Surface', 'https://http2.mlstatic.com/estuche-ragido-mcover-para-computadora-microsoft-surface-D_NQ_NP_870977-MLM40836972088_022020-O.webp', 'Este producto viene desde Estados Unidos\r\n\r\nDESCRIPCIÓN\r\n* mcovermssb13blk\r\n\r\nESPECIFICACIONES', '2000', 30),
(21, 'tablet Mac', 'https://www.ishopmixup.com/ImgMixup/Mixup_big/190199655614.jpg', 'Tablet 32 GB de buenas condiciones etc', '10000', 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int(5) NOT NULL,
  `user` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `direction` varchar(100) NOT NULL,
  `rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `user`, `name`, `email`, `password`, `direction`, `rol`) VALUES
(1, 'fran12', 'Pedro Francisco', 'fran.js_@hotmail.com', 'dExUY1RpY2pOYzErTFJVaGtUYzN3QT09', 'la paz buenos aires', 'admin'),
(2, 'Lorem10', 'lorem ipsum', 'lorem@hotmail.com', 'MDlYd3hkd1NvcXVpRjRTVGVtbzQ2dz09', 'Santos Garzas #18 colonia centro', 'user'),
(3, 'l', 'pablo', 'pablo.com', 'eW95TXZDeGtkTU9OSTJhZlpzeWlEUT09', 'asdasdasdasd', 'user'),
(4, 'ramo10', 'Ramon Avila', 'ramon@ramon.com', 'N2VCUnhuZDRWMHROTWZ2V05VNFYvUT09', 'zacatecas ', 'admin'),
(5, 'k', 'k', 'k', 'WTQvaFlPbG45TDI2aWRscGZ4YzhKZz09', 'k', 'user'),
(6, 'Lorem10', 'asdasa', 'asdasdasd', 'U0YvMm8yZm92SHA5UnpRMWt0Q3dUQT09', 'asdasdasdadasdasdasd', 'user'),
(7, 'PabloPicazzo19', 'Pablo Rodriguez', 'pablo@hotmail.com', 'TnhMMXZNZXFDZnlrTUlmWjhWU2N4UT09', 'las palmas 2013', 'user'),
(8, '', '', '', 'aTBvVGRDeSsvN2JhQXpmdjVXUTM5QT09', '', 'user'),
(9, '', '', '', 'aTBvVGRDeSsvN2JhQXpmdjVXUTM5QT09', '', 'user');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `lineas_pedido`
--
ALTER TABLE `lineas_pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedido_id` (`pedido_id`),
  ADD KEY `producto_id` (`producto_id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `lineas_pedido`
--
ALTER TABLE `lineas_pedido`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `lineas_pedido`
--
ALTER TABLE `lineas_pedido`
  ADD CONSTRAINT `lineas_pedido_ibfk_1` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`id`),
  ADD CONSTRAINT `lineas_pedido_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
