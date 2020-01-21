<?php
require_once(INCLUDES_PATH."/new_config.php");

class Database{
    public $connection;
    function __construct(){
        $this->openDbConnection();
    }

    public function openDbConnection(){
//        $this->connection = mysqli_connect(DB_HOST,DB_USER,BD_PASS,DB_NAME);
         $this->connection = new mysqli(DB_HOST,DB_USER,BD_PASS,DB_NAME);

        if ($this->connection->connect_errno){
            die("Database connection failed".$this->connection->connect_error);
        }
    }

    public function query($sql){
        $result = $this->connection->query($sql);

        return $this->confirmQuery($result);
    }

    private function confirmQuery($result){
        if(!$result){

            die("Query Failed ".$this->connection->error);
        }
        return $result;
    }

    public function escapeString($string){
        $escapedString =  $this->connection->real_escape_string($string);

        return $escapedString;
    }

    public function theInsertId(){
        return $this->connection->insert_id;
    }
}
$database = new Database();

