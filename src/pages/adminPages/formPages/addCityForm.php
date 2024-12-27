<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../assets/css/input.css">
    <link rel="stylesheet" href="../../../assets/css/output.css">
    <title>add city Form</title>
</head>
<body class="flex justify-center items-center min-h-screen bg-slate-500">
    <form class="space-y-4 font-[sans-serif] max-w-md mx-auto bg-slate-300 py-10 px-10" action="../processors/add.php?id_pays=<?php echo $_GET["id_pays"]?>" method="POST">
        <span class="font-bold text-xl">Add City</span>
        <input type="text" placeholder="name" class="px-4 py-3 bg-gray-100 w-full text-sm outline-none border-b-2 border-blue-500 rounded" name="nom" required/>
        <input type="text" placeholder="description" class="px-4 py-3 bg-gray-100 w-full text-sm outline-none border-b-2 border-blue-500 rounded" name="description" required/>
        <div class="flex justify-center items-center text-blue-500 gap-8">
            <div class="flex gap-4 items-center">
                <label >Capitale</label>
                  <input type="radio" value="Capitale" name="type" class=" w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" >
                </div>
                <div class="flex gap-4 items-center">
                    <label >Autre</label>
                    <input type="radio" value="Autre" name="type" class=" w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" checked>
                </div>
        </div>
        <button type="submit" class="!mt-8 w-full px-4 py-2.5 mx-auto block text-sm bg-blue-500 text-white rounded hover:bg-blue-600">Submit</button>
    </form>
</body>
</html>