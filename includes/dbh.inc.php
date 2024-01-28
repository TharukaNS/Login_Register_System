<?php
    $dbSever = "localhost";
    $dbUser = "root";
    $dbPass = "";
    $database = "lore";

    $conn = mysqli_connect($dbSever, $dbUser, $dbPass, $database);

    if(!$conn){
        die("Connection Failed : ".mysqli_connect_error());
    }
?>