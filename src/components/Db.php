<?php

include_once __DIR__.'../../config/db_params.php';

try {
    $db = new PDO("mysql:host=".HOST.";dbname=".DBNAME.";charset=utf8mb4", USER, PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo $e->getMessage();
}