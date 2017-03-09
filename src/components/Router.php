<?php

echo '<br> -----  components/Router.php BEGIN';
echo '<br>';

if (!empty($_SERVER['REQUEST_URI']) and trim($_SERVER['REQUEST_URI'], '/') != '') {
    $url = trim($_SERVER['REQUEST_URI'], '/');

    var_dump($url);

    //$remove_http = str_replace('http://', '', $url);
    //var_dump($remove_http);
//    $split_url = explode('?', $url);
//    var_dump($split_url);

    $parsedUrlArr = explode('/', $url);

    $controllerFileName = $parsedUrlArr[0];


    if (count($parsedUrlArr) >= 2) {
        $controllerFunctionName = $parsedUrlArr[1];
    }

    function getParams($parsedUrlArr)
    {
        if (count($parsedUrlArr) >= 2) {
            $params = [];
            for ($i = 2; $i + 1 <= count($parsedUrlArr);) {
                $params[] .= $parsedUrlArr[$i];
                $i++;
            }
            return $params;
        }
    }

    $controllerFile = PATHROOT . '/controllers/' . $controllerFileName . '.php';
    if (file_exists($controllerFile)) {
        include_once $controllerFile;
    } else {
        include_once PATHROOT . '/views/404/index.php';
    }

    if (isset($controllerFunctionName)) {
        if (function_exists($controllerFunctionName)) {
            $controllerFunctionName(getParams($parsedUrlArr));
        } else {
            var_dump('ERROR !!! Function with name ' . $controllerFunctionName . ' DOES NOT EXIST !!!');
        }
    } else {
        index(getParams($parsedUrlArr));
    }

}

echo '<br>';
echo '<br> -----  components/Router.php END';
echo '<br>';
