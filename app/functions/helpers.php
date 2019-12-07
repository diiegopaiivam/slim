<?php

function dd($data){
    echo "<pre>";
    print_r($data);

    die();
}

function json($data){

    header('Content-Type: application/json');

    echo json_encode($data);
}

function path(){
    $vendorDir = dirname(dirname(__FILE__));
    return dirname($vendorDir);
}