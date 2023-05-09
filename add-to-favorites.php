<?php
session_start();

if (isset($_SESSION["usersId"])) {
    $mysqli = require __DIR__ . "/db-connection.php";

    if (isset($_POST["station_id"]) && isset($_POST["station_name"])) {
        $station_id = $mysqli->real_escape_string($_POST["station_id"]);
        $station_name = $mysqli->real_escape_string($_POST["station_name"]);
        $user_id = $_SESSION["usersId"];

        $sql = "INSERT INTO userfavorites (userID, stationID, stationName) VALUES ('$user_id', '$station_id', '$station_name' )";
        $result = $mysqli->query($sql);

        if ($result) {
            $_SESSION["success_message"] = "Station added to favorites!";
        } else {
            $_SESSION["error_message"] = "Error adding station to favorites.";
        }
    }
}

header("Location: " . $_SERVER['HTTP_REFERER']);
exit();
?>