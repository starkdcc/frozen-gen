<?php
// Frozen Gen - InfinityFree Database Configuration
// Replace the database connection with these settings

// InfinityFree MySQL Connection Details
$db_host = 'sql301.infinityfree.com';
$db_user = 'if0_40017164';
$db_pass = ''; // You'll need to get this from InfinityFree
$db_name = 'if0_40017164_frozen_gen';

// Create connection
try {
    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Set charset to UTF8
    $conn->set_charset("utf8mb4");
    
} catch (Exception $e) {
    die("Database connection error: " . $e->getMessage());
}

// Alternative PDO connection (if needed)
try {
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8mb4", $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("PDO Connection failed: " . $e->getMessage());
}

echo "✅ Connected to InfinityFree MySQL successfully!";
?>