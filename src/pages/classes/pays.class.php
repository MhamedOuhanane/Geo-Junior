<?php


    spl_autoload_register(function($class){
        require "pages/classes/". $class . ".class.php";
    });

    class pays extends continent{
        public $id_pays;
        public $population;
        public $langues;

        // fonction de rechercher le src du pays
        public function FILTRENAME($namepays){
            $JsonPays = file_get_contents('C:/Users/ycode/Desktop/Briefs/Geo-Junior/src/assets/data/Pays.json');
            $JsonPays = json_decode($JsonPays, true);
            foreach($JsonPays as $Element){
                if ($Element['name'] == $namepays) {
                    return $Element['img_src'];
                }
            }
        }

        // fonction verifier l'existance des villes d'un pays
        public function RECHVILLE() {
            $dbcon = new dbcon();
            $virifierville = $dbcon->selectWhere('ville', 'id_pays', $this->id_pays, 'int');
            if ($virifierville == NULL) {
                return 'pointer-events-none';
            } else {
                return 'hover:scale-[1.02]';
            }
        }

        function AfficherUser()
        {
            
            echo    '<a class="'. $this->RECHVILLE() .'" href= "index.php?FiltreV='. htmlspecialchars($this->nom) .'#container">
                    <div class="bg-green-100 bg-opacity-60 rounded-sm w-[10rem] h-[11rem] md:w-[12rem] md:h-[13.5rem] flex flex-col items-center place-content-center p-2">
                        <img class="w-[60%]" src =' . $this->FILTRENAME($this->nom) . ' alt="Logo de Maroc">
                        <span class="md:text-[2vw] text-center">' . htmlspecialchars($this->nom) . '</span>
                        <div>
                            <span class="text-xs md:text-sm">Population :</span>
                            <span class="text-xs md:text-sm font-bold">' . htmlspecialchars($this->population) . '</span>
                        </div>
                        <div class="text-center">
                            <span class="text-xs md:text-sm">Langes :</span>
                            <span class="text-xs md:text-sm text-center font-bold">'. htmlspecialchars($this->langues) .'</span>
                        </div>
                        <div>
                            <span class="text-xs md:text-sm">Continent :</span>
                            <span class="text-xs md:text-sm font-bold">' . htmlspecialchars($_GET['FiltreP']) .'</span>
                            </div>
                        </div>
                    </a>';
        }

    }


?>