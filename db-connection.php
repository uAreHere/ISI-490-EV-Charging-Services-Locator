<?php
#adding changes to connect to Prof.Chun hosted site
$host = "localhost";
$dbname = "user_credentials";
$username = "phpmyadmin";
$password = "dmproject";

// $mysqli = new mysqli(hostname: $host, username:$username, password:$password, database:$dbname);
// if($mysqli->connect_errno) {
//     die("Connection error: " .$mysqli->connect_error);
// }

$mysqli = mysqli_connect($host,$username,$password,$dbname) or die ("Connection Failed");

return $mysqli;