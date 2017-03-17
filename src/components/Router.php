<?php

if (!empty($_SERVER['REQUEST_URI']) and trim($_SERVER['REQUEST_URI'], '/') != '') {
    $url = trim($_SERVER['REQUEST_URI'], '/');

    $parsedUrlArr = explode('/', $url);
    $controllerFileName = $parsedUrlArr[0];

    if(isset($parsedUrlArr[1])) {
        if(is_numeric($parsedUrlArr[1])){
            $routId = $parsedUrlArr[1];
        }
        else $action = $parsedUrlArr[1];
    }
}
