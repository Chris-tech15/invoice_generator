<?php

/**
 * Index File
 * This is the main entry point of the application.
 * It initializes the application and handles incoming requests.
 * It uses the database configuration from 'config/db.php'.
 * It shows the home page of the application. After loading the database connection,
 * it displays a welcome message.
 */

// Load the database configuration and establish a connection
require_once __DIR__ . '/config/db.php';

// End of php code
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to the Application</title>
    <link rel="stylesheet" href="./static/css/style.css">
    <link rel="icon" type="image/png" href="./static/images/favicon.png">
</head>
<body class="flex flex-col min-h-screen bg-cyan-50">
    <header class="flex items-center p-4 text-2xl font-extrabold text-black">
        <img class="h-8 mr-2" src="./static/images/favicon.png" alt="App Logo">
        <h1>Invoice Generator</h1>
    </header>

    <main class="flex-grow p-4">
        <div class="flex justify-center mb-6 bg-blue-300 rounded-lg">
            <h2 class="p-12 text-2xl font-extrabold">Welcome to the Invoice Generator Application!</h2>
        </div>

        <div class="flex items-center justify-center p-16 mb-2">
            <p class="text-3xl font-bold text-center">
                This is the home page of the application. 
                The database connection has been successfully established.
            </p>
        </div>
        
        <div class="flex justify-center ml-8 space-x-4">
            <a href="./resources/auth/login.php"
            class="p-4 font-bold text-center text-white transition duration-300 transform bg-blue-500 rounded-lg hover:bg-blue-600 hover:-translate-y-1 hover:shadow-lg hover:scale-105">
                Login
            </a>
            <a href="./resources/auth/create_company.php"
            class="p-4 font-bold text-center text-black transition transform bg-gray-300 rounded-lg hover:bg-gray-400 hover:-translate-y-1 hover:shadow-lg hover:scale-105">
                Create your Enterprise
            </a>
        </div>

    </main>

    <?php include __DIR__ . '/resources/layout/footer.php'; ?>

    <script src="./static/js/scripts.js" defer></script>
</body>
</html>