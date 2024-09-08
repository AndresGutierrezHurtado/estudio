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
('David Fernando', 'Diaz Niausa', 'davidfernandodiazniausa@gmail.com', '3209202177', 'El ensueño', '81dc9bdb52d04dc20036dbd8313ed055', 1);
