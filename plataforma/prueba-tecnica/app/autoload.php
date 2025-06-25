<?php
// session
session_start();

// router & config
require_once(__DIR__ . "/enviroment.php");
require_once(__DIR__ . "/config.php");
require_once(__DIR__ . "/router.php");

// core
require_once(__DIR__ . "/core/Database.php");
require_once(__DIR__ . "/core/Controller.php");

// controllers
require_once(__DIR__ . "/controllers/pageController.php");
require_once(__DIR__ . "/controllers/authController.php");
require_once(__DIR__ . "/controllers/taskController.php");
