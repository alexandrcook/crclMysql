<?php

// Show view depends on $action
function view($viewRoot, $data = [], $viewName = null)
{
    include PATHROOT . '/views/header.php';
    if ($viewName) {
        include PATHROOT . '/views/' . $viewRoot . '/' . $viewName . 'view.php';
    } else {
        include PATHROOT . '/views/' . $viewRoot . '/index.php';
    }
    include PATHROOT . '/views/footer.php';
}