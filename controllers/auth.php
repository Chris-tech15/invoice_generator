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
session_start();
require_once __DIR__ . '/../config/db.php'; // your PDO connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username     = $_POST['username'] ?? '';
    $password     = $_POST['password'] ?? '';
    $company_code = $_POST['company_code'] ?? '';

    // 1) Find the company first
    $stmt = $pdo->prepare("SELECT * FROM companies WHERE company_code = ?");
    $stmt->execute([$company_code]);
    $company = $stmt->fetch();

    if (!$company) {
        die("Company not found!");
    }

    // 2) Find the user in that company
    $stmt = $pdo->prepare("SELECT * FROM company_users WHERE company_id = ? AND username = ?");
    $stmt->execute([$company['id'], $username]);
    $user = $stmt->fetch();

    if (!$user) {
        die("User not found!");
    }

    // 3) Verify password
    if (!password_verify($password, $user['password'])) {
        die("Invalid password!");
    }

    // 4) Login success → set session
    $_SESSION['user_id']    = $user['id'];
    $_SESSION['username']   = $user['username'];
    $_SESSION['company_id'] = $company['id'];

    // 5) Redirect to dashboard
    header("Location: /resources/dashboard.php");
    exit;
}
