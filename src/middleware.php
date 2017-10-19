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


## Calendar
$calendar = $_ENV['CAL_URL'];
