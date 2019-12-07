<?php

require "../bootstrap.php";

use Slim\Http\Response;
use Slim\Http\Request;


$app->get('/','app\controllers\HomeController:index');
$app->get('/eventos','app\controllers\EventosController:index');
$app->get('/eventos/cadastro','app\controllers\EventosController:create');
$app->post('/eventos/cadastro','app\controllers\EventosController:store');

$app->run();