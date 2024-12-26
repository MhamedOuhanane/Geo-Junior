<?php

    spl_autoload_register(function($class){
        require "pages/classes/". $class . ".class.php";
    });

    class continent {
        protected $id_continent;
        protected $nom;
        private $nombrePays;

        // verifier l'existance d'un continent ou ses pays
        public function RECHCONTINENT($tablepays){
            $this->nombrePays = count($tablepays);
            if ($tablepays == NULL) {
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
        public function Afficher(){
            $dbcon = new dbcon();
            
            echo '<div id="Continents" class="w-full h-full flex flex-wrap justify-evenly place-content-center <?php if (!empty($_GET)) { echo "hidden";} ?>">
                    <a class="w-[34%] h-[40%] '. $this->RECHCONTINENT($dbcon->selectWhere('pays', 'id_continent', $this->IdConti('North Amirica'), 'int')) .'" href="géographie.php?FiltreP=North+Amirica">    
                        <img class="w-full h-full" src="src/assets/images/NA-Map.png" alt="Map NA">
                    </a>

                    <a class="w-[20%] h-[30%] mt-4 '. $this->RECHCONTINENT($dbcon->selectWhere('pays', 'id_continent', $this->IdConti('Europe'), 'int')) .'" href="géographie.php?FiltreP=Europe">
                        <img class="w-full h-full" src="src/assets/images/Europe-Map.png" alt="Map Europe">
                    </a>

                    <a class="w-[38%] h-[40%] '. $this->RECHCONTINENT($dbcon->selectWhere('pays', 'id_continent', $this->IdConti('Asia'), 'int')) .'" href="géographie.php?FiltreP=Asia">
                        <img class="w-full h-full" src="src/assets/images/Asia-Map.png" alt="Map Asia">
                    </a>

                    <a class="w-[20%] h-[40%] '. $this->RECHCONTINENT($dbcon->selectWhere('pays', 'id_continent', $this->IdConti('South Amirica'), 'int')) .'" href="géographie.php?FiltreP=South+Amirica">
                        <img class="w-full h-full" src="src/assets/images/SA-Map.png" alt="Map SA">
                    </a>

                    <a class="w-[30%] h-[45%] '. $this->RECHCONTINENT($dbcon->selectWhere('pays', 'id_continent', $this->IdConti('Africa'), 'int')) .'" href="géographie.php?FiltreP=Africa">
                        <img class="w-full h-full" src="src/assets/images/Africa-Map.png" alt="Map Africa">
                    </a>

                    <a class="w-[15%] h-[20%] '. $this->RECHCONTINENT($dbcon->selectWhere('pays', 'id_continent', $this->IdConti('Oceania'), 'int')) .'" href="géographie.php?FiltreP=Oceania">
                        <img class="w-full h-full" src="src/assets/images/Oceania-Map.png" alt="Map Oceania">
                    </a>
                </div>';
        } 
    }

?>