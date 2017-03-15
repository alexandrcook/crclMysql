<?php

function getCategories($pdo)
{
    $categories = $pdo->query("SELECT * FROM `categories`");
    $categoriesArr = $categories->fetchAll();
    return $categoriesArr;
}

function getCategoryById($pdo, $id)
{
    $category = $pdo->query("SELECT * FROM `categories` WHERE `id` = {$id}");
    $categoryInfo = $category->fetchAll();

    $products = $pdo->query("SELECT * FROM `products` WHERE `category_id` = {$id}");
    $productsArr = $products->fetchAll();

    $data = [
        'category' => $categoryInfo,
        'products' => $productsArr
    ];

    return $data;
}