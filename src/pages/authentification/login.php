<?php
    spl_autoload_register(function($class){
        require "../classes/". $class . ".class.php";
    });

    
    $user = new user();
    session_start();
    $user->Authentification(false, true, true);

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Tailwind -->
    <link rel="stylesheet" href="../../assets/css/input.css">
    <link rel="stylesheet" href="../../assets/css/output.css">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

        .font-family-karla {
            font-family: karla;
        }
    </style>
</head>
<body class="bg-white font-family-karla h-screen">

<?php
        if (isset($_GET)) {
            if (isset($_GET['message'])) {
                echo '
                <div id="SwitAlair" class="absolute w-[28rem] right-[-28rem] p-5 my-5 border-[1px] bg-green-200 bg-opacity-90 border-green-400 rounded-lg transition-all duration-700 ease-in-out">
                    <span class="xbg-inherit ml-5 text-xl cursor-pointer" onclick="this.parentElement.remove();">&times;</span>
                    <strong>Succès!</strong> ' . htmlspecialchars($_GET['message']) . '
                </div>';
            } else if (isset($_GET['erreur'])) {
                echo '
                        <div id="SwitAlair" class="absolute w-[28rem] right-[-28rem] p-5 my-5 border-[1px] bg-red-200 bg-opacity-90 border-red-400 rounded-lg transition-all duration-700 ease-in-out">
                            <span class="xbg-inherit ml-5 text-xl cursor-pointer" onclick="this.parentElement.remove();">&times;</span>
                            <strong>Erreur!</strong> ' . htmlspecialchars($_GET['erreur']) . '
                        </div>';
            }


            echo    '<script>
                        let messageElement = document.getElementById("SwitAlair");
                        if (messageElement) {
                            messageElement.style.right = "0"; 
                        }
                        
                        setTimeout(function() {
                            if (messageElement) {
                                messageElement.remove();
                            }
                        }, 3000);
                </script>';
        }
    ?>

    <div class="w-full flex flex-wrap">

        <!-- Login Section -->
        <div class="w-full md:w-1/2 flex flex-col">

            <div class="flex justify-center md:justify-start pt-12 md:pl-12 md:-mb-24">
                <a href="../../" class="bg-black text-white font-bold text-xl p-4">GEO JUNIOR</a>
            </div>

            <div class="flex flex-col justify-center md:justify-start my-auto pt-8 md:pt-0 px-8 md:px-24 lg:px-32">
                <p class="text-center text-3xl">Welcome.</p>
                <form class="flex flex-col pt-3 md:pt-8" action="./proccessors/auth.php" method="POST">
                    <div class="flex flex-col pt-4">
                        <label for="email" class="text-lg">Email</label>
                        <input type="email" name="emailConnex" id="email" placeholder="your@email.com" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline">
                        <span class="hidden text-red-500">email Incorrect</span>
                    </div>
    
                    <div class="flex flex-col pt-4">
                        <label for="password" class="text-lg">Password</label>
                        <input type="password" name="password" id="password" placeholder="Password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline">
                        <span class="hidden text-red-500">password Incorrect</span>
                    </div>
    
                    <input type="submit" value="Log In" class="bg-black text-white font-bold text-lg hover:bg-gray-700 p-2 mt-8">
                </form>
                <div class="text-center pt-12 pb-12">
                    <p>Don't have an account? <a href="register.php" class="underline font-semibold">Register here.</a></p>
                </div>
            </div>

        </div>

        <!-- Image Section -->
        <div class="w-1/2 shadow-2xl">
            <img class="object-cover w-full h-screen hidden md:block" src="../../assets/images/login_image.jpg">
        </div>
    </div>
    
    <script src="../../assets/js/login.js"></script>
</body>
</html>