<?php
/**
 * Это единая точка входа для нашего приложения.
 * На этот файл будут переадресованы все запросы нашего сайта.
 */
error_reporting(E_ALL); //ловим все ошибки
ini_set('display_errors', 1); //показываем все ошибки

define('PATHROOT', __DIR__);

session_start();
//if (!isset($_SESSION['counter'])) $_SESSION['counter']=0;
//echo "Вы обновили эту страницу ".$_SESSION['counter']++." раз. ";
//echo "<br><a href=".$_SERVER['PHP_SELF'].">обновить";
//exit();

include_once 'components/Db.php';
include_once 'components/Helpers.php';
include_once 'components/Router.php';


