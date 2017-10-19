<?php
// Application middleware

// e.g: $app->add(new \Slim\Csrf\Guard);


## DotENV
$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();


## Redean ORM
use \RedBeanPHP\R as R;
$host = 'localhost';
$user = $_ENV['DB_USER'];
$pass = $_ENV['DB_PASS'];
$db = $_ENV['DB_NAME'];
R::setup("mysql:host=$host;dbname=$db", $user, $pass);


## Salesforce
$SFbuilder = new \Phpforce\SoapClient\ClientBuilder(
  __DIR__ . '/wsdl/enterprise.wsdl.xml',
  $_ENV['SF_USER'],
  $_ENV['SF_PASS'],
  $_ENV['SF_API']
);


## Calendar
$calendar = $_ENV['CAL_URL'];
