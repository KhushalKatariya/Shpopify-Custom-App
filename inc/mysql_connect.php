<?php

    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "secondapp";

    $conn = mysqli_connect($host, $username, $password, $database);

    if(!$conn){
        die("connection Error:" . mysqli_connect_error());
    }
 

?>