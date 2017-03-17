<?php

require_once PATHROOT . '/models/ordersModel.php';

function addProduct ($pdo){
    insertProduct($pdo, $_POST['productId'], $_SESSION['id'], $_POST['productPrice']);
    $_SESSION['flash_msg'] = "Товар '". $_POST['productTitle'] ."' добавлен в корзину";
    header('location: '. $_SERVER['HTTP_REFERER'] .'');
}

function productInBasketCount($pdo){
    $count = getProductsInBasket($pdo, $_SESSION['id']);
    return count($count);
}

function productsInBasket($pdo){
    $productsInBasket = getProductsInBasket($pdo, $_SESSION['id']);
    $productsInBasketById = [];

    foreach ($productsInBasket as $key => $product){
        $productsInBasketById[$key]= getProductsInBasketById($pdo, $product['product_id']);
    }
    view('orders', $productsInBasketById);
}

function orderBuy($pdo){

    buyProductsInBasket($pdo, $_SESSION['id']);

    $productsInBasket = getProductsInBasket($pdo, $_SESSION['id']);
    $productsInBasketById = [];

    foreach ($productsInBasket as $key => $product){
        $productsInBasketById[$key]= getProductsInBasketById($pdo, $product['product_id']);
    }

    //var_dump($productsInBasketById);

    mailAboutOrderBuy($_POST, $productsInBasketById);

    $_SESSION['flash_msg'] = "Вы купили товар!!! Поздравляю - Вы большой молодец!!! Проверьте почту - может Вам пришло чего-то";
    header('location: /');
}