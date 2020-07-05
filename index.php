<?php
include 'initial.php';
ini_set('display_errors', 1);
error_reporting(0);

require_once(ROOT . '/functions.php');
require_once(ROOT . '/components/Autoload.php');

Redirects::run();
$router = new Router();
$router->run();
