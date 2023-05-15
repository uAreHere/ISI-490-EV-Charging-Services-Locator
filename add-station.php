<?php 
session_start();
    
    if (isset($_SESSION["usersId"])) {
        $mysqli = require __DIR__ . "/db-connection.php";

        $stationID = $mysqli->real_escape_string($_POST['station_id']);
        $stationName = $mysqli->real_escape_string($_POST['station_name']);
        $stationAddress = $mysqli->real_escape_string($_POST['street_address']);
        $stationCity = $mysqli->real_escape_string($_POST['city']);
        $stationState = $mysqli->real_escape_string($_POST['state']);
        $stationZipcode = $mysqli->real_escape_string($_POST['zip']);
        $evConnectorTypes = $mysqli->real_escape_string($_POST['ev_connector_types']);
        $evNetwork = $mysqli->real_escape_string($_POST['ev_network']);
        $chargePricing = $mysqli->real_escape_string($_POST['ev_pricing']);
        $latitude = $mysqli->real_escape_string($_POST['latitude']);
        $longitude = $mysqli->real_escape_string($_POST['longitude']);

        $checkQuery = "SELECT COUNT(*) as count FROM chargingstations where stationID = ?";
        $checkStmt = $mysqli->prepare($checkQuery);
        $checkStmt->bind_param("i", $stationID);
        $checkStmt->execute();
        $checkResult = $checkStmt->get_result();
        $stationCount = $checkResult->fetch_assoc()['count'];

        if($stationCount == 0) {
            
            $sqlInsert = "INSERT INTO chargingstations (stationID, stationName, stationAddress, stationCity, stationState, stationZipcode, evConnectorTypes, evNetwork, chargePricing, latitude, longitude) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $insertStmt = $mysqli->prepare($sqlInsert);
            $insertStmt->bind_param("issssisssdd", $stationID, $stationName, $stationAddress, $stationCity, $stationState, $stationZipcode, $evConnectorTypes, $evNetwork, $chargePricing, $latitude, $longitude);

            if($insertStmt->execute()){
                header("Location: reserveTime.php");
                exit;
            } else {
                echo "Error: ". $insertStmt->error;
            }
        } else {
            header("Location: reserveTime.php");
        }
        $checkStmt->close();
    }

?>