<!-- layout.php f-->
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
    <header class="flex items-center p-4 text-2xl font-extrabold text-black">
        <img class="h-8 mr-2" src="./../../static/images/favicon.png" alt="App Logo">
        <h1>Invoice Generator</h1>
    </header>

    <main class="flex-grow p-4">
        <?= $content ?>
    </main>

    <?php include __DIR__ . '/footer.php'; ?>
    <script src="./../../static/js/scripts.js" defer></script>
</body>
</html>
