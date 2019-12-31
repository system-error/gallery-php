<?php
require_once ("new_config.php");

class Database{
    public $connection;
    function __construct(){
        $this->openDbConnection();
    }

    public function openDbConnection(){
        $this->connection = mysqli_connect(DB_HOST,DB_USER,BD_PASS,DB_NAME);

        if (mysqli_connect_errno()){
            die("Database connection failed".mysqli_error());
        }

    }

    public function query($sql){
        $result = mysqli_query($this->connection,$sql);
        return $result;
    }

    private function confirmQuery($result){
        if(!$result){
            die("Query Failed");
        }
    }

    public function escapeString($string){
        $escapedString =  mysqli_real_escape_string($this->connection,$string);

        return $escapedString;
    }
}
$database = new Database();
