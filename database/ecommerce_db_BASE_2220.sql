-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-09-2023 a las 05:05:27
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ecommerce_db`
--

CREATE DATABASE IF NOT EXISTS ecommerce_db;

USE ecommerce_db;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `categoria_id` int(11) NOT NULL,
  `categoria_nombre` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `producto_id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `producto_nombre` varchar(200) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`categoria_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`producto_id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `categoria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `producto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`categoria_id`);
COMMIT;

INSERT IGNORE INTO `categorias`(`categoria_id`, `categoria_nombre`) VALUES ('1','Cat 1');
INSERT IGNORE INTO `categorias`(`categoria_id`, `categoria_nombre`) VALUES ('2','Cat 2');
INSERT IGNORE INTO `categorias`(`categoria_id`, `categoria_nombre`) VALUES ('3','Cat 3');
INSERT IGNORE INTO `categorias`(`categoria_id`, `categoria_nombre`) VALUES ('4','Cat 4');

INSERT IGNORE INTO `productos`(`producto_id`, `categoria_id`, `producto_nombre`, `descripcion`, `precio`)
    VALUES ('1','1','Prod 1','Descr prod 1','1500');
INSERT IGNORE INTO `productos`(`producto_id`, `categoria_id`, `producto_nombre`, `descripcion`, `precio`)
    VALUES ('2','1','Prod 2','Descr prod 2','1000');
INSERT IGNORE INTO `productos`(`producto_id`, `categoria_id`, `producto_nombre`, `descripcion`, `precio`)
    VALUES ('3','2','Prod 3','Descr prod 3','3220');
INSERT IGNORE INTO `productos`(`producto_id`, `categoria_id`, `producto_nombre`, `descripcion`, `precio`)
    VALUES ('4','3','Prod 4','Descr prod 4','400');
INSERT IGNORE INTO `productos`(`producto_id`, `categoria_id`, `producto_nombre`, `descripcion`, `precio`)
    VALUES ('5','3','Prod 5','Descr prod 5','1400');
INSERT IGNORE INTO `productos`(`producto_id`, `categoria_id`, `producto_nombre`, `descripcion`, `precio`)
    VALUES ('6','2','Prod 6','Descr prod 6','1000');
INSERT IGNORE INTO `productos`(`producto_id`, `categoria_id`, `producto_nombre`, `descripcion`, `precio`)
    VALUES ('7','4','Prod 7','Descr prod 7','1200');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
