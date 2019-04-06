<?php

//Req headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset:UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

//Req includes
include_once '../config/database.php';
include_once '../objects/Attendances.php';

//Db conn and instances
$database = new Database();
$db=$database->getConnection();

$attendances = new Attendances($db);

//Get post data
$data = json_decode(file_get_contents("php://input"));
// echo '<pre>'; print_r($data); echo '</pre>';

if(empty($data->id_class)){
    echo '{';
        echo '"message": "Unable to create Attendances, please fill id_class"';
    echo '}';
    return;
}
else
{
//set product values
$attendances->id            = md5($data->id);
$attendances->id_class      = $data->id_class;
$attendances->name          = $data->name;
$attendances->phone         = $data->phone;
$attendances->created_at    = date('Y-m-d H:i:s');
$attendances->updated_at    = date('Y-m-d H:i:s');

//Create product
if($attendances->create()){
    echo '{';
        echo '"message": "Attendances was created."';
    echo '}';
}else{
    echo '{';
        echo '"message": "Unable to create Attendances."';
    echo '}';
}
}