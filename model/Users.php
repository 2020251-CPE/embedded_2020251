<?php
class Users{
  
    // database connection and table name
    private $conn;
    private $table_name = "users";
  
    // object properties
    public $id;
    public $firstname;
    public $lastname;
    public $address;
    public $gender;
    public $number;
    public $age;
  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    // read products
    function read(){
    
        // select all query
    $query = "SELECT * FROM " . $this->table_name ;
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }

  // create product
    function create(){
    
        // query to insert record
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                firstname=:firstname, address=:address, lastname=:lastname, gender=:gender, age=:age";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $this->firstname=htmlspecialchars(strip_tags($this->firstname));
        $this->address=htmlspecialchars(strip_tags($this->address));
        $this->lastname=htmlspecialchars(strip_tags($this->lastname));
        $this->gender=htmlspecialchars(strip_tags($this->gender));
        $this->age=htmlspecialchars(strip_tags($this->age));
    
        // bind values
        $stmt->bindParam(":firstname", $this->firstname);
        $stmt->bindParam(":address", $this->address);
        $stmt->bindParam(":lastname", $this->lastname);
        $stmt->bindParam(":gender", $this->gender);
        $stmt->bindParam(":age", $this->age);
    
        // execute query
        if($stmt->execute()){
            return true;
        }
    
        return false;
        
    } 
        // used when filling up the update product form
    function readOne(){
    
        // query to read single record
        $query = "SELECT
                    c.name as number, p.id, p.firstname, p.lastname, p.address, p.gender, p.age
                FROM
                    " . $this->table_name . " p
                    LEFT JOIN
                        categories c
                            ON p.gender = c.id
                WHERE
                    p.id = ?
                LIMIT
                    0,1";
    
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
    
        // bind id of product to be updated
        $stmt->bindParam(1, $this->id);
    
        // execute query
        $stmt->execute();
    
        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
        // set values to object properties
        $this->firstname = $row['firstname'];
        $this->address = $row['address'];
        $this->lastname = $row['lastname'];
        $this->gender = $row['gender'];
        $this->number = $row['number'];
} 
  
}
?>