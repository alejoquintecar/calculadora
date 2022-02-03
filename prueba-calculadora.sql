-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 03-02-2022 a las 12:04:23
-- Versión del servidor: 5.7.36
-- Versión de PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prueba-calculadora`
--
CREATE DATABASE IF NOT EXISTS `prueba-calculadora` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;
USE `prueba-calculadora`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_resultados`
--

DROP TABLE IF EXISTS `historial_resultados`;
CREATE TABLE IF NOT EXISTS `historial_resultados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `num_uno` int(11) NOT NULL,
  `num_dos` int(11) NOT NULL,
  `operacion` varchar(1) COLLATE utf8_spanish2_ci NOT NULL,
  `resultado` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
