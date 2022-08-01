<?php
    /* this file will be process all API requests regarding users */
    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;

    /* this is used to get all users */
    /* will be used for matching on sign in, display info based of username, etc (-- TO DO--)*/

    //ALL USERS
    $app->get('/user/info', function (Request $request, Response $response, $args) {
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
?>
