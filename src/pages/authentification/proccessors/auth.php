<?php

    spl_autoload_register(function($class){
        require "../../classes/". $class . ".class.php";
    });

    
    $user = new user();

    if (isset($_POST['emailInscr'])) {
        $user->setUser($_POST['username'], $_POST['emailInscr'], $_POST['password'], 'User');
        $user->inscription();
    } else if (isset($_POST['emailConnex'])) {
        $user->setUser("", $_POST['emailConnex'], $_POST['password'], "");
        $user->connexion();
    } 

?>