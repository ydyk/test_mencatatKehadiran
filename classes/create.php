<?php

//Req headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset:UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

//Req includes
include_once '../config/database.php';
include_once '../objects/Classes.php';

//Db conn and instances
$database = new Database();
$db=$database->getConnection();

$classes = new Classes($db);

//Get post data
$data = json_decode(file_get_contents("php://input"));

//set product values
$classes->id            = md5($data->id);
$classes->class_name    = $data->class_name;
$classes->class_time    = $data->class_time;
$classes->room          = $data->room;
$classes->created_at    = date('Y-m-d H:i:s');
$classes->updated_at    = date('Y-m-d H:i:s');

//Create product
if($classes->create()){
    echo '{';
        echo '"message": "Class was created."';
    echo '}';
}else{
    echo '{';
        echo '"message": "Unable to create class."';
    echo '}';
}
