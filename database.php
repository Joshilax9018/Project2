<?php
$servername = "sql1.njit.edu";
$username = "svj28";
$password = "vlAtaFzRh";

try {
    $conn = new PDO("mysql:host=$servername;dbname=svj28", $username, $password);
    // set the PDO error mode to exception
   // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
    echo "Test";
?>