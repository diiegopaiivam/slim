<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;


return function (App $app) {
    $container = $app->getContainer();

    $app->get('/', function (Request $request, Response $response, array $args) use ($container) {
        
        return $container->get('renderer')->render($response, 'index.phtml', $args);
    });

    $app->get('/listagem', function (Request $request, Response $response, array $args) use ($container) {
        
        $lista = new Lista($this->db);

        $args['lista'] = $lista->getLista();

        return $container->get('renderer')->render($response, 'home.phtml', $args);
    });

    $app->get('/adicionarContato', function ($request, $response, $args) use ($container) {
        return $container->get('renderer')->render($response, 'adicionarContato.phtml', $args);
    });

    $app->post('/adicionarContato', function ($request, $response, $args) use ($container) {
        $data = $request->getParsedBody();
        $lista = new Lista($this->db);
        $lista->add($data);

        return $response->withStatus(302)->withHeader("Location", "/slim_twig/public");

    });

    $app->get('/edit/{Nome}', function ($request, $response, $args) use ($container) {
        $lista = new Lista($this->db);
        $args['info'] = $lista->getContato($args['Nome']);
        return $container->get('renderer')->render($response, 'edit.phtml', $args);
    });

    $app->post('/edit/{Nome}', function ($request, $response, $args) use ($container) {
        $data = $request->getParsedBody();
        $lista = new Lista($this->db);
        $lista->update($data, $args['Nome']);

        return $response->withStatus(302)->withHeader("Location", "/estudando/public");
    });

    $app->get('/del/{Nome}', function ($request, $response, $args) use ($container) {
        $lista = new Lista($this->db);
        $lista->del($args['Nome']);

        return $response->withStatus(302)->withHeader("Location", "/estudando/public");
    });

    $app->get('/sobre', function(Request $request, Response $response) use ($container) {
        echo 'Deu certo aí?';

    });


};
