<?php
/**
 * contains properties and methods for "category" database queries.
 */

class Classes
{
    //db conn and table
    private $conn;
    private $table_name = "classes";

    //object properties
    public $id;
    public $class_name;
    public $class_time;
    public $room;
    public $created_at;
    public $updated_at;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    //used by select drop-down list
    public function readAll($sql_id){

        $query = "SELECT
                   *
                  FROM " . $this->table_name . $sql_id  . " ORDER BY id";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;

    }

    // //used by select drop-down list
    // public function read(){

    //     $query = "SELECT
    //                 id, name, description
    //              FROM " . $this->table_name . "
    //              ORDER BY id";

    //     $stmt=$this->conn->prepare($query);
    //     $stmt->execute();

    //     return $stmt;
    // }

    public function create(){

        //query insert
        $query = "INSERT INTO
                  ". $this->table_name ."
                  SET
                    id=:id, 
                    class_name=:class_name, 
                    class_time=:class_time, 
                    room=:room, 
                    created_at=:created_at, 
                    updated_at=:updated_at";
    
        //Prepare
        $stmt = $this->conn->prepare($query);
    
        //sanitize
        $this->id=htmlspecialchars(strip_tags($this->id));
        $this->class_name=htmlspecialchars(strip_tags($this->class_name));
        $this->class_time=htmlspecialchars(strip_tags($this->class_time));
        $this->room=htmlspecialchars(strip_tags($this->room));
        $this->created_at=htmlspecialchars(strip_tags($this->created_at));
        $this->updated_at=htmlspecialchars(strip_tags($this->updated_at));
    
        //Bind values
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":class_name", $this->class_name);
        $stmt->bindParam(":class_time", $this->class_time);
        $stmt->bindParam(":room", $this->room);
        $stmt->bindParam(":created_at", $this->created_at);
        $stmt->bindParam(":updated_at", $this->updated_at);
    
        //execute
        if($stmt->execute()){
            return true;
        }
        return false;
    }
}
