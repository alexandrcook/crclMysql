<?php

if(isset($controllerFileName)){
    $controllerFile = PATHROOT . '/controllers/'. $controllerFileName .'Controller.php';
    if (isset($controllerFile)){
        include_once $controllerFile;
    }else{
        include_once PATHROOT . '/views/404/index.php';
        return;
    }

    if ($controllerFileName == 'login'){
        if(!isset($action)){
            index();
        }elseif ($action == 'auth'){
            auth($pdo, $_POST);
        }elseif ($action == 'reg'){
            reg($pdo, $_POST);
        }elseif ($action == 'logout'){
            logout($_SESSION['user_name']);
        }

    } else if($controllerFileName == 'login'){


    }else if($controllerFileName == 'basket'){


    }else if($controllerFileName == 'products'){


    }else if($controllerFileName == 'categories'){


    }else if($controllerFileName == 'categories'){


    }else if($controllerFileName == 'categories'){


    }


}

