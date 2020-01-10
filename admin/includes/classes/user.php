<?php


class User extends DdClass
{
    protected static $dbTable = "users";
    protected static $dbTableFields = array('username','password','first_name','last_name');
    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;


    public static function verifyUser($username, $password){
        global $database;
        $username = $database->escapeString($username);
        $password = $database->escapeString($password);

        $sql = "SELECT * FROM " .self::$dbTable. " WHERE ";
        $sql .= "username = '{$username}' ";
        $sql .= "AND password = '{$password}' ";
        $sql .= "LIMIT 1";

        $theResultArray =  self::doTheQuery($sql);
        return !empty($theResultArray) ? array_shift($theResultArray) : false;


    }



    protected function properties(){
        //return get_object_vars($this); // takes the properties of the class and put them in assoc array
        $properties = array();
        foreach (self::$dbTableFields as $dbField){
            if(property_exists($this,$dbField)){
                $properties[$dbField] = $this->$dbField;
            }
        }

        return $properties;
    }


}