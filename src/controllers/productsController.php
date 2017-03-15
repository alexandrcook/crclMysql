<?php

require_once PATHROOT . '/models/productsModel.php';

function index($pdo){
    $categoriesArr = getCategories($pdo);
    view('categories', null, $categoriesArr);
}

function categoryById($pdo, $id){
    $productsArr = getCategoryById($pdo,$id);
    view('products', null, $productsArr);
}