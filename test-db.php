<?php
// Database Connection Test for Railway + InfinityFree
echo "<h2>🧊 Frozen Gen - Database Connection Test</h2>";

// Show environment variables
echo "<h3>Environment Variables:</h3>";
echo "DB_HOST: " . ($_SERVER['DB_HOST'] ?? 'NOT SET') . "<br>";
echo "DB_USER: " . ($_SERVER['DB_USER'] ?? 'NOT SET') . "<br>";
echo "DB_PASS: " . (isset($_SERVER['DB_PASS']) ? '[HIDDEN]' : 'NOT SET') . "<br>";
echo "DB_NAME: " . ($_SERVER['DB_NAME'] ?? 'NOT SET') . "<br><br>";

// Test database connection
try {
    if (isset($_SERVER['DB_HOST'])) {
        $host = $_SERVER['DB_HOST'];
        $user = $_SERVER['DB_USER'];
        $pass = $_SERVER['DB_PASS'];
        $db = $_SERVER['DB_NAME'];
    } else {
        $host = "sql301.infinityfree.com";
        $user = "if0_40017164";
        $pass = "pnsgq2paHKKusB";
        $db = "if0_40017164_frozen_gen";
    }
    
    echo "<h3>Attempting Connection...</h3>";
    echo "Host: $host<br>";
    echo "User: $user<br>";
    echo "Database: $db<br><br>";
    
    $conn = new mysqli($host, $user, $pass, $db);
    
    if ($conn->connect_error) {
        echo "❌ <strong>CONNECTION FAILED:</strong> " . $conn->connect_error . "<br>";
    } else {
        echo "✅ <strong>DATABASE CONNECTED SUCCESSFULLY!</strong><br>";
        echo "Server info: " . $conn->server_info . "<br>";
        
        // Test a simple query
        $result = $conn->query("SHOW TABLES");
        if ($result) {
            echo "<br><h3>Database Tables:</h3>";
            while ($row = $result->fetch_array()) {
                echo "- " . $row[0] . "<br>";
            }
        }
        
        $conn->close();
    }
    
} catch (Exception $e) {
    echo "❌ <strong>ERROR:</strong> " . $e->getMessage() . "<br>";
}

echo "<br><h3>PHP Info:</h3>";
echo "PHP Version: " . phpversion() . "<br>";
echo "Server: " . $_SERVER['SERVER_SOFTWARE'] ?? 'Unknown' . "<br>";

?>