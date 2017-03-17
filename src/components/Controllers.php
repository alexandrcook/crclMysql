<?php

foreach (glob("controllers/*.php") as $filename)
{
    include_once $filename;
}

if(isset($controllerFileName)){

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
            catIndex($pdo);
        }elseif (isset($routId)) {
            categoryById($pdo, $routId);
        }else{
            view('404');
        }
    }else if($controllerFileName == 'orders'){
        if(!isset($action) and !isset($routId)){
            orderIndex($pdo);
        }elseif ($action == 'add' and isset($_POST) ) {
            addProduct($pdo, $_POST);
        }elseif ($action == 'basket'){
            productsInBasket($pdo);
        }elseif ($action == 'buy'){
            orderBuy($pdo, $_POST);
        }
    }else{
        view('404');
    }
}else{
    view('default');
}

