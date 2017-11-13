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
    $leadData = new PostBack(1463399);
    $mapData = new LeadMap($leadData);

    print '<pre>';

    print 'id: ' . $mapData->leadMapped->lead['id'] . '<br>';

    $check_lead = new CheckLead($mapData->leadMapped->lead['id']);
    // $lead = newLead($check_lead);

        ## Salesforce
        $SFbuilder = new \Phpforce\SoapClient\ClientBuilder(
          __DIR__ . '/wsdl/enterprise.wsdl.xml',
          $_ENV['SF_USER'],
          $_ENV['SF_PASS'],
          $_ENV['SF_API']
        );

        $client = $SFbuilder->build();

        try {
          $fields = $client->describeSObjects(array('Lead'));
        } catch (Exception $e) {
          print $e;
        }

        $var = $fields[0]->getFields()->toArray();

        $sfFields = [];

        foreach ($var as $key => $value) {
          $sfFields[] = $value->getName();
        }

        $Fields = '';
        foreach ($sfFields as $fieldKey => $fieldValue) {
          $Fields .= $fieldValue . ', ';
        }

        $Fields = substr(trim($Fields), 0, -1);

        $results = $client->query("SELECT " .  $Fields . " FROM Lead WHERE Id in ('00QA000001QquUPMAZ')");
        foreach ($results as $key => $row) {
          foreach ($sfFields as $fieldKey => $fieldValue) {
            if (!empty($row->$fieldValue)) {
              if (is_string($row->$fieldValue)) {
                print $fieldValue . ': ' . $row->$fieldValue . "\n";
              }
               else {
                print $fieldValue . ': ';
                print_r($row->$fieldValue);
                print "\n";
              }
            }
          }
        }


        //print_r($results);

        // $container = $app->getContainer();

        // print_r($app);
        // $this->logger->addInfo("Something interesting happened");

        // $this->SFbuilder->build();



        print '</pre>';
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





