<?php
    if(!isset($_GET["id_ville"])){
        header("location: ../../../");
    }
    spl_autoload_register(function($class){
        require "../../classes/" .$class . ".class.php";
    });
    $dbcon = new dbcon();

    $id = $_GET["id_ville"];
    $ville = new ville();
    $data = $dbcon->selectWhere("ville","id_ville",$id,"int");
    $ville->nom = $data[0]["nom"];
    $ville->description = $data[0]["description"];
    $ville->type = $data[0]["type"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../assets/css/input.css">
    <link rel="stylesheet" href="../../../assets/css/output.css">
    <title>edit city Form</title>
</head>
<body class="flex justify-center items-center min-h-screen bg-slate-500">
    <form class="space-y-4 font-[sans-serif] max-w-md mx-auto bg-slate-300 py-10 px-10" action="" method="POST">
        <span class="font-bold text-xl">Edit City</span>
        <input type="text" placeholder="name" class="px-4 py-3 bg-gray-100 w-full text-sm outline-none border-b-2 border-blue-500 rounded" value="<?= $ville->nom ?>" name="nom" required/>
        <input type="text" placeholder="description" class="px-4 py-3 bg-gray-100 w-full text-sm outline-none border-b-2 border-blue-500 rounded" value="<?=$ville->description ?>" name="description" required/>
        <div class="flex justify-center items-center text-blue-500 gap-8">
            <div class="flex gap-4 items-center">
                <label >Capitale</label>
                    <input type="radio" value="Capitale" name="type" class=" w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" <?php echo $ville->type == "Capitale" ? "checked": ""; ?>>
                </div>
                <div class="flex gap-4 items-center">
                    <label >Autre</label>
                    <input type="radio" value="Autre" name="type" class=" w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" <?php echo $ville->type == "Autre" ? "checked" : ""; ?>>
                </div>
        </div>
        
        <button type="submit" class="!mt-8 w-full px-4 py-2.5 mx-auto block text-sm bg-blue-500 text-white rounded hover:bg-blue-600">Submit</button>
    </form>
</body>
</html>