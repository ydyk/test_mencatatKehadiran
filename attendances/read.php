<?php
/**
 *  file that will output JSON data based from "categories" database records.
 */

//Required headers

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

//Include db and object

include_once '../config/database.php';
include_once '../objects/Attendances.php';
include_once '../objects/Classes.php';

//New instances

$database = new Database();
$db = $database->getConnection();
$idclass = isset($_GET['idclass']) ? $_GET['idclass'] : '';


//==============================================
//===================attendent====================
//==============================================
$attendances = new Attendances($db);
$sql_idclass = '';
if (!empty($idclass)) {
    $sql_idclass = ' where id_class = \''.$idclass.'\' ';
}
else{
    echo json_encode(
        array("message" => "No attendaces found.")
    );
    return;
}
//query cats
$stmt = $attendances->readAll($sql_idclass);
$num = $stmt->rowCount();

$attendaces_arr=array();
$attendaces_arr["attendances"]=array();

if($num>0){

    while($row=$stmt->fetch(PDO::FETCH_ASSOC)){

        extract($row);

        $attendances=array(
            "id" => $id,
            "id_class" => $id_class,
            "name" => $name,
            "phone" => $phone,
            "created_at" => $created_at,
            "updated_at" => $updated_at
        );

        array_push($attendaces_arr["attendances"], $attendances);

    }
    // echo json_encode($categories_arr);
}else{
    echo json_encode(
        array("message" => "No attendaces found.")
    );
}
//attendent
//==============================================
//==============================================
//==============================================


//==============================================
//==================Claasss===================
//==============================================
$classes = new Classes($db);
$sql_id = '';
if (!empty($idclass)) {
    $sql_id = ' where id = \''.$idclass.'\' ';
}
else{
    echo json_encode(
        array("message" => "No attendaces found.")
    );
    return;
}
//query cats
$stmt = $classes->readAll($sql_id);
$num = $stmt->rowCount();


if($num>0){


    $categories_arr=array();
    $categories_arr["class"]=array();

    //retrieve tables
    while($row=$stmt->fetch(PDO::FETCH_ASSOC)){

        extract($row);

        $classes=array(
            "id" => $id,
            "class_name" => $class_name,
            "class_time" => $class_time,
            "room" => $room,
            "created_at" => $created_at,
            "updated_at" => $updated_at,
        );
        
        array_push($categories_arr["class"], array_merge($classes, $attendaces_arr));
    }

    echo json_encode($categories_arr);
}else{
    echo json_encode(
        array("message" => "No attendaces found.")
    );
}
//==============================================
//==================Claasss===================
//==============================================


