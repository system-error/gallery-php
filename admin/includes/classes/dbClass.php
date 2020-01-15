<?php


class DbClass
{
    public static function findAll(){
        return static::doTheQuery("SELECT * FROM " .static::$dbTable. " ");
    }

    public static function findThisQueryById($id){
        $theResultArray =  static::doTheQuery("SELECT * FROM " .static::$dbTable. " WHERE id ={$id} LIMIT 1");

        return !empty($theResultArray) ? array_shift($theResultArray) : false;
//        if(!empty($theResultArray)){
//            return $firstItem = array_shift($theResultArray);
//
//        }else{
//            return false;
//        }

    }

    public static function doTheQuery($sql){
        global $database;
        $object = array();
        $query = $database->query($sql);
        while($row = mysqli_fetch_array($query) ){

            $object[] = static::instantiation($row);
        }
        return $object;
    }

    private static function instantiation($result){
        $calledClass = get_called_class();
        $object = new $calledClass;
//      ------------------------------------------------
//        $object->id        = $result['id'];
//        $object->username  = $result['username'];
//        $object->firstName = $result['first_name'];
//        $object->lastName  = $result['last_name'];
//      ------------------------------------------------
        foreach ($result as $property => $value) {
            if ($object->hasTheProperty($property)) {
                $object->$property = $value;
            }
        }
        return $object;
    }

    private function hasTheProperty($property){
        $objectProperties = get_object_vars($this);
        return array_key_exists($property,$objectProperties);
    }

    protected function properties(){
        //return get_object_vars($this); // takes the properties of the class and put them in assoc array
        $properties = array();
        foreach (static::$dbTableFields as $dbField){
            if(property_exists($this,$dbField)){
                $properties[$dbField] = $this->$dbField;
            }
        }

        return $properties;
    }

    protected function escapedProperties(){
        global $database;

        $propertyEscaped = array();

        foreach ($this->properties() as $key => $value){
            $propertyEscaped[$key] = $database->escapeString($value);
        }
        return $propertyEscaped;
    }

    public function save(){
        return isset($this->id) ? $this->update() : $this->create();
    }

    public function create(){
        global $database;
        $props = $this->escapedProperties();
        $query = "INSERT INTO " .static::$dbTable. " (" . implode(",",array_keys($props)). ") ";
        $query .="VALUES ('". implode("' , '", array_values($props)). "')";

//        $query .= $database->escapeString($this->username) . "','";
//        $query .= $database->escapeString($this->password) . "','";
//        $query .= $database->escapeString($this->first_name) . "','";
//        $query .= $database->escapeString($this->last_name) . "')";

        if($database->query($query)){
            $this->id = $database->theInsertId();
            return true;
        }else{
            return false;
        }
    }

    public function update(){
        global $database;
        $props = $this->escapedProperties();
        $propertiesArray = array();

        foreach ($props as $key=>$value){
            $propertiesArray[]="{$key}='{$value}'";
        }

        $query = "UPDATE " .static::$dbTable. " SET ";
        $query .= implode(", ",$propertiesArray);
//        $query .="username='". $database->escapeString($this->username) . "', ";
//        $query .="password='". $database->escapeString($this->password) . "', ";
//        $query .="first_name='". $database->escapeString($this->first_name) . "', ";
//        $query .="last_name='". $database->escapeString($this->last_name) . "' ";
        $query .=" WHERE id=". $database->escapeString($this->id);

        $database->query($query);
        return (mysqli_affected_rows($database->connection) == 1 ? true : false);
    }

    public function delete(){
        global $database;
        $query = "DELETE FROM " .static::$dbTable. "  ";
        $query .= "WHERE id= ". $database->escapeString($this->id);
        $query .= " LIMIT 1";

        $database->query($query);
        return (mysqli_affected_rows($database->connection) == 1 ? true : false);
    }

}