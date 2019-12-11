<?php

use app\src\Flash;

$message = new \Twig_SimpleFunction('message', function($file){
    echo Flash::get($index);
});


return [
    $message
];