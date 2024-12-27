<?php
    spl_autoload_register(function($class){
        require "../../classes/" .$class . ".class.php";
    });
    $dbcon = new dbcon();

    $id = $_GET["id_country"];
    $pays = new pays();
    $data = $dbcon->selectWhere("pays","id_pays",$id,"int");
    $pays->nom = $data[0]["nom"];
    $pays->population = $data[0]["population"];
    $pays->langues = $data[0]["langues"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../assets/css/input.css">
    <link rel="stylesheet" href="../../../assets/css/output.css">
    <title>edit country Form</title>
</head>
<body class="flex justify-center items-center min-h-screen bg-slate-500">
    <form class="space-y-4 font-[sans-serif] max-w-md mx-auto bg-slate-300 py-10 px-10" action="../processors.php/edit.php" method="POST">
        <span class="font-bold text-xl">Edit country</span>
        <input type="text" class="hidden" name="id" value="<?php echo $id; ?>">
        <input type="text" placeholder="name" class="px-4 py-3 bg-gray-100 w-full text-sm outline-none border-b-2 border-blue-500 rounded" name="nom" value="<?php echo $pays->nom; ?>" required/>
        <input type="text" placeholder="population" class="px-4 py-3 bg-gray-100 w-full text-sm outline-none border-b-2 border-blue-500 rounded" name="population" value="<?php echo $pays->population; ?>" required/>
        <input type="text" placeholder="languages" class="px-4 py-3 bg-gray-100 w-full text-sm outline-none border-b-2 border-blue-500 rounded" name="langues" value="<?php echo $pays->langues; ?>" required/>
        <button type="submit" class="!mt-8 w-full px-4 py-2.5 mx-auto block text-sm bg-blue-500 text-white rounded hover:bg-blue-600">Submit</button>
    </form>
</body>
</html>