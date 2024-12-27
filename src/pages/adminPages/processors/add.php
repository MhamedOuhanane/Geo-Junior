<?php

    spl_autoload_register(function($class){
        require "../../classes/" .$class . ".class.php";
    });

    $dbcon = new dbcon();

    if(str_contains($_SERVER["HTTP_REFERER"],"addContinentForm.php")){
        $values = ["name"=> $_POST["name"]];
        $dbcon->Insert("continent",$values);
        header("location: ../adminDashboard.php");
        exit;
    }else if(str_contains($_SERVER["HTTP_REFERER"],"addCountryForm.php")){
        $values = ["nom"=>$_POST["nom"],"population"=>$_POST["population"],"langues"=>$_POST["langues"],"id_continent"=>$_GET["id_continent"]];
        $dbcon->Insert("pays",$values);
        $id = $_GET["id_continent"];
        header("location: ../adminDashboard.php?id_continent=$id");
        exit;
    }else if(str_contains($_SERVER["HTTP_REFERER"],"addCityForm.php")){
        $id = $_GET["id_pays"];
        $values = ["nom"=>$_POST["nom"],"description"=>$_POST["description"],"type"=>$_POST["type"],"id_pays"=>$id];
        $dbcon->Insert("ville",$values);
        header("location: ../adminDashboard.php?id_pays=$id");
        exit;
    }

?>