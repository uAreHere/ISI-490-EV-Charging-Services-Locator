<?php
    #php script to connect to DB server. All Variables are DB credentials
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_name = "user_credentials";
    $conn = mysqli_connect($servername, $username, $password, $db_name, 3306);

    if(!$conn){
        die("Connection failed:" .mysqli_connect_error());
    }
?>

