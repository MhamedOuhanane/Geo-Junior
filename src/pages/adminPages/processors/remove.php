<?php
    spl_autoload_register(function($class){
        require "../../classes/" .$class . ".class.php";
    });
    $dbcon = new dbcon();


    isset($_GET["id_ville"]) ? $dbcon->deleteWhere("ville","id_ville",$_GET["id_ville"],"int") : 0;
    isset($_GET["id_pays"]) ? $dbcon->deleteWhere("pays","id_pays",$_GET["id_pays"],"int") :  0;
    isset($_GET["id_continent"]) ? $dbcon->deleteWhere("continent","id_continent",$_GET["id_continent"],"int") :  0;
    header("location: ../adminDashboard.php")
?>