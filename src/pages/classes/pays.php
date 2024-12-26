<?php


    spl_autoload_register(function($class){
        require "pages/classes/". $class . ".class.php";
    });

    class pays extends continent{
        protected $id_pays;
        private $population;
        private $langues;

        // fonction de rechercher le src du pays
        function FILTRENAME(){
            $JsonPays = file_get_contents('src/assets/data/PaysAfrica.json');
            $JsonPays = json_decode($JsonPays, true);
            foreach($JsonPays as $Element){
                if ($Element['name'] == $this->nom) {
                    return $Element['img_src'];
                }
            }
        }

        // fonction verifier l'existance des villes d'un pays
        function RECHVILLE() {
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
            
            $dbcon = new dbcon();
            echo    '<a class="'. $this->RECHVILLE() .'" href= "géographie.php?FiltreV='. htmlspecialchars($this->nom) .'">
                    <div class="cartePays bg-orange-50 bg-opacity-80 rounded-sm w-[10rem] h-[11rem] md:w-[12rem] md:h-[13.5rem] flex flex-col items-center place-content-center">
                        <img class="w-[60%]" src =' . $this->FILTRENAME() . ' alt="Logo de Maroc">
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
                            <span class="text-xs md:text-sm font-bold">' . htmlspecialchars($dbcon->selectWhere('continent', 'id_continent', $this->id_continent, 'int')[0]['name']) .'</span>
                            </div>
                        </div>
                    </a>';
        }

    }


?>