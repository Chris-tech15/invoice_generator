<?php
// create_user.php
require_once __DIR__ . '/config/db.php'; // your PDO connection

// User details
$company_code = 'TNV001'; // The company's code
$username     = 'alice_admin';
$email        = 'alice@technova.com';
$phone        = '690000003';
$password     = 'SecurePass123'; // plaintext password
$role         = 'company_admin'; // can be 'company_admin' or 'staff'

// 1) Get company id by code
$stmt = $pdo->prepare("SELECT id FROM companies WHERE company_code = ?");
$stmt->execute([$company_code]);
$company = $stmt->fetch();

if (!$company) {
    die("Company with code $company_code not found.");
}

// 2) Hash the password
$hashedPassword = password_hash($password, PASSWORD_BCRYPT);

// 3) Insert user into company_users
$stmt = $pdo->prepare("
    INSERT INTO company_users (company_id, username, email, phone, password, role)
    VALUES (?, ?, ?, ?, ?, ?)
");

try {
    $stmt->execute([
        $company['id'],
        $username,
        $email,
        $phone,
        $hashedPassword,
        $role
    ]);
    echo "User $username created successfully for company $company_code!";
} catch (PDOException $e) {
    die("Error creating user: " . $e->getMessage());
}
