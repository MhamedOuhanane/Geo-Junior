<?php
    spl_autoload_register(function($class){
        require "../../classes/" .$class . ".class.php";
    });
    $dbcon = new dbcon();



    if(str_contains($_SERVER["HTTP_REFERER"],"editCountryForm.php?id_country")){
        $values = [["column" => "nom", "val" => $_POST["nom"], "type" => "string"],["column"=>"population","val"=>$_POST["population"],"type"=>"int"],["column"=>"langues","val"=>$_POST["langues"],"type"=>"string"]];
        $dbcon->Update("pays",$values,"id_pays",$_POST["id"],"int");
        header("location: ../adminDashboard.php");
        exit;
    }

?>