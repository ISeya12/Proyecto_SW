-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-03-2024 a las 22:38:01
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `2melody`
--

--
-- Volcado de datos para la tabla `ajustes`
--

INSERT INTO `ajustes` (`id_user`, `fuente`, `fontSize`, `temas`, `paginaPrincipal`) VALUES
('user1', 'Arial', 12, 'Claro', 'Inicio'),
('user2', 'Times New Roman', 14, 'Oscuro', 'Explorar'),
('user3', 'Verdana', 16, 'Neón', 'Favoritos');

--
-- Volcado de datos para la tabla `artista`
--

INSERT INTO `artista` (`id_artista`, `integrantes`) VALUES
('user3', 'Charlie Davis, Emily White');

--
-- Volcado de datos para la tabla `post`
--

INSERT INTO `post` (`id_post`, `id_user`, `texto`, `imagen`, `likes`, `origen`, `tags`, `fecha`) VALUES
(1, 'user3', '¡Hola mundo!', 'imagen_post1.jpg', 15, NULL, 'saludo, inicio', '2024-03-08'),
(2, 'user1', 'Una foto increíble', 'imagen_post2.jpg', 22, NULL, 'foto, arte', '2024-03-09'),
(3, 'user1', 'Nuevo descubrimiento musical', NULL, 30, 1, 'música, recomendación', '2024-03-10'),
(29, 'p2', '233223', '', 1, 0, 'null', '0000-00-00'),
(30, 'p2', '122112', '', 1, 0, '', '0000-00-00'),
(32, 'p2', 'jtyujyjt', '', 1, 0, '', '0000-00-00'),
(33, 'p2', '88888888', '', 1, 0, '', '0000-00-00'),
(34, 'p2', '23f3t434t', '', 1, 0, '', '0000-00-00'),
(35, 'p2', '2222222222', '', 1, 0, '', '0000-00-00'),
(36, 'p2', 'qefwef', '', 1, 0, '', '0000-00-00'),
(37, 'p2', '3r34r4444444', '', 1, NULL, '', '0000-00-00'),
(38, 'p2', 'seya13', '', 1, NULL, '', '0000-00-00'),
(39, 'p2', 'sfoujergoiejrwg', 'Image2', 0, NULL, '', '0000-00-00'),
(40, 'p2', 'ewefwef', 'Image2', 1, NULL, '', '0000-00-00'),
(41, 'p2', 'ewefwef', 'Image2', 1, NULL, '', '0000-00-00'),
(42, 'p2', 'bappe', 'Image2', 0, NULL, '', '0000-00-00');

--
-- Volcado de datos para la tabla `postfav`
--

INSERT INTO `postfav` (`id_post`, `id_user`) VALUES
(29, 'p2'),
(30, 'p2'),
(32, 'p2'),
(33, 'p2'),
(34, 'p2'),
(35, 'p2'),
(36, 'p2'),
(37, 'p2'),
(38, 'p2'),
(40, 'p2'),
(41, 'p2'),
(1, 'user1'),
(2, 'user1'),
(3, 'user1');

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_user`, `nickname`, `password`, `foto`, `descripcion`, `karma`, `fecha`, `correo`) VALUES
('p2', 'qwwq', '$2y$10$iV.BpabxyQLENEVRYp1B2emOmHBVcOLb0WPkTs1g9FxKpEm/8qOKK', '', '', 2, '2024-03-19', 'qwdqwd@gmail.com'),
('pepo', 'bap', '$2y$10$aB6VkZACc10Vm0UD36PGsOald5mzK9L/iv.aZnbX4Cts5MNqSumAC', '', '', 0, '2024-03-13', 'bap@gmail.com'),
('ps', 'pep', '$2y$10$WxNFKjQYopGOw.cO/pD9eub90PKjY3ma8OQEA9w9EhZG0jabI56zi', '', '', 0, '2024-03-13', 'pqqw@gmail.com'),
('user1', 'User Uno', '$2y$10$O3c1kBFa2yDK5F47IUqusOJmIANjHP6EiPyke5dD18ldJEow.e0eS', 'foto_user1.jpg', '¡Hola! Soy User Uno.', 100, '2001-03-09', 'user1@gmail.com'),
('user2', 'User Dos', '$2y$10$O3c1kBFa2yDK5F47IUqusOJmIANjHP6EiPyke5dD18ldJEow.e0eS', 'foto_user2.jpg', 'Bienvenido a mi perfil.', 80, '2003-03-09', 'user2@gmail.com'),
('user3', 'User Tres', '$2y$10$O3c1kBFa2yDK5F47IUqusOJmIANjHP6EiPyke5dD18ldJEow.e0eS', 'foto_user3.jpg', 'Descubre mi mundo.', 120, '2000-03-09', 'user3@gmail.com');
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
