<?php
    spl_autoload_register(function($class){
        require "../../classes/" .$class . ".class.php";
    });
    $dbcon = new dbcon();



    if(str_contains($_SERVER["HTTP_REFERER"],"editCountryForm.php?id_country")){
        $values = ["nom"=> $_POST["nom"],"population"=>$_POST["population"],"langues"=>$_POST["langues"]];
        $dbcon->Update("pays",$values,"id_pays",$_POST["id"],"int");
        header("location: ../adminDashboard.php");
        exit;
    }else if(str_contains($_SERVER["HTTP_REFERER"],"editCityForm.php?id_ville=")){
        $values = ["nom" => $_POST["nom"],"description" => $_POST["description"],"type" => $_POST["type"]];
        $dbcon->Update("ville",$values,"id_ville",$_POST["id"],"int");

        header("location: ../adminDashboard.php");
        exit;
    }else if(str_contains($_SERVER["HTTP_REFERER"],"editContinentForm.php?id_continent=")){
        $values = ["name" => $_POST["name"]];
        $dbcon->Update("continent",$values,"id_continent",$_POST["id"],"int");

        header("location: ../adminDashboard.php");
        exit;
    }

?>