<?php


    spl_autoload_register(function($class){ require "pages/classes/". $class . ".class.php"; });
    

    class user extends role{
        private $id_user;
        private $username;
        private $email;
        private $password;

        public function setUser($username, $email, $password, $rolename){
            
            $dbcon = new dbcon();

            $this->username = $username;
            $this->email = $email;
            $this->password = $password;

            $roles = $dbcon->selectWhere("role", 'name', $rolename, 'string');
            if ($roles != null) {
                $this->id_role = $roles[0]['id_role'];
            } else {
                $this->id_role = 0;
            }
        }

        public function getUser(){
            return [$this->email, $this->password];
        }

        public function userRole(){
            $dbcon = new dbcon();
            $role = $dbcon->selectWhere('role', 'id_role', $this->id_role, 'int');
            if ($role != NULL) {
                return $this->nameRole = $role[0]['name'];
            }
        }

        public function connexion(){
            $dbcon = new dbcon();
            $realpath = realpath(__DIR__.'/../src');
            $users = $dbcon->selectWhere('user', 'Email', $this->email, 'string');
            if ($users != NULL) {
                if (password_verify($this->password, $users[0]['Password'])) {
                    session_start();
                    $this->id_role = $users[0]['id_role'];
                    $_SESSION['id_user'] = $this->id_user;
                    $_SESSION['role'] = $this->userRole();
                    $this->Authentification(true, true, true);
                } else {
                    $erreur = 'Le mot de pas est inccorect . ';
                    header("Location: $realpath/Geo-Junior/src/pages/authentification/login.php?erreur=$erreur");
                    exit;
                }
            } else {
                $erreur = 'Cette Compts n\'existe pas .';
                header("Location: $realpath/Geo-Junior/src/pages/authentification/login.php?erreur=$erreur");
                exit;
            }
        }

        public function inscription(){
            $dbcon = new dbcon();
            $users = $dbcon->selectWhere('user', 'Email', $this->email, 'string');
            if ($users == NULL) {
                $password = password_hash($this->password, PASSWORD_BCRYPT);
                $utilisateur = ['Username' => ['val'=>$this->username, 'type'=>'string'], 'Email' => ['val'=>$this->email, 'type'=> 'string'], 'Password' => ['val'=>$password, 'type'=> 'string'], 'id_role' => ['val'=>$this->id_role, 'type'=>'int']];
                
                
                if ($dbcon->Insert('user', $utilisateur)) {
                    $message = "Le compts a ete crée avec succés.";
                    header('Location: ../login.php?message='.$message);
                    exit;
                }
                
            } else {
                $erreur = "Ce compts est déjat éxicte .";
                header('Location: ../register.php?erreur='.$erreur);
                exit;
            }

        }


    }
?>