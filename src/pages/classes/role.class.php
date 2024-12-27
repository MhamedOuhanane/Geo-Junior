<?php

spl_autoload_register(function($class){ require "pages/classes/". $class . ".class.php"; });

class role{
    protected $id_role;
    protected $nameRole;

    public function Authentification($condition, $conditionUser,$conditionAdmine){
        $realpath = realpath(__DIR__.'/../src');
        if (!empty($_SESSION)) {
            
            $this->nameRole = $_SESSION['role'];
            if ($this->nameRole == 'User') {
                if ($conditionUser) {
                    header("Location: $realpath/Geo-Junior/src");
                    exit;
                }
            } else if ($this->nameRole == 'Admine') {
                if ($conditionAdmine) {
                    header("Location: $realpath/Geo-Junior/src/pages/adminPages/adminDashboard.php");
                    exit;
                }
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