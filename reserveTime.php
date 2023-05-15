<?php
    $mysqli = require __DIR__ . "/db-connection.php";
    
    include_once 'header-registereduser.php';

    if (isset($_SESSION["success_message"])) {
        echo "<div class='success container alert alert-success' role='alert'>" . $_SESSION["success_message"] . "</div>";
        unset($_SESSION["success_message"]);
    }
    
    if (isset($_SESSION["error_message"])) {
        echo "<div class='error container alert alert-danger' role='alert'>" . $_SESSION["error_message"] . "</div>";
        unset($_SESSION["error_message"]);
    }

    //post variables from action on reserve form available globally 
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
    
    if ($stationCount == 0) {
            //output if reserving from station search
            
            $sqlInsert = "INSERT INTO chargingstations (stationID, stationName, stationAddress, stationCity, stationState, stationZipcode, evConnectorTypes, evNetwork, chargePricing, latitude, longitude) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $insertStmt = $mysqli->prepare($sqlInsert);
            $insertStmt->bind_param("issssisssdd", $stationID, $stationName, $stationAddress, $stationCity, $stationState, $stationZipcode, $evConnectorTypes, $evNetwork, $chargePricing, $latitude, $longitude);

            if($insertStmt->execute()){

            } else {
                echo "Error: ". $insertStmt->error;
            }

            $checkStmt->close();

            echo "<div class='container'>";


            echo "<h2>Reservation for: $stationName</h2>";
            echo "<h3>Address: $stationAddress</h3>";

            echo "<form method='POST' action='confirmReservation.php'>";
            echo "<input type='hidden' name='station_id' value='$stationID'>";
            echo "Select Date: <input type='date' name='reservation_date'><br>";
            echo "Select Time: <input type='time' name='reservation_time'><br>";
            echo "<input type='submit' value='Confirm Reservation'>";
            echo "</form>";

            echo "</div>";


        } else{
            //output if reserving from user favorites list
            $sql = "SELECT stationName, stationAddress FROM chargingstations WHERE stationID = $stationID";
            $result = mysqli_query($mysqli, $sql);
            $row = mysqli_fetch_assoc($result);
            $station_name = $row["stationName"];
            $station_address = $row["stationAddress"];


            echo "<div class='container'>";


            echo "<h2>Reservation for: $station_name</h2>";
            echo "<h3>Address: $station_address</h3>";

            echo "<form method='POST' action='confirmReservation.php'>";
            echo "<input type='hidden' name='station_id' value='$stationID'>";
            echo "Select Date: <input type='date' name='reservation_date'><br>";
            echo "Select Time: <input type='time' name='reservation_time'><br>";
            echo "<input type='submit' value='Confirm Reservation'>";
            echo "</form>";

            echo "</div>";
        }
        
?>



<?php 
    include_once 'footer.php';
?>