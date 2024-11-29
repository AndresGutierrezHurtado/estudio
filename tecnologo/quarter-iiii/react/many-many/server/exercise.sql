DROP DATABASE IF EXISTS `exercise`;
CREATE DATABASE `exercise`;
USE `exercise`;

CREATE TABLE `products` (
    `product_id` VARCHAR(60) NOT NULL PRIMARY KEY,
    `product_name` VARCHAR(80) NOT NULL,
    `product_description` VARCHAR(100) NOT NULL
);

INSERT INTO `products` (`product_id`, `product_name`, `product_description`) VALUES
('05bc9cdc-2afe-4117-ac5a-3e0cc87bb2ab', 'pantalón negro', 'pantalón de mezclilla elástico'),
('0d77d6f0-7436-4b04-bcea-e80da02bae13', 'camiseta azul 3', 'camiseta de algodon'),
('4c18c2e1-ab3b-4793-825d-7c2b0a13abe6', 'suéter gris 2', 'suéter de lana con cuello redondo'),
('54d082f1-c78e-4172-81d5-b580873d9cd8', 'camiseta roja 1', 'camiseta de algodón 100%');

CREATE TABLE `sizes` (
    `size_id` INT NOT NULL PRIMARY KEY,
    `size_name` VARCHAR(5) NOT NULL
);

INSERT INTO `sizes` (`size_id`, `size_name`) VALUE
(1, "xs"),
(2, "sm"),
(3, "md"),
(4, "lg"),
(5, "xl");

CREATE TABLE `products_sizes` (
    `product_id` VARCHAR(60) NOT NULL,
    `size_id` INT NOT NULL,
    `size_price` DECIMAL(10, 2) NOT NULL
);

INSERT INTO `products_sizes` (`product_id`, `size_id`, `size_price`) VALUES
('0d77d6f0-7436-4b04-bcea-e80da02bae13', 1, 10000.00),
('0d77d6f0-7436-4b04-bcea-e80da02bae13', 2, 20000.00),
('0d77d6f0-7436-4b04-bcea-e80da02bae13', 3, 30000.00),
('54d082f1-c78e-4172-81d5-b580873d9cd8', 1, 12000.00),
('54d082f1-c78e-4172-81d5-b580873d9cd8', 2, 18000.00),
('54d082f1-c78e-4172-81d5-b580873d9cd8', 3, 24000.00),
('05bc9cdc-2afe-4117-ac5a-3e0cc87bb2ab', 1, 25000.00),
('05bc9cdc-2afe-4117-ac5a-3e0cc87bb2ab', 2, 30000.00),
('05bc9cdc-2afe-4117-ac5a-3e0cc87bb2ab', 3, 35000.00),
('4c18c2e1-ab3b-4793-825d-7c2b0a13abe6', 1, 15000.00),
('4c18c2e1-ab3b-4793-825d-7c2b0a13abe6', 2, 20000.00),
('4c18c2e1-ab3b-4793-825d-7c2b0a13abe6', 3, 25000.00);
