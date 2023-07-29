<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
// get database connection
include_once '../config/connection.php';
  
// instantiate product object
include_once '../model/Users.php';
  
$database = new Database();
$db = $database->getConnection();
  
$user = new Users($db);
  
// get posted data
$data = json_decode(file_get_contents("php://input"),true);
  
// make sure data is not empty
if(
    !empty($data->firstname) &&
    !empty($data->lastname) &&
    !empty($data->address) &&
    !empty($data->number)
){
  
    // set product property values
    $user->firstname = $data->firstname;
    $user->lastname = $data->lastname;
    $user->address = $data->address;
    $user->gender = $data->gender;
    $user->number = $data->number;
    $user->age = $data->age;
  
    // create the product
    if($user->create()){
  
        // set response code - 201 created
        http_response_code(201);
  
        // tell the user
        echo json_encode(array("message" => "Product was created."));
    }
  
    // if unable to create the product, tell the user
    else{
  
        // set response code - 503 service unavailable
        http_response_code(503);
  
        // tell the user
        echo json_encode(array("message" => "Unable to create product."));
    }
}
  
// tell the user data is incomplete
else{
  
    // set response code - 400 bad request
    http_response_code(400);
  
    // tell the user
    echo json_encode(array("message" => "Unable to create product. Data is incomplete."));
}
?>