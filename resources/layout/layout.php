<!-- layout.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Invoice Generator' ?></title>
    <link rel="stylesheet" href="./../../static/css/style.css">
    <link rel="icon" type="image/png" href="./../../static/images/favicon.png">
</head>
<body class="flex flex-col min-h-screen">
    <header class="flex items-center justify-between p-4 bg-white shadow">
        <div class="flex items-center space-x-2">
            <img class="h-8" src="./../../static/images/favicon.png" alt="App Logo">
            <h1 class="text-2xl font-extrabold text-black">Invoice Generator</h1>
        </div>

        <?php
        if (!isset($_SESSION)) session_start();

        // Show nav only if user is logged in
        if (isset($_SESSION['user_id'])):
        ?>
        <nav class="flex space-x-4 text-gray-700">
            <a href="/resources/dashboard.php" class="hover:underline">Dashboard</a>
            <a href="/resources/invoices/list.php" class="hover:underline">Invoices</a>
            <a href="/resources/customers/list.php" class="hover:underline">Customers</a>
            <a href="/resources/reports.php" class="hover:underline">Reports</a>
            <a href="/controllers/logout.php" class="px-3 py-1 text-white bg-red-500 rounded hover:bg-red-600">Logout</a>
        </nav>
        <?php endif; ?>
    </header>



    <main class="flex-grow p-4">
        <?= $content ?>
    </main>

    <?php include __DIR__ . '/footer.php'; ?>
    <script src="./../../static/js/scripts.js" defer></script>
</body>
</html>
