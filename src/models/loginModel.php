<?php

function checkUniqueUser($pdo, $email, $login)
{
    $user = $pdo->query("SELECT * FROM `users` WHERE `login` ='{$login}' OR `email` = '{$email}'");
    $userCheck = $user->fetchAll();
    return $userCheck;
}

function regUser($pdo, $name, $email, $password, $login, $role, $date)
{
    $insert = $pdo->prepare("INSERT INTO `users` (`name`,`role`,`email`,`password`,`login`,`last_activity`) VALUES (?,?,?,?,?,?)");
    $insert->execute(array($name, $role, $email, $password, $login, $date));
}

function authUser($pdo, $login)
{
    $user = $pdo->query("SELECT * FROM `users` WHERE `login` ='{$login}'");
    $userCheck = $user->fetchAll();
    return $userCheck;
}