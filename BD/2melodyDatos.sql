SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

TRUNCATE TABLE `usuario`;
INSERT INTO `usuario` (`id_user`, `nickname`, `password`, `foto`, `descripcion`, `karma`,`fecha`,`correo`) VALUES
( 'user1', 'User Uno', '$2y$10$O3c1kBFa2yDK5F47IUqusOJmIANjHP6EiPyke5dD18ldJEow.e0eS', 'Image1.jpg', '¡Hola! Soy User Uno.', 100,'2001-03-09','user1@gmail.com'),
( 'user2', 'User Dos', '$2y$10$O3c1kBFa2yDK5F47IUqusOJmIANjHP6EiPyke5dD18ldJEow.e0eS', 'Image2.jpg', 'Bienvenido a mi perfil.', 80,'2003-03-09', 'user2@gmail.com'),
( 'user3', 'User Tres', '$2y$10$O3c1kBFa2yDK5F47IUqusOJmIANjHP6EiPyke5dD18ldJEow.e0eS', 'Image3.jpg', 'Descubre mi mundo.', 120, '2000-03-09','user3@gmail.com'),
( 'user4', 'User Cuatro', '$2y$10$O3c1kBFa2yDK5F47IUqusOJmIANjHP6EiPyke5dD18ldJEow.e0eS', 'Image1.jpg', '¡Hola! Soy User Cuatro.', 90, '2002-03-09', 'user4@gmail.com'),
( 'user5', 'User Cinco', '$2y$10$O3c1kBFa2yDK5F47IUqusOJmIANjHP6EiPyke5dD18ldJEow.e0eS', 'Image2.jpg', 'Explora mi perfil.', 110, '1999-03-09', 'user5@gmail.com'),
( 'user6', 'User Seis', '$2y$10$O3c1kBFa2yDK5F47IUqusOJmIANjHP6EiPyke5dD18ldJEow.e0eS', 'Image1.jpg', '¡Hola a todos!', 95, '2005-03-09', 'user6@gmail.com');

TRUNCATE TABLE `artista`;
INSERT INTO `artista` (`id_artista`, `integrantes`) VALUES
('user3', 'Charlie Davis, Emily White');

TRUNCATE TABLE `post`;
INSERT INTO `post` (`id_post`, `id_user`, `texto`, `imagen`, `likes`, `origen`, `tags`, `fecha`) VALUES
(1, 'user3', '¡Hola mundo!', 'Imagen1.jpg', 15, NULL, 'saludo, inicio', '2024-03-08'),
(2, 'user1', 'Una foto increíble', 'Imagen2.jpg', 20, NULL, 'foto, arte', '2024-03-09'),
(3, 'user1', 'Nuevo descubrimiento musical', NULL, 30, 1, 'música, recomendación', '2024-03-10'),
(4, 'user2', 'Mi día en la playa', 'Imagen3.jpg', 25, NULL, 'vacaciones, playa', '2024-03-11'),
(5, 'user3', 'Receta del día', 'Imagen3.jpg', 18, NULL, 'cocina, receta', '2024-03-12'),
(6, 'user2', 'Evento imperdible', NULL, 40, 2, 'evento, música en vivo', '2024-03-13');
TRUNCATE TABLE `postfav`;
INSERT INTO `postfav` (`id_post`, `id_user`) VALUES
(3, 'user1'),
(1, 'user1'),
(2, 'user1');



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
