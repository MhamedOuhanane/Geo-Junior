<?php

use function PHPSTORM_META\type;

    spl_autoload_register(function($class){
        require "classes" . $class . "class.php";
    });

    class ville extends pays{
        public $id_ville;
        public $description;
        public $type;


        function AfficherUser()
        {
            $dbcon = new dbcon();
            $namepays = $dbcon->selectWhere('pays', 'id_pays', $this->id_pays, 'int')[0]['nom'];
            echo    '<div class="carteVille bg-blue-200 bg-opacity-80 rounded-sm w-[10rem] h-[11rem] md:w-[12rem] md:h-[15rem] grid grid-rows-[20%_45%_10%_15%] items-center justify-items-center gap-y-[2%] hover:scale-[1.02]">
                    <span class="row-span-1 md:text-[1.4rem] font-bold">' . htmlspecialchars($this->nom) . '</span>
                    <span class="text-xs md:text-sm text-center w-[96%]">' . htmlspecialchars($this->description) . '</span>
                    <div class="row-span-1">
                        <span class="text-xs md:text-sm">Type :</span>
                        <span class="text-xs md:text-[0.9rem] font-bold">' . htmlspecialchars($this->type) . '</span>
                    </div>
                    <div class="row-span-1 flex justify-center gap-[10%]">
                        <span class="text-xs md:text-[0.9rem] font-bold">' . $namepays . '</span>
                        <img class="w-[20%]" src =' . $this->FILTRENAME($namepays) . ' alt="Logo de Maroc">
                    </div>
                </div>';
        }
    }
?>