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
if (isset($_GET["id"])) {
    $id = $_GET["id"];
}

//place for making the object

//$cat = new Cat();
$courses = new Courses();
// switch to separate method 

switch ($method) {
    case 'GET':
        if (isset($id)) {
            $response = $courses->getCourseById($id);
            if (count($response) === 0) {
                $response = array("message" => "Hittade inte kursen");
                http_response_code(404);
            } else {
                http_response_code(200);
            }
        } else {
            $response = $courses->getCourses();
            if (count($response) === 0) {
                $response = array("message" => "Inga kurser i databasen");
                http_response_code(404);
            } else {
                http_response_code(200);
            }
        }

        break;

    case 'POST':
        // transpile json data to an object
        $data = json_decode(file_get_contents("php://input"), true);
        // check conditions on the setters, if ok try to create entry in db
        if ($courses->setCourseId($data['id']) && ($courses->setcourseName($data['name'])) && ($courses->setProgression($data['progression'])) && ($courses->setSyllabus($data['syllabus']))) {

            // create a course 
            if ($courses->createCourse()) {
                $response = array("message" => "Kursen tillagd!");
                http_response_code(201);
            } else {
                // server error
                http_response_code(500);
                $response = array("message" => "Fel vid lagring av kurs!");
            }
        } else {
            // something went wrong in the setters, user made error
            $response = array("message" => "Skicka med kursid, kursnamn, progression och länk till kursplanen!");
            http_response_code(400);
        }
        break;
    case 'PUT':
        // guard for unset id 
        if (!isset($id)) {
            http_response_code(400);
            $response = array("message" => "Ogiltig redigering, id behövs!");
        } else {
            // transpile json data to an object
            $data = json_decode(file_get_contents("php://input"), true);
            // check conditions on the setters, if ok try to create entry in db
            if ($courses->setCourseId($data['id']) && ($courses->setcourseName($data['name'])) && ($courses->setProgression($data['progression'])) && ($courses->setSyllabus($data['syllabus']))) {
                // check if id is valid
                if (!$courses->checkCourse($id)) {
                    $response = array("message" => "Kan inte hitta kursen som ska redigeras");
                    http_response_code(400);
                } else {
                    // edit course 
                    if ($courses->updateCourse($id)) {
                        $response = array("message" => "Kursen är nu redigerad!");
                        http_response_code(201);
                    } else {
                        $response = array("message" => "Fel vid redigeringen!");
                        http_response_code(500);
                    }
                }
            } else {
                // something went wrong in the setters, user made error
                $response = array("message" => "Skicka med kursid, kursnamn, progression och länk till kursplanen!");
                http_response_code(400);
            }
        }
        break;
    case 'DELETE':
        if (!isset($id)) {
            http_response_code(400);
            $response = array("message" => "Ogiltig borttagning, id behövs!");
        } else {
            if (!$courses->checkCourse($id)) {
                $response = array("message" => "Kan inte hitta kursen som ska tas bort");
                http_response_code(400);
            } else {
                // edit course 
                if ($courses->deleteCourse($id)) {
                    $response = array("message" => "Kursen är nu borttagen!");
                    http_response_code(201);
                } else {
                    $response = array("message" => "Fel vid borttagning!");
                    http_response_code(500);
                }
            }
        }

        break;
}

// give response back to query
echo json_encode($response);
