<?php

if (empty($_POST["email"] || $_POST["username"] ||  $_POST["pwd"] ||  $_POST["pwdconf"] ||  $_POST["firstname"] ||  $_POST["zipcode"])) {
    die("Please fill out the required fields");
}

if (! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))  {
    die("Please enter a valid email address");
}

if ($_POST["pwd"] !== $_POST["pwdconf"]) {
    die("Could not process, passwords do not match");
}

$hashed_password = password_hash($_POST["pwd"], PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "db-connection.php";

$sql = "INSERT INTO users (username, password, email, firstname, lastname, zipcode) VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $mysqli->stmt_init();

if (!$stmt->prepare($sql)) {
    die("SQL Error: " >$mysqli->error);
}

$stmt->bind_param("sssssi",$_POST["username"], $hashed_password, $_POST["email"], $_POST["firstname"], $_POST["lastname"], $_POST["zipcode"]);

if ($stmt->execute()){
    header("Location: signup-success.php");
    exit;
} else {
    if($mysqli->errno === 1062) {
        die("Email address already in use");
    } else {
        die ($mysqli->error . " " . $mysqli->errno);
    }
};



