<?php


function dbGet($db, $params)
{

}

// Show view depends on $action
function view($viewRoot, $viewName = null, $data = [])
{
    include PATHROOT . '/views/header.php';

    if ($viewName) {
        include PATHROOT . '/views/' . $viewRoot . '/' . $viewName . 'view.php';
    } else {
        include PATHROOT . '/views/' . $viewRoot . '/index.php';
    }

    include PATHROOT . '/views/footer.php';
}