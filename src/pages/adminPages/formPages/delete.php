<?php
    spl_autoload_register(function($class){
        require "../../classes/" .$class . ".class.php";
    });

    $dbcon = new dbcon();
    if (isset($_GET['id_country'])) {
        $id_country = $_GET['id_country'];
        $dbcon->deleteWhere('pays', 'id_pays', $id_country, 'int');
            $message = "Le Pays est supprimer avec succés";
            header("Location: ../adminDashboard.php?id_continent=".$_GET['id_continent']."&message=$message");
            exit;
    } else if (isset($_GET['id_city'])) {
        $id_city = $_GET['id_city'];
        $dbcon->deleteWhere('ville', 'id_ville', $id_city, 'int');
            $message = "La Ville est supprimer avec succés";
            header("Location: ../adminDashboard.php?id_pays=".$_GET['id_pays']."&message=$message");
            exit;
    } else if (isset($_GET['id_continent'])) {
        $id_continent = $_GET['id_continent'];
        $dbcon->deleteWhere('continent', 'id_continent', $id_continent, 'int');
            $message = "Le Continent est supprimer avec succés";
            header("Location: ../adminDashboard.php?message=$message");
            exit;
    }
?>