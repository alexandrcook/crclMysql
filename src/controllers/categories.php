<?php

function index($pdo, $id = null)
{
    $categories = $pdo->query('SELECT * FROM `categories`');
    $categoriesArray = $categories->fetchAll();

    if ($id != null){
        $categories = $pdo->query('SELECT * FROM `categories` WHERE `id`=' . $id);
        $category = $categories->fetch();
        //var_dump($category);
        return $category;
    }

    //var_dump($categoriesArray);
    return $categoriesArray;
}

function createCategories($pdo, $name)
{
    $sql = "INSERT INTO `categories`(`title`) VALUES ('{$name}')";
    $insert = $pdo->prepare($sql);
    $insert->execute();
}

function updateCategoriesBuId($pdo, $id, $title)
{
    $sql = "UPDATE `categories` SET `title` = '{$title}' WHERE id='{$id}'";
    $category = $pdo->prepare($sql);
    $category->execute();
}

function deleteCategoriesById($pdo, $id)
{
    $sql = "DELETE FROM `categories` WHERE `id`=" . $id;
    $count = $pdo->exec($sql);
    return $count;
}