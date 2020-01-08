<?php

class Session{

    private $signedIn = false;
    public $userId;

    function __construct(){
        session_start();
        $this->checkTheLogin();
    }

    public function isLoggedIn(){
        return $this->signedIn;
    }

    public function login($user){
        if($user){
            $this->userId = $_SESSION['user_id'] = $user->id;
            $this->signedIn = true;
        }
    }

    public function logout($user){
        unset($_SESSION['user_id']);
        unset($this->userId);
        $this->signedIn = false;

    }

    private function checkTheLogin(){

        if(isset($_SESSION['id'])){
            $this->userId = $_SESSION['user_id'];
            $this->signedIn = true;
        }else{
            unset($this->userId);
            $this->signedIn = false;
        }
}

}

$session = new Session();