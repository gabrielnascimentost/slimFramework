<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
    $container = $app->getContainer();

    $app->get('/', function($request, $response, $args){
        $lista = new Lista($this->db);
        $args['lista'] = $lista->getLista();
        return  $this->renderer->render($response, 'home.phtml', $args);
    });

    $app->get('/add', function($request, $response, $args){
        return  $this->renderer->render($response, 'add.phtml', $args);
    });
       
    $app->post('/add', function ($request, $response, $args){
        $data = $request->getParsedBody();
        $lista = new Lista($this->db);
        $lista->add($data);
        return $response->withStatus(302)->withHeader("Location", "/slim/public");
    });

};
