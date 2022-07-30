<?php
    /* this file will be process all API requests regarding products */
    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;
    use Selective\BasePath\BasePathMiddleware;
    use Slim\Factory\AppFactory;

    // require auto load
    require __DIR__ . '/../../vendor/autoload.php';

    // require db connection file
    require __DIR__ . '/../models/db.php';
    // require user model
    require __DIR__ . '/../models/sign-in-user.php';

    if (isset($_POST["signUp"])) {
        $userName = $_POST["name"];
        $userSurname = $_POST["surname"];
        $userDisplayName = $_POST["displayName"];
        $userEmail = $_POST["email"];
        $userPassword = $_POST["password"];

        MD5($userPassword);
        htmlentities($userName && $userSurname && $userDisplayName);
        filter_var($userEmail, FILTER_SANITIZE_EMAIL);

        $app = AppFactory::create();

        // Add Slim routing middleware
        $app->addRoutingMiddleware();
        $app->add(new BasePathMiddleware($app));
        $app->addErrorMiddleware(true, true, true); 
        $app->addBodyParsingMiddleware();

        $app->post('/customers-data/add', function (Request $request, Response $response, array $args) {

            $sql = "INSERT INTO user_info(user_name, user_surname, user_displayname, user_email, user_password) VALUES (:userName, :userSurname, :userDisplayName, :userEmail, :userPassword);";
        
            try{
                $database = new DB();
            
                // connect to DB
                $conn = $database->connect();
            
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':userName', $userName);
                $stmt->bindParam(':userSurname', $userSurname);
                $stmt->bindParam(':userDisplayName', $userDisplayName);
                $stmt->bindParam(':userEmail', $userEmail);
                $stmt->bindParam(':userPassword', $userPassword);

            
                $result = $stmt->execute();
            
                $database = null;
                $response->(json_encode($result));
                return $response
                  ->withHeader('content-type', 'application/json')
                  ->withStatus(200);

                header("location: /sign-in.html");

            }
            catch (PDOException $e){
                $error = array(
                    "message" => $e->getMessage()
                );
                print_r($error)
                header("location: /sign-up.html");
            }
        });
    }
?>