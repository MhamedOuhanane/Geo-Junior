<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../assets/css/input.css">
    <link rel="stylesheet" href="../../../assets/css/output.css">
    <title>add country Form</title>
</head>
<body class="flex justify-center items-center min-h-screen bg-slate-500">
    <form class="space-y-4 font-[sans-serif] max-w-md mx-auto bg-slate-300 py-10 px-10" action="" method="POST">
        <span class="font-bold text-xl">Add country</span>
        <input type="text" placeholder="name" class="px-4 py-3 bg-gray-100 w-full text-sm outline-none border-b-2 border-blue-500 rounded" name="nom" required/>
        <input type="text" placeholder="population" class="px-4 py-3 bg-gray-100 w-full text-sm outline-none border-b-2 border-blue-500 rounded" name="population" required/>
        <input type="text" placeholder="languages" class="px-4 py-3 bg-gray-100 w-full text-sm outline-none border-b-2 border-blue-500 rounded" name="langues" required/>
        <div class="flex justify-between">
            <label for="continents">Choose a continent:</label>
            <select id="continents" name="id_continent" class="text-center w-1/3">
                <option value="1">Africa</option>
                <option value="2">America</option>
            </select>
        </div>
        <button type="submit" class="!mt-8 w-full px-4 py-2.5 mx-auto block text-sm bg-blue-500 text-white rounded hover:bg-blue-600">Submit</button>
    </form>
</body>
</html>