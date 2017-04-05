<?php

foreach (glob("controllers/*.php") as $filename) {
    include_once $filename;
}

if (isset($controllerFileName) and $controllerFileName == 'admin') {
    include_once PATHROOT . '/admin/adminController.php';
}

if (isset($controllerFileName)) {
    if ($controllerFileName == 'login') {
        if (!isset($action) and !isset($routId)) {
            index();
        } elseif ($action == 'auth') {
            auth($pdo, $_POST);
        } elseif ($action == 'reg') {
            reg($pdo, $_POST);
        } elseif ($action == 'logout') {
            logout($_SESSION['user_name']);
        } else {
            view('404');
        }
    } else if ($controllerFileName == 'categories') {
        if (!isset($action) and !isset($routId)) {
            catIndex($pdo);
        } elseif (isset($routId)) {
            categoryById($pdo, $routId);
        } else {
            view('404');
        }
    } else if ($controllerFileName == 'orders') {
        if (!isset($action) and !isset($routId)) {
            orderIndex($pdo);
        } elseif ($action == 'add' and isset($_POST)) {
            addProduct($pdo, $_POST);
        } elseif ($action == 'basket') {
            productsInBasket($pdo);
        } elseif ($action == 'buy') {
            orderBuy($pdo, $_POST);
        } else {
            view('404');
        }
    } else if ($controllerFileName == 'admin') {
        $_method = $_GET['method'] ?? null;
        $_page = $_GET['page'] ?? 0;
        if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
            if (!isset($action) and $_method == null ) {
                adminIndex($pdo);
            } elseif ($action == 'users') {
                if ($_method == null) {
                    showUsers($pdo);
                } elseif ($_method == 'create') {

                } elseif ($_method == 'edit') {
                    editUser($pdo, $_GET);
                } elseif ($_method == 'delete') {

                } elseif ($_method == 'change'){
                    changeUserData($pdo, $_POST);
                }
            } elseif ($action == 'categories') {
                if (!isset($_method)) {
                    showCategories($pdo);
                } elseif ($_method == 'create') {

                } elseif ($_method == 'edit') {

                } elseif ($_method == 'delete') {

                }
            } elseif ($action == 'products') {
                if (!isset($_method)) {
                    showProducts($pdo);
                } elseif ($_method == 'create') {

                } elseif ($_method == 'edit') {

                } elseif ($_method == 'delete') {

                }
            } elseif ($action == 'orders') {
                if (!isset($_method)) {
                    showOrders($pdo);
                } elseif ($_method == 'create') {

                } elseif ($_method == 'edit') {

                } elseif ($_method == 'delete') {

                }
            } else {
                view('404');
            }
        } else {
            $_SESSION['flash_msg'] = 'Для входа в админ панель нужно залогиниpоваться';
            header('location: /login');
            exit();
        }
    }
} else {
    view('default');
}

