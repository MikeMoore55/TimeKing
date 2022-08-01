<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

/* this will get all the cart info needed for checkout */

   // get all in cart
   $app->get('/cart', function (Request $request, Response $response, $args) {
    $sql = "SELECT * FROM cart_info";
 
    try {
      // Get DB Object
      $database = new DB();
  
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

?>