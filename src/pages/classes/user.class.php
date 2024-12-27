<?php

use function PHPSTORM_META\type;

    spl_autoload_register(function($class){ require "pages/classes/". $class . ".class.php"; });
    

    class user extends roles{
        private $id_user;
        private $usename;
        private $email;
        private $password;

        public function setUser($email, $password){
            $this->email = $email;
            $this->password = $password;
        }

        public function getUser(){
            return [$this->email, $this->password];
        }

        public function userRole(){
            $dbcon = new dbcon();
            $role = $dbcon->selectWhere('role', 'id_role', $this->id_role, 'int');
            if ($role != NULL) {
                return $this->nameRole = $role[0]['role'];
            }
        }

        public function connexion(){
            $dbcon = new dbcon();
            $users = $dbcon->selectWhere('user', 'Email', $this->email, 'string');
            if ($users != NULL) {
                if (password_verify($this->password, $users[0]['Password'])) {
                    $this->id_role = $users[0]['id_role'];

                    session_start();
                    $_SESSION['id_user'] = $this->id_user;
                    $_SESSION['role'] = $this->userRole();
                    $this->Authentification();
                } else {
                    $erreur = 'Le mot de pas est inccorect . ';
                    header('Location: C:/Users/ycode/Desktop/Briefs/Geo-Junior/src/pages/authentification.login.php?erreur='.$erreur);
                }
            } else {
                $erreur = 'Cette Compts n\'existe pas .';
                header('Location: C:/Users/ycode/Desktop/Briefs/Geo-Junior/src/pages/authentification.login.php?erreur='.$erreur);
            }
        }

        public function inscription($username, $email, $password){
            $dbcon = new dbcon();
            $users = $dbcon->selectWhere('user', 'Email', $email, 'string');
            if ($users != NULL) {
                $password = password_hash($password, PASSWORD_BCRYPT);
                $urilisa = [['val'=>$username, 'type'=>'string'], ['val'=>$email, 'type'=> 'string'], ['val'=>$password, 'type'=> 'string']];
                $rqt =$dbcon->Insert('user', $urilisa);
                $message = "Le compts a ete crée avec succés.";
                header('Location: C:/Users/ycode/Desktop/Briefs/Geo-Junior/src/pages/authentification.login.php?erreur='.$message);
            } else {
                $erreur = "Ce compts est déjat éxicte .";
                header('Location: C:/Users/ycode/Desktop/Briefs/Geo-Junior/src/pages/authentification.register.php?erreur='.$erreur);
            }

        }


    }
?>