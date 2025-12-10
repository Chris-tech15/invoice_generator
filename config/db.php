<?php

// This file is aimed to configure the database connection settings for the application.
/**
 * Database Configuration File
 * This file contains the settings required to connect to the database.
 * The configs are are found in the 'config/.env' file.
 * .env file is in same directory as db.php
 */

require_once __DIR__ . '/../vendor/autoload.php';

// Load environment variables
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Build configuration
$config = [
    'host'      => $_ENV['DB_HOST'] ?? 'localhost',
    'port'      => $_ENV['DB_PORT'] ?? '3306',
    'database'  => $_ENV['DB_NAME'] ?? '',
    'username'  => $_ENV['DB_USERNAME'] ?? '',
    'password'  => $_ENV['DB_PASSWORD'] ?? '',
    'charset'   => $_ENV['DB_CHARSET'] ?? 'utf8mb4',
    'options'   => [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ],
];

// Build DSN
$dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['database']};charset={$config['charset']}";

// Connect
try {
    $pdo = new PDO($dsn, $config['username'], $config['password'], $config['options']);
} catch (PDOException $e) {
    die("Database Connection Failed: " . $e->getMessage());
}

return $pdo;


// End of db.php