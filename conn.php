<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "jamesdb";

try {
    $con = new PDO("mysql:host=$servername;dbname=$db",$username, $password);
    $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    echo 1;
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>