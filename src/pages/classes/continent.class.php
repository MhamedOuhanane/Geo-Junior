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
                $this->id_continent = $conti[0]['id_continent'];
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
                echo '<a class="w-[30%] h-[40%] my-6 ' . $this->RECHCONTINENT($continent) . '" href="index.php?FiltreP=' . urlencode($continent) . '#container">

                            <img class="w-full h-full" src="assets/images/' . $image . '" alt="Map ' . $continent . '">
                        </a>';
            }
            
            echo '</div>';
        }

        public function afficherAdmin(){
                echo '<tr>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            <div class="flex items-center justify-center">
                                <div class="ml-4 ">
                                    <div class="text-sm leading-5 font-medium text-gray-900 text-center">'.$this->nom.'</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            <div class="flex items-center justify-center">
                                <div class="ml-4 ">
                                    <div class="text-sm leading-5 font-medium text-gray-900 text-center">'.$this->nombrePays.'</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium flex justify-end gap-4">
                            <a href="adminDashboard.php?id_continent='.$this->id_continent.'" class="text-green-600 hover:text-indigo-900">View</a>
                            <a href="./formPages/editContinentForm.php?id_continent='.$this->id_continent.'" class="text-blue-600 hover:text-indigo-900">Edit</a>
                            <a href="./formPages/delete.php?id_continent='.$this->id_continent.'" class="text-red-500 hover:text-indigo-900">delete</a>
                        </td>
                    </tr>';
            
            

        }

    } 
    

?>