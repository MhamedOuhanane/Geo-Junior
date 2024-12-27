<?php

    class dbcon{
        private $host = "localhost";
        private $username = "root";
        private $password = "";
        private $dbName = "geojunior";

        private $sql;
        private $data;

        public function connect(){
            try{
                $con = new PDO("mysql:host=$this->host;dbname=$this->dbName",$this->username,$this->password);
                $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $con;
            }catch(PDOException $e){
                echo "connection failed: " . $e->getMessage();
                return 0;
            }
        }
        
        public function selectAll($table){
            $this->sql = "SELECT * FROM $table";
            $this->data = self::connect()->query($this->sql);
            $this->data = $this->data->fetchAll(PDO::FETCH_ASSOC);
            return $this->data;
        }

        




    }
?>