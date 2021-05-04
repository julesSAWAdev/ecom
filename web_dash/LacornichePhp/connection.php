<?php

	$host="localhost";
    $user="root";
    $pass="";
    $db="gofix";

    $conn = mysqli_connect($host,$user,$pass,$db);
    if ($conn-> connect_error) {
    	die("connection failed" .$conn-> connect_error);
    }

 error_reporting(E_ERROR);
?>