<?php

    spl_autoload_register(function($class){
        require "../classes/". $class . ".class.php";
    });

    $user = new user();
    session_start();
    $user->Authentification(true, true, false);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/input.css">
    <link rel="stylesheet" href="../../assets/css/output.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>admin Dashboard</title>
</head>
<body>
<div class="container flex flex-col mx-auto max-w-6xl">
    <div class="relative flex flex-wrap items-center justify-between w-[90%] bg-white group py-7 shrink-0 mx-auto">
      <div>
        <a href="#" class="text-3xl font-bold">GEO JUNIOR</a>
      </div>
      <div class="items-center hidden gap-8 md:flex">
        <a class="flex items-center px-4 py-2 text-sm font-bold rounded-xl bg-purple-100 text-gray-800 hover:bg-black hover:text-white  transition duration-300 cursor-pointer" href="../authentification/proccessors/logout.php?logout">
          Log out
        </a>
      </div>
      <button onclick="(() => { this.closest('.group').classList.toggle('open')})()" class="flex md:hidden">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
          <path d="M3 8H21C21.2652 8 21.5196 7.89464 21.7071 7.70711C21.8946 7.51957 22 7.26522 22 7C22 6.73478 21.8946 6.48043 21.7071 6.29289C21.5196 6.10536 21.2652 6 21 6H3C2.73478 6 2.48043 6.10536 2.29289 6.29289C2.10536 6.48043 2 6.73478 2 7C2 7.26522 2.10536 7.51957 2.29289 7.70711C2.48043 7.89464 2.73478 8 3 8ZM21 16H3C2.73478 16 2.48043 16.1054 2.29289 16.2929C2.10536 16.4804 2 16.7348 2 17C2 17.2652 2.10536 17.5196 2.29289 17.7071C2.48043 17.8946 2.73478 18 3 18H21C21.2652 18 21.5196 17.8946 21.7071 17.7071C21.8946 17.5196 22 17.2652 22 17C22 16.7348 21.8946 16.4804 21.7071 16.2929C21.5196 16.1054 21.2652 16 21 16ZM21 11H3C2.73478 11 2.48043 11.1054 2.29289 11.2929C2.10536 11.4804 2 11.7348 2 12C2 12.2652 2.10536 12.5196 2.29289 12.7071C2.48043 12.8946 2.73478 13 3 13H21C21.2652 13 21.5196 12.8946 21.7071 12.7071C21.8946 12.5196 22 12.2652 22 12C22 11.7348 21.8946 11.4804 21.7071 11.2929C21.5196 11.1054 21.2652 11 21 11Z" fill="black"/>
        </svg>
      </button>
      <div class="absolute flex md:hidden transition-all duration-300 ease-in-out flex-col items-start shadow-main justify-center w-full gap-3 overflow-hidden bg-white max-h-0 group-[.open]:py-4 px-4 rounded-2xl group-[.open]:max-h-64 top-full">
        <a class="flex items-center text-sm font-bold rounded-xl bg-purple-blue-100 text-purple-blue-600 hover:bg-purple-blue-600 hover:text-white transition duration-300" href="../../">Log out</a>
      </div>
    </div>
    <h3 class="text-gray-700 text-3xl font-medium">Dashboard</h3>

    <div class="mt-4">
        <div class="flex flex-wrap -mx-6">
            <a class="w-full px-6 sm:w-1/2 xl:w-1/3" href="admin.php">
                <div class="flex items-center px-5 py-6 shadow-sm rounded-md bg-white">
                    <div class="py-3 px-4 rounded-full bg-indigo-600 bg-opacity-75">
                        <i class="fa-solid fa-earth-africa text-white text-2xl"></i>
                    </div>
                    <div class="mx-5">
                        <h4 class="text-2xl font-semibold text-gray-700">100</h4>
                        <div class="text-gray-500">Total continents</div>
                    </div>
                </div>
            </a>
            <a class="w-full px-6 sm:w-1/2 xl:w-1/3" href="admin.php">
                <div class="flex items-center px-5 py-6 shadow-sm rounded-md bg-white">
                    <div class="py-3 px-4 rounded-full bg-indigo-600 bg-opacity-75">
                        <i class="fa-solid fa-flag text-white text-2xl"></i>
                    </div>
                    <div class="mx-5">
                        <h4 class="text-2xl font-semibold text-gray-700">100</h4>
                        <div class="text-gray-500">Total countries</div>
                    </div>
                </div>
            </a>

            <div class="w-full mt-6 px-6 sm:w-1/2 xl:w-1/3 sm:mt-0">
                <div class="flex items-center px-5 py-6 shadow-sm rounded-md bg-white">
                    <div class="py-3 px-4 rounded-full bg-orange-600 bg-opacity-75">
                        <i class="fa-solid fa-city text-2xl text-white"></i>
                    </div>
                    <div class="mx-5">
                        <h4 class="text-2xl font-semibold text-gray-700">200</h4>
                        <div class="text-gray-500">Total cities</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
    if(isset($_GET["id_continent"])) echo '<span class="font-bold text-3xl mx-5 mt-4">Pays</span>';
    else if(isset($_GET["id_pays"])) echo '<span class="font-bold text-3xl mx-5 mt-4">Villes</span>';
    else echo '<span class="font-bold text-3xl mx-5 mt-4">Continents</span>';
    
    spl_autoload_register(function($class){
      require "../classes/". $class . ".class.php";
    });
    $dbcon = new dbcon();

    ?>

    <div class="flex flex-col mt-8">
    <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
        <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
            <table class="w-full">
              
            <?php
            
            if(isset($_GET["id_continent"])){
              echo'<thead>
                    <tr class="bg-gray-100 ">
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50">Name</th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50">population</th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50">langues</th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-2xl text-end"><a href="formPages/addCountryForm.php">+</a></th>
                    </tr>
                    </thead>
                    <tbody class="bg-white">';
              $data = $dbcon->selectWhere("pays","id_continent",$_GET["id_continent"],"int");
              foreach($data as $el){
                $pays = new pays();
                $pays->id_pays = $el["id_pays"];
                $pays->nom = $el["nom"];
                $pays->population = $el["population"];
                $pays->langues = $el["langues"];
                $pays->afficherAdmin();
              }
              
            }else if(isset($_GET["id_pays"])){
                  echo'<thead>
                  <tr class="bg-gray-100 ">
                      <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Name</th>
                      <th class="px-6 py-3 border-b border-gray-200 bg-gray-50">type</th>
                      <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-2xl text-end"><a href="formPages/addcityForm.php">+</a></th>
                  </tr>
                  </thead>
                  <tbody class="bg-white">';
                  $data = $dbcon->selectWhere("ville","id_pays",$_GET["id_pays"],"int");
                  foreach($data as $el){
                    $pays = new ville();
                    $pays->id_ville = $el["id_ville"];
                    $pays->nom = $el["nom"];
                    $pays->description = $el["description"];
                    $pays->type = $el["type"];
                    $pays->afficherAdmin();
                  }

            }else{
                    echo'<thead>
                    <tr class="bg-gray-100 ">
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50">Name</th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50">nb of countries</th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-2xl text-end"><a href="formPages/addContinentForm.php">+</a></th>
                    </tr>
                    </thead>
                    <tbody class="bg-white">';
                    $data = $dbcon->selectAll("continent");
                    foreach($data as $el){
                      $continent = new continent();
                      $continent->id_continent = $el["id_continent"];
                      $continent->nom = $el["name"];
                      $count = $dbcon->selectWhere("pays","id_continent",$el["id_continent"],"int");
                      $continent->nombrePays = count($count);
                      $continent->afficherAdmin();
                    }
                    echo "</tbody>";
                }
            ?>
            </table>
        </div>
    </div>
    </div>

</div>


</body>
</html>