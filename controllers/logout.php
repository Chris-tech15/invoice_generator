
<?php
    // Start session
    session_start();

    // Destroy user session
    session_destroy();

    // Redirect to home page in index.php
    header("Location: /index.php");
    exit();
?>