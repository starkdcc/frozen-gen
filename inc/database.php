<?php

// Railway Environment Variables (connecting to InfinityFree MySQL)
if (isset($_SERVER['DB_HOST'])) {
    // Railway deployment - use environment variables
    $myhost = $_SERVER['DB_HOST'];
    $myuser = $_SERVER['DB_USER'];
    $mypass = $_SERVER['DB_PASS'];
    $mydb = $_SERVER['DB_NAME'];
} else {
    // Fallback - InfinityFree direct connection
    $myhost = "sql301.infinityfree.com";
    $myuser = "if0_40017164";
    $mypass = "pnsgq2paHKKusB";
    $mydb = "if0_40017164_frozen_gen";
}

$con = mysqli_connect($myhost, $myuser, $mypass, $mydb);

if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
    echo "<br>Host: $myhost, User: $myuser, DB: $mydb";
}

// Set charset for proper encoding
mysqli_set_charset($con, "utf8mb4");

?>
