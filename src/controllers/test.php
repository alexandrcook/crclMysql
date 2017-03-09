<?php

echo 'testController<br>';

function index($inputParams)
{
    echo 'default Function<br>';
    if($inputParams != null){
        var_dump($inputParams);
    }else{
        echo 'Никаких параметров не получено';
    }
}

function some($inputParams)
{
    echo 'some Function<br>';
    if($inputParams != null){
        var_dump($inputParams);
    }else{
        echo 'Никаких параметров не получено';
    }

}