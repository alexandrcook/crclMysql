<?php

include_once __DIR__.'../../config/db_params.php';

try {
    $pdo = new PDO("mysql:host=".HOST.";dbname=".DBNAME.";charset=utf8mb4", USER, PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo $e->getMessage();
}