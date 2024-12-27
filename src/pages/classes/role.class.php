<?php

spl_autoload_register(function($class){ require "pages/classes/". $class . ".class.php"; });

class roles{
    protected $id_use;
    protected $name;

    public function Authentification(){
        if (isset($_SESSION)) {
            $this->name = $_SESSION['role'];
            if ($this->name == 'User') {
                header('Location: C:/Users/ycode/Desktop/Briefs/Geo-Junior/src');
            } else if ($this->name == 'Admine') {
                header('Location: C:/Users/ycode/Desktop/Briefs/Geo-Junior/src/pages/adminPages');
            }
        } else {
            header('Location: C:/Users/ycode/Desktop/Briefs/Geo-Junior/src/pages/authentification');
        }
    }

}
?>