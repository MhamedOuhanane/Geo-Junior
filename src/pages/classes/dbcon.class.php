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
            switch ($table) {
                case 'continent':
                    $this->sql = "INSERT INTO continent(name) VALUES (";
                    break;
                
                case 'pays':
                    $this->sql = "INSERT INTO pays(nom,population,langues,id_continent) VALUES (";
                    break;
                
                case 'ville':
                    $this->sql = "INSERT INTO ville(nom, description, type, id_pays) VALUES (";
                    break;

                default:
                    return 0;
                    break;
            }

            foreach($values as $index=>$value){

                if ($value['type'] == 'int' ) {
                    
                    $this->sql .= $value['val'];
                } else if ($value['type'] == 'string') {
                    $this->sql .= "'" . $value['val'] . "'";
                }

                if (isset($values[$index + 1]['val'])) {
                    $this->sql .= ",";
                }

            }
            $this->sql .= ");";

            $this->data = self::connect()->query($this->sql);
        }
        public function deleteWhere($table,$columnName,$value,$valueType){
            $this->sql = "DELETE * FROM $table WHERE $columnName = ";
            if($valueType == "int"){
                $this->sql .= $value;
            }else if($valueType == 'string'){
                $this->sql .= "'".$value."'";
            }
            $this->data = self::connect()->query($this->sql);
        }
        public function Update($table,$values,$conditionColumn,$conditionValue,$type){
            $this->sql = "UPDATE $table SET ";
            foreach($values as $index=>$value){
                $this->sql .= $value["column"] . "=";
                if($value["type"] == "int"){
                    $this->sql .= $value["val"];
                }else if($value["type"] == "string"){
                    $this->sql .="'".$value["val"]."'";
                }
                if (isset($values[$index + 1])) {
                    $this->sql .= ", ";
                }
            }

            $this->sql .="WHERE $conditionColumn = ";
            if($type == "int"){
                $this->sql .= $conditionValue . ";";
            }else if($type == "string"){
                $this->sql .= "'".$conditionValue."';";
            }
            self::connect()->query($this->sql);
        }
        

    }
?>