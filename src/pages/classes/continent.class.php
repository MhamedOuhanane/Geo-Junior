<?php

    spl_autoload_register(function($class){
        require "pages/classes/". $class . ".class.php";
    });

    class continent {
        public $id_continent;
        public $nom;
        public $nombrePays;

        // verifier l'existance d'un continent ou ses pays
        private function RECHCONTINENT($id){
            $dbcon = new dbcon();

            $pays = $dbcon->selectWhere('pays', 'id_continent', $id, 'int');
            $this->nombrePays = count($pays);

            if ($pays == NULL) {
                echo 'pointer-events-none';
            } else {
                
                if ($this->nombrePays == 0) {
                    echo 'pointer-events-none';
                } else {
                    echo 'hover:scale-110';
                };
            };
        }

        // return id d'un continent dans database s'il existe
        public function IdConti($name){
            $dbcon = new dbcon();
            if ($dbcon->selectWhere('continent', 'name', $name, 'string') != NULL){
                $conti = $dbcon->selectWhere('continent', 'name', $name, 'string');
                return $conti[0]['id_continent'];
            } else {
                return 0;
            }
        }

        // afficher les continents
        public function AfficherUser(){
            
            echo '<div id="Continents" class="w-full h-full flex flex-wrap justify-evenly place-content-center ">
                    <a class="w-[34%] h-[40%] '. $this->RECHCONTINENT($this->IdConti('North Amirica')) .'" href="index.php?FiltreP=North+Amirica">    
                        <img class="w-full h-full" src="src/assets/images/NA-Map.png" alt="Map NA">
                    </a>

                    <a class="w-[20%] h-[30%] mt-4 '. $this->RECHCONTINENT($this->IdConti('Europe')) .'" href="index.php?FiltreP=Europe">
                        <img class="w-full h-full" src="src/assets/images/Europe-Map.png" alt="Map Europe">
                    </a>

                    <a class="w-[38%] h-[40%] '. $this->RECHCONTINENT($this->IdConti('Asia')) .'" href="index.php?FiltreP=Asia">
                        <img class="w-full h-full" src="src/assets/images/Asia-Map.png" alt="Map Asia">
                    </a>

                    <a class="w-[20%] h-[40%] '. $this->RECHCONTINENT($this->IdConti('South Amirica')) .'" href="index.php?FiltreP=South+Amirica">
                        <img class="w-full h-full" src="src/assets/images/SA-Map.png" alt="Map SA">
                    </a>

                    <a class="w-[30%] h-[45%] '. $this->RECHCONTINENT($this->IdConti('Africa')) .'" href="index.php?FiltreP=Africa">
                        <img class="w-full h-full" src="src/assets/images/Africa-Map.png" alt="Map Africa">
                    </a>

                    <a class="w-[15%] h-[20%] '. $this->RECHCONTINENT($this->IdConti('Oceania')) .'" href="index.php?FiltreP=Oceania">
                        <img class="w-full h-full" src="src/assets/images/Oceania-Map.png" alt="Map Oceania">
                    </a>
                </div>';
        } 
    }

?>