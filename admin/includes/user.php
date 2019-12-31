<?php


class User
{
    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;


    public static function findAllUsers(){
        return self::doTheQuery("SELECT * FROM users");
    }

    public static function findTheUserById($id){
        return self::doTheQuery("SELECT * FROM users WHERE id ={$id}");
    }

    public static function doTheQuery($sql){
        global $database;
        $object = array();
        $query = $database->query($sql);
        while($row = mysqli_fetch_array($query) ){

            $object[] = self::instantiation($row);
        }
        return $object;
    }

    private static function instantiation($result){
        $object = new self();
//      ------------------------------------------------
//        $object->id        = $result['id'];
//        $object->username  = $result['username'];
//        $object->firstName = $result['first_name'];
//        $object->lastName  = $result['last_name'];
//      ------------------------------------------------
        foreach ($result as $property => $value) {
            if ($object->hasThePropery($property)) {
                $object->$property = $value;
            }
        }
        return $object;
    }

    private function hasThePropery($property){
        $objectProperties = get_object_vars($this);
        return array_key_exists($property,$objectProperties);
    }
}