START TRANSACTION;

DROP DATABASE IF EXISTS `prueba`;
CREATE DATABASE `prueba`;
USE `prueba`;

CREATE TABLE `users` (
    `user_id` INT AUTO_INCREMENT PRIMARY KEY,
    `user_nickname` VARCHAR(50) NOT NULL,
    `user_email` VARCHAR(100) UNIQUE NOT NULL,
    `user_password` TEXT NOT NULL,
    `user_created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO `users` (`user_id`, `user_nickname`, `user_email`, `user_password`, `user_created_at`) VALUES
(1, 'AndresDev', 'andres52885241@gmail.com', '$2y$10$gTOxSODW2X8bvbLes869XeVBFjSvhfabNnNAPH.7.9PnUacPc7hpS', '2025-06-25 18:47:50');

CREATE TABLE `tasks` (
    `task_id` INT AUTO_INCREMENT PRIMARY KEY,
    `task_user_id` INT NOT NULL,
    `task_title` VARCHAR(100) NOT NULL,
    `task_description` TEXT,
    `task_due_date` DATE,
    `task_priority` ENUM('alta', 'media', 'baja') NOT NULL DEFAULT 'media',
    `task_completed` BOOLEAN DEFAULT FALSE,
    `task_created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE `files` (
    `file_id` INT AUTO_INCREMENT PRIMARY KEY,
    `file_task_id` INT NOT NULL,
    `file_path` VARCHAR(255) NOT NULL,
    `file_created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

ALTER TABLE `tasks`
ADD CONSTRAINT `fk_user_id` 
FOREIGN KEY (`task_user_id`) 
REFERENCES `users`(`user_id`) 
ON DELETE CASCADE
ON UPDATE CASCADE;

ALTER TABLE `files`
ADD CONSTRAINT `fk_task_id` 
FOREIGN KEY (`file_task_id`) 
REFERENCES `tasks`(`task_id`) 
ON DELETE CASCADE
ON UPDATE CASCADE;

COMMIT;