<?php
    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;

/* this is used to get all products based on variables to divide them into categories */

    // ALL 
    $app->get('/watches', function (Request $request, Response $response, $args) {
        $sql = "SELECT * FROM product_info";
    
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

       // ALL AVAILABLE
       $app->get('/watches/all', function (Request $request, Response $response, $args) {
        $sql = "SELECT * FROM product_info WHERE watch_available = 'true'";
     
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

    //FEATURED
    $app->get('/watches/featured', function (Request $request, Response $response, $args) {
        $sql = "SELECT * FROM product_info WHERE watch_rating > 8 && watch_available = 'true'";
     
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

    // UPCOMING 
    $app->get('/watches/upcoming', function (Request $request, Response $response, $args) {
        $sql = "SELECT * FROM product_info WHERE watch_available = 'false'";
     
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