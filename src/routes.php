<?php

use Slim\Http\Request;
use Slim\Http\Response;

require 'models/PostBack.php';
require 'models/LeadMap.php';
require 'models/DispenseRecord.php';
require 'models/CheckLead.php';

// POSTBACK GNL DATA
$app->get('/postback', function (Request $request, Response $response, array $args) {
    $this->logger->info("Slim-Skeleton '/postback' route");
    $leadData = new PostBack(1413007);
    $mapData = new LeadMap($leadData);

    print 'id: ' . $mapData->leadMapped->lead['id'] . '<br>';

    $check_lead = new CheckLead($mapData->leadMapped->lead['id']);
    // $lead = newLead($check_lead);

});


//Home
$app->get('/', function ($request, $response, $args) {
    return $this->view->render($response, 'index.html', [
        'name' => 'home'
    ]);
})->setName('profile');


// Dynamic (testing)
$app->get('/{name}', function ($request, $response, $args) {
    return $this->view->render($response, 'index.html', [
        'name' => $args['name']
    ]);
})->setName('profile');





