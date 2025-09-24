<?php
// Environment-based database configuration for Frozen Gen

// Check if we're in production (Railway/Vercel) or local development
$isProduction = isset($_ENV['RAILWAY_ENVIRONMENT']) || isset($_ENV['VERCEL']) || isset($_ENV['NODE_ENV']);

if ($isProduction) {
    // Production database configuration (Railway/Vercel)
    $myhost = $_ENV['DB_HOST'] ?? getenv('DATABASE_URL') ?? 'localhost';
    $myuser = $_ENV['DB_USER'] ?? $_ENV['MYSQLUSER'] ?? 'root';
    $mypass = $_ENV['DB_PASS'] ?? $_ENV['MYSQLPASSWORD'] ?? '';
    $mydb = $_ENV['DB_NAME'] ?? $_ENV['MYSQLDATABASE'] ?? 'frozen_gen';
    
    // Handle Railway DATABASE_URL format
    if (isset($_ENV['DATABASE_URL'])) {
        $db_url = parse_url($_ENV['DATABASE_URL']);
        $myhost = $db_url['host'];
        $myuser = $db_url['user'];
        $mypass = $db_url['pass'];
        $mydb = ltrim($db_url['path'], '/');
    }
} else {
    // Local development configuration
    $myhost = "localhost";
    $myuser = "root";
    $mypass = "stark@2009";
    $mydb = "frozen_gen";
}

// Create connection
$con = mysqli_connect($myhost, $myuser, $mypass, $mydb);

// Check connection
if (mysqli_connect_errno()) {
    if ($isProduction) {
        // In production, log error but show generic message
        error_log("Database connection failed: " . mysqli_connect_error());
        die("Database connection failed. Please try again later.");
    } else {
        // In development, show detailed error
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
}
?>