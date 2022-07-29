<?php
/* this file will be process all API requests regarding products */
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

/* GET REQUESTS */

//all products
$app -> post('user/signIn', function (Request $request, Response $response, $args){
    $data = $request->getParsedBody();
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $displayName = $_POST["displayName"];
    $email = $_POST["email"];
    $password = $_POST["password"];
   
    $sql = "INSERT INTO user_info (name, email, phone) VALUES (:name, :email, :phone)";
   
    try {
      $db = new Db();
      $conn = $db->connect();
     
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':name', $name);
      $stmt->bindParam(':email', $email);
      $stmt->bindParam(':phone', $phone);
   
      $result = $stmt->execute();
   
      $db = null;
      $response->getBody()->write(json_encode($result));
      return $response
        ->withHeader('content-type', 'application/json')
        ->withStatus(200);
    } catch (PDOException $e) {
      $error = array(
        "message" => $e->getMessage()
      );
   
      $response->getBody()->write(json_encode($error));
      return $response
        ->withHeader('content-type', 'application/json')
        ->withStatus(500);
    }

    $sql = "INSERT INTO `user_info`(`user_name`, `user_surname`, `user_displayname`, `user_email`, `user_password`) VALUES ( '$name','$surname','$displayName','$email','$password');";

    try {
        // Get DB Object
        $database = new DB();
    
        // connect to DB
        $conn = $database->connect();
    
        // query
        $stmt = $conn->query($sql);
        $users = $stmt->fetchAll(PDO::FETCH_OBJ);
        $database = null; // clear db object
    
        $response->getBody()->write(json_encode($users));
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
$app->get('/users/info', function (Request $request, Response $response, $args) {
    $sql = "SELECT * FROM user_info";
 
    try {
      // Get DB Object
      $database = new DB();
  
      // connect to DB
      $conn = $database->connect();
  
      // query
      $stmt = $conn->query($sql);
      $users = $stmt->fetchAll(PDO::FETCH_OBJ);
      $database = null; // clear db object
  
      $response->getBody()->write(json_encode($users));
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