<?php

    function classAutoLoader($class){
        $class = strtolower($class);
        $thePath = "includes/classes/{$class}.php";

        if(is_file($thePath) && !class_exists($class)){
            require_once($thePath);
        }else{
            die("The file {$class}.php was not found");
        }
    }

    spl_autoload_register('classAutoLoader');

    function redirect($location){
        header("Location: {$location}");
    }
