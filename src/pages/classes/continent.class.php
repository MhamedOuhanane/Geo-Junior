<?php

    spl_autoload_register(function($class){
        require "pages/classes/". $class . ".class.php";
    });

    class continent {
        public $id_continent;
        public $nom;
        public $nombrePays;

        // verifier l'existance d'un continent ou ses pays
        private function RECHCONTINENT($name){
            $dbcon = new dbcon();
            
            if ($dbcon->selectWhere('continent', 'name', $name, 'string') != NULL){
                $conti = $dbcon->selectWhere('continent', 'name', $name, 'string');
                $this->id_continent = $conti['id_continent'];
            } else {
                $this->id_continent = 0;
            }

            $pays = $dbcon->selectWhere('pays', 'id_continent', $this->id_continent, 'int');
            $this->nombrePays = count($pays);

            if ($pays == NULL) {
                return 'pointer-events-none';
            } else {
                
                if ($this->nombrePays == 0) {
                    return "pointer-events-none";
                } else {
                    return "hover:scale-110";
                };
            };
        }

        // afficher les continents
        public function AfficherUser(){
            
            echo '<div id="Continents" class="w-full h-full flex flex-wrap justify-evenly place-content-center ">';
    
            $continents = [
                'North America' => 'NA-Map.png',
                'Europe' => 'Europe-Map.png',
                'Asia' => 'Asia-Map.png',
                'South America' => 'SA-Map.png',
                'Africa' => 'Africa-Map.png',
                'Oceania' => 'Oceania-Map.png'
            ];
            
            foreach ($continents as $continent => $image) {
                echo '<a class="w-[34%] h-[40%] ' . $this->RECHCONTINENT($continent) . '" href="index.php?FiltreP=' . urlencode($continent) . '#container">
                            <img class="w-full h-full" src="assets/images/' . $image . '" alt="Map ' . $continent . '">
                        </a>';
            }
            
            echo '</div>';
        }
    } 
    

?>