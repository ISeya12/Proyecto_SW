SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

TRUNCATE TABLE `usuario`;
INSERT INTO `usuario` (`id_user`, `nickname`, `password`, `foto`, `descripcion`, `karma`,`fecha`,`correo`) VALUES
( 'user1', 'User Uno', '$2y$10$O3c1kBFa2yDK5F47IUqusOJmIANjHP6EiPyke5dD18ldJEow.e0eS', 'foto_user1.jpg', '¡Hola! Soy User Uno.', 100,'2001-03-09','user1@gmail.com'),
( 'user2', 'User Dos', '$2y$10$O3c1kBFa2yDK5F47IUqusOJmIANjHP6EiPyke5dD18ldJEow.e0eS', 'foto_user2.jpg', 'Bienvenido a mi perfil.', 80,'2003-03-09', 'user2@gmail.com'),
( 'user3', 'User Tres', '$2y$10$O3c1kBFa2yDK5F47IUqusOJmIANjHP6EiPyke5dD18ldJEow.e0eS', 'foto_user3.jpg', 'Descubre mi mundo.', 120, '2000-03-09','user3@gmail.com');

TRUNCATE TABLE `ajustes`;
INSERT INTO `ajustes` (`id_user`, `fuente`, `fontSize`, `temas`, `paginaPrincipal`) VALUES
('user1','Arial', 12, 'Claro', 'Inicio'),
('user2','Times New Roman', 14, 'Oscuro', 'Explorar'),
('user3','Verdana', 16, 'Neón', 'Favoritos');

TRUNCATE TABLE `artista`;
INSERT INTO `artista` (`id_artista`, `integrantes`) VALUES
('user3', 'Charlie Davis, Emily White');

TRUNCATE TABLE `post`;
INSERT INTO `post` (`id_post`, `id_user`, `texto`, `imagen`, `likes`, `origen`, `tags`, `fecha`) VALUES
(1, 'user3', '¡Hola mundo!', 'imagen_post1.jpg', 15, NULL, 'saludo, inicio', '2024-03-08'),
(2, 'user1', 'Una foto increíble', 'imagen_post2.jpg', 20, NULL, 'foto, arte', '2024-03-09'),
(3, 'user1', 'Nuevo descubrimiento musical', NULL, 30, 1, 'música, recomendación', '2024-03-10');

TRUNCATE TABLE `postfav`;
INSERT INTO `postfav` (`id_post`, `id_user`) VALUES
(3, 'user1'),
(1, 'user1'),
(2, 'user1');



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
