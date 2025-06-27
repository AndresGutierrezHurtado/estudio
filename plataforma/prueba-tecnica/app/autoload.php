<?php
// session
session_start();

// CAPA DE ABSTRACCION
require_once(__DIR__ . "/contracts/databaseInterface.php");
require_once(__DIR__ . "/contracts/repositoryInterface.php");
require_once(__DIR__ . "/contracts/servicesInterface.php");

// core and config
require_once(__DIR__ . "/core/Database.php");
require_once(__DIR__ . "/core/Controller.php");
require_once(__DIR__ . "/enviroment.php");
require_once(__DIR__ . "/config.php");

// CAPA DE PERSISTENCIA
require_once(__DIR__ . "/repositories/userRepository.php");

// CAPA DE NEGOCIO
require_once(__DIR__ . "/services/authService.php");

// CAPA DE PRESENTACION
require_once(__DIR__ . "/controllers/pageController.php");
require_once(__DIR__ . "/controllers/authController.php");
require_once(__DIR__ . "/controllers/taskController.php");

require_once(__DIR__ . "/router.php");
