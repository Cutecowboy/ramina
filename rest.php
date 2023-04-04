<?php

include_once("config.php");

// headers settings 
// allow all to the webservice
header('Access-Control-Allow-Origin: *');
// Webservice sends data in JSON format
header('Content-Type: application/json');
// what methods are allowed
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE');
//Allow for CORS
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

// check which method that is sent to the server
$method = $_SERVER["REQUEST_METHOD"];

// check if id is set 
if(isset($_GET["id"])){
    $id = $_GET["id"];
}

//place for making the object

//$cat = new Cat();
$courses = new Courses();
// switch to separate method 

switch ($method) {
    case 'GET':
        $response = $courses->getCourses();
        if(count($response) === 0){
            $response = array("message" => "Inga kurser i databasen");
            http_response_code(404);
        } else {
            http_response_code(200);
        }

        break;
    
    case 'POST':
        # code...
        break;
    case 'PUT':
        break;
    case 'DELETE':
        break;
}

// give response back to query
echo json_encode($response);