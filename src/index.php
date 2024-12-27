<?php

    spl_autoload_register(function($class){
        require "pages/classes/". $class . ".class.php";
    });

    $user = new user();

    $user->Authentification(true);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/output.css">
    <link rel="stylesheet" href="assets/css/input.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>GEO JUNIOR</title>
</head>
<body>
  <div class="container flex flex-col mx-auto max-w-6xl h-screen ">
    <div class="relative flex flex-wrap items-center justify-between w-[90%] lg:w-full bg-white group py-7 shrink-0 mx-auto">
      <div>
        <a href="#" class="text-3xl font-bold">GEO JUNIOR</a>
      </div>
      <div class="items-center hidden gap-8 md:flex">
        <a class="flex items-center px-4 py-2 text-sm font-bold rounded-xl bg-purple-100 text-gray-800 hover:bg-black hover:text-white transition duration-300 cursor-pointer" href="#">Log out</a>
        
      </div>
      <button onclick="(() => { this.closest('.group').classList.toggle('open')})()" class="flex md:hidden">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
          <path d="M3 8H21C21.2652 8 21.5196 7.89464 21.7071 7.70711C21.8946 7.51957 22 7.26522 22 7C22 6.73478 21.8946 6.48043 21.7071 6.29289C21.5196 6.10536 21.2652 6 21 6H3C2.73478 6 2.48043 6.10536 2.29289 6.29289C2.10536 6.48043 2 6.73478 2 7C2 7.26522 2.10536 7.51957 2.29289 7.70711C2.48043 7.89464 2.73478 8 3 8ZM21 16H3C2.73478 16 2.48043 16.1054 2.29289 16.2929C2.10536 16.4804 2 16.7348 2 17C2 17.2652 2.10536 17.5196 2.29289 17.7071C2.48043 17.8946 2.73478 18 3 18H21C21.2652 18 21.5196 17.8946 21.7071 17.7071C21.8946 17.5196 22 17.2652 22 17C22 16.7348 21.8946 16.4804 21.7071 16.2929C21.5196 16.1054 21.2652 16 21 16ZM21 11H3C2.73478 11 2.48043 11.1054 2.29289 11.2929C2.10536 11.4804 2 11.7348 2 12C2 12.2652 2.10536 12.5196 2.29289 12.7071C2.48043 12.8946 2.73478 13 3 13H21C21.2652 13 21.5196 12.8946 21.7071 12.7071C21.8946 12.5196 22 12.2652 22 12C22 11.7348 21.8946 11.4804 21.7071 11.2929C21.5196 11.1054 21.2652 11 21 11Z" fill="black"/>
        </svg>
      </button>
      <div class="absolute flex md:hidden transition-all duration-300 ease-in-out flex-col items-start shadow-main justify-center w-full gap-3 overflow-hidden bg-white max-h-0 group-[.open]:py-4 px-4 rounded-2xl group-[.open]:max-h-64 top-full">
        
        <a class="flex items-center text-sm font-bold rounded-xl bg-purple-blue-100 text-purple-blue-600 hover:bg-purple-blue-600 hover:text-white transition duration-300" href="assets/pages/register.php">log out</a>
      </div>
    </div>
    <div class="grid w-full grid-cols-1 my-auto mt-12 mb-8 md:grid-cols-2 xl:gap-14 md:gap-5">
      <div class="flex flex-col justify-center col-span-1 text-center lg:text-start">
        <div class="flex items-center justify-center mb-4 lg:justify-normal">
          <img class="h-5" src="https://raw.githubusercontent.com/Loopple/loopple-public-assets/main/motion-tailwind/img/logos/logo-1.png" alt="logo">
          <h4 class="ml-2 text-sm font-bold tracking-widest text-primary uppercase">GET TO KNOW THE WORLD BETTER</h4>
        </div>
        <h1 class="mb-8 text-4xl font-extrabold leading-tight lg:text-6xl text-dark-grey-900 font-display">Elevate your geogrophical skills</h1>
        <p class="mb-6 text-base font-normal leading-7 lg:w-3/4 text-grey-900">
            With GEO JUNIOR you can be a geogrophical expert, and start winning those familly gatherings trivia games.
        </p>
        <div class="flex flex-col items-center gap-4 lg:flex-row">
          <a class="flex items-center py-4 text-sm font-bold text-white px-7 bg-blue-500 hover:bg-black focus:ring-4 focus:ring-blue-100 transition duration-300 rounded-xl" href="#container">Get started now</a>
        </div>
      </div>
      <div class="items-center justify-end hidden col-span-1 md:flex">
        <img class="w-4/5 rounded-md" src="assets/images/hero.png" alt="header image">
      </div>
    </div>
  </div>  
  <div class="container flex flex-wrap justify-center items-center gap-5 mx-auto max-w-6xl min-h-screen py-5 relative" id="container">
      <?php 
        $dbcon = new dbcon();

        if (empty($_GET)) {

          $continents = new continent();
          $continents->AfficherUser();

        } else if (isset($_GET['FiltreP'])) {

          $pays = new pays();

          $arraycontinent = $dbcon->selectWhere('continent', 'name', $_GET['FiltreP'], 'string');

          if ($arraycontinent != NULL) {
            $pays->id_continent = $arraycontinent[0]['id_continent'];
          
            $arraypays = $dbcon->selectWhere('pays', 'id_continent', $pays->id_continent, 'int');
            
            foreach($arraypays as $contry){
              $pays->id_pays = $contry['id_pays'];
              $pays->nom = $contry['nom'];
              $pays->population = $contry['population'];
              $pays->langues = $contry['langues'];
              $pays->id_continent = $contry['id_continent'];

              $pays->AfficherUser();

            }
          }

        } else if (isset($_GET['FiltreV'])) {
          $ville = new ville();

          $arraypays = $dbcon->selectWhere('pays', 'nom', $_GET['FiltreV'], 'string');
          if ($arraypays != NULL) {
            $ville->id_pays = $arraypays[0]['id_pays'];

            $arrayVille = $dbcon->selectWhere('ville', 'id_pays', $ville->id_pays, 'int');

            foreach($arrayVille as $city){
              $ville->id_ville = $city['id_ville'];
              $ville->nom = $city['nom'];
              $ville->description = $city['description'];
              $ville->type = $city['type'];
              $ville->id_pays = $city['id_pays'];

              $ville->AfficherUser();
            }
          }
        }
      ?>
  </div>
</body>
</html>