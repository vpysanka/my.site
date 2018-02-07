<?php
// Настройка локального времени
if (function_exists('date_default_timezone_set'))
date_default_timezone_set('Europe/Kiev');

// Вывод ошибок
ini_set('display_errors',1);
error_reporting(E_ALL);

// Настройка маршрутов к папкам
require realpath(__DIR__).'/../config/app.php';

require_once ROOT.'/bootstrap/autoload.php';
spl_autoload_register("autoloadsystem");

Session::init();

$router = new Router();
$router->run();

require_once CONTROLLERS.'/Page404Controller.php';