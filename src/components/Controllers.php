<?php

if(isset($controllerFileName)){
    $controllerFile = PATHROOT . '/controllers/'. $controllerFileName .'Controller.php';

    if (file_exists($controllerFile)){
        include_once $controllerFile;
    }else{
        view('404');
        return;
    }
    if ($controllerFileName == 'login'){
        if(!isset($action) and !isset($routId)){
            index();
        }elseif ($action == 'auth'){
            auth($pdo, $_POST);
        }elseif ($action == 'reg'){
            reg($pdo, $_POST);
        }elseif ($action == 'logout'){
            logout($_SESSION['user_name']);
        }else{
            view('404');
        }
    }else if($controllerFileName == 'categories'){
        if(!isset($action) and !isset($routId)){
            index($pdo);
        }elseif (isset($routId)) {
            categoryById($pdo, $routId);
        }else{
            view('404');
        }
    }else if($controllerFileName == 'products'){
//        if(!isset($action) and !isset($routId)){
//            index($pdo);
//        }elseif (isset($routId)) {
//            productsByCategoryId($pdo, $routId);
//        }
    }else{
        view('404');
    }
}

