<?php

session_start();

require_once(__DIR__ . '/config.php');
require_once(__DIR__ . '/router.php');

require_once(__DIR__ . '/controllers/controller.php');

require_once(__DIR__ . '/models/orm.php');
require_once(__DIR__ . '/models/database.php');
require_once(__DIR__ . '/models/user.php');
require_once(__DIR__ . '/models/product.php');
