<?php
    spl_autoload_register(function($class){
        require "../../classes/". $class . ".class.php";
    });

    $user = new user();
    
    if (isset($_GET['logout'])) {
        session_start();
        session_reset();
        session_destroy();
        $user->Authentification(true, true,true);
    }
?>