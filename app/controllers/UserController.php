<?php

namespace app\controllers;

use Slim\Http\Request;
use Slim\Http\Response;

class UserController extends Controller{

    public function update(){
        echo 'update';
    }

    public function show(Request $request, Response $response, array $args){
        dd($args);
    }

    public function showContato(){
        $this->view( 'contato', [
            'nome'      => 'Diego',
            'title'    => 'Contatos'
        ]);
    }
}