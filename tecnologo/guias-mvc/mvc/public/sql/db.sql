DROP DATABASE IF EXISTS `mvc_bd`;
CREATE DATABASE `mvc_bd`;
USE `mvc_bd`;

DROP TABLE IF EXISTS `usuarios`, `productos`, `roles`;

-- ---------------------------------------------------------------
-- Tabla de Roles
CREATE TABLE `roles` (
    `rol_id` INT PRIMARY KEY AUTO_INCREMENT,
    `rol_nombre` VARCHAR(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ---------------------------------------------------------------
-- Tabla de Usuarios
CREATE TABLE `usuarios` (
    `usuario_id` INT PRIMARY KEY AUTO_INCREMENT,
    `usuario_nombre` VARCHAR(100) NOT NULL,
    `usuario_apellido` VARCHAR(100) NOT NULL,
    `usuario_correo` VARCHAR(255) UNIQUE NOT NULL,
    `usuario_telefono` VARCHAR(15),
    `usuario_direccion` TEXT,
    `usuario_contra` VARCHAR(255) NOT NULL,
    `usuario_creacion` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `usuario_actualizacion` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    `usuario_imagen_url` VARCHAR(255) DEFAULT '/public/images/users/default.jpg',
    `rol_id` INT DEFAULT 1,
    FOREIGN KEY (`rol_id`) REFERENCES `roles`(`rol_id`) ON UPDATE CASCADE ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ---------------------------------------------------------------
-- Inserciones para la tabla de Roles
INSERT INTO `roles` (`rol_id`, `rol_nombre`)
VALUES 
(1, 'Cliente'),
(2, 'Administrador');

-- ---------------------------------------------------------------
-- Inserciones para la tabla de Usuarios
INSERT INTO `usuarios` (`usuario_nombre`, `usuario_apellido`, `usuario_correo`, `usuario_telefono`, `usuario_direccion`, `usuario_contra`, `rol_id`)
VALUES 
('Andrés', 'Gutiérrez Hurtado', 'andres52885241@gmail.com', '3209202177', 'El ensueño', '81dc9bdb52d04dc20036dbd8313ed055', 2),
('David Fernando', 'Diaz Niausa', 'davidfernandodiazniausa@gmail.com', '3209202177', 'El ensueño', '81dc9bdb52d04dc20036dbd8313ed055', 1),
('Juan Sebastián', 'Bernal Gamboa', 'juanbernal@gmail.com', '3209202178', 'El ensueño', '81dc9bdb52d04dc20036dbd8313ed055', 1),
('Julián David', 'Gonzáles Bayona', 'juliangonzales@gmail.com', '3209202179', 'El ensueño', '81dc9bdb52d04dc20036dbd8313ed055', 1),
('Kevin', 'Meza', 'kevinmeza@gmail.com', '3209202180', 'El ensueño', '81dc9bdb52d04dc20036dbd8313ed055', 1),
('Kevin Santiago', 'Cordoba Daza', 'kevinsantiago@gmail.com', '3209202181', 'El ensueño', '81dc9bdb52d04dc20036dbd8313ed055', 1),
('Jose David', 'Parra Quiroga', 'joseparra@gmail.com', '3209202182', 'El ensueño', '81dc9bdb52d04dc20036dbd8313ed055', 1),
('Daniel Stiven', 'Casallas Hernández', 'danielcasallas@gmail.com', '3209202183', 'El ensueño', '81dc9bdb52d04dc20036dbd8313ed055', 1),
('Santiago', '', 'santiago@gmail.com', '3209202184', 'El ensueño', '81dc9bdb52d04dc20036dbd8313ed055', 1),
('Alejandro', 'Suárez', 'alejandrosuarez@gmail.com', '3209202185', 'El ensueño', '81dc9bdb52d04dc20036dbd8313ed055', 1),
('Diego Alejandro', 'Paloma Díaz', 'diegoalejandro@gmail.com', '3209202186', 'El ensueño', '81dc9bdb52d04dc20036dbd8313ed055', 1);
