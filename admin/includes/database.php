<?php
require_once("new_confing.php");

class Database {

    public $connection;

    function __contruct(){
        $this->open_db_connection();
    }
    public function open_db_connection(){
        $this->connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

        if (mysqli_connect_errno()) {
            die("Connection failed" . mysqli_error($this->connection));
        }
    
    }
  

    function query($sql){
        $result = mysqli_query($this->connection, $sql);
       
        return $result;
    }
    private function confirm_query($result){
        if (!$result){
            die("Query failed");
        }
    }
    public function escape_string($string){
        $escape_string = mysqli_real_escape_string($this->connection, $string);
        return $escape_string;
    }

}

$database = new Database();


?>