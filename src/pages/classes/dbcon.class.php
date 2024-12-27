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

        public function selectWhere(string $table,$columnName,$value,$valueType){
            $this->sql = "SELECT * FROM $table WHERE $columnName = ";
            if($valueType == "int"){
                $this->sql .= $value;
            }else if($valueType == 'string'){
                $this->sql .= "'".$value."'";
            }
            $this->data = self::connect()->query($this->sql);
            $this->data = $this->data->fetchAll(PDO::FETCH_ASSOC);
            return $this->data;
        }
        
        public function Insert($table, $values){
            $columns = "";
            $placeholders = "";
            foreach($values as $key=>$value){
                $columns .= $key.",";
                $placeholders .= ":" . $key . ", ";
            }
            $columns = rtrim($columns,", ");
            $placeholders = rtrim($placeholders,", ");
            $this->sql = "INSERT INTO $table($columns) VALUES($placeholders)";
            $this->data = self::connect()->prepare($this->sql);
            foreach($values as $key=>$value){
                $type = is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR;
                $this->data->bindValue(":" . $key, $value, $type);
            }
            $this->data->execute();
        }
        public function deleteWhere($table,$columnName,$value,$valueType){
            $this->sql = "DELETE FROM $table WHERE $columnName = ";
            if($valueType == "int"){
                $this->sql .= $value;
            }else if($valueType == 'string'){
                $this->sql .= "'".$value."'";
            }
            $this->data = self::connect()->query($this->sql);
        }
        public function Update($table,$values,$conditionColumn,$conditionValue,$type){
            $columns = "";

            foreach ($values as $key => $value) {
                $columns .= $key . " = :" . $key . ", ";
            }
            
    
            $columns = rtrim($columns, ", ");
            
           
            $this->sql = "UPDATE $table SET $columns WHERE $conditionColumn = :conditionValue";
            
            $stmt = self::connect()->prepare($this->sql);
            
            foreach ($values as $key => $value) {
                $typeParam = is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR;
                $stmt->bindValue(":" . $key, $value, $typeParam);
            }
            var_dump($stmt);
            $conditionParam = ($type == "int") ? PDO::PARAM_INT : PDO::PARAM_STR;
            $stmt->bindValue(":conditionValue", $conditionValue, $conditionParam);
            $stmt->execute();
            
        }
        public function selectCount($table){
            $this->sql = "SELECT COUNT(*) FROM $table";
            $this->data = self::connect()->query($this->sql);
            $this->data = $this->data->fetch(PDO::FETCH_ASSOC);
            return $this->data["COUNT(*)"];
        }
    }
?>