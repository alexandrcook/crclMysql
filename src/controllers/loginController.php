<?php

require_once PATHROOT . '/models/loginModel.php';

function index()
{
    view('login');
}

function auth($pdo)
{
    $login = isset($_POST['login']) ? $_POST['login'] : null;
    $pass = isset($_POST['pass']) ? $_POST['pass'] : null;
    $rememberMe = isset($_POST['rememberMe']) ? $_POST['rememberMe'] : null;

    $authUser = authUser($pdo, $login);
    if ($authUser) {
        if ($authUser[0]['password'] == $pass) {
            $_SESSION['id'] = $authUser[0]['id'];
            $_SESSION['role'] = $authUser[0]['role'];
            $_SESSION['user_name'] = $authUser[0]['name'];
            $_SESSION['flash_msg'] = "Пользователь '<b>" . $login . "</b>' залогинизировался";
            header('location: /');
        } else {
            $_SESSION['flash_msg'] = "Пользователь '<b>" . $login . "</b>' - подумай хорошенько и вспомни правильный пароль";
            header('location: /login');
        }
    } else {
        $_SESSION['flash_msg'] = "Пользователь " . $login . " не числится в наших списках";
        header('location: /login');
    }
}

function logout($userName)
{
    unset($_SESSION['id']);
    unset($_SESSION['role']);
    unset($_SESSION['name']);
    unset($_SESSION['user_name']);
    $_SESSION['flash_msg'] = "Пользователь '<b>" . $userName . "</b>' РАЗлогинизировался";
    header('location: /');
}

function reg($pdo)
{
    if (!empty($_POST)) {
        $name = $_POST['name'];
        $role = $_POST['role'];
        $email = $_POST['email'];
        $password = $_POST['pass'];
        $login = $_POST['login'];
        $date = date('Y-m-d H:i:s');
        if ($name != '' && $email != '' && $login != '' && $password != '') {
            $unicUser = checkUniqueUser($pdo, $email, $login);
            if (empty($unicUser)) {
                regUser($pdo, $name, $email, $password, $login, $role, $date);
                $_SESSION['flash_msg'] = "Пользователь " . $login . " c email " . $email . " зарегестрирован";
                var_dump($_SESSION['flash_msg']);
                header('location: /');
            } else {
                $_SESSION['flash_msg'] = "Такий користувач вже є";
                header('location: /login');
            }
        }
    }
}