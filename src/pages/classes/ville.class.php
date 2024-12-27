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
            echo    '<div class="carteVille bg-blue-200 bg-opacity-80 rounded-sm w-[10rem] h-[11rem] md:w-[12rem] md:h-[15rem] grid grid-rows-[20%_45%_10%_15%] items-center justify-items-center gap-y-[2%] hover:scale-[1.02]">
                    <span class="row-span-1 md:text-[1.4rem] font-bold">' . htmlspecialchars($this->nom) . '</span>
                    <span class="text-xs md:text-sm text-center w-[96%]">' . htmlspecialchars($this->description) . '</span>
                    <div class="row-span-1">
                        <span class="text-xs md:text-sm">Type :</span>
                        <span class="text-xs md:text-[0.9rem] font-bold">' . htmlspecialchars($this->type) . '</span>
                    </div>
                    <div class="row-span-1 flex justify-center gap-[10%]">
                        <span class="text-xs md:text-[0.9rem] font-bold">' . htmlspecialchars($_GET['FiltreV']) . '</span>
                        <img class="w-[20%]" src =' . $this->FILTRENAME($_GET['FiltreV']) . ' alt="Logo de Maroc">
                    </div>
                </div>';
        }
        function afficherAdmin(){
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
                                    <div class="text-sm leading-5 font-medium text-gray-900 text-center">'.$this->type.'</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium flex justify-end gap-4">
                            <a href="formPages/editCityForm.php?id_ville='.$this->id_ville.'" class="text-green-600 hover:text-indigo-900">Edit</a>
                            <a href="delete.php?id_country='.'" class="text-red-500 hover:text-indigo-900">delete</a>
                        </td>
                    </tr>';
        }
    }
?>