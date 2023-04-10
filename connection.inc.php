<?php
    #php script to connect to DB server. All Variables are DB credentials
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_name = "user_credentials";
    $conn = new mysqli($servername, $username, $password, $db_name, 3306);

    if($conn->connect_error){
        die("Connection failed".$conn->connect_error);
    }
    echo " ";
?>

