<?php

// USERS

function getUsers($pdo)
{
    global $_config, $_page;
    //$users = $pdo->query('SELECT * FROM `users` ORDER BY `id` DESC LIMIT '.($_page * 20).','.$_config['items_on_page']);

    $users = $pdo->query('SELECT * FROM `users` ORDER BY `id` DESC LIMIT '.($_page * $_config['items_on_page']).','.$_config['items_on_page']);
    $users = $users->fetchAll();
    return $users;
}

function getUser($pdo, $user_id)
{
    global $_config, $_page;
    //$users = $pdo->query('SELECT * FROM `users` ORDER BY `id` DESC LIMIT '.($_page * 20).','.$_config['items_on_page']);

    $users = $pdo->query("SELECT * FROM `users` WHERE id = {$user_id}");
    $users = $users->fetchAll();
    return $users;
}

function getUsersCount($pdo)
{
    $usersCount = $pdo->query('SELECT * FROM `users`');
    $usersCount = $usersCount->fetchAll();
    $usersCount = count($usersCount);
    return $usersCount;
}

function updUserData($pdo, $id, $name, $email, $password, $login, $role)
{
    $update = $pdo->query("UPDATE users SET `name`=$name, `role`=$role, `email`=$email, `password`=$password  WHERE id={$id}");

}

// CATEGORIES

function getCategoriesAdm($pdo)
{
    global $_config, $_page;

    $categories = $pdo->query('SELECT * FROM `categories` ORDER BY `id` DESC LIMIT '.($_page * $_config['items_on_page']).','.$_config['items_on_page']);
    $categories = $categories->fetchAll();
    return $categories;
}

function getCategoriesCountAdm($pdo)
{
    $categoriesCount = $pdo->query('SELECT * FROM `categories`');
    $categoriesCount = $categoriesCount->fetchAll();
    $categoriesCount = count($categoriesCount);
    return $categoriesCount;
}

// PRODUCTS

function getProductsAdm($pdo)
{
    global $_config, $_page;

    $products = $pdo->query('SELECT * FROM `products` ORDER BY `id` DESC LIMIT '.($_page * $_config['items_on_page']).','.$_config['items_on_page']);
    $products = $products->fetchAll();
    return $products;
}

function getProductsCountAdm($pdo)
{
    $productsCount = $pdo->query('SELECT * FROM `products`');
    $productsCount = $productsCount->fetchAll();
    $productsCount = count($productsCount);
    return $productsCount;
}

// ORDERS

function getOrdersAdm($pdo)
{
    global $_config, $_page;

    $Orders = $pdo->query('SELECT * FROM `orders` ORDER BY `id` DESC LIMIT '.($_page * $_config['items_on_page']).','.$_config['items_on_page']);
    $Orders = $Orders->fetchAll();
    return $Orders;
}

function getOrdersCountAdm($pdo)
{
    $OrdersCount = $pdo->query('SELECT * FROM `orders`');
    $OrdersCount = $OrdersCount->fetchAll();
    $OrdersCount = count($OrdersCount);
    return $OrdersCount;
}

//
//function getUser($pdo, $id)
//{
//    $user = sql($pdo,
//        'SELECT * FROM `users` WHERE `id` = ' . $id,
//        [],
//        'rows'
//    );
//    return $user;
//}
//
//function saveUser($pdo, $userData)
//{
//    $res = sql($pdo,
//        'UPDATE `users` set
//          `name` = "' . $userData['name'] . '",
//          `email` = "' . $userData['email'] . '",
//          `login` = "' . $userData['login'] . '",
//          `password` = "' . sha1($userData['password']) . '"
//          WHERE `id` = ' . $userData['id']
//    );
//    return $res;
//}