<?php
session_start();

if (isset($_SESSION["usersId"])) {
    $mysqli = require __DIR__ . "db-connection.php";

    if (isset($_POST["station_id"]) && isset($_POST["station_name"])) {
        $station_id = $mysqli->real_escape_string($_POST["station_id"]);
        $station_name = $mysqli->real_escape_string($_POST["station_name"]);
        $street_address =  $mysqli->real_escape_string($_POST["street_address"]);
        $city =  $mysqli->real_escape_string($_POST["city"]);
        $state =  $mysqli->real_escape_string($_POST["state"]);
        $zip =  $mysqli->real_escape_string($_POST["zip"]);
        $ev_connector_types =  $mysqli->real_escape_string($_POST["ev_connector_types"]);
        $ev_network =  $mysqli->real_escape_string($_POST["ev_network"]);
        $ev_pricing =  $mysqli->real_escape_string($_POST["ev_pricing"]);
        $latitude =  $mysqli->real_escape_string($_POST["latitude"]);
        $longitude =  $mysqli->real_escape_string($_POST["longitude"]);
        $user_id = $_SESSION["usersId"];

        $check_sql = "SELECT COUNT(*) FROM chargingstations WHERE stationID = '$station_id'";
        $check_result = $mysqli->query($check_sql);

        if ($check_result && $check_result->fetch_row()[0] == 0) {

            // insert into chargingstations table
            $insert_sql = "INSERT INTO chargingstations (stationID, stationName, stationAddress, stationCity, stationState, stationZipcode, evConnectorTypes, evNetwork, chargePricing, latitude, longitude) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $insert_stmt = $mysqli->prepare($insert_sql);
            $insert_stmt->bind_param("issssisssdd", $station_id, $station_name, $street_address, $city, $state, $zip, $ev_connector_types,$ev_network, $ev_pricing, $latitude, $longitude);
            $insert_result = $insert_stmt->execute();
        }

        // insert into userfavorites table
        $fav_sql = "INSERT INTO userfavorites (userID, stationID, stationName) VALUES (?, ?, ?)";
        $fav_stmt = $mysqli->prepare($fav_sql);
        $fav_stmt->bind_param("iis", $user_id, $station_id, $station_name);
        $fav_result = $fav_stmt->execute();

        if ($fav_result) {
            $_SESSION["success_message"] = "Station added to favorites!";
        } else {
            $_SESSION["error_message"] = "Error adding station to favorites.";
        }
    }
}

header("Location: " . $_SERVER['HTTP_REFERER']);
exit();


?>