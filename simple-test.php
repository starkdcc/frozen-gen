<?php
// Simple test to check if PHP is working
echo "PHP is working!<br>";
echo "PHP Version: " . phpversion() . "<br>";
echo "Current time: " . date('Y-m-d H:i:s') . "<br>";

// Check if environment variables exist
echo "<h3>Environment Variables:</h3>";
echo "DB_HOST: " . (getenv('DB_HOST') ?: 'NOT SET') . "<br>";
echo "DB_USER: " . (getenv('DB_USER') ?: 'NOT SET') . "<br>";
echo "DB_NAME: " . (getenv('DB_NAME') ?: 'NOT SET') . "<br>";
echo "DB_PASS: " . (getenv('DB_PASS') ? 'SET (hidden)' : 'NOT SET') . "<br>";

// Check if mysqli extension is loaded
echo "<h3>Extensions:</h3>";
echo "mysqli extension: " . (extension_loaded('mysqli') ? 'LOADED' : 'NOT LOADED') . "<br>";
?>