<?php
use App\models\DB;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Selective\BasePath\BasePathMiddleware;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';
/* require __DIR__ . '/../src/Models/db.php'; */

$app = AppFactory::create();

// Add Slim routing middleware
$app->addRoutingMiddleware();
$app->add(new BasePathMiddleware($app));
$app->addErrorMiddleware(true, true, true); 

$app->get('/', function (Request $request, Response $response, $args) {
    $sql = "SELECT * FROM product_info";
 
    try {
      // Get DB Object
      $database = new db();
  
      // connect to DB
      $conn = $database->connect();
  
      // query
      $stmt = $conn->query($sql);
      $products = $stmt->fetchAll(PDO::FETCH_OBJ);
      $database = null; // clear db object
  
      $response->getBody()->write(json_encode($products));
      return $response
        ->withHeader('content-type', 'application/json')
        ->withStatus(200);    
        
    } catch( PDOException $e ) {
        $error = array(
            "message" => $e->getMessage()
            
        );
        $response->getBody()->write(json_encode($error));
        return $response
            ->withHeader('content-type', 'application/json')
            ->withStatus(500);
    }
});

$app->run();