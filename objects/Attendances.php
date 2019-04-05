<?php
/**
 * contains properties and methods for "category" database queries.
 */

class Attendances
{
    //db conn and table
    private $conn;
    private $table_name = "attendances";

    //object properties
    public $id;
    public $name;
    public $phone;
    public $created_at;
    public $updated_at;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    //used by select drop-down list
    public function readAll($idclass){

        $query = "SELECT
                   *
                  FROM " . $this->table_name . $idclass  ." ORDER BY id";

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
                    name=:name, 
                    id_class=:id_class, 
                    phone=:phone,
                    created_at=:created_at, 
                    updated_at=:updated_at";
    
        //Prepare
        $stmt = $this->conn->prepare($query);
    
        //sanitize
        $this->id=htmlspecialchars(strip_tags($this->id));
        $this->id_class=htmlspecialchars(strip_tags($this->id_class));
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->phone=htmlspecialchars(strip_tags($this->phone));
        $this->created_at=htmlspecialchars(strip_tags($this->created_at));
        $this->updated_at=htmlspecialchars(strip_tags($this->updated_at));
    
        //Bind values
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":id_class", $this->id_class);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":phone", $this->phone);
        $stmt->bindParam(":created_at", $this->created_at);
        $stmt->bindParam(":updated_at", $this->updated_at);
    
        //execute
        if($stmt->execute()){
            return true;
        }
        return false;
    }
}
