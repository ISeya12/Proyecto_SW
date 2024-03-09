SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

TRUNCATE TABLE `usuario`;
INSERT INTO `usuario` (`id_user`, `username`, `nickname`, `password`, `foto`, `descripcion`, `karma`, `num_seguidores`, `num_seguidos`) VALUES
(1, 'user1', 'User Uno', '$2y$10$O3c1kBFa2yDK5F47IUqusOJmIANjHP6EiPyke5dD18ldJEow.e0eS', 'foto_user1.jpg', '¡Hola! Soy User Uno.', 100, 50, 75),
(2, 'user2', 'User Dos', '$2y$10$O3c1kBFa2yDK5F47IUqusOJmIANjHP6EiPyke5dD18ldJEow.e0eS', 'foto_user2.jpg', 'Bienvenido a mi perfil.', 80, 60, 45),
(3, 'user3', 'User Tres', '$2y$10$O3c1kBFa2yDK5F47IUqusOJmIANjHP6EiPyke5dD18ldJEow.e0eS', 'foto_user3.jpg', 'Descubre mi mundo.', 120, 40, 55);

TRUNCATE TABLE `ajustes`;
INSERT INTO `ajustes` (`fuente`, `fontSize`, `temas`, `paginaPrincipal`, `id_user`) VALUES
('Arial', 12, 'Claro', 'Inicio', 1),
('Times New Roman', 14, 'Oscuro', 'Explorar', 2),
('Verdana', 16, 'Neón', 'Favoritos', 3);

TRUNCATE TABLE `artista`;
INSERT INTO `artista` (`id_artista`, `integrantes`) VALUES
(1, 'John Doe, Jane Smith'),
(2, 'Alice Johnson, Bob Brown'),
(3, 'Charlie Davis, Emily White');

TRUNCATE TABLE `cancion`;
INSERT INTO `cancion` (`id_cancion`, `titulo`, `imagen`, `fecha`, `id_artista`, `likes`, `ruta`, `duracion`, `tags`) VALUES
(1, 'Canción 1', 'imagen1.jpg', '2024-03-08', 1, 100, '/canciones/cancion1.mp3', 240, 'pop, dance'),
(2, 'Canción 2', 'imagen2.jpg', '2024-03-09', 2, 85, '/canciones/cancion2.mp3', 180, 'rock'),
(3, 'Canción 3', 'imagen3.jpg', '2024-03-10', 3, 120, '/canciones/cancion3.mp3', 300, 'electrónica');

TRUNCATE TABLE `pedido`;
INSERT INTO `pedido` (`id_pedido`, `id_user`, `estado`, `total`, `fecha`) VALUES
(1, 1, 'En proceso', 50, '2024-03-08'),
(2, 2, 'Entregado', 75.5, '2024-03-09'),
(3, 3, 'Pendiente', 30.2, '2024-03-10');

TRUNCATE TABLE `playlist`;
INSERT INTO `playlist` (`id_playlist`, `id_user`, `numero_canciones`, `duracion_total`, `imagen`, `nombre`, `fecha`) VALUES
(1, 1, 5, 200, 'playlist1.jpg', 'Mis Favoritas', '2024-03-08'),
(2, 2, 8, 300, 'playlist2.jpg', 'Descubrimientos', '2024-03-09'),
(3, 3, 3, 120, 'playlist3.jpg', 'Relax Total', '2024-03-10');

TRUNCATE TABLE `play_cancion`;
INSERT INTO `play_cancion` (`id_playlist`, `id_cancion`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 3),
(3, 2),
(3, 3);

TRUNCATE TABLE `post`;
INSERT INTO `post` (`id_post`, `id_user`, `texto`, `imagen`, `likes`, `origen`, `tags`, `fecha`) VALUES
(1, 1, '¡Hola mundo!', 'imagen_post1.jpg', 15, NULL, 'saludo, inicio', '2024-03-08'),
(2, 2, 'Una foto increíble', 'imagen_post2.jpg', 20, NULL, 'foto, arte', '2024-03-09'),
(3, 3, 'Nuevo descubrimiento musical', NULL, 30, 1, 'música, recomendación', '2024-03-10');

TRUNCATE TABLE `postfav`;
INSERT INTO `postfav` (`id_post`, `id_user`) VALUES
(3, 1),
(1, 2),
(2, 3);

TRUNCATE TABLE `producto`;
INSERT INTO `producto` (`id_prod`, `id_artista`, `imagen`, `nombre`, `descripcion`, `stock`, `precio`) VALUES
(1, 1, 'producto1.jpg', 'Camiseta Artista 1', 'Camiseta con diseño exclusivo del artista 1', 50, 20.99),
(2, 2, 'producto2.jpg', 'Póster Firmado', 'Póster firmado por el artista 2', 30, 15.5),
(3, 3, 'producto3.jpg', 'Álbum en Vinilo', 'Edición especial en vinilo del álbum del artista 3', 10, 35.75);

TRUNCATE TABLE `prod_pedido`;
INSERT INTO `prod_pedido` (`id_prod`, `id_pedido`) VALUES
(1, 1),
(2, 2),
(3, 3);

TRUNCATE TABLE `seguidores`;
INSERT INTO `seguidores` (`id_user`, `id_seguidor`) VALUES
(1, 2),
(2, 3),
(3, 1);


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
