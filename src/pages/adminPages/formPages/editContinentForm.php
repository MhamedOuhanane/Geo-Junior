<?php
    spl_autoload_register(function($class){
        require "../../classes/" .$class . ".class.php";
    });
    $dbcon = new dbcon();

    $id = $_GET["id_continent"];
    $continent = new continent();
    $data = $dbcon->selectWhere("continent","id_continent",$id,"int");
    $continent->nom = $data[0]["name"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../assets/css/input.css">
    <link rel="stylesheet" href="../../../assets/css/output.css">
    <title>edit continent Form</title>
</head>
<body class="flex justify-center items-center min-h-screen bg-slate-500">
    <form class="space-y-4 font-[sans-serif] max-w-md mx-auto bg-slate-300 py-10 px-10" action="../processors.php/edit.php" method="POST">
        <input type="text" class="hidden" name="id" value="<?php echo $id; ?>">
        <span class="font-bold text-xl"> Edit continent</span>
        <input type="text" placeholder="name" class="px-4 py-3 bg-gray-100 w-full text-sm outline-none border-b-2 border-blue-500 rounded" name="name" value="<?php echo $continent->nom?>" required/>
        <button type="submit" class="!mt-8 w-full px-4 py-2.5 mx-auto block text-sm bg-blue-500 text-white rounded hover:bg-blue-600">Submit</button>
    </form>
</body>
</html>