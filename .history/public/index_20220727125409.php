<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Selective\BasePath\BasePathMiddleware;
use Slim\Factory\AppFactory;

// require auto load
require __DIR__ . '/../vendor/autoload.php';

// require db connection file
require __DIR__ . '/../src/Models/db.php'; 

$app = AppFactory::create();

// Add Slim routing middleware
$app->addRoutingMiddleware();
$app->add(new BasePathMiddleware($app));
$app->addErrorMiddleware(true, true, true); 

// product routes

require __DIR__ . '/../src/routes/products.php'; 



$app->run();