<?php
/**
 * Authentication Controller
 * This controller handles user authentication process(Login, Logout).
 * It uses the database configuration from 'config/db.php' to verify user credentials.
 * It manages user sessions upon successful login.
 * It redirects users to the dashboard after login and to the home page after logout.
 * It kills the session on logout.
 */

// Load the database configuration
require_once __DIR__ . '/../config/db.php';

// Login logic
function login($username, $password, $companycode) {
    global $pdo;

    // Verify user credentials against the database
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ? AND password = ? AND company_code = ?");
    $stmt->bind_param("ss", $username, $password, $companycode);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Start user session
        session_start();
        $_SESSION['username'] = $username;

        // Redirect to dashboard in resources/dashboard.php
        header("Location: /resources/dashboard.php");
        exit();
    } else {
        // Return errormessage to be displayed on login page
        return "Invalid credentials. Please try again.";
    }
}
