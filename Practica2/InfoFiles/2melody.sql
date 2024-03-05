SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE `ajustes` (
  `fuente` varchar(255) DEFAULT NULL,
  `fontSize` int(11) DEFAULT NULL,
  `temas` varchar(255) DEFAULT NULL,
  `paginaPrincipal` varchar(255) DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `album` (
  `id_artista` int(11) NOT NULL,
  `id_cancion` int(11) NOT NULL,
  `duracion_total` int(11) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `artista` (
  `id_artista` int(11) NOT NULL,
  `integrantes` tinytext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `cancion` (
  `id_cancion` int(11) NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `id_artista` int(11) DEFAULT NULL,
  `likes` int(11) DEFAULT NULL,
  `ruta` varchar(255) DEFAULT NULL,
  `duracion` int(11) DEFAULT NULL,
  `tags` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_prod` int(11) DEFAULT NULL,
  `estado` varchar(255) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `total` float DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `playlist` (
  `id_playlist` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_cancion` int(11) DEFAULT NULL,
  `numero_canciones` int(11) DEFAULT NULL,
  `duracion_total` int(11) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `post` (
  `id_post` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `texto` text DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `likes` int(11) DEFAULT NULL,
  `origen` int(11) DEFAULT NULL,
  `tags` text DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `postfav` (
  `id_post` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `producto` (
  `id_prod` int(11) NOT NULL,
  `id_artista` int(11) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `descripcion` tinytext DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `precio` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `seguidores` (
  `id_user` int(11) NOT NULL,
  `id_seguidor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `usuario` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `nickname` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `descripcion` tinytext DEFAULT NULL,
  `karma` int(11) DEFAULT NULL,
  `num_seguidores` int(11) DEFAULT NULL,
  `num_seguidos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


ALTER TABLE `ajustes`
  ADD PRIMARY KEY (`id_user`);

ALTER TABLE `album`
  ADD PRIMARY KEY (`id_artista`,`id_cancion`),
  ADD KEY `id_cancion` (`id_cancion`);

ALTER TABLE `artista`
  ADD PRIMARY KEY (`id_artista`);

ALTER TABLE `cancion`
  ADD PRIMARY KEY (`id_cancion`),
  ADD KEY `id_artista` (`id_artista`);

ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `id_prod` (`id_prod`),
  ADD KEY `id_user` (`id_user`);

ALTER TABLE `playlist`
  ADD PRIMARY KEY (`id_playlist`),
  ADD KEY `id_cancion` (`id_cancion`),
  ADD KEY `id_user` (`id_user`);

ALTER TABLE `post`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `id_user` (`id_user`);

ALTER TABLE `postfav`
  ADD PRIMARY KEY (`id_user`,`id_post`),
  ADD KEY `id_post` (`id_post`);

ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_prod`),
  ADD KEY `id_artista` (`id_artista`);

ALTER TABLE `seguidores`
  ADD PRIMARY KEY (`id_user`,`id_seguidor`),
  ADD KEY `id_seguidor` (`id_seguidor`);

ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);


ALTER TABLE `cancion`
  MODIFY `id_cancion` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `playlist`
  MODIFY `id_playlist` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `post`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `producto`
  MODIFY `id_prod` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `usuario`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `ajustes`
  ADD CONSTRAINT `ajustes_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`id_user`);

ALTER TABLE `album`
  ADD CONSTRAINT `album_ibfk_1` FOREIGN KEY (`id_cancion`) REFERENCES `cancion` (`id_cancion`),
  ADD CONSTRAINT `album_ibfk_2` FOREIGN KEY (`id_artista`) REFERENCES `artista` (`id_artista`);

ALTER TABLE `artista`
  ADD CONSTRAINT `artista_ibfk_1` FOREIGN KEY (`id_artista`) REFERENCES `usuario` (`id_user`);

ALTER TABLE `cancion`
  ADD CONSTRAINT `cancion_ibfk_1` FOREIGN KEY (`id_artista`) REFERENCES `artista` (`id_artista`);

ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`id_prod`) REFERENCES `producto` (`id_prod`),
  ADD CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`id_user`);

ALTER TABLE `playlist`
  ADD CONSTRAINT `playlist_ibfk_1` FOREIGN KEY (`id_cancion`) REFERENCES `cancion` (`id_cancion`),
  ADD CONSTRAINT `playlist_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`id_user`);

ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`id_user`);

ALTER TABLE `postfav`
  ADD CONSTRAINT `postfav_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`id_user`),
  ADD CONSTRAINT `postfav_ibfk_2` FOREIGN KEY (`id_post`) REFERENCES `post` (`id_post`);

ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_artista`) REFERENCES `artista` (`id_artista`);

ALTER TABLE `seguidores`
  ADD CONSTRAINT `seguidores_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`id_user`),
  ADD CONSTRAINT `seguidores_ibfk_2` FOREIGN KEY (`id_seguidor`) REFERENCES `usuario` (`id_user`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
