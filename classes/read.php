<?php
/**
 *  file that will output JSON data based from "categories" database records.
 */

//Required headers

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

//Include db and object

include_once '../config/database.php';
include_once '../objects/Classes.php';

//New instances

$database = new Database();
$db = $database->getConnection();

$paramID = isset($_GET['idclass']) ? $_GET['idclass'] : '';

$classes = new Classes($db);
$param_id = '';
if (!empty($idclass)) {
    $param_id = ' where id = \''.$paramID.'\' ';
}

//query cats
$stmt = $classes->readAll($param_id);
$num = $stmt->rowCount();


if($num>0){

    $classes_arr=array();
    $classes_arr["data"]=array();

    //retrieve tables
    while($row=$stmt->fetch(PDO::FETCH_ASSOC)){

        extract($row);

        $class_item=array(
            "id" => $id,
            "class_name" => $class_name,
            "class_time" => $class_time,
            "room" => $room,
            "created_at" => $created_at,
            "updated_at" => $updated_at
        );

        array_push($classes_arr["data"], $class_item);
    }

    echo json_encode($classes_arr);
}else{
    echo json_encode(
        array("message" => "No classes found.")
    );
}
