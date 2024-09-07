<?php

$folderpath = dirname($_SERVER['SCRIPT_NAME']);
$urlpath = $_SERVER['REQUEST_URI'];
$url = substr($urlpath, strlen($folderpath));
date_default_timezone_set('America/Bogota');

define('URL_PATH', $urlpath);
define('URL', $url);
define('DOMAIN', ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] );

// Credenciales para la base de datos
define('DB_HOSTNAME', 'localhost' );
define('DB_USERNAME', 'root' );
define('DB_PASSWORD', '' );
define('DB_NAME', 'mvc_bd' );