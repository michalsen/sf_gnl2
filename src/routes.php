<?php

use Slim\Http\Request;
use Slim\Http\Response;

require 'models/PostBack.php';
// Routes


// POSTBACK
$app->get('/postback', function (Request $request, Response $response, array $args) {
    $this->logger->info("Slim-Skeleton '/postback' route");
    $leadData = new PostBack(1413007);
    print '<pre>';
    print_r($leadData);

});


//Home
$app->get('/', function ($request, $response, $args) {
    return $this->view->render($response, 'index.html', [
        'name' => 'home'
    ]);
})->setName('profile');


// Dynamic
$app->get('/{name}', function ($request, $response, $args) {
    return $this->view->render($response, 'index.html', [
        'name' => $args['name']
    ]);
})->setName('profile');





