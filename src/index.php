<!doctype html>
<?php

/**
 * Это единая точка входа для нашего приложения.
 * На этот файл будут переадресованы все запросы нашего сайта.
 */
error_reporting(E_ALL); //ловим все ошибки
ini_set('display_errors', 1); //показываем все ошибки

define('PATHROOT', __DIR__);

include_once 'views/header.php';

include_once 'components/Db.php';

include_once 'components/Router.php';

include_once 'views/footer.php';

//session_start();

