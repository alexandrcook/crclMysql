<?php

function getProducts($pdo){
    $categories = $pdo->query("SELECT * FROM `categories`");
    $categoriesArr = $categories->fetchAll();
    return $categoriesArr;
}

function getProductById($pdo,$id){
    $products = $pdo->query("SELECT * FROM `products` WHERE `category_id` = {$id}");
    $productsArr = $products->fetchAll();
    return $productsArr;
}