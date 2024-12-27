<?php

spl_autoload_register(function($class){ require "pages/classes/". $class . ".class.php"; });

class roles{
    protected $id_role;
    protected $nameRole;

    public function Authentification(){
        if (isset($_SESSION)) {
            $this->nameRole = $_SESSION['role'];
            if ($this->nameRole == 'User') {
                header('Location: C:/Users/ycode/Desktop/Briefs/Geo-Junior/src');
            } else if ($this->nameRole == 'Admine') {
                header('Location: C:/Users/ycode/Desktop/Briefs/Geo-Junior/src/pages/adminPages/adminDashboard.php');
            }
        } else {
            header('Location: C:/Users/ycode/Desktop/Briefs/Geo-Junior/src/pages/authentification/login.php');
        }
    }

}
?>