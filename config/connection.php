<?php
class Database{
  
    // specify your own database credentials
    private $host = "localhost";                        //HOST here
    private $db_name = "id21003536_embedded_2020251";   //DATABASE NAME here
    private $username = "id21003536_angelorecio";       //USERNAME here
    private $password = "";                             //PASSWORD here
    public $conn;
  
    // get the database connection
    public function getConnection(){
  
        $this->conn = null;
  
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
  
        return $this->conn;
    }
}
