<?php

if (!empty($_SERVER['REQUEST_URI']) and trim($_SERVER['REQUEST_URI'], '/') != '') {
    $url = parse_url($_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']);
    $urlArray = explode('/', $url['path']);
    $parsedUrlArr = array_filter($urlArray);

    $controllerFileName = $parsedUrlArr[1];

    if(isset($parsedUrlArr[2])) {
        if(is_numeric($parsedUrlArr[2])){
            $routId = $parsedUrlArr[2];
        }
        else $action = $parsedUrlArr[2];
    }

}
