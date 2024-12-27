<?php

spl_autoload_register(function($class){ require "pages/classes/". $class . ".class.php"; });

class roles{
    protected $id_role;
    protected $nameRole;

    public function Authentification($condition){
        $realpath = realpath(__DIR__.'/../src');
        if (isset($_SESSION)) {
            session_start();
            $this->nameRole = $_SESSION['role'];
            if ($this->nameRole == 'User') {
                header("Location: $realpath/Geo-Junior/src");
                exit;
            } else if ($this->nameRole == 'Admine') {
                header("Location: $realpath/Geo-Junior/src/pages/adminPages/adminDashboard.php");
            }
        } else {
            if ($condition) {
                header("Location: $realpath/Geo-Junior/src/pages/authentification/login.php");
                exit;
            }
        }
    }

}
?>