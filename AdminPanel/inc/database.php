<?php

$myhost = "sql301.infinityfree.com";
$myuser = "if0_40017164";
$mypass = "pnsgq2paHKKusB";
$mydb = "if0_40017164_frozen_gen";

$con = mysqli_connect($myhost, $myuser, $mypass, $mydb);

if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

?>