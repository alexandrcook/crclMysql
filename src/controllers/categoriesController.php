<?php

require_once PATHROOT . '/models/categoriesModel.php';

function catIndex($pdo){
    $categoriesArr = getCategories($pdo);
    view('categories', $categoriesArr);
}

function categoryById($pdo, $id){
    $productsArr = getCategoryById($pdo,$id);
    view('products', $productsArr);
}