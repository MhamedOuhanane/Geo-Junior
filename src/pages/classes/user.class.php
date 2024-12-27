<?php


    spl_autoload_register(function($class){ require "pages/classes/". $class . ".class.php"; });
    

    class user extends roles{
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
                $this->id_role = $roles['id_role'];
            } else {
                $this->id_role = NULL;
            }
        }

        public function getUser(){
            return [$this->email, $this->password];
        }

        public function userRole(){
            $dbcon = new dbcon();
            $role = $dbcon->selectWhere('role', 'id_role', $this->id_role, 'int');
            if ($role != NULL) {
                return $this->nameRole = $role['role'];
            }
        }

        public function connexion(){
            $dbcon = new dbcon();
            $users = $dbcon->selectWhere('user', 'Email', $this->email, 'string');
            if ($users != NULL) {
                if (password_verify($this->password, $users['Password'])) {
                    $this->id_role = $users['id_role'];

                    session_start();
                    $_SESSION['id_user'] = $this->id_user;
                    $_SESSION['role'] = $this->userRole();
                    $this->Authentification();
                } else {
                    $erreur = 'Le mot de pas est inccorect . ';
                    header('Location: C:/Users/ycode/Desktop/Briefs/Geo-Junior/src/pages/authentification/login.php?erreur='.$erreur);
                }
            } else {
                $erreur = 'Cette Compts n\'existe pas .';
                header('Location: C:/Users/ycode/Desktop/Briefs/Geo-Junior/src/pages/authentification/login.php?erreur='.$erreur);
            }
        }

        public function inscription(){
            $dbcon = new dbcon();
            $users = $dbcon->selectWhere('user', 'Email', $this->email, 'string');
            if ($users == NULL) {
                $password = password_hash($this->password, PASSWORD_BCRYPT);
                $utilisateur = [['val'=>$this->username, 'type'=>'string'], ['val'=>$this->email, 'type'=> 'string'], ['val'=>$password, 'type'=> 'string'], ['val'=>$this->id_role, 'type'=>'int']];
                
                
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