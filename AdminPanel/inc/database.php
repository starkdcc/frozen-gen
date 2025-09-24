<?php

$myhost = "localhost";
$myuser = "root";
$mypass = "stark@2009";
$mydb = "frozen_gen";

$con = mysqli_connect($myhost, $myuser, $mypass, $mydb);

if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

?>