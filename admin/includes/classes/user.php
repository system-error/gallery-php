<?php


class User extends DbClass
{
    protected static $dbTable = "users";
    protected static $dbTableFields = array('username','password','first_name','last_name','userImage');
    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;
    public $userImage;
    public $tmpPath;
    public $placeHolder = "https://via.placeholder.com/150";
    public $uploadedFile = "images/user";


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

    public function imagePath(){
        return empty($this->userImage) ? $this->placeHolder : $this->uploadedFile.DS.$this->userImage;
    }

    public function deleteUser(){
        global $session;
        if($this->delete()){
            $targetPath = $this->uploadedFile.DS.$this->userImage;

            return unlink($targetPath) ? true : false;
        }else{
            return false;
        }
    }
    public function setFile($file){
        if(empty($file) || !$file || !is_array($file)){
            $this->customErrors[] = "There was no file uploaded here";
            return false;
        }elseif ($file['error'] !=0){
            $this->customErrors[] = $this->uploadErrors[$file['error']];
            return false;
        }else {
            $this->userImage = basename($file['name']);
            $this->tmpPath  = $file['tmp_name'];
        }
    }


    public function saveUserImage(){
        $photoPath = IMAGES_PATH . DS . 'user' . DS . $this->userImage;
        if($this->id){
//            if(!empty($this->customErrors)){
//                return false;
//            }
//            if(empty($this->userImage) || empty($this->tmpPath)){
//                $this->customErrors[] = "The file was not available ";
//                return false;
//            }
//
//            if(file_exists($photoPath)){
//                $this->customErrors[] = "The file {$this->userImage} already exists";
//                return false;
//            }
            if(move_uploaded_file($this->tmpPath,$photoPath)){
                if($this->update()){
                    unset($this->tmpPath);
                    return true;
                }
            }else{
                $this->customErrors[] = "The file directory propably does not have permisions";
                return false;
            }
        }else {
            if(!empty($this->customErrors)){
                return false;
            }
            if(empty($this->userImage) || empty($this->tmpPath)){
                $this->customErrors[] = "The file was not available ";
                return false;
            }

            if(file_exists($photoPath)){
                $this->customErrors[] = "The file {$this->userImage} already exists";
                return false;
            }
            if(move_uploaded_file($this->tmpPath,$photoPath)){
                if($this->create()){
                    unset($this->tmpPath);
                    return true;
                }
            }else{
                $this->customErrors[] = "The file directory propably does not have permisions";
                return false;
            }
        }
    }

    public function userAddValues(User $user){
        if ($user) {
            $user->username = $_POST['username'];
            $user->password = $_POST['password'];
            $user->first_name = $_POST['firstName'];
            $user->last_name = $_POST['lastName'];
        }
        return $user;
    }
}